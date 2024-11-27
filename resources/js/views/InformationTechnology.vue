<script>
import {useAssets} from "@/composable/use-assets";
import {usePreLoaderStore} from "../store/preloader";
export default {
    name: "InformationTechnologyPage",
    methods: {
        useAssets,
    },
    mounted() {
        usePreLoaderStore().setIsShow(false);
        window.setTimeout(() => {
            usePreLoaderStore().setIsShow(true);
        }, 2000);

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
                        <h1 class="mb-3">Information
                            <span>Technology</span>
                        </h1>
                    </div>
                    <div class="col-xxl-8 col-lg-9">
                        <p class="mb-4 pe-lg-5 position-relative">Embracing the 4th Industrial Revolution, Pakistan's burgeoning IT sector showcases immense potential, driven by innovation, youth, and a growing digital economy.</p>
                    </div>
                    <div class="col-12">
                        <img :src="useAssets('assets/infoTechPage-bg.png')" alt="Img" class="img-fluid w-100">
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
                        <p>Driven by the 4th Industrial Revolution, Pakistan's digital economy is booming, with the IT sector poised to reach $20 billion by 2025.</p>
                    </div>
                </div>

                <div class="row gx-3">
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/infoTech-icon1.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Global Digital Economy in the 4th Industrial Revolution</h4>
                                <p class="mb-0 text-start">The 4th Industrial Revolution is currently taking place and it is digital. The actual size of the 2016 digital economy was $11.5 trillion globally, which was 15.5% of the global GDP. The base digital assets comprise one-third,
                                    or $3.8 trillion, while digital spillover effects account for the remaining two-thirds, $7.5 trillion</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/infoTech-icon2.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Economic Impact of the Transport Sector in Pakistan</h4>
                                <p class="mb-0 text-start">Pakistan, with 60% of its 200 million population in the 15-29 age group, represents a vast reservoir of human and knowledge capital. The country is home to over 2,000 IT companies and call centers, and this number continues
                                    to grow each year. With more than 300,000 skilled, English-speaking IT professionals</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/infoTech-icon3.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Pakistan's ICT Industry Growth Target by 2025</h4>
                                <p class="mb-0 text-start">Aligned with Pakistan Vision 2025 and the Digital Policy of 2018, the country's ICT industry is set to grow significantly, with a target to reach $20 billion by 2025. This ambitious goal reflects Pakistan's commitment to
                                    becoming a leading player in the global digital economy, leveraging its growing tech talent, infrastructure, and increasing investments in the sector to drive innovation, job creation, and economic growth.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sectorHighLightDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-5">
                <div class="row mb-4">
                    <div class="col-12 sectorHighLightBgDiv-infoTech py-sm-5 py-4">
                        <div class="container px-md-5">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2>Sector <span>Highlights</span></h2>
                                </div>

                                <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                                    <p>The IT sector experiences remarkable growth, highlighted by $1.06 billion in exports and a projected value of $3.5 billion.</p>
                                </div>

                                <div class="row mx-0">
                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/sectorHighLightImg1.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">4th Industrial Revolution worth $11.5 trillion globally</h5>
                                                <h6>The 4th Industrial Revolution, worth $11.5 trillion globally, drives digital transformation with $3.8 trillion in digital assets and $7.5 trillion in spillover effects.</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/sectorHighLightImg2.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">+100% Growth in the value of the IT sector to a $3.5 billion</h5>
                                                <h6>Pakistan's IT sector has grown by +100%, reaching a value of $3.5 billion, driven by rising investments, a growing tech workforce, and government support.</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/sectorHighLightImg3.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">$1.06b IT exports record, highest in FY 17-18. 30% year</h5>
                                                <h6>Pakistan’s IT exports reached a record $1.06 billion in FY 2017-18, reflecting a 30% year-on-year growth, driven by rising global demand and a skilled workforce.</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                        <h2><span>Opportunities</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                        <p class="mb-2">With rising software exports, increased internet penetration, and a robust IT workforce, Pakistan offers significant growth potential in the tech industry.</p>
                    </div>

                    <ul class="list-unstyled px-lg-5">
                        <li class="mb-2 p-4">
                            <h5 class="mb-3 text-start">Rising software exports</h5>
                            <p class="mb-0 text-start">IT exports were recorded to be the highest in the history at $1.067 billion in the fiscal year 2017-18</p>
                        </li>

                        <li class="mb-2 p-4">
                            <h5 class="mb-3 text-start">Broadband Penetration</h5>
                            <p class="mb-0 text-start">Internet penetration increasing from 2% to close to 30% in the past 4 years</p>
                        </li>

                        <li class="mb-2 p-4">
                            <h5 class="mb-3 text-start">Demand in the Intl market</h5>
                            <p class="mb-0 text-start">Pakistan was ranked at number four for freelance development in the world.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <h5 class="mb-3 text-start">Significant IT Network</h5>
                            <p class="mb-0 text-start">1,50,000 IT professionals available in the market</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="economicZonesDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Growth <span>Drivers</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                        <p class="mb-2">With rising software exports, increased internet penetration, and a robust IT workforce, Pakistan offers significant growth potential in the tech industry.</p>
                    </div>

                    <ul class="list-unstyled px-lg-5">
                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Pakistan’s IT exports have increased 70% during the last three years</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Zero income tax on IT & ITeS exports</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Open investment policy</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Zero Income tax for PSEB registered IT start-ups</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">100% foreign ownership of IT & ITeS companies</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">100% repatriation of profits to foreign IT & ITeS investors</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="areaOfInvestmentDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-md-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Sector <span> Objective</span></h2>
                    </div>

                    <div class="col-md-6 mx-auto col-12 text-center mb-3">
                        <p>The Digital Pakistan Policy aims for comprehensive digital transformation, empowering youth and women while enhancing innovation, inclusion, and software exports.</p>
                    </div>
                </div>


                <div class="owl-carousel owl-theme sectorObjectiveCarousel">
                    <div class="item">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/sectorObjectiveImg1.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Holistic Digital Strategy</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/sectorObjectiveImg2.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Sectorial Digitalization
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/sectorObjectiveImg3.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>E and M-Commerce
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/sectorObjectiveImg4.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Youth & Women Empowerment
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/sectorObjectiveImg5.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Innovation, Entrepreneurship, Incubators/Startups
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/sectorObjectiveImg6.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Software Exports, IT Remittances & Domestic Market</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/sectorObjectiveImg7.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>ICT Ranking of Pakistan</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/sectorObjectiveImg8.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>FDI & Standardization</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/sectorObjectiveImg9.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Digital Inclusion</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="areaOfInvestmentDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-md-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Area of <span> Investment</span></h2>
                    </div>

                    <div class="col-md-6 mx-auto col-12 text-center mb-3">
                        <p>Discover lucrative investment opportunities in the Food Processing sector, from olive oil extraction to advanced dairy and innovative frozen foods.</p>
                    </div>
                </div>


                <div class="row gx-3">
                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/mCommerce-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>M-Commerce</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/eCommerce-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>E-Commerce</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/incubation-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Incubation Centers</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/software-house-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Software Houses</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/it-park-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>IT Parks</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="majorInvestorsDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2><span>Major </span> Investors</h2>
                    </div>

                    <div class="col-md-6 mx-auto col-12 text-center mb-3">
                        <p>Leading companies like Uber, Careem, and TRG are driving innovation and growth in Pakistan's thriving IT sector, shaping its future.</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img :src="useAssets('assets/dell-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/netsol-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/hp-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/microsoft-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/oracle-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/careem-logo.svg')" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="economicZonesDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Key <span>Information</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                        <p class="mb-2">Vision 2025, Annual 18-19 Plan & 11th Five Year Plan (2013-18)</p>
                    </div>

                    <ul class="list-unstyled px-lg-5">
                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Logistics and transport investments are being supported through the China Pakistan Economic Corridors () programme.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Development of modern and efficient trade facilitation and logistics services.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Maximising the support of the ports to external trade by reducing ports and ship handling charges, and developing port facilities that allow all types of ships to call at the country’s ports</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">AImprove transport and communication by constructing national trade corridors and provide mass transit facilities in all major cities.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="downloadButtonsDiv mb-5" id="scrollspyHeading4">
            <div class="container-fluid px-md-5 px-4">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6 mb-lg-0 mb-3">
                        <button class="w-100 p-3 d-flex align-items-center justify-content-center border-0 h-100">
                            <span class="me-4">Download Sector Profile</span>
                            <span>
                                <img :src="useAssets('assets/download-icon.svg')" alt="">
                            </span>
                        </button>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-lg-0 mb-3">
                        <button class="w-100 p-3 d-flex align-items-center justify-content-center border-0 h-100">
                            <span class="me-4">Download Sector Profile (Updated)</span>
                            <span>
                                <img :src="useAssets('assets/download-icon.svg')" alt="">
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

    </div>
</template>

