document.addEventListener('DOMContentLoaded', () => {
    const toggleSwitch = document.getElementById('toggleSwitch');
    const slider = document.getElementById('slider');
    const section1Label = document.getElementById('section1Label');
    const section2Label = document.getElementById('section2Label');
    const section1 = document.getElementById('section1');
    const section2 = document.getElementById('section2');

    let activeSection = 1; // Initialiseer met sectie 1 als actief

    // Functie om de UI bij te werken op basis van de actieve sectie
    function updateUI() {
        if (activeSection === 1) {
            slider.style.transform = 'translateX(0)';
            section1.classList.remove('hidden');
            section2.classList.add('hidden');
            section1Label.classList.add('text-white');
            section1Label.classList.remove('text-gray-900');
            section2Label.classList.add('text-gray-900');
            section2Label.classList.remove('text-white');
        } else {
            slider.style.transform = 'translateX(100%)';
            section2.classList.remove('hidden');
            section1.classList.add('hidden');
            section2Label.classList.add('text-white');
            section2Label.classList.remove('text-gray-900');
            section1Label.classList.add('text-gray-900');
            section1Label.classList.remove('text-white');
        }
    }

    // Eventlistener voor klikken op de toggle
    toggleSwitch.addEventListener('click', () => {
        activeSection = activeSection === 1 ? 2 : 1;
        updateUI();
    });

    // Stel bij het laden van de pagina de UI in
    updateUI();
});
