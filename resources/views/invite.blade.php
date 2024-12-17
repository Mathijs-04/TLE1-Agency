<x-layout>
    <div class="bg-white flex flex-col items-center min-h-screen">
        <div class="text-center my-8">
            <h1 class="text-4xl font-bold">Uitnodigen</h1>
        </div>
        <div class="container mx-auto px-4">
            <div id="invite-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center"></div>
        </div>
        <div class="text-center mt-8">
            <form action="{{ route('invite.testEmail') }}" method="POST" id="invite-form">
                @csrf
                <div id="invite-container" class="grid grid-cols-1 gap-8"></div>
                <button type="submit"
                        class="relative w-72 h-14 rounded-full border-b-4 font-bold text-cream text-base mb-10"
                        style="background-color: #AA0160; border-color: #7c1a51;">
                    Versturen
                </button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/invite.js') }}"></script>
</x-layout>
