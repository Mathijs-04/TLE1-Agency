<x-layout>
    <body class="bg-gray-100">
    <div class="flex justify-center items-center min-h-screen bg-gray-100 pt-16 pb-16">
        <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-3xl">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Bewerk Profiel</h2>

            <!-- Succes Bericht -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-500 text-green-700 p-4 rounded-lg mb-6">
                    <p class="text-center font-semibold">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Profiel Bewerken Formulier -->
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <!-- Invoervelden -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Naam Veld -->
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">Naam</label>
                        <input id="name" name="name" type="text" value="{{ old('name', auth()->user()->name) }}"
                               class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:border-violet-500 focus:ring-2 focus:ring-violet-500 focus:outline-none transition duration-200" required>
                        @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- E-mail Veld -->
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">E-mail</label>
                        <input id="email" name="email" type="email" value="{{ old('email', auth()->user()->email) }}"
                               class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:border-violet-500 focus:ring-2 focus:ring-violet-500 focus:outline-none transition duration-200" required>
                        @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Profiel Opslaan Knop -->
                <div class="flex justify-end mb-6">
                    <button type="submit" class="bg-violetOH-500 hover:bg-violetOH-600 text-white font-bold px-6 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-violet-500">
                        Opslaan
                    </button>
                </div>
            </form>

            <!-- Wachtwoord Wijzigen Sectie -->
            <hr class="my-6">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <!-- Wachtwoord Velden -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Huidig Wachtwoord -->
                    <div>
                        <label for="current_password" class="block text-gray-700 font-medium mb-2">Huidig Wachtwoord</label>
                        <input id="current_password" name="current_password" type="password"
                               class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:border-violet-500 focus:ring-2 focus:ring-violet-500 focus:outline-none transition duration-200" required>
                        @error('current_password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nieuw Wachtwoord -->
                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2">Nieuw Wachtwoord</label>
                        <input id="password" name="password" type="password"
                               class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:border-violet-500 focus:ring-2 focus:ring-violet-500 focus:outline-none transition duration-200" required>
                        <p class="text-sm text-gray-500 mt-2">Het wachtwoord moet minimaal 8 tekens bevatten.</p>
                        @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Bevestig Nieuw Wachtwoord -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Bevestig Nieuw Wachtwoord</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                           class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:border-violet-500 focus:ring-2 focus:ring-violet-500 focus:outline-none transition duration-200" required>
                    @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Wijzig Wachtwoord Knop -->
                <div class="flex justify-end mb-6">
                    <button type="submit" class="bg-violetOH-500 hover:bg-violetOH-600 text-white font-bold px-6 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-violet-500">
                        Wijzig Wachtwoord
                    </button>
                </div>
            </form>

            <!-- Account Verwijderen Sectie -->
            <hr class="my-6">
            <form method="POST" action="{{ route('profile.destroy') }}" id="delete-account-form">
                @csrf
                @method('DELETE')

                <!-- Verwijder Account Waarschuwing -->
                <div class="bg-red-50 border border-red-500 text-red-500 rounded-lg p-4 mb-6">
                    <h3 class="text-xl font-bold text-center">Account Verwijderen</h3>
                    <p class="text-center mt-2">Als je je account verwijdert, zullen al je gegevens permanent verloren gaan.</p>

                    <!-- Verwijder Account Knop -->
                    <div class="flex justify-center mt-4">
                        <button type="button" onclick="confirmDelete()" class="bg-red-500 hover:bg-red-600 text-white font-bold px-6 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-red-500">
                            Verwijder Account
                        </button>
                    </div>
                </div>
            </form>

            <script>
                function confirmDelete() {
                    // Bevestigingspop-up
                    const userConfirmed = confirm("Weet u zeker dat u dit account wilt verwijderen? Dit kan niet ongedaan worden gemaakt.");

                    if (userConfirmed) {
                        // Verzenden van het formulier als de gebruiker 'Ja' kiest
                        document.getElementById('delete-account-form').submit();
                    }
                }
            </script>

        </div>
    </div>
    </body>
</x-layout>
