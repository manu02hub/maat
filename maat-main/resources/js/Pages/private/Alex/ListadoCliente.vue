<!-- Parte Alex -->

<script>
import axios from "axios";

import * as Validaciones from "./../../../validations/Validaciones.js";

export default {
    data() {
        return {
            filter: false,
            organization: false,
            user: "",
            orgs: "",
            ongsRecientes: "",

<<<<<<< HEAD
            // Filtro para el buscador
            searchFilter: "",
            filteredList: [],

            // Datos para paginación
            maxPags: 0,
            indexPag: 1,
            listData: "",
=======
            prueba: "",
            prueba1: "asd@asd.com",
            prueba2: "12345678",
            prueba3: "12345678",
>>>>>>> carlos
        };
    },

    methods: {
<<<<<<< HEAD
        // Paginación
        previousPag: function () {
            var start = 0;
            var end = 0;

            try {
                if (this.indexPag != 1) {
                    // Depende del valor pasado, hace una cosa u otra. Si es falso, entonces es recientes.
                    // Si es verdadero, entonces son todas las organizaciones
                    if (!this.organization && this.filteredList.length == 0) {
                        this.listData = this.ongsRecientes;
                    } else if (
                        this.organization &&
                        this.filteredList.length == 0
                    ) {
                        this.listData = this.orgs;
                    } else {
                        this.listData = this.filteredList;
                    }

                    // Va una página atrás
                    this.indexPag--;

                    // Indica inicio y final de elementos
                    start = this.indexPag * 2 - 2;
                    end = this.indexPag * 2;

                    // Coge solo los elementos de la posición indicada
                    this.listData = this.listData.slice(start, end);
                }
            } catch (error) {
                console.log(error);
            }
        },

        nextPag: function () {
            var start = 0;
            var end = 0;

            try {
                if (this.indexPag != Math.ceil(this.maxPags / 2)) {
                    // Depende del valor pasado, hace una cosa u otra. Si es falso, entonces es recientes.
                    // Si es verdadero, entonces son todas las organizaciones
                    if (!this.organization && this.filteredList.length == 0) {
                        this.listData = this.ongsRecientes;
                    } else if (
                        this.organization &&
                        this.filteredList.length == 0
                    ) {
                        this.listData = this.orgs;
                    } else {
                        this.listData = this.filteredList;
                    }

                    this.indexPag++;

                    start = this.indexPag * 2 - 2;
                    end = this.indexPag * 2;

                    this.listData = this.listData.slice(start, end);
                }
            } catch (error) {
                console.log(error);
            }
        },

        // Va a la primera página
        firstPag: function () {
            var start = 0;
            var end = 0;

            try {
                // Depende del valor pasado, hace una cosa u otra. Si es falso, entonces es recientes.
                // Si es verdadero, entonces son todas las organizaciones
                if (!this.organization && this.filteredList.length == 0) {
                    this.listData = this.ongsRecientes;
                } else if (this.organization && this.filteredList.length == 0) {
                    this.listData = this.orgs;
                } else {
                    this.listData = this.filteredList;
                }

                this.indexPag = 1;

                start = 0;
                end = this.indexPag * 2;

                this.listData = this.listData.slice(start, end);
            } catch (error) {
                console.log(error);
            }
        },

        // Va a la última página
        lastPag: function () {
            var start = 0;
            var end = 0;

            try {
                // Depende del valor pasado, hace una cosa u otra. Si es falso, entonces es recientes.
                // Si es verdadero, entonces son todas las organizaciones
                if (!this.organization && this.filteredList.length == 0) {
                    this.listData = this.ongsRecientes;
                } else if (this.organization && this.filteredList.length == 0) {
                    this.listData = this.orgs;
                } else {
                    this.listData = this.filteredList;
                }

                this.indexPag = Math.ceil(this.listData.length / 2);

                start = this.indexPag * 2 - 2;
                end = this.indexPag * 2;

                this.listData = this.listData.slice(start, end);
            } catch (error) {
                console.log(error);
            }
        },

        getData: async function () {
            var start = 0;
            var end = 0;

=======
        getData: async function () {
>>>>>>> carlos
            try {
                // Usamos axios para conseguir datos como las organizaciones registradas y el usuario actual
                // CORS afecta cuando se intenta hacerlo con http. En local vale que se haga directamente
                await axios
                    .get("/get/listado", {
                        params: {
                            id: this.user.entidad_id,
                        },
                    })
                    .then((response) => {
                        // Recibe los datos obtenidos (según lo que envía de vuelta el controller
                        // correspondiente)
<<<<<<< HEAD
                        this.orgs = response.data.organizacion;
                        this.ongsRecientes = response.data.recientes;

                        // Se lee de esta variable los datos
                        this.listData = response.data.recientes;

                        // Paginación
                        this.indexPag = 1;

                        // Máximo de páginas
                        this.maxPags = this.listData.length;

                        start = 0;
                        end = this.indexPag * 2;

                        this.listData = this.listData.slice(start, end);
=======
                        console.log(response.data);
                        this.orgs = response.data.organizacion;
                        this.ongsRecientes = response.data.recientes;
>>>>>>> carlos
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            } catch (error) {
                console.log(error);
            }
        },

        // Mira lo que se introduce y lo previene o deja que se use esa tecla (escribir)
        checkNameInput: function (e) {
            try {
                // Validaciones.checkUserTxt(e); // Este devuelve boolean
                Validaciones.checkInput(e);
            } catch (error) {
                console.log(error);
            }
        },

        // Mira lo que se introduce y lo previene o deja que se use esa tecla (escribir)
        checkEmailInput: function (e) {
            try {
                Validaciones.checkInputEmail(e);
            } catch (error) {
                console.log(error);
            }
        },

        // Mira lo que se introduce y lo previene o deja que se use esa tecla (escribir)
        checkTarjInput: function (e) {
            try {
                Validaciones.checkInputTarjeta(e);
            } catch (error) {
                console.log(error);
            }
        },

        // Valida el nombre
        valName: function () {
            try {
                if (
                    Validaciones.checkInjection(this.prueba) &&
                    Validaciones.checkUserTxt(this.prueba)
                ) {
                    console.log("Es válido");
                }
            } catch (error) {
                console.log(error);
            }
        },

        // Valida el nombre
        valEmail: function () {
            try {
                if (
                    Validaciones.checkInjection(this.prueba) &&
                    Validaciones.checkEmailTxt(this.prueba1)
                ) {
                    console.log("Es válido");
                }
            } catch (error) {
                console.log(error);
            }
        },

<<<<<<< HEAD
        // Cuando cambia de tipo (reciente o todos)
        changeTypeCont: function (cambio) {
            var start = 0;
            var end = 0;

            try {
                this.organization = cambio;

                // Depende del valor pasado, hace una cosa u otra. Si es falso, entonces es recientes.
                // Si es verdadero, entonces son todas las organizaciones
                if (!this.organization) {
                    this.listData = this.ongsRecientes;
                } else {
                    this.listData = this.orgs;
                }

                // Paginación
                this.indexPag = 1;

                // Indica el máximo de páginas que habrá
                this.maxPags = this.listData.length;

                start = 0;
                end = this.indexPag * 2;

                // Muestra de 2 en 2
                this.listData = this.listData.slice(start, end);
            } catch (error) {
                console.log(error);
            }
        },

        // Filtro del buscador
        buscarFilter: function () {
            var start = 0;
            var end = 0;

            try {
                // Mira que tipo es el actual
                if (!this.organization) {
                    this.listData = this.ongsRecientes;
                } else {
                    this.listData = this.orgs;
                }

                // Si no está vacío, entonces filtra
                if (this.searchFilter != "" && this.searchFilter != null) {
                    this.listData.forEach((data) => {
                        if (
                            data.nombre
                                .toLowerCase()
                                .indexOf(this.searchFilter) != -1
                        ) {
                            this.filteredList.push(data);
                        }
                    });

                    this.listData = this.filteredList;
                }

                // Paginación
                this.indexPag = 1;

                // Indica el máximo de páginas que habrá. El calculo ya se hace en el la paginación.
                this.maxPags = this.listData.length;

                start = 0;
                end = this.indexPag * 2;

                // Muestra de 2 en 2
                this.listData = this.listData.slice(start, end);
=======
        s: function (e) {
            try {
                // Tiene que tener 9 carácteres. El último carácter debe ser una mayúscula y
                // los demás deben ser números
                if (
                    this.prueba.length == 9 &&
                    /[A-Z]/.test(this.prueba.charAt(8)) &&
                    !/[A-Z]/.test(this.prueba.substring(0, 8))
                ) {
                }

                console.log();
>>>>>>> carlos
            } catch (error) {
                console.log(error);
            }
        },
    },

    mounted() {
        try {
            this.user = this.$page.props.auth.user;
            this.getData();
        } catch (error) {
            console.log(error);
        }
    },
};
</script>

<template>
    <nav class="rowPropio noRowGapPropio">
        <div
<<<<<<< HEAD
            class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio barraNavPropio"
=======
            class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio pruebaPropio"
>>>>>>> carlos
        ></div>
    </nav>

    <!-- Contenido propio -->
    <main>
<<<<<<< HEAD
        <div class="rowPropio noRowGapPropio">
            <!-- Deja espacio para centrar el contenido -->
=======
        <!--
        <div>
            <input
                type="text"
                v-model="prueba"
                placeholder="Usuario"
                @keydown="checkTarjInput($event)"
                @keypress="checkTarjInput($event)"
            />
            <br />
            <input
                type="email"
                v-model="prueba1"
                placeholder="Email"
                @keydown="checkEmailInput($event)"
                @keypress="checkEmailInput($event)"
            />
            <br />
            <input type="text" v-model="prueba2" placeholder="Pass" /> <br />
            <input type="text" v-model="prueba3" placeholder="Conf pass" />
            <br />
            <button class="btn btn-primary" @click="s">Prueba</button>
        </div>
         -->

        <div class="rowPropio noRowGapPropio">
>>>>>>> carlos
            <div class="col-lg-1Propio col-md-1Propio"></div>
            <div
                class="col-lg-10Propio col-md-10Propio col-sm-12Propio col-12Propio"
            >
<<<<<<< HEAD
                <!-- Los tabs -->
=======
>>>>>>> carlos
                <ul class="listadoTabPropio ulNoStylePropio">
                    <!-- Usando v-bind:class de Vue puedo activar ciertas clases solo cuando se cumplan -->
                    <!-- la condición indicada -->
                    <!-- https://es.vuejs.org/v2/guide/class-and-style.html -->
                    <!-- La clase activo solo estara en el elemento cuando this.organization es falso-->
                    <li
                        class="listadoOpcionTabPropio"
                        v-bind:class="{ activoPropio: !this.organization }"
<<<<<<< HEAD
                        v-on:click="this.changeTypeCont(false)"
=======
                        v-on:click="this.organization = false"
>>>>>>> carlos
                    >
                        <a class="tabPropio aNoStylePropio" href="#"
                            >Org. contactada</a
                        >
                    </li>
                    <li
                        class="listadoOpcionTabPropio"
                        v-bind:class="{ activoPropio: this.organization }"
<<<<<<< HEAD
                        v-on:click="this.changeTypeCont(true)"
=======
                        v-on:click="this.organization = true"
>>>>>>> carlos
                    >
                        <a class="tabPropio aNoStylePropio" href="#"
                            >Demás Org.</a
                        >
                    </li>
                </ul>

                <div
                    class="divBuscadorPropio rowPropio noRowGapPropio noColGapPropio"
                >
                    <div
                        class="col-lg-10Propio col-md-10Propio col-sm-10Propio col-8Propio"
                    >
                        <input
                            class="inputBuscadorPropio"
                            type="text"
                            placeholder="Buscar..."
<<<<<<< HEAD
                            v-model="this.searchFilter"
=======
>>>>>>> carlos
                        />
                    </div>

                    <div
                        class="col-lg-2Propio col-md-2Propio col-sm-2Propio col-4Propio"
                    >
<<<<<<< HEAD
                        <button
                            class="btnPropio btnBuscarPropio"
                            @click="buscarFilter"
                        >
=======
                        <button class="btnPropio btnBuscarPropio">
>>>>>>> carlos
                            <img
                                src="./../../../../img/search.svg"
                                class="imgBuscarPropio"
                            />
                        </button>
<<<<<<< HEAD
=======

                        <!-- Cambia el estado del filtro gracias al v-on:click de Vue -->
                        <button
                            class="btnPropio btnFiltrarPropio"
                            v-on:click="this.filter = !this.filter"
                        >
                            <img
                                src="./../../../../img/filter.svg"
                                class="imgBuscarPropio"
                            />
                        </button>
                    </div>
                </div>

                <div class="rowPropio noRowGapPropio noColGapPropio">
                    <div
                        class="col-lg-10Propio col-md-10Propio col-sm-10Propio col-10Propio"
                    >
                        <!-- Solo muestra si se activa el filtro -->
                        <div
                            v-show="this.filter"
                            class="optionsFilterPropio"
                        ></div>
>>>>>>> carlos
                    </div>
                </div>
            </div>
        </div>

        <div class="rowPropio noRowGapPropio">
            <div class="col-lg-1Propio col-md-1Propio"></div>

<<<<<<< HEAD
            <!-- Listado de organizaciones (tanto recientes como todas) -->
=======
>>>>>>> carlos
            <div
                class="col-lg-10Propio col-md-10Propio col-sm-12Propio col-12Propio listadoOrgPropio"
            >
                <!-- Mostrar listado de organizaciones recientes -->
<<<<<<< HEAD
                <div>
                    <h1
                        class="h1Propio"
                        v-if="this.listData.length == 0 && !this.organization"
                    >
                        No se ha contactado con una organización recientemente
                    </h1>

                    <h1
                        class="h1Propio"
                        v-else-if="
                            this.listData.length == 0 && this.organization
                        "
                    >
                        No hay organizaciones a contactar
                    </h1>

                    <template v-for="data in listData">
=======
                <div v-show="!this.organization">
                    <h1 class="h1Propio" v-if="this.orgs.length == 0">
                        No se ha contactado con una organización recientemente
                    </h1>

                    <template v-for="data in ongsRecientes">
>>>>>>> carlos
                        <!-- Lista de organizaciones (de 1 en 1) -->
                        <a
                            :href="route('perfilP', data.id)"
                            class="rowPropio noRowGapPropio noColGapPropio cardOrgPropio"
                        >
                            <!-- Imagen (hacia izquierda y arriba si la pantalla es pequena) -->
                            <img
                                src="./../../../../img/prueba.jpg"
                                class="col-lg-2Propio col-md-2Propio col-sm-12Propio col-12Propio imgOrgPropio"
                                alt=""
                            />

                            <!-- Descripcion -->
                            <div
                                class="col-lg-10Propio col-md-10Propio col-sm-12Propio col-12Propio contenedorDescPropio"
                            >
                                <h1 class="h1Propio">{{ data.nombre }}</h1>
                                <p>
                                    {{ data.descripcion }}
                                </p>
                            </div>
                        </a>
                    </template>
                </div>
<<<<<<< HEAD
            </div>
        </div>

        <!-- Paginación -->
        <div>
            <ul class="navPagPropio">
                <!-- Solo esta activa si hay solo 1 pagina -->
                <template v-if="Math.ceil(this.maxPags / 2) == 1">
                    <li class="pagsPropio activoPagsPropio">1</li>
                </template>

                <template v-else>
                    <!-- Pagina anterior -->
                    <li
                        class="pagsPropio pagsArrowLeftPropio"
                        @click="previousPag"
                        v-show="this.indexPag > 1"
                    >
                        <span>&laquo;</span>
                    </li>

                    <!-- Primera pagina -->
                    <li
                        class="pagsPropio"
                        @click="firstPag"
                        v-show="this.indexPag != 1"
                    >
                        1
                    </li>

                    <li class="pagsPropio" v-show="this.indexPag >= 3">...</li>

                    <li class="pagsPropio activoPagsPropio">
                        {{ this.indexPag }}
                    </li>

                    <li
                        class="pagsPropio"
                        v-show="
                            this.indexPag <= Math.ceil(this.maxPags / 2) - 2
                        "
                    >
                        ...
                    </li>

                    <!-- Ultima pagina -->
                    <li
                        class="pagsPropio"
                        @click="lastPag"
                        v-show="this.indexPag != Math.ceil(this.maxPags / 2)"
                    >
                        {{ Math.ceil(this.maxPags / 2) }}
                    </li>

                    <!-- Siguiente pagina-->
                    <li
                        class="pagsPropio pagsArrowRightPropio"
                        @click="nextPag"
                        v-show="this.indexPag < Math.ceil(this.maxPags / 2)"
                    >
                        <span>&raquo;</span>
                    </li>
                </template>
            </ul>
        </div>
=======

                <!-- Mostrar todas las organizaciones -->
                <div v-show="this.organization">
                    <h1 class="h1Propio" v-if="this.orgs.length == 0">
                        No hay ONGs
                    </h1>

                    <!-- Lista de organizaciones (de 1 en 1) -->
                    <template v-for="data in orgs">
                        <a
                            :href="route('perfilP', data.id)"
                            class="rowPropio noRowGapPropio noColGapPropio cardOrgPropio"
                        >
                            <!-- Imagen (hacia izquierda y arriba si la pantalla es pequena) -->
                            <img
                                src="./../../../../img/prueba.jpg"
                                class="col-lg-2Propio col-md-2Propio col-sm-12Propio col-12Propio imgOrgPropio"
                                alt=""
                            />

                            <!-- Descripcion -->
                            <div
                                class="col-lg-10Propio col-md-10Propio col-sm-12Propio col-12Propio contenedorDescPropio"
                            >
                                <h1 class="h1Propio">{{ data.nombre }}</h1>
                                <p>
                                    {{ data.descripcion }}
                                </p>
                            </div>
                        </a>
                    </template>
                </div>
            </div>
        </div>
>>>>>>> carlos
    </main>
</template>

<style scoped>
/* Importando css propio */
/* CSS de Alex */
/*Selector universal*/
* {
    margin: 0;
    font-family: "Montserrat";
}

/* Código hecho en primer trimestre de DAM y DAW (grid) */
/*El grid*/
.rowPropio {
    color: black;
    text-decoration: none;
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

<<<<<<< HEAD
/* Paginacion */
.navPagPropio {
    display: flex;
    list-style: none;
    justify-content: center;
}

.pagsPropio {
    cursor: pointer;
    background: #73cd99;
    user-select: none;
    border: 1px solid #2d764b;
    padding: 0.45rem 0.8rem;
}

.pagsPropio:hover {
    background: #41a86c;
    border: 1px solid #405747;
    padding: 0.45rem 0.8rem;
}

.pagsArrowLeftPropio {
    border-top-left-radius: 0.75rem;
    border-bottom-left-radius: 0.75rem;
}

.pagsArrowRightPropio {
    border-top-right-radius: 0.75rem;
    border-bottom-right-radius: 0.75rem;
}

.activoPagsPropio {
    color: white;
    background: #2d764b;
    border: 1px solid #291f1e;
}

/* Para 80% de pantalla height (según el zoom). Vuelve a normal al poner 100% zoom. */
@media only screen and (max-height: 762px) and (min-height: 610px) {
    .listadoOrgPropio {
        height: 28.5rem !important;
    }
}

/* Rellena espacio del nav (temporal) */
.barraNavPropio {
    height: 4rem;
    background: lightblue;
    margin-bottom: 1rem;
=======
/* Rellena espacio del nav (temporal) */
.pruebaPropio {
    height: 4rem;
    background: lightblue;
    margin-bottom: 2rem;
>>>>>>> carlos
}

/* Quita los estilos de listado */
.ulNoStylePropio {
    list-style: none;
}

/* Quita el estilo que tiene los links */
.aNoStylePropio {
    text-decoration: none;
    color: black;
}

/* Estilo del tab */
.listadoTabPropio {
    display: flex; /* Lo coloca todo en la misma fila*/
    border-bottom: 1.5px solid #dee2e6; /* Colorea el borde de abajo y lo hace visible */
    padding: 0;
}

.listadoOpcionTabPropio {
    margin-right: 0;
    padding: 0.5rem;
}

.tabPropio {
    padding: 0.5rem;
}

/* Senala el tab activo */
.listadoOpcionTabPropio.activoPropio {
    border-top-left-radius: 0.75rem;
    border-top-right-radius: 0.75rem;
    background-color: #2d764b;
    transition: 1s;
}

/* Color del texto del tab activo */
.listadoOpcionTabPropio.activoPropio a.tabPropio {
    color: white;
    transition: 1s;
}

.listadoOpcionTabPropio a.tabPropio {
    color: black;
    transition: 1s;
}

/* Estilo cuando el raton pasa por encima de los tabs */
.listadoOpcionTabPropio:hover {
    border-top-left-radius: 0.75rem;
    border-top-right-radius: 0.75rem;
    background-color: #73cd99;
    transition: 1s;
}

.listadoOpcionTabPropio:hover a.tabPropio {
    color: black;
}

/* Estilo del buscador (filtro) */
.divBuscadorPropio {
    height: 2rem;
<<<<<<< HEAD
    margin-top: 1rem;
=======
    margin-top: 2rem;
>>>>>>> carlos
}

.inputBuscadorPropio {
    height: 1.37rem;
    width: 98.26%;
    box-sizing: content-box !important; /* https://developer.mozilla.org/en-US/docs/Web/CSS/box-sizing */
    font-size: 1.2rem;
    padding-top: 0.2rem;
    padding-bottom: 0.4rem;
    padding-left: 5.2px;
    box-shadow: 8px 0.3rem 0.3rem #939292;
}

.inputBuscadorPropio:focus {
    border: 2px solid black !important;
    box-shadow: 8px 0.3rem 0.3rem #afafaf !important;
}

/* Estilo de los botones y sus imagenes correspondientes */
.btnBuscarPropio {
    background: lightblue;
    border: 1px solid lightblue;
    padding: 0.6rem;
<<<<<<< HEAD
    border-top-right-radius: 0.5rem;
    border-bottom-right-radius: 0.5rem;
=======
>>>>>>> carlos
}

.imgBuscarPropio {
    margin-bottom: -4px;
}

.btnFiltrarPropio {
    background: lightblue;
    border: 1px solid lightblue;
    border-top-right-radius: 0.35rem;
    border-bottom-right-radius: 0.35rem;
    padding: 0.6rem;
}

/* Estilo del contenedor de los filtros */
.optionsFilterPropio {
    background-color: #73cd99;
    height: 10rem;
    width: 103%;
}

/* Estilo cuando pasa por un boton */
.btnPropio:hover {
    cursor: pointer; /* Botones https://developer.mozilla.org/en-US/docs/Web/CSS/cursor */
    background-color: #7bc8e1;
}

/* Estilos del listado */
.listadoOrgPropio {
<<<<<<< HEAD
    height: 21rem; /* Altura */
=======
    height: 27.5rem; /* Altura */
>>>>>>> carlos
    border: 1px solid black; /* Borde (tamano, su aspecto, y color) */
    /* Radio de los bordes */
    border-top-left-radius: 0.5rem;
    border-top-right-radius: 0.15rem;
    border-bottom-right-radius: 0.15rem;
    border-bottom-left-radius: 0.5rem;
    /* Comportamiento cuando se sale de la altura o ancho establecido */
<<<<<<< HEAD
    overflow-y: hidden;
    /* Margenes */
    margin-top: 1.5rem;
    margin-bottom: 1rem;
=======
    overflow-y: scroll;
    /* Margenes */
    margin-top: 2.5rem;
    margin-bottom: 4rem;
>>>>>>> carlos
    /* Rellenos */
    padding-top: 1.35rem;
    padding-right: 1.75rem;
    padding-bottom: 1.35rem;
    padding-left: 1.75rem;
}

/* Imagen de las organizaciones */
.imgOrgPropio {
    height: 100%;
    width: 100%;
    border-top-left-radius: 0.75rem;
    border-bottom-left-radius: 0.75rem;
}

/* Descripción de las organizaciones */
.contenedorDescPropio {
    background: lightblue;
    border-top-right-radius: 0.75rem;
    border-bottom-right-radius: 0.75rem;
    padding: 0.75rem;
}

.cardOrgPropio {
    margin-bottom: 2rem;
}

/* Sombreado del contenedor y sus elementos (para darle efecto a todo el contenedor) */
.cardOrgPropio,
.cardOrgPropio > img.imgOrgPropio,
.cardOrgPropio > div.contenedorDescPropio {
    box-shadow: 10px 0.32rem 0.32rem #b6b6b6;
    transition: 1s;
}

/* Sombreado cuando el ratón pasa por encima del contenedor */
.cardOrgPropio:hover,
.cardOrgPropio:hover > img.imgOrgPropio,
.cardOrgPropio:hover > div.contenedorDescPropio {
    box-shadow: 10px 0.32rem 0.32rem #949494;
}

/* Estilo de los titulos */
.h1Propio {
    font-size: xx-large;
    font-weight: bolder;
    margin-bottom: 0.35rem;
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

    /* Estilo del contenedor de la descripción */
    .contenedorDescPropio {
        border-top-right-radius: 0rem;
        border-bottom-left-radius: 0.75rem;
        border-bottom-right-radius: 0.75rem;
    }

    /* Estilo de la imagen (para que quede enfocado y centrado, no hacerlo más pequeño la imagen) */
    .imgOrgPropio {
        height: 10rem;
        object-fit: cover; /* https://developer.mozilla.org/en-US/docs/Web/CSS/object-fit */
        border-top-right-radius: 0.75rem;
        border-bottom-left-radius: 0rem;
    }
}

<<<<<<< HEAD
/* Pantallas más pequeñas */
=======
>>>>>>> carlos
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
}
</style>
