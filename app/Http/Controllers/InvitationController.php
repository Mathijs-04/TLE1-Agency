<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\InviteMail; // Voeg dit toe voor de InviteMail class
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my-invitations');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    // EMAIL API
    public function sendTestEmail(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'dates' => 'required|array',
            'times' => 'required|array',
        ]);

        // Haal de gebruiker op uit de database
        $user = User::findOrFail($request->input('user_id'));

        // Bouw de details voor de uitnodiging
        $details = [];
        foreach ($request->input('dates') as $index => $date) {
            $details[] = [
                'number' => $index + 1,
                'date' => $date,
                'time' => $request->input('times')[$index],
            ];
        }

        // Verstuur de e-mail naar het e-mailadres van de gebruiker
        Mail::to($user->email)->send(new InviteMail($details));

        return view('bevestiging');
//        return back()->with('success', "Bevestigingsmail is verzonden naar {$user->email}.");

    }

    // Haalt de vacature en ingelogde gebruiker op en toont het uitnodigingsformulier.
    public function showInviteForm($vacancyId)
    {
        $vacancy = Vacancy::findOrFail($vacancyId); // Haal de vacature op
        $user = Auth::user(); // Haal de ingelogde gebruiker op

        return view('invite', [
            'vacancy' => $vacancy, // Stuur de vacature mee naar de view
            'user' => $user, // Stuur de ingelogde gebruiker mee naar de view
        ]);
    }

}
