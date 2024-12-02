<script setup>
import {useAssets} from "../composable/use-assets";
import {onBeforeMount} from "vue";
import {usePreLoaderStore} from "../store/preloader";

usePreLoaderStore().setIsShow(false);

onBeforeMount(() => {
    window.setTimeout(() => {
        usePreLoaderStore().setIsShow(true);
    }, 1000);
})
</script>

<style scoped></style>
<template>
    <div data-bs-spy="scroll" data-bs-target="#eBiz-landingNavbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="content z-2 position-relative foodProcessingPage" tabindex="0">
        <section class="aboutUsDiv2 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-7">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h2>What is <span> eBiz</span></h2>
                            </div>

                            <div class="col-12 mb-3">
                                <p class="mb-0 text-start">eBiz Punjab embodies the Chief Minister's vision of a progressive Punjab, where businesses can flourish with ease and efficiency. By integrating cutting-edge technology and fostering transparency, we provide a platform
                                    that bridges the gap between entrepreneurs and regulatory authorities, enabling businesses to navigate essential processes effortlessly.</p>
                            </div>
                        </div>

                        <div class="row gx-3">
                            <div class="col-12 mb-3">
                                <div class="card shadow-none h-100">
                                    <div class="card-body p-4">
                                        <img :src="useAssets('assets/vision-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                        <h4>Our Vision</h4>
                                        <p class="mb-0 text-start">Guided by the Chief Minister’s forward-thinking approach, we aim to position Punjab as a hub of innovation and economic opportunity by creating a seamless, Business-centric ecosystem for businesses.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card shadow-none h-100">
                                    <div class="card-body p-4">
                                        <img :src="useAssets('assets/mission-icon.svg')" alt="Icon" class="img-fluid mb-3">
                                        <h4>Our Mission</h4>
                                        <p class="mb-2 text-start">To align with the Chief Minister’s commitment to enhancing ease of doing business by providing:</p>
                                        <ul>
                                            <li class="mb-2">Hassle-free access to essential services like registrations, licenses, certifications, and permits.</li>
                                            <li class="mb-2">Streamlined processes that save time and resources.</li>
                                            <li class="mb-2">Transparent systems that build trust and reliability.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-5 d-lg-block d-none text-center">
                        <img :src="useAssets('assets/about-us-img.png')" alt="About Us Img" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
        <section class="sectorHighLightDiv aboutSectorHighLightDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container-fluid px-5">
                <div class="row mb-4">
                    <div class="col-12 businessEssentialsBgDiv py-sm-5 py-4">
                        <div class="container px-md-5">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2>What We <span>Offer</span></h2>
                                </div>

                                <div class="col-lg-9 mx-auto col-12 text-center mb-3">
                                    <p>A comprehensive platform that simplifies business operations, enhances compliance, and fosters growth through technology-driven solutions.</p>
                                </div>

                                <div class="row mx-0">
                                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                        <div class="card shadow-none h-100">
                                            <div class="card-body text-center py-5 px-3">
                                                <h5>All-in-One Business Platform</h5>
                                                <div class="dotted-line my-4"></div>
                                                <h6>Simplifying access to registrations, licenses, and compliance management.</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                        <div class="card shadow-none h-100">
                                            <div class="card-body text-center py-5 px-3">
                                                <h5>Streamlined Processes
                                                </h5>
                                                <div class="dotted-line my-4"></div>
                                                <h6>Accelerating approvals through technology-driven workflows.</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                        <div class="card shadow-none h-100">
                                            <div class="card-body text-center py-5 px-3">
                                                <h5>Real-Time Tracking
                                                </h5>
                                                <div class="dotted-line my-4"></div>
                                                <h6>Ensuring transparency with up-to-date progress on applications.</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6">
                                        <div class="card shadow-none h-100">
                                            <div class="card-body text-center py-5 px-3">
                                                <h5>Empowering Opportunities</h5>
                                                <div class="dotted-line my-4"></div>
                                                <h6>Connecting businesses to strategic investments, insights, and tools for growth.</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="economicZonesDiv py-sm-5 py-4" id="scrollspyHeading4">
            <div class="container px-lg-5 px-4">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>Why <span>Choose Us?</span></h2>
                    </div>

                    <div class="col-lg-9 mx-auto col-12 text-center mb-3">
                        <p class="mb-2">We deliver streamlined workflows, transparency, and continuous innovation to meet the evolving needs of businesses.</p>
                    </div>

                    <ul class="list-unstyled px-lg-5 row mx-0">
                        <div class="col-lg-6">
                            <li class="mb-3 p-4">
                                <p class="mb-0 text-start">Simplified workflows for faster results</p>
                            </li>
                        </div>

                        <div class="col-lg-6">
                            <li class="mb-3 p-4">
                                <p class="mb-0 text-start">Transparent processes for trust and reliability</p>
                            </li>
                        </div>

                        <div class="col-lg-6">
                            <li class="mb-3 p-4">
                                <p class="mb-0 text-start">A single platform for all business-related services.</p>
                            </li>
                        </div>

                        <div class="col-lg-6">
                            <li class="mb-3 p-4">
                                <p class="mb-0 text-start">Continuous innovation to support the evolving needs of businesses.</p>
                            </li>
                        </div>
                    </ul>

                    <div class="col-12 text-center mb-3 px-lg-5">
                        <p class="mb-2">By fostering innovation and empowering businesses, <strong>eBiz Punjab</strong> is paving the way for a prosperous future. Whether you’re starting a new venture or expanding an existing one, our platform is here to help you every
                            step of the way, reflecting the Chief Minister’s dedication to building a stronger, more dynamic Punjab.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

