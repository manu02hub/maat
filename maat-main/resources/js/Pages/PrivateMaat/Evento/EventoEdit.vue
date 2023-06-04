<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditEvento from '@/Components/Private/Evento/EditEvento.vue';
</script>
<template>
    <Head title="info Evento" />
    <PrivateLayout>
        <EditEvento />
    </PrivateLayout>
</template>
