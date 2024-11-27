<script>
import {useAssets} from "@/composable/use-assets";
import {usePreLoaderStore} from "../store/preloader";
export default {
    name: "FoodProcessingPage",
    methods: {
        useAssets,
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
                            <span>Logistics</span>
                        </h1>
                    </div>
                    <div class="col-xxl-8 col-lg-9">
                        <p class="mb-4 pe-lg-5 position-relative">Pakistan, with 210M people growing at 2.4%, has 5.3% GDP growth (2016-17), relying on transport for trade, jobs, and regional connectivity.</p>
                    </div>
                    <div class="col-12">
                        <img :src="useAssets('assets/logisticsPage-bg.png')" alt="Img" class="img-fluid w-100">
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
                        <p>A key sector after textiles, contributing significantly to jobs, production, and exports under EU GSP Plus.</p>
                    </div>
                </div>

                <div class="row gx-3">
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/logistics-icon1.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Population Growth Rate in Pakistan</h4>
                                <p class="mb-0 text-start">With a population nearing 210 million, Pakistan ranks as the 6th most populous country globally, experiencing a rapid annual growth rate of 2.4%, highlighting significant demographic and economic opportunities alongside
                                    pressing developmental challenges.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/logistics-icon2.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Economic Impact of the Transport Sector in Pakistan</h4>
                                <p class="mb-0 text-start">The transport sector is a vital contributor to Pakistan's economy, generating 22.3% of the services sector GDP and providing employment for approximately 6% of the nation’s workforce, underscoring its critical role in economic
                                    growth and job creation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/logistics-icon3.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Economic Performance During 2016-17</h4>
                                <p class="mb-0 text-start">Pakistan's GDP grew by 5.3% in 2016-17, driven by strong performance across agriculture, industry, and services. This growth marked a significant boost to the economy, highlighting improved infrastructure and rising investor
                                    confidence.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/logistics-icon4.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Impact of GDP Growth on Pakistan's Economy</h4>
                                <p class="mb-0 text-start">International transport links Pakistan to neighboring countries and global markets through its border crossings, ports, and airports, supporting economic growth, facilitating Gulf workforce mobility, and driving efforts
                                    to expand trade with Central Asia.</p>
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
                                    <p>With 14 dry ports, robust global shipping connections, and an average annual FDI of $223.5 million, Pakistan's logistics sector is thriving.</p>
                                </div>

                                <div class="row mx-0">
                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/sectorHighLightImg1.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">14 dry ports cater to high value external trade.</h5>
                                                <h6>Pakistan’s 14 dry ports support high-value trade by providing customs, warehousing, and cargo services, enhancing supply chain efficiency.</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/sectorHighLightImg2.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">$3.37 trillion 1/3rd of global shipping</h5>
                                                <h6>The $3.37 trillion global shipping industry, making up one-third of world trade, connects economies and drives economic growth.</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/sectorHighLightImg3.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">223.5m Average annual FDI (2014-2018)s</h5>
                                                <h6>From 2014 to 2018, Pakistan received an average annual FDI of $223.5 million, supporting economic growth, job creation, and sectoral development.</h6>
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
                        <h2>Main <span>Sectors</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center">
                        <p class="mb-2">Pakistan's strategic location, rail network, and public-private initiatives drive supply chain growth and regional trade.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 mb-lg-0 mb-3">
                        <div class="card shdaow-none h-100">
                            <div class="card-body p-1">
                                <ul class="nav nav-tabs d-flex flex-lg-column border-0 flex-row flex-nowrap overflow-x-auto overflow-y-hidden mx-lg-0 mx-3" id="investmentTabs" role="tablist">
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100 active" id="supply-chain-tab" data-bs-toggle="tab" data-bs-target="#supply-chain-tab-pane" type="button" role="tab" aria-controls="supply-chain-tab-pane" aria-selected="true">Supply Chain Management</button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100" id="railway-network-tab" data-bs-toggle="tab" data-bs-target="#railway-network-tab-pane" type="button" role="tab" aria-controls="railway-network-tab-pane" aria-selected="false">Significant Railway Network</button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100" id="public-private-tab" data-bs-toggle="tab" data-bs-target="#public-private-tab-pane" type="button" role="tab" aria-controls="public-private-tab-pane" aria-selected="false">Public Private Initiatives</button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100" id="geographic-location-tab" data-bs-toggle="tab" data-bs-target="#geographic-location-tab-pane" type="button" role="tab" aria-controls="geographic-location-tab-pane" aria-selected="false">Strategic Geographic Location</button>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="tab-content h-100" id="InvestmentsTabContent">
                                    <div class="tab-pane fade h-100 show active" id="supply-chain-tab-pane" role="tabpanel" aria-labelledby="supply-chain-tab" tabindex="0">
                                        <img :src="useAssets('assets/supply-chain-icon.svg')" alt="Textile Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Supply Chain Management</h6>
                                        <p class="mb-2">Local businesses are increasingly focusing on maximizing organizational value and operational efficiency by partnering with logistics companies to outsource various levels of their supply chain.</p>
                                        <p class="mb-2">This strategic approach not only frees up internal resources but also enables companies to leverage specialized expertise, streamline operations, reduce costs, and enhance overall productivity in a competitive market.</p>
                                        <a href="#" class="learnMoreBtn">Learn More</a>
                                    </div>

                                    <div class="tab-pane fade h-100" id="railway-network-tab-pane" role="tabpanel" aria-labelledby="railway-network-tab" tabindex="0">
                                        <img :src="useAssets('assets/logistics-icon.svg')" alt="Logistics Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Significant Railway Network</h6>
                                        <p class="mb-2">Pakistan's railway network is a crucial asset for the country's logistics and transportation sector. It plays a significant role in connecting industries, cities, and ports for smooth trade operations.</p>
                                        <p class="mb-2">With ongoing investments in infrastructure, including modern freight systems and railway electrification, this network is poised to boost economic growth and regional connectivity.</p>
                                        <a href="#" class="learnMoreBtn">Learn More</a>
                                    </div>

                                    <div class="tab-pane fade h-100" id="public-private-tab-pane" role="tabpanel" aria-labelledby="public-private-tab" tabindex="0">
                                        <img :src="useAssets('assets/food-processing-icon1.svg')" alt="Investment Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Public Private Initiatives</h6>
                                        <p class="mb-2">Public-private partnerships are driving transformative change in Pakistan’s development landscape. These initiatives enhance infrastructure, utilities, and services through shared resources and expertise.</p>
                                        <p class="mb-2">This collaborative model fosters innovation, accelerates project timelines, and ensures long-term sustainability for critical sectors such as healthcare, education, and transport.</p>
                                        <a href="#" class="learnMoreBtn">Learn More</a>
                                    </div>

                                    <div class="tab-pane fade h-100" id="geographic-location-tab-pane" role="tabpanel" aria-labelledby="geographic-location-tab" tabindex="0">
                                        <img :src="useAssets('assets/automobile-icon.svg')" alt="Automobile Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Strategic Geographic Location</h6>
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
                            <img id="investmentImg" :src="useAssets('assets/supply-chain-img.png')" alt="Investment Img" class="img-fluid fade show active">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="areaOfInvestmentDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-md-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2><span>Area of </span> Investment</h2>
                    </div>

                    <div class="col-md-6 mx-auto col-12 text-center mb-3">
                        <p>Investment areas include warehousing, cold chain logistics, air freight, trucking, and urban transport.</p>
                    </div>
                </div>


                <div class="row gx-3">
                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/warehousng-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Warehousing</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/cold-chain-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Cold Chain Logistics</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/air-freight-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Air Freight & Transportation
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/trucking-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Trucking</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center px-4 py-5">
                                <img :src="useAssets('assets/urban-transport-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Urban transport
                                </h6>
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

                    <div class="col-lg-9 mx-auto col-12 text-center mb-3">
                        <p>Explore leading investors in Pakistan’s Food Processing sector, including renowned companies committed to fostering innovation and driving growth, ultimately shaping a thriving future for the industry.</p>
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
                        <h2>CPEC’S Special <span>Economic Zones</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                        <p class="mb-2">Key sectors include warehousing, air freight, courier services, transport networks, and ports & shipping, crucial for logistics and trade.</p>
                    </div>

                    <ul class="list-unstyled px-lg-5">
                        <li class="mb-2 p-4">
                            <div class="d-flex">
                                <h5 class="mb-3 text-start">Warehouses Supply Chain</h5>
                                <p class="mb-0 text-start">Efficient warehousing solutions to drive fast, reliable deliveries across the supply chain.</p>
                            </div>
                        </li>

                        <li class="mb-2 p-4">
                            <div class="d-flex">
                                <h5 class="mb-3 text-start">Air Freight Transportation</h5>
                                <p class="mb-0 text-start">Experience the speed and reliability of air freight, where time is always of the essence.</p>
                            </div>
                        </li>

                        <li class="mb-2 p-4">
                            <div class="d-flex">
                                <h5 class="mb-3 text-start">Storage and Distribution Supply Chain</h5>
                                <p class="mb-0 text-start">Flexible storage and distribution solutions designed to scale with your business needs, ensuring timely deliveries.</p>
                            </div>
                        </li>

                        <li class="mb-2 p-4">
                            <div class="d-flex">
                                <h5 class="mb-3 text-start">Courier Services Transportation</h5>
                                <p class="mb-0 text-start">Fast, reliable courier services that ensure your packages reach their destination with precision and care.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="keyInformationDiv pb-sm-5 pb-4" id="scrollspyHeading4">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2><span>Key </span> Information</h2>
                    </div>

                    <div class="col-md-6 mx-auto col-12 text-center mb-3">
                        <p>Foreign companies already operating in Pakistan</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img :src="useAssets('assets/carrefour-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/coke-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/pepsi-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/unilever-logo.svg')" alt="">
                        </div>
                    </div>
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

