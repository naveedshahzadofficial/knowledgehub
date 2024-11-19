document.querySelectorAll('#eBiz-landingNavbar .nav-link, #eBiz-landingNavbar .dropdown-item').forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault();

        const targetID = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetID);

        if (targetElement) {
            const offset = 50;
            const elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;

            window.scrollTo({
                top: elementPosition - offset,
                behavior: 'smooth'
            });
        }
    });
});

document.querySelector('.navbar-toggler').addEventListener('click', function() {
    this.classList.toggle('open');
});
