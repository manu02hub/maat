<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";

const props = defineProps({
    id: {
        type: Number,
        required: true
    },
    tokenable_type: {
        type: String,
        required: true
    },
    tokenable_id: {
        type: Number,
        required: true
    },
    name: {
        type: String,
        required: true
    },
    token: {
        type: Number,
        required: true
    },
    abilities: {
        type: String,
        required: true
    },
})

const personalAccessTokens = usePage().props.personalAccessToken;

const form = useForm({
    tokenable_type: personalAccessTokens.tokenable_type,
    tokenable_id: personalAccessTokens.tokenable_id,
    name: personalAccessTokens.name,
    token: personalAccessTokens.token,
    abilities: personalAccessTokens.abilities,
});

const submit = (id) => {
    form.post(route('updatepersonalAccessToken', id));
};

</script>
<template>
    <div class="grid-system">
        <div>
            <div class="form-container">
                <form @submit.prevent="submit($page.props.personalAccessToken.id)">
                    <div class="title">Editar un personalAccessToken</div>
                    <input type="text" id="id" v-model="form.id" hidden />

                    <label for="tokenable_type">tokenable_type:</label>
                    <input type="text" id="tokenable_type" v-model="form.tokenable_type" required />

                    <label for="tokenable_id">tokenable_id:</label>
                    <input type="text" id="tokenable_id" v-model="form.tokenable_id" required />

                    <label for="name">name:</label>
                    <input type="text" id="name" v-model="form.name" required />

                    <label for="token">token:</label>
                    <input type="text" id="token" v-model="form.token" required />

                    <label for="abilities">abilities:</label>
                    <input type="text" id="abilities" v-model="form.abilities" required />

                    <div>
                        <Link :href="route('indexpersonalAccessToken')">
                        <button class="btn-cancelar">Cancelar</button>
                        </Link>
                        <PrimaryButton type="submit" class="submit-button" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Actulizar PersonalAccessToken
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

span {
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
    padding-left: 2%;
}

input {
    margin-left: 2%;
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
    margin-left: 2%;
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
