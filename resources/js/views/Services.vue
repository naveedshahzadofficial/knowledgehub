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
const filteredBusinessActivities = ref([]);

const businessSpecificRlcos = ref([]);
const constructionRlcos = ref([]);
const addOnRlcos = ref([]);


const tabs = computed(() => [
    {
        id: "business-specific",
        label: "Business Specific",
        icon: "assets/business-specific-icon.svg",
        items: businessSpecificRlcos.value,
    },
    {
        id: "construction-tab",
        label: "Construction",
        icon: "assets/construction-icon1.svg",
        items: constructionRlcos.value,
    },
    {
        id: "addon-tab",
        label: "Add On(s)",
        icon: "assets/add-on-icon1.svg",
        items: addOnRlcos.value,
    },
]);
const activeTab = ref(0);
const setActiveTab = (index, tabId) => {
    activeTab.value = index;
    let rlco_id = '';
    switch (tabId) {
        case 'business-specific':
            if(businessSpecificRlcos.value.length !==0 ){
                rlco_id = businessSpecificRlcos.value[0].id;
            }
            break;
        case 'construction-tab':
            if(constructionRlcos.value.length !==0){
                rlco_id = constructionRlcos.value[0].id;
            }
            break;
        case 'addon-tab':
            if(addOnRlcos.value.length !==0){
                rlco_id = addOnRlcos.value[0].id;
            }
            break;
    }
    console.log(rlco_id);
    if(rlco_id) {
        router.push({name: 'service-detail', params: {rlco_id: rlco_id}});
    }
};
const updateActiveTab = () => {
    let rlco_id = '';
    if (businessSpecificRlcos.value.length !== 0) {
        rlco_id = businessSpecificRlcos.value[0].id;
        activeTab.value = 0; // Set to Business Specific tab
    } else if (constructionRlcos.value.length !== 0) {
        rlco_id = constructionRlcos.value[0].id;
        activeTab.value = 1; // Set to Construction tab
    } else if (addOnRlcos.value.length !== 0) {
        rlco_id = addOnRlcos.value[0].id;
        activeTab.value = 2; // Set to Add On(s) tab
    } else {
        activeTab.value = 0; // Default to first tab if no data
    }

    if (rlco_id) {
        router.push({ name: 'service-detail', params: { rlco_id: rlco_id } });
    }
};




const searchForm = reactive({
    business_category_id: '',
    business_activity_id: businessActivityId.value,
    construction_department_id: ''
});
const errors = ref({});

const businessSpecificSearch = ref('');
const constructionSearch = ref('');
const addOnSearch = ref('');

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
    searchForm.construction_department_id = '';
    // filteredBusinessActivities.value = business_activities.value.filter(businessActivity => searchForm.business_category_id===1 || businessActivity.business_category_id === searchForm.business_category_id);
    if (!searchForm.business_category_id) {
        // If deselected, reset `filteredBusinessActivities` to include all activities
        filteredBusinessActivities.value = business_activities.value;
    } else {
        // Filter based on the selected business category
        filteredBusinessActivities.value = business_activities.value.filter(
            (businessActivity) =>
                searchForm.business_category_id===1 ||
                businessActivity.business_category_id === searchForm.business_category_id
        );
    }
}


const handleSearch = () => {
    errors.value = {};
    if(!searchForm.business_activity_id){
        errors.value.business_activity_id = ["Please select Business."];
        return false;
    }

    businessSpecificRlcos.value = rlcos.value.filter(rlco => rlco.business_activities?.some(activity => activity.id === parseInt(searchForm.business_activity_id))) || [];
    handleSearchConstructionRlcos();
    handleSearchCommonBasedRlcos();
    let rlco_id = '';
    if(businessSpecificRlcos.value.length !==0 ){
        rlco_id = businessSpecificRlcos.value[0].id;
    }
    else if(constructionRlcos.value.length !==0){
        rlco_id = constructionRlcos.value[0].id;
    }
    else if(addOnRlcos.value.length !==0){
        rlco_id = addOnRlcos.value[0].id;
    }
    if(rlco_id) {
        router.push({name: 'service-detail', params: {rlco_id: rlco_id}});
    }

    bypass.value = false;

}

