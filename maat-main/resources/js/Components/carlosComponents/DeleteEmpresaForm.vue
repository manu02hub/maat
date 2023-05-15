<script setup>
import DangerButton from "@/Components/DangerButton.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import { nextTick, ref } from "vue";

import * as Validaciones from "./../../validations/Validaciones.js";

const confirmingEmpresaDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: "",
});

const confirmEmpresaDeletion = () => {
    try {
        confirmingEmpresaDeletion.value = true;
        nextTick(() => passwordInput.value.focus());
    } catch (error) {
        console.log(error);
    }
};

const deleteEmpresa = () => {
    try {
        // Validación password
        if (
            Validaciones.checkInjection(form.password) &&
            Validaciones.checkPassword(form.password)
        ) {
            form.post(route("empr.delete"), {
                preserveScroll: true,
                onSuccess: () => closeModal(),
                onError: () => errorPw(),
                onFinish: () => form.reset(),
            });
        } else {
            // Mira que tenga 1 número, 1 mayúscula y 1 minúscula
            form.errors.password =
                "La contraseña tiene que ser válida y tener entre 8-16 carácteres e " +
                "incluir 1 número, 1 mayúscula y 1 minúscula.";
        }
    } catch (error) {
        console.log(error);
    }
};

const errorPw = () => {
    try {
        passwordInput.value.focus();
        form.errors.password = "Contraseña incorrecta";
    } catch (error) {
        console.log(error);
    }
};

const closeModal = () => {
    try {
        confirmingEmpresaDeletion.value = false;
        form.errors.password = null;
        form.reset();
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
</script>

<template>
    <section class="space-y-6">
        <div class="p-5">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    Eliminar empresa
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Once your account is deleted, all of its resources and data
                    will be permanently deleted. Before deleting your account,
                    please download any data or information that you wish to
                    retain.
                </p>
            </header>

            <DangerButton class="mt-3" @click="confirmEmpresaDeletion"
                >Eliminar empresa</DangerButton
            >

            <Modal :show="confirmingEmpresaDeletion" @close="closeModal">
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">
                        Are you sure you want to delete your account?
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Once your account is deleted, all of its resources and
                        data will be permanently deleted. Please enter your
                        password to confirm you would like to permanently delete
                        your account.
                    </p>

                    <div class="mt-6">
                        <InputLabel
                            for="password"
                            value="Password"
                            class="sr-only"
                        />

                        <TextInput
                            id="password"
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="Password"
                            @keyup.enter="deleteEmpresa"
                            @keydown="mirarInputs($event)"
                            @keypress="mirarInputs($event)"
                            @paste="$event.preventDefault()"
                        />

                        <InputError
                            :message="form.errors.password"
                            class="mt-2"
                        />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <SecondaryButton @click="closeModal">
                            Cancel
                        </SecondaryButton>

                        <DangerButton
                            class="ml-3"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            @click="deleteEmpresa"
                        >
                            Delete Account
                        </DangerButton>
                    </div>
                </div>
            </Modal>
        </div>
    </section>
</template>
