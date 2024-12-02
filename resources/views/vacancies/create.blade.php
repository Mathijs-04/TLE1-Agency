<form action="">

    <!-- Name -->
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="title" id="title" value="{{ old('title') }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 peer-focus:text-blue-600">Vacaturetitel</label>
        @error('name')
        <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>


</form>
