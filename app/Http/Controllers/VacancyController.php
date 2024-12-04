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
        //

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
        //

        $request->validate([
            'name' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'hours' => 'required|numeric|min:0',
            'contract_type' => 'required|string',
            'description' => 'nullable|string',
            'requirement' => 'nullable|string',
            'image_url' => 'nullable|image|max:2048',
            'waiting' => 'nullable|integer|min:0', // Optioneel veld
            'available_positions' => 'nullable|integer|min:0', // Optioneel veld
            'employer_id' => 'nullable|integer|min:0', // Laat employer_id optioneel
        ]);

        $vacancy = new Vacancy();

        // Afbeelding uploaden
        if ($request->hasFile('image_url')) {
            $nameOfFile = $request->file('image_url')->store('images', 'public');
            $vacancy->image_url = $nameOfFile;
        }

        $vacancy->name = $request->input('name');
        $vacancy->salary = $request->input('salary');
        $vacancy->location = $request->input('location');
        $vacancy->hours = $request->input('hours');
        $vacancy->contract_type = $request->input('contract_type');
        $vacancy->description = $request->input('description');
        $vacancy->requirement = $request->input('requirement');

// Check of de velden zijn ingevuld of stel een standaardwaarde in
        $vacancy->waiting = $request->input('waiting', 5); // Standaardwaarde null
        $vacancy->available_positions = $request->input('available_positions', 2); // Standaardwaarde null
        $vacancy->employer_id = $request->input('employer_id', 1); // Zorg ervoor dat ID 1 bestaat in de employers-tabel

        $vacancy->save();

//        return redirect()->route('my-vacancies.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            'location' => 'required|string|max:255',
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

        return redirect()->route('vacancies.index')->with('success', 'Vacancy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
