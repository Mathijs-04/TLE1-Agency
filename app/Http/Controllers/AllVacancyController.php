<?php

// In app/Http/Controllers/AllVacancyController.php
namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class AllVacancyController extends Controller
{
    // Haal alle vacatures op
    public function index()
    {
        $vacancies = Vacancy::orderBy('created_at', 'desc')->get();
        return view('vacatures', compact('vacancies'));
    }

    public function show($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        // Controleer of de sessie al een 'origin_url' heeft
        if (!session()->has('origin_url')) {
            // Sla de vorige URL op in de sessie
            if (request()->headers->get('referer')) {
                session(['origin_url' => url()->previous()]);
            }
        }
        return view('detail-vacancies', compact('vacancy'));
    }


}





