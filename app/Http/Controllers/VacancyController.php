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
//    public function store(Request $request)
//    {
//        //
//
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'salary' => 'required|numeric|min:0',
//            'postalcode' => 'required|string|max:10',
//            'housenumber' => 'required|numeric|min:1',
//            'streetname' => 'required|string|max:255',
//            'city' => 'required|string|max:255',
//            'hours' => 'required|numeric|min:0',
//            'contract_type' => 'required|string',
//            'description' => 'nullable|string',
////            'requirement' => 'nullable|string',
//            'requirements' => 'array', // Validatie dat het een array is
//                'requirements.*' => 'string|nullable', // Elk item moet een string zijn of null
//            'image_url' => 'nullable|image|max:2048',
//            'waiting' => 'nullable|integer|min:0', // Optioneel veld
//            'available_positions' => 'nullable|integer|min:0', // Optioneel veld
//            'employer_id' => 'nullable|integer|min:0', // Laat employer_id optioneel
//        ]
////            , [
////            // Name Validatie
////            'name.required' => 'Een naam is verplicht.',
////            'name.string' => 'De naam moet een tekst zijn.',
////            'name.max' => 'De naam mag niet meer dan 255 tekens bevatten.',
////
////            // Salary Validatie
////            'salary.required' => 'Een salarisindicatie is verplicht.',
////            'salary.numeric' => 'Het salaris moet een numerieke waarde zijn.',
////            'salary.min' => 'Het salaris mag niet negatief zijn.',
////
////            // Postcode Validatie
////            'postalcode.required' => 'Een postcode is verplicht.',
////            'postalcode.string' => 'De postcode moet een tekst zijn.',
////            'postalcode.max' => 'De postcode mag niet meer dan 10 tekens bevatten.',
////
////            // Huisnummer Validatie
////            'housenumber.required' => 'Een huisnummer is verplicht.',
////            'housenumber.numeric' => 'Het huisnummer moet een numerieke waarde zijn.',
////            'housenumber.min' => 'Het huisnummer moet minstens 1 zijn.',
////
////            // Straatnaam Validatie
////            'streetname.required' => 'Een straatnaam is verplicht.',
////            'streetname.string' => 'De straatnaam moet een tekst zijn.',
////            'streetname.max' => 'De straatnaam mag niet meer dan 255 tekens bevatten.',
////
////            // Plaats Validatie
////            'city.required' => 'Een plaats is verplicht.',
////            'city.string' => 'De plaats moet een tekst zijn.',
////            'city.max' => 'De plaats mag niet meer dan 255 tekens bevatten.',
////
////            // Uren Validatie
////            'hours.required' => 'Het aantal uren per week is verplicht.',
////            'hours.numeric' => 'Het aantal uren moet een numerieke waarde zijn.',
////            'hours.min' => 'Het aantal uren mag niet kleiner zijn dan 0.',
////
////            // Contract Type Validatie
////            'contract_type.required' => 'Het type contract is verplicht.',
////            'contract_type.string' => 'Het type contract moet een tekst zijn.',
////
////            // Beschrijving Validatie
////            'description.string' => 'De beschrijving moet een tekst zijn.',
////
////            // Vereisten Validatie
////            'requirement.string' => 'De vereisten moeten een tekst zijn.',
////
////            // Afbeelding Validatie
////            'image_url.image' => 'Het geüploade bestand moet een afbeelding zijn.',
////            'image_url.max' => 'De afbeelding mag niet groter zijn dan 2 MB.',
////
////            // Wachtende Validatie
////            'waiting.integer' => 'Het aantal wachtende moet een geheel getal zijn.',
////            'waiting.min' => 'Het aantal wachtende mag niet kleiner zijn dan 0.',
////
////            // Beschikbare Posities Validatie
////            'available_positions.integer' => 'Het aantal beschikbare posities moet een geheel getal zijn.',
////            'available_positions.min' => 'Het aantal beschikbare posities mag niet kleiner zijn dan 0.',
////
////            // Werkgever-ID Validatie
////            'employer_id.integer' => 'De werkgever-ID moet een geheel getal zijn.',
////            'employer_id.min' => 'De werkgever-ID mag niet kleiner zijn dan 0.',
////        ]
//);
//
//
//
//
//        $vacancy = new Vacancy();
//        $employerId = auth()->user()->employer_id;
//
////        insert into "vacancies" ("name", "salary", "location", "hours", "contract_type", "description", "requirement", "waiting", "available_positions", "employer_id", "updated_at", "created_at")
////        values (Dawn Peck, Sed ipsum sequi sed, Sint deleniti fugit, 17, full-time, Porro voluptatum fug, ?, 1, 1, 1, 2024-12-04 12:44:21, 2024-12-04 12:44:21)
//
//        // Afbeelding uploaden
//        if ($request->hasFile('image_url')) {
//            $nameOfFile = $request->file('image_url')->store('images', 'public'); // Geen slash aan het begin
//            $vacancy->image_url = $nameOfFile;
//        }
//
//
//        $vacancy->name = $request->input('name');
//        $vacancy->salary = $request->input('salary');
////        $vacancy->location = $request->input('location');
//        $vacancy->hours = $request->input('hours');
//        $vacancy->contract_type = $request->input('contract_type');
//        $vacancy->description = $request->input('description');
//        $vacancy->requirement = $request->input('requirement');
//        $vacancy->postalcode = $request->input('postalcode');
//        $vacancy->housenumber = $request->input('housenumber');
//        $vacancy->streetname = $request->input('streetname');
//        $vacancy->city = $request->input('city');
//
//// Check of de velden zijn ingevuld of stel een standaardwaarde in
//        $vacancy->waiting = $request->input('waiting', 3); // Standaardwaarde 3
//        $vacancy->available_positions = $request->input('available_positions', 1); // Standaardwaarde null
//        $vacancy->employer_id = $employerId;
//
////        dd($vacancy);
//        $vacancy->save();
//
//
//        return redirect()->route('mijn-vacatures.index');
//
//    }

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
            'image_url' => 'nullable|image|max:2048', // Alleen afbeeldingen tot 2MB toegestaan
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
