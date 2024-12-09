<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

    <div class="mb-6">
        <label for="name" class="block text-gray-700 font-medium mb-2">Naam</label>
        <input id="name" name="name" type="text" value="{{ old('name', auth()->user()->name) }}"
               class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200" required>
        @error('name')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="email" class="block text-gray-700 font-medium mb-2">E-mail</label>
        <input id="email" name="email" type="email" value="{{ old('email', auth()->user()->email) }}"
               class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200" required>
        @error('email')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center justify-between mb-6">
        <x-primary-button class="bg-violetOH-500 hover:bg-violetOH-600 text-white font-bold px-6 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-violetOH-500">
            Opslaan
        </x-primary-button>
    </div>
</form>
