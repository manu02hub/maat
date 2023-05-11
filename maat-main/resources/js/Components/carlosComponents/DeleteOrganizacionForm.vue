<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';
const confirmingOrganizacionDeletion = ref(false);
const passwordInput = ref(null);
const form = useForm({
    password: '',
    entidad: usePage().props.auth.user.entidad_id,
});
const confirmOrganizacionDeletion = () => {
    confirmingOrganizacionDeletion.value = true;
    nextTick(() => passwordInput.value.focus());
};
const deleteOrganizacion = () => {
    form.post(route('ong.delete'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};
const closeModal = () => {
    confirmingOrganizacionDeletion.value = false;
    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <div class="p-5">
            <header>
                <h2 class="text-lg font-medium text-gray-900">Eliminar organización</h2>

                <p class="mt-1 text-sm text-gray-600">
                    Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
                    your account, please download any data or information that you wish to retain.
                </p>
            </header>

            <DangerButton class="mt-3" @click="confirmOrganizacionDeletion">Eliminar organización</DangerButton>

            <Modal :show="confirmingOrganizacionDeletion" @close="closeModal">
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">
                        Are you sure you want to delete your account?
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Once your account is deleted, all of its resources and data will be permanently deleted. Please
                        enter your password to confirm you would like to permanently delete your account.
                    </p>

                    <div class="mt-6">
                        <InputLabel for="password" value="Password" class="sr-only" />

                        <TextInput id="password" ref="passwordInput" v-model="form.password" type="password"
                            class="mt-1 block w-3/4" placeholder="Password" @keyup.enter="deleteOrganizacion" />

                        <InputError :message="form.errors.password" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                        <DangerButton class="ml-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                            @click="deleteOrganizacion">
                            Delete Account
                        </DangerButton>
                    </div>
                </div>
            </Modal>
        </div>
    </section>
</template>
