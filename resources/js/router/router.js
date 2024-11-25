import { createRouter, createWebHistory } from "vue-router";
import Home from "@/views/Home.vue";
import SearchResult from "@/views/SearchResult.vue";
import Overview from "@/views/Overview";
import Favorite from "@/views/Favorite";
import Detail from "@/views/Detail";
import PageNotFound from "../views/PageNotFound";
import Services from "@/views/Services.vue";
import AboutUs from "@/views/AboutUs.vue";
import ContactUs from "@/views/ContactUs.vue";
import ServiceDetail from "@/views/ServiceDetail.vue";
import Connectivity from "@/views/Connectivity.vue";
import Investment from "../views/Investment.vue";
import FoodProcessing from "../views/FoodProcessing.vue";

export const router = createRouter({
    history: createWebHistory('/'),
    scrollBehavior(to, from, savedPosition) {
        if (to.name === 'service-detail') {
            // Disable scrolling for 'service-detail'
            if (to.hash) {
                return { selector: to.hash , top:400};
            }
            return false;
        }
        if (to.name === 'home') {
            // Disable scrolling for 'home'
            return false;
        }
        if (savedPosition) {
            return savedPosition
        } else if (to.hash) {
            return { selector: to.hash, top:100 };
        }  else {
            return new Promise((resolve, reject) => {
                setTimeout(() => {
                    resolve({ left: 0, top: 0 })
                }, 500)
            })
        }
    },
    linkActiveClass: "text-dark bg-white",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/services/:id?/:id2?",
            name: "services",
            component: Services,
            children:
            [
                {
                    path: "service-detail/:rlco_id",
                    name: "service-detail",
                    component: ServiceDetail,
                    props: true,
                },
            ]
        },
        // {
        //     path: "/service-detail/:id",
        //     name: "service-detail",
        //     component: ServiceDetail,
        // },
        {
            path: "/food-processing",
            name: "food-processing",
            component: FoodProcessing,
        },
        {
            path: "/about-us",
            name: "about-us",
            component: AboutUs,
        },
        {
            path: "/contact-us",
            name: "contact-us",
            component: ContactUs,
        },
        {
            path: "/search",
            name: "search",
            component: SearchResult,
            props: true,
        },
        {
            path: "/overview",
            name: "Overview",
            component: Overview,
            props: true,
        },
        {
            path: "/saved",
            name: "favorite",
            component: Favorite,
            props: true,
        },
        {
            path: "/rlco/detail/:id",
            name: "rlcos.show",
            component: Detail,
        },
        {
            path: "/connectivity",
            name: "connectivity",
            component: Connectivity,
        },
        {
            path: "/investment",
            name: "investment",
            component: Investment,
        },
    ],
});
