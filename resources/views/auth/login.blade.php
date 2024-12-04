<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Inloggen</title>
</head>
<body>

<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <!-- Login Card -->
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <a href="/" id="login-OH-logo">
                <img src="{{ Vite::asset('resources/images/Logo.png') }}" alt="Logo" class="h-18">
            </a>
        </div>

        <!-- Titel -->
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-2">Welkom Terug!</h2>
        <p class="text-center text-gray-500 mb-8">Log in om verder te gaan</p>

        <!-- Session Status -->
        <div id="session-status" class="mb-4 text-center text-sm text-green-600">
            <!-- Voeg hier een statusbericht in als nodig -->
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-6">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input id="email" name="email" type="email"
                       class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200"
                       placeholder="Voer je email in" required autofocus>
                <p class="mt-2 text-sm text-red-600">
                    <!-- Voeg hier een foutmelding toe als nodig -->
                </p>
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-medium mb-2">Wachtwoord</label>
                <input id="password" name="password" type="password"
                       class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200"
                       placeholder="Voer je wachtwoord in" required>
                <p class="mt-2 text-sm text-red-600">
                    <!-- Voeg hier een foutmelding toe als nodig -->
                </p>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-6">
                <input id="remember_me" name="remember" type="checkbox"
                       class="rounded border-gray-300 text-violetOH-500 focus:ring-violetOH-500 focus:outline-none">
                <label for="remember_me" class="ml-2 text-sm text-gray-600">Onthoud mij</label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mb-6">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-sm text-violetOH-500 hover:underline font-medium">
                        Wachtwoord vergeten?
                    </a>
                @endif

                <button type="submit"
                        class="bg-violetOH-500 hover:bg-violetOH-600 text-white font-bold px-6 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200">
                    Inloggen
                </button>
            </div>
        </form>

        <!-- Register Link -->
        <div class="mt-8 text-center">
            <p class="text-sm text-gray-600">
                Nog geen account?
                <a href="{{ route('register') }}" class="text-violetOH-500 font-bold hover:underline">Registreer hier</a>.
            </p>
        </div>
    </div>
</div>


</body>
</html>


