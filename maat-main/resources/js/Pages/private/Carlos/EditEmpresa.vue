<script setup>
import Sidebar from '@/Components/mosaic/partials/Sidebar.vue';
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import DeleteEmpresaForm from '@/Components/carlosComponents/DeleteEmpresaForm.vue';
import UpdateEmpresaInformationForm from '@/Components/carlosComponents/UpdateEmpresaInformationForm.vue';
import UpdatePasswordForm from '@/Components/carlosComponents/UpdatePasswordForm.vue';
</script>

<template>
    <Head title="Dashboard" />


    <PrivateLayout>

        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 xl:grid-cols-1">
            <UpdateEmpresaInformationForm></UpdateEmpresaInformationForm>
            <!-- Se ha quitado porque no tiene que ver al ser empresa (contrasena está asociada al user) -->
            <!-- <UpdatePasswordForm></UpdatePasswordForm> -->
            <DeleteEmpresaForm></DeleteEmpresaForm>
        </div>

    </PrivateLayout>
</template>
