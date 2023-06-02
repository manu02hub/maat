<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreatepasswordReset from '@/Components/Private/passwordReset/CreatepasswordReset.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <CreatepasswordReset />
    </PrivateLayout>
</template>
