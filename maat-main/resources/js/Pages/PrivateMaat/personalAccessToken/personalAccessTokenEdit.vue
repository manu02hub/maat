<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditpersonalAccessToken from '@/Components/Private/personalAccessToken/EditpersonalAccessToken.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <EditpersonalAccessToken />
    </PrivateLayout>
</template>
