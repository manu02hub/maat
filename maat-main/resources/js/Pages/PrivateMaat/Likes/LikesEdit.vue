<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditLikes from '@/Components/Private/Likes/EditLikes.vue';
</script>
<template>
    <Head title="info Likes" />
    <PrivateLayout>
        <EditLikes />
    </PrivateLayout>
</template>
