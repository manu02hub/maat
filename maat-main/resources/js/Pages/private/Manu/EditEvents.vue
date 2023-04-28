<<<<<<< HEAD
=======

>>>>>>> sergio
<script setup>
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
<<<<<<< HEAD

// const form = useForm({
//     name: '',
//     email: '',
//     password: '',
//     password_confirmation: '',
//     terms: false,
// });

const form = useForm({
    nombreEvento: '',
    descripcion: '',
    fecha: '',
    horaInicio: '',
    horaFinal: '',
    plazas: '',
    imagen: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
=======
import { onMounted } from 'vue'
import { usePage } from '@inertiajs/vue3';
const { props } = usePage();
let { evento } = props;
const { id, nombre, descripcion, fecha_inicio, fecha_final, hora_inicio, hora_final, plazas } = evento;
onMounted(() => {
    console.log(id, nombre, descripcion, fecha_inicio, fecha_final, hora_inicio, hora_final, plazas)
})


const form = useForm({
    id: id,
    nombreEvento: nombre,
    descripcion: descripcion,
    fecha: fecha_inicio,
    horaInicio: hora_inicio,
    horaFinal: hora_final,
    plazas: plazas,
    terms: false,
});

// const submit = (e) => {
//     e.preventDefault();
//     form.post(route('update'), {
//         preserveState: true,

//     });
// };
>>>>>>> sergio
</script>

<template>
    <Head title="EditEvents" />

    <PrivateLayout>
        <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
<<<<<<< HEAD
                <form @submit.prevent="submit">
=======
                <form @submit.prevent="form.patch(route('update'))">
                    <div class="hidden invisible">
                        <InputLabel for="id" value="Id del evento" />

                        <TextInput id="id" type="text" class="mt-1 block w-full" v-model="form.id" autofocus
                            autocomplete="id" />

                        <InputError class="mt-2" :message="form.errors.id" />
                    </div>
>>>>>>> sergio
                    <div>
                        <InputLabel for="nombreEvento" value="Nombre del evento" />

                        <TextInput id="nombreEvento" type="text" class="mt-1 block w-full" v-model="form.nombreEvento"
<<<<<<< HEAD
                            required autofocus autocomplete="nombreEvento" />
=======
                            autofocus autocomplete="nombreEvento" />
>>>>>>> sergio

                        <InputError class="mt-2" :message="form.errors.nombreEvento" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="descripcion" value="Descripción del evento" />

<<<<<<< HEAD
                        <TextArea id="descripcion" type="text" class="mt-1 block w-full" v-model="form.descripcion"
                            required />
=======
                        <TextArea id="descripcion" type="text" class="mt-1 block w-full" v-model="form.descripcion" />
>>>>>>> sergio

                        <InputError class="mt-2" :message="form.errors.descripcion" />
                    </div>

                    <div class="grid grid-cols-3 gap-4">

                        <div class="mt-4">
                            <InputLabel for="fecha" value="Día del Evento" />

<<<<<<< HEAD
                            <TextInput id="fecha" type="date" class="mt-1 block w-full" v-model="form.fecha" required />
=======
                            <TextInput id="fecha" type="date" class="mt-1 block w-full" v-model="form.fecha" />
>>>>>>> sergio

                            <InputError class="mt-2" :message="form.errors.fecha" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="horaInicio" value="Hora de Inicio" />

<<<<<<< HEAD
                            <TextInput id="horaInicio" type="time" class="mt-1 block w-full" v-model="form.horaInicio"
                                required />
=======
                            <TextInput id="horaInicio" type="time" class="mt-1 block w-full" v-model="form.horaInicio" />
>>>>>>> sergio

                            <InputError class="mt-2" :message="form.errors.horaInicio" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="horaFinal" value="Hora de Fin" />

<<<<<<< HEAD
                            <TextInput id="horaFinal" type="time" class="mt-1 block w-full" v-model="form.horaFinal"
                                required />
=======
                            <TextInput id="horaFinal" type="time" class="mt-1 block w-full" v-model="form.horaFinal" />
>>>>>>> sergio

                            <InputError class="mt-2" :message="form.errors.horaFinal" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="plazas" value="Plazas del Evento" />

<<<<<<< HEAD
                        <TextInput id="plazas" type="number" class="mt-1 block w-full" v-model="form.plazas" required />
=======
                        <TextInput id="plazas" type="number" class="mt-1 block w-full" v-model="form.plazas" />
>>>>>>> sergio

                        <InputError class="mt-2" :message="form.errors.plazas" />
                    </div>

<<<<<<< HEAD
                    <div class="mt-4">
                        <InputLabel for="imagen" value="Imagen del Evento" />

                        <TextInput id="imagen" type="file" class="mt-1 block w-full" v-model="form.imagen" required />

                        <InputError class="mt-2" :message="form.errors.imagen" />
                    </div>

=======
>>>>>>> sergio
                    <div class="flex items-end justify-end mt-4">

                        <PrimaryButton class="ml-4 bg-yellow-500" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Editar Evento
                        </PrimaryButton>

                        <PrimaryButton class="ml-4 bg-grey-300" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Cancel
                        </PrimaryButton>

                    </div>
                </form>
            </div>
        </div>
    </PrivateLayout>
</template>
