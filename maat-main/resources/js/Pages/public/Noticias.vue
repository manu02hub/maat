<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import CartaNoticiasComponente from '@/Components/ComponentesPaula/CartaNoticiasComponente.vue';

</script>

<template>
    <Head title="Noticias" />


    <PublicLayout>

        <div v-for="noticias in $page.props.noticia" :key="noticias.id">

            <CartaNoticiasComponente :id="noticias.id" :titulo="noticias.titulo" :fecha="noticias.fecha"
                :descripcion="noticias.descripcion" :imagen="noticias.imagen" />

        </div>
    </PublicLayout>
</template>
