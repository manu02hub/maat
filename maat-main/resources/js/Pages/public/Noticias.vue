<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import CartaNoticiasComponente from '@/Components/ComponentesPaula/CartaNoticiasComponente.vue';

</script>

<template>
    <Head title="Noticias" />


    <PublicLayout>
    <CartaNoticiasComponente></CartaNoticiasComponente>
    </PublicLayout>




</template>
