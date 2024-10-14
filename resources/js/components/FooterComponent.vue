<template>
    <footer>
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between footer-content">
                    <div>Copyrights © 2024 Punjab Information Technology Board (PITB)</div>
                    <div class="d-flex gap-4">
                        <router-link :to="{ name: 'services'}">Services</router-link>
                        <router-link :to="{ name: 'about-us'}">About</router-link>
                        <router-link :to="{ name: 'contact-us'}">Contact Us</router-link>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
import services from "../views/Services.vue";

export default {
    name: "FooterComponent",
    computed: {
        services() {
            return services
        }
    },
};
</script>

<style scoped></style>
