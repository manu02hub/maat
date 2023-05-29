<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexMigrations from '@/Components/Private/Migrations/IndexMigrations.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <IndexMigrations />
    </PrivateLayout>
</template>
