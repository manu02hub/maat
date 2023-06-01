<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditChat from '@/Components/Private/Chat/EditChat.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <EditChat />
    </PrivateLayout>
</template>
