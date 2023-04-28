<script setup>
import NavbarResponsive from '@/Components/Public/NavbarResponsive.vue';
import FooterSimple from '@/Components/Public/FooterSimple.vue';

</script>

<template>
    <NavbarResponsive/>
    <slot></slot>

    <FooterSimple/>
</template>
