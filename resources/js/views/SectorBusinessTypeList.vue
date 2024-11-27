<script>
import {useAssets} from "@/composable/use-assets";
import {usePreLoaderStore} from "../store/preloader";
import {isNull} from "lodash/lang";
import {counter} from "@fortawesome/fontawesome-svg-core";
export default {
    name: "SectorBusinessTypePage",
    data() {
        return {
            categories: [],
            activities: [],
            business_category_id: '',
            currentPage: 1, // Tracks the current page
            itemsPerPage: 10, // Number of records to display per page
            searchQuery: "", // Search query input
            recordLimits: [10, 25, 50, 100], // Options for "records per page"
        }
    },
    methods: {
        counter,
        useAssets,
        loadActivities: function () {
            axios.get('activities').then(response => {
                this.categories = response.data.categories;
                this.activities = response.data.sectors;
            })
        },
        changePage(page) {
            if (page === "..." || page < 1 || page > this.totalPages) return;
            this.currentPage = page;
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
        if(this.$route.params.id)
            this.business_category_id = parseInt(this.$route.params.id)
    },
    computed:{
        filteredBusinessCategories: function () {
            return this.categories.filter(category => category.category_is_sector === 1);
        },
        filteredBusinessActivities() {
            const filtered = this.activities.filter(
                (activity) =>
                    activity.business_category_id === this.business_category_id ||
                    (this.$route.params.id === "" && this.business_category_id === "")
            );
            if (this.searchQuery) {
                const searchQuery = this.searchQuery.trim().toLowerCase();
                return filtered.filter((activity) =>
                    activity.easy_class_name &&
                    activity.easy_class_name.toLowerCase().includes(searchQuery)
                );
            }
            return filtered;
        },
        totalPages() {
            return Math.ceil(this.filteredBusinessActivities.length / this.itemsPerPage);
        },
        paginatedActivities() {
            // Get the paginated results
            const startIndex = (this.currentPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return this.filteredBusinessActivities.slice(startIndex, endIndex);
        },
        visiblePages() {
            const pages = [];
            const totalPages = this.totalPages;
            if (totalPages <= 10) {
                for (let i = 1; i <= totalPages; i++) {
                    pages.push(i);
                }
            } else {
                const start = Math.max(2, this.currentPage - 2);
                const end = Math.min(this.currentPage + 2, totalPages - 1);
                pages.push(1); // Always include the first page
                if (start > 2) pages.push("..."); // Add gap if needed
                for (let i = start; i <= end; i++) {
                    pages.push(i);
                }
                if (end < totalPages - 1) pages.push("..."); // Add gap if needed
                pages.push(totalPages); // Always include the last page
            }
            return pages;
        },

    },

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
        <div data-bs-spy="scroll" data-bs-target="#eBiz-landingNavbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="content z-2 position-relative foodProcessingPage" tabindex="0">
            <header id="scrollspyHeading">
                <div class="container-fluid px-lg-5 px-4">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h1 class="mb-3">
                                Comprehensive
                                <span>Business Solutions</span>
                            </h1>
                        </div>
                        <div class="col-xxl-8 col-lg-9">
                            <p class="mb-4 pe-lg-5 position-relative">Dive into eBiz Punjab's extensive resources and opportunities designed to elevate your business, from essential services to strategic investments.</p>
                        </div>
                    </div>
                </div>
            </header>
            <section class="py-sm-5 py-4 mb-5 sectorDetailPage" id="scrollspyHeading1">
                <div class="container-fluid px-lg-5 px-4">
                    <div class="row filterServicesDiv mb-4">
                        <div class="col-md-5 mb-md-0 mb-3">
                            <label class="form-label">Select Sector</label>
                            <v-select v-model="business_category_id" :options="filteredBusinessCategories"
                                      :reduce="category => category.id" label="category_name"
                                      placeholder="Business Sector" class="vSelectClass form-select" >
                            </v-select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow-none">
                                <div class="card-body table-responsive px-0">
                                    <div class="col-12 mb-1 d-lg-flex gap-1 justify-content-xl-between px-2 flex-xl-nowrap flex-wrap">
                                        <div class="col-8 px-2">
                                            <label for="recordsPerPage" class="px-1">Show</label>
                                            <select id="recordsPerPage" v-model="itemsPerPage">
                                                <option v-for="limit in [10, 20, 50]" :value="limit" :key="limit">
                                                    {{ limit }}
                                                </option>
                                            </select>
                                            <label for="recordsPerPageBottom" class="px-1">Entries</label>
                                        </div>
                                        <div class="col-4">
                                            <input
                                                v-model="searchQuery"
                                                type="text"
                                                class="form-control"
                                                placeholder="Search activities..."
                                            />
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th class="px-2" scope="col">Sr. No.</th>
                                            <th scope="col">Business</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(activity,index) in paginatedActivities">
                                            <td class="px-4">{{ index + 1 + (currentPage - 1) * itemsPerPage }}</td>
                                            <td>{{ activity.easy_class_name }}</td>
                                            <td>
                                                <router-link :to="{ name: 'services', params:{ id: 0, id2: activity.id } }" class="text-decoration-none btn border-0 bg-transparent sectorDetailBtn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Detail">
                                                    <img :src="useAssets('assets/sector-detail-action-icon.svg')" alt="">
                                                </router-link>
                                            </td>
                                        </tr>
                                        <tr v-if="paginatedActivities.length === 0">
                                            <td colspan="3" class="text-center">No activities found</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="float-start px-2">
                                        Showing {{ ((currentPage - 1) * itemsPerPage) + 1 }}
                                        to
                                        {{ Math.min(currentPage * itemsPerPage, filteredBusinessActivities.length) }}
                                        of {{ filteredBusinessActivities.length }} Records                                    </div>
                                    <nav class="float-end">
                                        <ul class="pagination justify-content-center px-3">
                                            <!-- Previous Button -->
                                            <li class="page-item" :class="{ disabled: currentPage === 1 }">
                                                <button class="page-link" @click="changePage(currentPage - 1)">
                                                    &laquo;
                                                </button>
                                            </li>

                                            <!-- Page Numbers -->
                                            <li
                                                class="page-item"
                                                v-for="page in visiblePages"
                                                :key="page"
                                                :class="{ active: currentPage === page }"
                                            >
                                                <button class="page-link" @click="changePage(page)">
                                                    {{ page }}
                                                </button>
                                            </li>

                                            <!-- Next Button -->
                                            <li class="page-item" :class="{ disabled: currentPage === totalPages }">
                                                <button class="page-link" @click="changePage(currentPage + 1)">
                                                    &raquo;
                                                </button>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</template>

