<x-layout>
    @section('title', 'informatie werkgevers')

    <div id="informatie_container" class="max-w-7xl mx-auto p-6">
        <!-- Titel gecentreerd -->
        <h1 class="text-3xl font-bold text-center mb-10">Hoe werkt Open Hiring?</h1>

        <!-- Drie redenen naast elkaar -->
        <div class="flex flex-col md:flex-row justify-between gap-6">
            <!-- Reden 1 -->
            <div
                class="flex-1 basis-1/3 flex flex-col items-center text-center md:text-left md:items-start bg-gray-100 p-6 rounded-lg shadow-lg">
                <h2 class="text-5xl font-bold text-greenOH-600 mb-4">1</h2>
                <p class="text-lg font-semibold text-greenOH-600">Plaats een vacature</p>
                <p>
                    Bedrijven hebben de mogelijkheid om eenvoudig een account aan te maken op ons platform.
                    Zodra het account door Open Hiring is aangemaakt, kunnen zij snel en zonder moeite hun
                    vacatures plaatsen, zodat ze direct zichtbaar worden voor werknemers.
                </p>
            </div>
            <!-- Reden 2 -->
            <div
                class="flex-1 basis-1/3 flex flex-col items-center text-center md:text-left md:items-start bg-gray-100 p-6 rounded-lg shadow-lg">
                <h2 class="text-5xl font-bold text-greenOH-600 mb-4">2</h2>
                <p class="text-lg font-semibold text-greenOH-600">Kandidaten melden zich aan</p>
                <p>
                    Werkzoekenden hebben de mogelijkheid zich in te schrijven voor de openstaande vacatures
                    die hen aanspreken. Nadat ze zich hebben aangemeld, worden ze in een wachtrij geplaatst,
                    waardoor werkgevers eenvoudig inzicht krijgen in het aantal geïnteresseerde kandidaten.
                </p>
            </div>
            <!-- Reden 3 -->
            <div
                class="flex-1 basis-1/3 flex flex-col items-center text-center md:text-left md:items-start bg-gray-100 p-6 rounded-lg shadow-lg">
                <h2 class="text-5xl font-bold text-greenOH-600 mb-4">3</h2>
                <p class="text-lg font-semibold text-greenOH-600">Automatische selectie</p>
                <p>
                    Zodra er behoefte is aan nieuwe medewerkers, haalt ons systeem automatisch de eerstvolgende
                    kandidaten uit de wachtrij. Dit maakt het wervingsproces eenvoudig en snel: zonder gedoe,
                    zonder vooroordeel, meteen aan de slag met beschikbare kandidaten.
                </p>
            </div>
        </div>
    </div>

    <div id="why_container" class="max-w-7xl mx-auto p-6 mb-20">
        <!-- Titel gecentreerd -->
        <h1 class="text-3xl font-bold text-center mb-10">Waarom kiezen voor Open Hiring?</h1>

        <!-- Drie redenen naast elkaar -->
        <div class="flex flex-col md:flex-row justify-between gap-6">
            <!-- Reden 1 -->
            <div
                class="flex-1 basis-1/3 flex flex-col items-center text-center md:text-left md:items-start bg-gray-100 p-6 rounded-lg shadow-lg">
                <h2 class="text-5xl font-bold text-violetOH-500 mb-4">1</h2>
                <p class="text-lg font-semibold text-violetOH-600">Tijd besparen</p>
                <p class="text-gray-700">
                    Met Open Hiring wordt het traditionele wervingsproces gestroomlijnd. Er is geen tijdrovende
                    selectieprocedure nodig.
                    Vacatures worden eenvoudig ingevuld door de eerstvolgende beschikbare kandidaten in de wachtrij,
                    waardoor je snel kunt schakelen en nieuwe medewerkers direct aan de slag kunnen.
                </p>
            </div>
            <!-- Reden 2 -->
            <div
                class="flex-1 basis-1/3 flex flex-col items-center text-center md:text-left md:items-start bg-gray-100 p-6 rounded-lg shadow-lg">
                <h2 class="text-5xl font-bold text-violetOH-500 mb-4">2</h2>
                <p class="text-lg font-semibold text-violetOH-600">Eerlijkheid voorop</p>
                <p class="text-gray-700">
                    Open Hiring richt zich op kansen voor iedereen. Zonder uitgebreide sollicitatieprocedures krijgen
                    werkzoekenden de kans om zich te bewijzen op basis van hun inzet, niet hun CV. Dit versterkt een
                    inclusieve en sociale bedrijfsvoering.
                </p>
            </div>
            <!-- Reden 3 -->
            <div
                class="flex-1 basis-1/3 flex flex-col items-center text-center md:text-left md:items-start bg-gray-100 p-6 rounded-lg shadow-lg">
                <h2 class="text-5xl font-bold text-violetOH-500 mb-4">3</h2>
                <p class="text-lg font-semibold text-violetOH-600">Kosten- en tijdbesparing</p>
                <p class="text-gray-700">
                    Door het weglaten van traditionele selectieprocessen bespaar je niet alleen op wervingskosten, maar
                    ook op tijd. Met ons eenvoudige systeem plaats je snel een vacature en laat je de rest aan ons over.
                </p>
            </div>
        </div>
    </div>
</x-layout>
