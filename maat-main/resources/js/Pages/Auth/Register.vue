<script>
export default {
  mounted() {
    const registerButton = document.getElementById("register");
    const loginButton = document.getElementById("login");
    const container = document.getElementById("container");

    registerButton.addEventListener("click", () => {
      container.classList.add("right-panel-active");
    });

    loginButton.addEventListener("click", () => {
      container.classList.remove("right-panel-active");
    });
  },
};
</script>
<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
  nombre_empresa: "",
  nif: "",
  correo: "",
  password: "",
  password_confirmation: "",
  terms: false,
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>
<template>
  <Head title="Registro" />
  <div class="container" id="container">
    <div class="form-container register-container">
      <form @submit.prevent="submit">
        <div>
          <InputLabel for="nombre_empresa" value="Nombre Empresa" class="block text-sm font-medium mb-1" />
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
          <PrimaryButton class="boton" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Registrar
          </PrimaryButton>
          <hr />
        </div>
        <Link :href="route('login')" class="underline">
        ¿Ya está registrado?
        </Link>
      </form>
    </div>
    <div class="form-container login-container">
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
          <PrimaryButton class="boton" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Registrar
          </PrimaryButton>
          <hr />
        </div>
        <Link :href="route('login')" class="underline">
        ¿Ya está registrado?
        </Link>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <button class="ghost" id="login">¿Eres una ONG?</button>
        </div>
        <div class="overlay-panel overlay-right">
          <button class="ghost" id="register">
            ¿Eres una empresa?
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<style>
.content {
  display: flex;
  width: 100%;
  height: 50px;
  align-items: center;
  justify-content: space-around;
}

.content .checkbox {
  display: flex;
  align-items: center;
  justify-content: center;
}

.content input {
  accent-color: #333;
  width: 12px;
  height: 12px;
}

.content label {
  font-size: 14px;
  user-select: none;
  padding-left: 5px;
}

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
  background-color: rgba(225, 225, 225, 0.2);
  border: 2px solid #fff;
  color: #fff;
}

button.ghost i {
  position: absolute;
  opacity: 0;
  transition: 0.3s ease-in-out;
}

button.ghost i.register {
  right: 70px;
}

button.ghost i.login {
  left: 70px;
}

button.ghost:hover i.register {
  right: 40px;
  opacity: 1;
}

button.ghost:hover i.login {
  left: 40px;
  opacity: 1;
}

form {
  background-color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  height: 100%;
  text-align: left;
}

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
  /* background: linear-gradient(
    to top,
    rgba(46, 94, 109, 0.4) 40%,
    rgba(46, 94, 109, 0)
  ); */
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

.social-container {
  margin: 20px 0;
}

.social-container a {
  border: 1px solid #dddddd;
  border-radius: 50%;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  margin: 0 5px;
  height: 40px;
  width: 40px;
  transition: 0.3s ease-in-out;
}

.social-container a:hover {
  border: 1px solid #4bb6b7;
}
</style>
