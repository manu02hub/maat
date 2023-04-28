<script setup>
<<<<<<< HEAD
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
=======
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
>>>>>>> sergio

const form = useForm({
    nombreEvento: '',
    descripcion: '',
    fecha: '',
    horaInicio: '',
    horaFinal: '',
    plazas: '',
<<<<<<< HEAD
    imagen: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
=======
    terms: false,
});
>>>>>>> sergio
</script>

<template>
    <Head title="EditEvents" />

    <PrivateLayout>
<<<<<<< HEAD
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
=======
        <div
            class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
        >
            <div
                class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
            >
                <form @submit.prevent="form.patch(route('store'))">
                    <div>
                        <InputLabel
                            for="nombreEvento"
                            value="Nombre del evento"
                        />

                        <TextInput
                            id="nombreEvento"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.nombreEvento"
                            autofocus
                            autocomplete="nombreEvento"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.nombreEvento"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel
                            for="descripcion"
                            value="Descripción del evento"
                        />

                        <TextArea
                            id="descripcion"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.descripcion"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.descripcion"
                        />
                    </div>

                    <!--FECHA-->
                    <div class="mt-4">
                        <InputLabel for="fecha" value="Día del Evento" />

                        <TextInput
                            id="fecha"
                            type="date"
                            class="mt-1 block w-full"
                            v-model="form.fecha"
                        />

                        <InputError class="mt-2" :message="form.errors.fecha" />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mt-4">
                            <InputLabel
                                for="horaInicio"
                                value="Hora de Inicio"
                            />

                            <TextInput
                                id="horaInicio"
                                type="time"
                                class="mt-1 block w-full"
                                v-model="form.horaInicio"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.horaInicio"
                            />
>>>>>>> sergio
                        </div>

                        <div class="mt-4">
                            <InputLabel for="horaFinal" value="Hora de Fin" />

<<<<<<< HEAD
                            <TextInput id="horaFinal" type="time" class="mt-1 block w-full" v-model="form.horaFinal"
                                required />

                            <InputError class="mt-2" :message="form.errors.horaFinal" />
=======
                            <TextInput
                                id="horaFinal"
                                type="time"
                                class="mt-1 block w-full"
                                v-model="form.horaFinal"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.horaFinal"
                            />
>>>>>>> sergio
                        </div>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="plazas" value="Plazas del Evento" />

<<<<<<< HEAD
                        <TextInput id="plazas" type="number" class="mt-1 block w-full" v-model="form.plazas" required />

                        <InputError class="mt-2" :message="form.errors.plazas" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="imagen" value="Imagen del Evento" />

                        <TextInput id="imagen" type="file" class="mt-1 block w-full" v-model="form.imagen" required />

                        <InputError class="mt-2" :message="form.errors.imagen" />
                    </div>

                    <div class="flex items-end justify-end mt-4">

                        <PrimaryButton class="ml-4 bg-green-500" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Crear Evento
                        </PrimaryButton>

                        <PrimaryButton class="ml-4 bg-grey-300" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Cancel
                        </PrimaryButton>

=======
                        <TextInput
                            id="plazas"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.plazas"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.plazas"
                        />
                    </div>

                    <div class="flex items-end justify-end mt-4">
                        <PrimaryButton
                            class="ml-4 bg-green-500"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Crear Evento
                        </PrimaryButton>

                        <Link :href="route('eventsIndex')" method="get">
                            <PrimaryButton class="ml-4 bg-grey-300">
                                Cancelar
                            </PrimaryButton>
                        </Link>
>>>>>>> sergio
                    </div>
                </form>
            </div>
        </div>
    </PrivateLayout>
</template>
