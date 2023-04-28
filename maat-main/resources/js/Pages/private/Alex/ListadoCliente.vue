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

            prueba: "",
            prueba1: "asd@asd.com",
            prueba2: "12345678",
            prueba3: "12345678",
        };
    },

    methods: {
        getData: async function () {
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
                        console.log(response.data);
                        this.orgs = response.data.organizacion;
                        this.ongsRecientes = response.data.recientes;
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
    <nav class="row noRowGap">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 prueba"></div>
    </nav>

    <!-- Contenido propio -->
    <main>
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

        <div class="row noRowGap">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                <ul class="listadoTab">
                    <!-- Usando v-bind:class de Vue puedo activar ciertas clases solo cuando se cumplan -->
                    <!-- la condición indicada -->
                    <!-- https://es.vuejs.org/v2/guide/class-and-style.html -->
                    <!-- La clase activo solo estara en el elemento cuando this.organization es falso-->
                    <li
                        class="listadoOpcionTab"
                        v-bind:class="{ activo: !this.organization }"
                        v-on:click="this.organization = false"
                    >
                        <a class="tab" href="#">Org. contactada</a>
                    </li>
                    <li
                        class="listadoOpcionTab"
                        v-bind:class="{ activo: this.organization }"
                        v-on:click="this.organization = true"
                    >
                        <a class="tab" href="#">Demás Org.</a>
                    </li>
                </ul>

                <div class="divBuscador row noRowGap noColGap">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-8">
                        <input
                            class="inputBuscador"
                            type="text"
                            placeholder="Buscar..."
                        />
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-4">
                        <button class="btn btnBuscar">
                            <img
                                src="./../../../../img/search.svg"
                                class="imgBuscar"
                            />
                        </button>

                        <!-- Cambia el estado del filtro gracias al v-on:click de Vue -->
                        <button
                            class="btn btnFiltrar"
                            v-on:click="this.filter = !this.filter"
                        >
                            <img
                                src="./../../../../img/filter.svg"
                                class="imgBuscar"
                            />
                        </button>
                    </div>
                </div>

                <div class="row noRowGap noColGap">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                        <!-- Solo muestra si se activa el filtro -->
                        <div v-show="this.filter" class="optionsFilter"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row noRowGap">
            <div class="col-lg-1 col-md-1"></div>

            <div class="col-lg-10 col-md-10 col-sm-12 col-12 listadoOrg">
                <!-- Mostrar listado de organizaciones recientes -->
                <div v-show="!this.organization">
                    <h1 v-if="this.orgs.length == 0">
                        No se ha contactado con una organización recientemente
                    </h1>

                    <template v-for="data in ongsRecientes">
                        <!-- Lista de organizaciones (de 1 en 1) -->
                        <a
                            :href="route('perfilP', data.id)"
                            class="row noRowGap noColGap cardOrg"
                        >
                            <!-- Imagen (hacia izquierda y arriba si la pantalla es pequena) -->
                            <img
                                src="./../../../../img/prueba.jpg"
                                class="col-lg-2 col-md-2 col-sm-12 col-12 imgOrg"
                                alt=""
                            />

                            <!-- Descripcion -->
                            <div
                                class="col-lg-10 col-md-10 col-sm-12 col-12 contenedorDesc"
                            >
                                <h1>{{ data.nombre }}</h1>
                                <p>
                                    {{ data.descripcion }}
                                </p>
                            </div>
                        </a>
                    </template>
                </div>

                <!-- Mostrar todas las organizaciones -->
                <div v-show="this.organization">
                    <h1 v-if="this.orgs.length == 0">No hay ONGs</h1>

                    <!-- Lista de organizaciones (de 1 en 1) -->
                    <template v-for="data in orgs">
                        <a
                            :href="route('perfilP', data.id)"
                            class="row noRowGap noColGap cardOrg"
                        >
                            <!-- Imagen (hacia izquierda y arriba si la pantalla es pequena) -->
                            <img
                                src="./../../../../img/prueba.jpg"
                                class="col-lg-2 col-md-2 col-sm-12 col-12 imgOrg"
                                alt=""
                            />

                            <!-- Descripcion -->
                            <div
                                class="col-lg-10 col-md-10 col-sm-12 col-12 contenedorDesc"
                            >
                                <h1>{{ data.nombre }}</h1>
                                <p>
                                    {{ data.descripcion }}
                                </p>
                            </div>
                        </a>
                    </template>
                </div>
            </div>
        </div>
    </main>
</template>

<style scoped>
/* Importando css propio */
@import url("./../../../../css/listados.css");
</style>
