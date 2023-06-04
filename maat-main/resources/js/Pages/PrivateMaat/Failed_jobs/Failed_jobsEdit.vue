<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditFailed_jobs from '@/Components/Private/Failed_jobs/EditFailed_jobs.vue';
</script>
<template>
    <Head title="info Failed_jobs" />
    <PrivateLayout>
        <EditFailed_jobs />
    </PrivateLayout>
</template>
