document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const count = parseInt(urlParams.get('count')) || 0;
    const container = document.getElementById('invite-container');
    const submitButton = document.querySelector('button[type="submit"]');

    for (let i = 1; i <= count; i++) {
        const div = document.createElement('div');
        div.className = 'mx-auto';
        div.style.width = '30rem';
        div.style.backgroundColor = '#E2ECC8';
        div.style.padding = '2rem';
        div.style.border = '1px solid black';
        div.style.borderRadius = '0.5rem';
        div.innerHTML = `
            <h3 class="font-custom font-bold mb-4">Wachtende ${i}</h3>
            <form>
                <label for="date${i}" class="block mb-2">Kies een datum:</label>
                <input type="date" id="date${i}" class="w-full mb-4 p-2 rounded-md" style="background-color: #FBFCF6;" required>
                <label for="time${i}" class="block mb-2">Kies een tijd:</label>
                <input type="time" id="time${i}" class="w-full mb-4 p-2 rounded-md" style="background-color: #FBFCF6;" required>
            </form>
        `;
        container.appendChild(div);
    }

    function validateForms() {
        const forms = container.querySelectorAll('form');
        for (let form of forms) {
            const inputs = form.querySelectorAll('input[required]');
            for (let input of inputs) {
                if (!input.value) {
                    return false;
                }
            }
        }
        return true;
    }

    function updateButtonState() {
        if (validateForms()) {
            submitButton.disabled = false;
            submitButton.style.backgroundColor = '#7c1a51';
            submitButton.style.borderColor = '#7c1a51';
            submitButton.classList.remove('cursor-not-allowed');
        } else {
            submitButton.disabled = true;
            submitButton.style.backgroundColor = '#d3d3d3';
            submitButton.style.borderColor = '#a9a9a9';
            submitButton.classList.add('cursor-not-allowed');
        }
    }

    container.addEventListener('input', updateButtonState);
    updateButtonState();
});
