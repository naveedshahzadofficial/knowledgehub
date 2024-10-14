<script>
import {useAssets} from "@/composable/use-assets";
export default {
    name: "AboutUsPage",
    methods: {
        useAssets,
    },

};
</script>

<style scoped></style>
<template>
    <section>
        <main class="confirmation-compliance-page min-height-100dvh">
            <!-- Header Section -->
            <div class="bg-light-grey pb-4">
                <!-- Breadcrumb Navigation -->
                <div class="container py-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><i class="fas fa-angle-left"></i></li>
                            <li class="breadcrumb-item"><router-link :to="{ name: 'home'}">Home</router-link></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">About</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="container mt-4">
                    <h1 class="display-6">About Us</h1>
                    <p class="lead">Your trusted partner for personalised business support and guidance.</p>
                </div>
            </div>
            <div class="container mt-4 mb-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 page-content">
                        <p>
                            To obtain licenses, permits, etc., businesses have to go through
                            cumbersome processing using manual application procedures at
                            various departments, such as Housing and Urban Development, Local
                            Government, Environment Protection Authority, Excise & Taxation,
                            Labour Department, Punjab Revenue Authority, Punjab Food
                            Authority, Punjab Power Development Company Limited, Water &
                            Sanitation Agency, etc.
                        </p>
                        <p>
                            After the success of EoDB program and significant improvement in
                            ranking, there was a need to reduce compliances and for
                            regulatory guillotine. In light of this, the Prime Minister of
                            Pakistan approved the launch of “Pakistan Regulatory
                            Modernization Initiative (PRMI)”. The key objective of this
                            initiative is to reduce the compliance burden for businesses on
                            one hand, while improving the effectiveness of regulatory regime
                            on the other hand.
                        </p>
                        <p>
                            In response, Planning & Development Board and Program
                            Implementation Unit (PIU) launched Knowledge Hub 'a Single
                            Platform to access all the developed systems for Licenses &
                            Permits' for the facilitation of Businesses aligned with
                            Pakistan Regulatory Modernization Initiative (PRMI) headed by
                            Board of Investment, Islamabad.
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </section>
</template>

