<script>
import {useAssets} from "@/composable/use-assets";
export default {
    name: "HomePage",
    data() {
        return {
            activities: [],
            sectors: [],
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
            })
        },
        search: function (){
            this.$router.push({'name':'services', params:{ 'id': 0,'id2': this.business_activity_id}});
        },
    },
    mounted() {
        this.loadActivities();

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
    <main>
        <div data-bs-spy="scroll" data-bs-target="#eBiz-landingNavbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="content" tabindex="0">
            <header class="mb-5">
                <div class="container-fluid px-4" id="homeStartPage">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h1 class="mb-4">Your gateway to seamless
                                <span class="d-inline-block">Business Solutions</span>
                            </h1>
                            <p class="mb-4">Empowering business with efficient, transparent, and accessible services. Discover, apply, and manage all your business needs in one place</p>
                            <div class="input-group mb-3">
                            <span class="input-group-text bg-transparent border-0 ps-3" id="addon-wrapping">
                                <i class="fa-solid fa-magnifying-glass fs-5"></i>
                            </span>
                                <v-select v-model="business_activity_id" :options="sectors"
                                          :reduce="sector => sector.id" label="easy_class_name"
                                          placeholder="Search Business Type Name" class="form-control border-0 pt-1 bg-transparent ps-0">
                                </v-select>
<!--                                <input type="search" class="form-control border-0 bg-transparent ps-0" placeholder="Search your business type……" aria-label="Search" aria-describedby="button-addon2">-->
                                <button class="btn findBusinessBtn m-2" @click.prevent="search" type="button" id="button-addon2">Find my Business</button>
                            </div>
                        </div>
                        <div class="col-lg-6 d-lg-block d-none">
                            <img :src="useAssets('assets/landing_page_header_img.svg')" alt="Img" class="img-fluid">
                        </div>
                    </div>
                </div>
            </header>

            <section class="comprehensiveSolutions py-5" id="scrollspyHeading1">
                <div class="container-fluid px-4 pt-sm-5 pt-0">
                    <div class="row mb-4 pt-sm-5 pt-4">
                        <div class="col-12 text-center">
                            <h2>Comprehensive Business Solutions</h2>
                        </div>

                        <div class="col-md-6 mx-auto col-12 text-center mb-3">
                            <p>Dive into eBiz Punjab's extensive resources and opportunities designed to elevate your business, from essential services to strategic investments.</p>
                        </div>

                        <div class="col-md-9 mx-auto col-12 text-center mb-3">
                            <ul class="comprehensiveSolutionsTabsList p-0 mb-0 d-flex flex-wrap list-unstyled gap-4 align-items-center justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link text-center" href="#scrollspyHeading1">
                                    <span class="d-block">
                                        <img :src="useAssets('assets/business-sector-icon.svg')" alt="Navbar Icons" class="img-fluid">
                                    </span> Business Advisory
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-center" href="#scrollspyHeading2">
                                    <span class="d-block">
                                        <img :src="useAssets('assets/business-entities-icon.svg')" alt="Navbar Icons" class="img-fluid">
                                    </span> Business Essentials
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-center" href="#scrollspyHeading3">
                                    <span class="d-block">
                                        <img :src="useAssets('assets/connectivity-icon.svg')" alt="Navbar Icons" class="img-fluid">
                                    </span> Connectivity
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-center" href="#scrollspyHeading4">
                                    <span class="d-block">
                                        <img :src="useAssets('assets/investments-icon.svg')" alt="Navbar Icons" class="img-fluid">
                                    </span> Investments
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                            <a href="#" class="text-decoration-none">
                                <div class="card">
                                    <img :src="useAssets('assets/agri-img.svg')" class="comprehensiveBusinessImg img-fluid" alt="Business Img">
                                    <div class="card-body py-4">
                                        <h6 class="card-title mb-0 py-2">Agriculture, forestry and fishing</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                            <a href="#" class="text-decoration-none">
                                <div class="card">
                                    <img :src="useAssets('assets/manufacture-img.svg')" class="comprehensiveBusinessImg img-fluid" alt="Business Img">
                                    <div class="card-body py-4">
                                        <h6 class="card-title mb-0 py-2">Manufacturing</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                            <a href="#" class="text-decoration-none">
                                <div class="card">
                                    <img :src="useAssets('assets/storage-img.svg')" class="comprehensiveBusinessImg img-fluid" alt="Business Img">
                                    <div class="card-body py-4">
                                        <h6 class="card-title mb-0 py-2">Transportation and Storage</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                            <a href="#" class="text-decoration-none">
                                <div class="card">
                                    <img :src="useAssets('assets/education-img.svg')" class="comprehensiveBusinessImg img-fluid" alt="Business Img">
                                    <div class="card-body py-4">
                                        <h6 class="card-title mb-0 py-2">Education</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                            <a href="#" class="text-decoration-none">
                                <div class="card">
                                    <img :src="useAssets('assets/mining-img.svg')" class="comprehensiveBusinessImg img-fluid" alt="Business Img">
                                    <div class="card-body py-4">
                                        <h6 class="card-title mb-0 py-2">Mining and quarrying</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                            <a href="#" class="text-decoration-none">
                                <div class="card">
                                    <img :src="useAssets('assets/construction-img.svg')" class="comprehensiveBusinessImg img-fluid" alt="Business Img">
                                    <div class="card-body py-4">
                                        <h6 class="card-title mb-0 py-2">Construction</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                            <a href="#" class="text-decoration-none">
                                <div class="card">
                                    <img :src="useAssets('assets/information-img.svg')" class="comprehensiveBusinessImg img-fluid" alt="Business Img">
                                    <div class="card-body py-4">
                                        <h6 class="card-title mb-0 py-2">Information & Communication</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                            <a href="#" class="text-decoration-none">
                                <div class="card">
                                    <img :src="useAssets('assets/otherActivities-img.svg')" class="comprehensiveBusinessImg img-fluid" alt="Business Img">
                                    <div class="card-body py-4">
                                        <h6 class="card-title mb-0 py-2">Other Service Activities</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 text-center mt-4">
                            <a href="#" class="py-2 px-3 viewAllBusinessSolutions d-inline-flex align-items-center justify-content-center text-decoration-none viewAllBtn">
                                <span>View All</span>
                                <span>
                                <img :src="useAssets('assets/viewAll-icon.svg')" alt="arrow Icon">
                            </span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="businessEssentials py-5" id="scrollspyHeading2">
                <div class="container-fluid px-4">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2>Business Essentials</h2>
                        </div>

                        <div class="col-md-6 mx-auto col-12 text-center mb-3">
                            <p>eBiz Punjab provides streamlined services, regulatory news, and exclusive government support.</p>
                        </div>
                    </div>
                </div>

                <div class="container px-5 pb-4">
                    <div class="row">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="card border-0 bg-transparent h-100">
                                <div class="card-body bg-transparent">
                                    <img :src="useAssets('assets/business-essential-card-img-1.svg')" alt="card img 1" class="img-fluid mb-4">
                                    <h4 class="mb-4">Apply for New / Renewal of Business Registration</h4>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-1"><a href="https://business.punjab.gov.pk/starting-business?qt-types_of_business_entities=0#qt-types_of_business_entities" target="_blank" class="text-decoration-none text-white">Sole Proprietorship</a></li>
                                        <li class="mb-1"><a href="https://business.punjab.gov.pk/starting-business?qt-types_of_business_entities=1#qt-types_of_business_entities" target="_blank" class="text-decoration-none text-white">Association of Persons (Firm)</a></li>
                                        <li class="mb-1"><a href="https://business.punjab.gov.pk/starting-business?qt-types_of_business_entities=2#qt-types_of_business_entities" target="_blank" class="text-decoration-none text-white">Single Member Company</a></li>
                                        <li class="mb-1"><a href="https://business.punjab.gov.pk/starting-business?qt-types_of_business_entities=3#qt-types_of_business_entities" target="_blank" class="text-decoration-none text-white">Private Limited Company</a></li>
                                        <li class="mb-1"> <a href="https://business.punjab.gov.pk/starting-business?qt-types_of_business_entities=4#qt-types_of_business_entities" target="_blank" class="text-decoration-none text-white">Public Limited Company</a></li>
                                        <li> Labour</li>
                                        <li> Pessi</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="card border-0 bg-transparent h-100">
                                <div class="card-body bg-transparent">
                                    <img :src="useAssets('assets/business-essential-card-img-2.svg')" alt="card img 1" class="img-fluid mb-4">
                                    <h4 class="mb-4">Required Registrations, Licenses, Certifications and other Permits <strong>(RLCOs)</strong></h4>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-1"><router-link class="text-decoration-none text-white" :to="{ name: 'services'}" >Explore RLCOs</router-link></li>
                                        <li class="mb-1"><a :href="apply_ebiz_url" class="text-decoration-none text-white">Apply RLCOs</a></li>
                                        <li class="mb-1"><a :href="apply_ebiz_url" class="text-decoration-none text-white">Track the Progress of Applied RLCOs</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="connectivityDiv py-5" id="scrollspyHeading3">
                <div class="container-fluid px-4">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2>Connectivity</h2>
                        </div>

                        <div class="col-md-6 mx-auto col-12 text-center">
                            <p class="mb-2">eBiz Punjab provides streamlined services, regulatory news, and exclusive government support.</p>
                        </div>

                        <div class="col-12 text-center">
                            <router-link :to="{ name:'connectivity' }" class="py-2 px-3 viewAllBusinessSolutions d-inline-flex align-items-center justify-content-center text-decoration-none viewAllBtn">
                                <span>View All</span>
                                <span>
                                <img :src="useAssets('assets/viewAll-icon.svg')" alt="arrow Icon">
                            </span>
                            </router-link>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                            <div class="card border-0 shadow-none h-100">
                                <div class="card-body">
                                    <img :src="useAssets('assets/piedmc-icon.png')" alt="piedmc Icon" class="img-fluid mb-4">
                                    <h6 class="mb-0 ps-4">Punjab Industrial Estates Development and Management Company (PIEDMC)</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                            <div class="card border-0 shadow-none h-100">
                                <div class="card-body">
                                    <img :src="useAssets('assets/fiedmc-icon.png')" alt="fiedmc Icon" class="img-fluid mb-4">
                                    <h6 class="mb-0 ps-4">Faisalabad Industrial Estates Development and Management Company (FIEDMC)</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                            <div class="card border-0 shadow-none h-100">
                                <div class="card-body">
                                    <img :src="useAssets('assets/lcci-icon.png')" alt="lcci Icon" class="img-fluid mb-4">
                                    <h6 class="mb-0 ps-4">Lahore Chamber of Commerce & Industry (LCCI)</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                            <div class="card border-0 shadow-none h-100">
                                <div class="card-body">
                                    <img :src="useAssets('assets/fpcci-icon.png')" alt="fpcci Icon" class="img-fluid mb-4">
                                    <h6 class="mb-0 ps-4"> Pakistan Chamber of Commerce and Industry (FPCCI)</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="investmentsDiv py-5" id="scrollspyHeading4">
                <div class="container-fluid px-4">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2>Investments</h2>
                        </div>

                        <div class="col-md-6 mx-auto col-12 text-center">
                            <p class="mb-2">Discover growth opportunities and attract the investment your business needs to scale it up.</p>
                        </div>

                        <div class="col-12 text-center">
                            <router-link :to="{ name:'investment' }" class="py-2 px-3 viewAllBusinessSolutions d-inline-flex align-items-center justify-content-center text-decoration-none viewAllBtn">
                                <span>View All</span>
                                <span>
                                <img :src="useAssets('assets/viewAll-icon.svg')" alt="arrow Icon">
                            </span>
                            </router-link>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mb-3">
                            <div class="card border-0 shadow-none">
                                <div class="card-body">
                                    <img :src="useAssets('assets/textile-icon.svg')" alt="textile Icon" class="img-fluid mb-3">
                                    <h6 class="mb-3">Textile</h6>
                                    <p class="mb-0 text-start">Pakistan is Asia's 8th largest textile exporter and the 4th largest cotton producer. Its textile sector, comprising 423 industries, makes up 46% of manufacturing and employs 40% of the workforce. Access to abundant raw
                                        materials like cotton and rayon benefits production costs and efficiency.</p>
                                    <a href="#" class="py-2 viewAllBusinessSolutions d-inline-flex align-items-center justify-content-center viewAllBtn">
                                        <span>Learn More</span>
                                        <span class="pe-2">
                                        <img :src="useAssets('assets/viewAll-icon.svg')" alt="arrow Icon">
                                    </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-sm-6 mb-3">
                            <img :src="useAssets('assets/investments-img-1.png')" alt="testile Img" class="img-fluid w-100 h-100 investments-img-1">
                        </div>

                        <div class="col-lg-8 col-sm-6 mb-3">
                            <img :src="useAssets('assets/investments-img-2.png')" alt="testile Img" class="img-fluid w-100 h-100 investments-img-2">
                        </div>

                        <div class="col-lg-4 col-sm-6 mb-3">
                            <div class="card border-0 shadow-none">
                                <div class="card-body">
                                    <img :src="useAssets('assets/logistics-icon.svg')" alt="Logistics Icon" class="img-fluid mb-3">
                                    <h6 class="mb-3">Logistics</h6>
                                    <p class="mb-0 text-start">Pakistan, with nearly 210 million people, is the sixth most populous country, growing at 2.4% annually. Transport contributes 22.3% to GDP and 6% to employment, supporting trade and a Gulf-based workforce, with increasing
                                        ties to Central Asia.</p>
                                    <a href="#" class="py-2 viewAllBusinessSolutions d-inline-flex align-items-center justify-content-center viewAllBtn">
                                        <span>Learn More</span>
                                        <span class="pe-2">
                                        <img :src="useAssets('assets/viewAll-icon.svg')" alt="arrow Icon">
                                    </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="newsDiv py-5">
                <div class="container-fluid px-4">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2>Discover News</h2>
                        </div>

                        <div class="col-md-6 mx-auto col-12 text-center">
                            <p class="mb-2">Find relevant, easy-to-read business articles to stay up-to-date on laws and regulations, useful resources, and government programs to help you start, run, and grow your business.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                            <div class="card">
                                <img :src="useAssets('assets/news-img-1.png')" class="card-img-top" alt="news Img">
                                <div class="card-body">
                                    <p class="card-text text-start">Education & Health are on Top of My Priority List: PM Mian Shahbaz Sharif</p>
                                    <h6>July 10, 2024</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                            <div class="card">
                                <img :src="useAssets('assets/news-img-2.png')" class="card-img-top" alt="news Img">
                                <div class="card-body">
                                    <p class="card-text text-start">Education & Health are on Top of My Priority List: PM Mian Shahbaz Sharif</p>
                                    <h6>July 10, 2024</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                            <div class="card">
                                <img :src="useAssets('assets/news-img-3.png')" class="card-img-top" alt="news Img">
                                <div class="card-body">
                                    <p class="card-text text-start">Education & Health are on Top of My Priority List: CM Maryam Nawaz Sharif</p>
                                    <h6>July 10, 2024</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-xl-0 mb-3">
                            <div class="card">
                                <img :src="useAssets('assets/news-img-4.png')" class="card-img-top" alt="news Img">
                                <div class="card-body">
                                    <p class="card-text text-start">Education & Health are on Top of My Priority List: CM Maryam Nawaz Sharif</p>
                                    <h6>July 10, 2024</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="faqsDiv py-5" id="scrollspyHeading5">
                <div class="container-fluid px-4">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2>Frequently Asked Questions</h2>
                        </div>

                        <div class="col-md-6 mx-auto col-12 text-center">
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
    </main>
</template>
