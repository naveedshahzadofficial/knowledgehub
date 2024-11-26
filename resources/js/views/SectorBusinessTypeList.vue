<script>
import {useAssets} from "@/composable/use-assets";
import {usePreLoaderStore} from "../store/preloader";
import {isNull} from "lodash/lang";
export default {
    name: "SectorBusinessTypePage",
    data() {
        return {
            categories: [],
            activities: [],
            business_category_id: '',
        }
    },
    methods: {
        useAssets,
        loadActivities: function () {
            axios.get('activities').then(response => {
                this.categories = response.data.categories;
                this.activities = response.data.sectors;
            })
        },
    },
    mounted() {
        usePreLoaderStore().setIsShow(false);
        this.loadActivities();
        window.setTimeout(() => {
            usePreLoaderStore().setIsShow(true);
        }, 1000);
        if(this.$route.params.id)
            this.business_category_id = parseInt(this.$route.params.id)
    },
    computed:{
        filteredBusinessCategories: function () {
            return this.categories.filter(category => category.category_is_sector === 1);
        },
        filteredBusinessActivities: function () {
            console.log(this.$route.params.id);
            return this.activities.filter(activity => (activity.business_category_id === this.business_category_id || (this.$route.params.id==='' && this.business_category_id === '')));
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
    <section>
        <div class="servicesPageContent mb-5">
            <header class="servicesPageHeader pb-5">
                <div class="container-fluid px-md-5 px-4">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="mb-1">Business Activities</h1>
                            <p id="pageStartServices" class="mb-0">eBiz Punjab offers expert support to boost your business across various sectors.</p>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container-fluid px-md-5 px-4">
                <div class="row filterServicesDiv mb-3">
                    <div class="col-md-5 mb-md-0">
                        <label class="form-label">Business Sector</label>
                        <v-select v-model="business_category_id" :options="filteredBusinessCategories"
                                  :reduce="category => category.id" label="category_name"
                                  placeholder="Business Sector" class="vSelectClass form-select" >
                        </v-select>
                    </div>
                </div>

                <div class="row servicesPageData mb-3">
                    <div class="col-12 mb-lg-0 mb-4">
                        <router-link :to="{ name: 'services', params:{ id: 0, id2: activity.id } }" class="card mb-3" v-for="activity in filteredBusinessActivities">
                            <div class="card-body">
                                <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                    <span>{{ activity.easy_class_name }}</span>
                                </h6>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

