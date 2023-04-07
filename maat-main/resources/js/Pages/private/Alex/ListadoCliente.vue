<!-- Parte Alex -->

<script>
import axios from 'axios';

export default {
    data() {
        return {
            filter: false,
            organization: false,
            user: '',
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
                    ong: 1
                }
            }).then((response) => {
                // Recibe los datos obtenidos (según lo que envía de vuelta el controller
                // correspondiente)
                console.log(response.data);
            }).catch((error) => {
                console.log(error)
            })
        }
    },

    mounted() {
        this.user = this.$page.props.auth.user;
        console.log(this.user)
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
            <button class="btn btn-primary" @click="getData">Prueba</button>
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
                    <!-- Idealmente se usaría un v-for para imprimir todos los datos de las orgs. -->
                    <!-- Lista de organizaciones (de 1 en 1) -->
                    <a href="#" class="row noRowGap noColGap cardOrg">
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


                    <a href="#" class="row noRowGap noColGap cardOrg">
                        <!-- Imagen (hacia izquierda y arriba si la pantalla es pequena) -->
                        <img src="./../../../../img/prueba.jpg" class="col-lg-2 col-md-2 col-sm-12 col-12 imgOrg" alt="">

                        <!-- Descripcion -->
                        <div class="col-lg-10 col-md-10 col-sm-12 col-12 contenedorDesc">
                            <h1>Empresa 2</h1>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non deserunt magni ratione
                                aspernatur ex est ipsum et dignissimos expedita atque. Dolore ut omnis ipsam modi
                                accusantium nemo ab voluptatem blanditiis?
                            </p>
                        </div>
                    </a>

                    <a href="#" class="row noRowGap noColGap cardOrg">
                        <!-- Imagen (hacia izquierda y arriba si la pantalla es pequena) -->
                        <img src="./../../../../img/prueba.jpg" class="col-lg-2 col-md-2 col-sm-12 col-12 imgOrg" alt="">

                        <!-- Descripcion -->
                        <div class="col-lg-10 col-md-10 col-sm-12 col-12 contenedorDesc">
                            <h1>Empresa 3</h1>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non deserunt magni ratione
                                aspernatur ex est ipsum et dignissimos expedita atque. Dolore ut omnis ipsam modi
                                accusantium nemo ab voluptatem blanditiis?
                            </p>
                        </div>
                    </a>

                    <a href="#" class="row noRowGap noColGap cardOrg">
                        <!-- Imagen (hacia izquierda y arriba si la pantalla es pequena) -->
                        <img src="./../../../../img/prueba.jpg" class="col-lg-2 col-md-2 col-sm-12 col-12 imgOrg" alt="">

                        <!-- Descripcion -->
                        <div class="col-lg-10 col-md-10 col-sm-12 col-12 contenedorDesc">
                            <h1>Empresa 4</h1>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non deserunt magni ratione
                                aspernatur ex est ipsum et dignissimos expedita atque. Dolore ut omnis ipsam modi
                                accusantium nemo ab voluptatem blanditiis?
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>
</template>

<style>
/* Importando css propio */
@import url("./../../../../css/listados.css");
</style>
