<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateMatchs from '@/Components/Private/Matchs/CreateMatchs.vue';
</script>
<template>
    <Head title="info Matchs" />
    <PrivateLayout>
        <CreateMatchs />
    </PrivateLayout>
</template>
