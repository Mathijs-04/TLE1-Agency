<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-xl p-8 m-8 w-full max-w-md">
            <div class="mx-auto max-w-2xl">
                <h2 class="mb-2 text-xl font-bold text-gray-900">Nieuwe vacature aanmaken</h2>
                <p class="mb-4">Na het invullen van de velden kunt u eerst een preview bekijken
                    voordat u de vacature plaatst.</p>
                <div>
                    {{-- Formulier --}}
                    <form action="{{ route('mijn-vacatures.store') }}" method="post" enctype="multipart/form-data">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            @csrf
                            {{-- Naam van de vacature --}}
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Titel</label>
                                <input type="text" name="name" id="name"
                                       class="bg-gray-50 border @error('name') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: Vulploeg medewerker Jumbo" required=""
                                       value="{{ old('name') }}">
                                @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Salaris indicatie --}}
                            <div class="sm:col-span-2">
                                <label for="salary" class="block mb-2 text-sm font-medium text-gray-900">Salaris
                                    indicatie</label>
                                <input type="number" min="0" name="salary" id="salary"
                                       class="bg-gray-50 border @error('salary') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: €2.500 - €3.000 bruto per maand" required=""
                                       value="{{ old('salary') }}">
                                @error('salary')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Postcode --}}
                            <div class="">
                                <label for="postcode" class="block mb-2 text-sm font-medium text-gray-900">Postcode</label>
                                <input type="text" name="postcode" id="postcode"
                                       class="bg-gray-50 border @error('postcode') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: 1012 AB" required=""
                                       value="{{ old('postcode') }}">
                                @error('postcode')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Huisnummer --}}
                            <div class="">
                                <label for="housenumber" class="block mb-2 text-sm font-medium text-gray-900">Huisnummer</label>
                                <input type="text" name="housenumber" id="housenumber"
                                       class="bg-gray-50 border @error('housenumber') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: 12" required=""
                                       value="{{ old('housenumber') }}">
                                @error('housenumber')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Straatnaam --}}
                            <div class=" sm:col-span-2">
                                <label for="streetname" class="block mb-2 text-sm font-medium text-gray-900">Straatnaam</label>
                                <input type="text" name="streetname" id="streetname"
                                       class="bg-gray-50 border @error('streetname') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: Stationsstraat" required=""
                                       value="{{ old('streetname') }}">
                                @error('streetname')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Plaats --}}
                            <div class="sm:col-span-2">
                                <label for="city" class="block mb-2 text-sm font-medium text-gray-900">Plaats</label>
                                <input type="text" name="city" id="city"
                                       class="bg-gray-50 border @error('city') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: Amsterdam" required=""
                                       value="{{ old('city') }}">
                                @error('city')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Aantanl uren --}}
                            <div class="sm:col-span-2">
                                <label for="hours" class="block mb-2 text-sm font-medium text-gray-900">Uren per
                                    week</label>
                                <input type="number" name="hours" id="hours"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: 40 uur" required="">
                                @error('hours')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Bedrijfsnaam --}}
                            <div class="sm:col-span-2">
                                <label for="company_name" class="block mb-2 text-sm font-medium text-gray-900">Bedrijfsnaam</label>
                                <input type="text" name="company_name" id="company_name"
                                       class="bg-gray-50 border @error('company_name') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: Jumbo" required=""
                                       value="{{ old('company_name') }}">
                                @error('company_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Beschrijving --}}
                            <div class="sm:col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Beschrijving</label>
                                <textarea id="description" name="description" rows="6"
                                          class="bg-gray-50 border @error('description') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                          placeholder="Beschrijf hier de functie">{{ old('description') }}</textarea>
                                @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- E-mailadres --}}
                            <div class="sm:col-span-2">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">E-mailadres</label>
                                <input type="email" name="email" id="email"
                                       class="bg-gray-50 border @error('email') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: voorbeeld@bedrijf.nl" required=""
                                       value="{{ old('email') }}">
                                @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Telefoonnummer --}}
                            <div class="sm:col-span-2">
                                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900">Telefoonnummer</label>
                                <input type="text" name="phone_number" id="phone_number"
                                       class="bg-gray-50 border @error('phone_number') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-[#AA0061] focus:border-[#AA0061] block w-full p-2.5"
                                       placeholder="Bijvoorbeeld: +31 6 12345678" required=""
                                       value="{{ old('phone_number') }}">
                                @error('phone_number')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-center items-center mt-4">
                            <button id="previewButton" type="submit"
                                    class="w-48 bg-[#AA0061] text-white font-medium text-sm rounded-lg px-4 py-2 hover:bg-[#88004E] focus:outline-none focus:ring-2 focus:ring-[#AA0061]">
                                Aanmaken
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
