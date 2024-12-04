<x-layout>
    <body class="bg-gray-100">

    <div class="flex justify-center items-center min-h-screen bg-gray-100 pt-16 pb-16">
        <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-3xl">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Bewerk Profiel</h2>

            <!-- Profile Edit Form -->
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <!-- Input Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">Naam</label>
                        <input id="name" name="name" type="text" value="{{ old('name', auth()->user()->name) }}"
                               class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:border-violet-500 focus:ring-2 focus:ring-violet-500 focus:outline-none transition duration-200" required>
                        @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">E-mail</label>
                        <input id="email" name="email" type="email" value="{{ old('email', auth()->user()->email) }}"
                               class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:border-violet-500 focus:ring-2 focus:ring-violet-500 focus:outline-none transition duration-200" required>
                        @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Update Profile Button -->
                <div class="flex justify-end mb-6">
                    <button type="submit" class="bg-violetOH-500 hover:bg-violetOH-600 text-white font-bold px-6 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-violet-500">
                        Opslaan
                    </button>
                </div>
            </form>

            <!-- Change Password Section -->
            <hr class="my-6">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <!-- Password Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Current Password -->
                    <div>
                        <label for="current_password" class="block text-gray-700 font-medium mb-2">Huidig Wachtwoord</label>
                        <input id="current_password" name="current_password" type="password"
                               class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:border-violet-500 focus:ring-2 focus:ring-violet-500 focus:outline-none transition duration-200" required>
                        @error('current_password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2">Nieuw Wachtwoord</label>
                        <input id="password" name="password" type="password"
                               class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:border-violet-500 focus:ring-2 focus:ring-violet-500 focus:outline-none transition duration-200" required>
                        @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Bevestig Nieuw Wachtwoord</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                           class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:border-violet-500 focus:ring-2 focus:ring-violet-500 focus:outline-none transition duration-200" required>
                    @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Change Password Button -->
                <div class="flex justify-end mb-6">
                    <button type="submit" class="bg-violetOH-500 hover:bg-violetOH-600 text-white font-bold px-6 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-violet-500">
                        Wijzig Wachtwoord
                    </button>
                </div>
            </form>

            <!-- Change Password Section -->
            <hr class="my-6">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <!-- Password Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Current Password -->
                    <div>
                        <label for="current_password" class="block text-gray-700 font-medium mb-2">Huidig Wachtwoord</label>
                        <input id="current_password" name="current_password" type="password"
                               class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:border-violet-500 focus:ring-2 focus:ring-violet-500 focus:outline-none transition duration-200" required>
                        @error('current_password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2">Nieuw Wachtwoord</label>
                        <input id="password" name="password" type="password"
                               class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:border-violet-500 focus:ring-2 focus:ring-violet-500 focus:outline-none transition duration-200" required>
                        <p class="mt-1 text-sm text-gray-600">Wachtwoord moet minimaal 8 karakters lang zijn.</p>
                        @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Bevestig Nieuw Wachtwoord</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                           class="block w-full h-12 px-4 border border-gray-300 rounded-lg shadow-md text-gray-800 focus:border-violet-500 focus:ring-2 focus:ring-violet-500 focus:outline-none transition duration-200" required>
                    @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Change Password Button -->
                <div class="flex justify-end mb-6">
                    <button type="submit" class="bg-violetOH-500 hover:bg-violetOH-600 text-white font-bold px-6 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-violet-500">
                        Wijzig Wachtwoord
                    </button>
                </div>
            </form>


        </div>
    </div>
    </body>
</x-layout>
