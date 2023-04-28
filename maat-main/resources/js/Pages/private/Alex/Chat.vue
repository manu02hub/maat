<!-- Parte Alex -->
<script>
import axios from "axios";
import { useForm } from "@inertiajs/vue3";

export default {
    data() {
        return {
            listChats: "",
            recentChats: "",
            nameChat: "",
            idEntidadChat: 0,
            idChatInterval: 0,
            chatHistory: "",

            // chatInicial se usa para las ventanas del chat
            chatInicial: [],
            reciente: true,
            chatSmall: false,
            widthWindow: 0,

            form: useForm({
                msg: "",
                idOrigen: 0,
                idDestino: 0,
                fecha: "",
                hora: "",
            }),
        };
    },

    methods: {
        // Muestra chats ya contactados (necesario crear uno si no existe chat, es decir, al querrer
        // chatear con una nueva entidad)
        mostrar: function (event, entidadChatear) {
            var chat = document.getElementsByClassName("contenedorChatPropio");

            try {
                // Resetea todos los chats a sus estilos por defecto (ninguno activo) del chat de recientes
                // Recorre todos los chats existentes de recientes
                for (
                    var i = 0;
                    i <
                    event.currentTarget.parentNode.parentNode.children[0]
                        .children.length;
                    i++
                ) {
                    // Mira si estaba activo antes
                    if (
                        event.currentTarget.parentNode.parentNode.children[0].children[
                            i
                        ].className.indexOf("chatCardActivePropio") != -1
                    ) {
                        // Resetea el estilo por el de por defecto
                        event.currentTarget.parentNode.parentNode.children[0].children[
                            i
                        ].className =
                            "rowPropio noRowGapPropio noColGapPropio chatCardPropio";
                    }
                }

                // Resetea todos los chats a sus estilos por defecto (ninguno activo) del chat de contactos
                for (
                    var i = 0;
                    i <
                    event.currentTarget.parentNode.parentNode.children[1]
                        .children.length;
                    i++
                ) {
                    // Mira si estaba activo antes
                    if (
                        event.currentTarget.parentNode.parentNode.children[1].children[
                            i
                        ].className.indexOf("chatCardActivePropio") != -1
                    ) {
                        // Resetea el estilo por el de por defecto
                        event.currentTarget.parentNode.parentNode.children[1].children[
                            i
                        ].className =
                            "rowPropio noRowGapPropio noColGapPropio chatCardPropio";
                    }
                }

                // Pone el chat clickeado como activo (estilo)
                event.currentTarget.className += " chatCardActivePropio";

                // Navega por los nodos (empieza desde donde se ha puesto el evento de click)
                // https://developer.mozilla.org/en-US/docs/Web/API/Node
                // Cambia el nombre del chat por el del clickeado
                this.nameChat =
                    event.currentTarget.lastChild.firstChild.textContent;

                // Resetea los chats enviados
                chat[0].innerHTML = "";
                chat[1].innerHTML = "";

                // Si la pantalla es muy pequena, entonces muestra el chat del pequeno
                if (window.innerWidth <= 768) {
                    this.chatSmall = true;
                }

                this.idEntidadChat = entidadChatear;

                // Recoger los chats del clickeado
                axios
                    .post("/chat/open", {
                        params: {
                            id: this.idEntidadChat,
                            userId: this.$page.props.auth.user.entidad_id,
                        },
                    })
                    .then((response) => {
                        this.chatInicial = [];

                        // Muestra el nombre de la entidad con la que se esta comunicandose en el chat
                        this.nameChat = response.data[0].nombre;

                        response.data.forEach((mensajes) => {
                            this.chatInicial.push([
                                mensajes.contenido,
                                mensajes.id_origen,
                                mensajes.fecha,
                                mensajes.hora,
                            ]);
                        });

                        // El que es distinto es con quien quiere chatear. Es decir, si origen es igual a la
                        // entidad del usuario, entonces significa que con el que quiere chatear es quien
                        // este en la entidad destino y viceversa
                        if (
                            response.data[0].id_origen !=
                            this.$page.props.auth.user.entidad_id
                        ) {
                            this.form.idDestino = response.data[0].id_origen;
                        } else {
                            this.form.idDestino = response.data[0].id_destino;
                        }

                        this.iniciarChatPorId();
                    });

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
                createFile.type = "file";
                createFile.click();
            } catch (error) {
                console.error(error);
            }
        },

        // Metodo para ver cuando lo cambian la pantalla
        onResize: function () {
            try {
                // Para que sepa si es más pequeño del permitido para cambiar los estilos y que encaje
                // mejor con pantallas pequeñas
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
            var chat = document.getElementsByClassName("contenedorChatPropio");
            var contenedorChat = document.getElementsByClassName(
                "contenedorChatAfueraPropio"
            );

            try {
                // Recorre todos los mensajes del chat entre los 2 usuarios (solo cuando se inicia por id)
                this.chatInicial.forEach((mensajes) => {
                    // Si origen es la misma que la entidad del usuario
                    if (mensajes[1] == this.$page.props.auth.user.entidad_id) {
                        // Le aparece el bocadillo de mensaje con su contenido, fecha y hora
                        msgContainer +=
                            "<div class='sendChatPropio'>" + mensajes[0];
                        msgContainer +=
                            "<p class='timeChatSendPropio pDefaultPropio'>Enviado a las " +
                            mensajes[3] +
                            " de " +
                            mensajes[2] +
                            "</p></div>";
                    } else {
                        msgContainer +=
                            "<div class='receptorChatPropio'>" + mensajes[0];
                        msgContainer +=
                            "<p class='timeChatReceivedPropio pDefaultPropio'>Enviado a las " +
                            mensajes[3] +
                            " de " +
                            mensajes[2] +
                            "</p></div>";
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
            var chat = document.getElementsByClassName("contenedorChatPropio");
            var contenedorChat = document.getElementsByClassName(
                "contenedorChatAfueraPropio"
            );
            var date = new Date();

            try {
                if (msg != null && msg != "") {
                    this.form.msg = msg;

                    msgContainer +=
                        "<div class='sendChatPropio'>" + this.form.msg;
                    msgContainer +=
                        "<p class='timeChatSendPropio pDefaultPropio'>Enviado a las " +
                        this.form.hora +
                        " de " +
                        this.form.fecha +
                        "</p></div>";

                    chat[0].innerHTML += msgContainer;
                    chat[1].innerHTML += msgContainer;

                    // Hace scroll hacia el ultimo mensaje
                    // https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollTo
                    // https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollHeight
                    contenedorChat[0].scrollTo(
                        0,
                        contenedorChat[0].scrollHeight
                    );
                    contenedorChat[1].scrollTo(
                        0,
                        contenedorChat[1].scrollHeight
                    );

                    this.form.hora = date.toLocaleTimeString();
                    this.form.fecha =
                        date.getFullYear() +
                        "-" +
                        date.getMonth() +
                        "-" +
                        date.getDate();

                    this.form.post("/chat/send", {
                        onFinish: () =>
                            console.log(
                                "Se ha actualizado los datos de la empresa"
                            ),
                    });
                }
            } catch (error) {
                console.log(error);
            }
        },

        // Solo se usa para conseguir los datos iniciales si se accede al chat url con variables (id de
        // la entidad con la que se quiere chatear)
        getInitialDataWithId: async function () {
            try {
                // Abre el chat que se ha escogido.
                // Peticion para recibir el chat con la que se quiere hablar
                await axios
                    .post("/chat/getBy", {
                        params: {
                            id: this.idEntidadChat,
                            userId: this.$page.props.auth.user.entidad_id,
                        },
                    })
                    .then((response) => {
                        this.listChats = response.data.chats; // Lista chats
                        this.recentChats = response.data.recentChats; // Recientes chats

                        // Muestra el nombre de la entidad con la que se esta comunicandose en el chat
                        this.nameChat = response.data.chatWith[0][0].nombre;

                        response.data.chatWith[0].forEach((mensajes) => {
                            this.chatInicial.push([
                                mensajes.contenido,
                                mensajes.id_origen,
                                mensajes.fecha,
                                mensajes.hora,
                            ]);
                        });

                        // El que es distinto es con quien quiere chatear
                        if (
                            response.data.chatWith[0][0].id_origen !=
                            this.$page.props.auth.user.entidad_id
                        ) {
                            this.form.idDestino =
                                response.data.chatWith[0][0].id_origen;
                        } else {
                            this.form.idDestino =
                                response.data.chatWith[0][0].id_destino;
                        }

                        this.form.fecha = response.data.chatWith[0][0].fecha;
                        this.form.hora = response.data.chatWith[0][0].hora;
                        this.iniciarChatPorId();

                        // En caso de error (porque no se obtiene los datos que se quiere), entonces cambia de
                        // vista
                    })
                    .catch((response) => {
                        // Recarga la pagina y pone los estilos propios de esa pagina
                        // window.location.href = route('listado');
                        console.log(response);
                    });
            } catch (error) {
                console.log(error);
            }
        },

        // Solo lanza cuando se llega desde /chat sin id
        getChatNoId: async function () {
            try {
                // Abre el chat que se ha escogido.
                // Peticion para todos los chats
                await axios
                    .post("/chat/all", {
                        params: {
                            userId: this.$page.props.auth.user.entidad_id,
                        },
                    })
                    .then((response) => {
                        this.listChats = response.data.chats; // Lista chats
                        this.recentChats = response.data.recentChats; // Recientes chats

                        // En caso de error (porque no se obtiene los datos que se quiere), entonces cambia de
                        // vista
                    })
                    .catch((response) => {
                        // Recarga la pagina y pone los estilos propios de esa pagina
                        // window.location.href = route('listado');
                        console.log(response);
                    });
            } catch (error) {
                console.log(error);
            }
        },

        getRefreshedChat: async function () {
            var msgContainer = "";
            var chat = document.getElementsByClassName("contenedorChatPropio");
            var contenedorChat = document.getElementsByClassName(
                "contenedorChatAfueraPropio"
            );

            try {
                axios
                    .post("/chat/refresh", {
                        params: {
                            id: this.idEntidadChat,
                            userId: this.$page.props.auth.user.entidad_id,
                        },
                    })
                    .then((response) => {
                        chat[0].innerHTML = "";
                        chat[1].innerHTML = "";

                        // El chat coge las 100 últimas, por lo que hay que darle la vuelta para
                        // decirle desde los mensajes más antiguos a los más recientes
                        this.chatInicial = [];

                        response.data.reverse().forEach((mensajes) => {
                            this.chatInicial.push([
                                mensajes.contenido,
                                mensajes.id_origen,
                                mensajes.fecha,
                                mensajes.hora,
                            ]);
                        });

                        // Recorre todos los mensajes del chat entre los 2 usuarios (solo cuando
                        // se inicia por id)
                        this.chatInicial.forEach((mensajes) => {
                            // Si origen es la misma que la entidad del usuario
                            if (
                                mensajes[1] ==
                                this.$page.props.auth.user.entidad_id
                            ) {
                                // Le aparece el bocadillo de mensaje con su contenido, fecha y hora
                                msgContainer +=
                                    "<div class='sendChatPropio'>" +
                                    mensajes[0];
                                msgContainer +=
                                    "<p class='timeChatSendPropio pDefaultPropio'>Enviado a las " +
                                    mensajes[3] +
                                    " de " +
                                    mensajes[2] +
                                    "</p></div>";
                            } else {
                                msgContainer +=
                                    "<div class='receptorChatPropio'>" +
                                    mensajes[0];
                                msgContainer +=
                                    "<p class='timeChatReceivedPropio pDefaultPropio'>Enviado a las " +
                                    mensajes[3] +
                                    " de " +
                                    mensajes[2] +
                                    "</p></div>";
                            }
                        });

                        chat[0].innerHTML += msgContainer;
                        chat[1].innerHTML += msgContainer;

                        // Hace scroll hacia el ultimo mensaje
                        // https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollTo
                        // https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollHeight
                        contenedorChat[0].scrollTo(
                            0,
                            contenedorChat[0].scrollHeight
                        );
                        contenedorChat[1].scrollTo(
                            0,
                            contenedorChat[1].scrollHeight
                        );
                    });
            } catch (error) {
                console.log(error);
            }
        },
    },

    // Lo que hace a la hora de montarse la vista
    mounted() {
        try {
            // Se pone un listener cuando se carga la pagina para ver cuando se ha hecho la pantalla mas
            // pequeno
            // https://stackoverflow.com/questions/47219272/how-can-i-monitor-changing-window-sizes-in-vue
            // Esta escuchando cuando cambia el tamano de la pantalla
            window.addEventListener("resize", this.onResize);
            this.widthWindow = window.innerWidth;

            // Pone el origen para indicar de quien proviene si manda un mensaje (o sea,
            // del usuario activo, tu)
            this.form.idOrigen = this.$page.props.auth.user.entidad_id;

            // Si es nulo, entonces se ha accedido mediante /chat
            if (this.$page.props.chatWith == null) {
                // Muestra todos los chats
                this.getChatNoId();

                // Si tiene valor, entonces se ha accedido mediante chat del perfil publico
            } else {
                this.idEntidadChat = this.$page.props.chatWith;

                // Abre el chat que se ha escogido.
                this.getInitialDataWithId();
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
    },
};
</script>

<!-- Contenido propio -->
<template>
    <!-- NavBar -->
    <nav class="rowPropio noRowGapPropio">
        <div
            class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio pruebaPropio"
        ></div>
    </nav>

    <main>
        <div class="rowPropio noRowGapPropio noColGapPropio">
            <!-- Contenido dividido en 2 contenedores -->
            <div
                class="col-lg-3Propio col-md-3Propio col-sm-12Propio col-12Propio borderContainerPropio"
                v-show="!this.chatSmall"
            >
                <div
                    class="chatListOptionsPropio rowPropio noRowGapPropio noColGapPropio"
                >
                    <div
                        class="col-lg-6Propio col-md-6Propio col-sm-6Propio col-6Propio chatFilterPropio"
                        v-bind:class="{ activeFilterChatPropio: this.reciente }"
                        v-on:click="this.reciente = true"
                    >
                        <h2 class="filterTitlePropio h2DefaultPropio">
                            Recientes
                        </h2>
                    </div>

                    <div
                        class="col-lg-6Propio col-md-6Propio col-sm-6Propio col-6Propio chatFilterPropio"
                        v-bind:class="{
                            activeFilterChatPropio: !this.reciente,
                        }"
                        v-on:click="this.reciente = false"
                    >
                        <h2 class="filterTitlePropio h2DefaultPropio">
                            Contactos
                        </h2>
                    </div>

                    <!-- Lista de chats -->
                    <div
                        class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio chatLimitedPropio"
                    >
                        <!-- Este chat solo se muestra si son recientes -->
                        <div v-show="this.reciente">
                            <div v-if="recentChats.length == 0">
                                <h2 class="h2DefaultPropio">
                                    No hay chats recientes
                                </h2>
                            </div>

                            <div
                                v-for="data in recentChats"
                                class="rowPropio noRowGapPropio noColGapPropio chatCardPropio"
                                @click="mostrar($event, data.entidad)"
                            >
                                <!-- Imagen (hacia izquierda y arriba si la pantalla es pequena) -->
                                <img
                                    src="./../../../../img/prueba.jpg"
                                    class="col-lg-2Propio col-md-2Propio col-sm-12Propio col-12Propio imgOrgPropio"
                                    alt=""
                                />

                                <!-- Descripcion -->
                                <div
                                    class="col-lg-10Propio col-md-10Propio col-sm-12Propio col-12Propio infoChatPropio"
                                >
                                    <h2 class="h2DefaultPropio">
                                        {{ data.nombre }}
                                    </h2>
                                    <p class="pDefaultPropio lastMsgPropio">
                                        Last message: {{ data.contenido }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Este chat solo se muestra si le ha dado a todos los contactos -->
                        <div v-show="!this.reciente">
                            <div
                                v-for="data in listChats"
                                class="rowPropio noRowGapPropio noColGapPropio chatCardPropio"
                                @click="mostrar($event, data.entidad_id)"
                            >
                                <!-- Imagen (hacia izquierda y arriba si la pantalla es pequena) -->
                                <img
                                    src="./../../../../img/prueba.jpg"
                                    class="col-lg-2Propio col-md-2Propio col-sm-12Propio col-12Propio imgOrgPropio"
                                    alt=""
                                />

                                <!-- Este es la id de la org cogida. Incluir también último mensaje
                                da igual si es de la entidad empresa como la de la organizacion -->
                                <!-- {{ data.entidad_id }} -->

                                <!-- Descripcion -->
                                <div
                                    class="col-lg-10Propio col-md-10Propio col-sm-12Propio col-12Propio infoChatPropio"
                                >
                                    <h2 class="h2DefaultPropio">
                                        {{ data.nombre }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- https://pictogrammers.com/library/mdi/icon/arrow-left-bold-box/ -->
            <div
                class="col-lg-9Propio col-md-9Propio col-sm-12Propio col-12Propio rowPropio noRowGapPropio noColGapPropio pantallaChatPropio"
            >
                <div
                    v-show="this.widthWindow > 768"
                    class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio rowPropio noRowGapPropio noColGapPropio pantallaChatPropio"
                >
                    <div
                        class="nameContainerPropio col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio"
                    >
                        <h2 class="h2DefaultPropio">{{ this.nameChat }}</h2>
                    </div>

                    <div
                        class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio chatContainerPropio"
                    >
                        <div
                            class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio chatUsersPropio contenedorChatAfueraPropio"
                        >
                            <div class="contenedorChatPropio"></div>
                        </div>

                        <div
                            class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio chatInputContainerPropio"
                        >
                            <!-- El autocomplete es código del primer trimestre -->
                            <input
                                autocomplete="no"
                                v-model="msg"
                                type="text"
                                class="inputChatPropio"
                                placeholder="Escribe..."
                                v-bind:disabled="this.nameChat == ''"
                            />

                            <!-- Es lo mismo que v-on:click pero abreviado -->
                            <button class="btnChatPropio" @click="enviar(msg)">
                                <img src="./../../../../img/send.svg" />
                            </button>

                            <!-- https://developer.mozilla.org/es/docs/Web/HTML/Element/input -->
                            <button class="btnChatPropio" @click="uploadFile">
                                <img src="./../../../../img/attachment.svg" />
                            </button>
                        </div>
                    </div>
                </div>

                <div
                    v-show="this.widthWindow < 768 && this.chatSmall"
                    class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio rowPropio noRowGapPropio noColGapPropio pantallaChatPropio"
                >
                    <div
                        class="nameContainerPropio col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio"
                    >
                        <button class="btnBackPropio" v-show="this.chatSmall">
                            <img
                                src="./../../../../img/arrow-left-bold-box.svg"
                                @click="this.chatSmall = false"
                            />
                        </button>
                        <h2 class="h2DefaultPropio">{{ this.nameChat }}</h2>
                    </div>

                    <div
                        class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio chatContainerPropio"
                    >
                        <div
                            class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio chatUsersPropio contenedorChatAfueraPropio"
                        >
                            <div class="contenedorChatPropio"></div>
                        </div>

                        <div
                            class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio chatInputContainerPropio"
                        >
                            <!-- El autocomplete es código del primer trimestre -->
                            <input
                                autocomplete="no"
                                v-model="msg"
                                type="text"
                                class="inputChatPropio"
                                placeholder="Escribe..."
                                v-bind:disabled="this.nameChat == ''"
                            />

                            <!-- Es lo mismo que v-on:click pero abreviado -->
                            <button class="btnChatPropio" @click="enviar(msg)">
                                <img src="./../../../../img/send.svg" />
                            </button>

                            <!-- https://developer.mozilla.org/es/docs/Web/HTML/Element/input -->
                            <button class="btnChatPropio" @click="uploadFile">
                                <img src="./../../../../img/attachment.svg" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div
            class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio pruebaPropio"
        ></div>
    </footer>
</template>

<style>
/* Importando css propio */
@import url("./../../../../css/chat.css");

/* Estilo h2 por defecto */
.h2DefaultPropio {
    display: block;
    font-size: 1.5em;
    margin-block-start: 0;
    margin-block-end: 0;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}

.pDefaultPropio {
    display: block;
}
</style>
