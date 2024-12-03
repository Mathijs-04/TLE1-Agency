<x-layout>

    @section('title', 'Mijn vacatures')

    <div class="bg-gray-100 h-screen flex items-center flex-col">
        <div class="vacancy-list w-full max-w-4xl space-y-6 mt-10">
            @foreach ($vacancies as $vacancy)
                @php
                    $imagePath = Vite::asset('resources/images/' . $vacancy->name . '.jpg');
                @endphp

                <div class="vacature bg-white p-6 rounded-lg shadow-lg flex items-center justify-between">
                    <!-- Image -->
                    <img src="{{ $imagePath }}" alt="{{ $vacancy->name }} image" class="w-40 h-24 object-cover">

                    <!-- Text Section -->
                    <div class="flex-1 ml-6">
                        <h2 class="text-xl font-bold">{{ $vacancy->name }}</h2>
                        <p class="text-gray-600">Wachtende: {{ $vacancy->waiting }}</p>
                    </div>

                    <!-- Button -->
                    <button class="border-b-4 border-[#7c1a51] px-6 py-3 bg-violetOH-500 text-white font-medium rounded-lg hover:bg-violetOH-600">
                        Uitnodigen
                    </button>
                </div>
            @endforeach

        </div>
        <button class="mt-5 font-bold w-12 h-12 bg-violetOH-500 text-white text-4xl rounded-full flex items-center justify-center hover:bg-violetOH-600 ">
            +
        </button>
    </div>


</x-layout>
