<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexEvento from '@/Components/Private/Evento/IndexEvento.vue';
</script>
<template>
    <Head title="info Evento" />
    <PrivateLayout>
        <IndexEvento />
    </PrivateLayout>
</template>
