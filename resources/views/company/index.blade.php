<x-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Titel gecentreerd -->
        <header class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-violetOH-500">{{ $profile->title }}</h1>
        </header>

        <!-- Twee secties naast elkaar: Bedrijf info links en logo rechts -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <!-- Bedrijf informatie links -->
            <div class="max-w-lg">
                <h2 class="text-2xl font-semibold text-violetOH-500 mb-4">Over de Beren</h2>
                <p class="text-lg text-gray-600 mb-4">Bij {{ $profile->title }} draait alles om onze passie voor de natuur. Onze beren zijn meer dan alleen een symbool voor ons bedrijf, ze vertegenwoordigen onze waarden van kracht, doorzettingsvermogen en een zorgzame benadering van het milieu. We streven ernaar om impact te maken in alles wat we doen.</p>
                <p class="text-lg text-gray-500">Wij werken met respect voor de natuur en onze gemeenschap. Elke actie die we ondernemen, is doordrenkt met onze missie om een positieve verandering te bewerkstelligen.</p>
            </div>

            <!-- Logo afbeelding rechts -->
            <div class="flex justify-center items-center">
                <img src="{{ asset('storage/images/' . $profile->image_url) }}" class="h-40 w-auto rounded-lg shadow-lg" alt="Logo">
            </div>
        </section>

        <!-- Beschrijving van het bedrijf -->
        <section class="bg-violetOH-50 p-6 rounded-lg shadow-lg mb-12">
            <h2 class="text-3xl font-semibold text-violetOH-500 mb-4">Over Ons</h2>
            <p class="text-gray-700 text-lg">Welkom bij {{ $profile->title }}! Wij zijn trots op ons bedrijf en willen graag onze missie, visie en waarden met jou delen. Ons doel is om te vernieuwen en uitstekende service te leveren in de branche. Onze werkwijze is gebaseerd op innovatie, klantgerichtheid en duurzaamheid.</p>
        </section>

        <!-- Vacatures sectie -->
        <section class="mt-12">
            <h2 class="text-3xl font-semibold text-violetOH-500 mb-6">Mijn Vacatures</h2>
            <div class="bg-white p-6 rounded-lg shadow-lg relative">
                <p class="text-lg text-gray-600">Vacatures voor ons bedrijf komen hier binnenkort beschikbaar!</p>
                <div class="absolute bottom-4 left-4 bg-violetOH-500 text-white py-2 px-4 rounded-lg shadow-lg">
                    <p class="text-lg font-semibold">Plaats hier je vacatures</p>
                </div>
            </div>
        </section>
    </div>
</x-layout>

