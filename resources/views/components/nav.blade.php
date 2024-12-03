<nav class="flex justify-between items-center p-5 bg-white border-b-2 border-gray-200">
    <!-- Logo -->
    <img id="nav-OH-logo" src="{{ Vite::asset('resources/images/Logo.png') }}" class="h-12">

    <!-- Midden navigatie-items -->
    <div class="flex gap-5 justify-center items-center absolute left-1/2 transform -translate-x-1/2">
        <a href="/" class="text-gray-800 font-medium text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline">Home</a>

        <!-- Dropdown -->
        <div class="relative group">
            <span class="text-gray-800 font-medium text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline cursor-pointer">
                About
            </span>
            <div class="absolute top-full left-1/2 transform -translate-x-1/2 bg-violetOH-500 p-4 rounded-lg shadow-lg opacity-0 transition-all duration-300 h-0 overflow-hidden min-w-[200px] group-hover:h-auto group-hover:opacity-100">
                <a href="/about-us" class="block text-white font-medium text-[18px] font-radikal py-2 hover:text-yellow-400">About Us</a>
                <a href="/open-hiring" class="block text-white font-medium text-[18px] font-radikal py-2 hover:text-yellow-400">
                    How does Open Hiring work?
                </a>
            </div>
        </div>

        <a href="/contact" class="text-gray-800 font-medium text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline">Contact</a>
        <a href="/vacatures" class="text-gray-800 font-medium text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline">Vacatures</a>
    </div>

    <!-- Login/Registreer -->
    <div class="flex justify-end">
        <a href="/aanmelden" class="text-gray-800 font-medium text-[18px] font-radikal px-4 py-2 hover:text-violetOH-500 hover:underline">
            Login/Registreer
        </a>
    </div>
</nav>
