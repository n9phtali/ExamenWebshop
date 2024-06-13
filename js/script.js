window.updateContent = function(language) {
    if (language === 'english') {
        document.querySelector('html').setAttribute('lang', 'en');

        document.querySelector('.text h1').textContent = 'Are you ready for a premium experience?';
        document.querySelector('.text .text').textContent = 'Enter First name';
        document.querySelector('a[href="#ervaring"]').textContent = 'About me';
        document.querySelector('a[href="#about"]').textContent = 'Programs';
        document.querySelector('a[href="#services"]').textContent = 'Services';
        document.querySelector('a[href="#contact"]').textContent = 'Contact';
        document.querySelector('#home .text-container h1').textContent = 'Welcome to My Website';
    }
    else if (language === 'dutch') {
        document.querySelector('html').setAttribute('lang', 'nl');

        document.querySelector('.text h1').textContent = 'Ben je klaar voor de premium gay shit';
        document.querySelector('.text .text').textContent = 'Voornaam';
        document.querySelector('a[href="#ervaring"]').textContent = 'Over mij';
        document.querySelector('a[href="#about"]').textContent = 'Programma\'s';
        document.querySelector('a[href="#services"]').textContent = 'Diensten';
        document.querySelector('a[href="#contact"]').textContent = 'Contact';
        document.querySelector('#home .text-container h1').textContent = 'Welkom op Mijn Website';
    }

    localStorage.setItem('preferredLanguage', language);
};

document.addEventListener("DOMContentLoaded", function() {
    var selectedLanguage = localStorage.getItem('preferredLanguage');

    if (!selectedLanguage) {
        var overlay = document.getElementById('popup');
        overlay.style.display = 'flex';
    } else {
        updateContent(selectedLanguage);
    }
});
