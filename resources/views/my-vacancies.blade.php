<x-layout>

    <script src="{{ asset('js/popup.js') }}"></script>

    @section('title', 'Mijn vacatures')

    <!-- Toggle knop met sliding effect -->
    <div class="container mx-auto mt-10 text-center">
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
    <div class="container mx-auto mt-6">
        <!-- Sectie 1 -->
        <div id="section1" class="bg-white p-6 shadow rounded">
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
                                    <p class="text-gray-600">Wachtenden: {{ $vacancy->waiting }}</p>
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
        <div id="section2" class="bg-white p-6 shadow rounded hidden">
            <div class="bg-gray-100 min-h-screen flex flex-col items-center">
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
                                </div>
                                <div id="app">
                                    <button
                                        class="inviteButton border-b-4 border-[#7c1a51] px-6 py-3 bg-violetOH-500 text-white font-medium rounded-lg hover:bg-violetOH-600"
                                        data-waiting="{{$vacancy->waiting}}">
                                        Uitnodigen
                                    </button>
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


</x-layout>
