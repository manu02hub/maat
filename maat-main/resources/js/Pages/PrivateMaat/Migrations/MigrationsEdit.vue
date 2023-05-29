<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditMigrations from '@/Components/Private/Migrations/EditMigrations.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <EditMigrations />
    </PrivateLayout>
</template>
