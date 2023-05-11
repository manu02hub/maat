<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import editarPerfilUsuarioONG from '@/Components/componets-Sergio/UsuariosONG/Editar/AccountPanel.vue'
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <editarPerfilUsuarioONG/>
    </PrivateLayout>
</template>
