document.addEventListener('DOMContentLoaded', () => {
    const inviteButtons = document.querySelectorAll('.inviteButton');
    const popup = document.getElementById('popup');
    const cancelButton = document.getElementById('cancelButton');
    const confirmButton = document.getElementById('confirmButton');
    const increment = document.getElementById('increment');
    const decrement = document.getElementById('decrement');
    const userCount = document.getElementById('userCount');

    let count = 1;
    let maxUsers = 0;

    inviteButtons.forEach(button => {
        button.addEventListener('click', () => {
            popup.classList.remove('hidden');
            maxUsers = button.getAttribute("data-waiting");
        });
    });

    cancelButton.addEventListener('click', () => {
        popup.classList.add('hidden');
    });

    confirmButton.addEventListener('click', () => {
        // count moet mee naar uitnodiging pagina
        const url = `/uitnodigen?count=${count}`;
        window.location.href = url;
    });

    increment.addEventListener('click', () => {
        if (count < maxUsers) {
            count++;
            userCount.textContent = count;
        }
    });

    decrement.addEventListener('click', () => {
        if (count > 1) {
            count--;
            userCount.textContent = count;
        }
    });
});
