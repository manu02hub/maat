<!-- Parte Alex -->
<script>
export default {
    data() {
        return {
            org: "",
            img: "http://[::1]:5173/resources/img/fondoP.jpg",
        };
    },

    // Pone las variables para que luego se puedan montarse
    beforeMount() {
        try {
            this.org = this.$page.props.datos;
        } catch (error) {
            console.log(error);
        }
    },
};
</script>

<!-- Contenido propio -->
<template>
    <!-- NavBar -->
    <nav class="rowPropio noRowGapPropio">
        <div
            class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio pruebaPropio"
        ></div>
    </nav>

    <main>
        <div class="rowPropio noRowGapPropio">
            <div
                class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio fondoPPropio"
                :style="{ 'background-image': 'url(' + img + ')' }"
            />
            <img
                src="./../../../../img/prueba.jpg"
                class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio logoOrgPropio"
            />
        </div>

        <div class="rowPropio noRowGapPropio">
            <div
                class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio rowPropio noRowGapPropio noColGapPropio"
            >
                <!-- Contenedor para toda la información de la organización -->
                <div
                    class="contenedorDescPropio col-lg-8Propio col-md-8Propio col-sm-12Propio col-12Propio"
                >
                    <!-- Boton del chat (solo si es pantalla pequena, si no, aparece la otra) -->
                    <a class="aNoDecPropio" :href="route('getIdChatWith', [this.org[0].org])">
                        <button class="btnChatPropio">
                            Chat
                            <img
                                src="./../../../../img/chat-fill.svg"
                                class="filtroSvgPropio"
                            />
                        </button>
                    </a>

                    <!-- Mostrar descripcion -->
                    <div class="descPropio">
                        <h1 class="h1StyleDefault">{{ this.org[0].nombre }}</h1>

                        <!-- Mira si es una ONG o una empresa -->
                        <h3
                            class="typePropio"
                            v-if="this.$page.props.isOng == 1"
                        >
                            ONG
                        </h3>
                        <h3
                            class="typePropio"
                            v-else="this.$page.props.isOng != 1"
                        >
                            Empresa
                        </h3>

                        <!-- Descripción de la empresa -->
                        <p class="descTxtPropio">
                            {{ this.org[0].descripcion }}
                        </p>
                    </div>

                    <!-- Mostrar galeria -->
                    <div class="descPropio">
                        <h1 class="h1StyleDefault">Galeria</h1>

                        <!-- Descripción de la empresa -->
                        <p class="descTxtPropio">
                            Eventos. Lorem ipsum dolor sit amet consectetur,
                            adipisicing elit. Sint iusto saepe, illum quo
                            cupiditate voluptate sunt ipsum, nostrum nulla
                            dolorum quasi velit temporibus esse! Obcaecati harum
                            vel nemo doloribus omnis.
                        </p>
                    </div>

                    <!-- Mostrar empleados -->
                    <div
                        class="rowPropio noRowGapPropio noColGapPropio cardEmplPropio"
                        v-for="(data, index) in org"
                    >
                        <!-- Solo muestra los 3 primeros empleados de la lista -->
                        <template v-if="index < 3">
                            <img
                                src="./../../../../img/prueba.jpg"
                                class="col-lg-3Propio col-md-2Propio col-sm-12Propio col-12Propio imgEmplPropio"
                                alt=""
                            />

                            <!-- Descripcion -->
                            <div
                                class="col-lg-9Propio col-md-10Propio col-sm-12Propio col-12Propio empleadoPropio"
                            >
                                <h2 class="h2TitlePropio">
                                    {{ data.empleado }}
                                </h2>
                                <!-- Dice si eres un administrador o un empleado -->
                                <p class="descTxtPropio">
                                    Contacto: {{ data.email }}
                                </p>
                                <p
                                    class="descEmplPropio"
                                    v-if="data.rol_id == 1"
                                >
                                    Administrador
                                </p>
                                <p
                                    class="descEmplPropio"
                                    v-if="data.rol_id == 2"
                                >
                                    Empleado
                                </p>
                            </div>
                        </template>
                    </div>
                </div>
                <div
                    class="contenedorDescPropio col-lg-4Propio col-md-4Propio col-sm-12Propio col-12Propio"
                >
                    <a class="aNoDecPropio" :href="route('getIdChatWith', [this.org[0].org])">
                        <button class="btnChat2Propio">
                            Chat
                            <img
                                src="./../../../../img/chat-fill.svg"
                                class="filtroSvgPropio"
                            />
                        </button>
                    </a>

                    <div class="descPropio">
                        <h1 class="h1StyleDefault">Contacto</h1>
                        <p class="descTxtPropio">{{ this.org[0].web }}</p>
                        <p class="descTxtPropio">
                            {{ this.org[0].numero_tarjeta }}
                        </p>
                        <p class="descTxtPropio">{{ this.org[0].ubicacion }}</p>
                    </div>

                    <div class="descPropio">
                        <h1 class="h1StyleDefault">Eventos finalizados</h1>
                        <p class="descTxtPropio">Eventos más recientes</p>
                    </div>

                    <div class="descPropio">
                        <h1 class="h1StyleDefault">Eventos en curso</h1>
                        <p class="descTxtPropio">Eventos en curso</p>
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

/* Estilos de h1 por defecto */
.h1StyleDefault {
    display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}

.typePropio {
    /* Estilos de h3 por defecto */
    display: block;
    font-size: 1.17em;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;

    /* Estilos añadidos */
    font-style: italic;
    margin-top: 0.35rem;
}

/* Los estilos por defecto. Aparece si escribe h2 */
.h2TitlePropio {
    display: block;
    font-size: 1.5em;
    margin-block-start: 0.83em;
    margin-block-end: 0.83em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}
</style>
