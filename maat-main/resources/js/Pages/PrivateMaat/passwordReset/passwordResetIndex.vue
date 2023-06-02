<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexpasswordReset from '@/Components/Private/passwordReset/IndexpasswordReset.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <IndexpasswordReset />
    </PrivateLayout>
</template>
