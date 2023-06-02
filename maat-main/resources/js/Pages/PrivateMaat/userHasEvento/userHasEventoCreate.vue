<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateuserHasEvento from '@/Components/Private/userHasEvento/CreateuserHasEvento.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <CreateuserHasEvento />
    </PrivateLayout>
</template>
