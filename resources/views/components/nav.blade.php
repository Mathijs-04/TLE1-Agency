<nav class="flex justify-between items-center p-5 bg-white border-b-2 border-gray-200">
    <!-- Logo -->
    <a href="/" id="nav-OH-logo">
        <img src="{{ Vite::asset('resources/images/Logo.png') }}" class="h-14" alt="Logo">
    </a>
    <!-- Midden navigatie-items -->
    <div class="flex gap-5 justify-center items-center absolute left-1/2 transform -translate-x-1/2">

        <!-- Dropdown About -->
        <div class="relative group">
            <span class="text-gray-800 font-medium text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline cursor-pointer
                @if(Request::is('about-us') || Request::is('open-hiring')) text-violetOH-500 @endif
            ">
                Open Hiring
            </span>
            <div class="absolute top-full left-1/2 transform -translate-x-1/2 bg-violetOH-500 p-4 rounded-lg shadow-lg opacity-0 transition-all duration-300 h-0 overflow-hidden min-w-[200px] group-hover:h-auto group-hover:opacity-100">
                <a href="/about-us" class="block text-white font-medium text-[18px] font-radikal py-2 hover:text-yellow-400
                @if(Request::is('about-us')) text-yellow-400 @endif">Over ons</a>
                <a href="/open-hiring" class="block text-white font-medium text-[18px] font-radikal py-2 hover:text-yellow-400
                @if(Request::is('open-hiring')) text-yellow-400 @endif">Hoe werkt Open Hiring?</a>
            </div>
        </div>

        <a href="/contact" class="text-gray-800 font-medium text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline
            @if(Request::is('contact')) text-violetOH-500 @endif">Contact</a>
        <a href="/vacatures" class="text-gray-800 font-medium text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline
            @if(Request::is('vacatures')) text-violetOH-500 @endif">Vacatures</a>
    </div>

    @auth
        <!-- Profile Dropdown -->
        <div class="relative group">
            <a href="#" class="text-gray-800 font-medium text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline cursor-pointer
                @if(Request::is('profile') || Request::is('vacatures')) text-violetOH-500 @endif">
                Profile
            </a>
            <div class="absolute top-full right-0 bg-violetOH-500 p-4 rounded-lg shadow-lg opacity-0 transition-all duration-300 h-0 overflow-hidden min-w-[200px] group-hover:h-auto group-hover:opacity-100">
                <a href="/profile" class="block text-white font-medium text-[18px] font-radikal py-2 hover:text-yellow-400
                @if(Request::is('profile')) text-yellow-400 @endif">Mijn Profiel</a>
                <a href="/vacatures" class="block text-white font-medium text-[18px] font-radikal py-2 hover:text-yellow-400
                @if(Request::is('vacatures')) text-yellow-400 @endif">Mijn Vacatures</a>
            </div>
        </div>
    @else
        <!-- Login/Registreer -->
        <div class="flex justify-end">
            <a href="/login" class="text-gray-800 font-medium text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline
                @if(Request::is('login')) text-violetOH-500 @endif">
                Login
            </a>
            <a href="/register" class="text-gray-800 font-medium text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline
                @if(Request::is('register')) text-violetOH-500 @endif">
                Registreer
            </a>
        </div>
    @endauth
</nav>
