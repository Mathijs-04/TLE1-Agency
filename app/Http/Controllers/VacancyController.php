<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ophalen van mijn vacatures met een check voor ingelogde user
        $vacancies = Vacancy::whereColumn(auth()->user()->employer_id, 'employer_id')->get();
        return view('my-vacancies', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('my-vacancies/create');
    }

    /**
     * Store a newly created resource in storage.
     */

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
            'requirements' => 'array', // Valideer als array
            'requirements.*' => 'string|nullable', // Elk item in de array
            'image_url' => 'nullable|image|max:2048|mines:jpeg,jpg,png,webp', // Alleen afbeeldingen tot 2MB toegestaan
        ]);

        $vacancy = new Vacancy();
        $employerId = auth()->user()->employer_id;


        // Afbeelding uploaden
        if ($request->hasFile('image_url')) {
            $nameOfFile = $request->file('image_url')->store('images', 'public');
            $vacancy->image_url = $nameOfFile;
        }
        $vacancy = new Vacancy();
        $vacancy->name = $request->input('name');
        $vacancy->salary = $request->input('salary');
        $vacancy->postalcode = $request->input('postalcode');
        $vacancy->housenumber = $request->input('housenumber');
        $vacancy->streetname = $request->input('streetname');
        $vacancy->city = $request->input('city');
        $vacancy->hours = $request->input('hours');
        $vacancy->contract_type = $request->input('contract_type');
        $vacancy->description = $request->input('description');
        $vacancy->requirement = json_encode($request->input('requirements', [])); // JSON-string opslaan
        $vacancy->image_url = $nameOfFile;


        //// Check of de velden zijn ingevuld of stel een standaardwaarde in
        $vacancy->waiting = $request->input('waiting', 3); // Standaardwaarde 3
        $vacancy->available_positions = $request->input('available_positions', 1); // Standaardwaarde null
        $vacancy->employer_id = $employerId;



        $vacancy->save();

        return redirect()->route('mijn-vacatures.index')->with('success', 'Vacature succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vacancy = Vacancy::find($id);

        if (!$vacancy) {
            abort(404, 'Vacature niet gevonden.');
        }

        return view('detail-vacancies', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $vacancy = Vacancy::findOrFail($id); //a
        return view('my-vacancies/edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'name' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
//            'location' => 'required|string|max:255',
            'hours' => 'required|numeric|min:0',
            'contract_type' => 'required|string',
            'description' => 'nullable|string',
            'requirement' => 'nullable|string',
            'image_url' => 'nullable|image|max:2048',
            'waiting' => 'nullable|integer|min:0', // Optioneel veld
            'available_positions' => 'nullable|integer|min:0', // Optioneel veld
            'employer_id' => 'nullable|integer|min:0', // Laat employer_id optioneel
        ]);

        $vacancy = Vacancy::findOrFail($id);

        // Alleen de toegestane velden bijwerken
        $updateData = $request->except(['waiting', 'available_position', 'employer_id']);

        $vacancy->update($updateData);

        return redirect()->route('mijn-vacatures.index')->with('success', 'Vacature succesvol geupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //deleten van mijn vacature
        $vacancy = Vacancy::find($id);
        $vacancy->delete();
        return redirect(route('mijn-vacatures.index'));
    }
}
