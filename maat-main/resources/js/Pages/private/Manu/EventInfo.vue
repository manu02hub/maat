<script setup>
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import ProfileBody from '@/Components/mosaic/partials/community/ProfileBody.vue';
import EventInfoComponent from '@/Components/manuComponents/EventInfoComponent.vue';
import { Head, Link } from '@inertiajs/vue3';

</script>

<template>
    <Head title="EventsUser" />
    <PrivateLayout>

        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 xl:grid-cols-1">
            <EventInfoComponent></EventInfoComponent>
        </div>

    </PrivateLayout>
</template>

<style scoped>
@import url('./../../../../css/bootstrap.css');
@import url('./../../../../css/app.css');
</style>
