<script>
export default {
    data() {
        return {
            imagenes: [
                "https://logodownload.org/wp-content/uploads/2014/04/coca-cola-logo-1.png",
                "https://upload.wikimedia.org/wikipedia/commons/4/4f/NUEVO-alta-LOGO-IMF.png",
                "https://www.sonrisasdebombay.org/wp-content/uploads/2020/03/logo-sonrisas-png.png",
                "https://images.squarespace-cdn.com/content/v1/57bde26fc534a5f019199b78/f169cb70-4ce1-4aad-90d4-781a754a4c9b/JA_Southeastern+Michigan_HZ_Full+Color.png",
                "https://caongd.org/wp-content/uploads/2018/05/Logo-Manos-Unidas.jpg",
                "https://logodownload.org/wp-content/uploads/2014/04/coca-cola-logo-1.png",
                "https://upload.wikimedia.org/wikipedia/commons/4/4f/NUEVO-alta-LOGO-IMF.png",
                "https://www.sonrisasdebombay.org/wp-content/uploads/2020/03/logo-sonrisas-png.png",
                "https://images.squarespace-cdn.com/content/v1/57bde26fc534a5f019199b78/f169cb70-4ce1-4aad-90d4-781a754a4c9b/JA_Southeastern+Michigan_HZ_Full+Color.png",
                "https://caongd.org/wp-content/uploads/2018/05/Logo-Manos-Unidas.jpg",
            ],
        };
    },
};
</script>

<template>
    <div class="containerPartners m-5">

        <div class="title">
            <h1>Partners</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.</p>
        </div>

        <div class="slider">
            <div class="slide-tack">
                <div class="slide"><img :src="imagenes[0]" alt="">
                </div>
                <div class="slide"><img :src="imagenes[1]" alt="">
                </div>
                <div class="slide"><img :src="imagenes[2]" alt="">
                </div>
                <div class="slide"><img :src="imagenes[3]" alt="">
                </div>
                <div class="slide"><img :src="imagenes[4]" alt="">
                </div>
                <div class="slide"><img :src="imagenes[5]" alt="">
                </div>
                <div class="slide"><img :src="imagenes[6]" alt="">
                </div>
                <div class="slide"><img :src="imagenes[7]" alt="">
                </div>
                <div class="slide"><img :src="imagenes[8]" alt="">
                </div>
                <div class="slide"><img :src="imagenes[9]" alt="">
                </div>

            </div>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum.</p>

    </div>
</template>


<style>
.containerPartners h1 {
    font-size: 75px;
}

.containerPartners p {
    text-align: justify;
    margin-bottom: 50px;
}

.title p {
    font-size: small;
}

.slider {
    display: flex;
    height: auto;
    margin: auto;
    overflow: hidden;
    align-items: center;
}

.slider:before {
    position: absolute;
    z-index: 1;
    left: 0;
    content: "";
    width: 23.958%;
    height: 15%;
    background: linear-gradient(-90deg, hsla(0, 0%,
                96.9%, 0), #f7f7f7);
}

.slider:after {
    position: absolute;
    right: 0;
    content: "";
    width: 23.958%;
    height: 15%;
    background: linear-gradient(90deg,
            hsla(0, 0%, 96.9%, 0),
            hsla(0, 0%, 96.9%, 0.99)99%);
}

.slider .slide-tack {
    display: flex;
    -webkit-animation: scroll 40s linear infinite;
    animation: scroll 40s linear infinite;
    width: calc(240px * 10);
}

.slider .slide {
    display: flex;
}

.slider .slide img {
    width: 180px;
    height: 70px;
    padding: 10%;
    background-color: white;
    cursor: pointer;
    margin: 20px;
    border-radius: 8px;
    box-shadow: rgba(50, 50, 93, 0.25)0px 2px 5px -1px,
        rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}

@keyframes scroll {
    0% {
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }

    100% {
        -webkit-transform: translateX(calc(-250px * 8));
        transform: translateX(calc(-250px * 8));
    }
}
</style>