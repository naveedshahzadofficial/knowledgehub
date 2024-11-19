<template>
    <footer class="pt-5 pb-3">
        <div class="container-fluid px-4">
            <div class="row align-items-start mb-5">
                <div class="col-xl-2 col-sm-4 mb-xxl-0 mb-4 text-xl-center">
                    <img :src="useAssets('assets/dash-logo.svg')" alt="eBiz Logo">
                </div>

                <div class="col-xl-2 col-sm-4 mb-xxl-0 mb-4">
                    <h6>Our Services</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">The Support Suite</li>
                        <li class="mb-2">The Sales Suite</li>
                        <li class="mb-2">Support</li>
                        <li class="mb-2">Guide</li>
                    </ul>
                </div>

                <div class="col-xl-2 col-sm-4 mb-xxl-0 mb-4">
                    <h6>Top Features</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">Ticketing System</li>
                        <li class="mb-2">Knowledge Base</li>
                        <li class="mb-2">Community Forums</li>
                        <li class="mb-2">Help Desk Health</li>
                    </ul>
                </div>

                <div class="col-xl-2 col-sm-4 mb-xxl-0 mb-4">
                    <h6>Resources</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">Product Support</li>
                        <li class="mb-2">Request Demo</li>
                        <li class="mb-2">Library</li>
                        <li class="mb-2">Healthypower Blog</li>
                    </ul>
                </div>

                <div class="col-xl-2 col-sm-4 mb-xxl-0 mb-4">
                    <h6>Company</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">About Us</li>
                        <li class="mb-2">Press</li>
                        <li class="mb-2">Investors</li>
                        <li class="mb-2">Events</li>
                    </ul>
                </div>

                <div class="col-xl-2 col-sm-4 mb-xxl-0 mb-4">
                    <h6>Favourite Things</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">For Enterprise </li>
                        <li class="mb-2">For Startups</li>
                        <li class="mb-2">For Benchmark</li>
                        <li class="mb-2">For Small Business</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <h5 class="mb-0">© eBiz 2024 - All Rights Reserved</h5>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
import services from "../views/Services.vue";
import {useAssets} from "../composable/use-assets";

export default {
    name: "FooterComponent",
    methods: {useAssets},
    computed: {
        services() {
            return services
        }
    },
};
</script>

<style scoped></style>
