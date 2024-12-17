<?php

use Illuminate\Support\Carbon;

?>

<x-layout>

    <script src="{{ asset('js/popup.js') }}"></script>
    <script src="{{ asset('js/switch.js') }}"></script>
    <script src="{{ asset('js/dropdown.js') }}"></script>

    @section('title', 'Mijn vacatures')

    <!-- Toggle knop met sliding effect -->
    <div class="container mx-auto mt-10 mb-8 text-center z-0">
        <div id="toggleSwitch"
             class="relative inline-flex items-center w-64 h-10 rounded-full bg-gray-200 cursor-pointer">
            <!-- Sliding achtergrond -->
            <div id="slider"
                 class="absolute top-0 left-0 h-full w-1/2 bg-violetOH-500 rounded-full transition-all duration-300"></div>
            <!-- Tekst voor de secties -->
            <button id="section1Label"
                    class="absolute left-0 w-1/2 h-full flex items-center justify-center text-gray-900 font-medium transition-colors duration-300">
                Mijn vacatures
            </button>
            <button id="section2Label"
                    class="absolute right-0 w-1/2 h-full flex items-center justify-center text-gray-900 font-medium transition-colors duration-300">
                Uitnodigen
            </button>
        </div>
    </div>

    <!-- Secties met verbeterde overgang tussen wit en grijs -->
    <div class="bg-gradient-to-b from-white via-gray-100 to-gray-200 shadow-md">
        <!-- Sectie 1 -->
        <div id="section1" class="">

            <div class="bg-gray-100 min-h-screen flex flex-col items-center">
                <a href="{{ url(route('mijn-vacatures.create')) }}"
                   class="flex items-center mt-10 px-4 py-2 bg-violetOH-500 text-white text-lg font-medium rounded-lg shadow-lg hover:bg-violetOH-600">
                    <p class="mr-2">Creëer nieuwe vacature</p>
                </a>
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
                                <form action="{{route('mijn-vacatures.destroy', $vacancy->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="h-[52px] flex items-center justify-center group ml-5">
                                        <svg
                                            id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512"
                                            class="w-6 h-6 transition-colors"
                                        >
                                            <defs>
                                                <style>
                                                    .cls-1 {
                                                        fill: #c9c9c9;
                                                    }

                                                    .group:hover .cls-1 {
                                                        fill: #aa0160;
                                                    }

                                                    .cls-2 {
                                                        fill: #fff;
                                                    }
                                                </style>
                                            </defs>
                                            <rect class="cls-1" x="96" y="111.67" width="312" height="374"/>
                                            <path
                                                class="cls-1"
                                                d="M469.33,85.33h-106.67v-42.67c0-23.56-19.1-42.67-42.67-42.67h-128c-23.56,0-42.67,19.1-42.67,42.67v42.67H42.67v42.67h42.67v320c0,35.35,28.65,64,64,64h213.33c35.35,0,64-28.65,64-64V128h42.67v-42.67ZM192,42.67h128v42.67h-128v-42.67ZM384,448c0,11.78-9.55,21.33-21.33,21.33h-213.33c-11.78,0-21.33-9.55-21.33-21.33V128h256v320Z"
                                            />
                                            <rect class="cls-2" x="192" y="213.33" width="42.67" height="170.67"/>
                                            <rect class="cls-2" x="277.33" y="213.33" width="42.67" height="170.67"/>
                                        </svg>
                                    </button>
                                </form>
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

                            {{--                            {{ $test = $vacancy->matches->pluck('users') }}--}}
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
                                        <div class="flex">
                                        <p class="text-gray-600 mr-1">Wachtlijst: {{ $vacancy->waiting }}</p>
                                        </div>
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
                                        {{--                                        @if($vacancy->matches->is_accepted !== 0 ||)--}}
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

                                        @foreach ([1, 2, 0] as $status)
                                            {{-- Eerst groen (1), dan rood (2), dan grijs (0) --}}
                                            <div class="status-group">
                                                <h2 class="font-bold">
                                                    @if ($status === 1)
                                                        Geaccepteerd
                                                    @elseif ($status === 2)
                                                        Geweigerd
                                                    @else
                                                        Uitgenodigd
                                                    @endif
                                                </h2>

                                                @if ($groupedMatches->has($status) && $groupedMatches[$status]->isNotEmpty())
                                                    @foreach ($groupedMatches[$status] as $vacancymatch)

                                                        @php
                                                            // Kleur bepalen op basis van is_accepted
                                                            $svgColor = match($status) {
                                                                0 => '#B3B3B3', // Grijs
                                                                1 => '#92AA83', // Groen
                                                                2 => '#FF6B6B', // Rood
                                                            };

                                                            // Datum formatteren
                                                            $formattedDate = Carbon::createFromTimestampMs($vacancymatch->start_datetime)->format('d-m-Y H:i')
                                                        @endphp

                                                        <div class="flex items-center justify-between space-x-4 my-2">
                                                            <!-- SVG -->
                                                            <div class="flex items-center space-x-4">
                                                                <svg width="16" height="19" viewBox="0 0 16 19"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M15 19V17C15 15.9391 14.5786 14.9217 13.8284 14.1716C13.0783 13.4214 12.0609 13 11 13H5C3.93913 13 2.92172 13.4214 2.17157 14.1716C1.42143 14.9217 1 15.9391 1 17V19"
                                                                        stroke="{{ $svgColor }}" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path
                                                                        d="M8 9C10.2091 9 12 7.20914 12 5C12 2.79086 10.2091 1 8 1C5.79086 1 4 2.79086 4 5C4 7.20914 5.79086 9 8 9Z"
                                                                        stroke="{{ $svgColor }}" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>

                                                                <!-- User ID -->
                                                                @foreach ($vacancy->matches as $match)
                                                                    @if ($match->users)
                                                                        @if($match->users->id ===  $vacancymatch->user_id && $match->is_accepted === 1)
                                                                            <div class="flex gap-4 items-center">
                                                                                <p class="">{{ $match->users->name }}</p>
                                                                                <p class="text-sm text-gray-500">{{ $match->users->email }}</p>
                                                                            </div>
                                                                        @elseif($match->users->id ===  $vacancymatch->user_id)
                                                                            <p>Anoniem</p>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </div>

                                                            <!-- Datum en Startdatum -->
                                                            <div class="">
                                                                <p class="font-bold text-sm">Startdatum</p>
                                                                <span class="text-gray-500">{{ $formattedDate }}</span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    @php
                                                        $svgColor = match($status) {
                                                            0 => '#B3B3B3', // Grijs
                                                            1 => '#92AA83', // Groen
                                                            2 => '#FF6B6B', // Rood
                                                        };
                                                    @endphp
                                                    <div class="flex items-center space-x-4 my-2">
                                                        <!-- SVG -->
                                                        <svg width="16" height="19" viewBox="0 0 16 19"
                                                             fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15 19V17C15 15.9391 14.5786 14.9217 13.8284 14.1716C13.0783 13.4214 12.0609 13 11 13H5C3.93913 13 2.92172 13.4214 2.17157 14.1716C1.42143 14.9217 1 15.9391 1 17V19"
                                                                stroke="{{ $svgColor }}" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path
                                                                d="M8 9C10.2091 9 12 7.20914 12 5C12 2.79086 10.2091 1 8 1C5.79086 1 4 2.79086 4 5C4 7.20914 5.79086 9 8 9Z"
                                                                stroke="{{ $svgColor }}" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                        <!-- Geen matches -->
                                                        <span class="text-gray-700">0</span>
                                                    </div>
                                                @endif
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
</x-layout>
