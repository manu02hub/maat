<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import editarPerfilUsuarioEmpresa from '@/Components/componets-Sergio/AccountPanel.vue'
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <editarPerfilUsuarioEmpresa />
    </PrivateLayout>
</template>
