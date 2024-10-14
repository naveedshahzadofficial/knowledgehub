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
                    <div class="col-12">
                        <p>Duis nec malesuada dolor, eu dictum lacus. Integer non risus dictum sapien auctor volutpat. Pellentesque at tincidunt dolor. Suspendisse et iaculis mi, eu vehicula erat. Mauris ac massa blandit, iaculis felis non, malesuada sapien. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean vestibulum metus sit amet nisi auctor laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi accumsan leo quis nibh bibendum, in consequat ante consequat. Integer quis velit est. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut vitae imperdiet metus, sit amet faucibus erat. Etiam volutpat lectus a dui placerat venenatis. Nam mollis massa sit amet sapien vehicula, a posuere lectus molestie. Nam vitae mi in sem luctus egestas.</p>
                        <p>Suspendisse eget blandit ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum rhoncus, justo sed ultricies accumsan, diam ex elementum elit, eu pulvinar diam tortor et elit. Proin auctor arcu orci, sed interdum leo aliquam vel. Vestibulum lacinia, nibh et elementum pellentesque, orci erat ornare urna, et euismod diam libero sit amet purus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam efficitur dui metus, nec dignissim libero tempor ut. Proin id rutrum ante. Vestibulum accumsan, dolor id mollis fringilla, felis lacus viverra leo, porttitor commodo ligula justo eu ante. Duis nisl lacus, mattis quis tempor eu, lobortis a mi.</p>
                        <p>Fusce faucibus, velit ac ornare sollicitudin, quam metus sagittis turpis, at hendrerit nibh purus quis risus. Vestibulum non ultrices odio. Nunc neque dolor, accumsan ut porttitor ut, mollis eget nibh. Phasellus efficitur rutrum velit et dapibus. Mauris bibendum elit sit amet pellentesque varius. Cras tempor tempus justo sed lobortis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer quis tortor gravida ligula euismod tincidunt.</p>
                        <p>Suspendisse eget blandit ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum rhoncus, justo sed ultricies accumsan, diam ex elementum elit, eu pulvinar diam tortor et elit. Proin auctor arcu orci, sed interdum leo aliquam vel. Vestibulum lacinia, nibh et elementum pellentesque, orci erat ornare urna, et euismod diam libero sit amet purus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam efficitur dui metus, nec dignissim libero tempor ut. Proin id rutrum ante. Vestibulum accumsan, dolor id mollis fringilla, felis lacus viverra leo, porttitor commodo ligula justo eu ante. Duis nisl lacus, mattis quis tempor eu, lobortis a mi.</p>
                    </div>
                </div>
            </div>
        </main>
    </section>
</template>

