
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('/resources/css/app.css')

</head>
    <body>
{{--        <div class="myvacancy1">--}}

{{--            <img src="{{ Vite::asset('resources/images/DeBeren.jpg') }}" alt="Logo" />--}}
{{--            <h1>De beren</h1>--}}
{{--            <h2>Wachtende:2</h2>--}}
{{--             <button>Uitnodigen</button>--}}
{{--        </div>--}}

        <div class="myvacancy1">
            @foreach ($vacancies as $vacancy)
                    @php
                        $imagePath = Vite::asset('resources/images/' . $vacancy->name . '.jpg');
                    @endphp

                    <div>
                        <img src="{{ $imagePath }}" alt="{{ $vacancy->name }} image" class="w-full h-48 object-cover rounded-md mb-4">

                        <h2>{{ $vacancy->name }}</h2>
                        <p>Wachtende: {{ $vacancy->waiting }}</p>
                        <button>Uitnodigen</button>

{{--                        <a href="{{ route('movies.show', $movie) }}" class="text-blue-500 hover:underline mt-4 inline-block">View Details</a>--}}
                    </div>
            @endforeach
        </div>
    </body>
</html>



