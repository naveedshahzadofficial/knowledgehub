<script>
import {useAssets} from "@/composable/use-assets";
export default {
    name: "FoodProcessingPage",
    methods: {
        useAssets,
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
                            <span>Textile</span>
                        </h1>
                    </div>
                    <div class="col-xxl-8 col-lg-9">
                        <p class="mb-4 pe-lg-5 position-relative">Pakistan's textile sector thrives as a major global player, leveraging abundant raw materials, generating significant GDP contributions, and providing vast employment opportunities across the industry.</p>
                    </div>
                    <div class="col-12">
                        <img :src="useAssets('assets/textilePage-bg.png')" alt="Img" class="img-fluid w-100">
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
                        <p>Pakistan's textile sector is a key economic driver, ranking 8th in Asia for exports, employing 40% of the workforce, and benefiting from abundant raw materials for diverse production.</p>
                    </div>
                </div>

                <div class="row gx-3">
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/textile-icon1.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>8th Largest Textile Exporter in Asia</h4>
                                <p class="mb-0 text-start">Pakistan is the 8th largest exporter of textile products in Asia, leveraging its robust textile manufacturing sector to supply a wide range of goods to international markets, contributing significantly to the country's
                                    export revenues.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/textile-icon2.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Pakistan's Global Cotton Leadership</h4>
                                <p class="mb-0 text-start">Pakistan is the 4th largest producer and 3rd largest consumer of cotton, playing a crucial role in the global cotton industry. Its production supports a strong textile sector, while its consumption impacts global supply
                                    chains and cotton trade.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/textile-icon3.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Pakistan Textile Industry: Market Presence</h4>
                                <p class="mb-0 text-start">Only 5% of the total textile companies in Pakistan are listed on the stock exchange, with 423 textile industries currently operating across the country, highlighting a significant portion of the sector still outside public
                                    trading.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/textile-icon4.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Key to Manufacturing and Employment</h4>
                                <p class="mb-0 text-start">The textile industry accounts for 46% of Pakistan's total manufacturing sector and provides employment to 40% of the nation's labor force, making it a cornerstone of both economic output and job creation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/textile-icon5.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Abundant Raw Materials for Textiles in Pakistan</h4>
                                <p class="mb-0 text-start">Pakistan has supply base for almost all man-made and natural yarns and fabrics, including cotton, rayon and others. This abundance of raw material is a big advantage for Pakistan due to its beneficial impact on cost and
                                    operational lead time.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sectorHighLightDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-5">
                <div class="row mb-4">
                    <div class="col-12 sectorHighLightBgDiv py-sm-5 py-4">
                        <div class="container px-md-5">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2>Sector <span>Highlights</span></h2>
                                </div>

                                <div class="col-lg-9 mx-auto col-12 text-center mb-3">
                                    <p>Pakistan's textile sector excels globally, ranking 3rd in yarn production, contributing 8.5% to GDP, and responding to a booming $1.2 trillion global apparel demand.</p>
                                </div>

                                <div class="row mx-0">
                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/sectorHighLightImg1.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">3rd Largest Yarn Producer in the World</h5>
                                                <h6>Pakistan is ranked 3rd in global yarn production, positioning it as a key player in the textile industry and a major contributor to the global supply chain.</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/sectorHighLightImg2.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">$8.5% Textile Contribution to GDP</h5>
                                                <h6>The textile industry contributes 8.5% to Pakistan's GDP, driving export earnings, employment, and economic growth.</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/sectorHighLightImg3.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">$1.2 trillion Global textiles apparel demand in 2017-18</h5>
                                                <h6>Global textile and apparel demand hit $1.2 trillion in 2017-18, driven by population growth and rising consumer incomes.</h6>
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

        <section class="investmentsDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Opportunities & <span>Reasons to Invest</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center">
                        <p class="mb-2">Pakistan offers significant investment potential, with improved management practices boosting productivity, rising per capita income, and a strong employment base in the textile sector.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 mb-lg-0 mb-3">
                        <div class="card shdaow-none h-100">
                            <div class="card-body p-1">
                                <ul class="nav nav-tabs d-flex flex-lg-column border-0 flex-row flex-nowrap overflow-x-auto overflow-y-hidden mx-lg-0 mx-3" id="investmentTabs" role="tablist">
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100 active" id="productivity-tab" data-bs-toggle="tab" data-bs-target="#productivity-tab-pane" type="button" role="tab" aria-controls="productivity-tab-pane" aria-selected="true">
                                            Productivity
                                        </button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100" id="domestic-garment-tab" data-bs-toggle="tab" data-bs-target="#domestic-garment-tab-pane" type="button" role="tab" aria-controls="domestic-garment-tab-pane" aria-selected="false">
                                            Domestic Garment Market
                                        </button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100" id="employment-tab" data-bs-toggle="tab" data-bs-target="#employment-tab-pane" type="button" role="tab" aria-controls="employment-tab-pane" aria-selected="false">
                                            Employment
                                        </button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100" id="comparative-advantage-tab" data-bs-toggle="tab" data-bs-target="#comparative-advantage-tab-pane" type="button" role="tab" aria-controls="comparative-advantage-tab-pane" aria-selected="false">
                                            Comparative Advantage
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="tab-content h-100" id="InvestmentsTabContent">
                                    <div class="tab-pane fade h-100 show active" id="productivity-tab-pane" role="tabpanel" aria-labelledby="productivity-tab" tabindex="0">
                                        <img :src="useAssets('assets/productivity-icon.svg')" alt="Textile Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Productivity</h6>
                                        <p class="mb-2">Improving productivity in Pakistan's textile sector is essential for competitiveness and profitability. By implementing better management practices, companies can boost productivity by at least 20%. This involves
                                            effective resource allocation, streamlined processes, and workforce training.</p>
                                        <p class="mb-2">Emphasizing data-driven decision-making and adopting modern technologies can optimize operations. Fostering a culture of continuous improvement encourages innovation and efficiency, enabling textile firms to maximize
                                            output and minimize waste.</p>
                                        <a href="#" class="learnMoreBtn">Learn More</a>
                                    </div>

                                    <div class="tab-pane fade h-100" id="domestic-garment-tab-pane" role="tabpanel" aria-labelledby="domestic-garment-tab" tabindex="0">
                                        <img :src="useAssets('assets/logistics-icon.svg')" alt="Logistics Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Domestic Garment Market</h6>
                                        <p class="mb-2">Pakistan's domestic garment market holds immense potential for growth. Supporting local manufacturers can help meet growing consumer demand and reduce reliance on imports.</p>
                                        <p class="mb-2">Fostering a vibrant local garment industry involves improved access to resources, skill development, and marketing strategies to enhance visibility and competitiveness in the global market.</p>
                                        <a href="#" class="learnMoreBtn">Learn More</a>
                                    </div>

                                    <div class="tab-pane fade h-100" id="employment-tab-pane" role="tabpanel" aria-labelledby="employment-tab" tabindex="0">
                                        <img :src="useAssets('assets/food-processing-icon1.svg')" alt="Investment Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Employment</h6>
                                        <p class="mb-2">Employment generation in Pakistan's textile and garment sector is a critical driver of economic growth. Enhancing workforce training programs and improving labor conditions are key priorities.</p>
                                        <p class="mb-2">By creating more job opportunities and fostering skill development, the industry can contribute significantly to poverty reduction and national economic stability.</p>
                                        <a href="#" class="learnMoreBtn">Learn More</a>
                                    </div>

                                    <div class="tab-pane fade h-100" id="comparative-advantage-tab-pane" role="tabpanel" aria-labelledby="comparative-advantage-tab" tabindex="0">
                                        <img :src="useAssets('assets/automobile-icon.svg')" alt="Automobile Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Comparative Advantage</h6>
                                        <p class="mb-2">Pakistan's strategic geographic location positions it as a central hub for trade routes connecting South Asia, Central Asia, and the Middle East.</p>
                                        <p class="mb-2">This advantage is amplified by infrastructure projects like the China-Pakistan Economic Corridor (CPEC), which boosts trade and investment potential in key economic zones.</p>
                                        <a href="#" class="learnMoreBtn">Learn More</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 mb-lg-0 mb-3">
                        <div class="image-container position-relative card border-0 shadow-none bg-transparent">
                            <img id="investmentImg" :src="useAssets('assets/productivity-img.png')" alt="Investment Img" class="img-fluid fade show active">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="economicZonesDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Policy <span>Goals <sub class="fs-5">(2014-19)</sub></span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                        <p class="mb-2">The textile sector aims to boost exports, double value-addition, attract $5 billion in investments, ensure international standards, and improve efficiency and technology.</p>
                    </div>

                    <ul class="list-unstyled px-lg-5">
                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Efficient warehousing solutions to drive fast, reliable deliveries across the supply chain.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Experience the speed and reliability of air freight, where time is always of the essence.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Flexible storage and distribution solutions designed to scale with your business needs, ensuring timely deliveries.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Fast, reliable courier services that ensure your packages reach their destination with precision and care.</p>
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
                            <img :src="useAssets('assets/tcs-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/dhl-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/skynet-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/fedex-logo.png')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/bykea-logo.svg')" alt="">
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
                        <p class="mb-2">Explore collaboration opportunities with leading textile manufacturers and the impact of energy projects on enhancing Pakistan's textile industry capacity and growth.</p>
                    </div>

                    <ul class="list-unstyled px-lg-5">
                        <li class="mb-2 p-4">
                            <h5 class="mb-3 text-start">Collaboration Opportunities</h5>
                            <p class="mb-0 text-start">China is not only the biggest textile producer country, but also the biggest export country. Jiangsu YDTex Group, Ltd is a leading company that manufactures textiles with the collaboration of local cotton and textile industry
                                of Pakistan and YDTEX group, huge economic profit can be obtained in this sector.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <h5 class="mb-3 text-start">Industrial Zones & Energy Projects</h5>
                            <p class="mb-0 text-start">One of the challenges for the textiles industry has been power and energy, but with various power generation projects making up 70% of CPEC initiatives, it will enable the industry to produce to full capacity. With approximately
                                $33 billion expected to be invested in energy sector projects, power generation assumes an important role in the CPEC project.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="downloadButtonsDiv mb-5" id="scrollspyHeading4">
            <div class="container px-md-5 px-4">
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

