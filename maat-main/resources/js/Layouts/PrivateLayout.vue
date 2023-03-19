<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';

import AnalyticsCard01 from '@/Components/mosaic/partials/analytics/AnalyticsCard01.vue';
import AnalyticsCard02 from '@/Components/mosaic/partials/analytics/AnalyticsCard02.vue';
import AnalyticsCard03 from '@/Components/mosaic/partials/analytics/AnalyticsCard03.vue';
import AnalyticsCard04 from '@/Components/mosaic/partials/analytics/AnalyticsCard04.vue';


import WelcomeBanner from '@/Components/mosaic/partials/dashboard/WelcomeBanner.vue';

import Sidebar from '@/Components/mosaic/partials/Sidebar.vue';
import HeaderVue from '@/Components/mosaic/partials/Header.vue';
</script>

<template>



    <div class="flex h-screen overflow-hidden">
    <Sidebar :sidebarOpen="sidebarOpen" @close-sidebar="sidebarOpen = false" />

    <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden bg-white">
      <!-- Site header -->
      <HeaderVue :sidebarOpen="sidebarOpen" @toggle-sidebar="sidebarOpen = !sidebarOpen" />


      <main>
        <div class="relative flex">
            <slot></slot>
        </div>

    </main>




</div>
    </div>






</template>
