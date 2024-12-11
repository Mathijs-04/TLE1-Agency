<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-xl p-8 m-8 w-full max-w-md">
            <div class="mx-auto max-w-2xl">
                <h2 class="mb-2 text-xl font-bold text-gray-900">Nieuwe vacature aanmaken</h2>
                <p class="mb-4">Na het invullen van de velden kunt u eerst een preview bekijken
                    voordat u de vacature plaatst.</p>
                <div>
                    {{-- Formulier --}}
                    <form action="{{ route('mijn-vacatures.store') }}" method="post" enctype="multipart/form-data">
                        <p><strong class="text-violetOH-500">*</strong> = verplicht</p>
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            @csrf
                            {{-- Naam van de vacature --}}
                            <div class="sm:col-span-2">
                                <label for="name" class="block mt-4 mb-2 text-sm font-medium text-gray-900">Titel <span class="text-violetOH-500">*</span> </label>
                                <input type="text" name="name" id="name"
                                       class="bg-gray-50 border @error('name') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: Vulploeg medewerker Jumbo" required=""
                                       value="{{ old('name') }}">
                                @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Salaris indicatie --}}
                            <div class="sm:col-span-2">
                                <label for="salary" class="block mb-2 text-sm font-medium text-gray-900">Salaris indicatie <span class="text-violetOH-500">*</span> </label>
                                <input type="number" min="0" name="salary" id="salary"
                                       class="bg-gray-50 border @error('salary') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: €2.500 - €3.000 bruto per maand" required=""
                                       value="{{ old('salary') }}">
                                @error('salary')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Postcode --}}
                            <div class="">
                                <label for="postcode" class="block mb-2 text-sm font-medium text-gray-900">Postcode <span class="text-violetOH-500">*</span> </label>
                                <input type="text" name="postalcode" id="postcode"
                                       class="bg-gray-50 border @error('postcode') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: 1012 AB" required=""
                                       value="{{ old('postalcode') }}">
                                @error('postcode')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Huisnummer --}}
                            <div class="">
                                <label for="housenumber" class="block mb-2 text-sm font-medium text-gray-900">Huisnummer <span class="text-violetOH-500">*</span> </label>
                                <input type="text" name="housenumber" id="housenumber"
                                       class="bg-gray-50 border @error('housenumber') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: 12" required=""
                                       value="{{ old('housenumber') }}">
                                @error('housenumber')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Straatnaam --}}
                            <div class=" sm:col-span-2">
                                <label for="streetname" class="block mb-2 text-sm font-medium text-gray-900">Straatnaam <span class="text-violetOH-500">*</span> </label>
                                <input type="text" name="streetname" id="streetname"
                                       class="bg-gray-50 border @error('streetname') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: Stationsstraat" required=""
                                       value="{{ old('streetname') }}">
                                @error('streetname')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Plaats --}}
                            <div class="sm:col-span-2">
                                <label for="city" class="block mb-2 text-sm font-medium text-gray-900">Plaats <span class="text-violetOH-500">*</span> </label>
                                <input type="text" name="city" id="city"
                                       class="bg-gray-50 border @error('city') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: Amsterdam" required=""
                                       value="{{ old('city') }}">
                                @error('city')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Aantal uren --}}
                            <div class="sm:col-span-2">
                                <label for="hours" class="block mb-2 text-sm font-medium text-gray-900">Uren per week <span class="text-violetOH-500">*</span></label>
                                <input type="number" name="hours" id="hours" min="0"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: 40 uur" required="">
                                @error('hours')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Contract type --}}
                            <div class="sm:col-span-2">
                                <label for="contract_type" class="block mb-2 text-sm font-medium text-gray-900">Contract type <span class="text-violetOH-500">*</span></label>
                                <select name="contract_type" id="contract_type"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5">
                                    <option selected="">Selecteer het type contract</option>
                                    <option value="full-time">full-time</option>
                                    <option value="part-time">part-time</option>
                                </select>
                            </div>

                            {{-- Beschrijving --}}
                            <div class="sm:col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Beschrijving <span class="text-violetOH-500">*</span> </label>
                                <textarea id="description" name="description" rows="6"
                                          class="bg-gray-50 border @error('description') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                          placeholder="Beschrijf hier de functie">{{ old('description') }}</textarea>
                                @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Aanvullende eisen (optioneel) --}}
                            <div class="sm:col-span-2">
                                <label for="requirements" class="block mb-2 text-sm font-medium text-gray-900">Aanvullende eisen (optioneel)</label>
                                <p class="mb-2 text-sm text-gray-600">Bijvoorbeeld: Rijbewijs B, MBO-Niveau 4, Nederlandse taal, Veel lopen.</p>
                                <div id="inputContainer" class="space-y-4">
                                    <div class="flex items-center space-x-3">
                                        <input type="text" name="requirements[]" placeholder="Bijvoorbeeld: Rijbewijs B"
                                               class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#AA0061] focus:border-[#AA0061] p-2.5">
                                    </div>
                                </div>
                            </div>
                            <button id="addInputBtn" type="button"
                                    class="mt-0 w-[150px] bg-[#AA0061] text-white font-medium text-xs rounded-lg px-2 py-1.5 hover:bg-primary-600 focus:outline-none focus:ring-[#AA0061] focus:ring-[#AA0061]">
                                Extra veld
                            </button>

                            <script>
                                document.addEventListener('DOMContentLoaded', () => {
                                    const inputContainer = document.getElementById('inputContainer');
                                    const addInputBtn = document.getElementById('addInputBtn');

                                    if (inputContainer && addInputBtn) {
                                        addInputBtn.addEventListener('click', () => {
                                            const newInputDiv = document.createElement('div');
                                            newInputDiv.classList.add('flex', 'items-center', 'space-x-3');

                                            const newInput = document.createElement('input');
                                            newInput.type = 'text';
                                            newInput.name = 'requirements[]';
                                            newInput.placeholder = 'Bijvoorbeeld: Rijbewijs';
                                            newInput.classList.add('block', 'w-full', 'text-sm', 'text-gray-900', 'bg-gray-50', 'rounded-lg', 'border', 'border-gray-300', 'focus:ring-primary-500', 'focus:border-primary-500', 'p-2.5');

                                            newInputDiv.appendChild(newInput);
                                            inputContainer.appendChild(newInputDiv);
                                        });
                                    } else {
                                        console.error('Input container of button niet gevonden.');
                                    }
                                });
                            </script>
                            {{-- Afbeelding uploaden --}}
                            <div class="sm:col-span-2">
                                <label class="block mt-2 mb-0 text-sm font-medium text-gray-900" for="image_url">Afbeelding  uploaden (optioneel)</label>
                                <p class="mb-2 text-sm text-gray-600">

                                </p>                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="Banner van de vacature uploaden"
                                    id="image_url" name="image_url" type="file">
                            </div>

                        </div>

                        <div class="flex justify-center items-center mt-4">
                            <button id="previewButton" type="submit"
                                    class="w-48 bg-[#AA0061] text-white font-medium text-sm rounded-lg px-4 py-2 hover:bg-[#88004E] focus:outline-none focus:ring-2 focus:ring-[#AA0061]">
                                Aanmaken
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
