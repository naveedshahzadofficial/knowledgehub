<script setup>

import {useAssets} from "../composable/use-assets";
</script>
<template>
    <footer class="pt-md-5 pb-3">
        <div class="container-fluid px-md-5 px-4">
            <div class="row align-items-start mb-3">
                <div class="col-12 mb-4 text-center">
                    <img :src="useAssets('assets/dash-logo1.svg')" alt="eBiz Logo">
                </div>

                <div class="col-12 d-flex text-center justify-content-center">
                    <h6>
                        <router-link :to="{ name: 'about-us'}" class="text-decoration-none bg-transparent border-end px-2">About Us</router-link>
                    </h6>
                    <h6>
                        <router-link :to="{ name: 'contact-us'}" class="text-decoration-none bg-transparent border-end px-2">Contact Us</router-link>

                    </h6>
                    <h6>
                        <router-link :to="{ name: 'services'}" class="text-decoration-none bg-transparent border-end px-2">Services</router-link>
                    </h6>
                    <h6>
                        <router-link :to="{ name: 'contact-us', hash: '#scrollspyHeading44' }" class="text-decoration-none bg-transparent px-2">Helpdesk</router-link>
                    </h6>
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
