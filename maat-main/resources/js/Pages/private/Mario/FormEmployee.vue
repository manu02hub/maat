<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import ShadowBox from "@/Components/ShadowBox.vue";

const form = useForm({
    nombre: "",
    dni: "",
    correo: "",
    password: "",
    password_confirmation: "",
    rol: "2",
    terms: false,
    clientOng: false
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register Employee" />
    <form @submit.prevent="submit">
        <div class="mt-4">
            <InputLabel for="nombre" value="Nombre Empresa" class="block text-sm font-medium mb-1" />
            <TextInput id="nombre" type="text" v-model="form.nombre" required autofocus
                class="form-input w-full" />
            <InputError class="mt-2" :message="form.errors.nombre" />
        </div>
        <div class="mt-4">
            <InputLabel for="dni" value="Numero / Tarjeta" class="block text-sm font-medium mb-1" />
            <TextInput id="dni" type="text" v-model="form.dni" required autofocus class="form-input w-full" />
        </div>
        <div class="mt-4">
            <InputLabel for="correo" value="Correo" class="block text-sm font-medium mb-1" />
            <TextInput id="correo" type="email" v-model="form.correo" required autofocus
                class="form-input w-full" />
            <InputError class="mt-2" :message="form.errors.correo" />
        </div>
        <div class="mt-4">
            <InputLabel for="password" value="Contraseña" class="block text-sm font-medium mb-1" />
            <TextInput id="password" type="password" v-model="form.password" required
                autocomplete="new-password" class="form-input w-full" />
            <InputError class="mt-3" :message="form.errors.password" />
        </div>
        <div class="mt-4">
            <InputLabel for="password_confirmation" value="Confirma la contraseña"
                class="block text-sm font-medium mb-1" />
            <TextInput id="password_confirmation" type="password" v-model="form.password_confirmation" required
                autocomplete="new-password" class="form-input w-full" />
            <InputError class="mt-3 form-input w-full" :message="form.errors.password_confirmation" />
        </div>
        <div class="mt-3">
            <PrimaryButton class="boton mt-3 ml-0" :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing">
                Registrar
            </PrimaryButton>
            <hr />
        </div>
    </form>
</template>