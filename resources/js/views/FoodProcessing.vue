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
                        <h1 class="mb-3">Food
                            <span>Processing</span>
                        </h1>
                    </div>
                    <div class="col-lg-6">
                        <p class="mb-4 pe-lg-5 position-relative">Pakistan's food industry employs 16%, contributes 27% to manufacturing, and attracts $223.5M FDI, boosted by EU GSP Plus.</p>
                    </div>
                    <div class="col-12">
                        <img :src="useAssets('assets/food-processing-bg.png')" alt="Img" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </header>

        <section class="sectorBriefDiv investmentsDiv py-sm-5 py-4" id="scrollspyHeading4">
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
                    <div class="col-lg-4 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/food-processing-icon1.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Food and Beverage Processing Industry in Pakistan</h4>
                                <p class="mb-0 text-start">The food and beverage processing industry is the 2nd largest industry of Pakistan after textiles, accounting for 27% of the value-added production and 16% of employment in the manufacturing sector.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/food-processing-icon2.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Food Processing and FDI (2012-2018)</h4>
                                <p class="mb-0 text-start">The food and beverage processing industry is the 2nd largest industry of Pakistan after textiles, accounting for 27% of the value-added production and 16% of employment in the manufacturing sector.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/food-processing-icon1.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>GSP Plus and Processed Food Exports</h4>
                                <p class="mb-0 text-start">In 2014, Pakistan was granted the EU's GSP Plus status, offering zero to low duties, which could significantly boost processed food exports.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/food-processing-icon1.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Pakistan’s Expanding Middle Class</h4>
                                <p class="mb-0 text-start">Pakistan is home to the world’s sixth largest population with a growing middle class. As of 2018, there are approximately 17 million middle class households and 102 million middle class individuals.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/food-processing-icon1.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Rapid Growth of Pakistan's Middle Class</h4>
                                <p class="mb-0 text-start">Pakistan, the world’s sixth most populous country, is experiencing rapid growth in its middle class. As of 2018, the nation boasts around 17 million middle-class households, comprising approximately 102 million individuals,
                                    highlighting the expanding consumer market.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sectorHighLightDiv investmentsDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-5">
                <div class="row mb-4">
                    <div class="col-12 sectorHighLightBgDiv py-sm-5 py-4">
                        <div class="container px-md-5">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2>Sector <span>Highlights</span></h2>
                                </div>

                                <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                                    <p>The Food Processing sector in Pakistan is a vibrant powerhouse, blending innovation with global appeal, driving economic growth and enhancing the nation's culinary landscape.</p>
                                </div>

                                <div class="row mx-0">
                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/sectorHighLightImg1.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">2nd largest Industry in Pakistan</h5>
                                                <h6>As the nation's second-largest industry, Food Processing is vital to Pakistan's economic growth and industrial strength.</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/sectorHighLightImg2.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">223.5m Average annual FDI (2014-2018)</h5>
                                                <h6>With an average annual FDI of $223.5 million, the Food Processing sector attracts global investors, driving its expansion.</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/sectorHighLightImg3.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">$4tn Annual global food retail sales</h5>
                                                <h6>Positioned within a $4 trillion global food retail market, Pakistan's Food Processing sector is ready to seize vast international opportunities.</h6>
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

        <section class="investmentsDiv investmentsDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Main <span>Sectors</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center">
                        <p class="mb-2">The Food Processing sector thrives on diverse segments, from frozen foods to value-added products, driving growth and innovation.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 mb-lg-0 mb-3">
                        <div class="card shdaow-none">
                            <div class="card-body p-1">
                                <ul class="nav nav-tabs d-flex flex-lg-column border-0 flex-row flex-nowrap overflow-x-auto overflow-y-hidden mx-lg-0 mx-3" id="investmentTabs" role="tablist">
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100" id="frozen-food-tab" data-bs-toggle="tab" data-bs-target="#frozen-food-tab-pane" type="button" role="tab" aria-controls="frozen-food-tab-pane" aria-selected="true">Frozen Food</button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100" id="edible-oils-tab" data-bs-toggle="tab" data-bs-target="#edible-oils-tab-pane" type="button" role="tab" aria-controls="edible-oils-tab-pane" aria-selected="false">Edible oils and fats</button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100 active" id="value-addition-tab" data-bs-toggle="tab" data-bs-target="#value-addition-tab-pane" type="button" role="tab" aria-controls="value-addition-tab-pane" aria-selected="true">Value addition in major food crops</button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100" id="fruits-dairy-tab" data-bs-toggle="tab" data-bs-target="#fruits-dairy-tab-pane" type="button" role="tab" aria-controls="fruits-dairy-tab-pane" aria-selected="false">Fruits, dairy, vegetables, and processed products</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100" id="frozen-food-processing-tab" data-bs-toggle="tab" data-bs-target="#frozen-food-processing-tab-pane" type="button" role="tab" aria-controls="frozen-food-processing-tab-pane" aria-selected="false">Agri food processing (Primary process foods)</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="tab-content h-100" id="InvestmentsTabContent">
                                    <div class="tab-pane fade h-100" id="frozen-food-tab-pane" role="tabpanel" aria-labelledby="frozen-food-tab" tabindex="0">
                                        <img :src="useAssets('assets/textile-icon.svg')" alt="Textile Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Frozen Foods</h6>
                                        <p class="mb-2">The growing population and urban lifestyles are driving demand for frozen foods, supported by the rise of modern retail formats like malls and supermarkets (e.g., Metro, Al Fatah, Hyperstar) replacing traditional
                                            stores.
                                        </p>
                                        <p class="mb-2">Local brands like Dawn Foods, Season Foods, K&N’s, Sabroso, and Sufi are making a notable impact in this market.</p>
                                        <a href="#" class="learnMoreBtn">Learn More</a>
                                    </div>

                                    <div class="tab-pane fade h-100" id="edible-oils-tab-pane" role="tabpanel" aria-labelledby="edible-oils-tab" tabindex="0">
                                        <img :src="useAssets('assets/logistics-icon.svg')" alt="Logistics Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Edible Oils and Fats</h6>
                                        <p class="mb-2">Pakistan's strategic location as a trade corridor makes logistics and supply chain management a critical sector. The development of modern ports, highways, and rail systems has opened new opportunities for international
                                            trade.
                                        </p>
                                        <p class="mb-2">Key areas of investment include warehousing, cold storage, and e-commerce logistics, driven by the rise of digital marketplaces.</p>
                                        <a href="#" class="learnMoreBtn">Learn More</a>
                                    </div>

                                    <div class="tab-pane fade h-100 show active" id="value-addition-tab-pane" role="tabpanel" aria-labelledby="value-addition-tab" tabindex="0">
                                        <img :src="useAssets('assets/food-processing-icon1.svg')" alt="Investment Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Food Processing (Value Addition)</h6>
                                        <p class="mb-2">Pakistan's food processing industry, the second-largest after textiles, plays a vital role in the economy, providing 16% of manufacturing jobs and contributing 27% to the sector's production value. With a burgeoning
                                            middle class of 102 million, the industry attracts $223.5 million annually in foreign direct investment (FDI).</p>
                                        <p class="mb-2">Key growth areas include frozen foods, value-added agricultural products, and processed produce, which are driving both domestic consumption and international demand.</p>
                                        <a href="#" class="learnMoreBtn">Learn More</a>
                                    </div>

                                    <div class="tab-pane fade h-100" id="fruits-dairy-tab-pane" role="tabpanel" aria-labelledby="fruits-dairy-tab" tabindex="0">
                                        <img :src="useAssets('assets/automobile-icon.svg')" alt="Automobile Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Fruits, Dairy, Vegetables, and Processed Products</h6>
                                        <p class="mb-2">The automobile industry in Pakistan is expanding rapidly, driven by increasing consumer demand and foreign investment. The sector includes the production of cars, motorbikes, and commercial vehicles.</p>
                                        <p class="mb-2">Government policies promoting local assembly and electric vehicle adoption are set to transform the market, creating new avenues for growth and sustainability.</p>
                                        <a href="#" class="learnMoreBtn">Learn More</a>
                                    </div>

                                    <div class="tab-pane fade h-100" id="frozen-food-processing-tab-pane" role="tabpanel" aria-labelledby="frozen-food-processing-tab" tabindex="0">
                                        <img :src="useAssets('assets/it-icon.svg')" alt="Information Technology Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Agri Food Processing (Primary Process Foods)</h6>
                                        <p class="mb-2">Pakistan's IT sector is a rising star, with exports exceeding $2 billion annually. The industry is known for its skilled workforce, offering software development, BPO services, and digital solutions to global clients.</p>
                                        <p class="mb-2">Investment opportunities abound in areas such as artificial intelligence, fintech, and cloud computing, supported by a thriving startup ecosystem.</p>
                                        <a href="#" class="learnMoreBtn">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 mb-lg-0 mb-3">
                        <div class="image-container position-relative card border-0 shadow-none bg-transparent">
                            <img id="investmentImg" :src="useAssets('assets/frozen-food-img1.png')" alt="Investment Img" class="img-fluid fade show active">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="areaOfInvestmentDiv investmentsDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-md-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2><span>Area of </span> Investment</h2>
                    </div>

                    <div class="col-md-6 mx-auto col-12 text-center mb-3">
                        <p>Discover lucrative investment opportunities in the Food Processing sector, from olive oil extraction to advanced dairy and innovative frozen foods.</p>
                    </div>
                </div>


                <div class="row gx-3">
                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <img :src="useAssets('assets/olive-oil-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Olive Oil Extraction Units</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <img :src="useAssets('assets/olive-oil-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Value addition in fruits</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <img :src="useAssets('assets/olive-oil-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Dairy</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <img :src="useAssets('assets/olive-oil-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Frozen foods(fruits, vegetables & meat)</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-lg-4 mb-xxl-0 mb-3 col-sm-6">
                        <div class="card shadow-none bg-transaprent h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <img :src="useAssets('assets/olive-oil-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                <h6>Potato Powder & Flakes Production Unit</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="majorInvestorsDiv investmentsDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2><span>Major </span> Investors</h2>
                    </div>

                    <div class="col-md-6 mx-auto col-12 text-center mb-3">
                        <p>Discover powerhouse investors in the Food Processing sector, like K&N's, Meat One, and Unilever, all working to ignite innovation and shape the industry's future.</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img :src="useAssets('assets/k&ns-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/meat-one-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/unilever-logo.svg')" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="economicZonesDiv investmentsDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>CPEC’S Special <span>Economic Zones</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center">
                        <p class="mb-2">There are 4 Special Economic Zones within CPEC that are targeted at food processing</p>
                    </div>

                    <ul class="list-unstyled px-lg-5">
                        <li class="mb-2 p-4">
                            <div class="d-flex">
                                <div class="w-75">
                                    <h5 class="mb-3 text-start">Rashakai Economic Zone, M1, Nowshera</h5>
                                    <p class="mb-0 text-start">Fruit, Food, Packaging, Textile Stitching, Knitting</p>
                                </div>
                                <h6 class="mb-0 w-25 text-center">
                                    <span>1,000 acres</span> acres
                                </h6>
                            </div>
                        </li>

                        <li class="mb-2 p-4">
                            <div class="d-flex">
                                <div class="w-75">
                                    <h5 class="mb-3 text-start">Bostan Industrial Zone</h5>
                                    <p class="mb-0 text-start">Fruit Processing, Agricultural Machinery, Pharmaceutical, Motor Bikes Assembly, Chromite's, Cooking Oil, Ceramic Industries, Ice & Cold Storage, Electrical Appliance, Halal Food Industry</p>
                                </div>
                                <h6 class="mb-0 w-25 text-center">
                                    <span>1,000 acres</span> acres
                                </h6>
                            </div>
                        </li>

                        <li class="mb-2 p-4">
                            <div class="d-flex">
                                <div class="w-75">
                                    <h5 class="mb-3 text-start">Allama Iqbal Industrial City, M3, Faisalabad</h5>
                                    <p class="mb-0 text-start">Textile, Steel, Food Processing, Plastics, Agriculture, Printing & Packaging, Light Engineering</p>
                                </div>
                                <h6 class="mb-0 w-25 text-center">
                                    <span>3,000 acres</span> acres
                                </h6>
                            </div>
                        </li>

                        <li class="mb-2 p-4">
                            <div class="d-flex">
                                <div class="w-75">
                                    <h5 class="mb-3 text-start">ICT Model Industrial Zone, Islamabad</h5>
                                    <p class="mb-0 text-start">Steel, Food Processing, Pharmaceuticals & Chemicals, Printing & Packaging, Light Engineering</p>
                                </div>
                                <h6 class="mb-0 w-25 text-center">
                                    <span>500 acres</span> acres
                                </h6>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="keyInformationDiv investmentsDiv py-sm-5 py-4" id="scrollspyHeading4">
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

        <section class="downloadButtonsDiv investmentsDiv mb-5" id="scrollspyHeading4">
            <div class="container px-md-5 px-4">
                <div class="row">
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
                    <div class="col-lg-4 col-sm-6 mb-lg-0 mb-3">
                        <button class="w-100 p-3 d-flex align-items-center justify-content-center border-0 h-100">
                            <span class="me-4">Download Horticulture Sector Study Report</span>
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

