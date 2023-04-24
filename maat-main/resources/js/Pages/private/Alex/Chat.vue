<!-- Parte Alex -->
<script>
import axios from 'axios';
import { useForm } from '@inertiajs/vue3';

export default {
    data() {
        return {
            listChats: "",
            recentChats: "",
            nameChat: '',

            // chatInicial se usa para las ventanas del chat
            chatInicial: [],
            reciente: true,
            chatSmall: false,
            widthWindow: 0,

            form: useForm({
                msg: '',
                idOrigen: 0,
                idDestino: 0,
                fecha: '',
                hora: '',
            })
        }
    },

    watch: {
    },

    methods: {
        mostrar: function (event) {
            var prueba = document.getElementsByClassName('contenedorChat');

            try {
                // Resetea todos los chats a sus estilos por defecto (ninguno activo) del chat de recientes
                // Recorre todos los chats existentes de recientes
                for (var i = 0; i < event.currentTarget.parentNode.parentNode.children[0].children.length; i++) {
                    // Mira si estaba activo antes
                    if (event.currentTarget.parentNode.parentNode.children[0].children[i].className.indexOf('chatCardActive') != -1) {
                        // Resetea el estilo por el de por defecto
                        event.currentTarget.parentNode.parentNode.children[0].children[i].className = "row noRowGap noColGap chatCard";
                    }
                }

                // Resetea todos los chats a sus estilos por defecto (ninguno activo) del chat de contactos
                for (var i = 0; i < event.currentTarget.parentNode.parentNode.children[1].children.length; i++) {
                    // Mira si estaba activo antes
                    if (event.currentTarget.parentNode.parentNode.children[1].children[i].className.indexOf('chatCardActive') != -1) {
                        // Resetea el estilo por el de por defecto
                        event.currentTarget.parentNode.parentNode.children[1].children[i].className = "row noRowGap noColGap chatCard";
                    }
                }

                // Pone el chat clickeado como activo (estilo)
                event.currentTarget.className += " chatCardActive";

                // Navega por los nodos (empieza desde donde se ha puesto el evento de click)
                // https://developer.mozilla.org/en-US/docs/Web/API/Node
                // Cambia el nombre del chat por el del clickeado
                this.nameChat = event.currentTarget.lastChild.firstChild.textContent;

                // Resetea los chats enviados
                prueba[0].innerHTML = '';
                prueba[1].innerHTML = '';

                // Si la pantalla es muy pequena, entonces muestra el chat del pequeno
                if (window.innerWidth <= 768) {
                    this.chatSmall = true;
                }

                // Recoger los chats del clickeado
                // Mostrar historial del chat del clickeado
            } catch (error) {
                console.error(error);
            }
        },

        // Simula que el boton sea un input de tipo file
        uploadFile: function () {
            // Se crea un elemento de input tipo file para luego que se haga click (deja usar sus funciones
            // aunque el objetivo del click sea un boton en vez del input)
            var createFile = "";

            try {
                // https://developer.mozilla.org/es/docs/Web/HTML/Element/input
                createFile = document.createElement("input");
                createFile.type = "file"
                createFile.click();
            } catch (error) {
                console.error(error);
            }
        },

        // Metodo para ver cuando lo cambian la pantalla
        onResize: function () {
            try {
                this.widthWindow = window.innerWidth;

                // Cambia el valor dependiendo del tamano de la pantalla
                if (window.innerWidth < 768) {
                    this.chatSmall = true;
                } else {
                    this.chatSmall = false;
                }
            } catch (error) {
                console.log(error);
            }
        },

        // Carga todo el chat de la id referida
        iniciarChatPorId: function () {
            var msgContainer = "";
            var chat = document.getElementsByClassName('contenedorChat');
            var contenedorChat = document.getElementsByClassName('contenedorChatAfuera');

            try {
                // Recorre todos los mensajes del chat entre los 2 usuarios (solo cuando se inicia por id)
                this.chatInicial.forEach(mensajes => {
                    // Si origen es la misma que la entidad del usuario
                    if (mensajes[1] == this.$page.props.auth.user.entidad_id) {
                        // Le aparece el bocadillo de mensaje con su contenido, fecha y hora
                        msgContainer += "<div class='sendChat'>" + mensajes[0]
                        msgContainer +=
                            "<p class='timeChatSend'>Enviado a las " +
                            mensajes[2] + " de " + mensajes[3] + "</p></div>";
                    } else {
                        msgContainer += "<div class='receptorChat'>" + mensajes[0]
                        msgContainer +=
                            "<p class='timeChatReceived'>Enviado a las " +
                            mensajes[2] + " de " + mensajes[3] + "</p></div>";
                    }
                });

                chat[0].innerHTML += msgContainer;
                chat[1].innerHTML += msgContainer;

                // Hace scroll hacia el ultimo mensaje
                // https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollTo
                // https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollHeight
                contenedorChat[0].scrollTo(0, contenedorChat[0].scrollHeight);
                contenedorChat[1].scrollTo(0, contenedorChat[1].scrollHeight);
            } catch (error) {
                console.log(error);
            }
        },

        enviar: function (msg) {
            var msgContainer = "";
            var chat = document.getElementsByClassName('contenedorChat');
            var contenedorChat = document.getElementsByClassName('contenedorChatAfuera');
            var date = new Date();

            try {
                if (msg != null && msg != '') {
                    this.form.msg = msg;

                    msgContainer += "<div class='sendChat'>" + this.form.msg
                    msgContainer +=
                        "<p class='timeChatSend'>Enviado a las " +
                        this.form.hora + " de " + this.form.fecha + "</p></div>";

                    chat[0].innerHTML += msgContainer;
                    chat[1].innerHTML += msgContainer;

                    // Hace scroll hacia el ultimo mensaje
                    // https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollTo
                    // https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollHeight
                    contenedorChat[0].scrollTo(0, contenedorChat[0].scrollHeight);
                    contenedorChat[1].scrollTo(0, contenedorChat[1].scrollHeight);

                    this.form.hora = date.toLocaleTimeString();
                    this.form.fecha = date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate();

                    this.form.post('/chat/send', {
                        onFinish: () => console.log('Se ha actualizado los datos de la empresa')
                    });
                }
            } catch (error) {
                console.log(error);
            }
        }
    },

    // Lo que hace a la hora de montarse la vista
    mounted() {
        try {
            // Se pone un listener cuando se carga la pagina para ver cuando se ha hecho la pantalla mas
            // pequeno
            // https://stackoverflow.com/questions/47219272/how-can-i-monitor-changing-window-sizes-in-vue
            // Esta escuchando cuando cambia el tamano de la pantalla
            window.addEventListener('resize', this.onResize);
            this.widthWindow = window.innerWidth;

            console.log(this.$page.props);

            // Si es nulo, entonces se ha accedido mediante /chat
            if (this.$page.props.chatWith == null) {
                // Muestra todos los chats

                // Si tiene valor, entonces se ha accedido mediante chat del perfil publico
            } else {
                // Abre el chat que se ha escogido.
                // Peticion para recibir el chat con la que se quiere hablar
                axios.post('/chat/getBy', {
                    params: {
                        id: this.$page.props.chatWith,
                        userId: this.$page.props.auth.user.entidad_id,
                    }
                }).then((response) => {
                    console.log(response.data);

                    this.listChats = response.data.chats; // Lista chats
                    this.recentChats = response.data.recentChats; // Recientes chats

                    // Muestra el nombre de la entidad con la que se esta comunicandose en el chat
                    this.nameChat = response.data.chatWith[0][0].nombre;

                    response.data.chatWith[0].forEach(mensajes => {
                        this.chatInicial.push(
                            [mensajes.contenido, mensajes.id_origen, mensajes.fecha, mensajes.hora]
                        );
                    });

                    // this.form.msg = response.data.chatWith[0][0].contenido;
                    this.form.idOrigen = this.$page.props.auth.user.entidad_id;

                    // El que es distinto es con quien quiere chatear
                    if (response.data.chatWith[0][0].id_origen != this.$page.props.auth.user.entidad_id) {
                        this.form.idDestino = response.data.chatWith[0][0].id_origen;
                    } else {
                        this.form.idDestino = response.data.chatWith[0][0].id_destino;
                    }

                    this.form.fecha = response.data.chatWith[0][0].fecha;
                    this.form.hora = response.data.chatWith[0][0].hora;
                    this.iniciarChatPorId();

                    // response.data.chats contiene todos los chats y recentsChats los recientes, o sea
                    // con los que ha hablado la entidad

                    // En caso de error (porque no se obtiene los datos que se quiere), entonces cambia de
                    // vista
                }).catch((response) => {
                    // Recarga la pagina y pone los estilos propios de esa pagina
                    // window.location.href = route('listado');
                    console.log(response)
                });
            }
        } catch (error) {
            console.log(error);
        }

        // Cosas por hacer:
        /*
         Hay que coger los recientes (hecho de momento solo cuando se hace por id).
         Recoger datos cuando se va al chat directamente.
         Cambiar chat al hacer click.
         Tener que hacer las validaciones

         */
    }
}

