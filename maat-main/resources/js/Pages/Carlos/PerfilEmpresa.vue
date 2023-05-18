<script setup>
import Sidebar from "@/Components/mosaic/partials/Sidebar.vue";

import { Head } from "@inertiajs/vue3";
import ComponentePerfil from "@/Components/carlosComponents/ComponentePerfil.vue";
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
</script>

<template>
    <Head title="Perfil de EmpresaESTE" />
    <PrivateLayout>
        <div
            class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 xl:grid-cols-1"
        >
            <ComponentePerfil></ComponentePerfil>
        </div>
    </PrivateLayout>
</template>
