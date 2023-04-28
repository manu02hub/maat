<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import Item1 from '@/Components/ComponentesPaula/Item1.vue';

</script>

<template>
    <Head title="Item1" />


    <PublicLayout>
    <Item1></Item1>
    </PublicLayout>




</template>
