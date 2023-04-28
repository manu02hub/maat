<!-- Parte Alex -->

<script>
export default {
    data() {
        return {
            img: 'http://[::1]:5173/resources/img/fondoP.jpg'
        }
    },

    watch: {

    },

    methods: {
    },
}

</script>

<!-- Contenido propio -->
<template>
    <!-- NavBar -->
    <nav class="row noRowGap">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 prueba"></div>
    </nav>

    <main>
        <div class="row noRowGap">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 fondoP" :style="{ 'background-image': 'url(' + img + ')' }" />
            <img src="./../../../../img/prueba.jpg" class="col-lg-12 col-md-12 col-sm-12 col-12 logoOrg" />
        </div>

        <div class="row noRowGap">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 row noRowGap noColGap">
                <!-- Contenedor para toda la información de la organización -->
                <div class="contenedorDesc col-lg-8 col-md-8 col-sm-12 col-12 ">
                    <!-- Boton del chat (solo si es pantalla pequena, si no, aparece la otra) -->
                    <a href="chat">
                        <button class="btnChat">
                            Chat
                            <img src="./../../../../img/chat-fill.svg" class="filtroSvg">
                        </button>
                    </a>

                    <!-- Mostrar descripcion -->
                    <div class="desc">
                        <h1>Nombre empresa</h1>
                        <!-- Descripción de la empresa -->
                        <p class="descTxt">
                            Descripcion de la empresa.
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint iusto saepe, illum quo cupiditate
                            voluptate sunt ipsum, nostrum nulla dolorum quasi velit temporibus esse! Obcaecati harum vel
                            nemo
                            doloribus omnis.
                        </p>
                    </div>

                    <!-- Mostrar galeria -->
                    <div class="desc">
                        <h1>Galeria</h1>
                        <!-- Descripción de la empresa -->
                        <p class="descTxt">
                            Eventos.
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint iusto saepe, illum quo cupiditate
                            voluptate sunt ipsum, nostrum nulla dolorum quasi velit temporibus esse! Obcaecati harum vel
                            nemo
                            doloribus omnis.
                        </p>
                    </div>

                    <!-- Mostrar empleados -->
                    <div class="row noRowGap noColGap cardEmpl">
                        <img src="./../../../../img/prueba.jpg" class="col-lg-3 col-md-2 col-sm-12 col-12 imgEmpl" alt="">

                        <!-- Descripcion -->
                        <div class="col-lg-9 col-md-10 col-sm-12 col-12 empleado">
                            <h2>Nombre empleado 1</h2>
                            <p class="descEmpl">Puesto</p>
                        </div>
                    </div>


                    <div class="row noRowGap noColGap cardEmpl">
                        <img src="./../../../../img/prueba.jpg" class="col-lg-3 col-md-2 col-sm-12 col-12 imgEmpl" alt="">

                        <!-- Descripcion -->
                        <div class="col-lg-9 col-md-10 col-sm-12 col-12 empleado">
                            <h2>Nombre empleado 2</h2>
                            <p class="descEmpl">Puesto</p>
                        </div>
                    </div>


                    <div class="row noRowGap noColGap cardEmpl">
                        <img src="./../../../../img/prueba.jpg" class="col-lg-3 col-md-2 col-sm-12 col-12 imgEmpl" alt="">

                        <!-- Descripcion -->
                        <div class="col-lg-9 col-md-10 col-sm-12 col-12 empleado">
                            <h2>Nombre empleado 3</h2>
                            <p class="descEmpl">Puesto</p>
                        </div>
                    </div>
                </div>
                <div class="contenedorDesc col-lg-4 col-md-4 col-sm-12 col-12 ">
                    <a href="chat">
                        <button class="btnChat2">
                            Chat
                            <img src="./../../../../img/chat-fill.svg" class="filtroSvg">
                        </button>
                    </a>

                    <div class="desc">
                        <h1>Contacto</h1>
                        <p class="descTxt">Pagina web</p>
                        <p class="descTxt">Telefono</p>
                        <p class="descTxt">Email</p>
                        <p class="descTxt">Calle</p>
                    </div>

                    <div class="desc">
                        <h1>Eventos finalizados</h1>
                        <p class="descTxt">Eventos más recientes</p>
                    </div>

                    <div class="desc">
                        <h1>Eventos en curso</h1>
                        <p class="descTxt">Eventos en curso</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
</template>

<style>
/* Importando css propio */
@import url("./../../../../css/perfil.css");
</style>
