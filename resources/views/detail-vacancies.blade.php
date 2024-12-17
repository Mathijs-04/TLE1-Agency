<x-layout>
    @section('title', $vacancy->name)
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-4xl w-full mt-3 mb-3">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('storage/' . $vacancy->image_url) }}" alt="{{ $vacancy->name }} image"
                     class="w-96 h-56 object-cover rounded-lg shadow-sm mb-4">
            </div>
            <h1 class="text-3xl font-bold text-violetOH-500 mb-4 text-center">{{ $vacancy->name }}</h1>
            <p class="text-gray-700 mb-6 ml-10 mr-10 text-left">{{ $vacancy->description }}</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Locatie -->
                <div class="bg-gray-50 p-4 rounded-lg shadow text-center">
                    <h2 class="text-lg font-semibold text-gray-800">Locatie</h2>
                    <p class="text-gray-600">{{ $vacancy->streetname }}, {{ $vacancy->city }}</p>
                </div>

                <!-- Uren -->
                <div class="bg-gray-50 p-4 rounded-lg shadow text-center">
                    <h2 class="text-lg font-semibold text-gray-800">Uren per week</h2>
                    <p class="text-gray-600">{{ $vacancy->hours }} uur</p>
                </div>

                <!-- Salaris -->
                <div class="bg-gray-50 p-4 rounded-lg shadow text-center">
                    <h2 class="text-lg font-semibold text-gray-800">Salaris</h2>
                    <p class="text-gray-600">€{{ number_format($vacancy->salary, 2, ',', '.') }}</p>
                </div>

                <!-- Contract-type -->
                <div class="bg-gray-50 p-4 rounded-lg shadow text-center">
                    <h2 class="text-lg font-semibold text-gray-800">Contract-type</h2>
                    <p class="text-gray-600">{{ $vacancy->contract_type }}</p>
                </div>
            </div>

            <!-- Aanvullende eisen -->
            <div class="ml-10">
                <h2 class="text-xl font-bold text-violetOH-500 mb-4 mt-4">Aanvullende eisen:</h2>
                @if($vacancy->requirement)
                    @foreach(explode(',', $vacancy->requirement) as $requirement)
                        @php
                            $requirement = str_replace(['[', ']', '"'], '', trim($requirement));
                        @endphp
                        <p class="text-gray-700 mb-1 text-left">- {{ $requirement }}</p>
                    @endforeach
                @else
                    <p class="text-gray-700 mb-1 text-left">Geen aanvullende eisen</p>
                @endif
            </div>

            <div class="mt-6 ml-10 flex justify-between">
                <a
                    href="{{ session('origin_url', url('/vacatures')) }}"
                    class="inline-block bg-violetOH-500 text-white px-6 py-3 rounded-lg shadow hover:bg-violetOH-600"
                >
                    Vorige pagina
                </a>
                @if(auth()->user()->employer_id === $vacancy->employer_id)
                    <a
                        href="{{ route('mijn-vacatures.edit', $vacancy->id) }}"
                        class="inline-block mr-10 bg-violetOH-500 text-white px-6 py-3 rounded-lg shadow hover:bg-violetOH-600"
                    >
                        Bewerk vacature
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-layout>
