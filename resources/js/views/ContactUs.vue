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
        <header id="scrollspyHeading">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h1 class="mb-3">Contact
                            <span>Us</span>
                        </h1>
                    </div>
                    <div class="col-xxl-9 col-xl-10">
                        <p class="mb-4 pe-lg-5 position-relative">Your trusted partner for personalised business support and guidance.</p>
                    </div>
                    <div class="col-12">
                        <div class="dotted-line my-4"></div>
                    </div>
                </div>
            </div>
        </header>

        <section class="contactUsDiv py-4 mb-4" id="scrollspyHeading4">
            <div class="container-fluid px-lg-5 px-4">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-5 mb-lg-0 mb-4">
                        <ul class="list-unstyled">
                            <li class="mb-2 d-flex">
                                <span class="me-2">
                                    <img :src="useAssets('assets/contact-us-icon1.svg')" alt="Contact icon">
                                </span>
                                <span>Arfa  Tower, Ferozpur Road, Nishter Town, Lahore</span>
                            </li>

                            <li class="mb-2 d-flex">
                                <span class="me-2">
                                    <img :src="useAssets('assets/contact-us-icon1.svg')" alt="Contact icon">
                                </span>
                                <span>+92-42-99000000</span>
                            </li>

                            <li class="mb-2 d-flex">
                                <span class="me-2">
                                    <img :src="useAssets('assets/contact-us-icon1.svg')" alt="Contact icon">
                                </span>
                                <span>+92-42-99232123</span>
                            </li>

                            <li class="mb-2 d-flex">
                                <span class="me-2">
                                    <img :src="useAssets('assets/contact-us-icon1.svg')" alt="Contact icon">
                                </span>
                                <span>info@pitb.gov.pk</span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xl-8 col-lg-7">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13609.809942355809!2d74.3473152!3d31.484244199999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1732777328055!5m2!1sen!2s" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                style="width: 100%; min-height: 278px; border: 0;"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section class="contactUsHelpDeskDiv py-sm-5 py-4 position-relative" id="scrollspyHeading44">
            <img :src="useAssets('assets/contact-us-bg.png')" alt="" class="z-n1 position-absolute top-0 w-100">
            <div class="container-fluid px-md-5">
                <div class="row mb-4">
                    <div class="col-12 py-sm-5 py-4">
                        <div class="container px-md-5">
                            <div class="row">
                                <div class="col-12 text-center mb-3">
                                    <h2>Leave <span>Your Feedback</span></h2>
                                </div>

                                <div class="col-12">
                                    <div class="card border-0 px-md-5 px-3 py-4">
                                        <div class="card-body">
                                            <form class="row g-3 needs-validation" novalidate>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationName" required placeholder="Name">
                                                    <div class="invalid-feedback">
                                                        Please provide Name
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationEmail" required placeholder="Email">
                                                    <div class="invalid-feedback">
                                                        Please provide Email
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationContact" required placeholder="Contact Number">
                                                    <div class="invalid-feedback">
                                                        Please provide Contact Number
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationSubject" required placeholder="Subject">
                                                    <div class="invalid-feedback">
                                                        Please provide Subject
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <textarea class="form-control" id="validationMessage" rows="2" required placeholder="Message"></textarea>
                                                    <div class="invalid-feedback">
                                                        Please provide Message
                                                    </div>
                                                </div>

                                                <div class="col-12 text-end mt-4">
                                                    <button class="btn eBizPortalBtn px-5" type="submit">Submit</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</template>

