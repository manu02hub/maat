<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateValoracion from '@/Components/Private/Valoraciones/CreateValoracion.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <CreateValoracion />
    </PrivateLayout>
</template>
