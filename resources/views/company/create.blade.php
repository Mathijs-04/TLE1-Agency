<x-layout>
    @section('title', 'Maak je Bedrijfspagina')
        <div class="container mx-auto p-4">
            <h2 class="text-xl font-bold mb-4">Maak je Bedrijfspagina</h2>

            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Bedrijfstitel</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving</label>
                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>{{ old('description') }}</textarea>
                    @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="image_url" class="block text-sm font-medium text-gray-700">Afbeelding URL (optioneel)</label>
                    <input type="file" id="image_url" name="image_url" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @error('image_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="city" class="block text-sm font-medium text-gray-700">Stad</label>
                    <input type="text" id="city" name="city" value="{{ old('city') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    @error('city') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-violetOH-500 text-white px-4 py-2 rounded-md">Maak Bedrijfspagina</button>
                </div>
            </form>
        </div>
</x-layout>
