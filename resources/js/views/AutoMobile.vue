<script>
import {useAssets} from "@/composable/use-assets";
import {usePreLoaderStore} from "../store/preloader";
export default {
    name: "FoodProcessingPage",
    methods: {
        useAssets,
        initOwlCarousel() {
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
                        nav: false
                    }
                }
            });
        },
    },
    mounted() {
        this.initOwlCarousel();
    },
    beforeUnmount() {
        $('.owl-carousel').trigger('destroy.owl.carousel');
    },
    created() {
        usePreLoaderStore().setIsShow(false);
        window.setTimeout(() => {
            usePreLoaderStore().setIsShow(true);
        }, 1000);
    },
};
</script>

<style scoped></style>
<template>
    <div data-bs-spy="scroll" data-bs-target="#eBiz-landingNavbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="content z-2 position-relative foodProcessingPage" tabindex="0">
        <header id="scrollspyHeading">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h1 class="mb-3">
                            <span>Automobiles</span>
                        </h1>
                    </div>
                    <div class="col-xxl-8 col-lg-9">
                        <p class="mb-4 pe-lg-5 position-relative">Pakistan's rapidly growing automobile industry contributes significantly to GDP, driven by a burgeoning middle class and supportive government policies for new investors.</p>
                    </div>
                    <div class="col-12">
                        <img :src="useAssets('assets/automobilePage-bg.png')" alt="Img" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </header>

        <section class="sectorBriefDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Sector <span> Brief</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                        <p>Contributing a remarkable 2.8% to GDP, Pakistan's automobile industry is rapidly expanding, fueled by a growing middle class and supportive policies.</p>
                    </div>
                </div>

                <div class="row gx-3">
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/automobile-icon1.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Impact of Pakistan's Automobile Industry</h4>
                                <p class="mb-0 text-start">Pakistan's automobile industry is a significant driver of economic growth, contributing 2.8% to the GDP and generating 30 billion rupees in taxes and duties. This sector not only fuels economic expansion but also supports
                                    job creation, technological innovation, and the development of key infrastructure.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/automobile-icon2.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Pakistan's Growing Middle Class and Population</h4>
                                <p class="mb-0 text-start">Pakistan, the world’s sixth most populous country, boasts a rapidly expanding middle class, with 17 million households and 102 million individuals as of 2018. This growing demographic presents vast potential for businesses,
                                    driving demand across various sectors and contributing to a rising consumer market.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/automobile-icon3.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Pakistan's Fast-Growing Automobile Industry Driven by 2016 Policy</h4>
                                <p class="mb-0 text-start">Pakistan’s automobile industry is fastest growing in Asia. The production and sales have both grown by 171% and 172.5% respectively between (2014 and 2018), all of which has been fueled by the Automotive Development Policy
                                    introduced in 2016.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/automobile-icon4.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Automotive Development Policy 2016-21 Attracting Investment</h4>
                                <p class="mb-0 text-start">The ECC approved the "Automotive Development Policy 2016-21" on March 18, 2016, offering tax incentives to new automakers, attracting interest from companies like Renault, Nissan, Kia, SsangYong, Volkswagen, and Hyundai.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sectorBriefDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Automotive Development <span> Policy Goals</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                        <p>Designed to streamline investments, the policy outlines eligibility criteria and required documents for new automotive manufacturers seeking government approval.</p>
                    </div>
                </div>

                <div class="row gx-3">
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/automobile-icon5.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Eligibility Criteria</h4>
                                <p class="mb-3 text-start">The Board of Investment shall be the single point of contact for the investor with the government. Any new investor shall be required to submit a detailed business plan and relevant documents for manufacturing of vehicles
                                    to the Board of Investment. The Board of Investment shall have the Business Plan assessed by the Engineering Development Board, which shall verify the investor’s in-house assembly/manufacturing facilities for the manufacture
                                    of road worthy vehicles.</p>
                                <p class="text-start mb-0">
                                    The Engineering Development Board shall determine eligibility of the applicant under the defined criteria to be declared as Category A or Category B Investor. The Ministry of Industries and Production, on recommendation of the Engineering Development
                                    Board, shall approve a new investor under the relevant category. The Auto Industry Development Committee (AIDC) and Engineering Development Board shall review results of the new investor policy once every two years
                                    and shall recommend modifications, if any.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/automobile-icon6.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Documents Required</h4>
                                <p class="mb-3 text-start">Following documents are required by a new investor to submit BOI alongwith an application:
                                </p>
                                <ul>
                                    <li>Detailed Business Plan on EDB format alongwith documentary evidences, wherever applicable, of the following:
                                        <ul style="list-style: disc;" class="mt-2">
                                            <li>Land and Building</li>
                                            <li>Plant and Machinery</li>
                                            <li>IPO receipt of brand name and logo IV. Verified / authenticated copies of Contract Agreement (Technical Transfer / Assistance) from the following organizations:
                                                <ul style="list-style: disc;" class="mt-2">
                                                    <li>Foreign Office in the country of Foreign principal</li>
                                                    <li>Chamber of Commerce & Industries in the country of Foreign principal</li>
                                                    <li>Pakistan Embassy in the country of Foreign principal</li>
                                                    <li>Federation of Pakistan Chamber of Commerce & Industry (FPCCI), Pakistan</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="economicZonesDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Categories of <span>New Investment</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                        <p class="mb-2">Investment categories offer various incentives, including duty exemptions and reduced tariffs, to attract new automotive manufacturers and boost industry growth.</p>
                    </div>

                    <ul class="list-unstyled px-lg-5">
                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Duty-free import of plant and machinery for setting up the assembly and/or manufacturing facility on a one-time basis.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Import of 100 vehicles of the same variant in CBU form at 50% of the prevailing duty for test marketing after groundbreaking.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Concessional rate of custom duty at 10% on non-localized parts for a period of five years for the manufacturing of Cars and LCVs.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Import of all parts (both localized and non-localized) at prevailing customs duty applicable to non-localized parts for manufacturing of trucks, buses, and prime-movers for a period of three years.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">The existing policy for the Motorcycle industry as approved by the government and notified by FBR vide SRO 939(I)/2013 and SRO 940(I)/2013 shall continue.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Import of non-localized parts at 10% rate of customs duty for a period of three years for the manufacturing of Cars and LCVs.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Import of localized parts at 25% duty for a period of three years for the manufacturing of Cars and LCVs.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Import of localized parts at prevailing customs duty applicable to non-localized parts for manufacturing of trucks, buses, and prime-movers for a period of three years.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Import of non-localized parts at prevailing customs duty applicable to non-localized parts for manufacturing of trucks, buses, and prime-movers for a period of three years.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="majorInvestorsDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2><span>Major </span> Investors</h2>
                    </div>

                    <div class="col-lg-9 mx-auto col-12 text-center mb-3">
                        <p>Discover key investors in the textile sector, driving innovation and growth while shaping the future of this dynamic industry in Pakistan.</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img :src="useAssets('assets/hino-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/honda-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/nissan-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/toyota-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/kia-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/suzuki-logo.svg')" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="economicZonesDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container px-lg-5 px-4">
                <ul class="list-unstyled row">
                    <div class="col-lg-4">
                        <li class="p-4 h-100">
                            <h5 class="mb-0 text-start">Mr. Zulfiqar Ali</h5>
                            <p class="mb-2 text-start">Director</p>
                            <p class="mb-0 text-start">Prime Minister’s</p>
                            <p class="mb-0 text-start">Office Board of Investment</p>
                            <p class="mb-0 text-start">Tel: 051-9206164</p>
                        </li>
                    </div>

                    <div class="col-lg-4">
                        <li class="p-4 h-100">
                            <h5 class="mb-0 text-start">Mr. Usman Ali</h5>
                            <p class="mb-2 text-start">Deputy Manager</p>
                            <p class="mb-0 text-start">Prime Minister’s</p>
                            <p class="mb-0 text-start">Office Board of Investment</p>
                            <p class="mb-0 text-start">Tel: 051-9206164</p>
                        </li>
                    </div>

                    <div class="col-lg-4">
                        <li class="p-4 h-100">
                            <h5 class="mb-0 text-start">Mr. Zakria Khan</h5>
                            <p class="mb-2 text-start">Assistant Chief</p>
                            <p class="mb-0 text-start">Prime Minister’s</p>
                            <p class="mb-0 text-start">Office Board of Investment</p>
                            <p class="mb-0 text-start">Tel: 051-9206164</p>
                        </li>
                    </div>
                </ul>
            </div>
        </section>

        <section class="downloadButtonsDiv mb-5" id="scrollspyHeading4">
            <div class="container px-md-5 px-4">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6 mb-lg-0 mb-3">
                        <a href="https://invest.gov.pk/textile?language_id=en#gallery-1" target="_blank" class="w-100 p-3 d-flex align-items-center justify-content-center border-0 h-100">
                            <span class="me-4">Download Sector Profile</span>
                            <span>
                                <img :src="useAssets('assets/download-icon.svg')" alt="">
                            </span>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-lg-0 mb-3">
                        <a href="https://invest.gov.pk/textile?language_id=en#gallery-1" target="_blank" class="w-100 p-3 d-flex align-items-center justify-content-center border-0 h-100">
                            <span class="me-4">Download Sector Profile (Updated)</span>
                            <span>
                                <img :src="useAssets('assets/download-icon.svg')" alt="">
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>
</template>

