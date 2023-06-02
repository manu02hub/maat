<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndextiposPlan from '@/Components/Private/tiposPlan/IndextiposPlan.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <IndextiposPlan />
    </PrivateLayout>
</template>
