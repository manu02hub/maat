<script setup>
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";

const form = useForm({
    uuid: "", connection: "", queue: "", payload: "", exception: "", failed_at: "",
});

</script>
<template>
    <div class="grid-system">
        <div>
            <div class="form-container">
                <form @submit.prevent="form.patch(route('storeFailed_jobs'))">
                    <div class="title">Crear Failed Jobs</div>

                    
                    <label for="uuid">uuid:</label>
                    <input
                        type="text"
                        id="uuid"
                        v-model="form.uuid"
                        required
                    />

                    <label for="connection">connection:</label>
                    <input
                        type="text"
                        id="connection"
                        v-model="form.connection"
                        required
                    />

                    <label for="queue">queue:</label>
                    <input
                        type="text"
                        id="queue"
                        v-model="form.queue"
                        required
                    />

                    <label for="payload">payload:</label>
                    <input
                        type="text"
                        id="payload"
                        v-model="form.payload"
                        required
                    />

                    <label for="exception">exception:</label>
                    <input
                        type="text"
                        id="exception"
                        v-model="form.exception"
                        required
                    />

                    <label for="failed_at">failed_at:</label>
                    <input
                        type="text"
                        id="failed_at"
                        v-model="form.failed_at"
                        required
                    />

                    <div class="button-container">
                        <Link
                            :href="route('indexFailed_jobs')"
                            type="button"
                            class="cancel-button"
                        >
                            Cancelar
                        </Link>
                        <PrimaryButton
                            type="submit"
                            class="submit-button"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Guardar Failed Jobs
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>
.title {
    font-size: 30px;
    padding-left: 2%;

}

span{
    margin-bottom: 1%;
    margin-left: 2%;
    font-size: 0.875rem;
    line-height: 1.25rem;
    margin-top: 4px;
    --tw-text-opacity: 1;
    color: rgb(75 85 99);
}
.form-container {
    background-color: #ffffff;
    border-radius: 10px;
    padding: 20px;
    width: 98%;
    margin: 0 auto;
    margin-top: 5%;
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.4);
}

form {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

img {
    border-radius: 50px;
    width: 100px;
    height: 100px;
}

.div-img {
    margin-top: 2%;
    margin-left: 0%;
    margin-bottom: 0%;
    margin-right: 0%;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
    padding-left: 3%;
}

input {
    margin-left:3%;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea {
    width: 80%;
    margin-bottom: 25px;
    border-radius: 5px;
    font-family: inherit;
    font-size: 100%;
    font-weight: inherit;
    line-height: inherit;
    color: inherit;
    border: 2px solid rgb(209 213 219);
}

.button-container {
    display: flex;
    justify-content: flex-start;
    margin-left: 3%;
}

.cancel-button {
    float: right;
    background-color: #4caf50;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 2%;
}
.submit-button {
    background-color: #4caf50;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.submit-button:hover {
    background-color: #3e8e41;
}

@media screen and (max-width: 768px) {
    .form-container {
        width: 100%;
    }
}
</style>
