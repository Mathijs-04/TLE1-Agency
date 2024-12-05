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
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            @csrf
                            {{-- Naam van de vacature --}}
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Titel</label>
                                <input type="text" name="name" id="name"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: Vulploeg medewerker Jumbo" required="">
                            </div>

                            {{-- Salaris indicatie --}}
                            <div class="sm:col-span-2">
                                <label for="salary" class="block mb-2 text-sm font-medium text-gray-900">Salaris
                                    indicatie</label>
                                <input type="text" name="salary" id="salary"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: €2.500 - €3.000 bruto per maand" required="">
                            </div>

                            {{-- Locatie --}}
                            <div class="sm:col-span-2">
                                <label for="location"
                                       class="block mb-2 text-sm font-medium text-gray-900">Locatie</label>
                                <input type="text" name="location" id="location"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: Stationsstraat 12, 1012 AB Amsterdam" required="">
                            </div>

                            {{-- Uren per week --}}
                            <div class="sm:col-span-2">
                                <label for="hours" class="block mb-2 text-sm font-medium text-gray-900">Uren per
                                    week</label>
                                <input type="number" name="hours" id="hours"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: 40 uur" required="">
                            </div>

                            {{-- Contract type --}}
                            <div class="sm:col-span-2">
                                <label for="contract_type" class="block mb-2 text-sm font-medium text-gray-900">Contract
                                    type</label>
                                <select name="contract_type" id="contract_type"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5">
                                    <option selected="">Selecteer het type contract</option>
                                    <option value="full-time">full-time</option>
                                    <option value="part-time">part-time</option>
                                </select>
                            </div>

                            {{-- Tekstvak voor beschrijving --}}
                            <div class="sm:col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Beschrijving</label>
                                <textarea name="description" id="description" rows="6"
                                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#AA0061] focus:border-[#AA0061]"
                                          placeholder="Voer een beschrijving van de functie in"></textarea>
                            </div>

                            {{-- Aanvullende eisen checkbox --}}
                            <div class="sm:col-span-2 mt-4">
                                <label for="requirement" class="block mb-2 text-sm font-medium text-gray-900">Aanvullende eisen (optioneel)</label>
                                <div id="checkboxContainer" class="space-y-4">
                                    <div class="flex items-center space-x-3">
                                        <input type="checkbox"
                                               class="w-5 h-5 bg-gray-50 border border-gray-300 text-primary-500 rounded focus:ring-[#AA0061] focus:ring-[#AA0061]"
                                        />
                                        <input type="text" placeholder="Bijvoorbeeld: Rijbewijs B"
                                               class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#AA0061] focus:border-[#AA0061] p-2.5"
                                               name="requirement"/>
                                    </div>
                                </div>
                                <button id="addCheckboxBtn" type="button"
                                        class="mt-4 w-[150px] bg-[#AA0061] text-white font-medium text-xs rounded-lg px-2 py-1.5 hover:bg-primary-600 focus:outline-none focus:ring-[#AA0061] focus:ring-[#AA0061]">
                                    Extra veld
                                </button>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', () => {
                                    const checkboxContainer = document.getElementById('checkboxContainer');
                                    const addCheckboxBtn = document.getElementById('addCheckboxBtn');

                                    if (checkboxContainer && addCheckboxBtn) {
                                        addCheckboxBtn.addEventListener('click', () => {
                                            const newCheckboxDiv = document.createElement('div');
                                            newCheckboxDiv.classList.add('flex', 'items-center', 'space-x-3');

                                            const newCheckbox = document.createElement('input');
                                            newCheckbox.type = 'checkbox';
                                            newCheckbox.classList.add('w-5', 'h-5', 'bg-gray-50', 'border', 'border-gray-300', 'text-primary-500', 'rounded', 'focus:ring-primary-500', 'focus:ring-2');

                                            const newInput = document.createElement('input');
                                            newInput.type = 'text';
                                            newInput.placeholder = 'Bijvoorbeeld: Rijbewijs';
                                            newInput.classList.add('block', 'w-full', 'text-sm', 'text-gray-900', 'bg-gray-50', 'rounded-lg', 'border', 'border-gray-300', 'focus:ring-primary-500', 'focus:border-primary-500', 'p-2.5');

                                            newCheckboxDiv.appendChild(newCheckbox);
                                            newCheckboxDiv.appendChild(newInput);

                                            checkboxContainer.appendChild(newCheckboxDiv);
                                        });
                                    } else {
                                        console.error('Checkbox container or add button not found.');
                                    }
                                });
                            </script>

                            {{-- Afbeelding uploaden --}}
                            <div class="sm:col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="image_url">Afbeelding vacature
                                    uploaden</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                    aria-describedby="Foto gaan uploaden" id="image_url" name="image_url" type="file">
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

