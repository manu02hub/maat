<script setup>
import { Head } from '@inertiajs/vue3';
import Partners from '@/Components/Public/Partners.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import AboutUs from '@/Components/Public/AboutUs.vue';
import Hacemos from '@/Components/Public/Hacemos.vue';
import VideoIndex from '@/Components/Public/VideoIndex.vue';
import FormMailPrueba from '@/Components/Public/FormMailPrueba.vue';




</script>

<template class="container">
    <Head title="Index" />
    <PublicLayout>
        <!-- <FormMailPrueba/> -->
        <VideoIndex/>
        <AboutUs />
        <Partners />
        <Hacemos />
    </PublicLayout>
</template>


