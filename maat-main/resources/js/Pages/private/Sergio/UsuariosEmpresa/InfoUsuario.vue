<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import perfilUsuarioEmpresa from '@/Components/componets-Sergio/UsuariosEmpresa/Perfil/ProfileBody.vue'
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <perfilUsuarioEmpresa />
    </PrivateLayout>
</template>
