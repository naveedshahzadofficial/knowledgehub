<script>
import {useAssets} from "@/composable/use-assets";
export default {
    name: "ServicesPage",
    data() {
        return {
            activities: [],
            categories: [],
            sectors: [],
            departments: [],
            rlcos: [],
            business_category_id: "",
            business_activity_id:"",
            department_id:"",
            rlco_id:"",
            is_first_landing: true,
            is_first_time_variable: false,
            currentPage: 1,
            itemsPerPage: 12, // Define how many items per page
            searchTerm: '',
            noRlcoMessage: '',
        }
    },
    watch: {
        // Watch the searchedRlcos computed property
        filteredRlcos(newVal) {
            if (newVal.length > 0) {
                this.navigateToFirstSearchedRlco(newVal[0].id);
                this.scrollToRlcoPosition('pageStartServices');
            }
        }
    },
    methods: {
        useAssets,
        loadActivities: function () {
            axios.get('activities').then(response => {
                this.activities = response.data.activities;
                this.categories = response.data.categories;
                this.sectors = response.data.sectors;
                this.departments = response.data.departments;
                console.log(this.$route.params.id2);
                this.business_activity_id = parseInt(this.$route.params.id2) || '';
                    if(this.business_activity_id){
                        this.is_first_time_variable = true
                    }
                    if (this.activities.length > 0) {
                        let activity_id  = this.$route.params.id || 0;
                        this.getActivityRlcos(activity_id);
                    }else{
                        this.rlcos = [];
                    }
            })
        },
        getActivityRlcos: function (activity_id) {
            axios.post(`activity-rlcos/${activity_id}`, {}).then(response => {
                this.rlcos = response.data.rlcos;
                    if (this.rlcos.length > 0) {
                        const firstRlcoId = this.rlcos[0].id;

                        // Navigate to the service-detail route with the first RLCO ID
                        this.$router.push({
                            name: 'service-detail',
                            params: {rlco_id: firstRlcoId}
                        });
                    }
                // if(!this.is_first_landing || this.$route.params.id || this.$route.params.id2)
                //  this.scrollToRlco();
                // this.is_first_landing = false;
            })
        },
        scrollToRlco() {
            let refDiv = this.$refs.rlco_position;
            if (refDiv) {
                // Get the element's position relative to the document
                const elementPosition = refDiv.getBoundingClientRect().top + window.pageYOffset;
                // Calculate the scroll position with a -10% offset of the window's height
                const offset = window.innerHeight * 0.25; // 10% of the window height
                // Scroll to the element minus the offset
                window.scrollTo({
                    top: elementPosition - offset,
                    behavior: "smooth", // Enables smooth scrolling
                });
            }
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
            }
        },
        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
            }
        },
        navigateToFirstSearchedRlco(firstRlcoId) {
            // Navigate to the first RLCO's service detail
            this.$router.push({
                name: 'service-detail',
                params: { rlco_id: firstRlcoId }
            });
        },
        scrollToRlcoPosition(rlcoPosition) {
            this.$nextTick(() => {
                const element = document.getElementById(`${rlcoPosition}`);
                if (element) {
                    element.scrollIntoView({ behavior: 'smooth' });
                }
            });
        }
    },
    mounted() {
        this.loadActivities();

    },
    computed: {
        filteredBusinessActivities: function (){
            return this.sectors.filter(sector => {
                if(!this.is_first_time_variable)
                this.business_activity_id = '';
                if (!this.business_category_id) {
                    return true;
                }
                this.is_first_time_variable = false;
                return this.business_category_id ? sector.business_category_id === this.business_category_id : true;
            });
        },
        filteredCommonRlcos: function () {
            return this.rlcos.filter(rlco => {
                // Check if business_type_id or business_activity_id are empty, return all rlcos if so
                if (!this.business_activity_id && !this.department_id) {
                    return true;
                }
                // Filter based on business_type_id and business_activity_id
                const matchesBusinessActivity = this.business_activity_id
                    ? rlco.business_activities.some(activity => activity.id === this.business_activity_id)
                    : true;
                // const matchesBusinessActivity = this.business_activity_id ? rlco.business_activity_id === this.business_activity_id : true;
                // const matchesBusinessCategory = this.business_category_id ? rlco.business_category_id === this.business_category_id : true;
                const matchesBusinessDepartment = this.department_id ? rlco.department_id === this.department_id : true;
                return matchesBusinessActivity && matchesBusinessDepartment;
            });
        },
        filteredRlcos: function () {
            const filtered = this.filteredCommonRlcos.filter(rlco => {
                if (!this.rlco_id) {
                    return true;
                }
                return rlco.id === this.rlco_id;
            });
            // Update the message if no RLCO is found
            this.noRlcoMessage = filtered.length === 0 ? 'No RLCO Found' : '';
            return filtered;
        },
        searchedRlcos() {
            return this.filteredRlcos.filter(rlco => {
                if (!this.searchTerm) {
                    return true;
                }
                const term = this.searchTerm.toLowerCase();
                return rlco.rlco_name.toLowerCase().includes(term);
            });
        },
        totalPages() {
            return Math.ceil(this.filteredRlcos.length / this.itemsPerPage);
        },
        paginatedItems() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.filteredRlcos.slice(start, end);
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
.form-select {
    padding: 0.675rem 2.25rem .375rem .75rem;
}

.v-select >>> .vs__clear{
    display: none !important;
}
.v-select >>> .vs__actions{
    display: none !important;
}
.v-select >>> .vs__dropdown-menu {
    width: 500px !important;
}
.filterServicesDiv .v-select {
    border: 0.50px solid #c0c0d2;
    border-radius: 20px;
    height: 60px;
    font-weight: 400;
    font-size: 18px;
    color: #3a3a3a;
    background-color: #fff;
}
.service_sidebar {
    max-height: 250vh; /* Limits the height of the sidebar */
    overflow-y: auto; /* Enables vertical scrolling */
}
</style>
<template>
    <div class="servicesPageContent mb-5">
        <header class="servicesPageHeader py-5">
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-12">
                        <h1 class="mb-1">Services</h1>
                        <p class="mb-0">eBiz Punjab offers expert support to boost your business across various sectors.</p>
                    </div>
                </div>
            </div>
        </header>

        <div id="pageStartServices" class="lowerHeaderDiv px-4 d-flex align-items-center mb-5">
            <p class="mb-0">Select sectors from the drop-down list and utilize advanced filters to efficiently search for your desired industry.</p>
        </div>

        <div class="container-fluid px-4">
            <div class="row filterServicesDiv mb-3">
                <div class="col-md-5 mb-md-0 mb-3">
                    <label class="form-label">Sectors</label>
                    <v-select v-model="business_category_id" :options="categories"
                              :reduce="category => category.id" label="category_name"
                              placeholder="Sectors" class="vSelectClass form-select"
                    >
                    </v-select>
                </div>

                <div class="col-md-5 mb-md-0 mb-3">
                    <label class="form-label">Business</label>
                    <v-select v-model="business_activity_id" :options="filteredBusinessActivities"
                              :reduce="sector => sector.id" label="easy_class_name"
                              placeholder="Business Types" class="vSelectClass form-select" >
                    </v-select>
                </div>

                <div class="col-12 my-4">
                    <label class="form-label mb-0">Advance Filters</label>
                </div>

                <div class="col-12">
                    <div class="dotted-line mb-3"></div>
                </div>
            </div>

            <div class="row filterSerivcesDiv1 mb-4">
                <div class="col-lg-3 col-sm-4 mb-sm-0 mb-3">
                    <button class="d-flex align-items-center w-100 px-3">
                        <span class="me-2">
                            <img :src="useAssets('assets/owned-icon.svg')" alt="owned-icon" class="img-fluid">
                        </span>
                        <span>
                            Owned
                        </span>
                    </button>
                </div>

                <div class="col-lg-3 col-sm-4 mb-sm-0 mb-3">
                    <button class="d-flex align-items-center w-100 px-3">
                        <span class="me-2">
                            <img :src="useAssets('assets/rented-icon.svg')" alt="rented-icon" class="img-fluid">
                        </span>
                        <span>
                            Rented / Lease
                        </span>
                    </button>
                </div>

                <div class="col-lg-3 col-sm-4 mb-sm-0 mb-3">
                    <button class="d-flex align-items-center w-100 px-3">
                        <span class="me-2">
                            <img :src="useAssets('assets/allServices-icon.svg')" alt="allServices-icon" class="img-fluid">
                        </span>
                        <span>
                            All Services
                        </span>
                    </button>
                </div>
            </div>

            <div class="row servicesPageData mb-3" id="servicesPageData" ref="rlco_position">
                <div class="col-lg-3 mb-lg-0 mb-4">
                    <div class="card shadow-none">
                        <div class="card-header bg-transparent border-0 p-3 pb-0">
                            <h5 class="card-title mb-2">Services</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text border-0 bg-transparent" id="basic-addon1">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <input type="text" class="form-control border-0 bg-transparent" v-model="searchTerm" placeholder="Search Services" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="card-body px-0 service_sidebar" ref="service_sidebar">
                            <ul class="nav nav-tabs flex-lg-column border-0 flex-row" id="eBizServicesTab1" v-for="rlco in searchedRlcos" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <router-link :to="{ name: 'service-detail', params: { rlco_id: rlco.id }, hash: '#pageStartServices'}" class="nav-link px-2 py-3 w-100" aria-selected="true">
                                        <div class="d-flex align-items center justify-content-between">
                                            <div class="d-flex align-items-start">
                                                <img :src="useAssets('assets/searched-service-icon.svg')" alt="department Icon" class="img-fluid" width="50" height="50">
                                                <div class="searchedServiceData text-start ms-2">
                                                    <h6 class="mb-1">{{ rlco.rlco_name }}</h6>
                                                    <p class="mb-0 d-inline-block px-4 py-0">Provincial</p>
                                                </div>
                                            </div>
                                            <div>
                                                <img :src="useAssets('assets/viewAll-icon.svg')" alt="">
                                            </div>
                                        </div>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="card shadow-none mb-4">
                        <div class="card-body">
                            <div class="tab-content" id="eBizServicesTab1Content">
                                <div v-if="noRlcoMessage" class="mt-3">
                                    {{ noRlcoMessage }}
                                </div>
                                <div v-else>
                                    <router-view></router-view>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-none">
                        <div class="card-body px-2 pt-4 pb-2">
                            <div class="row mx-0 serviceCenterDiv">
                                <div class="col-12 mb-2">
                                    <h3>Visiting a service center</h3>
                                </div>

                                <div class="col-xl-4 col-md-6 mb-3">
                                    <button class="d-flex align-items-center justify-content-between px-3 py-2 w-100">
                                        <span>Book a Appointment</span>
                                        <span>
                                            <img :src="useAssets('assets/viewAll-icon.svg')" alt="viewAll-icon">
                                        </span>
                                    </button>
                                </div>

                                <div class="col-xl-4 col-md-6 mb-3">
                                    <button class="d-flex align-items-center justify-content-between px-3 py-2 w-100">
                                        <span>Change or Cancel Booking</span>
                                        <span>
                                            <img :src="useAssets('assets/viewAll-icon.svg')" alt="viewAll-icon">
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <div class="row mx-0 serviceCenterDiv">
                                <div class="col-xl-4 col-md-6 mb-3">
                                    <a href="https://bfc.punjab.gov.pk/" target="_blank" class="d-flex align-items-center justify-content-between px-3 py-2 w-100">
                                        <span>Find a Facilitation Center</span>
                                        <span>
                                            <img :src="useAssets('assets/viewAll-icon.svg')" alt="viewAll-icon">
                                        </span>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-md-6 mb-3">
                                    <a href="https://bfc.punjab.gov.pk/#our_locations" target="_blank" class="d-flex align-items-center justify-content-between px-3 py-2 w-100">
                                        <span>Our Location</span>
                                        <span>
                                            <img :src="useAssets('assets/viewAll-icon.svg')" alt="viewAll-icon">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

