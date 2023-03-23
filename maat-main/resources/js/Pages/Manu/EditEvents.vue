<script setup>
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

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
</script>

<template>
    <Head title="EditEvents" />

    <PrivateLayout>
        <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="nombreEvento" value="Nombre del evento" />

                        <TextInput id="nombreEvento" type="text" class="mt-1 block w-full" v-model="form.nombreEvento"
                            required autofocus autocomplete="nombreEvento" />

                        <InputError class="mt-2" :message="form.errors.nombreEvento" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="descripcion" value="Descripción del evento" />

                        <TextArea id="descripcion" type="text" class="mt-1 block w-full" v-model="form.descripcion"
                            required />

                        <InputError class="mt-2" :message="form.errors.descripcion" />
                    </div>

                    <div class="grid grid-cols-3 gap-4">

                        <div class="mt-4">
                            <InputLabel for="fecha" value="Día del Evento" />

                            <TextInput id="fecha" type="date" class="mt-1 block w-full" v-model="form.fecha" required />

                            <InputError class="mt-2" :message="form.errors.fecha" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="horaInicio" value="Hora de Inicio" />

                            <TextInput id="horaInicio" type="time" class="mt-1 block w-full" v-model="form.horaInicio"
                                required />

                            <InputError class="mt-2" :message="form.errors.horaInicio" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="horaFinal" value="Hora de Fin" />

                            <TextInput id="horaFinal" type="time" class="mt-1 block w-full" v-model="form.horaFinal"
                                required />

                            <InputError class="mt-2" :message="form.errors.horaFinal" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="plazas" value="Plazas del Evento" />

                        <TextInput id="plazas" type="number" class="mt-1 block w-full" v-model="form.plazas" required />

                        <InputError class="mt-2" :message="form.errors.plazas" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="imagen" value="Imagen del Evento" />

                        <TextInput id="imagen" type="file" class="mt-1 block w-full" v-model="form.imagen" required />

                        <InputError class="mt-2" :message="form.errors.imagen" />
                    </div>

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
