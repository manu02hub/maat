<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateMigrations from '@/Components/Private/Migrations/CreateMigrations.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <CreateMigrations />
    </PrivateLayout>
</template>
