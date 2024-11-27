<script>
import {useAssets} from "@/composable/use-assets";
import {usePreLoaderStore} from "../store/preloader";
export default {
    name: "InformationTechnologyPage",
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
                        <h1 class="mb-3">Tourism &
                            <span>Hospitality</span>
                        </h1>
                    </div>
                    <div class="col-xxl-8 col-lg-9">
                        <p class="mb-4 pe-lg-5 position-relative">Pakistan boasts breathtaking tourist destinations, rich culture, and diverse experiences, attracting travelers while enhancing its hospitality and tourism sectors.</p>
                    </div>
                    <div class="col-12">
                        <img :src="useAssets('assets/tourismPage-bg.png')" alt="Img" class="img-fluid w-100">
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
                        <p>With a wealth of tourist attractions, from ancient civilizations and stunning landscapes to UNESCO heritage sites, Pakistan appeals to diverse travelers.</p>
                    </div>
                </div>

                <div class="row gx-3">
                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/tourism-icon1.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Pakistan's Diverse and Rich Tourist Destinations</h4>
                                <p class="mb-0 text-start">Pakistan is rich in its tourist destinations offering a diverse range of choices for different types of tourists. The country is home to one of the oldest civilizations in the world, has innumerable locations of scenic
                                    beauty, world’s highest mountains, many religious and historic places, unique arts and crafts and a rich culture and heritage.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/tourism-icon2.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Pakistan Ranked Top Adventure Destination in 2018</h4>
                                <p class="mb-0 text-start">The British Backpacker Society ranked Pakistan as the world's top adventure travel destination in 2018, describing the country as "one of the friendliest countries on earth, with mountain scenery that is beyond anyone’s
                                    wildest imagination”</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="card shadow-none h-100">
                            <div class="card-body p-4">
                                <img :src="useAssets('assets/tourism-icon3.svg')" alt="Icon" class="img-fluid mb-3">
                                <h4>Pakistan's UNESCO World Heritage Sites</h4>
                                <p class="mb-0 text-start">Pakistan is home to a number of UNESCO world heritage sites like, Archaeological Ruins at Moenjodaro, Buddhist Ruins of Takht-i-Bahi and Neighbouring City Remains at Sahr-i-Bahlol, Fort and Shalamar Gardens in Lahore, Historical
                                    Monuments at Makli, Thatta, Rohtas Fort and Taxila.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sectorBriefDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row">
                    <div class="col-lg-9 mx-auto text-center">
                        <h2>Pakistan Tourism Potential – <span> “The Best Kept Secret of Asia”</span></h2>
                    </div>

                    <div class="col-xl-11 col-12 mx-auto text-justify mb-3">
                        <p class="mb-3">From the mighty stretches of the Karakoram in the North to the vast alluvial delta of the Indus River in the South; Pakistan remains a land of high adventure and nature. Trekking, mountaineering, white water rafting, mountain and
                            desert jeep safaris, camel and yak safaris, trout fishing and bird watching are a few activities, which entice the adventure and nature lovers to Pakistan.</p>

                        <p class="mb-3">Pakistan is endowed with a rich and varied flora and fauna. High Himalayas, Karakoram and the Hindukush ranges with their alpine meadows and permanent snow line, coniferous forests down the sub-mountain scrub, the vast Indus plain
                            merging into the great desert, the coast line and wetlands, all offer a remarkably rich variety of vegetation and associated including avifauna, both endemic and migratory. Ten of 18 mammalian orders are represented in Pakistan
                            with species ranging from the world's smallest surviving mammals, the Mediterranean Pigmy Shrew, to the largest mammal ever known; the blue whale.</p>

                        <p class="mb-0">Pakistan is home to 108 peaks above 7,000 meters and probably as many peaks above 6,000 m. There is no count of the peaks above 5,000 and 4,000 m. five of the 14 highest independent peaks in the world (the eight-thousanders) are
                            in Pakistan (four of which lie in the surroundings of Concordia; the confluence of Baltoro Glacier and Godwin Austen Glacier).</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="container px-sm-5 px-4">
            <div class="row">
                <div class="col-12">
                    <img :src="useAssets('assets/key-data-img.png')" alt="key data Img" class="img-fluid w-100">
                </div>
            </div>
        </div>

        <section class="investmentsDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Main <span>Sectors</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center">
                        <p class="mb-2">From hotels and motels to foodservice, the Tourism and Hospitality sector generates diverse revenues, showcasing Pakistan's vibrant accommodation and dining offerings.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 mb-lg-0 mb-3">
                        <div class="card shdaow-none h-100">
                            <div class="card-body p-1">
                                <ul class="nav nav-tabs d-flex flex-lg-column border-0 flex-row flex-nowrap overflow-x-auto overflow-y-hidden mx-lg-0 mx-3" id="investmentTabs" role="tablist">
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100 active" id="hotels-tab" data-bs-toggle="tab" data-bs-target="#hotels-tab-pane" type="button" role="tab" aria-controls="hotels-tab-pane" aria-selected="true">Hotels and Motels</button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 h-100" id="foodService-tab" data-bs-toggle="tab" data-bs-target="#foodService-tab-pane" type="button" role="tab" aria-controls="foodService-tab-pane" aria-selected="false">Food Service</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="tab-content h-100" id="InvestmentsTabContent">
                                    <div class="tab-pane fade h-100 show active" id="hotels-tab-pane" role="tabpanel" aria-labelledby="hotels-tab" tabindex="0">
                                        <img :src="useAssets('assets/textile-icon.svg')" alt="Textile Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Hotels and Motels</h6>
                                        <p class="mb-2">The hotels & motels industry value consists of all revenues generated by hotels, motels and other accommodation providers through the provision of accommodation and other services.

                                        </p>
                                        <p class="mb-2">The total value includes room revenue and non-room revenue, including shops and telecommunication services. The industry is segmented according to the origin of the revenues (leisure consumers and business consumers).</p>
                                        <a href="#" class="learnMoreBtn">Learn More</a>
                                    </div>

                                    <div class="tab-pane fade h-100" id="foodService-tab-pane" role="tabpanel" aria-labelledby="foodService-tab" tabindex="0">
                                        <img :src="useAssets('assets/logistics-icon.svg')" alt="Logistics Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Food Services</h6>
                                        <p class="mb-2">Pakistan's strategic location as a trade corridor makes logistics and supply chain management a critical sector. The development of modern ports, highways, and rail systems has opened new opportunities for international
                                            trade.
                                        </p>
                                        <p class="mb-2">Key areas of investment include warehousing, cold storage, and e-commerce logistics, driven by the rise of digital marketplaces.</p>
                                        <a href="#" class="learnMoreBtn">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 mb-lg-0 mb-3">
                        <div class="image-container position-relative card border-0 shadow-none bg-transparent">
                            <img id="investmentImg" :src="useAssets('assets/hotels-img.png')" alt="Investment Img" class="img-fluid fade show active">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="economicZonesDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container px-lg-5 px-4">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Reasons to <span>Invest</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                        <p class="mb-2">With a diverse tourist profile, Pakistan promotes a safe environment and rich offerings, attracting both leisure and business travelers globally.</p>
                    </div>

                    <ul class="list-unstyled px-lg-5">
                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Pakistan’s with its slogan; “It’s beautiful, it’s Pakistan” has managed to generate interest from travelers from across the globe.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Pakistan is working hard to eradicate its negative image and promote itself as “Emerging Pakistan”, promoting a considerable tourist offer and a safe and hospitable environment.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Along with business and leisure tourists, a large number of tourists to the country are overseas Pakistanis.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Leisure is a major reason for travel for the vast majority of domestic tourists and a sizeable majority of inbound tourists in 2019.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Major cities of Karachi, Lahore and Islamabad are the leading destinations for business travel.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">There is a constant rise in tourists to the northern areas of Pakistan, especially the Swat Valley, which is also known as the “Switzerland of Pakistan”.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <div class="container px-sm-5 px-4">
            <div class="row">
                <div class="col-12">
                    <img :src="useAssets('assets/tourism-img.png')" alt="Tourism Img" class="img-fluid">
                </div>
            </div>
        </div>

        <section class="economicZonesDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container px-lg-5 px-4">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Promotion of <span>Religious Tourism</span></h2>
                    </div>

                    <div class="col-lg-9 mx-auto col-12 text-center mb-3">
                        <p class="mb-2">The government actively promotes religious tourism, attracting global Sikh and Buddhist visitors by enhancing pilgrimage opportunities and celebrating significant events.</p>
                    </div>

                    <ul class="list-unstyled px-lg-5">
                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Government is actively promoting ‘religious tourism,’ as it is one of the most significant revenue-generating businesses in the world. e.g. kartarput project. The government will also actively participate in the birthday celebrations
                                of Baba Nanak.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">In the past, only 3,000 visas were issued to Sikh pil grims. The initiative has also drawn the attention of the Sikh community around the world. A recent survey data revealed that a whopping 83 percent of the eight million
                                diaspora Sikhs living outside India had shown interest in visiting Pakistan.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">Also, 79 percent of the 20 million Indian Sikhs expressed an interest in visiting Pakistan.</p>
                        </li>

                        <li class="mb-2 p-4">
                            <p class="mb-0 text-start">In KP, which is dotted with sacred Buddhist sites the government is working with the World Bank to develop a Buddhist trail to attract Buddhists, and in particular, monks from across the globe.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <div class="container px-sm-5 px-4">
            <div class="row">
                <div class="col-12">
                    <img :src="useAssets('assets/tourism-img1.png')" alt="Tourism Img" class="img-fluid">
                </div>
            </div>
        </div>

        <section class="majorInvestorsDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Major Players in the <span>industry</span></h2>
                    </div>

                    <div class="col-md-6 mx-auto col-12 text-center mb-3">
                        <p>The tourism and hospitality sector in Pakistan is shaped by major players, including Serena Hotels, PIA, and Pearl Continental, driving growth and innovation.</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid mb-4">
                <div class="row">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img :src="useAssets('assets/hotel-one-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/pc-logo.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/unilever-logo.svg')" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="economicZonesDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container px-lg-5 px-4">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Key <span>Information</span></h2>
                    </div>

                    <div class="col-lg-9 mx-auto col-12 text-center mb-3">
                        <p class="mb-2">The growth of hotels, foodservice, and airlines is contributing to the tourism sector, with inbound arrivals and receipts steadily increasing.</p>
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
                </div>
            </div>
        </section>
    </div>
</template>