const alwaysIncludeIds = [22, 23, 25, 123, 132, 134];
const handleSearchConstructionRlcos = () => {
    const businessSpecificRlcosIds = businessSpecificRlcos.value?.map(rlco => rlco.id) || [];
    constructionRlcos.value = rlcos.value
        .filter(rlco =>
            (!businessSpecificRlcosIds.includes(rlco.id) && alwaysIncludeIds.includes(rlco.id) && searchForm.construction_department_id) ||
            (
                rlco.construction_flag && !businessSpecificRlcosIds.includes(rlco.id) && rlco.department_id === parseInt(searchForm.construction_department_id)
            )
        );
};
const handleSearchCommonBasedRlcos = () => {
    const filteredCommonRlcosIds = businessSpecificRlcos.value?.map(rlco => rlco.id);
    addOnRlcos.value = rlcos.value
        .filter(rlco => !filteredCommonRlcosIds.includes(rlco.id) && rlco.common_flag)
};
const handleBusinessActivityChange = (value) => {
    if (!value) {
        businessSpecificRlcos.value = [];
        handleSearchConstructionRlcos();
        handleSearchCommonBasedRlcos();
    }
};
const handleConstructionDepartmentChange = (value) => {
    if (!value) {
        constructionRlcos.value = [];
    } else {
        handleSearchConstructionRlcos();
    }
    updateActiveTab();
};


