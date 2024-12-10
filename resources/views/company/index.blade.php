<x-layout>
    <div class="max-w-7xl mx-auto px-4 py-8 space-y-12">
        <!-- Titel gecentreerd -->
        <header class="text-center">
            <h1 class="text-5xl font-extrabold text-violetOH-500">{{ $profile->title }}</h1>
        </header>

        <!-- Over Ons en Logo Sectie -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center bg-gray-50 p-8 rounded-lg shadow-lg">
            <!-- Over Ons links -->
            <div class="space-y-4">
                <h2 class="text-3xl font-semibold text-violetOH-500">Over Ons</h2>
                <p class="text-gray-700 text-lg leading-relaxed">
                    {!! nl2br(e($profile->description)) !!}
                </p>
            </div>
            <!-- Logo rechts -->
            <div class="flex justify-center">
                <img src="{{ asset('storage/images/' . $profile->image_url) }}" class="h-60 w-auto rounded-lg shadow-lg" alt="Logo">
            </div>
        </section>

        <!-- Vacatures Sectie -->
        <section class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-violetOH-500 mb-6">Mijn Vacatures</h2>
            <div class="bg-violetOH-50 p-6 rounded-lg shadow-lg text-center">
                <p class="text-gray-700 text-lg mb-4">
                    Vacatures voor ons bedrijf komen hier binnenkort beschikbaar!
                </p>
                <button class="bg-violetOH-500 hover:bg-violetOH-600 text-white py-2 px-4 rounded-lg shadow-md">
                    Plaats Vacatures
                </button>
            </div>
        </section>
    </div>
</x-layout>
