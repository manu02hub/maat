<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EdituserHasEvento from '@/Components/Private/userHasEvento/EdituserHasEvento.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <EdituserHasEvento />
    </PrivateLayout>
</template>
