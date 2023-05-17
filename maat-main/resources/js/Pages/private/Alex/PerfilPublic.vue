<!-- Parte Alex -->
<script>
export default {
    data() {
        return {
            org: "",
            // img: "http://[::1]:5173/resources/img/fondoP.jpg",
        };
    },

    methods: {
        goListado: function () {
            try {
                window.location.href = route("listado");
            } catch (error) {
                console.log(error);
            }
        },
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
        >
            <span class="goBack" @click="goListado">&#8592;</span>
        </div>
    </nav>

    <main>
        <div class="rowPropio noRowGapPropio">
            <!-- <div
                class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio fondoPPropio"
                :style="{ 'background-image': 'url(' + img + ')' }"
            /> -->
            <img
                class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio fondoPPropio"
                src="./../../../../img/fondoP.jpg"
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
                    <a
                        class="aNoDecPropio"
                        :href="route('getIdChatWith', [this.org[0].org])"
                    >
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
                                    v-if="data.rol_id == 1 || data.rol_id == 2"
                                >
                                    Administrador
                                </p>
                                <p
                                    class="descEmplPropio"
                                    v-if="data.rol_id == 3"
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
                    <a
                        class="aNoDecPropio"
                        :href="route('getIdChatWith', [this.org[0].org])"
                    >
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
/* CSS de Alex */
/*Selector universal*/
* {
    margin: 0;
    /* font-family: "Montserrat"; */
}

.goBack {
    cursor: pointer;
    font-size: 2.5rem;
    padding: 2rem;
    background-color: #73cd99;
}

.goBack:hover {
    background-color: seagreen;
}

/* Código hecho en primer trimestre de DAM y DAW (grid) */
/*El grid*/
.rowPropio {
    /* En la propiedad display agregamos grid para establecer una cuadricula */
    display: grid;
    /* Define el numero de columnas en el diseño de cuadricula */
    grid-template-columns: repeat(12, [ col] 1fr);
    /* Define la altura de cada fila */
    grid-template-rows: repeat(5, [ row] auto);
    column-gap: 1em; /* espacio entre columnas */
    row-gap: 15px; /* espacio entre filas */
}

.colPropio {
    padding: 1em; /* padding del texto */
    font-size: 14px; /* Tamaño del texto */
}

.noRowGapPropio {
    row-gap: 0;
}

.noColGapPropio {
    column-gap: 0;
}

/* Rellena espacio del nav (temporal) */
.pruebaPropio {
    height: 4rem;
    background: lightblue;
}

/* Quita el estilo que tiene los links */
.aNoDecPropio {
    text-decoration: none;
    color: black;
}

/* El fondo que hay debajo de la foto del logo de la Org */
.fondoPPropio {
    width: 100%;
    height: 13rem;
}

/* Estilo del logo (la imagen) */
.logoOrgPropio {
    /* Sus dimensiones */
    width: 13rem;
    height: 10rem;
    /* Posicionamiento de la foto/logo de perfil */
    position: absolute;
    top: 11.85rem;
    left: 6.5rem;
    background-color: white; /* Fondo del borde */
    border-radius: 3.35rem; /* Hace imagen más redonda */
    padding: 0.2rem; /* Darle un pequeno borde al foto de perfil */
}

/* Colocacion del contenedor mediante margenes y rellenos */
.contenedorDescPropio {
    background-color: lightblue;
    border: 1px solid black;
    margin-top: 2.5rem;
    margin-right: 1.5rem;
    margin-bottom: 2.5rem;
    margin-left: 2rem;
    padding-top: 2.75rem;
    padding-right: 2rem;
    padding-bottom: 2rem;
    padding-left: 2rem;
}

/* Estilo del contenedor de empleados */
.cardEmplPropio {
    margin-top: 2rem;
    margin-bottom: 2rem;
}

/* Estilo de la imagen del empleado */
.imgEmplPropio {
    height: 7.75rem;
    width: 75%;
    border-radius: 2.5rem;
    place-self: center; /* Coloca en el centro la imagen */
    /* object-fit: contain; */
}

/* Estilo del contenedor de la descripcion del empleado */
.empleadoPropio {
    padding: 0.75rem;
}

/* Estilo de la descripcion del empleado */
.descEmplPropio {
    font-size: larger;
    font-style: italic;
    margin-top: 0.5rem;
    margin-bottom: 2rem;
}

/* Estilo del boton del chat */
.btnChatPropio,
.btnChat2Propio {
    height: 4rem;
    font-size: larger;
    font-weight: bold;
    border: none;
    border-radius: 0.45rem;
    background-color: #73cd99;
    margin-bottom: 1rem;
    padding: 0.75rem;
    transition: 1s;
}

/* Este chat solo aparece cuando es pequena la pantalla */
.btnChatPropio {
    display: none;
    float: right;
}

/* Estilo del boton del chat (para pantallas grandes) */
.btnChat2Propio {
    height: 4rem;
    width: 100%;
}

/* Estilo cuando pasa el raton por encima del boton */
.btnChatPropio:hover,
.btnChat2Propio:hover {
    background-color: #2d764b;
    cursor: pointer;
    color: white;
    transition: 1s;
}

/* Para evitar que otros estilos interfieran */
.filtroSvgPropio {
    display: inline;
    vertical-align: unset;
}

/* Este estilo hace que cuando se pase el raton por encima del boton, se cambie el filtro (invertir color
del SVG (gráficos vectoriales escalables) */
/* https://stackoverflow.com/questions/22252472/how-can-i-change-the-color-of-an-svg-element */
.btnChatPropio:hover > .filtroSvgPropio,
.btnChat2Propio:hover > .filtroSvgPropio {
    /* https://developer.mozilla.org/es/docs/Web/CSS/filter */
    filter: invert(1);
    transition: 1s;
}

/* Animacion de transicion sobre el vector grafico */
.btnChatPropio > .filtroSvgPropio,
.btnChat2Propio > .filtroSvgPropio {
    transition: 1s;
}

/* Estilos sobre el contenido dentro del contenedorDesc */
/* Referido a la seccion de descripcion */
.descPropio {
    margin-top: 1rem;
}

/* Texto descripcion de la organizacion */
.descTxtPropio {
    font-size: medium;
    margin-top: 0.65rem;
    margin-bottom: 0.65rem;
}

/* Estilos responsive */
/* Pantalla grande  */
@media only screen and (min-width: 941px) {
    .col-lg-1Propio {
        grid-column: span 1;
    }
    .col-lg-2Propio {
        grid-column: span 2;
    }
    .col-lg-3Propio {
        grid-column: span 3;
    }
    .col-lg-4Propio {
        grid-column: span 4;
    }
    .col-lg-5Propio {
        grid-column: span 5;
    }
    .col-lg-6Propio {
        grid-column: span 6;
    }
    .col-lg-7Propio {
        grid-column: span 7;
    }
    .col-lg-8Propio {
        grid-column: span 8;
    }
    .col-lg-9Propio {
        grid-column: span 9;
    }
    .col-lg-10Propio {
        grid-column: span 10;
    }
    .col-lg-11Propio {
        grid-column: span 11;
    }
    .col-lg-12Propio {
        grid-column: span 12;
    }
}

/* Pantalla tablet  */
@media only screen and (min-width: 768px) and (max-width: 941px) {
    .col-md-1Propio {
        grid-column: span 1;
    }
    .col-md-2Propio {
        grid-column: span 2;
    }
    .col-md-3Propio {
        grid-column: span 3;
    }
    .col-md-4Propio {
        grid-column: span 4;
    }
    .col-md-5Propio {
        grid-column: span 5;
    }
    .col-md-6Propio {
        grid-column: span 6;
    }
    .col-md-7Propio {
        grid-column: span 7;
    }
    .col-md-8Propio {
        grid-column: span 8;
    }
    .col-md-9Propio {
        grid-column: span 9;
    }
    .col-md-10Propio {
        grid-column: span 10;
    }
    .col-md-11Propio {
        grid-column: span 11;
    }
    .col-md-12Propio {
        grid-column: span 12;
    }

    /* Ajuste de la imagen de los empleados */
    .imgEmplPropio {
        height: 4.5rem;
        width: 75%;
    }
}

/*Pantalla movil*/
@media only screen and (min-width: 451px) and (max-width: 768px) {
    .col-sm-1Propio {
        grid-column: span 1;
    }
    .col-sm-2Propio {
        grid-column: span 2;
    }
    .col-sm-3Propio {
        grid-column: span 3;
    }
    .col-sm-4Propio {
        grid-column: span 4;
    }
    .col-sm-5Propio {
        grid-column: span 5;
    }
    .col-sm-6Propio {
        grid-column: span 6;
    }
    .col-sm-7Propio {
        grid-column: span 7;
    }
    .col-sm-8Propio {
        grid-column: span 8;
    }
    .col-sm-9Propio {
        grid-column: span 9;
    }
    .col-sm-10Propio {
        grid-column: span 10;
    }
    .col-sm-11Propio {
        grid-column: span 11;
    }
    .col-sm-12Propio {
        grid-column: span 12;
    }

    /* Ajuste de la imagen del empleado */
    .imgEmplPropio {
        height: 10rem;
        width: 15rem;
    }

    /* Ajusta el texto dentro del contenedor de descripcion del empleado */
    .empleadoPropio {
        text-align: center;
    }

    /* Los botones de chat se intercambian. Aparece solo el boton para pantallas pequenas */
    .btnChatPropio {
        display: inline-block;
        width: 8rem;
    }

    .btnChat2Propio {
        display: none;
    }
}

/* Pantallas muy pequenas */
@media only screen and (max-width: 451px) {
    .col-1Propio {
        grid-column: span 1;
    }
    .col-2Propio {
        grid-column: span 2;
    }
    .col-3Propio {
        grid-column: span 3;
    }
    .col-4Propio {
        grid-column: span 4;
    }
    .col-5Propio {
        grid-column: span 5;
    }
    .col-6Propio {
        grid-column: span 6;
    }
    .col-7Propio {
        grid-column: span 7;
    }
    .col-8Propio {
        grid-column: span 8;
    }
    .col-9Propio {
        grid-column: span 9;
    }
    .col-10Propio {
        grid-column: span 10;
    }
    .col-11Propio {
        grid-column: span 11;
    }
    .col-12Propio {
        grid-column: span 12;
    }

    /* Logo ajustado a pantallas más pequenas */
    .logoOrgPropio {
        width: 10rem;
        height: 8rem;
        position: absolute;
        top: 13rem;
        left: 2rem;
        border-radius: 4.35rem;
    }

    /* Ajuste de la imagen del empleado */
    .imgEmplPropio {
        height: 6rem;
        width: 8rem;
    }

    /* Ajusta el texto dentro del contenedor de descripcion del empleado */
    .empleadoPropio {
        text-align: center;
    }

    /* Pone mas estilo cuando la pantalla es pequena*/
    .btnChatPropio {
        display: inline-block;
        width: 100%;
    }

    /* Oculta botón de chat situado en contactos */
    .btnChat2Propio {
        display: none;
    }

    /* Ajuste del contenedor de descripcion de la organizacion */
    .contenedorDescPropio {
        padding-right: 1rem;
        padding-left: 1rem;
    }
}

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
