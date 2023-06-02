<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";

const props = defineProps({
    id: {
        type: Number,
        required: true
    },
    comentario: {
        type: String,
        required: true
    },
    estrellas: {
        type: Number,
        required: true
    },
    user_id: {
        type: Number,
        required: true
    },
    evento_id: {
        type: Number,
        required: true
    },
})

const valoraciones = usePage().props.valoracion;

const form = useForm({
    comentario: valoraciones.comentario,
    estrellas: valoraciones.estrellas,
    user_id: valoraciones.user_id,
    evento_id: valoraciones.evento_id,
});

const submit = (id) => {
    form.post(route('updateValoracion', id));
};

</script>
<template>
    <div class="grid-system">
        <div>
            <div class="form-container">
                <form @submit.prevent="submit($page.props.valoracion.id)">
                    <div class="title">Editar una Valoración</div>
                    <input type="text" id="id" v-model="form.id" hidden />

                    <label for="comentario">Comentario:</label>
                    <input type="text" id="comentario" v-model="form.comentario" required />

                    <label for="estrellas">Estrellas:</label>
                    <input type="text" id="estrellas" v-model="form.estrellas" required />

                    <label for="user_id">user_id:</label>
                    <input type="text" id="user_id" v-model="form.user_id" required />

                    <label for="evento_id">evento_id:</label>
                    <input type="text" id="evento_id" v-model="form.evento_id" required />

                    <div>
                        <Link :href="route('indexValoracion')">
                        <button class="btn-cancelar">Cancelar</button>
                        </Link>
                        <PrimaryButton type="submit" class="submit-button" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Actulizar Valoración
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

span {
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
    padding-left: 2%;
}

input {
    margin-left: 2%;
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
    margin-left: 2%;
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
