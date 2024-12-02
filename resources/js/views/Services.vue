<script>
import {useAssets} from "@/composable/use-assets";
import {usePreLoaderStore} from "../store/preloader";
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
            construction_flag: 0,
            searchTermConstruction: '',
            construction_required: '',
            construction_required_tile: 0,
            construction_required_flag: 0,
            construction_required_department_flag: 0,
            construction_department_id: '',
            common_flag: '',
            searchTermCommon: '',
        }
    },
    watch: {
        // Watch the searchedRlcos computed property
        checkWhichFunctionRlcoLoad(newVal) {
            if (newVal.length > 0) {
                this.navigateToFirstSearchedRlco(newVal[0].id);
                this.scrollToRlcoPosition('pageStartServices');
            }
        },
        construction_required(newVal){
            if(newVal === '0'){
                this.construction_department_id = '';
                this.construction_required_tile = 0;
            }
            this.construction_required_flag = 0;
        },
        construction_department_id(newVal){
            this.construction_required_department_flag = 0;
        }
    },
    methods: {
        useAssets,
        resetBusiness: function (){
            this.business_activity_id = '';
        },
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
            const filtered = this.filteredCommonRlcos().filter(rlco => {
                if (!this.rlco_id) {
                    return true;
                }
                return rlco.id === this.rlco_id;
            });
            // Update the message if no RLCO is found
            return filtered;
        },
        filteredCommonRequiredRlcos: function () {
            const filteredRlcosIds = this.filteredRlcos().map(rlco => rlco.id);
            return this.rlcos
                .filter(rlco => rlco.common_flag === 1)
                .filter(rlco => !filteredRlcosIds.includes(rlco.id));
        },
        searchedCommonRequiredRlcos() {
            return this.filteredCommonRequiredRlcos().filter(rlco => {
                if (!this.searchTermCommon) {
                    return true;
                }
                const term = this.searchTermCommon.toLowerCase();
                return rlco.rlco_name.toLowerCase().includes(term);
            });
        },
        checkWhichFunctionRlcoLoad(){
            if (this.filteredRlcos().length > 0) {
                return this.filteredRlcos();
            }
            if (this.filteredConstructionRlcos.length > 0) {
                return this.filteredConstructionRlcos;
            }
            if (this.filteredCommonRequiredRlcos().length > 0) {
                return this.filteredCommonRequiredRlcos();
            }
            return null;
        },
        filteredDepartments: function () {
            // Filter rlcos with construction_flag === 1
            const rlcosWithConstructionFlag = this.rlcos.filter(rlco => rlco.construction_flag === 1);

            // Extract the foreign keys (department IDs) from the filtered rlcos
            const departmentIdsWithRlcos = rlcosWithConstructionFlag
                .filter(rlco => rlco.department_id && ![56, 45, 134, 198].includes(rlco.department_id))
                .map(rlco => rlco.department_id);
            // Filter departments that have at least one matching department ID
            return this.departments.filter(department => departmentIdsWithRlcos.includes(department.id));
        },
        searchedRlcos() {
            return this.filteredRlcos().filter(rlco => {
                if (!this.searchTerm) {
                    return true;
                }
                const term = this.searchTerm.toLowerCase();
                return rlco.rlco_name.toLowerCase().includes(term);
            });
        },
        searchedConstructionRlcos() {
            return this.filteredConstructionRlcos().filter(rlco => {
                if (!this.searchTermConstruction) {
                    return true;
                }
                const term = this.searchTermConstruction.toLowerCase();
                return rlco.rlco_name.toLowerCase().includes(term);
            });
        },
        filteredConstructionRlcos: function () {
            const filteredRlcosIds = this.filteredRlcos().map(rlco => rlco.id);
            return this.rlcos.filter(rlco => {
                // Always include rlcos with these IDs
                const alwaysIncludeIds = [22, 23, 25, 123, 132, 134];
                if (alwaysIncludeIds.includes(rlco.id)) {
                    return true;
                }
                return (
                    rlco.construction_flag === 1 &&
                    !filteredRlcosIds.includes(rlco.id) &&
                    rlco.department_id &&
                    (!this.construction_department_id || rlco.department_id === this.construction_department_id)
                );
            });
        },
        checkRlcosFound: function (){
            return (this.construction_required === '0' || this.construction_required === '' || this.filteredConstructionRlcos().length === 0) && this.filteredRlcos().length === 0 && (this.filteredCommonRequiredRlcos().length === 0 ) ? 'No RLCO Found' : '';
        },
        handleSearch() {
            if(this.construction_required === ''){
                this.construction_required_flag = 1;
                return false;
            }
            if(this.construction_department_id === ''){
                this.construction_required_department_flag = 1;
                return false;
            }
            this.construction_required_tile = 1;
            this.searchedRlcos();
            this.searchedConstructionRlcos();
            this.searchedCommonRequiredRlcos();
        }
    },
    created() {
        usePreLoaderStore().setIsShow(false);
        window.setTimeout(() => {
            usePreLoaderStore().setIsShow(true);
        }, 1000);
    },
    mounted() {
        this.loadActivities();
    },
    computed: {
        filteredBusinessActivities: function (){
            return this.sectors.filter(sector => {
                if (!this.business_category_id || this.business_category_id===1) {
                    return true;
                }
                return this.business_category_id ? sector.business_category_id === this.business_category_id : true;
            });
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
    max-height: 214vh; /* Limits the height of the sidebar */
    overflow-y: auto; /* Enables vertical scrolling */
}
</style>
<template>
    <div class="servicesPageContent mb-5">
        <header class="servicesPageHeader pb-5">
            <div class="container-fluid px-md-5 px-4">
                <div class="row">
                    <div class="col-12">
                        <h1 class="mb-1">Services</h1>
                        <p id="pageStartServices" class="mb-0">Explore and search your business’ regulatory Registration, Licenses, Certificate and Other Permits</p>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-fluid px-md-5 px-4">
            <div class="row filterServicesDiv filterServicesDiv2 mx-0 mb-4 px-2 pt-3 pb-4 align-items-end">
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Sectors</label>
                    <v-select v-model="business_category_id" :options="categories"
                              :reduce="category => category.id" label="category_name"
                              @option:selected="resetBusiness()"
                              placeholder="Sectors" class="vSelectClass form-select"
                    >
                    </v-select>
                </div>

                <div class="col-lg-6 mb-4">
                    <label class="form-label">Business</label>
                    <v-select v-model="business_activity_id" :options="filteredBusinessActivities"
                              :reduce="sector => sector.id" label="easy_class_name"
                              placeholder="Search your business" class="vSelectClass form-select" >
                    </v-select>
                </div>

                <div class="col-lg-6 mb-lg-0 mb-4">
                    <label class="form-label d-block">Does your business require new construction or development?</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="constructionYes">
                                <input class="form-check-input" type="radio" v-model="construction_required"
                                       id="constructionYes" value="1">
                                <span>Yes</span></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="constructionNo">
                                <input class="form-check-input" type="radio" v-model="construction_required"
                                       id="constructionNo" value="0">
                                <span>No</span></label>
                        </div>
                    </div>
                    <div class="text-danger" v-if="construction_required_flag === 1">Please select construction required</div>
                </div>

                <div class="col-lg-4 mb-lg-0 mb-4" v-if="construction_required == 1">
                    <label class="form-label">Issuance Authority</label>
                    <v-select v-model="construction_department_id" :options="filteredDepartments()"
                              :reduce="sector => sector.id" label="department_name"
                              placeholder="Issuance Authority" class="vSelectClass form-select" >
                    </v-select>
                    <div class="text-danger" v-if="construction_required_department_flag === 1">Please select construction required</div>

                </div>

                <div :class="construction_required == 1?'col-lg-2':'col-lg-6'" class="d-flex justify-content-between parent-div align-items-end">
                    <div class="searchServiceBtn d-flex align-items-center justify-content-center">
                        <button class="bg-transparent border-0" @click.prevent="handleSearch">
                            <img :src="useAssets('assets/search-icon.svg')" alt="">
                        </button>
                    </div>

                </div>
            </div>

            <div class="row mb-4 filterServicesDiv3">
                <div class="col-xl-4 col-lg-6 mb-xl-0 mb-3" v-if="searchedRlcos().length > 0">
                    <div class="card shadow-none">
                        <div class="card-body d-flex align-items-center p-2">
                            <div class="d-inline-flex align-items-center justify-content-center me-3">
                                <img :src="useAssets('assets/business-icon.svg')" alt="" class="img-fluid">
                            </div>
                            <div>
                                <p class="mb-2">Business Specific</p>
                                <h6 class="mb-0">{{ searchedRlcos().length }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 mb-xl-0 mb-3" v-if="construction_required_tile === 1">
                    <div class="card shadow-none">
                        <div class="card-body d-flex align-items-center p-2">
                            <div class="d-inline-flex align-items-center justify-content-center me-3">
                                <img :src="useAssets('assets/construction-icon.svg')" alt="" class="img-fluid">
                            </div>
                            <div>
                                <p class="mb-2">Construction</p>
                                <h6 class="mb-0">{{ searchedConstructionRlcos().length }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="card shadow-none">
                        <div class="card-body d-flex align-items-center p-2">
                            <div class="d-inline-flex align-items-center justify-content-center me-3">
                                <img :src="useAssets('assets/add-on-icon.svg')" alt="" class="img-fluid">
                            </div>
                            <div>
                                <p class="mb-2">Add On (s)</p>
                                <h6 class="mb-0">{{ searchedCommonRequiredRlcos().length }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row servicesPageData mb-3" id="servicesPageData" ref="rlco_position">
                <div class="col-lg-5 mb-3">
                    <div class="card shadow-none" v-if="searchedRlcos().length > 0">
                        <div class="card-header bg-transparent border-0 p-3 pb-0">
                            <h5 class="card-title mb-2">Business Specific</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text border-0 bg-transparent" id="basic-addon1">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <input type="text" class="form-control border-0 bg-transparent" v-model="searchTerm" placeholder="Search Services" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="card-body px-0 service_sidebar" ref="service_sidebar">
                            <ul class="nav nav-tabs flex-lg-column border-0 flex-row" id="eBizServicesTab1" v-for="rlco in searchedRlcos()" role="tablist" :key="rlco.id">
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
                    <div class="clearfix"></div>
                    <div class="card shadow-none" v-if="construction_required_tile == 1" style="margin-top: 20px !important;">
                        <div class="card-header bg-transparent border-0 p-3 pb-0 pt-20">
                            <h5 class="card-title mb-2">Construction Required Services</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text border-0 bg-transparent" id="basic-addon1">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <input type="text" class="form-control border-0 bg-transparent" v-model="searchTermConstruction" placeholder="Search Construction Required Services" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="card-body px-0 service_sidebar" ref="service_sidebar">
                            <ul class="nav nav-tabs flex-lg-column border-0 flex-row" id="eBizServicesTab2" v-for="rlco in searchedConstructionRlcos()" role="tablist" :key="rlco.id">
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
                    <div class="card shadow-none" style="margin-top: 20px !important;">
                        <div class="card-header bg-transparent border-0 p-3 pb-0 pt-20">
                            <h5 class="card-title mb-2">Add on (s)</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text border-0 bg-transparent" id="basic-addon1">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <input type="text" class="form-control border-0 bg-transparent" v-model="searchTermCommon" placeholder="Search Add on" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="card-body px-0 service_sidebar" ref="service_sidebar">
                            <ul class="nav nav-tabs flex-lg-column border-0 flex-row" id="eBizServicesTab3" v-for="rlco in searchedCommonRequiredRlcos()" role="tablist" :key="rlco.id">
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

                <div class="col-lg-7 mb-3">
                    <div class="card shadow-none mb-4">
                        <div class="card-body">
                            <div class="tab-content" id="eBizServicesTab1Content">
                                <div v-if="checkRlcosFound()" class="mt-3">
                                    {{ checkRlcosFound() }}
                                </div>
                                <div v-else>
                                    <router-view></router-view>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-none">
                    <div class="card shadow-none rounded-5">
                        <div class="card-body px-2 pt-4 pb-2">
                            <div class="row mx-0 serviceCenterDiv">
                                <div class="col-12 mb-2">
                                    <h3>Visiting a service center</h3>
                                </div>

                                <div class="col-xxl-3 col-md-6 mb-3">
                                    <button class="d-flex align-items-center justify-content-between px-3 py-2 w-100">
                                        <span>Book a Appointment</span>
                                        <span>
                                            <img :src="useAssets('assets/viewAll-icon.svg')" alt="viewAll-icon">
                                        </span>
                                    </button>
                                </div>

                                <div class="col-xxl-3 col-md-6 mb-3">
                                    <button class="d-flex align-items-center justify-content-between px-3 py-2 w-100">
                                        <span>Change or Cancel Booking</span>
                                        <span>
                                            <img :src="useAssets('assets/viewAll-icon.svg')" alt="viewAll-icon">
                                        </span>
                                    </button>
                                </div>

                                <div class="col-xxl-3 col-md-6 mb-3">
                                    <button class="d-flex align-items-center justify-content-between px-3 py-2 w-100">
                                        <span>Find a Facilitation Center</span>
                                        <span>
                                            <img :src="useAssets('assets/viewAll-icon.svg')" alt="viewAll-icon">
                                        </span>
                                    </button>
                                </div>

                                <div class="col-xxl-3 col-md-6 mb-3">
                                    <button class="d-flex align-items-center justify-content-between px-3 py-2 w-100">
                                        <span>Our Location</span>
                                        <span>
                                            <img :src="useAssets('assets/viewAll-icon.svg')" alt="viewAll-icon">
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

