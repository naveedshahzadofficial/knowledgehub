<template>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logoImage">
                        <router-link :to="{ name: 'home' }">
                            <img :src="useAssets('ebiz-logo.png')" alt="Header Logo">
                        </router-link>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="headerMenu float-end">
                        <nav class="navbar navbar-expand-lg navbar-light">

                            <!-- Navbar links -->
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <router-link class="nav-link" :to="{ name: 'services'}" >Services</router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link class="nav-link" :to="{ name: 'about-us'}">About</router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link class="nav-link" :to="{ name: 'contact-us'}">Contact Us</router-link>
                                    </li>
                                </ul>
                                <a target="_blank" href="https://webdev.pitb.gov.pk/ebiz/" class="btn btn-login">Log In</a>
                                <a class="RightmenuBtn">
                                    <span class="navbar-toggler-icon"></span>
                                </a>
                            </div>
                        </nav>
                        <div class="Rightmenu">
                            <a class="RightmenuBtn">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                            <ul>
                                <li><router-link :to="{ name: 'home'}">Home</router-link></li>
                                <li><router-link :to="{ name: 'services'}">Services</router-link></li>
                                <li> <router-link :to="{ name: 'about-us'}">About</router-link></li>
                                <li><router-link :to="{ name: 'contact-us'}">Contact Us</router-link></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import {useAssets} from "../composable/use-assets";

export default {
    name: "HeaderComponent",
    methods: {useAssets},
    props: {
        totalFavorite: 0,
    },
    data() {
        return {
            app_title: this.$store.state.app_title,
        };
    },
    computed: {
        isOnHomePage: function () {
            return (
                this.$route.path === "/" ||
                this.$route.path === "/knowledgehub/"
            );
        },
        isSavedPage: function () {
            return (
                this.$route.path === "/knowledgehub/saved" ||
                this.$route.path === "/saved"
            );
        },
    },
};
</script>

<style scoped></style>
