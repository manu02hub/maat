<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import CartaNoticiasComponente from '@/Components/ComponentesPaula/CartaNoticiasComponente.vue';

</script>

<template>
    <Head title="Noticias" />


    <PublicLayout>
<<<<<<< HEAD
    <CartaNoticiasComponente></CartaNoticiasComponente>
    </PublicLayout>




=======
        <div class="col p-5 m-10" style="background-color:rgb(239, 239, 239);">
            <!-- Content -->
            <div class="grow p-5 flex flex-col">
                <div class="grow">
                    <h3 class="text-lg font-bold text-slate-800">Artículo destacado de la semana</h3>
                    <div class="text-sm font-semibold text-indigo-500 uppercase mb-2">Martes 28 Enero, 2013</div>
                    <router-link class="inline-flex mb-2" to="/community/meetups-post">
                        <h3 class="text-lg font-bold text-slate-800">“Los coches diésel más nuevos tienen exceso de
                            emisiones en el 77% de las pruebas, según una ONG</h3>
                    </router-link>
                    <div class="text-sm">El Consejo Internacional de Transporte Limpio denuncia que estos datos, recabados
                        de los test oficiales y de investigaciones independientes, sugieren que las marcas siguen usando
                        dispositivos de desactivación como los prohibidos tras el ‘dieselgate’.
                    </div>
                </div>
            </div>
        </div>
        <div v-for="noticias in $page.props.noticia" :key="noticias.id">

            <CartaNoticiasComponente :id="noticias.id" :titulo="noticias.titulo" :fecha="noticias.fecha"
                :descripcion="noticias.descripcion" :imagen="noticias.imagen" />

        </div>
    </PublicLayout>
>>>>>>> carlos
</template>
