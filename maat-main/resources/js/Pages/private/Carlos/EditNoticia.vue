<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditarNoticiaComponent from '@/Components/carlosComponents/EditarNoticiaComponent.vue'
</script>
<template>
    <Head title="Editar Noticia" />
    <PrivateLayout>
        <div>

            <EditarNoticiaComponent />

        </div>
    </PrivateLayout>
</template>
