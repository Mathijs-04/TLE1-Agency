<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Registreren</title>
</head>
<body>

<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <!-- Register Card -->
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <a href="/" id="register-OH-logo">
                <img src="{{ Vite::asset('resources/images/Logo.png') }}" alt="Logo" class="h-18">
            </a>
        </div>

        <!-- Titel -->
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-2">Maak een account aan!</h2>
        <p class="text-center text-gray-500 mb-8">Vul de gegevens in om verder te gaan</p>

        <!-- Session Status -->
        <div id="session-status" class="mb-4 text-center text-sm text-green-600">
            <!-- Voeg hier een statusbericht in als nodig -->
        </div>

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-medium mb-2">Naam</label>
                <input id="name" name="name" type="text"
                       class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200"
                       placeholder="Voer je naam in" value="{{ old('name') }}" required autofocus>
                @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-6">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input id="email" name="email" type="email"
                       class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200"
                       placeholder="Voer je email in" value="{{ old('email') }}" required>
                @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-medium mb-2">Wachtwoord</label>
                <input id="password" name="password" type="password"
                       class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200"
                       placeholder="Voer je wachtwoord in" required>
                <p class="mt-1 text-sm text-gray-600">Wachtwoord moet minimaal 8 karakters lang zijn.</p>
                @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Bevestig Wachtwoord</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                       class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200"
                       placeholder="Bevestig je wachtwoord" required>
                @error('password_confirmation')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Actions -->
            <div class="flex items-center justify-between mb-6">
                <a href="{{ route('login') }}" class="text-sm text-violetOH-500 hover:underline font-medium">
                    Al een account? Inloggen
                </a>

                <button type="submit"
                        class="bg-violetOH-500 hover:bg-violetOH-600 text-white font-bold px-6 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200">
                    Registreren
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
