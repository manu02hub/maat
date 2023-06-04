<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexFailed_jobs from '@/Components/Private/Failed_jobs/IndexFailed_jobs.vue';
</script>
<template>
    <Head title="info Failed_jobs" />
    <PrivateLayout>
        <IndexFailed_jobs />
    </PrivateLayout>
</template>
