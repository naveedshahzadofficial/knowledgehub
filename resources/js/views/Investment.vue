<template>
    <div data-bs-spy="scroll" data-bs-target="#eBiz-landingNavbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="content investmentsPageContent" tabindex="0">
        <header class="connectivityHeader">
            <img :src="useAssets('assets/connectivity-page-bg.png')" alt="" class="img-fluid w-100 position-absolute z-1 pb-5">
            <div class="container-fluid px-4">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h1 class="mb-lg-4 position-relative z-1">Investments</h1>
                    </div>
                </div>
            </div>
        </header>

        <section class="investmentsDiv py-5 bg-white position-relative z-2" id="scrollspyHeading4">
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card border-0 shadow-none">
                            <div class="card-body">
                                <img :src="useAssets('assets/textile-icon.svg')" alt="textile Icon" class="img-fluid mb-3">
                                <h6 class="mb-3">Textile</h6>
                                <p class="mb-0 text-start">Pakistan is Asia's 8th largest textile exporter and the 4th largest cotton producer. Its textile sector, comprising 423 industries, makes up 46% of manufacturing and employs 40% of the workforce. Access to abundant raw
                                    materials like cotton and rayon benefits production costs and efficiency.</p>
                                <a href="#" class="py-2 viewAllBusinessSolutions d-inline-flex align-items-center justify-content-center viewAllBtn learnMoreBtn">
                                    <span>Learn More</span>
                                    <span class="pe-2">
                                        <img :src="useAssets('assets/viewAll-icon.svg')" alt="arrow Icon">
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-6 mb-3">
                        <img :src="useAssets('assets/investments-img-1.png')" alt="testile Img" class="img-fluid w-100 h-100 investments-img-1">
                    </div>

                    <div class="col-lg-8 col-md-6 mb-3">
                        <img :src="useAssets('assets/investments-img-2.png')" alt="testile Img" class="img-fluid w-100 h-100 investments-img-2">
                    </div>

                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card border-0 shadow-none">
                            <div class="card-body">
                                <img :src="useAssets('assets/logistics-icon.svg')" alt="Logistics Icon" class="img-fluid mb-3">
                                <h6 class="mb-3">Logistics</h6>
                                <p class="mb-0 text-start">Pakistan, with nearly 210 million people, is the sixth most populous country, growing at 2.4% annually. Transport contributes 22.3% to GDP and 6% to employment, supporting trade and a Gulf-based workforce, with increasing
                                    ties to Central Asia.</p>
                                <a href="#" class="py-2 viewAllBusinessSolutions d-inline-flex align-items-center justify-content-center viewAllBtn learnMoreBtn">
                                    <span>Learn More</span>
                                    <span class="pe-2">
                                        <img :src="useAssets('assets/viewAll-icon.svg')" alt="arrow Icon">
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card border-0 shadow-none">
                            <div class="card-body">
                                <img :src="useAssets('assets/food-processing-icon.svg')" alt="textile Icon" class="img-fluid mb-3">
                                <h6 class="mb-3">Food Processing</h6>
                                <p class="mb-0 text-start">Pakistan’s food processing industry, second to textiles, provides 16% of manufacturing jobs and 27% of production value. With 102 million in the middle class, it attracts $223.5 million annually in FDI. Key segments include
                                    frozen food, value-added crops, and processed produce, with EU GSP Plus Status enhancing exports.</p>
                                <a href="#" class="py-2 viewAllBusinessSolutions d-inline-flex align-items-center justify-content-center viewAllBtn learnMoreBtn">
                                    <span>Learn More</span>
                                    <span class="pe-2">
                                        <img :src="useAssets('assets/viewAll-icon.svg')" alt="arrow Icon">
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-6 mb-3">
                        <img :src="useAssets('assets/investments-img-3.png')" alt="testile Img" class="img-fluid w-100 h-100 investments-img-1">
                    </div>

                    <div class="col-lg-8 col-md-6 mb-3">
                        <img :src="useAssets('assets/investments-img-4.png')" alt="testile Img" class="img-fluid w-100 h-100 investments-img-2">
                    </div>

                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card border-0 shadow-none">
                            <div class="card-body">
                                <img :src="useAssets('assets/automobile-icon.svg')" alt="Logistics Icon" class="img-fluid mb-3">
                                <h6 class="mb-3">Automobiles</h6>
                                <p class="mb-0 text-start">Pakistan’s automobile industry, contributing 2.8% to GDP, grew over 170% in production and sales from 2014 to 2018, fueled by the 2016 Automotive Development Policy. Tax incentives have attracted brands like Renault, Nissan,
                                    Kia, and Hyundai to the market.</p>
                                <a href="#" class="py-2 viewAllBusinessSolutions d-inline-flex align-items-center justify-content-center viewAllBtn learnMoreBtn">
                                    <span>Learn More</span>
                                    <span class="pe-2">
                                        <img :src="useAssets('assets/viewAll-icon.svg')" alt="arrow Icon">
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card border-0 shadow-none">
                            <div class="card-body">
                                <img :src="useAssets('assets/it-icon.svg')" alt="textile Icon" class="img-fluid mb-3">
                                <h6 class="mb-3">Information Technology</h6>
                                <p class="mb-0 text-start">The global digital economy was valued at $11.5 trillion in 2016. Pakistan, with a young and growing workforce, has over 2,000 IT companies and 300,000 IT professionals. The ICT sector, aiming for $20 billion by 2025, is
                                    supported by Pakistan Vision 2025 and the 2018 Digital Policy.</p>
                                <a href="#" class="py-2 viewAllBusinessSolutions d-inline-flex align-items-center justify-content-center viewAllBtn learnMoreBtn">
                                    <span>Learn More</span>
                                    <span class="pe-2">
                                        <img :src="useAssets('assets/viewAll-icon.svg')" alt="arrow Icon">
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-6 mb-3">
                        <img :src="useAssets('assets/investments-img-5.png')" alt="testile Img" class="img-fluid w-100 h-100 investments-img-1">
                    </div>

                    <div class="col-lg-8 col-md-6 mb-3">
                        <img :src="useAssets('assets/investments-img-6.png')" alt="testile Img" class="img-fluid w-100 h-100 investments-img-2">
                    </div>

                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card border-0 shadow-none">
                            <div class="card-body">
                                <img :src="useAssets('assets/housing-icon.svg')" alt="Logistics Icon" class="img-fluid mb-3">
                                <h6 class="mb-3">Housing and Construction</h6>
                                <p class="mb-0 text-start">Pakistan, with 220 million people and a growing middle class, has a construction sector contributing 2.53% to GDP and employing 7.61% of the workforce. Housing demand rises with a 2.4% population growth. Private sector
                                    investment grew 20.6%, fueled by CPEC infrastructure projects.</p>
                                <a href="#" class="py-2 viewAllBusinessSolutions d-inline-flex align-items-center justify-content-center viewAllBtn learnMoreBtn">
                                    <span>Learn More</span>
                                    <span class="pe-2">
                                        <img :src="useAssets('assets/viewAll-icon.svg')" alt="arrow Icon">
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card border-0 shadow-none">
                            <div class="card-body">
                                <img :src="useAssets('assets/tourism-icon.svg')" alt="textile Icon" class="img-fluid mb-3">
                                <h6 class="mb-3">Tourism and Hospitality</h6>
                                <p class="mb-0 text-start">Pakistan, ranked the top adventure travel destination in 2018, offers rich cultural heritage and stunning landscapes. It is home to UNESCO World Heritage Sites like Moenjodaro, Takht-i-Bahi, Shalamar Gardens, and Taxila.</p>
                                <a href="#" class="py-2 viewAllBusinessSolutions d-inline-flex align-items-center justify-content-center viewAllBtn learnMoreBtn">
                                    <span>Learn More</span>
                                    <span class="pe-2">
                                        <img :src="useAssets('assets/viewAll-icon.svg')" alt="arrow Icon">
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-6 mb-3">
                        <img :src="useAssets('assets/investments-img-7.png')" alt="testile Img" class="img-fluid w-100 h-100 investments-img-1">
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import {useAssets} from "@/composable/use-assets";

export default {
    name: "investment",
    methods: {useAssets},
};
</script>

<style scoped></style>
