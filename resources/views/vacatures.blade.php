<x-layout>
    <script src="{{ asset('js/popup.js') }}"></script>

    @section('title', 'Alle Vacatures')

    @if ($vacancies->isEmpty())
        <p class="text-gray-500 text-center">Er zijn momenteel geen vacatures beschikbaar.</p>
    @else
        @foreach ($vacancies as $vacancy)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">{{ $vacancy->name }}</h2>
                <p><strong>Locatie:</strong> {{ $vacancy->location }}</p>
                <p><strong>Salaris:</strong> {{ $vacancy->salary }}</p>
                <p><strong>Uren:</strong> {{ $vacancy->hours }}</p>
                <p><strong>Contract:</strong> {{ $vacancy->contract_type }}</p>
{{--                <a href="{{ route('vacatures.show', $vacancy->id) }}" class="text-blue-500 hover:underline">Meer details</a>--}}
            </div>
        @endforeach
    @endif

</x-layout>
