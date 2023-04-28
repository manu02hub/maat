<script setup>
defineProps(['value']);
</script>

<template>
    <label class="block font-medium text-sm text-gray-700">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>

<style scoped>
@import url('./../../css/bootstrap.css');
@import url('./../../css/app.css');
</style>
