<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";

import { onMounted } from "vue";
import axios from "axios";

import * as Validaciones from "./../../validations/Validaciones.js";

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});
const user = usePage().props.auth.user;

var organizacion = "";

const form = useForm({
    name: "",
    numTar: "",
    ubicacion: "",
    web: "",
    descripcion: "",
    entidad: user.entidad_id,
});

onMounted(() => {
    try {
        axios
            .get("/get/organizacion", {
                params: {
                    organizacion: user.entidad_id,
                },
            })
            .then((response) => {
                organizacion = response.data;
                form.name = organizacion[0].nombre;
                form.numTar = organizacion[0].numero_tarjeta;
                form.ubicacion = organizacion[0].ubicacion;
                form.web = organizacion[0].web;
                form.descripcion = organizacion[0].descripcion;
            });
    } catch (error) {
        console.log(error);
    }
});

// Actualiza los datos
const actualizar = () => {
    var contador = 0;
    try {
        // Mira que todo esté correcto antes de introducir los datos
        // Nombre de la empresa
        if (
            form.name.replace(" ", "").length > 3 &&
            Validaciones.checkInjection(form.name.replace(" ", ""))
        ) {
            form.errors.name = "";
            contador++;
        } else {
            form.errors.name =
                "El nombre de la empresa tiene que tener 4 o más carácteres y ser válido.";
        }

        // Tarjeta de la empresa
        if (Validaciones.checkTarjeta(form.numTar)) {
            form.errors.numTar = "";
            contador++;
        } else {
            form.errors.numTar =
                "La tarjeta tiene que tener 8 números y una letra en mayúscula al final.";
        }

        // Ubicación de la empresa
        if (
            Validaciones.checkUbicacion(form.ubicacion) &&
            Validaciones.checkInjection(form.ubicacion)
        ) {
            form.errors.ubicacion = "";
            contador++;
        } else {
            form.errors.ubicacion =
                "La ubicación tiene que ser válido y solo puede llevar 1 punto, 1 guión y tener más de 2 carácteres.";
        }

        // Link web de la empresa
        if (
            Validaciones.checkWeb(form.web) &&
            Validaciones.checkInjection(form.web)
        ) {
            form.errors.web = "";
            contador++;
        } else {
            form.errors.web =
                "Asegúrate de que la web puesta tenga la siguiente estructura AAA.AAA o AAA.AAA.AAA";
        }

        // Descripción de la empresa
        if (
            form.descripcion.replaceAll(" ", "").length >= 8 &&
            Validaciones.checkInjection(form.descripcion.replaceAll(" ", ""))
        ) {
            form.errors.descripcion = "";
            contador++;
        } else {
            form.errors.descripcion =
                "La descripción tiene que tener 8 carácteres o más.";
        }

        // Si cumple las condiciones, se actualizan los datos
        if (contador == 5) {
            form.post("/edit/organizacion", {
                onSuccess: () => (form.errors.sentData = ""),
                onError: () =>
                    (form.errors.sentData =
                        "No se han podido cambiar los datos."),
            });
        }
    } catch (error) {
        console.log(error);
    }
};

const mirarInputsWithSpace = (e) => {
    try {
        Validaciones.checkInputWithSpace(e);
    } catch (error) {
        console.log(error);
    }
};

const mirarInputsWeb = (e) => {
    try {
        Validaciones.checkInput(e);
    } catch (error) {
        console.log(error);
    }
};

const mirarInputsTarjeta = (e) => {
    try {
        Validaciones.checkInputTarjeta(e);
    } catch (error) {
        console.log(error);
    }
};
</script>

<template>
    <section>
        <div class="p-5">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    Información de la Organizacion
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Actualiza los datos de tu organizacion
                </p>
            </header>

            <form @submit.prevent="actualizar" class="mt-6 space-y-6">
                <div>
                    <InputLabel for="name" value="Nombre de la organizacion" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                        @keydown="mirarInputsWithSpace($event)"
                        @keypress="mirarInputsWithSpace($event)"
                        @paste="$event.preventDefault()"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                    <InputLabel for="numTar" value="Numero / Tarjeta" />

                    <TextInput
                        id="numTar"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.numTar"
                        required
                        autocomplete="username"
                        @keydown="mirarInputsWithSpace($event)"
                        @keypress="mirarInputsWithSpace($event)"
                        @paste="$event.preventDefault()"
                    />

                    <InputError class="mt-2" :message="form.errors.numTar" />
                </div>

                <div>
                    <InputLabel for="ubicacion" value="Ubicación" />

                    <TextInput
                        id="ubicacion"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.ubicacion"
                        required
                        autofocus
                        autocomplete="ubicacion"
                        @keydown="mirarInputsWithSpace($event)"
                        @keypress="mirarInputsWithSpace($event)"
                        @paste="$event.preventDefault()"
                    />

                    <InputError class="mt-2" :message="form.errors.ubicacion" />
                </div>

                <div>
                    <InputLabel for="web" value="Página Web" />

                    <TextInput
                        id="web"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.web"
                        required
                        autofocus
                        autocomplete="web"
                        @keydown="mirarInputsWithSpace($event)"
                        @keypress="mirarInputsWithSpace($event)"
                        @paste="$event.preventDefault()"
                    />

                    <InputError class="mt-2" :message="form.errors.web" />
                </div>

                <div>
                    <InputLabel
                        for="descripion"
                        value="Descripcion / Sobre nosotros"
                    />

                    <TextInput
                        id="descripcion"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.descripcion"
                        required
                        autofocus
                        autocomplete="descripcion"
                        @keydown="mirarInputsWithSpace($event)"
                        @keypress="mirarInputsWithSpace($event)"
                        @paste="$event.preventDefault()"
                    />

                    <InputError class="mt-2" :message="form.errors.desc" />
                </div>

                <div
                    v-if="
                        props.mustVerifyEmail && user.email_verified_at === null
                    "
                >
                    <p class="text-sm mt-2 text-gray-800">
                        Your email address is unverified.
                        <Link
                            :href="route('verification.send')"
                            method="post"
                            as="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Click here to re-send the verification email.
                        </Link>
                    </p>

                    <div
                        v-show="props.status === 'verification-link-sent'"
                        class="mt-2 font-medium text-sm text-green-600"
                    >
                        A new verification link has been sent to your email
                        address.
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <PrimaryButton :disabled="form.processing"
                        >Save</PrimaryButton
                    >

                    <Transition
                        enter-from-class="opacity-0"
                        leave-to-class="opacity-0"
                        class="transition ease-in-out"
                    >
                        <p
                            v-if="form.recentlySuccessful"
                            class="text-sm text-gray-600"
                        >
                            Saved.
                        </p>
                    </Transition>
                </div>
            </form>
        </div>
    </section>
</template>
