<!-- Parte Alex -->
<script>
export default {
    data() {
        return {
            org: '',
            img: 'http://[::1]:5173/resources/img/fondoP.jpg'
        }
    },

    // Pone las variables para que luego se puedan montarse
    beforeMount() {
        try {
            this.org = this.$page.props.datos;
        } catch (error) {
            console.log(error);
        }
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
                    <a :href="route('getIdChatWith', [this.org[0].org])">
                        <button class="btnChat">
                            Chat
                            <img src="./../../../../img/chat-fill.svg" class="filtroSvg">
                        </button>
                    </a>

                    <!-- Mostrar descripcion -->
                    <div class="desc">
                        <h1>{{ this.org[0].nombre }}</h1>

                        <!-- Mira si es una ONG o una empresa -->
                        <h3 class="type" v-if="this.$page.props.isOng == 1">ONG</h3>
                        <h3 class="type" v-else="this.$page.props.isOng != 1">Empresa</h3>

                        <!-- Descripción de la empresa -->
                        <p class="descTxt">
                            {{ this.org[0].descripcion }}
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
                    <div class="row noRowGap noColGap cardEmpl" v-for="(data, index) in org">
                        <!-- Solo muestra los 3 primeros empleados de la lista -->
                        <template v-if="index < 3">
                            <img src="./../../../../img/prueba.jpg" class="col-lg-3 col-md-2 col-sm-12 col-12 imgEmpl"
                                alt="">

                            <!-- Descripcion -->
                            <div class="col-lg-9 col-md-10 col-sm-12 col-12 empleado">
                                <h2>{{ data.empleado }}</h2>
                                <!-- Dice si eres un administrador o un empleado -->
                                <p class="descTxt">Contacto: {{ data.email }}</p>
                                <p class="descEmpl" v-if="data.rol_id == 1">Administrador</p>
                                <p class="descEmpl" v-if="data.rol_id == 2">Empleado</p>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="contenedorDesc col-lg-4 col-md-4 col-sm-12 col-12 ">
                    <a :href="route('getIdChatWith', [this.org[0].org])">
                        <button class="btnChat2">
                            Chat
                            <img src="./../../../../img/chat-fill.svg" class="filtroSvg">
                        </button>
                    </a>

                    <div class="desc">
                        <h1>Contacto</h1>
                        <p class="descTxt">{{ this.org[0].web }}</p>
                        <p class="descTxt">{{ this.org[0].numero_tarjeta }}</p>
                        <p class="descTxt">{{ this.org[0].ubicacion }}</p>
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

<style scoped>
/* Importando css propio */
@import url("./../../../../css/perfil.css");

.type {
    font-style: italic;
    margin-top: 0.35rem;
}
</style>
