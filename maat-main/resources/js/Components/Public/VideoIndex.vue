<script>
import vid1 from "../../../video/playa.mp4";
import vid2 from "../../../video/bosque.mp4";
import vid3 from "../../../video/playa2.mp4";
import vid4 from "../../../video/carreteraBosque.mp4";

export default {
    data() {
        return {
            videos: [vid1, vid2,vid3,vid4],
        };
    },
    methods: {
        Random() {
            return Math.floor(Math.random() * (this.videos.length - 1 + 1) + 1)-1;
        },
    },
};
</script>
<template>
    <div class="videoContenedor item-a mb-5">
        <!-- controls autoplay muted loop -->
        <img style="margin: 0 auto" src="../../../img/mancha.png" />
        <video autoplay muted loop>
            <source :src="videos[Random()]" type="video/mp4" />
            Your browser does not support the video tag.
        </video>
    </div>
</template>

<style>
.videoContenedor {
    text-align: center;
    width: 75%;
    margin: 0 auto;
}

.videoContenedor img {
    position: absolute;
    text-align: center;
    width: 75%;
}

video {
    text-align: center;
}
</style>
