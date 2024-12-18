<x-layout>
    @section('title', 'Maak je Bedrijfspagina')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-xl p-12 w-full max-w-2xl">
            <!-- Titel -->
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-4">Maak je Bedrijfspagina</h2>
            <p class="text-center text-gray-500 mb-10">Vul de onderstaande gegevens in om je pagina te maken</p>

            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Bedrijfstitel -->
                <div class="mb-8">
                    <label for="title" class="block text-gray-700 font-medium mb-2">Bedrijfstitel <span class="text-violetOH-500">*</span></label>
                    <input id="title" name="title" type="text"
                           class="block w-full h-14 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200"
                           placeholder="Voer de titel van je bedrijf in" value="{{ old('title') }}" required autofocus>
                    @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stad -->
                <div class="mb-8">
                    <label for="city" class="block text-gray-700 font-medium mb-2">Stad <span class="text-violetOH-500">*</span></label>
                    <input id="city" name="city" type="text"
                           class="block w-full h-14 px-4 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200"
                           placeholder="Voer de stad in" value="{{ old('city') }}">
                    @error('city')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Beschrijving -->
                <div class="mb-8">
                    <label for="description" class="block text-gray-700 font-medium mb-2">Beschrijving <span class="text-violetOH-500">*</span></label>
                    <textarea id="description" name="description" rows="8"
                              class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200"
                              placeholder="Voeg een beschrijving toe van je bedrijf" required>{{ old('description') }}</textarea>
                    @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Afbeelding URL -->
                <div class="mb-8">
                    <label for="image_url" class="block text-gray-700 font-medium mb-2">Upload een afbeelding <span class="text-violetOH-500">*</span></label>
                    <input id="image_url" name="image_url" type="file">
                    @error('image_url')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actie -->
                <div class="flex items-center justify-between">
                    <button type="submit"
                            class="bg-violetOH-500 hover:bg-violetOH-600 text-white font-bold px-8 py-3 rounded-lg shadow-md focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200">
                        Maak Bedrijfspagina
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
