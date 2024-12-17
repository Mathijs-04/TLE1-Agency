<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\InviteMail; // Voeg dit toe voor de InviteMail class
use Illuminate\Http\Request;

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

    public function showInviteForm($vacancyId)
    {
        $vacancy = Vacancy::findOrFail($vacancyId);
        return view('invite', ['vacancy' => $vacancy]);
    }


    // EMAIL API
    public function sendTestEmail(Request $request)
    {
        $dates = $request->input('dates');
        $times = $request->input('times');

        // Bouw een array met de nodige informatie voor de e-mail
        $details = [];
        foreach ($dates as $index => $date) {
            $details[] = [
                'number' => $index + 1,
                'date' => $date,
                'time' => $times[$index],
            ];
        }

        // Verstuur de e-mail met de details
        Mail::to('1073412@hr.nl')->send(new InviteMail($details));

        return back()->with('success', 'Bevestigingsmail is verzonden naar 1073412@hr.nl');
    }

}
