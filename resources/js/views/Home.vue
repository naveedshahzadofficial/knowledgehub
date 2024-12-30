<script>
import {useAssets} from "@/composable/use-assets";
import {usePreLoaderStore} from "../store/preloader";
export default {
    name: "HomePage",
    data() {
        return {
            activities: [],
            sectors: [],
            categories: [],
            business_activity_id:'',
            apply_ebiz_url: process.env.MIX_APPLY_EBIZ_URL,
            activeTab: "textile",
            tabs: [
                {
                    id: "textile",
                    name: "Textile",
                    title: "Textile Industry",
                    icon: "assets/textile-landing-icon.svg",
                    image: "assets/textile-landing-img.png",
                    route: "textile",
                    descriptions: [
                        "The textile industry is Pakistan's largest manufacturing sector, contributing over 60% to exports and employing a significant portion of the workforce. The sector is known for its cotton production, garments, and value-added products.",
                        "With government incentives and modernization efforts, the industry is poised to expand into technical textiles and sustainable production methods to meet global demands.",
                    ],
                },
                {
                    id: "logistics",
                    name: "Logistics",
                    title: "Logistics and Supply Chain",
                    icon: "assets/logistics-landing-icon.svg",
                    image: "assets/logistics-landing-img.png",
                    route: "logistics",
                    descriptions: [
                        "Pakistan's strategic location as a trade corridor makes logistics and supply chain management a critical sector. The development of modern ports, highways, and rail systems has opened new opportunities for international trade.",
                        "Key areas of investment include warehousing, cold storage, and e-commerce logistics, driven by the rise of digital marketplaces.",
                    ],
                },
                {
                    id: "foodProcessing",
                    name: "Food Processing",
                    title: "Food Processing",
                    icon: "assets/food-processing-icon1.svg",
                    image: "assets/food-processing-img1.png",
                    route: "food-processing",
                    descriptions: [
                        "Pakistan's food processing industry, the second-largest after textiles, plays a vital role in the economy, providing 16% of manufacturing jobs and contributing 27% to the sector's production value. With a burgeoning middle class of 102 million, the industry attracts $223.5 million annually in foreign direct investment (FDI).",
                        "Key growth areas include frozen foods, value-added agricultural products, and processed produce, which are driving both domestic consumption and international demand.",
                    ],
                },
                {
                    id: "autoMobile",
                    name: "Automobile",
                    title: "Automobile Manufacturing",
                    icon: "assets/automobile-landing-icon.svg",
                    image: "assets/automobile-landing-img.png",
                    route: "auto-mobile",
                    descriptions: [
                        "The automobile industry in Pakistan is expanding rapidly, driven by increasing consumer demand and foreign investment. The sector includes the production of cars, motorbikes, and commercial vehicles.",
                        "Government policies promoting local assembly and electric vehicle adoption are set to transform the market, creating new avenues for growth and sustainability.",
                    ],
                },
                {
                    id: "InfoTech",
                    name: "Information Technology",
                    title: "Information Technology",
                    icon: "assets/info-tech-landing-icon.svg",
                    image: "assets/info-tech-landing-img.png",
                    route: "information-technology",
                    descriptions: [
                        "Pakistan's IT sector is a rising star, with exports exceeding $2 billion annually. The industry is known for its skilled workforce, offering software development, BPO services, and digital solutions to global clients.",
                        "Investment opportunities abound in areas such as artificial intelligence, fintech, and cloud computing, supported by a thriving startup ecosystem.",
                    ],
                },
                {
                    id: "housing",
                    name: "Housing",
                    title: "Housing and Construction",
                    icon: "assets/housing-landing-icon.svg",
                    image: "assets/housing-landing-img.png",
                    route: "housing-construction",
                    descriptions: [
                        "The housing and construction sector in Pakistan is growing rapidly, driven by urbanization and government initiatives such as the Naya Pakistan Housing Program.",
                        "With a focus on affordable housing and infrastructure development, the sector offers lucrative opportunities for investment in real estate and building materials.",
                    ],
                },
                {
                    id: "tourism",
                    name: "Tourism",
                    title: "Tourism Industry",
                    icon: "assets/tourism-landing-icon.svg",
                    image: "assets/tourism-landing-img.png",
                    route: "tourism-hospitality",
                    descriptions: [
                        "Pakistan's tourism industry is booming, with its stunning landscapes, cultural heritage, and adventure tourism attracting visitors from around the globe.",
                        "Investment opportunities include eco-tourism, resort development, and heritage site restoration, supported by government incentives and global recognition.",
                    ],
                },
            ],
        }
    },
    methods: {
        useAssets,
        setActiveTab(id) {
            this.activeTab = id;
        },
        loadActivities: function () {
            axios.get('activities').then(response => {
                this.activities = response.data.activities;
                this.sectors = response.data.sectors;
                this.categories = response.data.categories;
            })
        },
        search: function (){
            // if(this.business_activity_id === ''){
            //     return false;
            // }
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
        activeImage() {
            const activeTabData = this.tabs.find((tab) => tab.id === this.activeTab);
            return activeTabData ? activeTabData.image : "";
        },
        filteredBusinessCategories: function () {
            return this.categories.filter(category => category.category_is_sector === 1);
        },
        organizedCategories() {
            const categories = [...this.filteredBusinessCategories];
            const rows = [];
            rows.push([
                ...categories.splice(0, 7),
            ]);
            rows.push(categories.splice(0, 7));
            rows.push([
                ...categories.splice(0, 6),
                { category_short_name: 'View All', isViewAll: true },
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
    <div data-bs-spy="scroll" data-bs-target="#eBiz-landingNavbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="content z-2 position-relative landingContent" tabindex="0">
        <header id="scrollspyHeading" class="landingHeader">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row align-items-center">
                    <div class="col-lg-6 pe-xl-5">
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
                            <button class="btn findBusinessBtn m-2 px-4" @click.prevent="search" type="button" id="button-addon2">Search</button>
                        </div>
                    </div>
                    <div class="col-lg-6 d-lg-block d-none ps-xl-5 text-end">
                        <img :src="useAssets('assets/landing_page_header_img.png')" alt="Img" class="img-fluid">
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
                        <p class="mb-0">Chief Minister Punjab</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="comprehensiveSolutions py-sm-5 py-4" id="scrollspyHeading1">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Business <span>Sector</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center">
                        <p>Discover the power of eBiz Punjab, where essential business-centric knowledge meets strategic
                            opportunities to drive your business forward.</p>
                    </div>

                    <div v-for="(row, rowIndex) in organizedCategories" :key="'row-' + rowIndex" class="col-12 mb-1 d-lg-flex gap-1 justify-content-xl-between px-sm-5 px-4 flex-xl-nowrap flex-wrap">
                        <template v-for="category in row">
                            <router-link :to="{ name: 'business-sector-activities', params: { id: category.id }}" class="card shadow-none text-decoration-none" v-if="!category?.isViewAll && category?.category_short_name">
                                <div class="card-body text-start d-flex flex-column justify-content-between">
                                    <p class="mb-2 text-start">{{ category.category_short_name }}</p>
                                    <img :src="useAssets(category.category_icon)" alt="Business Icon" class="comprehensiveBusinessImg comprehensiveBusinessImg1">
                                </div>
                            </router-link>
                            <router-link :to="{ name: 'business-sector-activities', params: { id: '' }}" v-else-if="category?.isViewAll" class="card shadow-none viewAllSectorsBtn text-decoration-none">
                                <div class="card-body text-start d-flex flex-column justify-content-between">
                                    <p class="mb-4 pe-2 text-start">View all Businesses</p>
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
                                        </h4>
                                        <h5>Starting a new business requires several essential registrations and licenses to ensure legal compliance
                                            and smooth operations. Below is a list of key initial registrations that a business in Punjab may need,
                                            depending on its nature</h5>
                                    </div>

                                    <ul class="list-unstyled row mx-0">
                                        <li class="mb-3 col-xxl-3 col-xl-4 col-md-6"><a href="https://register.business.punjab.gov.pk/" target="_blank" class="text-decoration-none text-white hover-text-underline">Sole Proprietorship</a></li>
                                        <li class="mb-3 col-xxl-3 col-xl-4 col-md-6"><a href="https://register.business.punjab.gov.pk/" target="_blank" class="text-decoration-none text-white hover-text-underline">Association of Persons (Firm)</a></li>
                                        <li class="mb-3 col-xxl-3 col-xl-4 col-md-6"><a href="https://leap.secp.gov.pk/#/landing-page" target="_blank" class="text-decoration-none text-white hover-text-underline">Single Member Company</a></li>
                                        <li class="mb-3 col-xxl-3 col-xl-4 col-md-6"><a href="https://leap.secp.gov.pk/#/landing-page" target="_blank" class="text-decoration-none text-white hover-text-underline">Private Limited Company</a></li>
                                        <li class="mb-3 col-xxl-3 col-xl-4 col-md-6"><a href="https://leap.secp.gov.pk/#/landing-page" target="_blank" class="text-decoration-none text-white hover-text-underline">Public Limited Company</a></li>
                                        <li class="mb-3 col-xxl-3 col-xl-4 col-md-6"><a href="https://register.business.punjab.gov.pk/" target="_blank" class="text-decoration-none text-white hover-text-underline">Labour</a></li>
                                        <li class="mb-3 col-xxl-3 col-xl-4 col-md-6"><a href="https://register.business.punjab.gov.pk/" target="_blank" class="text-decoration-none text-white hover-text-underline">PESSI</a></li>
                                    </ul>
                                </div>

                                <div class="row mx-0">
                                    <div class="col-12 mb-3">
                                        <h4 class="d-flex align-items-center">
                                            <span class="me-2">Regulatory Registrations, Licenses, Certification and other Permits (RLCOs) for Businesses to Operate</span>
                                        </h4>
                                        <h5>When starting a new business or expanding an existing one in Pakistan, it's important to secure the
                                            relevant Registrations, Licenses, Certifications, and Other Permits (RLCOs). Below is a comprehensive
                                            guide outlining the key requirements</h5>
                                    </div>

                                    <ul class="list-unstyled d-flex flex-wrap">
                                        <li class="col-xxl-3 col-xl-4 col-md-6"><router-link class="text-decoration-none text-white hover-text-underline" :to="{ name: 'services'}" >Explore RLCOs</router-link></li>
                                        <li class="col-xxl-3 col-xl-4 col-md-6"><a :href="apply_ebiz_url" class="text-decoration-none text-white hover-text-underline">Apply RLCOs</a></li>
                                        <li class="col-xxl-3 col-xl-4 col-md-6"><a :href="apply_ebiz_url" class="text-decoration-none text-white hover-text-underline">Track the Progress of Applied RLCOs</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
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

                <div class="row mb-5">
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

        <section class="investmentsDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Key Investments <span>Sectors</span></h2>
                    </div>

                    <div class="col-lg-6 mx-auto col-12 text-center">
                        <p class="mb-2">Fuel your business's growth with strategic insights and investment capital.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 mb-lg-0 mb-3">
                        <div class="card shdaow-none">
                            <div class="card-body p-1">
                                <ul class="nav nav-tabs d-flex flex-lg-column border-0 flex-row flex-nowrap overflow-x-auto overflow-y-hidden mx-lg-0 mx-3" id="investmentTabs" role="tablist">
                                    <li v-for="tab in tabs" :key="tab.id" class="nav-item border-bottom" role="presentation">
                                        <button class="nav-link w-100 text-start p-3 my-1" :class="{ active: (activeTab === tab.id) }" @click.prevent="setActiveTab(tab.id)">{{ tab.name }}</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="tab-content h-100" id="InvestmentsTabContent">
                                    <template v-for="tab in tabs" :key="tab.id">
                                    <div v-if="activeTab === tab.id" class="tab-pane fade show active h-100" role="tabpanel" aria-labelledby="textile-tab" tabindex="0">
                                        <div class="flex-grow-1">
                                            <img :src="useAssets(tab.icon)" alt="Textile Icon" class="img-fluid mb-3">
                                            <h6 class="mb-2">{{ tab.title  }}</h6>
                                            <p v-for="desc in tab.descriptions" class="mb-2">{{ desc }}</p>
                                        </div>
                                        <router-link :to="{ name: tab.route}" class="learnMoreBtn">Learn More</router-link>
                                    </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 mb-lg-0 mb-3">
                        <div class="image-container position-relative card border-0 shadow-none bg-transparent">
                            <img v-if="activeImage" id="investmentImg" :src="useAssets(activeImage)" :alt="activeTab + ' Image'" class="img-fluid fade show active" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="newsDiv py-sm-5 py-4" id="scrollspyHeading6">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row mb-1">
                    <div class="col-12 text-center">
                        <h2>Discover <span>News</span></h2>
                    </div>

                    <div class="col-xl-6 mx-auto col-12 text-center">
                        <p class="mb-2">Find relevant, easy-to-read business articles to stay up-to-date on laws and regulations, useful resources, and government programs to help you start, run, and grow your business.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                        <a class="card text-decoration-none h-100" href="https://www.brecorder.com/news/40320190/cheap-electricity-to-industries-punjab-examining-proposals-to-lay-direct-transmission-lines" target="_blank">
                            <img :src="useAssets('assets/news-img-1.png')" class="card-img-top" alt="news Img">
                            <div class="card-body">
                                <h5>Cheap Electricity to Industries </h5>
                                <p class="card-text text-start">Chief Minister Punjab Maryam Nawaz Sharif here met with a delegation of . . .</p>
                                <h6>Business Recorder - August 31, 2024</h6>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                        <a class="text-decoration-none card h-100"  href="https://arynews.tv/punjab-green-tractor-scheme-maryam-nawaz-conducts-lucky-draw/" target="_blank">
                            <img :src="useAssets('assets/news-img-6.png')" class="card-img-top" alt="news Img">
                            <div class="card-body">
                                <h5>Punjab Green Tractor Scheme</h5>
                                <p class="card-text text-start">Punjab Chief Minister (CM) Maryam Nawaz on Friday launched . . .</p>
                                <h6>ARY News – November 1, 2024</h6>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                        <a class="text-decoration-none card h-100"  href="https://profit.pakistantoday.com.pk/2024/11/05/cm-punjabs-livestock-card-a-gift-for-livestock-farmers/" target="_blank">
                            <img :src="useAssets('assets/news-img-3.png')" class="card-img-top" alt="news Img">
                            <div class="card-body">
                                <h5>CM Punjab’s Livestock Card</h5>
                                <p class="card-text text-start">The signing ceremony for the Memorandum of Understanding . . .</p>
                                <h6>Pakistan Today – November 5, 2024</h6>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                        <a class="text-decoration-none card h-100"  href="https://www.brecorder.com/news/40333662/cpec-38-projects-worth-25bn-already-completed#:~:text=ISLAMABAD%3A%20A%20total%20of%2038,Pakistan%20Economic%20Corridor%20(CPEC)" target="_blank">
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

        <section class="faqsDiv py-sm-5 py-4" id="scrollspyHeading7">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row mb-2">
                    <div class="col-12 text-center">
                        <h2>Frequently Asked <span>Questions</span></h2>
                    </div>

                    <div class="col-xl-6 mx-auto col-12 text-center">
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
                                        What type of services are available on eBiz Portal?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-0">
                                        The <strong>eBiz Portal</strong> simplifies the process of obtaining essential business services by providing a centralized business centric platform where businesses can access registrations, licenses, certifications,
                                        and other permits required by various government departments and agencies. This integrated approach ensures that businesses can easily navigate regulatory requirements and comply with the necessary legal frameworks.
                                        By working closely with government bodies, the portal streamlines these processes, reducing hurdles and enabling businesses to focus on growth and innovation with greater efficiency.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Who can use eBiz Punjab?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-0">
                                        The platform is available to entrepreneurs, investors, and businesses of all sizes operating in Punjab.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        What are the steps to apply for license and permits through eBiz Portal?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-0">
                                        The <strong>eBiz Punjab</strong> Portal offers detailed information on the necessary registrations, licenses, certifications, and permits (RLCOs) required by different government departments and agencies for both
                                        new and existing businesses. To apply for these RLCOs, users must first create an account on eBiz Portal and set up a business profile for the business they intend to get RLCOs. After completing the profile, users
                                        can easily access the application portal to submit their RLCO applications, streamlining the entire process.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Can I track the status of my application?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-0">
                                        Yes, the platform provides real-time tracking. Simply log in, go to your dashboard, and check the status of your application.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        How do I provide feedback or suggestions for the platform?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-0">
                                        You can submit feedback via “Help Desk” section on the portal.
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
