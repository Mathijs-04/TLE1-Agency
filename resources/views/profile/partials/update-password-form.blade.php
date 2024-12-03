<form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('PUT')

    <div class="mb-6">
        <label for="current_password" class="block text-gray-700 font-medium mb-2">Huidig Wachtwoord</label>
        <input id="current_password" name="current_password" type="password" class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200" required>
        @error('current_password')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="password" class="block text-gray-700 font-medium mb-2">Nieuw Wachtwoord</label>
        <input id="password" name="password" type="password" class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200" required>
        @error('password')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Bevestig Nieuw Wachtwoord</label>
        <input id="password_confirmation" name="password_confirmation" type="password" class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200" required>
        @error('password_confirmation')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center justify-between mb-6">
        <x-primary-button class="bg-violetOH-500 hover:bg-violetOH-600 text-white font-bold px-6 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-violetOH-500">
            Wijzig Wachtwoord
        </x-primary-button>
    </div>
</form>