const searchBusinessSpecificRlcos= computed(() => {
    return businessSpecificRlcos.value.filter(rlco => {
        if (!businessSpecificSearch.value) {
            return true;
        }
        const term = businessSpecificSearch.value.toLowerCase();
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

const searchAddOnRlcos= computed(() => {
    return addOnRlcos.value.filter(rlco => {
        if (!addOnSearch.value) {
            return true;
        }
        const term = addOnSearch.value.toLowerCase();
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

            <div class="row filterServicesDiv filterServicesDiv2 border-0 mb-4">
                <div class="col-xl-4 mb-xl-0 mb-4">
                    <label class="form-label">Sectors</label>
                    <v-select v-model="searchForm.business_category_id" :options="business_categories"
                              :reduce="category => category.id" label="category_name"
                              @option:selected="handleSelectedBusinessCategory()"
                              @update:modelValue="handleSelectedBusinessCategory"
                              placeholder="Select Sector" class="vSelectClass form-select"
                    >
                    </v-select>
                    <ErrorMessage :error="errors.business_category_id" />
                </div>

                <div class="col-xl-4 mb-xl-0 mb-4">
                    <label class="form-label">Business</label>
                    <v-select v-model="searchForm.business_activity_id" :options="filteredBusinessActivities"
                              :reduce="sector => String(sector.id)" label="easy_class_name"
                              @option:selected="handleSearch()"
                              @update:modelValue="handleBusinessActivityChange"
                              placeholder="Search your business" class="vSelectClass form-select" >
                    </v-select>
                    <ErrorMessage :error="errors.business_activity_id" />
                </div>

                <div class="col-xl-4">
                    <label class="form-label">Construction &amp; Issuance Authority (If Required )</label>
                    <v-select v-model="searchForm.construction_department_id" :options="departments"
                              :reduce="dept => dept.id" label="department_name"
                              @option:selected="handleSearch()"
                              :clearable="true"
                              @update:modelValue="handleConstructionDepartmentChange"
                              placeholder="Issuance Authority" class="vSelectClass form-select" >
                    </v-select>
                    <ErrorMessage :error="errors.construction_department_id" />
                </div>
            </div>

            <div>
                <ul v-if="tabs && tabs.length" class="nav nav-tabs mb-4" id="servicesPageTab" role="tablist">
                    <li
                        v-for="(tab, index) in tabs.filter(tab => tab && tab.items && tab.items.length)"
                        :key="tab?.id"
                        class="nav-item"
                        role="presentation"
                    >
                        <button
                            class="nav-link"
                            :class="{ active: activeTab === index }"
                            :id="tab.id"
                            type="button"
                            role="tab"
                            @click.prevent="setActiveTab(index, tab.id)"
                            :aria-controls="`${tab.id}-pane`"
                            :aria-selected="activeTab === index"
                        ><span><img :src="useAssets(tab.icon)" alt="" /></span>
                            {{ tab.label }}
                            <span class="d-inline-block ms-2 serviceCountDiv">{{ tab.items.length }}</span>
                        </button>
                    </li>
                </ul>

                <div class="tab-content pt-3" id="myTabContent">
                    <div
                        v-for="(tab, index) in tabs.filter(tab => tab && tab.items && tab.items.length)"
                        :key="tab.id"
                        class="tab-pane"
                        :class="{ show: activeTab === index, active: activeTab === index }"
                    >
                        <div class="row servicesPageData mb-3">
                            <div class="col-lg-4 mb-lg-0 mb-4">
                                <div class="card shadow-none">
                                    <div class="card-header bg-transparent border-0 p-3 pb-0">
                                        <h5 class="card-title mb-2">Services</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text border-0 bg-transparent">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>

                                            <input v-if="tab.id==='business-specific'" v-model="businessSpecificSearch"  type="text" class="form-control border-0 bg-transparent" placeholder="Search Services" aria-label="SearchService" aria-describedby="basic-addon1">
                                            <input v-else-if="tab.id==='construction-tab'" v-model="constructionSearch" type="text" class="form-control border-0 bg-transparent" placeholder="Search Services" aria-label="SearchService" aria-describedby="basic-addon1">
                                            <input v-else-if="tab.id==='addon-tab'" v-model="addOnSearch" type="text" class="form-control border-0 bg-transparent" placeholder="Search Services" aria-label="SearchService" aria-describedby="basic-addon1">

                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <ul class="nav nav-tabs flex-lg-column border-0 flex-row" role="tablist">
                                            <li v-if="tab.id==='business-specific'" v-for="rlco in searchBusinessSpecificRlcos" class="nav-item" role="presentation">
                                                <router-link :to="{ name: 'service-detail', params: { rlco_id: rlco.id }, hash: '#pageStartServices'}" class="nav-link px-2 py-3 w-100" aria-selected="true">
                                                    <div class="d-flex align-items center justify-content-between">
                                                        <div class="d-flex align-items-start">
                                                            <img :src="useAssets('assets/searched-service-icon.svg')" alt="department Icon" class="img-fluid" width="50" height="50">
                                                            <div class="searchedServiceData text-start ms-2">
                                                                <h6 class="mb-1">{{ rlco.rlco_name }}</h6>
                                                                <p class="mb-0 d-inline-block px-4 py-0">{{ rlco.scope }}</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <img :src="useAssets('assets/viewAll-icon.svg')" alt="">
                                                        </div>
                                                    </div>
                                                </router-link>
                                            </li>
                                            <li v-else-if="tab.id==='construction-tab'" v-for="rlco in searchConstructionRlcos" class="nav-item" role="presentation">
                                                <router-link :to="{ name: 'service-detail', params: { rlco_id: rlco.id }, hash: '#pageStartServices'}" class="nav-link px-2 py-3 w-100" aria-selected="true">
                                                    <div class="d-flex align-items center justify-content-between">
                                                        <div class="d-flex align-items-start">
                                                            <img :src="useAssets('assets/searched-service-icon.svg')" alt="department Icon" class="img-fluid" width="50" height="50">
                                                            <div class="searchedServiceData text-start ms-2">
                                                                <h6 class="mb-1">{{ rlco.rlco_name }}</h6>
                                                                <p class="mb-0 d-inline-block px-4 py-0">{{ rlco.scope }}</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <img :src="useAssets('assets/viewAll-icon.svg')" alt="">
                                                        </div>
                                                    </div>
                                                </router-link>
                                            </li>
                                            <li v-else-if="tab.id==='addon-tab'" v-for="rlco in searchAddOnRlcos" class="nav-item" role="presentation">
                                                <router-link :to="{ name: 'service-detail', params: { rlco_id: rlco.id }, hash: '#pageStartServices'}" class="nav-link px-2 py-3 w-100" aria-selected="true">
                                                    <div class="d-flex align-items center justify-content-between">
                                                        <div class="d-flex align-items-start">
                                                            <img :src="useAssets('assets/searched-service-icon.svg')" alt="department Icon" class="img-fluid" width="50" height="50">
                                                            <div class="searchedServiceData text-start ms-2">
                                                                <h6 class="mb-1">{{ rlco.rlco_name }}</h6>
                                                                <p class="mb-0 d-inline-block px-4 py-0">{{ rlco.scope }}</p>
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

                            <div class="col-lg-8 mb-3">
                                <div class="card shadow-none mb-4">
                                    <div class="card-body">
                                        <div class="tab-content" id="eBizServicesTab1Content">
                                            <router-view></router-view>
                                        </div>
                                    </div>
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


.v-select >>> .vs__dropdown-menu {
    width: 500px !important;
}
.filterServicesDiv .v-select {
    border: 0.50px solid #c0c0d2 !important;
    border-radius: 20px;
    height: 60px;
    font-weight: 400;
    font-size: 18px;
    font-family: "font2", sans-serif;
    color: #3a3a3a;
    background-color: #f4f5f6 !important;
}
.service_sidebar {
    max-height: 214vh; /* Limits the height of the sidebar */
    overflow-y: auto; /* Enables vertical scrolling */
}
</style>
