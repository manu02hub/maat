<script setup>

import AnalyticsCard01 from '@/Components/mosaic/partials/analytics/AnalyticsCard01.vue';
import AnalyticsCard02 from '@/Components/mosaic/partials/analytics/AnalyticsCard02.vue';
import Formulario from '@/Components/Formulario.vue';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="edit" />


    <PrivateLayout>
<div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden bg-white">
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1  class="font-bold text-xl my-4">Formulario de edición</h1>
            <Formulario></Formulario>
        </div>
    </div>
</div>
</div>


</PrivateLayout>






</template>
