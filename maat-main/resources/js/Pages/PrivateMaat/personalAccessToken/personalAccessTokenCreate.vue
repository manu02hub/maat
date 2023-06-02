<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreatepersonalAccessToken from '@/Components/Private/personalAccessToken/CreatepersonalAccessToken.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <CreatepersonalAccessToken />
    </PrivateLayout>
</template>
