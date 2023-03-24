<script setup>

import AnalyticsCard01 from '@/Components/mosaic/partials/analytics/AnalyticsCard01.vue';
import AnalyticsCard02 from '@/Components/mosaic/partials/analytics/AnalyticsCard02.vue';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CustomersTable from '@/Components/mosaic/partials/customers/CustomersTable.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="show" />


    <PrivateLayout>
<div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden bg-white">
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1>Crud</h1>
        </div>
    </div>
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <CustomersTable/>
        </div>
    </div>
</div>
</div>



</PrivateLayout>






</template>
