<x-layout>
<div class="flex items-center justify-center h-screen">
    <div class="w-full md:w-full">
        <p class="text-center text-5xl font-bold text-gray-700 mb-6">Uitnodigingen verstuurd!</p>
        <p class="text-center leading-relaxed text-gray-800 mb-6">
            We hebben automatisch uw geselecteerde aantal werknemers uitgenodigd.<br>
            Zij ontvangen een email met een uitnodiging voor hun eerste werkdag.<br>
            Zodra deze uitnodiging is geaccepteerd of geweigerd, ontvangt u hierover een emailbericht.
        </p>
        <div class="flex items-center justify-center">
            <a href="{{ route('my-vacancies.index') }}"
               class="relative bg-violetOH-500 hover:bg-violetOH-600 w-72 h-14 rounded-full border-b-4 border-[#7c1a51] font-bold text-cream text-base flex items-center justify-center">
                Terug naar vacatures
            </a>
        </div>
    </div>
</div>
</x-layout>
