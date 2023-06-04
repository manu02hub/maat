<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateFailed_jobs from '@/Components/Private/Failed_jobs/CreateFailed_jobs.vue';
</script>
<template>
    <Head title="info Failed_jobs" />
    <PrivateLayout>
        <CreateFailed_jobs />
    </PrivateLayout>
</template>
