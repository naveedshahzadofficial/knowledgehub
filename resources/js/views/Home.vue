<script>
import {useAssets} from "@/composable/use-assets";
import {usePreLoaderStore} from "../store/preloader";
import {setTimeout} from "../../../public/assets/plugins/custom/tinymce/tinymce.bundle";
export default {
    name: "HomePage",
    data() {
        return {
            activities: [],
            sectors: [],
            categories: [],
            business_activity_id:'',
            apply_ebiz_url: process.env.MIX_APPLY_EBIZ_URL,
        }
    },
    methods: {
        useAssets,
        loadActivities: function () {
            axios.get('activities').then(response => {
                this.activities = response.data.activities;
                this.sectors = response.data.sectors;
                this.categories = response.data.categories;
            })
        },
        search: function (){
            this.$router.push({'name':'services', params:{ 'id': 0,'id2': this.business_activity_id}});
        },
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
    created() {
        usePreLoaderStore().setIsShow(false);
        window.setTimeout(() => {
            usePreLoaderStore().setIsShow(true);
        }, 1000);
    },
    mounted() {
        this.loadActivities();
        this.initOwlCarousel();
    },
    beforeUnmount() {
        $('.owl-carousel').trigger('destroy.owl.carousel');
    },
    computed:{
        filteredBusinessCategories: function () {
            return this.categories.filter(category => category.category_is_sector === 1);
        },
        organizedCategories() {
            const categories = [...this.filteredBusinessCategories];
            const rows = [];
            rows.push([
                {}, {},
                ...categories.splice(0, 4),
                {},
            ]);
            rows.push(categories.splice(0, 7));
            rows.push([
                ...categories.splice(0, 5),
                { category_short_name: 'View All', isViewAll: true },
                {},
            ]);
            return rows;
        },
    }
};
</script>

<style scoped>
    .v-select >>>  .vs__dropdown-toggle {
        border: transparent !important;
    }
    .v-select >>> .vs__open-indicator{
        display: none !important;
    }
.form-control {
    border: transparent !important;
    padding-top: 0.925rem !important;
}

    .v-select >>> .vs__clear{
    display: none !important;
}
    .v-select >>> .vs__actions{
    display: none !important;
}
</style>
<template>
    <div data-bs-spy="scroll" id="homeStartPage" data-bs-target="#eBiz-landingNavbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="content z-2 position-relative" tabindex="0">
        <header id="scrollspyHeading">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row align-items-center">
                    <div class="col-lg-6 pe-lg-5">
                        <h6>Driving Business Growth in Punjab</h6>
                        <h1 class="mb-3">Your gateway to seamless
                            <span class="d-inline-block">Business Solutions</span>
                        </h1>
                        <p class="mb-4 pe-lg-5 position-relative"><span style="font-weight: 600">All-in-one Business Centric Simplicity:</span> Empower your business with a
                            platform designed for efficiency, transparency, and accessibility.
                            Explore, apply, and manage like never before.
                            <img :src="useAssets('assets/down-arrow-icon.svg')" alt="arrow icon" class="position-absolute">
                        </p>
                        <div class="input-group mb-3 w-75">
                            <span class="input-group-text bg-transparent border-0 ps-3" id="addon-wrapping">
                                <i class="fa-solid fa-magnifying-glass fs-5"></i>
                            </span>
                            <v-select v-model="business_activity_id" :options="sectors"
                                      :reduce="sector => sector.id" label="easy_class_name"
                                      placeholder="Search Your Business" class="form-control border-0 pt-1 bg-transparent ps-0">
                            </v-select>
<!--                            <input type="search" class="form-control border-0 bg-transparent ps-0" placeholder="Search your business type……" aria-label="Search" aria-describedby="button-addon2">-->
                            <button class="btn findBusinessBtn m-2 px-4" @click.prevent="search" type="button" id="button-addon2">Search</button>
                        </div>
                    </div>
                    <div class="col-lg-6 d-lg-block d-none ps-5">
                        <img :src="useAssets('assets/landing_page_header_img.png')" alt="Img" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </header>

        <section class="visionSection py-sm-5 py-4">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 ps-lg-0 mb-lg-0 mb-3">
                        <img :src="useAssets('assets/cm-img.png')" alt="cm Img" class="img-fluid w-100">
                    </div>
                    <div class="col-lg-6 pt-lg-5 ps-lg-5">
                        <h3 class="mb-2">Chief Minister’s vision</h3>
                        <h4 class="mb-2">Promotes transparency efficiency and a business-friendly environment in Punjab</h4>
                        <p class="mb-3">The launch of Knowledge Hub is a key step in streamlining business processes and reducing compliance burdens, supporting the Pakistan Regulatory Modernization Initiative.
                            <span>
                                <router-link :to="{ name: 'cm-message'} " >Learn More</router-link>
                            </span>
                        </p>
                        <img :src="useAssets('assets/cm-signature.svg')" alt="">
                        <p class="mb-0">CM PUNJAB</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="comprehensiveSolutions py-sm-5 py-4" id="scrollspyHeading1">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2><span>Business Sector</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center mb-3">
                        <p>Discover the power of eBiz Punjab, where essential business-centric knowledge meets strategic
                            opportunities to drive your business forward.</p>
                    </div>

                    <div v-for="(row, rowIndex) in organizedCategories" :key="'row-' + rowIndex" class="col-12 mb-1 d-lg-flex gap-1 justify-content-xl-between px-sm-5 px-4 flex-xl-nowrap flex-wrap">
                        <template v-for="category in row">
                            <router-link :to="{ name: 'business-sector-activities', params: { id: category.id }}" class="card shadow-none text-decoration-none" v-if="!category?.isViewAll && category?.category_short_name">
                                <div class="card-body text-start d-flex flex-column justify-content-between">
                                    <p class="mb-4 pe-xxl-4 text-start">{{ category.category_short_name }}</p>
                                    <img :src="useAssets(category.category_icon)" alt="Business Icon" class="comprehensiveBusinessImg">
                                </div>
                            </router-link>
                            <router-link :to="{ name: 'business-sector-activities', params: { id: '' }}" v-else-if="category?.isViewAll" class="card shadow-none viewAllSectorsBtn text-decoration-none">
                                <div class="card-body text-start d-flex flex-column justify-content-between">
                                    <p class="mb-4 pe-5 text-start">View all Sectors</p>
                                    <img :src="useAssets('assets/viewAll-icon1.svg')">
                                </div>
                            </router-link>
                            <div v-else class="card border-0 shadow-none bg-transparent d-xl-block d-none">
                                <p>Empty Spot</p>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </section>

        <section class="connectivityDiv py-sm-5 py-4" id="scrollspyHeading3">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2><span>Connectivity</span> Simplified</h2>
                    </div>

                    <div class="col-xl-9 mx-auto col-12 text-center mb-3">
                        <p>eBiz Punjab simplifies business operations with streamlined services, timely regulatory updates, and exclusive government support.</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="owl-carousel owl-theme mb-sm-5 mb-4">
                        <div class="item">
                            <img :src="useAssets('assets/fpcci-grey-icon.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/lcci-grey-icon.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/fiedmc-grey-icon.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/epza-grey-icon.svg')" alt="">
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img :src="useAssets('assets/lcci-grey-icon.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/fiedmc-grey-icon.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/epza-grey-icon.svg')" alt="">
                        </div>
                        <div class="item">
                            <img :src="useAssets('assets/piedmc-grey-icon.svg')" alt="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <router-link :to="{ name: 'connectivity'}" class="eBizPortalBtn border-0 p-4 d-inline-flex align-items-center justify-content-center text-decoration-none">
                            <span class="me-2">Learn More</span>
                            <span>
                                <img :src="useAssets('assets/viewAll-icon.svg')">
                            </span>
                        </router-link>
                    </div>
                </div>
            </div>
        </section>

        <section class="businessEssentials py-sm-5 py-4" id="scrollspyHeading2">
            <div class="container-fluid px-5">
                <div class="row mb-4">
                    <div class="col-12 businessEssentialsBgDiv py-sm-5 py-4">
                        <div class="container px-md-5">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2>Business <span>Essentials</span></h2>
                                </div>

                                <div class="col-xl-9 mx-auto col-12 text-center mb-3">
                                    <p>Unlock a new level of efficiency with eBiz Punjab’s services—designed for easy access, real-time
                                        tracking, and complete traceability.</p>
                                </div>

                                <div class="row mx-0 mb-3">
                                    <div class="col-12 mb-3">
                                        <h4 class="d-flex align-items-center">
                                            <span class="me-2">Registrations to Establish a Business</span>
                                            <img :src="useAssets('assets/right-arrow-icon.svg')" alt="">
                                        </h4>
                                        <h5>Starting a new business requires several essential registrations and licenses to ensure legal compliance
                                            and smooth operations. Below is a list of key initial registrations that a business in Punjab may need,
                                            depending on its nature</h5>
                                    </div>

                                    <ul class="list-unstyled row mx-0">
                                        <li class="mb-3 col-xxl-3 col-xl-4 col-md-6"><a href="https://business.punjab.gov.pk/starting-business?qt-types_of_business_entities=0#qt-types_of_business_entities" target="_blank" class="text-decoration-none text-white">Sole Proprietorship</a></li>
                                        <li class="mb-3 col-xxl-3 col-xl-4 col-md-6"><a href="https://business.punjab.gov.pk/starting-business?qt-types_of_business_entities=1#qt-types_of_business_entities" target="_blank" class="text-decoration-none text-white">Association of Persons (Firm)</a></li>
                                        <li class="mb-3 col-xxl-3 col-xl-4 col-md-6"><a href="https://business.punjab.gov.pk/starting-business?qt-types_of_business_entities=2#qt-types_of_business_entities" target="_blank" class="text-decoration-none text-white">Single Member Company</a></li>
                                        <li class="mb-3 col-xxl-3 col-xl-4 col-md-6"><a href="https://business.punjab.gov.pk/starting-business?qt-types_of_business_entities=3#qt-types_of_business_entities" target="_blank" class="text-decoration-none text-white">Private Limited Company</a></li>
                                        <li class="mb-3 col-xxl-3 col-xl-4 col-md-6"><a href="https://business.punjab.gov.pk/starting-business?qt-types_of_business_entities=4#qt-types_of_business_entities" target="_blank" class="text-decoration-none text-white">Public Limited Company</a></li>
                                        <li class="mb-3 col-xxl-3 col-xl-4 col-md-6"> Labour</li>
                                        <li class="col-xxl-3 col-xl-4 col-md-6"> Pessi</li>
                                    </ul>
                                </div>

                                <div class="row mx-0">
                                    <div class="col-12 mb-3">
                                        <h4 class="d-flex align-items-center">
                                            <span class="me-2">Regulatory Registrations, Licenses, Certification and other Permits (RLCOs) for Businesses to Operate</span>
                                            <img :src="useAssets('assets/right-arrow-icon.svg')" alt="">
                                        </h4>
                                        <h5>When starting a new business or expanding an existing one in Pakistan, it's important to secure the
                                            relevant Registrations, Licenses, Certifications, and Other Permits (RLCOs). Below is a comprehensive
                                            guide outlining the key requirements</h5>
                                    </div>

                                    <ul class="list-unstyled d-flex flex-wrap">
                                        <li class="mb-3 me-5"><router-link class="text-decoration-none text-white" :to="{ name: 'services'}" >Explore RLCOs</router-link></li>
                                        <li class="mb-3 me-5"><a :href="apply_ebiz_url" class="text-decoration-none text-white">Apply RLCOs</a></li>
                                        <li class="mb-3 me-5"><a :href="apply_ebiz_url" class="text-decoration-none text-white">Track the Progress of Applied RLCOs</a></li>
                                    </ul>
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
                        <h2>Key Investments <span>Sectors</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center">
                        <p class="mb-2">Fuel your business's growth with strategic insights and investment capital. Discover new opportunities, optimize operations, and scale up your business.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 mb-lg-0 mb-3">
                        <div class="card shdaow-none">
                            <div class="card-body p-1">
                                <ul class="nav nav-tabs d-flex flex-lg-column border-0 flex-row flex-nowrap overflow-x-auto overflow-y-hidden mx-lg-0 mx-3" id="investmentTabs" role="tablist">
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1" id="textile-tab" data-bs-toggle="tab" data-bs-target="#textile-tab-pane" type="button" role="tab" aria-controls="textile-tab-pane" aria-selected="true">Textile</button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1" id="logistics-tab" data-bs-toggle="tab" data-bs-target="#logistics-tab-pane" type="button" role="tab" aria-controls="logistics-tab-pane" aria-selected="false">Logistics</button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1 active" id="foodProcessing-tab" data-bs-toggle="tab" data-bs-target="#foodProcessing-tab-pane" type="button" role="tab" aria-controls="foodProcessing-tab-pane" aria-selected="true">Food Processing</button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1" id="autoMobile-tab" data-bs-toggle="tab" data-bs-target="#autoMobile-tab-pane" type="button" role="tab" aria-controls="autoMobile-tab-pane" aria-selected="false">Automobile</button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1" id="InfoTech-tab" data-bs-toggle="tab" data-bs-target="#InfoTech-tab-pane" type="button" role="tab" aria-controls="InfoTech-tab-pane" aria-selected="false">Information Technology</button>
                                    </li>
                                    <li class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1" id="housing-tab" data-bs-toggle="tab" data-bs-target="#housing-tab-pane" type="button" role="tab" aria-controls="housing-tab-pane" aria-selected="false">Housing & Construction</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link w-100 text-start p-3" id="tourism-tab" data-bs-toggle="tab" data-bs-target="#tourism-tab-pane" type="button" role="tab" aria-controls="tourism-tab-pane" aria-selected="false">Tourism and Hospitality</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="tab-content" id="InvestmentsTabContent">
                                    <div class="tab-pane fade" id="textile-tab-pane" role="tabpanel" aria-labelledby="textile-tab" tabindex="0">
                                        <img :src="useAssets('assets/textile-icon.svg')" alt="Textile Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Textile Industry</h6>
                                        <p class="mb-2">The textile industry is Pakistan's largest manufacturing sector, contributing over 60% to exports and employing a significant portion of the workforce. The sector is known for its cotton production, garments, and
                                            value-added products.</p>
                                        <p class="mb-2">With government incentives and modernization efforts, the industry is poised to expand into technical textiles and sustainable production methods to meet global demands.</p>
                                        <router-link :to="{ name: 'textile'}" class="learnMoreBtn">Learn More</router-link>
                                    </div>

                                    <div class="tab-pane fade" id="logistics-tab-pane" role="tabpanel" aria-labelledby="logistics-tab" tabindex="0">
                                        <img :src="useAssets('assets/logistics-icon.svg')" alt="Logistics Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Logistics and Supply Chain</h6>
                                        <p class="mb-2">Pakistan's strategic location as a trade corridor makes logistics and supply chain management a critical sector. The development of modern ports, highways, and rail systems has opened new opportunities for international
                                            trade.
                                        </p>
                                        <p class="mb-2">Key areas of investment include warehousing, cold storage, and e-commerce logistics, driven by the rise of digital marketplaces.</p>
                                        <router-link :to="{ name: 'logistics'}" class="learnMoreBtn">Learn More</router-link>
                                    </div>

                                    <div class="tab-pane fade show active" id="foodProcessing-tab-pane" role="tabpanel" aria-labelledby="foodProcessing-tab" tabindex="0">
                                        <img :src="useAssets('assets/food-processing-icon1.svg')" alt="Investment Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Food Processing</h6>
                                        <p class="mb-2">Pakistan's food processing industry, the second-largest after textiles, plays a vital role in the economy, providing 16% of manufacturing jobs and contributing 27% to the sector's production value. With a burgeoning
                                            middle class of 102 million, the industry attracts $223.5 million annually in foreign direct investment (FDI).</p>
                                        <p class="mb-2">Key growth areas include frozen foods, value-added agricultural products, and processed produce, which are driving both domestic consumption and international demand.</p>
                                        <router-link :to="{ name: 'food-processing'}" class="learnMoreBtn">Learn More</router-link>
                                    </div>

                                    <div class="tab-pane fade" id="autoMobile-tab-pane" role="tabpanel" aria-labelledby="autoMobile-tab" tabindex="0">
                                        <img :src="useAssets('assets/automobile-icon.svg')" alt="Automobile Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Automobile Manufacturing</h6>
                                        <p class="mb-2">The automobile industry in Pakistan is expanding rapidly, driven by increasing consumer demand and foreign investment. The sector includes the production of cars, motorbikes, and commercial vehicles.</p>
                                        <p class="mb-2">Government policies promoting local assembly and electric vehicle adoption are set to transform the market, creating new avenues for growth and sustainability.</p>
                                        <router-link :to="{ name: 'auto-mobile'}" class="learnMoreBtn">Learn More</router-link>
                                    </div>

                                    <div class="tab-pane fade" id="InfoTech-tab-pane" role="tabpanel" aria-labelledby="InfoTech-tab" tabindex="0">
                                        <img :src="useAssets('assets/it-icon.svg')" alt="Information Technology Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Information Technology</h6>
                                        <p class="mb-2">Pakistan's IT sector is a rising star, with exports exceeding $2 billion annually. The industry is known for its skilled workforce, offering software development, BPO services, and digital solutions to global clients.</p>
                                        <p class="mb-2">Investment opportunities abound in areas such as artificial intelligence, fintech, and cloud computing, supported by a thriving startup ecosystem.</p>
                                        <router-link :to="{ name: 'information-technology'}" class="learnMoreBtn">Learn More</router-link>
                                    </div>

                                    <div class="tab-pane fade" id="housing-tab-pane" role="tabpanel" aria-labelledby="housing-tab" tabindex="0">
                                        <img :src="useAssets('assets/housing-icon.svg')" alt="Housing Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Housing and Construction</h6>
                                        <p class="mb-2">The housing and construction sector in Pakistan is growing rapidly, driven by urbanization and government initiatives such as the Naya Pakistan Housing Program.</p>
                                        <p class="mb-2">With a focus on affordable housing and infrastructure development, the sector offers lucrative opportunities for investment in real estate and building materials.</p>
                                        <router-link :to="{ name: 'housing-construction'}" class="learnMoreBtn">Learn More</router-link>
                                    </div>

                                    <div class="tab-pane fade" id="tourism-tab-pane" role="tabpanel" aria-labelledby="tourism-tab" tabindex="0">
                                        <img :src="useAssets('assets/tourism-icon.svg')" alt="Tourism Icon" class="img-fluid mb-3">
                                        <h6 class="mb-2">Tourism Industry</h6>
                                        <p class="mb-2">Pakistan's tourism industry is booming, with its stunning landscapes, cultural heritage, and adventure tourism attracting visitors from around the globe.</p>
                                        <p class="mb-2">Investment opportunities include eco-tourism, resort development, and heritage site restoration, supported by government incentives and global recognition.</p>
                                        <router-link :to="{ name: 'tourism-hospitality'}" class="learnMoreBtn">Learn More</router-link>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 mb-lg-0 mb-3">
                        <div class="image-container position-relative card border-0 shadow-none bg-transparent">
                            <img id="investmentImg" :src="useAssets('assets/food-processing-img1.png')" alt="Investment Img" class="img-fluid fade show active">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="newsDiv py-sm-5 py-4">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Discover <span>News</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center">
                        <p class="mb-2">Find relevant, easy-to-read business articles to stay up-to-date on laws and regulations, useful resources, and government programs to help you start, run, and grow your business.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                        <a class="text-decoration-none card" href="https://www.brecorder.com/news/40320190/cheap-electricity-to-industries-punjab-examining-proposals-to-lay-direct-transmission-lines" target="_blank">
                            <img :src="useAssets('assets/news-img-1.png')" class="card-img-top" alt="news Img">
                            <div class="card-body">
                                <h5>Cheap Electricity to Industries</h5>
                                <p class="card-text text-start">Chief Minister Punjab Maryam Nawaz Sharif here met with a delegation of . . .</p>
                                <h6>Business Recorder - August 31, 2024</h6>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                        <a class="text-decoration-none card"  href="https://arynews.tv/punjab-green-tractor-scheme-maryam-nawaz-conducts-lucky-draw/" target="_blank">
                            <img :src="useAssets('assets/news-img-6.png')" class="card-img-top" alt="news Img">
                            <div class="card-body">
                                <h5>Punjab Green Tractor Scheme</h5>
                                <p class="card-text text-start">Punjab Chief Minister (CM) Maryam Nawaz on Friday launched . . .</p>
                                <h6>ARY News – November 1, 2024</h6>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                        <a class="text-decoration-none card"  href="https://profit.pakistantoday.com.pk/2024/11/05/cm-punjabs-livestock-card-a-gift-for-livestock-farmers/" target="_blank">
                            <img :src="useAssets('assets/news-img-3.png')" class="card-img-top" alt="news Img">
                            <div class="card-body">
                                <h5>CM Punjab’s Livestock Card</h5>
                                <p class="card-text text-start">The signing ceremony for the Memorandum of Understanding . . .</p>
                                <h6>Pakistan Today – November 5, 2024</h6>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                        <a class="text-decoration-none card"  href="https://www.brecorder.com/news/40333662/cpec-38-projects-worth-25bn-already-completed#:~:text=ISLAMABAD%3A%20A%20total%20of%2038,Pakistan%20Economic%20Corridor%20(CPEC)" target="_blank">
                            <img :src="useAssets('assets/news-img-5.png')" class="card-img-top" alt="news Img">
                            <div class="card-body">
                                <h5>CPEC: 38 projects</h5>
                                <p class="card-text text-start">A total of 38 projects worth over $25 billion have been completed . . .</p>
                                <h6>Business Recorder – Print 2024-11-21</h6>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
        </section>

        <section class="faqsDiv py-sm-5 py-4" id="scrollspyHeading5">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Frequently Asked <span>Questions</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center">
                        <p class="mb-2">Discover detailed information on services, application procedures, and troubleshooting tips, all conveniently located in one place. </p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="accordion faqsAccordion" id="accordionExample">
                            <div class="accordion-item mb-3 expanded">
                                <h2 class="accordion-header">
                                    <button class="accordion-button py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        What types of services are available on the eBiz Punjab platform?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-0">
                                        eBiz offer services like <strong>Agriculture</strong>, <strong>forestry</strong> and <strong>fishing Rice Farming</strong>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        What support options are available if I encounter issues on eBiz Punjab?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-0">
                                        Eligibility criteria vary depending on the scheme's requirements.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        What are the steps to apply for licenses and permits through eBiz Punjab?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-0">
                                        Some schemes may offer alternative application methods besides the web portal.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        How can I track the status of my applications on eBiz Punjab?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-0">
                                        Various types of bikes may be available, depending on the scheme's specifications.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Are there specific qualifications required to apply for petrol bikes?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-0">
                                        Eligibility for petrol bikes may depend on scheme guidelines and applicant qualifications.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
