<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Logo from "@/Components/Logo.vue";

const form = useForm({
  nombre_empresa: "",
  nif: "",
  correo: "",
  password: "",
  password_confirmation: "",
  terms: false,
});

const submit = () => {
  form.post(route("registerOng"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>
<template>
  <Head title="Registro ONG" />
  <div class="form_izq">
    <form @submit.prevent="submit">
      <div>
        <InputLabel for="nombre_empresa" value="Nombre ONG" />
        <TextInput id="nombre_empresa" type="text" v-model="form.nombre_empresa" required autofocus />
        <InputError class="mt-2" :message="form.errors.nombre_empresa" />
      </div>
      <div>
        <InputLabel for="nif" value="NIF" />
        <TextInput id="nif" type="text" v-model="form.nif" required autofocus />
      </div>
      <div>
        <InputLabel for="correo" value="Correo" />
        <TextInput id="correo" type="email" v-model="form.correo" required autofocus />
        <InputError class="mt-2" :message="form.errors.correo" />
      </div>
      <div>
        <InputLabel for="password" value="Contraseña" />
        <TextInput id="password" type="password" v-model="form.password" required autocomplete="new-password" />
        <InputError class="mt-2" :message="form.errors.password" />
      </div>
      <div class="mt-4">
        <InputLabel for="password_confirmation" value="Confirma la contraseña" />
        <TextInput id="password_confirmation" type="password" v-model="form.password_confirmation" required
          autocomplete="new-password" />
        <InputError class="mt-2" :message="form.errors.password_confirmation" />
      </div>
      <div>
        <Link :href="route('login')" class="underline">
        ¿Ya está registrado?
        </Link>
        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Registrar
        </PrimaryButton>
      </div>
    </form>
  </div>
  <div class="img_der">
    <Logo></Logo>
  </div>
</template>
<style>
.form_izq {
  background-color: #73cd99;
  display: block;
  align-items: center;
  text-align: center;
  float: left;
  width: 50%;
  height: 100vh;
  padding-top: 25vh;
}

.img_der {
  background-color: #000000;
  display: flex;
  padding: 20px;
  height: 100vh;
  align-items: center;
  text-align: center;
}
</style>
