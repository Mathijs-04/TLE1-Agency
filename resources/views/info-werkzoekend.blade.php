<x-layout>
    @section('title', 'informatie werkgevers')

    <div id="informatie_container" class="max-w-7xl mx-auto p-6">
        <!-- Titel gecentreerd -->
        <h1 class="text-3xl font-bold text-center text-[#92AA83] mb-10">Hoe werk Open Hiring?</h1>

        <!-- Drie redenen naast elkaar -->
        <div class="flex flex-col md:flex-row justify-between gap-6">
            <!-- Reden 1 -->
            <div class="flex flex-col items-center text-center md:text-left md:items-start bg-[#E2ECC9] p-6 rounded-lg">
                <h2 class="text-5xl font-bold text-[#92AA83] mb-4">1</h2>
                <p class="text-lg font-semibold text-[#92AA83]">Plaats een vacature</p>
                <p class="text-[#92AA83]">
                    Bedrijven hebben de mogelijkheid om eenvoudig een account aan te maken op ons platform.
                    Zodra het account door Open Hiring is aangemaakt, kunnen zij snel en zonder moeite hun
                    vacatures plaatsen, zodat ze direct zichtbaar worden voor werknemers.
                </p>
            </div>
            <!-- Reden 2 -->
            <div class="flex flex-col items-center text-center md:text-left md:items-start bg-[#E2ECC9] p-6 rounded-lg">
                <h2 class="text-5xl font-bold text-[#92AA83] mb-4">2</h2>
                <p class="text-lg font-semibold text-[#92AA83]">Kandidaten melden zich aan</p>
                <p class="text-[#92AA83]">
                    Werkzoekenden hebben de mogelijkheid zich in te schrijven voor de openstaande vacatures
                    die hen aanspreken. Nadat ze zich hebben aangemeld, worden ze in een wachtrij geplaatst,
                    waardoor werkgevers eenvoudig inzicht krijgen in het aantal geïnteresseerde kandidaten.
                </p>
            </div>
            <!-- Reden 3 -->
            <div class="flex flex-col items-center text-center md:text-left md:items-start bg-[#E2ECC9] p-6 rounded-lg">
                <h2 class="text-5xl font-bold text-[#92AA83] mb-4">3</h2>
                <p class="text-lg font-semibold text-[#92AA83]">Automatische selectie</p>
                <p class="text-[#92AA83]">
                    Zodra er behoefte is aan nieuwe medewerkers, haalt ons systeem automatisch de eerstvolgende
                    kandidaten uit de wachtrij. Dit maakt het wervingsproces eenvoudig en snel: zonder gedoe,
                    zonder vooroordeel, meteen aan de slag met beschikbare kandidaten.
                </p>
            </div>
        </div>
    </div>
</x-layout>
