<x-layout>
<div class="flex items-center justify-center h-screen">
    <div class="w-full md:w-full">
        <p class="text-center text-5xl font-bold text-gray-700 mb-6">Uitnodigingen verstuurd!</p>
        <p class="text-center leading-relaxed text-gray-800 mb-6">
            We hebben automatisch uw geselecteerde aantal werknemers uitgenodigd. <br>
            Zij hebben een email ontvangen met een uitnodiging voor hun eerste werkdag. <br>
            Dit was voor u de laatste stap binnen het wervingsproces van Open Hiring. <br> <br>
            De status van de uitnodigingen is terug te zien op de uitnodigingspagina binnen Mijn Vacatures. <br>
            Indien u contact op wil nemen met werknemers die de uitnodiging hebben geaccepteerd, <br>
            kunt u contactgegevens vinden op de uitnodigingspagina binnen Mijn Vacatures.
        </p>
        <div class="flex items-center justify-center">
            <a href="{{ route('mijn-vacatures.index') }}"
               class="relative bg-violetOH-500 hover:bg-violetOH-600 w-72 h-14 rounded-full border-b-4 border-[#7c1a51] font-bold text-cream text-base flex items-center justify-center">
                Terug naar vacatures
            </a>
        </div>
    </div>
</div>
</x-layout>
