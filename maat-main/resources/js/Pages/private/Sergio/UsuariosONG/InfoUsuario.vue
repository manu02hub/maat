<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import perfilUsuarioONG from '@/Components/componets-Sergio/UsuariosONG/Perfil/ProfileBody.vue'
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <perfilUsuarioONG/>
    </PrivateLayout>
</template>
