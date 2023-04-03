
<template>
    <div class="grid-system">
        <header>
            <span>{{ $page.props.auth.user.name }}</span>
        </header>
        <div class="div-img">
            <img src="https://preview.cruip.com/mosaic/images/user-128-01.jpg" alt="">
        </div>
        <div class="spam-header">
            <span>Usuario de empresa</span>
            <div class="div-datos-basicos">
                <div class="div-form-primero">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre">
                </div>
                <div class="div-form-primero">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellidos">
                </div>
                <div class="div-form-primero">
                    <label for="puesto">Puesto</label>
                    <input type="text" id="puesto">
                </div>
            </div>
            <div class="div-form-segundo">
                <label for="email">Email</label>
                <input type="text" id="email">
            </div>
            <button class="button-email">Save</button>
            <div class="div-form-segundo">
                <div>Password</div>
                <span>Puede establecer una contraseña permanente si no desea utilizar códigos de inicio de sesión
                    temporales.</span>
            </div>
            <button class="button-password">Restablecer contraseña</button>
        </div>
        <footer>
            <Link :href="route('listUserEmpresa')">
            <button class="btn-cancelar">Cancelar</button>
            </Link>
            <Link :href="route('listUserEmpresa')">
            <button class="btn-save">Guardar cambios</button>
            </Link>
        </footer>
    </div>
</template>

<style scoped>
.grid-system {
    display: grid;
    grid-template-columns: 1fr;
    grid-gap: 0;
    grid-auto-rows: minmax(0, auto);
    grid-template-areas: "area-1";
    grid-template-rows: auto;
    grid-template-columns: repeat(1, minmax(0, 1fr));
    grid-auto-flow: dense;
    margin: 20px;
    width: 100%;
}

header {
    font-size: 30px;
    font-weight: bold;
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

.spam-header {
    margin-top: 2%;
    margin-left: 0%;
    margin-bottom: 0%;
    margin-right: 0%;
}

.div-datos-basicos {
    margin-top: 2%;
    margin-left: 0%;
    margin-bottom: 0%;
    margin-right: 0%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.div-form-primero {
    /* Se determina lo que ocupara la caja de label + input */
    flex-basis: 30%;
    /* Modificamos sus 'caracteristicas' para que podamos jugar con la posicion de los componentes de div-form-primero*/
    display: flex;
    /* Se establece que el label + input aparecen en columna*/
    flex-direction: column;
}

.div-form-segundo {
    /* Modificamos sus 'caracteristicas' para que podamos jugar con la posicion de los componentes de div-form-primero*/
    display: flex;
    /* Se establece que el label + input aparecen en columna*/
    flex-direction: column;
    margin-top: 2%;
    margin-left: 0%;
    margin-bottom: 0%;
    margin-right: 0%;
}

.div-form-segundo label {
    font-size: 20px;
    margin-top: 0%;
    margin-left: 0%;
    margin-bottom: 1%;
    margin-right: 0%;
}

.div-form-segundo span {
    margin-top: 0%;
    margin-left: 0%;
    margin-bottom: 2%;
    margin-right: 0%;
    font-size: 15px;
}

.div-form-segundo div {
    font-size: 20px;
    margin-top: 0%;
    margin-left: 0%;
    margin-bottom: 2%;
    margin-right: 0%;
}

#email {
    width: 20%;
}

.button-email {
    margin-top: 1%;
    margin-left: 0%;
    margin-bottom: 0%;
    margin-right: 0%;
    padding-top: 1%;
    padding-left: 2%;
    padding-bottom: 1%;
    padding-right: 2%;
    color: purple;
    background-color: rgb(231, 231, 231);
}

.button-password {
    color: purple;
    background-color: rgb(231, 231, 231);
    padding-top: 1%;
    padding-left: 2%;
    padding-bottom: 1%;
    padding-right: 2%;
}

footer {
    margin-top: 2%;
    border-top: 1px solid;
    text-align: right;
}

.btn-cancelar {
    color: purple;
    background-color: rgb(231, 231, 231);
    padding-top: 1%;
    padding-left: 2%;
    padding-bottom: 1%;
    padding-right: 2%;
    margin-top: 10px;
}

.btn-save {
    color: purple;
    background-color: rgb(231, 231, 231);
    padding-top: 1%;
    padding-left: 2%;
    padding-bottom: 1%;
    padding-right: 2%;
    margin-top: 10px;
    margin-left: 10px;
}
</style>

<script>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'

export default {
    components: { Link },
}
</script>
