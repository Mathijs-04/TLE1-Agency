<x-layout>
    @section("title", $profile->title)
    <h1>Welkom, {{ $profile->title }}</h1>
    <p>Description: {{ $profile->description }}</p>
    <p>City: {{ $profile->city }}</p>
</x-layout>

