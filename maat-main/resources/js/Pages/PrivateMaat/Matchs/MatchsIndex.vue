<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexMatchs from '@/Components/Private/Matchs/IndexMatchs.vue';
</script>
<template>
    <Head title="info Matchs" />
    <PrivateLayout>
        <IndexMatchs />
    </PrivateLayout>
</template>
