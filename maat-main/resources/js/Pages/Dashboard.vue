<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';

import AnalyticsCard01 from '@/Components/mosaic/partials/analytics/AnalyticsCard01.vue';
import AnalyticsCard02 from '@/Components/mosaic/partials/analytics/AnalyticsCard02.vue';
import AnalyticsCard03 from '@/Components/mosaic/partials/analytics/AnalyticsCard03.vue';
import AnalyticsCard04 from '@/Components/mosaic/partials/analytics/AnalyticsCard04.vue';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';

import WelcomeBanner from '@/Components/mosaic/partials/dashboard/WelcomeBanner.vue';

import Sidebar from '@/Components/mosaic/partials/Sidebar.vue';

import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />


    <PrivateLayout>

        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden bg-white">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h1>Pagina principal de la plataforma</h1>
                </div>
            </div>
        </div>
        </div>



    </PrivateLayout>





    <!--<AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <Sidebar></Sidebar>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <AnalyticsCard01></AnalyticsCard01>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <AnalyticsCard02></AnalyticsCard02>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <AnalyticsCard03></AnalyticsCard03>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <AnalyticsCard04></AnalyticsCard04>
                </div>
            </div>
        </div>


    </AuthenticatedLayout>-->





</template>
