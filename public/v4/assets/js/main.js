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

const images = {
    "foodProcessing-tab": "v4/assets/food-processing-img1.png",
    "logistics-tab": "v4/assets/food-processing-img1.png",
    "autoMobile-tab": "v4/assets/food-processing-img1.png",
    "textile-tab": "v4/assets/food-processing-img1.png",
    "InfoTech-tab": "v4/assets/food-processing-img1.png",
    "housing-tab": "v4/assets/food-processing-img1.png",
    "tourism-tab": "v4/assets/food-processing-img1.png",
    "frozen-food-tab": "v4/assets/frozen-food-img1.png",
    "edible-oils-tab": "v4/assets/frozen-food-img1.png",
    "value-addition-tab": "v4/assets/frozen-food-img1.png",
    "fruits-dairy-tab": "v4/assets/frozen-food-img1.png",
    "frozen-food-processing-tab": "v4/assets/frozen-food-img1.png",
    "supply-chain-tab": "v4/assets/supply-chain-img.png",
    "railway-network-tab": "v4/assets/supply-chain-img.png",
    "public-private-tab": "v4/assets/supply-chain-img.png",
    "geographic-location-tab": "v4/assets/supply-chain-img.png",
    "agri-food-processing-tab": "v4/assets/supply-chain-img.png",
    "productivity-tab": "v4/assets/productivity-img.png",
    "domestic-garment-tab": "v4/assets/productivity-img.png",
    "employment-tab": "v4/assets/productivity-img.png",
    "comparative-advantage-tab": "v4/assets/productivity-img.png"
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
