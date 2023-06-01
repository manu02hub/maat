<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexChat from '@/Components/Private/Chat/IndexChat.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <IndexChat />
    </PrivateLayout>
</template>
