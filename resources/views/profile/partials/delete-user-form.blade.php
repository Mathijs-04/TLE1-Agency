<form method="POST" action="{{ route('profile.destroy') }}" class="mt-6">
    @csrf
    @method('DELETE')

    <div class="bg-red-50 border border-red-500 text-red-500 rounded-lg p-4">
        <h3 class="text-xl font-bold text-center">Account Verwijderen</h3>
        <p class="text-center mt-2">Als je je account verwijdert, kunnen alle gegevens permanent verloren gaan.</p>

        <div class="mt-6 text-center">
            <x-primary-button class="bg-red-500 hover:bg-red-600 text-white font-bold px-6 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-red-500">
                Verwijder Account
            </x-primary-button>
        </div>
    </div>
</form>
