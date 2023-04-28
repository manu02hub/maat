<script setup>
import SearchForm from '@/Components/mosaic/components/SearchForm.vue';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CardEvent from '@/Components/manuComponents/CardEvent.vue';
import { Head,Link } from '@inertiajs/vue3';
import PlansPanel from '@/Components/mosaic/partials/settings/PlansPanel.vue';
</script>

<template>
    <Head title="EventsIndex" />

    <PrivateLayout>
        <PlansPanel></PlansPanel>
    </PrivateLayout>

</template>

<style scoped>
@import url('./../../../../css/bootstrap.css');
@import url('./../../../../css/app.css');
</style>
