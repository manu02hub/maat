<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps(['href']);

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center border-b-2 border-indigo-400 text-sm font-medium leading-5 text-white-900 focus:outline-none transition duration-150 ease-in-out'
        : 'inline-flex items-center border-b-2 border-transparent text-sm font-medium leading-5 text-white-500 hover:text-white-700 focus:outline-none focus:text-white-700 transition duration-150 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

<style>
@import url('./../../css/bootstrap.css');
@import url('./../../css/app.css');
</style>
