/*document.addEventListener("DOMContentLoaded", () => {
    window.onload = () => {
        const preloader = document.querySelector(".preloader");
        if (preloader) {
            preloader.classList.add("hidden");
        }
    };
});*/

document.querySelectorAll('#eBiz-landingNavbar .nav-link, #eBiz-landingNavbar .dropdown-item').forEach(link => {
    link.addEventListener('click', function (event) {
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

document.querySelector('.navbar-toggler').addEventListener('click', function () {
    this.classList.toggle('open');
});

$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,
    autoplay: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: false
        },
        600: {
            items: 3,
            nav: false
        },
        1000: {
            items: 6,
            nav: true
        }
    }
});

    $('.owl-carousel:not(.sectorObjectiveCarousel)').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 6,
                nav: false
            }
        }
    });

    $('.sectorObjectiveCarousel').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 3,
                nav: false
            },
            1200: {
                items: 5,
                nav: false
            },
        }
    });

const images = {
    "foodProcessing-tab": "v4/assets/food-processing-img1.png",
    "logistics-tab": "v4/assets/logistics-landing-img.png",
    "autoMobile-tab": "v4/assets/automobile-landing-img.png",
    "textile-tab": "v4/assets/textile-landing-img.png",
    "InfoTech-tab": "v4/assets/info-tech-landing-img.png",
    "housing-tab": "v4/assets/housing-landing-img.png",
    "tourism-tab": "v4/assets/tourism-landing-img.png",
    "frozen-food-tab": "v4/assets/frozen-food-img1.png",
    "edible-oils-tab": "v4/assets/edible-oil-img.png",
    "value-addition-tab": "v4/assets/value-addition-img.png",
    "fruits-dairy-tab": "v4/assets/fruits-dairy-img.png",
    "agri2-food-processing-tab": "v4/assets/agri-foods-img.png",
    "frozen-food-processing-tab": "v4/assets/frozen-food-img1.png",
    "supply-chain-tab": "v4/assets/supply-chain-img.png",
    "railway-network-tab": "v4/assets/railway-img.png",
    "public-private-tab": "v4/assets/public-private-img.png",
    "geographic-location-tab": "v4/assets/geographic-img.png",
    "agri-food-processing-tab": "v4/assets/supply-chain-img.png",
    "productivity-tab": "v4/assets/productivity-img.png",
    "domestic-garment-tab": "v4/assets/garment-img.png",
    "employment-tab": "v4/assets/employment-img.png",
    "comparative-advantage-tab": "v4/assets/comparative-advantage-img.png",
    "hotels-tab": "v4/assets/hotels-img.png",
    "foodService-tab": "v4/assets/food-service-img.png"
};

document.querySelectorAll('#investmentTabs .nav-link').forEach(tab => {
    tab.addEventListener('shown.bs.tab', function (event) {
        const newTabId = event.target.id;
        const newImageSrc = images[newTabId];

        const imgElement = document.getElementById('investmentImg');

        imgElement.classList.remove('show', 'active');
        imgElement.classList.add('fade');

        setTimeout(() => {
            imgElement.src = newImageSrc;
            imgElement.classList.add('show', 'active');
        }, 150);
    });
});

window.addEventListener('scroll', function () {
    var navbar = document.getElementById('eBiz-landingNavbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});
