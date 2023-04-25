<!-- Parte Alex -->

<script>
import axios from 'axios';

export default {
    data() {
        return {
            filter: false,
            organization: false,
            user: '',
            orgs: '',
            ongsRecientes: '',
            prueba: ''
        }
    },

    watch: {

    },

    methods: {
        getData: async function () {
            // Usamos axios para conseguir datos como las organizaciones registradas y el usuario actual
            // CORS afecta cuando se intenta hacerlo con http. En local vale que se haga directamente
            await axios.get('/get/listado', {
                params: {
                    id: this.user.entidad_id
                }
            }).then((response) => {
                // Recibe los datos obtenidos (según lo que envía de vuelta el controller
                // correspondiente)
                this.orgs = response.data;
            }).catch((error) => {
                console.log(error)
            })
        },

        getRecentOrgs: async function () {
            // Mira si se ha entablado en un chat con alguna ONG
            await axios.get('/get/listado/reciente', {
                params: {
                    empresa: this.user.entidad_id
                }
            }).then((response) => {
                // Recibe los datos obtenidos (según lo que envía de vuelta el controller
                // correspondiente)
                this.orgsRecientes = response.data;
            }).catch((error) => {
                console.log(error)
            })
        },

        s: function () {
            console.log(this.orgs[0].id);
            console.log(this.orgs[1].id);
        }
    },

    mounted() {
        this.user = this.$page.props.auth.user;
        this.getData();
    }
}

</script>

<template>
    <nav class="row noRowGap">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 prueba"></div>
    </nav>

    <!-- Contenido propio -->
    <main>
        <div>
            <input type="text" v-model="prueba" placeholder="prueba">
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
                    <li class="listadoOpcionTab" v-bind:class="{ 'activo': !this.organization }"
                        v-on:click="this.organization = false">
                        <a class="tab" href="#">Org. contactada</a>
                    </li>
                    <li class="listadoOpcionTab" v-bind:class="{ 'activo': this.organization }"
                        v-on:click="this.organization = true">
                        <a class="tab" href="#">Demás Org.</a>
                    </li>
                </ul>

                <div class="divBuscador row noRowGap noColGap">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-8">
                        <input class="inputBuscador" type="text" placeholder="Buscar...">
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-4">
                        <button class="btn btnBuscar">
                            <img src="./../../../../img/search.svg" class="imgBuscar">
                        </button>

                        <!-- Cambia el estado del filtro gracias al v-on:click de Vue -->
                        <button class="btn btnFiltrar" v-on:click="this.filter = !this.filter">
                            <img src="./../../../../img/filter.svg" class="imgBuscar">
                        </button>
                    </div>
                </div>

                <div class="row noRowGap noColGap">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                        <!-- Solo muestra si se activa el filtro -->
                        <div v-show="this.filter" class="optionsFilter">

                        </div>
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

                    <!-- Lista de organizaciones (de 1 en 1) -->
                    <a href="perfilP" class="row noRowGap noColGap cardOrg">
                        <!-- Imagen (hacia izquierda y arriba si la pantalla es pequena) -->
                        <img src="./../../../../img/prueba.jpg" class="col-lg-2 col-md-2 col-sm-12 col-12 imgOrg" alt="">

                        <!-- Descripcion -->
                        <div class="col-lg-10 col-md-10 col-sm-12 col-12 contenedorDesc">
                            <h1>Empresa 1</h1>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non deserunt magni ratione
                                aspernatur ex est ipsum et dignissimos expedita atque. Dolore ut omnis ipsam modi
                                accusantium nemo ab voluptatem blanditiis?
                            </p>
                        </div>
                    </a>
                </div>

                <!-- Mostrar todas las organizaciones -->
                <div v-show="this.organization">
                    <h1 v-if="this.orgs.length == 0">No hay ONGs</h1>

                    <!-- Lista de organizaciones (de 1 en 1) -->
                    <template v-for="data in orgs">
                        <a :href="route('perfilP', data.id)" class="row noRowGap noColGap cardOrg">
                            <!-- Imagen (hacia izquierda y arriba si la pantalla es pequena) -->
                            <img src="./../../../../img/prueba.jpg" class="col-lg-2 col-md-2 col-sm-12 col-12 imgOrg"
                                alt="">

                            <!-- Descripcion -->
                            <div class="col-lg-10 col-md-10 col-sm-12 col-12 contenedorDesc">
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

<style>
/* Importando css propio */
@import url("./../../../../css/listados.css");
</style>
