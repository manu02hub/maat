<script setup>
import SearchForm from '@/Components/mosaic/components/SearchForm.vue';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CardEvent from '@/Components/manuComponents/CardEvent.vue';
import { Head,Link } from '@inertiajs/vue3';
<<<<<<< HEAD
import PlansPanel from '@/Components/manuComponents/PlansPanel.vue';
=======
import PlansPanel from '@/Components/mosaic/partials/settings/PlansPanel.vue';
>>>>>>> carlos
</script>

<template>
    <Head title="EventsIndex" />
    <PrivateLayout>
        <PlansPanel></PlansPanel>
    </PrivateLayout>
</template>

