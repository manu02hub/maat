<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateEvento from '@/Components/Private/Evento/CreateEvento.vue';
</script>
<template>
    <Head title="info Evento" />
    <PrivateLayout>
        <CreateEvento />
    </PrivateLayout>
</template>
