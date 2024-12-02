<script setup>
import {computed, onMounted, reactive, ref} from "vue";
import {useRoute, useRouter} from "vue-router";
import {useAssets} from "@/composable/use-assets";
import {usePreLoaderStore} from "@/store/preloader";
import ErrorMessage from "../components/ErrorMessage.vue";
usePreLoaderStore().setIsShow(false);
window.setTimeout(() => {
    usePreLoaderStore().setIsShow(true);
}, 1000);

const router = useRouter();
const route = useRoute();

const businessActivityId = ref(route.params.id2 || '');
const bypass = ref(false);

const business_categories = ref([]);
const departments = ref([]);
const business_activities = ref([]);
const rlcos = ref([]);

const filteredRlcos = ref([]);
const filteredBusinessActivities = ref([]);

const constructionRlcos = ref([]);
const commonBasedRlcos = ref([]);

const searchForm = reactive({
    business_category_id: '',
    business_activity_id: businessActivityId.value,
    is_construction_required: '',
    construction_department_id: '',
    is_common_based_required: true
});
const errors = ref({});

const specificSearch = ref('');
const constructionSearch = ref('');
const commonBasedSearch = ref('');

const loadDefinitions = async () => {
    try {
        const resp = await axios.get('get_services');
        business_categories.value = resp.data.business_categories;
        departments.value = resp.data.departments.filter(dept => ![56, 45, 134, 198].includes(dept.id));
        business_activities.value = resp.data.business_activities;
        filteredBusinessActivities.value = business_activities.value;
        rlcos.value = resp.data.rlcos;
        if(businessActivityId.value) {
            bypass.value = true
            handleSearch();
        }

    }catch (err){
            console.log(err);
    }
}

onMounted(() => {
    loadDefinitions();
})

const handleSelectedBusinessCategory = () => {
    searchForm.business_activity_id = '';
    filteredBusinessActivities.value = business_activities.value.filter(businessActivity => searchForm.business_category_id===1 || businessActivity.business_category_id === searchForm.business_category_id);
}

const handleSearch = () => {
    errors.value = {};
    if(!searchForm.business_activity_id){
        errors.value.business_activity_id = ["Please select Business."];
        return false;
    }
    if(!searchForm.is_construction_required && !bypass.value){
        errors.value.is_construction_required = ["Please select construction required."];
        return false;
    }

    if(searchForm.is_construction_required == 1 && !searchForm.construction_department_id){
        errors.value.construction_department_id = ["Please select issuance authority."];
        return false;
    }

    filteredRlcos.value = rlcos.value.filter(rlco => rlco.business_activities?.some(activity => activity.id === parseInt(searchForm.business_activity_id))) || [];
    handleSearchConstructionRlcos();
    handleSearchCommonBasedRlcos();
    let rlco_id = '';
    if(filteredRlcos.value.length !==0 ){
        rlco_id = filteredRlcos.value[0].id;
    }
    else if(constructionRlcos.value.length !==0){
        rlco_id = constructionRlcos.value[0].id;
    }
    else if(commonBasedRlcos.value.length !==0){
        rlco_id = commonBasedRlcos.value[0].id;
    }
    if(rlco_id) {
        router.push({name: 'service-detail', params: {rlco_id: rlco_id}});
    }

    bypass.value = false;

}
const alwaysIncludeIds = [22, 23, 25, 123, 132, 134];
const handleSearchConstructionRlcos = () => {
    const filteredRlcosIds = filteredRlcos.value?.map(rlco => rlco.id) || [];
    constructionRlcos.value = rlcos.value
        .filter(rlco =>
            (!filteredRlcosIds.includes(rlco.id) && alwaysIncludeIds.includes(rlco.id) && parseInt(searchForm.is_construction_required || '0')) ||
            (
                rlco.construction_flag && parseInt(searchForm.is_construction_required || '0') &&
                !filteredRlcosIds.includes(rlco.id) && rlco.department_id && (!searchForm.construction_department_id || rlco.department_id === parseInt(searchForm.construction_department_id))
            )
        );
};
const handleSearchCommonBasedRlcos = () => {
    const filteredCommonRlcosIds = filteredRlcos.value?.map(rlco => rlco.id);
    commonBasedRlcos.value = rlcos.value
        .filter(rlco => !filteredCommonRlcosIds.includes(rlco.id) && rlco.common_flag && searchForm.is_common_based_required)
};


