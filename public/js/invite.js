document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const count = parseInt(urlParams.get('count')) || 0;
    const container = document.getElementById('invite-container');

    for (let i = 1; i <= count; i++) {
        const div = document.createElement('div');
        div.className = 'mx-auto'; // Center the div
        div.style.width = '30rem'; // Set custom width to 30rem (1.5 times original)
        div.style.backgroundColor = '#E2ECC8'; // Background color
        div.style.padding = '2rem'; // Padding (similar to p-8)
        div.style.border = '1px solid black'; // Thin black border
        div.style.borderRadius = '0.5rem'; // Rounded corners (similar to rounded-md)
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
