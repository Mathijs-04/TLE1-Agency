<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        // Flash succesbericht
        session()->flash('success', 'Je profiel is succesvol bijgewerkt!');

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        // Valideer het formulier
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Werk het wachtwoord bij
        auth()->user()->update([
            'password' => bcrypt($request->password),
        ]);

        // Stel succesbericht in
        session()->flash('success', 'Je wachtwoord is succesvol bijgewerkt!');

        // Redirect naar de profielpagina
        return redirect()->route('profile.edit');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();

        // Verwijder de gebruiker
        $user->delete();

        // Log de gebruiker uit
        Auth::logout();

        // Redirect naar de homepagina
        return redirect()->route('home')->with('status', 'Je account is succesvol verwijderd.');
    }
}
