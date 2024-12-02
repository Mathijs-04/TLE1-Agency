<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="homepage">
    <div class="flex p-6 items-center justify-between">
        <!-- Text section -->
        <div class="w-full md:w-1/2">
            <p class="text-center text-5xl font-bold text-gray-700 mb-6">Morgen werk voor jou!</p>
            <p class="text-center leading-relaxed text-gray-800 mb-6">
                Met Open Hiring heeft iedereen een eerlijke kans<br/>op een baan. Wie wil én kan werken, kan zó aan de
                slag.
                <br/>Zonder sollicitatiegesprek, zonder brief, zonder vragen. <br/>Met één druk op de knop. Open Hiring
                draait namelijk <br/>niet om diploma’s, maar om mensen. Niet om praatjes, <br/>maar om aanpakken.
            </p>
            <div class="flex items-center justify-center">
                <button
                    id="button1"
                    class="relative w-72 h-14 rounded-full border-b-4 border-[#7c1a51] font-bold text-cream text-base">
                    Bekijk vacature
                </button>
            </div>
        </div>
        <!-- Image section -->
        <div class="w-full md:w-1/2 ml-6">
            <img src="{{ asset('/images/homeimage.png') }}" alt="image" class="w-full h-auto rounded-lg">
        </div>
    </div>
</div>
</body>
</html>
