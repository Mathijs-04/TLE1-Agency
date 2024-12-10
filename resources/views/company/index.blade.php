<x-layout>
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
                               class="text-blue-600 hover:underline">
                                {{ $vacancy->name }}
                            </a>
                        </h2>
                        <p class="text-gray-600">Wachtenden: {{ $vacancy->waiting }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</x-layout>

