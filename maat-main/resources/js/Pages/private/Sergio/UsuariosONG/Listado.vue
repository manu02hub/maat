<script setup>
import { Head } from "@inertiajs/vue3";
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import listadoUsuarios from "@/Components/componets-Sergio/UsuariosONG/Listado/CustomersTable.vue";
</script>
<template>
    <Head title="Usuarios" />

    <PrivateLayout>
        <listadoUsuarios />
    </PrivateLayout>
</template>
