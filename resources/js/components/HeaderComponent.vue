<template>
    <div class="preloader flex-column justify-content-center align-items-center" :class="{'hidden':usePreLoaderStore().isShow}">
        <div class="logo-container">
            <img class="logo-animation" :src="useAssets('assets/ebiz_login_logo.svg')" alt="EBiz Logo">
            <div class="loading-circle"></div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <nav id="eBiz-landingNavbar" class="navbar navbar-expand-lg position-fixed px-lg-5 px-4 bg-white z-3">
                    <router-link class="navbar-brand" :to="{ name: 'home', hash: '#homeStartPage' }" @click.native="scrollToHash('homeStartPage')">
                        <img :src="useAssets('assets/dash-logo1.svg')" alt="eBiz Logo" class="img-fluid">
                    </router-link>
                    <button class="navbar-toggler border-0 custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="nav nav-pills ms-auto justify-content-lg-between justify-content-start my-lg-0 my-3 pe-xl-5">
                        <li class="nav-item">
                                <router-link class="nav-link pb-1 px-1 mx-2" :to="{ name: 'home', hash: '#scrollspyHeading' }" @click.native="scrollToHash('scrollspyHeading')">
                                    <span></span> Home
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link pb-1 px-1 mx-2" :to="{ name: 'home', hash: '#scrollspyHeading1' }" @click.native="scrollToHash('scrollspyHeading1')">
                                    <span></span> Business Sector
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link pb-1 px-1 mx-2" :to="{ name: 'home', hash: '#scrollspyHeading2' }" @click.native="scrollToHash('scrollspyHeading2')">
                                    <span></span> Business Essentials
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link pb-1 px-1 mx-2" :to="{ name: 'home' , hash: '#scrollspyHeading3' }" @click.native="scrollToHash('scrollspyHeading3')">
                                    <span></span> Connectivity
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link pb-1 px-1 mx-2" :to="{ name: 'home', hash: '#scrollspyHeading4' }" @click.native="scrollToHash('scrollspyHeading4')">
                                    <span></span> Investments
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pb-1 px-1 mx-2" href="#scrollspyHeading6">
                                    <span>
                                    </span> News
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pb-1 px-1 mx-2" href="#scrollspyHeading7">
                                    <span>
                                    </span> FAQs
                                </a>
                            </li>
                        </ul>
                        <a :href="apply_ebiz_url" class="text-decoration-none eBizUserAddPortalBtn d-inline-flex align-items-center justify-content-center ps-1 me-3">
                            <span>
                                <img :src="useAssets('assets/user-add-icon.svg')" alt="user add icon" class="img-fluid">
                            </span>
                        </a>
                        <a :href="apply_ebiz_url" class="text-decoration-none eBizPortalBtn d-inline-flex align-items-center justify-content-center ps-3 pe-2">
                            <span>eBiz Portal</span>
                            <span>
                                <img :src="useAssets('assets/navbar_arrow_icon.svg')" alt="Navbar Icons" class="img-fluid">
                            </span>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import {useAssets} from "../composable/use-assets";
import {usePreLoaderStore} from "../store/preloader";

export default {
    name: "HeaderComponent",
    methods: {
        usePreLoaderStore,
        useAssets,
        scrollToHash(id) {
            // Helper function to adjust scroll position to the top 5%
            const scrollToTop7Percent = (element) => {
                const topOffset = element.getBoundingClientRect().top + window.scrollY; // Get element's position relative to the viewport
                const adjustment = window.innerHeight * 0.07; // Calculate 7% of the viewport height
                window.scrollTo({ top: topOffset - adjustment, behavior: 'smooth' });
            };

            if (this.$route.name === 'home') {
                const element = document.getElementById(id);
                if (element) {
                    scrollToTop7Percent(element);
                }
            } else {
                // Redirect to home and scroll after navigation
                this.$router.push({ name: 'home', hash: `#${id}` }).then(() => {
                    this.$nextTick(() => {
                        const element = document.getElementById(id);
                        if (element) {
                            scrollToTop7Percent(element);
                        }
                    });
                });
            }
        }
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
