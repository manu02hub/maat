<script>

export default {
    name: 'AvatarUsus',
    props: ['imagen'],
}

</script>

<template>

    <!-- Avatars group -->
    <img class="rounded-full border-2 border-white box-content object-fit-cover" :src="imagen" alt="" style="width: 86px; height: 86px;"/>

</template>
