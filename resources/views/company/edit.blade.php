<x-layout>
    @section('title', 'Bewerk je bedrijfspagina')
    <div class="flex justify-center items-center min-h-screen bg-gray-100 pt-12 pb-16">
        <div class="bg-white shadow-lg rounded-xl p-12 w-full max-w-2xl">
            <!-- Titel -->
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-4">Bewerk je bedrijfspagina</h2>

            <form action="{{ route('company.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Bedrijfstitel -->
                <div class="mb-8">
                    <label for="title" class="block text-gray-700 font-medium mb-2">Bedrijfstitel <span class="text-violetOH-500">*</span></label>
                    <input id="title" name="title" type="text"
                           class="block w-full h-14 px-4 border @error('title') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200"
                           value="{{ old('title', $profile->title) }}" required>
                    @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stad -->
                <div class="mb-8">
                    <label for="city" class="block text-gray-700 font-medium mb-2">Stad <span class="text-violetOH-500">*</span></label>
                    <input id="city" name="city" type="text"
                           class="block w-full h-14 px-4 border @error('city') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200"
                           value="{{ old('city', $profile->city) }}" required>
                    @error('city')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Beschrijving -->
                <div class="mb-8">
                    <label for="description" class="block text-gray-700 font-medium mb-2">Beschrijving <span class="text-violetOH-500">*</span></label>
                    <textarea id="description" name="description" rows="5"
                              class="block w-full px-4 py-3 border @error('description') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-lg text-gray-800 focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200"
                              required>{{ old('description', $profile->description) }}</textarea>
                    @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Afbeelding -->
                <div class="mb-8">
                    <label for="image_url" class="block text-gray-700 font-medium mb-2">Upload een afbeelding <span class="text-violetOH-500">*</span></label>
                    <input id="image_url" name="image_url" type="file"
                           class="block w-full px-4 py-2 border @error('image_url') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-lg focus:border-violetOH-500 focus:ring-2 focus:ring-violetOH-500 focus:outline-none transition duration-200">
                    @error('image_url')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Opslaan knop -->
                <button type="submit"
                        class="w-full bg-violetOH-500 hover:bg-violetOH-600 text-white font-bold px-6 py-3 rounded-lg shadow-md focus:ring-2 focus:ring-violetOH-500 focus:ring-offset-2 focus:outline-none transition duration-200">
                    Opslaan
                </button>
            </form>
        </div>
    </div>
</x-layout>
