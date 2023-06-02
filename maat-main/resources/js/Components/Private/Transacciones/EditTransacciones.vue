<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";

const props = defineProps({
    id: {
        type: Number,
        required: true
    },
    titular: {
        type: String,
        required: true
    },
    concepto: {
        type: String,
        required: true
    },
    fecha: {
        type: Date,
        required: true
    },
    hora: {
        type: String,
        required: true
    },
    cantidad: {
        type: Number,
        required: true
    },
    entidad_id: {
        type: Number,
        required: true
    },
})

const transaccions = usePage().props.transaccion;

const form = useForm({
    titular: transaccions.titular,
    concepto: transaccions.concepto,
    fecha: transaccions.fecha,
    hora: transaccions.hora,
    cantidad: transaccions.cantidad,
    entidad_id: transaccions.entidad_id,
});

const submit = (id) => {
    form.post(route('updateTransacciones', id));
};

</script>
<template>
    <div class="grid-system">
        <div>
            <div class="form-container">
                <form @submit.prevent="submit($page.props.transaccion.id)">
                    <div class="title">Editar una Transacción</div>
                    <input type="text" id="id" v-model="form.id" hidden />

                    <label for="titular">Titular:</label>
                    <input type="text" id="titular" v-model="form.titular" required />

                    <label for="concepto">Concepto:</label>
                    <input type="text" id="concepto" v-model="form.concepto" required />

                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" v-model="form.fecha" required />

                    <label for="hora">Hora:</label>
                    <input type="text" id="hora" v-model="form.hora" required />

                    <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" v-model="form.cantidad" required />

                    <label for="entidad_id">Entidad ID:</label>
                    <input type="text" id="entidad_id" v-model="form.entidad_id" required />

                    <div>
                        <Link :href="route('indexTransacciones')">
                        <button class="btn-cancelar">Cancelar</button>
                        </Link>
                        <PrimaryButton type="submit" class="submit-button" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Actulizar Rol
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
