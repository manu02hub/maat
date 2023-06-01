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

var empresa = "";

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
            .get("/get/empresa", {
                params: {
                    empresa: user.entidad_id,
                },
            })
            .then((response) => {
                empresa = response.data;
                form.name = empresa[0].nombre;
                form.numTar = empresa[0].numero_tarjeta;
                form.ubicacion = empresa[0].ubicacion;
                form.web = empresa[0].web;
                form.descripcion = empresa[0].descripcion;
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
            form.name.length < 101 &&
            Validaciones.checkInjection(form.name.replace(" ", ""))
        ) {
            form.errors.name = "";
            contador++;
        } else {
            form.errors.name =
                "El nombre de la empresa tiene que tener 4 o más carácteres, ser válido y menos o igual de 100 carácteres.";
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
                "La ubicación tiene que ser válido y solo puede llevar 1 punto, 1 guión, tener más de 2 carácteres y menos de 256.";
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
                "Asegúrate de que la web puesta tenga la siguiente estructura AAA.AAA o AAA.AAA.AAA y que tenga menos de 256 carácteres";
        }

        // Descripción de la empresa
        if (
            form.descripcion.replace(" ", "").length >= 8 &&
            form.descripcion.length >= 8 &&
            form.descripcion.length < 256 &&
            Validaciones.checkInjection(form.descripcion.replaceAll(" ", ""))
        ) {
            form.errors.descripcion = "";
            contador++;
        } else {
            form.errors.descripcion =
                "La descripción tiene que ser válida y tener 8 carácteres o más y menos de 256.";
        }

        // Si cumple las condiciones, se actualizan los datos
        if (contador == 5) {
            form.post("/edit/empresa", {
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
                    Información de la Empresa
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Actualiza los datos de tu empresa
                </p>
            </header>

            <form @submit.prevent="actualizar" class="mt-6 space-y-6">
                <div>
                    <InputLabel for="name" value="Nombre de la empresa" />

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
                        @keydown="mirarInputsTarjeta($event)"
                        @keypress="mirarInputsTarjeta($event)"
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
                        @keydown="mirarInputsWeb($event)"
                        @keypress="mirarInputsWeb($event)"
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

                    <InputError
                        class="mt-2"
                        :message="form.errors.descripcion"
                    />
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

                <InputError class="mt-2" :message="form.errors.sentData" />

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
