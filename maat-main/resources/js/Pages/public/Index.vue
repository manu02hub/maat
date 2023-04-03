<script setup>
import { Head } from '@inertiajs/vue3';
import Partners from '@/Components/Public/Partners.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import AboutUs from '@/Components/Public/AboutUs.vue';
import Hacemos from '@/Components/Public/Hacemos.vue';

</script>

<template class="container">
    <Head title="Index" />
    <PublicLayout>
        <div class="videoContenedor item-a mb-5">
            <!-- controls autoplay muted loop -->
            <img style="margin: 0 auto;" src="../../../img/mancha.png">
            <video autoplay muted loop>
                <source src="../../../video/playa.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <AboutUs />

        <Partners />




        <Hacemos />

    </PublicLayout>
</template>

<style>
.videoContenedor {
    text-align: center;
    width: 50%;
    margin: 0 auto;

}

.videoContenedor img {
    position: absolute;
    text-align: center;
    width: 51%;
}

video {
    text-align: center;

}
</style>
