<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateLikes from '@/Components/Private/Likes/CreateLikes.vue';
</script>
<template>
    <Head title="info Likes" />
    <PrivateLayout>
        <CreateLikes />
    </PrivateLayout>
</template>
