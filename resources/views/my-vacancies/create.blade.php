<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create vacancy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')
</head>
<body>


<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <!-- Main Card Wrapper -->
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">

        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Nieuwe vacature aanmaken</h2>
            <p class="font-custom font-normal">Na het invullen van de velden kunt u eerst een preview bekijken voordat u de vacature plaatst.</p>
            <div>
                <form action="{{ route('my-vacancies.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                        {{--                     Naam van de vacature--}}
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titel</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-[#AA0061] focus:border-[#AA0061]" placeholder="Voer de titel van de vacature in" required="">
                        </div>

                        {{--                     Salaris indicatie--}}
                        <div class="sm:col-span-2">
                            <label for="salary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salaris indicatie</label>
                            <input type="text" name="salary" id="salary" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#AA0061] focus:border-[#AA0061]" placeholder="Bijvoorbeeld: €2.500 - €3.000 bruto per maand" required="">
                        </div>

                        {{--                     Locatie--}}
                        <div class="sm:col-span-2">
                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Locatie</label>
                            <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#AA0061] dark:focus:border-[#AA0061]" placeholder="Bijvoorbeeld: Stationsstraat 12, 1012 AB Amsterdam" required="">
                        </div>

                        {{--                     Uren per week--}}
                        <div class="sm:col-span-2">
                            <label for="hours" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uren per week</label>
                            <input type="number" name="hours" id="hours" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#AA0061]0 dark:focus:border-[#AA0061]" placeholder="Voer het aantal uren per week in" required="">
                        </div>

                        {{--                     Contract type--}}
                        <div class="sm:col-span-2">
                            <label for="contract_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contract type</label>
                            <select name="contract_type" id="contract_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#AA0061] dark:focus:border-[#AA0061]">
                                <option selected="">Selecteer het type contract</option>
                                <option value="full-time">full-time</option>
                                <option value="part-time">part-time</option>
                            </select>
                        </div>

                        {{--                     Tekstvak voor beschrijving--}}
                        <div class="sm:col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beschrijving</label>
                            <textarea name="description" id="description" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#AA0061] focus:border-[#AA0061] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#AA0061] dark:focus:border-[#AA0061]" placeholder="Voer een beschrijving van de functie in"></textarea>
                        </div>


                        {{--                    Aanvullende eisen checkbox--}}
                        <div class="sm:col-span-2 mt-4">
                            <label for="requirement" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Voeg een vereiste toe...</label>
                            <!-- Container voor dynamische checkboxes -->
                            <div id="checkboxContainer" class="space-y-4">
                                <!-- Start met één checkbox -->
                                <div class="flex items-center space-x-3">
                                    <input type="checkbox" class="w-5 h-5 bg-gray-50 border border-gray-300 text-primary-500 rounded focus:ring-[#AA0061] focus:ring-[#AA0061] dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-[#AA0061] dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"/>
                                    <input type="text" placeholder="Bijvoorbeeld: Rijbewijs" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#AA0061] focus:border-[#AA0061] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"/>
                                </div>
                            </div>

                            <!-- Knop om nieuwe checkbox toe te voegen -->
                            <button id="addCheckboxBtn" type="button" class="mt-4 w-[150px] bg-primary-500 text-white font-medium text-xs rounded-lg px-2 py-1.5 hover:bg-primary-600 focus:outline-none focus:ring-[#AA0061] focus:ring-[#AA0061] dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Extra veld
                            </button>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', () => {
                                // Selecteer de container en de knop
                                const checkboxContainer = document.getElementById('checkboxContainer');
                                const addCheckboxBtn = document.getElementById('addCheckboxBtn');

                                // Controleer of beide elementen bestaan
                                if (checkboxContainer && addCheckboxBtn) {
                                    // Eventlistener voor de knop
                                    addCheckboxBtn.addEventListener('click', () => {
                                        // Maak een nieuw div-element voor de nieuwe checkbox en invoerveld
                                        const newCheckboxDiv = document.createElement('div');
                                        newCheckboxDiv.classList.add('flex', 'items-center', 'space-x-3');

                                        // Voeg de checkbox toe
                                        const newCheckbox = document.createElement('input');
                                        newCheckbox.type = 'checkbox';
                                        newCheckbox.classList.add(
                                            'w-5',
                                            'h-5',
                                            'bg-gray-50',
                                            'border',
                                            'border-gray-300',
                                            'text-primary-500',
                                            'rounded',
                                            'focus:ring-primary-500',
                                            'focus:ring-2',
                                            'dark:bg-gray-700',
                                            'dark:border-gray-600',
                                            'dark:focus:ring-primary-500',
                                            'dark:ring-offset-gray-800',
                                            'dark:focus:ring-offset-gray-800'
                                        );

                                        // Voeg het invoerveld toe
                                        const newInput = document.createElement('input');
                                        newInput.type = 'text';
                                        newInput.placeholder = 'Bijvoorbeeld: Rijbewijs';
                                        newInput.classList.add(
                                            'block',
                                            'w-full',
                                            'text-sm',
                                            'text-gray-900',
                                            'bg-gray-50',
                                            'rounded-lg',
                                            'border',
                                            'border-gray-300',
                                            'focus:ring-primary-500',
                                            'focus:border-primary-500',
                                            'p-2.5',
                                            'dark:bg-gray-700',
                                            'dark:border-gray-600',
                                            'dark:placeholder-gray-400',
                                            'dark:text-white',
                                            'dark:focus:ring-primary-500',
                                            'dark:focus:border-primary-500'
                                        );

                                        // Voeg de checkbox en het invoerveld toe aan het div-element
                                        newCheckboxDiv.appendChild(newCheckbox);
                                        newCheckboxDiv.appendChild(newInput);

                                        // Voeg het nieuwe div-element toe aan de container
                                        checkboxContainer.appendChild(newCheckboxDiv);
                                    });
                                } else {
                                    console.error('Checkbox container of add button not found.');
                                }
                            });
                        </script>


                        {{--                    Afbeelding uploaden--}}
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image_url">Afbeelding uploaden</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-[#AA0061] dark:placeholder-gray-400" aria-describedby="upload_image" id="image_url" name="image_url" type="file">
                        </div>
                    </div>


                    <div class="flex justify-center items-center mt-4">
                        <button id="previewButton" type="button" class="w-48 bg-[#AA0061] text-white font-medium text-sm rounded-lg px-4 py-2 hover:bg-[#88004E] focus:outline-none focus:ring-2 focus:ring-[#AA0061] dark:focus:ring-[#88004E]">
                            Preview
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div></div>


</body>
</html>


