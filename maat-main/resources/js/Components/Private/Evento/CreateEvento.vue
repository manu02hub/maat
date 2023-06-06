<script setup>
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";

const form = useForm({
    nombre: "", descripcion: "", fecha_inicio: "", fecha_final: "", hora_inicio: "", hora_final: "", plazas: "", organizacion_id: "",
});

</script>
<template>
    <div class="grid-system">
        <div>
            <div class="form-container">
                <form @submit.prevent="form.patch(route('storeEvento'))">
                    <div class="title">Crear Evento</div>

                    
                    <label for="nombre">nombre:</label>
                    <input
                        type="text"
                        id="nombre"
                        v-model="form.nombre"
                        required
                    />

                    <label for="descripcion">descripcion:</label>
                    <input
                        type="text"
                        id="descripcion"
                        v-model="form.descripcion"
                        required
                    />

                    <label for="fecha_inicio">fecha_inicio:</label>
                    <input
                        type="text"
                        id="fecha_inicio"
                        v-model="form.fecha_inicio"
                        required
                    />

                    <label for="fecha_final">fecha_final:</label>
                    <input
                        type="text"
                        id="fecha_final"
                        v-model="form.fecha_final"
                        required
                    />

                    <label for="hora_inicio">hora_inicio:</label>
                    <input
                        type="text"
                        id="hora_inicio"
                        v-model="form.hora_inicio"
                        required
                    />

                    <label for="hora_final">hora_final:</label>
                    <input
                        type="text"
                        id="hora_final"
                        v-model="form.hora_final"
                        required
                    />

                    <label for="plazas">plazas:</label>
                    <input
                        type="text"
                        id="plazas"
                        v-model="form.plazas"
                        required
                    />

                    <label for="organizacion_id">organizacion_id:</label>
                    <input
                        type="text"
                        id="organizacion_id"
                        v-model="form.organizacion_id"
                        required
                    />

                    <div class="button-container">
                        <Link
                            :href="route('indexEvento')"
                            type="button"
                            class="cancel-button"
                        >
                            Cancelar
                        </Link>
                        <PrimaryButton
                            type="submit"
                            class="submit-button"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Guardar Evento
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>
.title {
    font-size: 30px;
    padding-left: 2%;

}

span{
    margin-bottom: 1%;
    margin-left: 2%;
    font-size: 0.875rem;
    line-height: 1.25rem;
    margin-top: 4px;
    --tw-text-opacity: 1;
    color: rgb(75 85 99);
}
.form-container {
    background-color: #ffffff;
    border-radius: 10px;
    padding: 20px;
    width: 98%;
    margin: 0 auto;
    margin-top: 5%;
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.4);
}

form {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
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

label {
    font-weight: bold;
    margin-bottom: 5px;
    padding-left: 3%;
}

input {
    margin-left:3%;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea {
    width: 80%;
    margin-bottom: 25px;
    border-radius: 5px;
    font-family: inherit;
    font-size: 100%;
    font-weight: inherit;
    line-height: inherit;
    color: inherit;
    border: 2px solid rgb(209 213 219);
}

.button-container {
    display: flex;
    justify-content: flex-start;
    margin-left: 3%;
}

.cancel-button {
    float: right;
    background-color: #4caf50;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 2%;
}
.submit-button {
    background-color: #4caf50;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.submit-button:hover {
    background-color: #3e8e41;
}

@media screen and (max-width: 768px) {
    .form-container {
        width: 100%;
    }
}
</style>
