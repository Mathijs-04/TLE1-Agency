<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create vacancy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Nieuwe vacature aanmaken</h2>
        <div>
            <form action="#">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titel</label>
                        <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Voer de titel van de vacature in" required="">
                    </div>
                    <div class="w-full">
                        <label for="salary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salaris indicatie</label>
                        <input type="text" name="salary" id="salary" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Bijvoorbeeld: €2.500 - €3.000 bruto per maand" required="">
                    </div>
                    <div class="w-full">
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bedrijfsadres</label>
                        <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Bijvoorbeeld: Stationsstraat 12, 1012 AB Amsterdam" required="">
                    </div>
                    <div>
                        <label for="hours" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uren per week</label>
                        <input type="number" name="hours" id="hours" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Voer het aantal uren per week in" required="">
                    </div>
                    <div>
                        <label for="contract_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contract type</label>
                        <select id="contract_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Selecteer het type contract</option>
                            <option value="fulltime">full-time</option>
                            <option value="parttime">part-time</option>
                        </select>
                    </div>

                    {{-- Tekstvak voor beschrijving --}}
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beschrijving</label>
                        <textarea id="description" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Voer een beschrijving van de functie in"></textarea>
                    </div>

                    {{-- Tekstvak voor aanvullende eisen --}}
                    <div class="sm:col-span-2">
                        <label for="additional_requirements" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aanvullende eisen</label>
                        <textarea id="additional_requirements" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Voer aanvullende eisen voor de functie in"></textarea>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Afbeelding uploaden</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="checkboxContainer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Voeg uw eigen opties toe</label>
                    <!-- Container voor dynamische checkboxes -->
                    <div id="checkboxContainer" class="space-y-4">
                        <!-- Start met één checkbox -->
                        <div class="flex items-center space-x-3">
                            <input type="checkbox" class="w-5 h-5 bg-gray-50 border border-gray-300 text-primary-500 rounded focus:ring-primary-500 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-500 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"/>
                            <input type="text" placeholder="Voeg een optie toe..." class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"/>
                        </div>
                    </div>

                    <!-- Knop om nieuwe checkbox toe te voegen -->
                    <button id="addCheckboxBtn" type="button" class="mt-4 w-full bg-primary-500 text-white font-medium text-sm rounded-lg px-5 py-2.5 hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Voeg een checkbox toe
                    </button>
                </div>


                <script>
                    // Selecteer de container en de knop
                    const checkboxContainer = document.getElementById('checkboxContainer');
                    const addCheckboxBtn = document.getElementById('addCheckboxBtn');

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
                            'border-2',
                            'border-gray-300',
                            'rounded-md',
                            'checked:bg-blue-500',
                            'focus:ring-2',
                            'focus:ring-blue-400'
                        );

                        // Voeg het invoerveld toe
                        const newInput = document.createElement('input');
                        newInput.type = 'text';
                        newInput.placeholder = 'Voeg een optie toe...';
                        newInput.classList.add(
                            'w-full',
                            'border-2',
                            'border-gray-300',
                            'rounded-md',
                            'px-4',
                            'py-2',
                            'text-gray-700',
                            'focus:outline-none',
                            'focus:ring-2',
                            'focus:ring-blue-400'
                        );

                        // Voeg de checkbox en het invoerveld toe aan het div-element
                        newCheckboxDiv.appendChild(newCheckbox);
                        newCheckboxDiv.appendChild(newInput);

                        // Voeg het nieuwe div-element toe aan de container
                        checkboxContainer.appendChild(newCheckboxDiv);
                    });
                </script>


                <button type="submit" id="preview-button" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-pink-50 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Add product
                </button>
            </form>
        </div>

    </div>
</section>


</body>
</html>
