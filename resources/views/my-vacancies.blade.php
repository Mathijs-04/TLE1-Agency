<x-layout>

    <script src="{{ asset('js/popup.js') }}"></script>

    @section('title', 'Mijn vacatures')

{{--    Hier begint de sectie van alle vacatures --}}
    <div class="bg-gray-100 min-h-screen flex flex-col items-center">
        <div class="vacancy-list w-full max-w-4xl space-y-6 mt-10">

            @if ($vacancies->isEmpty())
                <p class="text-gray-500 text-center">Er zijn momenteel geen vacatures.</p>
            @else

{{--                alle vacatures opbouwen die bij de ingelogde persoon hoort--}}
                @foreach ($vacancies as $vacancy)

                    @php
                        $imagePath = Vite::asset('resources/images/' . $vacancy->name . '.jpg');
                    @endphp

                    <div class="vacature bg-white p-6 rounded-lg shadow-lg flex items-center justify-between">

                        <img src="{{ $imagePath }}" alt="{{ $vacancy->name }} image" class="w-40 h-24 object-cover">


                        <div class="flex-1 ml-6">
                            <h2 class="text-xl font-bold">
                                <a
                                        href="{{ route('mijn-vacatures.show', $vacancy->id) }}"
                                        class="text-blue-600 hover:underline focus:outline focus:outline-2 focus:outline-blue-500"
                                >
                                    {{ $vacancy->name }}
                                </a>
                            </h2>
                            <p class="text-gray-600">Wachtenden: {{ $vacancy->waiting }}</p>
                        </div>


                        <div id="app">
                            <!-- Invite Button -->
                            <button
                                    id="inviteButton"
                                    class="border-b-4 border-[#7c1a51] px-6 py-3 bg-violetOH-500 text-white font-medium rounded-lg hover:bg-violetOH-600"
                                    data-waiting="{{$vacancy->waiting}}"
                            >
                                Uitnodigen
                            </button>

                            <!-- Popup -->
                            <div
                                    id="popup"
                                    class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center hidden"
                            >
                                <div class="bg-white p-6 rounded-lg w-96 shadow-lg text-center">
                                    <h2 class="text-xl font-bold mb-4">Nodig mensen uit.</h2>
                                    <p class="mb-4">Hoeveel mensen:</p>

                                    <div class="flex items-center gap-4 justify-center">
                                        <button
                                                id="decrement"
                                                class="w-8 h-8 bg-gray-300 text-gray-800 rounded-full hover:bg-gray-400"
                                        >
                                            -
                                        </button>
                                        <span id="userCount" class="text-2xl font-semibold">1</span>
                                        <button
                                                id="increment"
                                                class="w-8 h-8 bg-gray-300 text-gray-800 rounded-full hover:bg-gray-400"
                                        >
                                            +
                                        </button>
                                    </div>

                                    <div class="mt-6 flex justify-center gap-4">
                                        <button
                                                id="cancelButton"
                                                class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600"
                                        >
                                            Annuleren
                                        </button>
                                        <button
                                                id="confirmButton"
                                                class="px-4 py-2 bg-violetOH-500 text-white rounded hover:bg-violetOH-600"
                                        >
                                            Uitnodigen
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

{{--                        Dit is om te deleten, hier zit ook een svg in en de kleur van de svg veranderd op hover--}}
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
                                                fill: #c9c9c9; /* Default color */
                                            }

                                            .group:hover .cls-1 {
                                                fill: #aa0160; /* Hover color */
                                            }

                                            .cls-2 {
                                                fill: #fff;
                                            }
                                        </style>
                                    </defs>
                                    <rect class="cls-1" x="96" y="111.67" width="312" height="374" />
                                    <path
                                        class="cls-1"
                                        d="M469.33,85.33h-106.67v-42.67c0-23.56-19.1-42.67-42.67-42.67h-128c-23.56,0-42.67,19.1-42.67,42.67v42.67H42.67v42.67h42.67v320c0,35.35,28.65,64,64,64h213.33c35.35,0,64-28.65,64-64V128h42.67v-42.67ZM192,42.67h128v42.67h-128v-42.67ZM384,448c0,11.78-9.55,21.33-21.33,21.33h-213.33c-11.78,0-21.33-9.55-21.33-21.33V128h256v320Z"
                                    />
                                    <rect class="cls-2" x="192" y="213.33" width="42.67" height="170.67" />
                                    <rect class="cls-2" x="277.33" y="213.33" width="42.67" height="170.67" />
                                </svg>
                            </button>
                        </form>

                    </div>
                @endforeach
            @endif
        </div>

        <!-- Always-visible button -->
        <button
                class="mt-10 font-bold w-12 h-12 bg-violetOH-500 text-white text-4xl rounded-full flex items-center justify-center hover:bg-violetOH-600"
        >
            +
        </button>
    </div>
</x-layout>
