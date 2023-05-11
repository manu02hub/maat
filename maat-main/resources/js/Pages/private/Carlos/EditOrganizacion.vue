<script setup>
import Sidebar from '@/Components/mosaic/partials/Sidebar.vue';
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import DeleteOrganizacionForm from '@/Components/carlosComponents/DeleteOrganizacionForm.vue';
import UpdateOrganizacionInformationForm from '@/Components/carlosComponents/UpdateOrganizacionInformationForm.vue';
import UpdatePasswordForm from '@/Components/carlosComponents/UpdatePasswordForm.vue';
</script>

<template>
    <Head title="Dashboard" />


    <PrivateLayout>

        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 xl:grid-cols-1">
            <UpdateOrganizacionInformationForm></UpdateOrganizacionInformationForm>
            <!-- Se ha quitado porque no tiene que ver al ser Organizacion (contrasena está asociada al user) -->
            <!-- <UpdatePasswordForm></UpdatePasswordForm> -->
            <DeleteOrganizacionForm></DeleteOrganizacionForm>
        </div>

    </PrivateLayout>
</template>