const searchSpecificRlcos= computed(() => {
    return filteredRlcos.value.filter(rlco => {
        if (!specificSearch.value) {
            return true;
        }
        const term = specificSearch.value.toLowerCase();
        return rlco.rlco_name.toLowerCase().includes(term);
    });
})

const searchConstructionRlcos= computed(() => {
    return constructionRlcos.value.filter(rlco => {
        if (!constructionSearch.value) {
            return true;
        }
        const term = constructionSearch.value.toLowerCase();
        return rlco.rlco_name.toLowerCase().includes(term);
    });
})

const searchCommonRlcos= computed(() => {
    return commonBasedRlcos.value.filter(rlco => {
        if (!commonBasedSearch.value) {
            return true;
        }
        const term = commonBasedSearch.value.toLowerCase();
        return rlco.rlco_name.toLowerCase().includes(term);
    });
})

</script>

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
                    <v-select v-model="searchForm.business_category_id" :options="business_categories"
                              :reduce="category => category.id" label="category_name"
                              @option:selected="handleSelectedBusinessCategory()"
                              placeholder="Sectors" class="vSelectClass form-select"
                    >
                    </v-select>
                    <ErrorMessage :error="errors.business_category_id" />
                </div>

                <div class="col-lg-6 mb-4">
                    <label class="form-label">Business</label>
                    <v-select v-model="searchForm.business_activity_id" :options="filteredBusinessActivities"
                              :reduce="sector => String(sector.id)" label="easy_class_name"
                              placeholder="Search your business" class="vSelectClass form-select" >
                    </v-select>
                    <ErrorMessage :error="errors.business_activity_id" />
                </div>

                <div class="col-lg-6 mb-lg-0 mb-4">
                    <label class="form-label d-block">Does your business require new construction or development?</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="constructionYes">
                                <input class="form-check-input" name="is_construction_required" type="radio" v-model="searchForm.is_construction_required"
                                       id="constructionYes" value="1">
                                <span>Yes</span></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="constructionNo">
                                <input class="form-check-input" name="is_construction_required" type="radio" v-model="searchForm.is_construction_required"
                                       id="constructionNo" value="0">
                                <span>No</span></label>
                        </div>
                    </div>
                    <ErrorMessage :error="errors.is_construction_required" />
                </div>

                <div class="col-lg-4 mb-lg-0 mb-4" v-if="searchForm.is_construction_required == 1">
                    <label class="form-label">Issuance Authority</label>
                    <v-select v-model="searchForm.construction_department_id" :options="departments"
                              :reduce="dept => dept.id" label="department_name"
                              placeholder="Issuance Authority" class="vSelectClass form-select" >
                    </v-select>
                    <ErrorMessage :error="errors.construction_department_id" />

                </div>

                <div :class="searchForm.is_construction_required == 1?'col-lg-2':'col-lg-6'" class="d-flex justify-content-between parent-div align-items-end">
                    <div class="searchServiceBtn d-flex align-items-center justify-content-center">
                        <button class="bg-transparent border-0" @click.prevent="handleSearch">
                            <img :src="useAssets('assets/search-icon.svg')" alt="">
                        </button>
                    </div>

                </div>
            </div>

            <div class="row mb-4 filterServicesDiv3">
                <div class="col-xl-4 col-lg-6 mb-xl-0 mb-3" v-if="filteredRlcos.length > 0">
                    <div class="card shadow-none">
                        <div class="card-body d-flex align-items-center p-2">
                            <div class="d-inline-flex align-items-center justify-content-center me-3">
                                <img :src="useAssets('assets/business-icon.svg')" alt="" class="img-fluid">
                            </div>
                            <div>
                                <p class="mb-2">Business Specific</p>
                                <h6 class="mb-0">{{ filteredRlcos.length }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 mb-xl-0 mb-3" v-if="constructionRlcos.length > 0">
                    <div class="card shadow-none">
                        <div class="card-body d-flex align-items-center p-2">
                            <div class="d-inline-flex align-items-center justify-content-center me-3">
                                <img :src="useAssets('assets/construction-icon.svg')" alt="" class="img-fluid">
                            </div>
                            <div>
                                <p class="mb-2">Construction</p>
                                <h6 class="mb-0">{{ constructionRlcos.length }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6" v-if="commonBasedRlcos.length > 0">
                    <div class="card shadow-none">
                        <div class="card-body d-flex align-items-center p-2">
                            <div class="d-inline-flex align-items-center justify-content-center me-3">
                                <img :src="useAssets('assets/add-on-icon.svg')" alt="" class="img-fluid">
                            </div>
                            <div>
                                <p class="mb-2">Add On (s)</p>
                                <h6 class="mb-0">{{ commonBasedRlcos.length }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row servicesPageData mb-3" id="servicesPageData" ref="rlco_position">
                <div class="col-lg-5 mb-3">
                    <div class="card shadow-none" v-if="filteredRlcos.length > 0 && searchForm.business_activity_id">
                        <div class="card-header bg-transparent border-0 p-3 pb-0">
                            <h5 class="card-title mb-2">Business Specific</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text border-0 bg-transparent" id="basic-addon1">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <input type="text" class="form-control border-0 bg-transparent" v-model="specificSearch" placeholder="Search Services" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="card-body px-0 service_sidebar" ref="service_sidebar">
                            <ul class="nav nav-tabs flex-lg-column border-0 flex-row" id="eBizServicesTab1" v-for="rlco in searchSpecificRlcos" role="tablist" :key="rlco.id">
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
                    <div class="card shadow-none" v-if="constructionRlcos.length" style="margin-top: 20px !important;">
                        <div class="card-header bg-transparent border-0 p-3 pb-0 pt-20">
                            <h5 class="card-title mb-2">Construction Required Services</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text border-0 bg-transparent" id="basic-addon1">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <input type="text" class="form-control border-0 bg-transparent" v-model="constructionSearch" placeholder="Search Construction Required Services" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="card-body px-0 service_sidebar" ref="service_sidebar">
                            <ul class="nav nav-tabs flex-lg-column border-0 flex-row" id="eBizServicesTab2" v-for="rlco in searchConstructionRlcos" role="tablist" :key="rlco.id">
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
                    <div class="card shadow-none" v-if="commonBasedRlcos.length" style="margin-top: 20px !important;">
                        <div class="card-header bg-transparent border-0 p-3 pb-0 pt-20">
                            <h5 class="card-title mb-2">Add on (s)</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text border-0 bg-transparent" id="basic-addon1">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <input type="text" class="form-control border-0 bg-transparent" v-model="commonBasedSearch" placeholder="Search Add on" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="card-body px-0 service_sidebar" ref="service_sidebar">
                            <ul class="nav nav-tabs flex-lg-column border-0 flex-row" id="eBizServicesTab3" v-for="rlco in searchCommonRlcos" role="tablist" :key="rlco.id">
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

                <div class="col-lg-7 mb-3" v-if="searchSpecificRlcos.length || constructionRlcos.length || commonBasedRlcos.length">
                    <div class="card shadow-none mb-4">
                        <div class="card-body">
                            <div class="tab-content" id="eBizServicesTab1Content">
                                <div v-if="searchSpecificRlcos.length===0 && searchConstructionRlcos.length===0 && searchCommonRlcos.length===0" class="mt-3">
                                    No RLCO Found.
                                </div>
                                <div v-else>
                                    <router-view></router-view>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</template>

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
