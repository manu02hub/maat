<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateChat from '@/Components/Private/Chat/CreateChat.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <CreateChat />
    </PrivateLayout>
</template>
