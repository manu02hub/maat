<script setup>
import MenuSimple from '@/Components/Public/MenuSimple.vue';
import FooterSimple from '@/Components/Public/FooterSimple.vue';

</script>

<template>
    <MenuSimple/>
    <slot></slot>

    <FooterSimple/>
</template>
