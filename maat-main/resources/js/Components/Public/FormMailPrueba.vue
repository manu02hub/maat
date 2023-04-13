<template>
    <form>
        <label>empresa:</label>
        <input type="text" name="empresa" v-model="empresa">
        <label>correo:</label>
        <input type="text" name="correo" v-model="correo">
        <label>mensaje:</label>
        <input type="text" name="mensaje" v-model="mensaje">
        <button type="button" @click="EnviarEmail()">Send</button>
    </form>
</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            empresa: '',
            correo: '',
            mensaje: '',
        }
    },

    methods: {
        EnviarEmail() {
            var data = new FormData();
            data.append('empresa', this.empresa);
            data.append('correo', this.correo);
            data.append('mensaje', this.mensaje);

            axios.post('/api/correo/enviar', data).then((response) => {
            })
                .catch((error) => {
                    console.error(error);
                });
        },
    }
}


</script>