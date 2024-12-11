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
        $vacancies = Vacancy::all();  // Haal alle vacatures zonder werkgever
        return view('vacatures', compact('vacancies'));
    }


}





