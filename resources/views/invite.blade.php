<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uitnodigen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-white flex flex-col items-center min-h-screen">
<div class="text-center my-8">
    <h1 class="text-4xl font-bold">Uitnodigen</h1>
</div>
<div class="container mx-auto flex justify-center space-x-8 px-4">
    <div class="bg-gray-200 p-8 rounded-md w-64">
        <h3 class="font-custom font-bold mb-4">Wachtende 1</h3>
        <form>
            <label for="time1" class="block mb-2">Kies een tijd:</label>
            <input type="time" id="time1" class="w-full mb-4 p-2 rounded-md bg-gray-300">
            <label for="date1" class="block mb-2">Kies een datum:</label>
            <input type="date" id="date1" class="w-full mb-4 p-2 rounded-md bg-gray-300">
        </form>
    </div>
    <div class="bg-gray-200 p-8 rounded-md w-64">
        <h3 class="font-custom font-bold mb-4">Wachtende 2</h3>
        <form>
            <label for="time2" class="block mb-2">Kies een tijd:</label>
            <input type="time" id="time2" class="w-full mb-4 p-2 rounded-md bg-gray-300">
            <label for="date2" class="block mb-2">Kies een datum:</label>
            <input type="date" id="date2" class="w-full mb-4 p-2 rounded-md bg-gray-300">
        </form>
    </div>
    <div class="bg-gray-200 p-8 rounded-md w-64">
        <h3 class="font-custom font-bold mb-4">Wachtende 3</h3>
        <form>
            <label for="time3" class="block mb-2">Kies een tijd:</label>
            <input type="time" id="time3" class="w-full mb-4 p-2 rounded-md bg-gray-300">
            <label for="date3" class="block mb-2">Kies een datum:</label>
            <input type="date" id="date3" class="w-full mb-4 p-2 rounded-md bg-gray-300">
        </form>
    </div>
</div>
<div class="text-center mt-8">
    <button class="bg-pink-700 text-white font-bold py-3 px-6 rounded-full text-lg">Versturen</button>
</div>
</body>
</html>
