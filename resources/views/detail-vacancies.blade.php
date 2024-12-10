<x-layout>
    @section('title', $vacancy->name)
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full relative"> <!-- 'relative' toegevoegd -->

            <!-- Terug-pijl -->
            <div class="absolute top-4 left-4">
                <a href="javascript:history.back()" class="text-violetOH-500 hover:text-violetOH-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
            </div>

            <div class="flex justify-center mb-4">
                <img src="{{ asset('storage/' . $vacancy->image_url) }}" alt="{{ $vacancy->name }} image" class="w-96 h-56 object-cover rounded-lg shadow-sm mb-4">
            </div>
            <h1 class="text-3xl font-bold text-violetOH-500 mb-4">{{ $vacancy->name }}</h1>
            <p class="text-gray-700 mb-6">{{ $vacancy->description }}</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Locatie -->
                <div class="bg-gray-50 p-4 rounded-lg shadow">
                    <h2 class="text-lg font-semibold text-gray-800">Locatie</h2>
                    <p class="text-gray-600">{{ $vacancy->location }}</p>
                </div>

                <!-- Uren -->
                <div class="bg-gray-50 p-4 rounded-lg shadow">
                    <h2 class="text-lg font-semibold text-gray-800">Uren per week</h2>
                    <p class="text-gray-600">{{ $vacancy->hours }} uur</p>
                </div>

                <!-- Salaris -->
                <div class="bg-gray-50 p-4 rounded-lg shadow">
                    <h2 class="text-lg font-semibold text-gray-800">Salaris</h2>
                    <p class="text-gray-600">€{{ number_format($vacancy->salary, 2, ',', '.') }} per maand</p>
                </div>
            </div>

            <div class="mt-6">
                <a
                    href="{{ route('mijn-vacatures.index') }}"
                    class="inline-block bg-violetOH-500 text-white px-6 py-3 rounded-lg shadow hover:bg-violetOH-600"
                >
                    Terug naar overzicht
                </a>
            </div>
        </div>
    </div>
</x-layout>
