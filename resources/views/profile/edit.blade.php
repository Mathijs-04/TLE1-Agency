<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Profiel Bewerken</title>
</head>
<body class="bg-gray-100">

<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Bewerk Profiel</h2>

        <!-- Profile Edit Form -->
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <!-- Name Field -->
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-medium mb-2">Naam</label>
                <input id="name" name="name" type="text" value="{{ old('name', auth()->user()->name) }}"
                       class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200" required>
                @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="mb-6">
                <label for="email" class="block text-gray-700 font-medium mb-2">E-mail</label>
                <input id="email" name="email" type="email" value="{{ old('email', auth()->user()->email) }}"
                       class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200" required>
                @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Update Profile Button -->
            <div class="flex items-center justify-between mb-6">
                <x-primary-button class="bg-violetOH-500 hover:bg-violetOH-600 text-white font-bold px-6 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-violetOH-500">
                    Opslaan
                </x-primary-button>
            </div>
        </form>

        <!-- Change Password Section -->
        <hr class="my-6">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            <!-- Current Password -->
            <div class="mb-6">
                <label for="current_password" class="block text-gray-700 font-medium mb-2">Huidig Wachtwoord</label>
                <input id="current_password" name="current_password" type="password" class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200" required>
                @error('current_password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- New Password -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-medium mb-2">Nieuw Wachtwoord</label>
                <input id="password" name="password" type="password" class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200" required>
                @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm New Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Bevestig Nieuw Wachtwoord</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200" required>
                @error('password_confirmation')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Change Password Button -->
            <div class="flex items-center justify-between mb-6">
                <x-primary-button class="bg-violetOH-500 hover:bg-violetOH-600 text-white font-bold px-6 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-violetOH-500">
                    Wijzig Wachtwoord
                </x-primary-button>
            </div>
        </form>

        <!-- Delete Account Section -->
        <hr class="my-6">
        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('DELETE')

            <!-- Delete Account Warning -->
            <div class="bg-red-50 border border-red-500 text-red-500 rounded-lg p-4 mb-6">
                <h3 class="text-xl font-bold text-center">Account Verwijderen</h3>
                <p class="text-center mt-2">Als je je account verwijdert, zullen al je gegevens permanent verloren gaan.</p>

                <div class="mt-6 text-center">
                    <x-primary-button class="bg-red-500 hover:bg-red-600 text-white font-bold px-6 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-red-500">
                        Verwijder Account
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
