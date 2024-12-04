<x-layout>
    <script src="{{ asset('js/popup.js') }}"></script>
    @section('title', 'Mijn vacatures')

    <div class="bg-gray-100 min-h-screen flex flex-col items-center">
        <div class="vacancy-list w-full max-w-4xl space-y-6 mt-10">
            @if ($vacancies->isEmpty())
                <p class="text-gray-500 text-center">Er zijn momenteel geen vacatures.</p>
            @else
                @foreach ($vacancies as $vacancy)
                    @php
                        $imagePath = Vite::asset('resources/images/' . $vacancy->name . '.jpg');
                    @endphp

                    <div class="vacature bg-white p-6 rounded-lg shadow-lg flex items-center justify-between">
                        <!-- Image -->
                        <img src="{{ $imagePath }}" alt="{{ $vacancy->name }} image" class="w-40 h-24 object-cover">

                        <!-- Text Section -->
                        <div class="flex-1 ml-6">
                            <h2 class="text-xl font-bold">
                                <a
                                        href="{{ route('mijn-vacatures.show', $vacancy->id) }}"
                                        class="text-blue-600 hover:underline focus:outline focus:outline-2 focus:outline-blue-500"
                                >
                                    {{ $vacancy->name }}
                                </a>
                            </h2>
                            <p class="text-gray-600">Wachtende: {{ $vacancy->waiting }}</p>
                        </div>


                        <!-- Button & Popup -->
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
