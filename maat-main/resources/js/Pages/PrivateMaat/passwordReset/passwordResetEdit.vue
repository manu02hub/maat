<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditpasswordReset from '@/Components/Private/passwordReset/EditpasswordReset.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <EditpasswordReset />
    </PrivateLayout>
</template>
