document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const count = parseInt(urlParams.get('count')) || 0;
    const container = document.getElementById('invite-container');

    for (let i = 1; i <= count; i++) {
        const div = document.createElement('div');
        div.className = 'p-8 rounded-md w-80 mx-auto';
        div.style.backgroundColor = '#E2ECC8';
        div.innerHTML = `
            <h3 class="font-custom font-bold mb-4">Wachtende ${i}</h3>
            <form>
                <label for="date${i}" class="block mb-2">Kies een datum:</label>
                <input type="date" id="date${i}" class="w-full mb-4 p-2 rounded-md" style="background-color: #FBFCF6;">
                <label for="time${i}" class="block mb-2">Kies een tijd:</label>
                <input type="time" id="time${i}" class="w-full mb-4 p-2 rounded-md" style="background-color: #FBFCF6;">
            </form>
        `;
        container.appendChild(div);
    }
});
