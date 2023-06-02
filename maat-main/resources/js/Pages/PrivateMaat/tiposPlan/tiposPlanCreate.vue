<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreatetiposPlan from '@/Components/Private/tiposPlan/CreatetiposPlan.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <CreatetiposPlan />
    </PrivateLayout>
</template>