</script>

<!-- Contenido propio -->
<template>
    <!-- NavBar -->
    <nav class="row noRowGap">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 prueba"></div>
    </nav>

    <main>
        <div class="row noRowGap noColGap">
            <!-- Contenido dividido en 2 contenedores -->
            <div class="col-lg-3 col-md-3 col-sm-12 col-12 borderContainer" v-show="!this.chatSmall">
                <div class="chatListOptions row noRowGap noColGap">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 chatFilter"
                        v-bind:class="{ 'activeFilterChat': this.reciente }" v-on:click="this.reciente = true">
                        <h2 class="filterTitle">Recientes</h2>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 chatFilter"
                        v-bind:class="{ 'activeFilterChat': !this.reciente }" v-on:click="this.reciente = false">
                        <h2 class="filterTitle">Contactos</h2>
                    </div>

                    <!-- Lista de chats -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 chatLimited">
                        <!-- Este chat solo se muestra si son recientes -->
                        <div v-show="this.reciente">
                            <div v-for="data in recentChats" class="row noRowGap noColGap chatCard"
                                @click="mostrar($event)">
                                <!-- Imagen (hacia izquierda y arriba si la pantalla es pequena) -->
                                <img src="./../../../../img/prueba.jpg" class="col-lg-2 col-md-2 col-sm-12 col-12 imgOrg"
                                    alt="">

                                <!-- Este es la id de la ong cogida. Hay que filtrar en back para
                                que funcione con ambos tipos de entidades. Incluir también último mensaje
                                da igual si es de la entidad empresa como la de la organizacion -->
                                <!-- {{ data.organizacion_id }} -->

                                <!-- Descripcion -->
                                <div class="col-lg-10 col-md-10 col-sm-12 col-12 infoChat">
                                    <h2>{{ data.nombre }}</h2>
                                    <p>
                                        Last message: {{data.contenido}}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Este chat solo se muestra si le ha dado a todos los contactos -->
                        <div v-show="!this.reciente">
                            <div v-for="data in listChats" class="row noRowGap noColGap chatCard" @click="mostrar($event)">
                                <!-- Imagen (hacia izquierda y arriba si la pantalla es pequena) -->
                                <img src="./../../../../img/prueba.jpg" class="col-lg-2 col-md-2 col-sm-12 col-12 imgOrg"
                                    alt="">

                                <!-- Este es la id de la org cogida. Incluir también último mensaje
                                da igual si es de la entidad empresa como la de la organizacion -->
                                <!-- {{ data.entidad_id }} -->

                                <!-- Descripcion -->
                                <div class="col-lg-10 col-md-10 col-sm-12 col-12 infoChat">
                                    <h2>{{ data.nombre }}</h2>
                                </div>
                            </div>

                            <div class="row noRowGap noColGap chatCard" @click="mostrar($event)">
                                <!-- Imagen (hacia izquierda y arriba si la pantalla es pequena) -->
                                <img src="./../../../../img/prueba.jpg" class="col-lg-2 col-md-2 col-sm-12 col-12 imgOrg"
                                    alt="">

                                <!-- Descripcion -->
                                <div class="col-lg-10 col-md-10 col-sm-12 col-12 infoChat">
                                    <h2>Empresa 4</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- https://pictogrammers.com/library/mdi/icon/arrow-left-bold-box/ -->
            <div class="col-lg-9 col-md-9 col-sm-12 col-12 row noRowGap noColGap pantallaChat">
                <div v-show="this.widthWindow > 768"
                    class="col-lg-12 col-md-12 col-sm-12 col-12 row noRowGap noColGap pantallaChat">
                    <div class="nameContainer col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2>{{ this.nameChat }}</h2>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 chatContainer">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 chatUsers contenedorChatAfuera">
                            <div class="contenedorChat"></div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 chatInputContainer">
                            <!-- El autocomplete es código del primer trimestre -->
                            <input autocomplete="no" v-model="msg" type="text" class="inputChat" placeholder="Escribe..."
                                v-bind:disabled="this.nameChat == ''">

                            <!-- Es lo mismo que v-on:click pero abreviado -->
                            <button class="btnChat" @click="enviar(msg)">
                                <img src="./../../../../img/send.svg">
                            </button>

                            <!-- https://developer.mozilla.org/es/docs/Web/HTML/Element/input -->
                            <button class="btnChat" @click="uploadFile">
                                <img src="./../../../../img/attachment.svg">
                            </button>
                        </div>
                    </div>
                </div>

                <div v-show="this.widthWindow < 768 && this.chatSmall"
                    class="col-lg-12 col-md-12 col-sm-12 col-12 row noRowGap noColGap pantallaChat">
                    <div class="nameContainer col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btnBack" v-show="this.chatSmall">
                            <img src="./../../../../img/arrow-left-bold-box.svg" @click="this.chatSmall = false">
                        </button>
                        <h2>{{ this.nameChat }}</h2>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 chatContainer">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 chatUsers contenedorChatAfuera">
                            <div class="contenedorChat"></div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 chatInputContainer">
                            <!-- El autocomplete es código del primer trimestre -->
                            <input autocomplete="no" v-model="msg" type="text" class="inputChat" placeholder="Escribe..."
                                v-bind:disabled="this.nameChat == ''">

                            <!-- Es lo mismo que v-on:click pero abreviado -->
                            <button class="btnChat" @click="enviar(msg)">
                                <img src="./../../../../img/send.svg">
                            </button>

                            <!-- https://developer.mozilla.org/es/docs/Web/HTML/Element/input -->
                            <button class="btnChat" @click="uploadFile">
                                <img src="./../../../../img/attachment.svg">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 prueba"></div>
    </footer>
</template>

<style>
/* Importando css propio */
@import url("./../../../../css/chat.css");
</style>
