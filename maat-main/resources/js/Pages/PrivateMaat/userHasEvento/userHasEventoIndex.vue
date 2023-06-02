<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexuserHasEvento from '@/Components/Private/userHasEvento/IndexuserHasEvento.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <IndexuserHasEvento />
    </PrivateLayout>
</template>
