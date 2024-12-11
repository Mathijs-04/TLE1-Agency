<!-- resources/views/vacatures.blade.php -->
<x-layout>
    @section('title', 'Vacatures')

    <div class="max-w-7xl mx-auto px-4 py-8 space-y-12">
        <!-- Vacatures Sectie -->
        <section class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-violetOH-500 mb-6">Beschikbare Vacatures</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($vacancies as $vacancy)
                    <a href="{{ route('mijn-vacatures.show', $vacancy->id) }}">
                        <div class="bg-gray-50 p-4 rounded-lg shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out">
                            <div class="flex justify-center mb-4">
                                <img src="{{ asset('storage/' . $vacancy->image_url) }}" alt="{{ $vacancy->name }} image" class="w-full h-32 object-cover rounded-lg shadow-sm">
                            </div>
                            <h3 class="text-xl font-semibold text-violetOH-500 mb-2">{{ $vacancy->name }}</h3>
                            <p class="text-gray-700 mb-4">{{ Str::limit($vacancy->description, 100) }}</p>
                            <div class="space-y-2">
                                <div class="text-sm text-gray-600"><strong>Locatie:</strong> {{ $vacancy->location }}</div>
                                <div class="text-sm text-gray-600"><strong>Uren per week:</strong> {{ $vacancy->hours }} uur</div>
                                <div class="text-sm text-gray-600"><strong>Salaris:</strong> €{{ number_format($vacancy->salary, 2, ',', '.') }} per maand</div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
