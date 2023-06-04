<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexLikes from '@/Components/Private/Likes/IndexLikes.vue';
</script>
<template>
    <Head title="info Likes" />
    <PrivateLayout>
        <IndexLikes />
    </PrivateLayout>
</template>
