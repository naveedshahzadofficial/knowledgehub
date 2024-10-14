<script>
import {useAssets} from "@/composable/use-assets";
export default {
    name: "ContactUsPage",
    methods: {
        useAssets,
    },

};
</script>

<style scoped></style>
<template>
    <section>
        <div class="top-section pb-4">
            <div class="container py-2 ebiz-portal-contact">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><i class="fas fa-angle-left"></i></li>
                        <li class="breadcrumb-item"><router-link :to="{ name: 'home'}">Home</router-link></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Contact Us</a></li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-blue-color page-header-title mt-4">Contact Us</h2>
                        <p class="text-blue-color">Your trusted partner for personalised business support and guidance.</p>
                    </div>
                </div>
            </div>
        </div>
        <section class="ebiz-portal-contact mt-5 mb-98">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-5">
                        <ul class="contact-instructions card shadow-sm mt-3">
                            <li>
                                <span class="contact-icon"><i class="fas fa-map-marker-alt"></i></span>
                                <div class="contact-inner">
                                    <label class="description">ARFA Tower, Ferozepur Road, Nishter Town, Lahore </label>
                                </div>
                            </li>
                            <li>
                                <span class="contact-icon"><i class="fas fa-phone"></i></span>
                                <div class="contact-inner">
                                    <label class="description">0800-09100</label>
                                </div>
                            </li>
                            <li>
                                <span class="contact-icon"><i class="fas fa-fax"></i></span>
                                <div class="contact-inner">
                                    <label class="description">+92-42-99232123</label>
                                </div>
                            </li>
                            <li>
                                <span class="contact-icon"><i class="fas fa-envelope"></i></span>
                                <div class="contact-inner">
                                    <label class="description"><a href="mailto:info@pitb.gov.pk">info@pitb.gov.pk</a>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 col-lg-7 pt-md-3 pt-sm-3">
                        <div class="">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3402.7529834939623!2d74.34008077511757!3d31.4759805493347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190427303d1d9b%3A0x98af47ff5799036e!2zQXJmYSBJVCBUb3dlciDYp9ix2YHYuSDYotim24wg2bnbjCDZudin2YjYsQ!5e0!3m2!1sen!2s!4v1728630364179!5m2!1sen!2s"
                                width="100%" height="254" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>    </section>
</template>

