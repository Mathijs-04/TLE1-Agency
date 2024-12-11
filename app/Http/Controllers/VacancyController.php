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
            'postalcode' => ['required', 'regex:/^\d{4}[A-Za-z]{2}$/'],
            'housenumber' => 'required|numeric|min:1',
            'streetname' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'hours' => 'required|numeric|min:0',
            'contract_type' => 'required|string',
            'description' => 'nullable|string',
            'requirements' => 'array',
            'requirements.*' => 'string|nullable',
            'image_url' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,webp',
        ],[
            // Name Validatie
            'name.required' => 'Een naam is verplicht.',
            'name.string' => 'De naam moet een tekst zijn.',
            'name.max' => 'De naam mag niet meer dan 255 tekens bevatten.',

            // Salary Validatie
            'salary.required' => 'Een salarisindicatie is verplicht.',
            'salary.numeric' => 'Het salaris moet een numerieke waarde zijn.',
            'salary.min' => 'Het salaris mag niet negatief zijn.',

            // Postcode Validatie
            'postalcode.required' => 'Een postcode is verplicht.',
            'postalcode.regex' => 'De ingevoerde postcode is onjuist. Gebruik het formaat: 1234AB.',


            // Huisnummer Validatie
            'housenumber.required' => 'Een huisnummer is verplicht.',
            'housenumber.numeric' => 'Het huisnummer moet een numerieke waarde zijn.',
            'housenumber.min' => 'Het huisnummer moet minstens 1 zijn.',

            // Straatnaam Validatie
            'streetname.required' => 'Een straatnaam is verplicht.',
            'streetname.string' => 'De straatnaam moet een tekst zijn.',
            'streetname.max' => 'De straatnaam mag niet meer dan 255 tekens bevatten.',

            // Plaats Validatie
            'city.required' => 'Een plaats is verplicht.',
            'city.string' => 'De plaats moet een tekst zijn.',
            'city.max' => 'De plaats mag niet meer dan 255 tekens bevatten.',

            // Uren Validatie
            'hours.required' => 'Het aantal uren per week is verplicht.',
            'hours.numeric' => 'Het aantal uren moet een numerieke waarde zijn.',
            'hours.min' => 'Het aantal uren mag niet kleiner zijn dan 0.',

            // Contract Type Validatie
            'contract_type.required' => 'Het type contract is verplicht.',
            'contract_type.string' => 'Het type contract moet een tekst zijn.',

            // Beschrijving Validatie
            'description.string' => 'De beschrijving moet een tekst zijn.',

            // Vereisten Validatie
            'requirement.string' => 'De vereisten moeten een tekst zijn.',

            // Afbeelding Validatie
            'image_url.image' => 'Het geüploade bestand moet een afbeelding zijn.',
            'image_url.max' => 'De afbeelding mag niet groter zijn dan 2 MB.',

            // Wachtende Validatie
            'waiting.integer' => 'Het aantal wachtende moet een geheel getal zijn.',
            'waiting.min' => 'Het aantal wachtende mag niet kleiner zijn dan 0.',

            // Beschikbare Posities Validatie
            'available_positions.integer' => 'Het aantal beschikbare posities moet een geheel getal zijn.',
            'available_positions.min' => 'Het aantal beschikbare posities mag niet kleiner zijn dan 0.',

            // Werkgever-ID Validatie
            'employer_id.integer' => 'De werkgever-ID moet een geheel getal zijn.',
            'employer_id.min' => 'De werkgever-ID mag niet kleiner zijn dan 0.',
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
}
