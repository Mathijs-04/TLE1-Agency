<nav class="flex justify-between items-center p-5 bg-white border-b-2 border-gray-200">
    <!-- Logo -->
    <a href="/" id="nav-OH-logo">
        <img src="{{ asset('images/Logo.png') }}" class="h-14" alt="Logo">
    </a>
    <!-- Midden navigatie-items -->
    <div class="flex gap-5 justify-center items-center absolute left-1/2 transform -translate-x-1/2">

        <!-- Dropdown About -->
        <div class="relative group">
            <span class="text-gray-800 text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline cursor-pointer
                @if(Request::is('about-us') || Request::is('open-hiring')) text-violetOH-500 @endif
            ">
                Open Hiring
            </span>
            <div
                class="absolute top-full left-1/2 transform -translate-x-1/2 bg-violetOH-500 p-4 rounded-lg shadow-lg opacity-0 transition-all duration-300 h-0 overflow-hidden min-w-[200px] group-hover:h-auto group-hover:opacity-100 group-focus-within:h-auto group-focus-within:opacity-100">
                <a href="/404" class="block text-white text-[18px] font-radikal py-2 hover:text-yellow-400
                @if(Request::is('about-us')) text-yellow-400 @endif font-custom font-bold">Over ons</a>
                <a href="/404" class="block text-white text-[18px] font-radikal py-2 hover:text-yellow-400
                @if(Request::is('open-hiring')) text-yellow-400 @endif font-custom font-bold">Hoe werkt Open Hiring?</a>
            </div>
        </div>

        <a href="/404" class="text-gray-800 text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline
            @if(Request::is('contact')) text-violetOH-500 font-custom font-bold @endif ">Contact</a>
        <a href="/404" class="text-gray-800 text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline
            @if(Request::is('vacatures')) text-violetOH-500 font-custom font-bold @endif">Vacatures</a>
    </div>

    @auth
        <!-- Profile Dropdown -->
        <div class="relative group">
            <a href="#" class="text-gray-800 text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline cursor-pointer
                @if(Request::is('profile') || Request::is('vacatures'))  @endif font-custom ">
                Profiel
            </a>
            <div
                class="absolute top-full right-0 bg-violetOH-500 p-4 rounded-lg shadow-lg opacity-0 transition-all duration-300 h-0 overflow-hidden min-w-[200px] group-hover:h-auto group-hover:opacity-100 group-focus-within:h-auto group-focus-within:opacity-100">
                <a href="/profile" class="block text-white text-[18px] font-radikal py-2 hover:text-yellow-400
                @if(Request::is('profile')) text-yellow-400 font-custom font-bold @endif ">Mijn Profiel</a>
                <a href="/mijn-vacatures" class="block text-white text-[18px] font-radikal py-2 hover:text-yellow-400
                @if(Request::is('vacatures')) text-yellow-400 font-custom font-bold @endif ">Mijn Vacatures</a>
                <a href="{{ route('company.index')}}"
                   class="block text-white text-[18px] font-radikal py-2 hover:text-yellow-400
                @if(Request::is('company.index')) text-yellow-400 font-custom font-bold @endif">
                    Mijn Bedrijfspagina
                </a>

                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="block text-white text-[18px] font-radikal py-2 hover:text-yellow-400 font-custom font-bold">
                    Uitloggen
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    @else
        <!-- Login/Registreer -->
        <div class="flex justify-end">
            <a href="/login" class="text-gray-800 text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline
                @if(Request::is('login')) text-violetOH-500 @endif font-custom font-bold">
                Login
            </a>
            <a href="/register" class="text-gray-800 text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline
                @if(Request::is('register')) text-violetOH-500 @endif font-custom font-bold">
                Registreer
            </a>
        </div>
    @endauth
</nav>
