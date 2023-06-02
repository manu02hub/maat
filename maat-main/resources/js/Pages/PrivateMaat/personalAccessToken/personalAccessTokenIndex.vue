<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexpersonalAccessToken from '@/Components/Private/personalAccessToken/IndexpersonalAccessToken.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <IndexpersonalAccessToken />
    </PrivateLayout>
</template>
