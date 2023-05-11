<script setup>
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";

const form = useForm({
    titulo: "",
    fecha: "",
    descripcion: "",
    imagen: "",
});


</script>
<template>
    <div class="grid-system">
        <header>
            <span>{{ $page.props.auth.user.name }}</span>
        </header>
        <form @submit.prevent="form.patch(route('noticia-store'))">
            <div class="spam-header">
                <span>AÑADIR UNA NOTICIA NUEVA</span>
                <div class="div-datos-basicos">
                    <div class="div-form-primero">
                        <label for="titulo">Título:</label>
                        <input type="text" id="titulo" v-model="form.titulo">
                    </div>
                    <!-- <div class="div-form-primero">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" id="apellidos" v-model="form.apellidos">
                    </div> -->
                    <!-- <div class="div-form-primero">
                        <label for="puesto">Puesto</label>
                        <input type="text" id="puesto" v-model="form.puesto">
                    </div> -->
                </div>
                <div class="div-form-segundo">
                    <label for="fecha">Fecha:</label>
                    <input type="text" id="fecha" v-model="form.fecha">
                </div>

                <div class="div-form-segundo">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" id="descripcion" v-model="form.descripcion">
                </div>

                <div class="div-form-segundo">
                    <label for="imagen">URL de la Imagen:</label>
                    <input type="text" id="imagen" v-model="form.imagen">
                </div>
            </div>
            <footer>
                <Link class="btn-cancelar" :href="route('indexUser')">Cancelar
                </Link>
                <!-- <Link :href="route('listUserEmpresa')">
                <button class="btn-save">Crear usuario</button>
                </Link> -->
                <PrimaryButton class="ml-4 bg-green-500" :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing">
                    Añadir noticia
                </PrimaryButton>
            </footer>
        </form>
    </div>
</template>

<style scoped>
.grid-system {
    display: grid;
    grid-template-columns: 1fr;
    grid-gap: 0;
    grid-auto-rows: minmax(0, auto);
    grid-template-areas: "area-1";
    grid-template-rows: auto;
    grid-template-columns: repeat(1, minmax(0, 1fr));
    grid-auto-flow: dense;
    margin: 20px;
    width: 100%;
}

header {
    font-size: 30px;
    font-weight: bold;
}

img {
    border-radius: 50px;
    width: 100px;
    height: 100px;
}

.div-img {
    margin-top: 2%;
    margin-left: 0%;
    margin-bottom: 0%;
    margin-right: 0%;
}

.spam-header {
    margin-top: 2%;
    margin-left: 0%;
    margin-bottom: 0%;
    margin-right: 0%;
}

.div-datos-basicos {
    margin-top: 2%;
    margin-left: 0%;
    margin-bottom: 0%;
    margin-right: 0%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.div-form-primero {
    /* Se determina lo que ocupara la caja de label + input */
    flex-basis: 30%;
    /* Modificamos sus 'caracteristicas' para que podamos jugar con la posicion de los componentes de div-form-primero*/
    display: flex;
    /* Se establece que el label + input aparecen en columna*/
    flex-direction: column;
}

.div-form-segundo {
    /* Modificamos sus 'caracteristicas' para que podamos jugar con la posicion de los componentes de div-form-primero*/
    display: flex;
    /* Se establece que el label + input aparecen en columna*/
    flex-direction: column;
    margin-top: 2%;
    margin-left: 0%;
    margin-bottom: 0%;
    margin-right: 0%;
}

.div-form-segundo label {
    font-size: 20px;
    margin-top: 0%;
    margin-left: 0%;
    margin-bottom: 1%;
    margin-right: 0%;
}

.div-form-segundo span {
    margin-top: 0%;
    margin-left: 0%;
    margin-bottom: 2%;
    margin-right: 0%;
    font-size: 15px;
}

.div-form-segundo div {
    font-size: 20px;
    margin-top: 0%;
    margin-left: 0%;
    margin-bottom: 2%;
    margin-right: 0%;
}

#email {
    width: 20%;
}

#password {
    width: 20%;
}

#confirmPassword {
    width: 20%;
}

.button-email {
    margin-top: 1%;
    margin-left: 0%;
    margin-bottom: 0%;
    margin-right: 0%;
    padding-top: 1%;
    padding-left: 2%;
    padding-bottom: 1%;
    padding-right: 2%;
    color: purple;
    background-color: rgb(231, 231, 231);
}

.button-password {
    color: purple;
    background-color: rgb(231, 231, 231);
    padding-top: 1%;
    padding-left: 2%;
    padding-bottom: 1%;
    padding-right: 2%;
}

footer {
    margin-top: 2%;
    border-top: 1px solid;
    text-align: right;
}

.btn-cancelar {
    color: purple;
    background-color: rgb(231, 231, 231);
    padding-top: 1%;
    padding-left: 2%;
    padding-bottom: 1%;
    padding-right: 2%;
    margin-top: 10px;
}

.btn-save {
    color: purple;
    background-color: rgb(231, 231, 231);
    padding-top: 1%;
    padding-left: 2%;
    padding-bottom: 1%;
    padding-right: 2%;
    margin-top: 10px;
    margin-left: 10px;
}
</style>

<script>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'
export default {
    components: { Link },
}
</script>
