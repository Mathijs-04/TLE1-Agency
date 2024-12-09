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
            'salary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'hours' => 'required|numeric|min:0',
            'contract_type' => 'required|string',
            'description' => 'nullable|string',
            'requirement' => 'nullable|string',
            'image_url' => 'nullable|image|max:2048',
            'waiting' => 'nullable|integer|min:0',
            'available_positions' => 'nullable|integer|min:0',
            'employer_id' => 'nullable|integer|min:0',
        ]);

        $vacancy = new Vacancy();
        $employerId = auth()->user()->employer_id;

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
        $vacancy->waiting = $request->input('waiting', 3);
        $vacancy->available_positions = $request->input('available_positions', 1);
        $vacancy->employer_id = $employerId;

        $vacancy->save();

        return view('detail-vacancies', compact('vacancy'));
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
