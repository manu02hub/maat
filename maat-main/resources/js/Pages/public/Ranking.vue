<script setup>
import PublicLayout from "@/Layouts/PublicLayout.vue";
import { Head } from "@inertiajs/vue3";
import Podium from "@/Components/Public/Podium.vue";
</script>
<template>
    <Head title="Ranking" />

    <PublicLayout>
        <Podium/>
    </PublicLayout>
</template>