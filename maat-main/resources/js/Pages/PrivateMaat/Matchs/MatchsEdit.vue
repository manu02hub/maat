<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditMatchs from '@/Components/Private/Matchs/EditMatchs.vue';
</script>
<template>
    <Head title="info Matchs" />
    <PrivateLayout>
        <EditMatchs />
    </PrivateLayout>
</template>
