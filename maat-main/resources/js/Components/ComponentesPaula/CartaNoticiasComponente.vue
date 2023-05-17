<script setup>
import { defineProps } from 'vue'
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    id: {
        type: Number,
        required: true
    },
    titulo: {
        type: String,
        required: true
    },
    fecha: {
        type: String,
        required: true
    },
    descripcion: {
        type: String,
        required: true
    },
    imagen: {
        type: String,
        required: true
    }
})
</script>

<template>
    <div class="grid xl:grid-cols-1 gap-6 m-10">
        <!-- Item 1 -->
        <article class="flex bg-white shadow-lg rounded-sm border border-slate-200 overflow-hidden">
            <!-- Image -->
            <router-link class="relative block w-24 sm:w-56 xl:sidebar-expanded:w-40 2xl:sidebar-expanded:w-56 shrink-0"
                to="/community/meetups-post">
                <img class="absolute object-cover object-center w-full h-full"
                    :src="imagen"
                    width="220" height="236" alt="Meetup 01" />
            </router-link>
            <!-- Content -->
            <div class="grow p-5 flex flex-col">
                <div class="grow">
                    <div class="text-sm font-semibold text-indigo-500 uppercase mb-2">{{ fecha }}</div>
                    <router-link class="inline-flex mb-2" to="/community/meetups-post">
                        <a :href="route('item1noticia')" class="text-lg font-bold text-slate-800">{{ titulo }}</a>
                    </router-link>
                    <div class="text-sm">{{ descripcion }}
                    </div>
                </div>
            </div>
        </article>
    </div>
</template>

