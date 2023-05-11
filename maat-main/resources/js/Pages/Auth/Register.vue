<script>
export default {
    mounted() {
        const registerButton = document.getElementById("register");
        const loginButton = document.getElementById("login");
        const container = document.getElementById("container");

        // Empresa es false y ONG es true
        registerButton.addEventListener("click", () => {
            container.classList.add("right-panel-active");
        });

        loginButton.addEventListener("click", () => {
            container.classList.remove("right-panel-active");
        });
    },

    components: { GuestLayout },
};
</script>
<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import ShadowBox from "@/Components/ShadowBox.vue";

import * as Validaciones from "./../../validations/Validaciones.js";

// Es true porque aparece ONG por defecto
const form = useForm({
    nombre_empresa: "",
    nif: "",
    correo: "",
    password: "",
    password_confirmation: "",
    terms: false,
    clientOng: true,
});

const submit = () => {
    var valido = 0;

    try {
        // Si es empresa
        if (!form.clientOng) {
            // Validaciones. Mira si los respectivos campos son válidos. Mira también
            // si hay injecciones
            if (
                Validaciones.checkInjection(form.nombre_empresa) &&
                Validaciones.checkUserTxt(form.nombre_empresa)
            ) {
                valido++;
                form.errors.nombre_empresa = null;
            } else {
                form.errors.nombre_empresa =
                    "Asegurese que su usuario tenga una longitud de 4 y 30 " +
                    "carácteres y que sea un usuario válido";
            }

            // Validación de la tarjeta empresarial
            if (
                Validaciones.checkInjection(form.nif) &&
                Validaciones.checkTarjeta(form.nif)
            ) {
                valido++;
                form.errors.nif = null;
            } else {
                form.errors.nif =
                    "Asegurese de que sea una tarjeta válida. Tiene que tener la misma " +
                    "estructura a la siguiente: 12345678A";
            }

            // Validación email
            if (
                Validaciones.checkInjection(form.correo) &&
                Validaciones.checkEmailTxt(form.correo)
            ) {
                valido++;
                form.errors.correo = null;
            } else {
                form.errors.correo =
                    "Asegurate de que es un email válido parecido a la siguiente " +
                    "estructura: AAA@AAA.AA o AAA@AAA.AAA";
            }

            // Validación password
            if (
                Validaciones.checkInjection(form.password) &&
                Validaciones.checkPassword(form.password)
            ) {
                valido++;
                form.errors.password = null;
            } else {
                // Mira que tenga 1 número, 1 mayúscula y 1 minúscula
                form.errors.password =
                    "La contraseña tiene que ser válida y tener entre 8-16 carácteres e " +
                    "incluir 1 número, 1 mayúscula y 1 minúscula.";
            }

            // Valida si password es igual a confimaciónd de la password
            if (form.password == form.password_confirmation) {
                valido++;
                form.errors.password_confirmation = null;
            } else {
                form.errors.password_confirmation =
                    "La contraseñas introducidas deben ser las mismas";
            }

            // Si cumple todos los requisitos envía el formulario
            if (valido == 5) {
                form.post(route("register"), {
                    onFinish: () =>
                        form.reset("password", "password_confirmation"),
                });
            } else {
                console.log(
                    "Hay un error en el formulario. Por favor, revise los datos introducidos"
                );
            }

            // Solo cuando es ONG
        } else {
<<<<<<< HEAD
            /*-----------------------------------------------------------------------------------------*/
            // Validaciones. Mira si los respectivos campos son válidos. Mira también
            // si hay injecciones
            if (
                Validaciones.checkInjection(form.nombre_empresa) &&
                Validaciones.checkUserTxt(form.nombre_empresa)
            ) {
                valido++;
                form.errors.nombre_empresa = null;
            } else {
                form.errors.nombre_empresa =
                    "Asegurese que su usuario tenga una longitud de 4 y 30 " +
                    "carácteres y que sea un usuario válido";
            }

            // Validación de la tarjeta empresarial
            if (
                Validaciones.checkInjection(form.nif) &&
                Validaciones.checkTarjeta(form.nif)
            ) {
                valido++;
                form.errors.nif = null;
            } else {
                form.errors.nif =
                    "Asegurese de que sea una tarjeta válida. Tiene que tener la misma " +
                    "estructura a la siguiente: 12345678A";
            }

            // Validación email
            if (
                Validaciones.checkInjection(form.correo) &&
                Validaciones.checkEmailTxt(form.correo)
            ) {
                valido++;
                form.errors.correo = null;
            } else {
                form.errors.correo =
                    "Asegurate de que es un email válido parecido a la siguiente " +
                    "estructura: AAA@AAA.AA o AAA@AAA.AAA";
            }

            // Validación password
            if (
                Validaciones.checkInjection(form.password) &&
                Validaciones.checkPassword(form.password)
            ) {
                valido++;
                form.errors.password = null;
            } else {
                // Mira que tenga 1 número, 1 mayúscula y 1 minúscula
                form.errors.password =
                    "La contraseña tiene que ser válida y tener entre 8-16 carácteres e " +
                    "incluir 1 número, 1 mayúscula y 1 minúscula.";
            }

            // Valida si password es igual a confimaciónd de la password
            if (form.password == form.password_confirmation) {
                valido++;
                form.errors.password_confirmation = null;
            } else {
                form.errors.password_confirmation =
                    "La contraseñas introducidas deben ser las mismas";
            }

            /*-----------------------------------------------------------------------------------------*/

            // Si cumple todos los requisitos envía el formulario
            if (valido == 5) {
                form.post(route("register"), {
                    onFinish: () =>
                        form.reset("password", "password_confirmation"),
                });
            } else {
                console.log(
                    "Hay un error en el formulario. Por favor, revise los datos introducidos"
                );
            }
=======
            form.post(route("register"), {
                onFinish: () => form.reset("password", "password_confirmation"),
            });
>>>>>>> f5299890b14b25ccc8a9bbf9eb9c18b157ae60be
        }
    } catch (error) {
        console.log(error);
    }
};

