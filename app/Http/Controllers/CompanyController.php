<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // CompanyController.php

    public function index()
    {
        $user = Auth::user();

        // Kijk of de gebruiker al een bedrijfspagina heeft
        $profile = Profile::where('employer_id', $user->employer_id)->first();

        if (!$profile) {
            // Als de gebruiker geen profiel heeft, stuur hem naar de create pagina
            return redirect()->route('company.create');
        }

        // Haal de vacatures van het bedrijf op
        $vacancies = Vacancy::where('employer_id', $user->employer_id)->get();

        return view('company.index', compact('vacancies', 'profile'));
    }

    public function create()
    {
        return view('company.create'); // Toon het formulier om een bedrijfspagina te maken
    }

    public function store(Request $request)
    {
        $profile = new Profile(); // Gebruik Profile in plaats van Company

        // Validatie
        $request->validate([
            'title' => 'required|string|max:28', // Max 100 karakters: Een titel hoeft meestal niet langer te zijn.
            'description' => 'required|string|max:500', // Max 500 karakters: Een beschrijving kan langer zijn, maar te lange teksten worden vaak onoverzichtelijk.
            'image_url' => 'required|image|max:2048', // Max 5MB (5120 KB): Veel afbeeldingen hebben een hogere resolutie en grotere bestandsgrootte.
            'city' => 'required|string|max:25', // Max 100 karakters: Stedenamen zijn meestal kort, maar een iets ruimere limiet houdt uitzonderingen in gedachten.
        ], [
            // Aangepaste foutmeldingen
            'title.required' => 'De titel is verplicht.',
            'title.string' => 'De titel moet een tekst zijn.',
            'title.max' => 'De titel mag maximaal 100 karakters bevatten.',

            'description.string' => 'De beschrijving moet een tekst zijn.',
            'description.max' => 'De beschrijving mag maximaal 500 karakters bevatten.',

            'image_url.image' => 'Het geüploade bestand moet een afbeelding zijn.',
            'image_url.max' => 'De afbeelding mag niet groter zijn dan 5 MB.',

            'city.required' => 'De stad is verplicht.',
            'city.string' => 'De stad moet een tekst zijn.',
            'city.max' => 'De naam van de stad mag maximaal 100 karakters bevatten.',
        ]);

        // Afbeelding uploaden
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('images', 'public');
            $profile->image_url = $imagePath; // Alleen het relatieve pad opslaan
        }


        // Vul de andere velden in
        $profile->title = $request->input('title');
        $profile->description = $request->input('description');
        $profile->city = $request->input('city');
        $profile->employer_id = auth()->user()->employer_id;  // Zorg ervoor dat je de employer_id instelt
        // Sla het profiel op
        $profile->save();

        return redirect()->route('company.index'); // Verwijst naar een profieloverzicht, pas de route aan indien nodig
    }

    public function edit()
    {
        $user = Auth::user();
        $profile = Profile::where('employer_id', $user->employer_id)->first();

        if (!$profile) {
            return redirect()->route('company.create');
        }

        return view('company.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::where('employer_id', $user->employer_id)->first();

        if (!$profile) {
            return redirect()->route('company.create');
        }

        // Validatie
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|image|max:2048',
            'city' => 'required|string|max:255',
        ]);

        // Afbeelding uploaden
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('images', 'public');
            $profile->image_url = $imagePath;
        }

        // Velden updaten
        $profile->title = $request->input('title');
        $profile->description = $request->input('description');
        $profile->city = $request->input('city');

        $profile->save();

        return redirect()->route('company.index')->with('success', 'Bedrijfspagina bijgewerkt.');
    }

}
