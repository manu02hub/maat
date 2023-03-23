<script setup>
import Sidebar from '@/Components/mosaic/partials/Sidebar.vue';
import HeaderVue from '@/Components/mosaic/partials/Header.vue';
</script>

<template>
    <div class="flex h-screen overflow-hidden">
        <Sidebar :sidebarOpen="sidebarOpen" @close-sidebar="sidebarOpen = false" />

        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden bg-gray-100">
            <!-- Site header -->
            <HeaderVue :sidebarOpen="sidebarOpen" @toggle-sidebar="sidebarOpen = !sidebarOpen" />
            <main>
                    <slot ></slot>
            </main>
        </div>
    </div>
</template>
