<script setup>
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";

const form = useForm({

    nombreEvento: "",
    descripcion: "",
    fecha: "",
    horaInicio: "",
    horaFinal: "",
    plazas: "",
    terms: false,
});
</script>

<template>
    <Head title="EditEvents" />

    <PrivateLayout>
        <div
            class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
        >
            <div
                class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
            >

                <form
                    @submit.prevent="form.patch(route('store'))"
                    enctype="multipart/form-data"
                >


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
                            class="mt-1"
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
                            class="mt-1"
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

                        <InputError class="mt-1" :message="form.errors.fecha" />
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
                                class="mt-1"
                                :message="form.errors.horaInicio"
                            />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="horaFinal" value="Hora de Fin" />

                            <TextInput
                                id="horaFinal"
                                type="time"
                                class="mt-1 block w-full"
                                v-model="form.horaFinal"
                            />

                            <InputError
                                class="mt-1"
                                :message="form.errors.horaFinal"
                            />
                        </div>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="plazas" value="Plazas del Evento" />

                        <TextInput
                            id="plazas"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.plazas"
                        />

                        <InputError
                            class="mt-1"
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
                    </div>
                </form>
            </div>
        </div>
    </PrivateLayout>
</template>
