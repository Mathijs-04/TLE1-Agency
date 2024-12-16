document.addEventListener('DOMContentLoaded', () => {
    const toggleButtons = document.querySelectorAll('.dropdown');

    toggleButtons.forEach(button => {
        const parentButton = button.parentElement;
        parentButton.addEventListener('click', () => {
            const contentId = parentButton.getAttribute('data-id');
            const content = document.getElementById(contentId);

            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                button.style.transform = 'rotate(180deg)';
            } else {
                content.classList.add('hidden');
                button.style.transform = 'rotate(0deg)';
            }
        });
    });
});
