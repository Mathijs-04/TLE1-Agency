<?php

use Illuminate\Support\Carbon;

?>

<x-layout>

    <script src="{{ asset('js/popup.js') }}"></script>

    @section('title', 'Mijn vacatures')

    <!-- Toggle knop met sliding effect -->
    <div class="container mx-auto mt-10 mb-8 text-center">
        <div id="toggleSwitch"
             class="relative inline-flex items-center w-64 h-10 rounded-full bg-gray-200 cursor-pointer">
            <!-- Sliding achtergrond -->
            <div id="slider"
                 class="absolute top-0 left-0 h-full w-1/2 bg-violetOH-500 rounded-full transition-all duration-300"></div>
            <!-- Tekst voor de secties -->
            <span id="section1Label"
                  class="absolute left-0 w-1/2 h-full flex items-center justify-center text-gray-900 font-medium transition-colors duration-300">
                Mijn vacatures
            </span>
            <span id="section2Label"
                  class="absolute right-0 w-1/2 h-full flex items-center justify-center text-gray-900 font-medium transition-colors duration-300">
                Uitnodigen
            </span>
        </div>
    </div>

    <!-- Secties -->
    <div class="">
        <!-- Sectie 1 -->
        <div id="section1" class="">

            <div class="bg-gray-100 min-h-screen flex flex-col items-center">
                <button
                    class="mt-10 px-4 py-2 bg-violetOH-500 text-white text-lg font-medium rounded-lg flex items-center justify-center shadow-lg hover:bg-violetOH-600">
                    <a href="{{ url(route('mijn-vacatures.create')) }}" class="flex items-center">
                        <span class="mr-2">Creëer nieuwe vacature</span>
                    </a>
                </button>
                <div class="vacancy-list w-full max-w-4xl space-y-6 mt-10 mb-10">
                    @if ($vacancies->isEmpty())
                        <p class="text-gray-500 text-center">Er zijn momenteel geen vacatures.</p>
                    @else
                        @foreach ($vacancies as $vacancy)
                            <div class="vacature bg-white p-6 rounded-lg shadow-lg flex items-center justify-between">
                                <img src="{{ asset('storage/' . $vacancy->image_url) }}"
                                     alt="{{ $vacancy->name }} image" class="w-40 h-24 object-cover">
                                <div class="flex-1 ml-6">
                                    <h2 class="text-xl font-bold">
                                        <a href="{{ route('mijn-vacatures.show', $vacancy->id) }}"
                                           class="text-blue-600 hover:underline focus:outline focus:outline-2 focus:outline-blue-500">
                                            {{ $vacancy->name }}
                                        </a>
                                    </h2>
                                    <p class="text-gray-600">Wachtlijst: {{ $vacancy->waiting }}</p>
                                </div>
                                <div id="app">
                                    <a href="{{ route('mijn-vacatures.show', $vacancy->id) }}"
                                       class="border-b-4 border-[#7c1a51] px-6 py-3 bg-violetOH-500 text-white font-medium rounded-lg hover:bg-violetOH-600">
                                        Details
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <!-- Sectie 2 -->
        <div id="section2" class="">
            <div class="bg-gray-100 min-h-screen flex flex-col items-center">
                <div class="vacancy-list w-full max-w-4xl space-y-6 mt-10 mb-10">
                    @if ($vacancies->isEmpty())
                        <p class="text-gray-500 text-center">Er zijn momenteel geen vacatures.</p>
                    @else
                        @foreach ($vacancies as $vacancy)
                            <div class="vacature bg-white p-6 rounded-lg shadow-lg">
                                <!-- Vacature Details -->
                                <div class="flex items-center justify-between">
                                    <img src="{{ asset('storage/' . $vacancy->image_url) }}"
                                         alt="{{ $vacancy->name }} image" class="w-40 h-24 object-cover">
                                    <div class="flex-1 ml-6">
                                        <h2 class="text-xl font-bold">
                                            <a href="{{ route('mijn-vacatures.show', $vacancy->id) }}"
                                               class="text-blue-600 hover:underline focus:outline focus:outline-2 focus:outline-blue-500">
                                                {{ $vacancy->name }}
                                            </a>
                                        </h2>
                                        <p class="text-gray-600">Wachtenden: {{ $vacancy->waiting }}</p>
                                    </div>
                                    <div class="flex items-center">
                                        <div id="app">
                                            <button
                                                class="inviteButton border-b-4 border-[#7c1a51] px-6 py-3 bg-violetOH-500 text-white font-medium rounded-lg hover:bg-violetOH-600"
                                                data-waiting="{{$vacancy->waiting}}"
                                            >
                                                Uitnodigen
                                            </button>
                                        </div>
                                        <div id="popup"
                                             class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center hidden">
                                            <div class="bg-white p-6 rounded-lg w-96 shadow-lg text-center"><h2
                                                    class="text-xl font-bold mb-4">Nodig werknemers uit.</h2>
                                                <p class="mb-4">Aantal werknemers:</p>
                                                <div class="flex items-center gap-4 justify-center">
                                                    <button id="decrement"
                                                            class="w-8 h-8 bg-gray-300 text-gray-800 rounded-full hover:bg-gray-400">
                                                        -
                                                    </button>
                                                    <span id="userCount" class="text-2xl font-semibold">1</span>
                                                    <button id="increment"
                                                            class="w-8 h-8 bg-gray-300 text-gray-800 rounded-full hover:bg-gray-400">
                                                        +
                                                    </button>
                                                </div>
                                                <div class="mt-6 flex justify-center gap-4">
                                                    <button id="cancelButton"
                                                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                                                        Annuleren
                                                    </button>
                                                    <button id="confirmButton"
                                                            class="px-4 py-2 bg-violetOH-500 text-white rounded hover:bg-violetOH-600">
                                                        Uitnodigen
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Pijl voor uitklappen -->
                                        <button
                                            class="ml-4 flex items-center justify-center w-8 h-8 text-gray-600 hover:text-violetOH-500 transform transition-transform"
                                            data-id="info-{{ $vacancy->id }}">
                                            <svg class="dropdown" width="18" height="11" viewBox="0 0 18 11" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1L9 9L17 1" stroke="#AA0160" stroke-width="2"
                                                      stroke-linecap="round"/>
                                            </svg>

                                        </button>
                                    </div>
                                </div>

                                <!-- Uitklapbare Inhoud -->
                                <div id="info-{{ $vacancy->id }}" class="hidden mt-4 p-4 bg-gray-100 rounded-lg">

                                    <div class="matches-container">
                                        @php
                                            $groupedMatches = $vacancy->matches->groupBy('is_accepted');
                                        @endphp

                                        @if ($groupedMatches->has(1))
                                            <div class="status-group">
                                                <h3 class="status-heading">Geaccepteerd</h3>
                                                @foreach ($groupedMatches[1] as $vacancymatch)
                                                    @php
                                                        // Datum formatteren
                                                        $formattedDate = Carbon::parse($vacancymatch->start_date)->format('d-m-Y');
                                                    @endphp

                                                    <div class="flex items-center space-x-4 my-2">
                                                        <!-- SVG -->
                                                        <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15 19V17C15 15.9391 14.5786 14.9217 13.8284 14.1716C13.0783 13.4214 12.0609 13 11 13H5C3.93913 13 2.92172 13.4214 2.17157 14.1716C1.42143 14.9217 1 15.9391 1 17V19"
                                                                stroke="#92AA83" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M8 9C10.2091 9 12 7.20914 12 5C12 2.79086 10.2091 1 8 1C5.79086 1 4 2.79086 4 5C4 7.20914 5.79086 9 8 9Z"
                                                                stroke="#92AA83" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>

                                                        <!-- User ID -->
{{--                                                        <span class="text-gray-700 font-medium">{{ $vacancymatch->user_id }}</span>--}}

                                                        <div class="">
                                                            <p class="font-bold text-sm">Startdatum</p>
                                                            <span class="text-gray-500">{{ $formattedDate }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif


                                        @php
                                            $statuses = [
                                                2 => ['label' => 'Geweigerd', 'color' => '#AA0160'], // Rood
                                                0 => ['label' => 'Niet beantwoord', 'color' => '#A0A0A0'] // Grijs
                                            ];
                                        @endphp

                                        @foreach ($statuses as $status => $details)
                                            {{-- Haal het aantal op, of gebruik 0 als er geen matches zijn --}}
                                            @php
                                                $count = $groupedMatches->get($status, collect())->count();
                                            @endphp

                                            <div class="status-group">
                                                <h3 class="status-heading">
                                                    {{ $details['label'] }}
                                                    <div class="flex items-center space-x-4 my-2">
                                                        <svg width="16" height="19" viewBox="0 0 16 19" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15 19V17C15 15.9391 14.5786 14.9217 13.8284 14.1716C13.0783 13.4214 12.0609 13 11 13H5C3.93913 13 2.92172 13.4214 2.17157 14.1716C1.42143 14.9217 1 15.9391 1 17V19"
                                                                stroke="{{ $details['color'] }}" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path
                                                                d="M8 9C10.2091 9 12 7.20914 12 5C12 2.79086 10.2091 1 8 1C5.79086 1 4 2.79086 4 5C4 7.20914 5.79086 9 8 9Z"
                                                                stroke="{{ $details['color'] }}" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>

                                                        <span class="text-gray-700 font-medium">{{ $count }}</span>
                                                    </div>
                                                </h3>
                                            </div>
                                        @endforeach

                                    </div>


                                </div>
                            </div>

                        @endforeach

                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        const toggleSwitch = document.getElementById('toggleSwitch');
        const slider = document.getElementById('slider');
        const section1Label = document.getElementById('section1Label');
        const section2Label = document.getElementById('section2Label');
        const section1 = document.getElementById('section1');
        const section2 = document.getElementById('section2');

        let activeSection = 1; // Initialiseer met sectie 1 als actief

        // Functie om de UI bij te werken op basis van de actieve sectie
        function updateUI() {
            if (activeSection === 1) {
                slider.style.transform = 'translateX(0)';
                section1.classList.remove('hidden');
                section2.classList.add('hidden');
                section1Label.classList.add('text-white');
                section1Label.classList.remove('text-gray-900');
                section2Label.classList.add('text-gray-900');
                section2Label.classList.remove('text-white');
            } else {
                slider.style.transform = 'translateX(100%)';
                section2.classList.remove('hidden');
                section1.classList.add('hidden');
                section2Label.classList.add('text-white');
                section2Label.classList.remove('text-gray-900');
                section1Label.classList.add('text-gray-900');
                section1Label.classList.remove('text-white');
            }
        }

        // Eventlistener voor klikken op de toggle
        toggleSwitch.addEventListener('click', () => {
            activeSection = activeSection === 1 ? 2 : 1;
            updateUI();
        });

        // Stel bij het laden van de pagina de UI in
        document.addEventListener('DOMContentLoaded', updateUI);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleButtons = document.querySelectorAll('.dropdown');

            toggleButtons.forEach(button => {
                const parentButton = button.parentElement;
                parentButton.addEventListener('click', () => {
                    const contentId = parentButton.getAttribute('data-id');
                    const content = document.getElementById(contentId);

                    if (content.classList.contains('hidden')) {
                        content.classList.remove('hidden');
                        button.style.transform = 'rotate(180deg)';
                    } else {
                        content.classList.add('hidden');
                        button.style.transform = 'rotate(0deg)';
                    }
                });
            });
        });
    </script>


</x-layout>
