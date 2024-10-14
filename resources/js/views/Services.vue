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
            business_type_id: "",
            business_activity_id:"",
            department_id:"",
            is_first_landing: true
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
                    if (this.activities.length > 0) {
                        this.getActivityRlcos(this.$route.params.id??this.activities[0].id);
                    }else{
                        this.rlcos = [];
                    }
            })
        },
        getActivityRlcos: function (activity_id) {
            axios.post(`activity-rlcos/${activity_id}`, {}).then(response => {
                this.rlcos = response.data.rlcos;
                if(!this.is_first_landing)
                 this.scrollToRlco();
                this.is_first_landing = false;
            })
        },
        scrollToRlco() {
            let refDiv = this.$refs.rlco_position;
            refDiv.scrollIntoView({
                behavior: "smooth", // Enables smooth scrolling
                block: "start"      // Aligns the element to the top of the viewport
            });
        },
    },
    mounted() {
        this.loadActivities();

    },
    computed: {
        filteredRlcos: function () {
            return this.rlcos.filter(rlco => {
                // Check if business_type_id or business_activity_id are empty, return all rlcos if so
                if (!this.business_type_id && !this.business_activity_id && !this.department_id) {
                    return true;
                }
                // Filter based on business_type_id and business_activity_id
                const matchesBusinessType = this.business_type_id ? rlco.business_category_id === this.business_type_id : true;
                const matchesBusinessActivity = this.business_activity_id
                    ? rlco.business_activities.some(activity => activity.id === this.business_activity_id)
                    : true;
                // const matchesBusinessActivity = this.business_activity_id ? rlco.business_activity_id === this.business_activity_id : true;
                const matchesBusinessDepartment = this.department_id ? rlco.department_id === this.department_id : true;
                return matchesBusinessType && matchesBusinessActivity && matchesBusinessDepartment;
            });
        }
    }

};
</script>

<style scoped></style>
<template>
    <section>
        <div class="top-section pb-4 services-page">
            <div class="container py-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><i class="fas fa-angle-left"></i></li>
                        <li class="breadcrumb-item"><router-link :to="{ name: 'home'}">Home</router-link></li>
                        <li class="breadcrumb-item"><a href="#">Services</a></li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-blue-color page-header-title mt-4">eBiz Services</h2>
                        <p class="text-blue-color">Your trusted partner for personalised business support and guidance.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="middel-section">
            <div class="container mt-1">
                <div class="row row-cols-1 row-cols-md-3 g-4 mt-3 service-categories">
                    <div :class="index===0?'col-12':'col-4'" v-for="(activity, index) in activities">
                        <div class="card d-block justify-content-between align-items-center p-3">
                            <a href="javascript:void(0)" @click.prevent="getActivityRlcos(activity.id)" class="card-link">
                                <div class="card-body text-center d-flex flex-column gap-1 align-items-start">
                                    <span class="card-icon w-auto">
                                        <img :src="activity.activity_icon_url"/>
                                    </span>
                                    <span class="card-text">
                                        {{ activity.activity_name }}
                                    </span>
                                    <span class="pt-4">
                                        <img :src="useAssets('arrow.svg')"/>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-between align-items-center mb-3 mt-5">
                    <!-- Left Side Dropdowns -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <v-select v-model="business_type_id" :options="categories"
                                          :reduce="category => category.id" label="category_name"
                                          placeholder="Business Types" class="w-auto" style="width: 100% !important;">
                                </v-select>
                            </div>
                            <div class="col-md-4">
                                <v-select v-model="business_activity_id" :options="sectors"
                                          :reduce="sector => sector.id" label="class_name"
                                          placeholder="Sectors" class="w-auto" style="width: 100% !important;">
                                </v-select>
                            </div>
                            <div class="col-md-4">
                                <v-select v-model="department_id" :options="departments"
                                          :reduce="department => department.id" label="department_name"
                                          placeholder="Licensing Authority" class="w-auto" style="width: 100% !important;">
                                </v-select>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side Text and Dropdown -->
                    <div class="col-md-3 d-flex justify-content-end align-items-center gap-2">
                        <span>{{ filteredRlcos.length }} services</span>
                        <select class="form-select w-auto">
                            <option selected>Most Relevant</option>

                        </select>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4 mt-3 service-list" ref="rlco_position">
                    <div v-if="filteredRlcos.length" class="col-3" v-for="rlco in filteredRlcos">
                        <router-link class="card d-block justify-content-between align-items-center p-3" :to="{ name: 'service-detail', params: { id: rlco.id }}">
                            <div class="card-link">
                                <div class="d-flex align-items-center ">
                                    <div class="card-body text-center d-flex align-items-center">
                                        <span class="card-text">
                                            {{ rlco.rlco_name }}
                                        </span>
                                        <span class="card-icon">
                                             <img :src="useAssets('epd.png')">
                                        </span>
                                    </div>
                                </div>
                                <div class="card-arrow">
                                    <span>
                                        <img :src="useAssets('arrow.svg')">
                                    </span>
                                </div>
                            </div>
                        </router-link>
                    </div>
                    <div v-else class="col-12">No, Rlcos Found...</div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                    <div class="col-12">
                        <hr />
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                    <div class="col-12">
                        <h3 class="text-blue-color">Visiting a service center</h3>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4 mt-1 service-center-ops mb-5">
                    <div class="col-3">
                        <div class="card d-block justify-content-between align-items-center p-3">
                            <a href="javascript:void(0)" class="card-link">
                                <div class="d-flex align-items-center ">
                                    <div class="card-body text-center d-flex align-items-left">
                                        <span class="card-text w-auto">
                                            Book an Appointment
                                        </span>
                                    </div>
                                </div>
                                <div class="card-arrow mt-3">
                                    <span>
                                        <img :src="useAssets('arrow.svg')"/>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card d-block justify-content-between align-items-center p-3">
                            <a href="javascript:void(0)" class="card-link">
                                <div class="d-flex align-items-center ">
                                    <div class="card-body text-center d-flex align-items-left">
                                        <span class="card-text w-auto">
                                             Change or Cancel a Booking
                                        </span>
                                    </div>
                                </div>
                                <div class="card-arrow mt-3">
                                    <span>
                                        <img :src="useAssets('arrow.svg')"/>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card d-block justify-content-between align-items-center p-3">
                            <a href="javascript:void(0)" class="card-link">
                                <div class="d-flex align-items-center ">
                                    <div class="card-body text-center d-flex align-items-left">
                                        <span class="card-text w-auto">
                                            Find a Facilitation Center
                                        </span>
                                    </div>
                                </div>
                                <div class="card-arrow mt-3">
                                    <span>
                                        <img :src="useAssets('arrow.svg')"/>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card d-block justify-content-between align-items-center p-3">
                            <a href="javascript:void(0)" class="card-link">
                                <div class="d-flex align-items-center ">
                                    <div class="card-body text-center d-flex align-items-left">
                                        <span class="card-text w-auto">
                                            Our Locations
                                        </span>
                                    </div>
                                </div>
                                <div class="card-arrow mt-3">
                                    <span>
                                        <img :src="useAssets('arrow.svg')"/>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-section p-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-blue-two fw-bold mb-4">Was the information on this page useful? <span class="thumbs-icon"><i class="fa fa-thumbs-up"></i></span></h4>
                            <p class="text-blue-two underline">If you need a response, <span class="text-blue-color">send an enquery</span>  insted.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

