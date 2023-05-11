<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

import { onMounted } from 'vue'
import axios from 'axios';

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});
const user = usePage().props.auth.user;

var empresa = '';

const form = useForm({
    name: '',
    numTar: '',
    ubicacion: '',
    web: '',
    descripcion: '',
    entidad: user.entidad_id
});

onMounted(() => {
    axios.get("/get/empresa", {
        params: {
            empresa: user.entidad_id
        }
    }).then((response) => {
        empresa = response.data;
        form.name = empresa[0].nombre
        form.numTar = empresa[0].numero_tarjeta
        form.ubicacion = empresa[0].ubicacion
        form.web = empresa[0].web
        form.descripcion = empresa[0].descripcion
    });
})

// Actualiza los datos
const actualizar = () => {
    form.post("/edit/empresa");
};
</script>

<template>
    <section>
        <div class="p-5">
            <header>
                <h2 class="text-lg font-medium text-gray-900">Información de la Empresa</h2>

                <p class="mt-1 text-sm text-gray-600">
                    Actualiza los datos de tu empresa
                </p>
            </header>

            <form @submit.prevent="actualizar" class="mt-6 space-y-6">
                <div>
                    <InputLabel for="name" value="Nombre de la empresa" />

                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                        autocomplete="name" />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                    <InputLabel for="numTar" value="Numero / Tarjeta" />

                    <TextInput id="numTar" type="text" class="mt-1 block w-full" v-model="form.numTar" required
                        autocomplete="username" />

                    <InputError class="mt-2" :message="form.errors.numTar" />
                </div>

                <div>
                    <InputLabel for="ubicacion" value="Ubicación" />

                    <TextInput id="ubicacion" type="text" class="mt-1 block w-full" v-model="form.ubicacion" required
                        autofocus autocomplete="ubicacion" />

                    <InputError class="mt-2" :message="form.errors.ubicacion" />
                </div>

                <div>
                    <InputLabel for="web" value="Página Web" />

                    <TextInput id="web" type="text" class="mt-1 block w-full" v-model="form.web" required autofocus
                        autocomplete="web" />

                    <InputError class="mt-2" :message="form.errors.web" />
                </div>

                <div>
                    <InputLabel for="descripion" value="Descripcion / Sobre nosotros" />

                    <TextInput id="descripcion" type="text" class="mt-1 block w-full" v-model="form.descripcion" required
                        autofocus autocomplete="descripcion" />

                    <InputError class="mt-2" :message="form.errors.desc" />
                </div>

                <div v-if="props.mustVerifyEmail && user.email_verified_at === null">
                    <p class="text-sm mt-2 text-gray-800">
                        Your email address is unverified.
                        <Link :href="route('verification.send')" method="post" as="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Click here to re-send the verification email.
                        </Link>
                    </p>

                    <div v-show="props.status === 'verification-link-sent'" class="mt-2 font-medium text-sm text-green-600">
                        A new verification link has been sent to your email address.
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                    <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                        <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                    </Transition>
                </div>
            </form>
        </div>
    </section>
</template>
