<x-layout>

    <script src="{{ asset('js/popup.js') }}"></script>

    @section('title', 'Mijn vacatures')

    {{--    Hier begint de sectie van alle vacatures --}}
    <div class="bg-gray-100 min-h-screen flex flex-col items-center">
        <!-- Always-visible button -->
        <button
            class="mt-10 px-4 py-2 bg-violetOH-500 text-white text-lg font-medium rounded-lg flex items-center justify-center shadow-lg hover:bg-violetOH-600"
        >
            <a href="{{ url(route('mijn-vacatures.create')) }}" class="flex items-center">
                <span class="mr-2">Creëer nieuwe vacature</span>
            </a>
        </button>
        <div class="vacancy-list w-full max-w-4xl space-y-6 mt-10 mb-10">

            @if ($vacancies->isEmpty())
                <p class="text-gray-500 text-center">Er zijn momenteel geen vacatures.</p>
            @else

                {{--                alle vacatures opbouwen die bij de ingelogde persoon hoort--}}
                @foreach ($vacancies as $vacancy)
                    <div class="vacature bg-white p-6 rounded-lg shadow-lg flex items-center justify-between">
                        {{-- Vacature details --}}
                        <img src="{{ asset('storage/' . $vacancy->image_url) }}"
                             alt="{{ $vacancy->name }} image" class="w-40 h-24 object-cover">

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

                        {{-- Knop om uitnodiging te sturen --}}
                        <form action="{{ route('vacancies.invite', ['vacancy' => $vacancy->id]) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je een uitnodiging wilt versturen?')">
                            @csrf

                            <div class="flex items-center gap-4">
                                <select name="user_id" class="form-select border rounded-lg px-2 py-1">
                                    <option value="" disabled selected>Kies een gebruiker</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>

                                <button type="submit" class="px-4 py-2 bg-violetOH-500 text-white rounded-lg hover:bg-violetOH-600">
                                    Stuur uitnodiging
                                </button>
                            </div>
                        </form>


                        {{-- Delete-knop --}}
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
                                                fill: #c9c9c9;
                                            }

                                            .group:hover .cls-1 {
                                                fill: #aa0160;
                                            }

                                            .cls-2 {
                                                fill: #fff;
                                            }
                                        </style>
                                    </defs>
                                    <rect class="cls-1" x="96" y="111.67" width="312" height="374"/>
                                    <path
                                        class="cls-1"
                                        d="M469.33,85.33h-106.67v-42.67c0-23.56-19.1-42.67-42.67-42.67h-128c-23.56,0-42.67,19.1-42.67,42.67v42.67H42.67v42.67h42.67v320c0,35.35,28.65,64,64,64h213.33c35.35,0,64-28.65,64-64V128h42.67v-42.67ZM192,42.67h128v42.67h-128v-42.67ZM384,448c0,11.78-9.55,21.33-21.33,21.33h-213.33c-11.78,0-21.33-9.55-21.33-21.33V128h256v320Z"
                                    />
                                    <rect class="cls-2" x="192" y="213.33" width="42.67" height="170.67"/>
                                    <rect class="cls-2" x="277.33" y="213.33" width="42.67" height="170.67"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
</x-layout>
