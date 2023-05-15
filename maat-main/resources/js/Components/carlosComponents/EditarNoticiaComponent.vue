<script setup>
import SearchForm from "@/Components/mosaic/components/SearchForm.vue";
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import CardEvent from "@/Components/manuComponents/CardEvent.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";

const props = defineProps({
    id: {
        type: Number,
        required: true
    },
    titulo: {
        type: String,
        required: true
    },
    fecha: {
        type: String,
        required: true
    },
    descripcion: {
        type: String,
        required: true
    },
    imagen: {
        type: String,
        required: true
    }
})

const noticia = usePage().props.noticia;

const form = useForm({
    titulo: noticia.titulo,
    fecha: noticia.fecha,
    descripcion: noticia.descripcion,
    imagen: noticia.imagen,
});

const submit = (id) => {
    form.post(route('noticia-update', id));
};

</script>

<template>
    <div class="grid-system">
        <form @submit.prevent="submit($page.props.noticia.id)">
            <div class="spam-header">
                <span>Editar Noticia</span>
                <div class="div-datos-basicos">
                    <div class="div-form-primero">
                        <label for="titulo">Título</label>
                        <input type="text" v-model="form.titulo">
                    </div>
                    <div class="div-form-primero">
                        <label for="fecha">Fecha</label>
                        <input type="text" v-model="form.fecha">
                    </div>

                    <!-- <div class="div-form-primero">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellidos">
                </div> -->
                    <!-- <div class="div-form-primero">
                    <label for="puesto">Puesto</label>
                    <input type="text" id="puesto">
                </div> -->
                </div>
                <div class="div-form-segundo">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" v-model="form.descripcion">
                </div>
                <div class="div-form-segundo">
                    <label for="imagen">URL de la Imagen</label>
                    <input type="text" v-model="form.imagen">
                </div>
            </div>
            <footer>
                <Link :href="route('noticias-listado')">
                <button class="btn-cancelar">Cancelar</button>
                </Link>
                <PrimaryButton class="btn-save" id="btnRegistro"
                    :disabled="form.processing">
                    Editar Noticia
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
