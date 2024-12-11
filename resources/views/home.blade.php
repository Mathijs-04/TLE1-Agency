<x-layout>
    @section('title', 'Homepagina')
    <div class="bg-gray-100 h-full">
        <div class="homepage pt-24 pb-24">
            <div class="flex p-6 items-center justify-between">
                <!-- Text section -->
                <div class="w-full md:w-3/5">
                    <p class="text-center text-5xl font-bold text-gray-700 mb-6">Werk voor iedereen!</p>
                    <p class="text-center leading-relaxed text-gray-800 mb-6">
                        Met Open Hiring heeft iedereen een eerlijke kans<br/>op een baan. Wie wil én kan werken, kan zó
                        aan de
                        slag.
                        <br/>Zonder sollicitatiegesprek, zonder brief, zonder vragen. <br/>Met één druk op de knop. Open
                        Hiring
                        draait namelijk <br/>niet om diploma’s, maar om mensen. Niet om praatjes, <br/>maar om
                        aanpakken.
                    </p>
                    <div class="flex items-center justify-center">
                        <a href="/404">
                            <button
                                class="relative bg-violetOH-500 hover:bg-violetOH-600 w-72 h-14 rounded-lg border-b-4 border-[#7c1a51] font-bold text-cream text-base">
                                Bekijk vacatures
                            </button>
                        </a>
                    </div>
                </div>
                <!-- Image section -->
                <div class="w-full md:w-1/3 mr-48">
                    <img src="{{ asset('/images/homeimage.png') }}"
                         alt="foto van man die werk heeft gevonden via Open Hiring"
                         class="w-full h-auto rounded-lg">
                </div>
            </div>
        </div>
    </div>
</x-layout>
