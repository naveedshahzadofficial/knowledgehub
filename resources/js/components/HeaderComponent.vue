<template>
    <div class="container-fluid">
        <nav id="eBiz-landingNavbar" class="navbar navbar-expand-lg px-3 position-fixed me-4 mt-3 z-3">
            <router-link class="navbar-brand bg-transparent" :to="{ name: 'home' }">
                <img :src="useAssets('assets/dash-logo.svg')" alt="eBiz Logo" class="img-fluid">
            </router-link>
            <button class="navbar-toggler border-0 custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="nav nav-pills mx-auto justify-content-between my-lg-0 my-3">
                    <li class="nav-item">
                        <router-link class="nav-link bg-transparent" :to="{ name: 'home', hash: '#scrollspyHeading1' }" @click.native="scrollToHash('scrollspyHeading1')">
                            <span>
                                <img :src="useAssets('assets/business-sector-icon.svg')" alt="Navbar Icons" class="img-fluid">
                            </span> Business Advisory
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link bg-transparent" :to="{ name: 'home', hash: '#scrollspyHeading2' }" @click.native="scrollToHash('scrollspyHeading2')">
                            <span>
                                <img :src="useAssets('assets/business-entities-icon.svg')" alt="Navbar Icons" class="img-fluid">
                            </span> Business Essentials
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link bg-transparent" :to="{ name: 'home', hash: '#scrollspyHeading3' }" @click.native="scrollToHash('scrollspyHeading3')">
                            <span>
                                <img :src="useAssets('assets/connectivity-icon.svg')" alt="Navbar Icons" class="img-fluid">
                            </span> Connectivity
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#scrollspyHeading4">
                            <span>
                                <img :src="useAssets('assets/investments-icon.svg')" alt="Navbar Icons" class="img-fluid">
                            </span> Investments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#scrollspyHeading5">
                            <span>
                                <img :src="useAssets('assets/contact-icon.svg')" alt="Navbar Icons" class="img-fluid">
                            </span> Contact us</a>
                    </li>
                </ul>
                <a target="_blank" :href="apply_ebiz_url" class="text-decoration-none eBizPortalBtn d-inline-flex align-items-center justify-content-center ps-3 pe-2">
                    <span>eBiz Portal</span>
                    <span>
                        <img :src="useAssets('assets/navbar_arrow_icon.svg')" alt="Navbar Icons" class="img-fluid">
                    </span>
                </a>
            </div>
        </nav>
    </div>
</template>

<script>
import {useAssets} from "../composable/use-assets";

export default {
    name: "HeaderComponent",
    methods: {
        useAssets,
        scrollToHash(id) {
            // Check if already on the home page
            if (this.$route.name === 'home') {
                const element = document.getElementById(id);
                if (element) {
                    element.scrollIntoView({ behavior: 'smooth' });
                }
            } else {
                // Redirect to home and scroll after navigation
                this.$router.push({ name: 'home', hash: `#${id}` }).then(() => {
                    this.$nextTick(() => {
                        const element = document.getElementById(id);
                        if (element) {
                            element.scrollIntoView({ behavior: 'smooth' });
                        }
                    });
                });
            }
        },
    },
    props: {
        totalFavorite: 0,
    },
    data() {
        return {
            app_title: this.$store.state.app_title,
            apply_ebiz_url: process.env.MIX_APPLY_EBIZ_URL,
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
