<script setup>
defineProps(['message']);
</script>

<template>
    <div v-show="message">
        <p class="text-sm text-red-600">
            {{ message }}
        </p>
    </div>
</template>

<style scoped>
@import url('./../../css/bootstrap.css');
@import url('./../../css/app.css');
</style>
