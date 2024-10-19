<script>
import {useAssets} from "@/composable/use-assets";
export default {
    name: "HomePage",
    data() {
        return {
            activities: [],
            sectors: [],
            business_activity_id:''
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
        }
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
        <div class="heroSectionBG">
            <!-- Hero Section -->
            <section class="text-white heroSection">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1>Your <span class="highlight">gateway</span> to seamless business solutions</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="lead">Empowering businesses with efficient, transparent, and accessible services. Discover, apply, and manage all your business needs in one place.</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group ">
                                <i class="fa-solid fa-magnifying-glass "></i>
                                <v-select v-model="business_activity_id" :options="sectors"
                                          :reduce="sector => sector.id" label="easy_class_name"
                                          placeholder="Search Business Type Name" class="w-auto form-control">
                                </v-select>
<!--                                <input type="text" class="form-control" placeholder="Search by Business type, Sector, RLCOs" aria-label="Search by Business type, Sector, RLCOs">-->
                                <button class="btn btn-primary" type="button" @click.prevent="search">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Info Section -->
            <section class="info-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="info-box">
                                <img :src="useAssets('business.svg')" alt="Business Essentials">
                                <h5>Business Essentials</h5>
                                <p>eBiz Punjab is the ultimate resource for streamlined services, the latest regulatory news, and
                                    exclusive access to ad-hoc government support programs that businesses often miss out
                                    on.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box">
                                <img :src="useAssets('connect.svg')" alt="Business Sector">
                                <h5>Business Sector</h5>
                                <p>Unlock the power of collaboration and forge meaningful connections in Punjab's business
                                    network. eBiz Punjab facilitates partnerships, knowledge sharing, & growth opportunities,
                                    empowering businesses to expand reach, learn from industry experts.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box">
                                <img :src="useAssets('service-icon.svg')" alt="Services">
                                <h5>Services</h5>
                                <p>Join a thriving community of diverse businesses, where innovation and support go hand in
                                    hand. Engage in thought-provoking discussions, seek advice from seasoned professionals,
                                    and contribute to the collective knowledge base.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box">
                                <img :src="useAssets('investment.svg')" alt="Investments">
                                <h5>Investments</h5>
                                <p>Discover growth opportunities and attract the investment your business needs to scale new
                                    heights. eBiz Punjab's investment section connects businesses with a diverse range of funding
                                    sources enabling access to the capital required to fuel expansion and success.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Increase Productivity Section -->
            <section class="productivity">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h6 class="text-uppercase">increase productivity</h6>
                            <h2 class="fw-bold text-uppercase">Reduce Time in Doing Manual Work</h2>
                            <h2 class="fw-bold text-uppercase">Acquiring Documents For Your
                                Business</h2>
                            <div class="d-flex productivityTabs">
                                <ul>
                                    <li class="tabActive">
                                        <a target="_blank" href="https://apply-ebiz.punjab.gov.pk">With eBiz Portal</a>
                                    </li>
                                    <!-- <li>
                                        <a href="#">Without eBiz Punjab</a>
                                    </li> -->
                                </ul>
                            </div>
                            <h5>Track Business Services until their delivery</h5>
                            <ul class="list-unstyled text-start d-inline-block businessPoint">
                                <li class="mb-3"><i class="fa-solid fa-circle-check"></i> Apply for RLCOs</li>
                                <li class="mb-3"><i class="fa-solid fa-circle-check"></i> Manage your RLCOs</li>
                                <li><i class="fa-solid fa-circle-check"></i> Track the progress of transactions and applications</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5 exploreService">
                        <h2>Explore Services by Topic</h2>
                        <p>Guides to help you get your business needs met.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3" >
                    <router-link :to="{ name: 'services', params : {'id':0, 'id2':0 }}" class="text-decoration-none">
                        <div class="options-card">
                            <div class="card-body p-4">
                                <div class="icon-card">
                                    <img :src="useAssets('activity-icon.svg')" alt="">
                                    <h5 class="card-title text-black mt-1" style="color: black !important; text-decoration: none !important;">All Services</h5>
                                </div>

                                <div class="mt-3">
                                <span class="arrow-icon">
                                    <img :src="useAssets('arrow.svg')" alt="">
                                </span>
                                </div>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="col-md-4 mb-3" v-for="(activity, index) in activities">
                    <router-link :to="{ name: 'services', params : {'id':activity.id }}" class="text-decoration-none">
                        <div class="options-card">
                        <div class="card-body p-4">
                            <div class="icon-card">
                                <img :src="activity.activity_icon_url" alt="">
                                <h5 class="card-title text-black mt-1" style="color: black !important; text-decoration: none !important;">{{ activity.activity_name }}</h5>
                            </div>

                            <div class="mt-3">
                                <span class="arrow-icon">
                                    <img :src="useAssets('arrow.svg')" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                    </router-link>
                </div>
            </div>
        </section>

        <section class="container mt-5">
            <!-- Discover News Section -->
            <div class="mb-5 border-bottom-heading">
                <h2>Discover News</h2>
                <p>Find relevant, easy-to-read business articles to stay up-to-date on laws and regulations, useful
                    resources,
                    and government programs to help you start, run, and grow your business.</p>
            </div>
            <div class="row mb-5">
                <div class="col-md-4 mb-3">
                    <div class="p-3 news-card">
                        <div>
                            <h6>Education & Health are on Top of My Priority List: CM Maryam Nawaz Sharif</h6>
                            <p class="small-text">20/08/24</p>
                        </div>
                        <div>
                            <a href="#">Read more</a>
                            <a href="#" class="icon">
                                <img :src="useAssets('arrow.svg')" alt="">
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="p-3 news-card">
                        <div>
                            <h6>Promoting Enabling Environment for Digital Innovation & Investment is Among My Top
                                Priorities:
                                CM Maryam Nawaz Sharif</h6>
                            <p class="small-text">11/07/24</p>
                        </div>
                        <div>
                            <a href="#">Read more</a>
                            <a href="#" class="icon">
                                <img :src="useAssets('arrow.svg')" alt="">
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="p-3 news-card">
                        <div>
                            <h6>CM Maryam Nawaz Sharif Approves Punjab's First-Ever Livestock Card & Farmers' Guidance
                                App
                            </h6>
                            <p class="small-text">08/06/24</p>
                        </div>
                        <div>
                            <a href="#">Read more</a>
                            <a href="#" class="icon">
                                <img :src="useAssets('arrow.svg')" alt="">
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Support Community Section -->
            <div class="mb-5 border-bottom-heading">
                <h2>Support Community</h2>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="community-card">
                        <div class="d-flex align-items-center mb-2 gap-2">
                            <div class="rounded-circle">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Sample Name</h6>
                                <p class="small-text">15 days ago</p>
                            </div>
                        </div>
                        <h5>Starting a business</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consequat aliquet maecenas ut sit
                            nulla.
                        </p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex gap-2">
                                <div class="bottom-tag-design"><a href="#">Lorem</a></div>
                                <div class="bottom-tag-design"><a href="#">Lorem</a></div>
                            </div>
                            <div class="community-icons">
                                <span>
                                    <i class="fa-regular fa-eye"></i>
                                    125</span>
                                <span>
                                    <i class="fa-regular fa-flag"></i>
                                     15</span>
                                <span>
                                    <i class="fa-solid fa-arrow-up"></i>
                                     155</span>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="community-card">
                        <div class="d-flex align-items-center mb-2 gap-2">
                            <div class="rounded-circle">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Sample Name</h6>
                                <p class="small-text">1 month ago</p>
                            </div>
                        </div>
                        <h5>I have a restaurant but I can't figure out how to get this license! Help!</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Bibendum vitae etiam lectus amet
                            enim.
                        </p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex gap-2">
                                <div class="bottom-tag-design"><a href="#">Lorem</a></div>
                                <div class="bottom-tag-design"><a href="#">Lorem</a></div>
                            </div>
                            <div class="community-icons">
                                <span>
                                    <i class="fa-regular fa-eye"></i>
                                    125</span>
                                <span>
                                    <i class="fa-regular fa-flag"></i>
                                     15</span>
                                <span>
                                    <i class="fa-solid fa-arrow-up"></i>
                                    155</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
