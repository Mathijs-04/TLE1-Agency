<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::whereColumn(auth()->user()->employer_id, 'employer_id')->get();
        return view('my-vacancies', compact('vacancies'));
    }

    public function create()
    {
        return view('my-vacancies/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'postalcode' => 'required|string|max:10',
            'housenumber' => 'required|numeric|min:1',
            'streetname' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'hours' => 'required|numeric|min:0',
            'contract_type' => 'required|string',
            'description' => 'nullable|string',
            'requirements' => 'array',
            'requirements.*' => 'string|nullable',
            'image_url' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,webp',
        ]);

        $vacancy = new Vacancy();
        $employerId = auth()->user()->employer_id;

        if ($request->hasFile('image_url')) {
            $nameOfFile = $request->file('image_url')->store('images', 'public');
            $vacancy->image_url = $nameOfFile;
        }

        $vacancy->name = $request->input('name');
        $vacancy->salary = $request->input('salary');
        $vacancy->postalcode = $request->input('postalcode');
        $vacancy->housenumber = $request->input('housenumber');
        $vacancy->streetname = $request->input('streetname');
        $vacancy->city = $request->input('city');
        $vacancy->hours = $request->input('hours');
        $vacancy->contract_type = $request->input('contract_type');
        $vacancy->description = $request->input('description');
        $vacancy->requirement = json_encode($request->input('requirements', []));

        $vacancy->waiting = $request->input('waiting', 3);
        $vacancy->available_positions = $request->input('available_positions', 1);
        $vacancy->employer_id = $employerId;

        $vacancy->save();

        return redirect()->route('mijn-vacatures.index')->with('success', 'Vacature succesvol aangemaakt.');
    }

    public function show(string $id)
    {
        $vacancy = Vacancy::find($id);

        if (!$vacancy) {
            abort(404, 'Vacature niet gevonden.');
        }

        return view('detail-vacancies', compact('vacancy'));
    }

    public function edit(string $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('my-vacancies/edit', compact('vacancy'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'postalcode' => 'required|string|max:10',
            'housenumber' => 'required|numeric|min:1',
            'streetname' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'hours' => 'required|numeric|min:0',
            'contract_type' => 'required|string',
            'description' => 'nullable|string',
            'requirements' => 'array',
            'requirements.*' => 'string|nullable',
            'image_url' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,webp',
        ]);

        $vacancy = Vacancy::findOrFail($id);

        $vacancy->name = $request->input('name');
        $vacancy->salary = $request->input('salary');
        $vacancy->postalcode = $request->input('postalcode');
        $vacancy->housenumber = $request->input('housenumber');
        $vacancy->streetname = $request->input('streetname');
        $vacancy->city = $request->input('city');
        $vacancy->hours = $request->input('hours');
        $vacancy->contract_type = $request->input('contract_type');
        $vacancy->description = $request->input('description');
        $vacancy->requirement = json_encode($request->input('requirements', []));

        if ($request->hasFile('image_url')) {
            $nameOfFile = $request->file('image_url')->store('images', 'public');
            $vacancy->image_url = $nameOfFile;
        }

        $vacancy->save();

        return view('detail-vacancies', compact('vacancy'));
    }

    public function destroy($id)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->delete();
        return redirect(route('mijn-vacatures.index'));
    }

    // Laat alle vacatures zien (op de vacatures.blade.php pagina)
    public function showAllVacancy()
    {
        $vacancies = Vacancy::all(); // Haalt alle vacatures op
        return view('vacatures', compact('vacancies'));
    }

    // Uitnodigen van een gebruiker voor een vacature
    public function inviteUserToJob(Request $request, $vacancyId, $userId)
    {
        $vacancy = Vacancy::findOrFail($vacancyId);
        $user = User::findOrFail($userId);

        // Controleer of er al een match bestaat
        $match = Matchs::firstOrCreate(
            ['vacancy_id' => $vacancy->id, 'user_id' => $user->id],
            ['status' => Matchs::STATUS_PENDING]
        );

        // Verstuur de e-mail
        Mail::to($user->email)->send(new JobInvitation($vacancy, $user, $match));

        return redirect()->back()->with('success', 'Uitnodiging verzonden!');
    }


}
