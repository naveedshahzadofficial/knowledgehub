<script>
import {useAssets} from "@/composable/use-assets";
import {usePreLoaderStore} from "../store/preloader";
export default {
    name: "HousingConstructionPage",
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
                        <h1 class="mb-3">Housing &
                            <span>Construction</span>
                        </h1>
                    </div>
                    <div class="col-xxl-8 col-lg-9">
                        <p class="mb-4 pe-lg-5 position-relative">Pakistan's rapidly growing population and urbanization drive demand for housing and infrastructure, presenting significant opportunities in the construction sector.</p>
                    </div>
                    <div class="col-12">
                        <img :src="useAssets('assets/housingPage-bg.png')" alt="Img" class="img-fluid w-100">
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
                        <p>The construction sector in Pakistan is set for expansion, fueled by increasing population, urbanization, and major infrastructure developments through CPEC.</p>
                    </div>
                </div>

                <div class="row gx-3">
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/housing-icon1.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Growing Workforce and Middle Class</h4>
                                <p class="mb-0 text-start">Pakistan, the 5th most populous country with 220 million people, has a labor force of over 60 million and a rapidly growing middle class, creating vast economic potential and opportunities across various sectors.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/housing-icon2.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Rural-Urban Population Distribution in Pakistan</h4>
                                <p class="mb-0 text-start">In Pakistan, 36.38% of the population lives in urban areas, while 63.62% resides in rural regions, highlighting a significant rural-urban divide and the importance of both areas in the country’s economic and social structure.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/housing-icon3.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Rising Housing Demand Due to Population Growth</h4>
                                <p class="mb-0 text-start">Pakistan's 2.4% annual population growth, according to the 2017 census, is fueling a rising demand for housing, particularly in urban areas. This growth presents significant opportunities for the real estate sector to meet
                                    the increasing need for affordable and sustainable residential development.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/housing-icon4.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Pakistan's Construction Industry Contribution</h4>
                                <p class="mb-0 text-start">The country’s construction industry accounts for 2.53% of Gross Domestic Product (GDP) according to the Pakistan Economic Survey. The sector employs 7.61% of the employed Pakistani labour force.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/housing-icon5.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Private Sector GFCF Growth and Contribution</h4>
                                <p class="mb-0 text-start">GFCF in private sector grew by 20.6% between FY2019 and FY2020. Private sector GFCF amounted over 95% of the total.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/housing-icon6.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Impact of CPEC on Pakistan's Construction Sector</h4>
                                <p class="mb-0 text-start">China Pakistan Economic Corridor (CPEC) has given a boost to the construction sector through the influx of infrastructural projects including highways, power plants, and dams.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sectorHighLightDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-5">
                <div class="row mb-4">
                    <div class="col-12 sectorHighLightBgDiv-housing py-sm-5 py-4">
                        <div class="container px-md-5">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2>Sector <span>Highlights</span></h2>
                                </div>

                                <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                                    <p>Key drivers of advancement in the construction industry include a large population, the urban-rural divide, strong private sector growth, and CPEC initiatives.</p>
                                </div>

                                <div class="row mx-0">
                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/housing-icon7.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">36.38% of Pakistan’s population is urban, 63.62% rural.</h5>
                                                <h6>In Pakistan, 36.38% of the population lives in urban areas, while 63.62% reside in rural regions, highlighting a major rural-urban divide.</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/housing-icon8.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">Private sector GFCF grew by 20.6% from FY2019 to FY2020.</h5>
                                                <h6>Private sector GFCF grew by 20.6% from FY2019 to FY2020, indicating increased investment in assets and economic growth.</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                        <div class="card shadow-none border-0 bg-transparent">
                                            <div class="card-body">
                                                <img :src="useAssets('assets/housing-icon9.svg')" alt="sectorHighLight Img" class="img-fluid mb-3">
                                                <h5 class="mb-2">CPEC has boosted Pakistan's construction sector.</h5>
                                                <h6>CPEC has boosted Pakistan's construction sector through major infrastructure projects, job creation, and increased investment.</h6>
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
                        <h2>REASONS TO <span>INVEST</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                        <p class="mb-2">The construction sector offers significant GDP contributions, with pending cases worth Rs. 1.1 trillion and projections of Rs. 2,705.5 billion by 2028.</p>
                    </div>

                    <ul class="list-unstyled px-lg-5">
                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Pakistan’s construction sector provides up to 380 billion PKR in GDP.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">According to the Association of Builders and Developers, pending cases pertaining to construction and housing add up to Rs. 1.1 trillion in monetary value</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Fitch Solution projects an industry value of Rs.2,705.5 billion by 2028 representing the potential of the housing and construction industry.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Construction sector has been declared an industry. With this brings tax relief to firms in the industry through the amendments to the tax ordinance. Reforms to tax policies provide numerous incentives to builders and developers
                                as well as contractors. These include lower tax rates and the removal of numerous taxes previously hampering the ease of doing business in the sector.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="economicZonesDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2><span>FOCUS</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                        <p class="mb-2">Cement production capabilities in northern and southern Pakistan drive demand, while CPEC projects enhance steel needs and improve infrastructure.</p>
                    </div>

                    <ul class="list-unstyled px-lg-5">
                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Pakistan’s north region has an installed cement capacity of 53,722,500 tpa.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Pakistan’s south region has an installed cement capacity of 16,834,600 tpa.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">CPEC and infrastructure projects have increased the demand for steel.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Pakistan is 28th in steel production as stated in a Pakistan Business Council Report.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Pakistan ranks at 22nd position worldwide for 263,775 Km length of its road network.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">First ever National Transport Policy has been approved by GoP in Feb. 2019.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="economicZonesDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Projected <span> Growth</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                        <p class="mb-2">Despite decreases in Gross Domestic Product (GDP), public sector spending on infrastructure, and Foreign Direct Investment (FDI), the outlook remains positive due to unprecedented reforms carried out by the government through restructuring,
                            improvement in regulatory environment and introduction of incentives and relief packages.
                        </p>
                    </div>

                    <div class="col-12 text-center">
                        <img :src="useAssets('assets/project-growth-img.png')" alt="Project growth Img" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <section class="economicZonesDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Incentives Offered <span> by the Government</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                        <p class="mb-2">Government reforms provide tax reliefs and exemptions for builders, fostering growth in the construction sector and enhancing investment opportunities.
                        </p>
                    </div>

                    <ul class="list-unstyled px-lg-5">
                        <li class="mb-2 p-4">
                            <h5 class="mb-3 text-start">New Fixed Tax Regime from Tax Year 2020 and Onwards for Eligible Builders and Developers</h5>
                            <p class="mb-0 text-start">An optional ‘Fixed tax regime’ from tax year 2020 and onwards for eligible builders and developers has been introduced on the income, derived from the sale of buildings or sale of plots, from a new or an incomplete existing
                                project. Prior to this, tax was levied on a net income basis. Rate and computation of liability is determined under rule 10 of the eleventh schedule</p>
                        </li>

                        <li class="mb-2 p-4">
                            <h5 class="mb-3 text-start">Exemption of Withholding Tax on Purchase of Building Materials</h5>
                            <p class="mb-0 text-start">Eligible Developers and Builders shall be exempted from withholding taxes on purchase of building materials. Dividend income paid to a person by a builder or Developer Company out of the profits and gains derived from a project
                                shall be exempt from tax and also from tax withholding obligations.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <h5 class="mb-3 text-start">Exemption of Capital Gains Tax</h5>
                            <p class="mb-0 text-start">Capital gains received by an individual on the sale of residential property (personal/family) house or flat, have been exempted from income tax.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <h5 class="mb-3 text-start">Banks to increase credit for financing the housing & construction sector</h5>
                            <p class="mb-0 text-start">With a view to promote housing and construction of buildings (Residential and Non-Residential) in Pakistan, State Bank of Pakistan (SBP) has decided to advise mandatory targets to the banks. Accordingly, each bank shall ensure
                                that the financing for housing and construction of buildings (Residential and Non-Residential) shall be at least 5% of their domestic private sector credit by December, 2021.</p>
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

                    <div class="col-md-6 mx-auto col-12 text-center mb-3">
                        <p>Leading companies like Uber, Careem, and TRG are driving innovation and growth in Pakistan's thriving IT sector, shaping its future.</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img :src="useAssets('assets/dha-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/descon-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/rafi-group-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/bahria-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/hrl-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/fwo-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/nespak-logo.svg')" alt="">
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
                        <p class="mb-2">Inbound arrivals and receipts are rising due to government efforts for a secure environment, boosting the hotels, foodservice, and airlines industries.</p>
                    </div>

                    <ul class="list-unstyled px-lg-5">
                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">There has been a steady increase in the inbound arrivals and consequently in the inbound receipts. The increase is mainly attributed to the drastic improvements in the government‘s effort to provide peaceful and secure environment.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">The hotels & motels industry value consists of all revenues generated by hotels, motels and other accommodation providers through the provision of accommodation and other services.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Foodservice is defined as the value of all food and drink, including on-trade drinks not drunk with food, for immediate consumption on the premises or in designated eating areas shared with other foodservice operators, or in
                                the case of takeaway transactions, freshly prepared food for immediate consumption.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">The airlines industry comprises of passenger air transportation, including both scheduled and chartered, but excludes air freight transport.</p>
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
                            <span class="me-4">Housing & Construction Portal</span>
                            <span>
                                <img :src="useAssets('assets/download-icon.svg')" alt="">
                            </span>
                        </button>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-lg-0 mb-3">
                        <button class="w-100 p-3 d-flex align-items-center justify-content-center border-0 h-100">
                            <span class="me-4">Provincial Central Data Bank  all Societies</span>
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