// Cambia de ong a empresa y viceversa
const changeToOng = () => {
    try {
        form.nombre_empresa = "";
        form.nif = "";
        form.correo = "";
        form.password = "";
        form.password_confirmation = "";
        form.clientOng = true;
    } catch (error) {
        console.log(error);
    }
};

const changeToEmpr = () => {
    try {
        form.nombre_empresa = "";
        form.nif = "";
        form.correo = "";
        form.password = "";
        form.password_confirmation = "";
        form.clientOng = false;
    } catch (error) {
        console.log(error);
    }
};

const mirarInputs = (e) => {
    try {
        Validaciones.checkInput(e);
    } catch (error) {
        console.log(error);
    }
};

const mirarInputsEmail = (e) => {
    try {
        Validaciones.checkInputEmail(e);
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
    <Head title="Registro" />
    <div class="container" id="container">
        <div class="form-container register-container">
            <ShadowBox>
                <!-- Cuando es empresa -->
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel
                            for="nombre_empresa"
                            value="Nombre Empresa"
                            class="block text-sm font-medium mb-1"
                        />

                        <TextInput
                            id="nombre_empresa"
                            type="text"
                            v-model="form.nombre_empresa"
                            autocomplete="no"
                            required
                            autofocus
                            class="form-input w-full"
                            @keydown="mirarInputs($event)"
                            @keypress="mirarInputs($event)"
                            @paste="$event.preventDefault()"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.nombre_empresa"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel
                            for="nif"
                            value="Numero / Tarjeta"
                            class="block text-sm font-medium mb-1"
                        />
                        <TextInput
                            id="nif"
                            type="text"
                            v-model="form.nif"
                            autocomplete="no"
                            required
                            autofocus
                            class="form-input w-full"
                            @keydown="mirarInputsTarjeta($event)"
                            @keypress="mirarInputsTarjeta($event)"
                            @paste="$event.preventDefault()"
                        />

                        <InputError class="mt-2" :message="form.errors.nif" />
                    </div>
                    <div class="mt-4">
                        <InputLabel
                            for="correo"
                            value="Correo"
                            class="block text-sm font-medium mb-1"
                        />
                        <TextInput
                            id="correo"
                            type="email"
                            v-model="form.correo"
                            autocomplete="no"
                            required
                            autofocus
                            class="form-input w-full"
                            @keydown="mirarInputsEmail($event)"
                            @keypress="mirarInputsEmail($event)"
                            @paste="$event.preventDefault()"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.correo"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel
                            for="password"
                            value="Contraseña"
                            class="block text-sm font-medium mb-1"
                        />
                        <TextInput
                            id="password"
                            type="password"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                            class="form-input w-full"
                            @keydown="mirarInputs($event)"
                            @keypress="mirarInputs($event)"
                            @paste="$event.preventDefault()"
                        />

                        <InputError
                            class="mt-3"
                            :message="form.errors.password"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel
                            for="password_confirmation"
                            value="Confirma la contraseña"
                            class="block text-sm font-medium mb-1"
                        />
                        <TextInput
                            id="password_confirmation"
                            type="password"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                            class="form-input w-full"
                            @keydown="mirarInputs($event)"
                            @keypress="mirarInputs($event)"
                            @paste="$event.preventDefault()"
                        />
                        <InputError
                            class="mt-3 form-input w-full"
                            :message="form.errors.password_confirmation"
                        />
                    </div>
                    <div class="mt-3">
                        <PrimaryButton
                            class="boton mt-3 ml-0"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Registrar
                        </PrimaryButton>
                        <hr />
                    </div>
                    <Link :href="route('login')" class="underline mt-3">
                        ¿Ya está registrado?
                    </Link>
                </form>
            </ShadowBox>
        </div>

        <div class="form-container login-container">
            <ShadowBox>
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <InputLabel
                            for="nombre_empresa"
                            value="Nombre ONG"
                            class="block text-sm font-medium mb-1"
                        />
                        <TextInput
                            id="nombre_empresa"
                            type="text"
                            v-model="form.nombre_empresa"
                            required
                            autofocus
                            class="form-input w-full"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.nombre_empresa"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel
                            for="nif"
                            value="NIF"
                            class="block text-sm font-medium mb-1"
                        />
                        <TextInput
                            id="nif"
                            type="text"
                            v-model="form.nif"
                            required
                            autofocus
                            class="form-input w-full"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel
                            for="correo"
                            value="Correo"
                            class="block text-sm font-medium mb-1"
                        />
                        <TextInput
                            id="correo"
                            type="email"
                            v-model="form.correo"
                            required
                            autofocus
                            class="form-input w-full"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.correo"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel
                            for="password"
                            value="Contraseña"
                            class="block text-sm font-medium mb-1"
                        />
                        <TextInput
                            id="password"
                            type="password"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                            class="form-input w-full"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.password"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel
                            for="password_confirmation"
                            value="Confirma la contraseña"
                            class="block text-sm font-medium mb-1"
                        />
                        <TextInput
                            id="password_confirmation"
                            type="password"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                            class="form-input w-full"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.password_confirmation"
                        />
                    </div>
                    <div>
                        <PrimaryButton
                            class="boton btn text-white ml-0"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Registrar
                        </PrimaryButton>
                        <hr />
                    </div>
                    <Link :href="route('login')" class="underline mt-3">
                        ¿Ya está registrado?
                    </Link>
                </form>
            </ShadowBox>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <button class="ghost" id="login" @click="changeToOng">
                        ¿Eres una ONG?
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <button class="ghost" id="register" @click="changeToEmpr">
                        ¿Eres una empresa?
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
button {
    position: relative;
    border-radius: 50px;
    border: 1px solid #4bb6b7;
    background-color: #73cd99;
    color: #fff;
    font-size: 15px;
    font-weight: 700;
    margin: 10px;
    padding: 12px 80px;
    letter-spacing: 1px;
    text-transform: capitalize;
    transition: 0.3s ease-in-out;
}

/* .boton:hover{
  letter-spacing: 3px;
  background-color: #73cd99;
} */
button:hover {
    letter-spacing: 3px;
}

.boton:active {
    transform: scale(0.95);
}

.boton:focus {
    outline: none;
}

button.ghost {
    background-color: #73cd99;
    border: 2px solid #fff;
    color: #333;
}

button.ghost i {
    position: absolute;
    opacity: 0;
    transition: 0.3s ease-in-out;
}

/* form {
  background-color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  height: 100%;
  text-align: left;
} */
.form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

.login-container {
    left: 0;
    width: 50%;
    z-index: 2;
}

.container.right-panel-active .login-container {
    transform: translateX(100%);
}

.register-container {
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
}

.container.right-panel-active .register-container {
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: show 0.6s;
}

@keyframes show {
    0%,
    49.99% {
        opacity: 0;
        z-index: 1;
    }

    50%,
    100% {
        opacity: 1;
        z-index: 5;
    }
}

.overlay-container {
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: transform 0.6s ease-in-out;
    z-index: 100;
}

.container.right-panel-active .overlay-container {
    transform: translate(-100%);
}

.overlay {
    /* background-image: url('image/manos.png'); */
    background-color: #212121;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 0 0;
    color: #fff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}

.overlay::before {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: linear-gradient(
        to top,
        rgba(46, 94, 109, 0.4) 40%,
        rgba(46, 94, 109, 0)
    );
}

.container.right-panel-active .overlay {
    transform: translateX(50%);
}

.overlay-panel {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    text-align: center;
    top: 0;
    height: 100%;
    width: 50%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}

.overlay-left {
    transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
    transform: translateX(0);
}

.overlay-right {
    right: 0;
    transform: translateX(0);
}

.container.right-panel-active .overlay-right {
    transform: translateX(20%);
}
</style>
