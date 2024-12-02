<script setup>
import {usePreLoaderStore} from "@/store/preloader";
import {onBeforeMount} from "vue";
import {useAssets} from "../composable/use-assets";

usePreLoaderStore().setIsShow(false);

onBeforeMount(() => {
    window.setTimeout(() => {
        usePreLoaderStore().setIsShow(true);
    }, 1000);
})
</script>

<template>
    <div data-bs-spy="scroll" data-bs-target="#eBiz-landingNavbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="content z-2 position-relative landingContent" tabindex="0">
        <section class="visionSection py-4">
            <div class="container-fluid px-sm-5 px-4">
                <div class="row">
                    <div class="col-lg-3 mb-lg-0 mb-3">
                        <img :src="useAssets('assets/cm-img1.png')" alt="cm Img" class="img-fluid">
                    </div>
                    <div class="col-lg-9">
                        <h6 class="mb-1">Message from the</h6>
                        <h3 class="mb-1">Chief Minister of Punjab </h3>
                        <h4 class="mb-2">I am delighted to share with you a major milestone in the journey towards a digitally empowered Punjab.</h4>
                        <p class="mb-2">With great pride, I announce that all registrations, licenses, certificates, and related documents against the businesses have now been successfully digitalized.</p>
                        <p class="mb-2">
                            This transformative step marks a significant leap in enhancing the ease of doing business, improving transparency and ensuring faster and more efficient government services. By digitizing these crucial processes, we are making it easier for businesses,
                            industries, and entrepreneurs to access the information they need, while reducing paperwork, time and administrative barriers.
                        </p>
                        <p class="mb-2">
                            This digital platform will ensure seamless access to essential documents and services, creating an ecosystem where businesses can thrive and contribute to the economic growth of Punjab. It will also foster greater accountability and trust, ensuring that
                            every interaction is secure, transparent, and timely. As we continue to embrace technology to improve governance and service delivery, I encourage all stakeholders to take full advantage of this digital platform. Let us work
                            together to build a stronger, more prosperous Punjab where innovation, industry and progress go hand in hand.
                        </p>
                        <img src="assets/cm-signature.svg" alt="">
                        <p class="mb-0">Chief Minister Punjab</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
