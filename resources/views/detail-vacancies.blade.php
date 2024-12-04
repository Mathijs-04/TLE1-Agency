<x-layout>
    @section('title', $vacancy->name)
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full">
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
