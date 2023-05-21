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
            chatHistory: "",
            canRefresh: true,

            // Mensaje (para el input)
            msg: "",

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
                // Resetea los chats enviados
                chat[0].innerHTML = "";
                chat[1].innerHTML = "";

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
                if (
                    msg != null &&
                    msg.replace(" ", "") != "" &&
                    this.msg.length < 256
                ) {
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

                    this.msg = "";
                } else {
                    this.msg =
                        "El mensaje tiene que tener menos de 256 carácteres.";
                }
            } catch (error) {
                console.log(error);
            }
        },

        // Solo se usa para conseguir los datos iniciales si se accede al chat url con variables (id de
        // la entidad con la que se quiere chatear)
        getInitialDataWithId: async function () {
            var valido = false;
            var i = 0;

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
                        // Bucle hasta que salga o encuentre
                        while (
                            !valido &&
                            i < response.data.recentChats.length
                        ) {
                            // Busca si es el que se quiere usar
                            if (
                                response.data.recentChats[i].entidad ==
                                this.$page.props.chatWith
                            ) {
                                // Muestra el nombre de la entidad con la que se esta comunicandose en el
                                // chat
                                this.nameChat =
                                    response.data.recentChats[i].nombre;
                                valido = true; // Ha encontrado lo que se buscaba
                            }

                            i++;
                        }

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

        // Long polling para obtener chat
        // https://javascript.info/long-polling
        getRefreshedChat: async function () {
            var chat = document.getElementsByClassName("contenedorChatPropio");

            try {
                // Peticiones long polling. Se usa setTimeout porque el setInterval acumula procesos más
                // rápidamente. Refresca chat cada 7 segundos.
                await setTimeout(() => {
                    if (this.canRefresh) {
                        axios
                            .post("/chat/refresh", {
                                params: {
                                    id: this.idEntidadChat,
                                    userId: this.$page.props.auth.user
                                        .entidad_id,
                                },
                            })
                            .then((response) => {
                                // Resetea contenedor de chat
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

                                this.iniciarChatPorId();

                                // El finally hace que pase lo que pase, se haga de nuevo el proceso, haciendo
                                // que refresque el chat continuamente
                            })
                            .finally((response) => {
                                this.getRefreshedChat();
                            });
                    } else {
                        this.getRefreshedChat();
                    }
                }, 7000);
            } catch (error) {
                console.log(error);
            }
        },

        goListado: function () {
            try {
                window.location.href = route("listado");
            } catch (error) {
                console.log(error);
            }
        },

        changeCanRefresh: function (valor) {
            try {
                this.canRefresh = valor;
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

            this.getRefreshedChat(); // Recarga chat constantemente

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
    },
};
</script>

<!-- Contenido propio -->
<template>
    <!-- NavBar -->
    <nav class="rowPropio noRowGapPropio">
        <div
            class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio pruebaPropio"
        >
            <span class="goList" @click="goListado">&#9751;</span>
        </div>
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
                                    <h2 class="h2DefaultPropio smallerNameChat">
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
                                    <h2 class="h2DefaultPropio smallerNameChat">
                                        {{ data.nombre }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                        <h2 class="h2DefaultPropio">
                            {{ this.nameChat }}
                        </h2>
                    </div>

                    <div
                        class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio chatContainerPropio"
                    >
                        <!-- Contenedor del chat (con los mensajes) -->
                        <div
                            class="col-lg-12Propio col-md-12Propio col-sm-12Propio col-12Propio chatUsersPropio contenedorChatAfueraPropio"
                            @mouseenter="changeCanRefresh(false)"
                            @mouseleave="changeCanRefresh(true)"
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

                            <!-- Enviar mensaje -->
                            <!-- Es lo mismo que v-on:click pero abreviado -->
                            <button class="btnChatPropio" @click="enviar(msg)">
                                <span>&#x27A4;</span>
                            </button>

                            <!-- Archivos (enviar) -->
                            <!-- https://developer.mozilla.org/es/docs/Web/HTML/Element/input -->
                            <!-- <button class="btnChatPropio" @click="uploadFile">
                                <span>&#128206;</span>
                            </button> -->
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

                            <!-- Envia mensajes -->
                            <!-- Es lo mismo que v-on:click pero abreviado -->
                            <button class="btnChatPropio" @click="enviar(msg)">
                                <span>&#x27A4;</span>
                            </button>

                            <!-- Archivos (enviar) -->
                            <!-- https://developer.mozilla.org/es/docs/Web/HTML/Element/input -->
                            <!-- <button class="btnChatPropio" @click="uploadFile">
                                <span>&#128206;</span>
                            </button> -->
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
/* Estilo css de Alex */
/* CSS de Alex */
/*Selector universal*/
* {
    margin: 0;
    box-sizing: unset;
    line-height: normal;
}

.goList {
    color: white;
    background-color: #23458f;
    cursor: pointer;
    user-select: none;
    font-size: 1.85rem;
    padding: 2.5rem;
}

.goList:hover {
    background-color: #6283cb;
}

/* Código hecho en primer trimestre de DAM y DAW (grid) */
/*El grid*/
.rowPropio {
    /* En la propiedad display agregamos grid para establecer una cuadricula */
    display: grid;
    /* Define el numero de columnas en el diseño de cuadricula */
    grid-template-columns: repeat(12, [ col] 1fr);
    /* Define la altura de cada fila */
    grid-template-rows: repeat(5, [ row] auto);
    column-gap: 1em; /* espacio entre columnas */
    row-gap: 15px; /* espacio entre filas */
}

.colPropio {
    padding: 1em; /* padding del texto */
    font-size: 14px; /* Tamaño del texto */
}

.noRowGapPropio {
    row-gap: 0;
}

.noColGapPropio {
    column-gap: 0;
}

/* Rellena espacio del nav (temporal) */
.pruebaPropio {
    height: 2.75rem;
    background: #291f1e;
}

/* Quita los estilos de listado */
.ulNoListPropio {
    list-style: none;
}

/* Quita el estilo que tiene los links */
.aNoDecPropio {
    text-decoration: none;
    color: black;
}

/* Estilo del contenedor de las opciones de chat */
.chatListOptionsPropio {
    text-align: center;
}

/* Estilo de los filtros de chat (mas recientes o todos los contactos) */
.chatFilterPropio {
    background-color: #73cd99;
    padding: 0;
}

.chatFilterPropio:hover {
    color: white;
    background-color: #2d764b;
    cursor: pointer;
    transition: 1s; /* Hace una pequena transicion de 1 segundo (animacion) */
}

/* Estilo cuando está activo ese tipo de chat (lista de chat reciente o no) */
.activeFilterChatPropio {
    background-color: white;
    transition: 1s;
}

/* Limita el tamano del chat y anade scroll */
.chatLimitedPropio {
    height: 27.5rem;
    overflow-y: scroll;
}

/* Estilo del contenedor del chat */
.chatCardPropio {
    /* background-color: lightgreen; */
    text-align: left;
    border-top: 1px solid #291f1e;
    margin: 1rem 1.75rem -1rem 1.75rem; /* Va del top, right, bottom, left */
    padding: 1rem 0rem 1rem 0.5rem; /* Va del top, right, bottom, left */
    transition: 1s;
}

.chatCardPropio:hover {
    cursor: pointer;
    background-color: #c4e9d3;
    transition: 1s;
}

.chatCardActivePropio {
    background-color: #73cd99 !important;
}

/* Estilo del contenedor de informacion del chat (nombre, ultimo mensaje enviado) */
.infoChatPropio {
    margin-left: 1rem;
}

/* Imagen del logo de la organizacion */
.imgOrgPropio {
    height: 2.75rem;
    width: 100%;
    border-radius: 100%;
}

/* Estilo del contenedor de nombre */
.nameContainerPropio {
    height: 1.45rem;
    color: white; /* Cambia el color del texto */
    background-color: #291f1e;
    padding-top: 1.15rem;
    padding-right: 1.15rem;
    padding-bottom: 1.15rem;
    padding-left: 1.5rem;
}

/* Border que separa el chat de los contactos */
.borderContainerPropio {
    height: 32.5rem;
    border-right: 1px solid #291f1e;
}

/* Fondo de la pantalla de chat */
.pantallaChatPropio {
    background-color: #2d764b;
}

/* Tamano del chat en general (contenedores incluidos) */
.chatContainerPropio {
    height: 28.75rem;
}

/* Contenedor del chat (donde hablan los usuarios) */
.chatUsersPropio {
    height: 67.25%;
    border-radius: 0.75rem;
    overflow-y: scroll;
    background-color: #73cd99;
    margin: 1.81rem;
    padding: 1rem;
}

/* Contenedor del input para el chat (donde hablan los usuarios) */
.chatInputContainerPropio {
    display: flex;
    height: 13.2%;
    background-color: lightgrey;
}

/* Estilo del input del chat */
.inputChatPropio {
    width: 80%;
    background: #ffffff;
    font-size: large;
    border: none;
    /* Va de la parte superior izquierda, derecha y después en la baja derechar e izquierda */
    border-radius: 0.5rem 0rem 0rem 0.5rem;
    margin: 0.77rem 0rem 0.77rem 2rem; /* Va del top, right, bottom, left */
    padding: 0.5rem;
    transition: 1s;
}

/* Cambiar color del input cuando se enfoca (cuando esta activo) */
/* https://stackoverflow.com/questions/16156594/how-to-change-border-color-of-textarea-on-focus */
.inputChatPropio:focus {
    /* Quita los bordes que aparece cuando se enfoca en el input */
    outline: none !important;
    /* El nuevo borde del input */
    border: 1px solid #2d764b;
    /* Colorea detrás. El primero controla el desplazamiento en el eje x y el segundo en el eje y.
    La tercera variable dice la cantidad de difusion que quiere en el color (mas claro/enfocado o no) */
    /* https://developer.mozilla.org/en-US/docs/Web/CSS/box-shadow */
    box-shadow: 0 0 10px #73cd99;
}

/* Estilo de los botones del chat */
.btnChatPropio {
    padding: 1px 1rem; /* Estilo propio del botón (el de por defecto) */
    border: 1px solid #c4e9d3;
    background-color: #73cd99;
    margin: 0.75rem 0rem 0.75rem 0rem;
}

/* Lo que pasa cuando el raton pasa por encima */
.btnChatPropio:hover {
    cursor: pointer;
    background-color: #2d764b;
}

.btnChatPropio:hover span {
    filter: invert(1);
}

/* Estilo del chat (burbuja) que recibe el usuario */
.receptorChatPropio {
    height: min-content; /* Para que tenga la altura adecuada al texto que se recive */
    /* Para separarlo si supera el límite del chat (texto muy largo sin espacios, por ejemplo) */
    overflow-wrap: break-word;
    font-size: medium;
    background-color: #ffffff;
    border-radius: 5rem 4rem 4rem 0.25rem; /* Le da forma de burbuja*/
    margin-right: 4.25rem;
    margin-bottom: 1rem;
    padding: 1.5rem;
}

/* Estilo del chat (burbuja) que envia el usuario */
.sendChatPropio {
    height: min-content;
    overflow-wrap: break-word;
    font-size: medium;
    background-color: #ffffff;
    border-radius: 4rem 5rem 0.25rem 4rem;
    margin-bottom: 1rem;
    margin-left: 4.25rem;
    padding: 1.5rem;
}

/* Tiempo que se envio o recibio el mensaje*/
.timeChatReceivedPropio {
    width: max-content;
    color: grey;
    font-style: italic;
    font-size: smaller;
    margin-top: 0.75rem;
    margin-bottom: -1.2rem;
    padding-bottom: 0.5rem;
}

/* Estilo del tiempo del chat recibido */
.timeChatSendPropio {
    color: grey;
    font-style: italic;
    font-size: smaller;
    text-align: right;
    margin-top: 0.75rem;
    margin-bottom: -1.2rem;
    padding-bottom: 0.5rem;
}

/* El boton solo aparece cuando son pantallas pequenas */
.btnBackPropio {
    display: none;
}

/* Estilo del último mensaje enviado */
.lastMsgPropio {
    overflow: hidden;
    text-overflow: ellipsis;
    color: #3d3d3d;
    font-style: italic;
    font-size: smaller;
    margin-top: 1px;
}

/* Estilo h2 por defecto */
.h2DefaultPropio {
    display: block;
    user-select: none;
    font-size: 1.5em;
    margin-block-start: 0;
    margin-block-end: 0;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}

.pDefaultPropio {
    display: block;
    user-select: none;
}

/* Estilos responsive */
/* Pantalla grande  */
@media only screen and (min-width: 941px) {
    .col-lg-1Propio {
        grid-column: span 1;
    }
    .col-lg-2Propio {
        grid-column: span 2;
    }
    .col-lg-3Propio {
        grid-column: span 3;
    }
    .col-lg-4Propio {
        grid-column: span 4;
    }
    .col-lg-5Propio {
        grid-column: span 5;
    }
    .col-lg-6Propio {
        grid-column: span 6;
    }
    .col-lg-7Propio {
        grid-column: span 7;
    }
    .col-lg-8Propio {
        grid-column: span 8;
    }
    .col-lg-9Propio {
        grid-column: span 9;
    }
    .col-lg-10Propio {
        grid-column: span 10;
    }
    .col-lg-11Propio {
        grid-column: span 11;
    }
    .col-lg-12Propio {
        grid-column: span 12;
    }

    /* Ajustando las opciones de chat (reciente y todos los contactos) */
    .chatFilterPropio {
        padding: 1rem;
    }

    .smallerNameChat {
        text-overflow: ellipsis; /* Pone elipses si el texto es mayor que el width */
        white-space: nowrap; /* Una sola línea */
        overflow: hidden; /* Oculta texto que sobrepase el width definido */
    }

    .filterTitlePropio {
        font-size: 1.25rem !important;
    }
}

/* Pantalla tablet  */
@media only screen and (min-width: 768px) and (max-width: 941px) {
    .col-md-1Propio {
        grid-column: span 1;
    }
    .col-md-2Propio {
        grid-column: span 2;
    }
    .col-md-3Propio {
        grid-column: span 3;
    }
    .col-md-4Propio {
        grid-column: span 4;
    }
    .col-md-5Propio {
        grid-column: span 5;
    }
    .col-md-6Propio {
        grid-column: span 6;
    }
    .col-md-7Propio {
        grid-column: span 7;
    }
    .col-md-8Propio {
        grid-column: span 8;
    }
    .col-md-9Propio {
        grid-column: span 9;
    }
    .col-md-10Propio {
        grid-column: span 10;
    }
    .col-md-11Propio {
        grid-column: span 11;
    }
    .col-md-12Propio {
        grid-column: span 12;
    }

    /* Titulo de los tipos de chat (recientes y todos los contactos) */
    .filterTitlePropio {
        font-size: large !important;
        padding-top: 1.25rem;
        padding-bottom: 1.25rem;
        user-select: none;
    }

    .smallerNameChat {
        text-overflow: ellipsis; /* Pone elipses si el texto es mayor que el width */
        white-space: nowrap; /* Una sola línea */
        overflow: hidden; /* Oculta texto que sobrepase el width definido */
    }
}

/*Pantalla movil*/
@media only screen and (min-width: 451px) and (max-width: 768px) {
    .col-sm-1Propio {
        grid-column: span 1;
    }
    .col-sm-2Propio {
        grid-column: span 2;
    }
    .col-sm-3Propio {
        grid-column: span 3;
    }
    .col-sm-4Propio {
        grid-column: span 4;
    }
    .col-sm-5Propio {
        grid-column: span 5;
    }
    .col-sm-6Propio {
        grid-column: span 6;
    }
    .col-sm-7Propio {
        grid-column: span 7;
    }
    .col-sm-8Propio {
        grid-column: span 8;
    }
    .col-sm-9Propio {
        grid-column: span 9;
    }
    .col-sm-10Propio {
        grid-column: span 10;
    }
    .col-sm-11Propio {
        grid-column: span 11;
    }
    .col-sm-12Propio {
        grid-column: span 12;
    }

    /* Titulo de los tipos de chat (recientes y todos los contactos) */
    .filterTitlePropio {
        font-size: large;
        padding-top: 1.25rem;
        padding-bottom: 1.25rem;
        user-select: none;
    }

    /* Pone todos los elementos de la lista de contactos en la misma linea */
    .chatCardPropio {
        display: flex;
    }

    /* Ajuste de la foto del contacto */
    .imgOrgPropio {
        width: 4rem;
    }

    /* Pone todo lo que esta en el contenedor del nombre del chat en la misma linea */
    .nameContainerPropio {
        display: flex;
    }

    /* Botón para ir atras y solo aparece cuando es pequena la pantalla */
    .btnBackPropio {
        display: block;
        background: none;
        border: none;
        margin: -8.5px 1rem -8.5px 0.1rem;
        padding: 1px 6px; /* Estilo propio del botón (el de por defecto) */
    }

    /* Cambia el estilo del vector grafico */
    .btnBackPropio > img {
        width: 2.2rem;
        filter: invert(1);
    }

    /* Estilo cuando se pasa el raton por encima de la imagen */
    .btnBackPropio > img:hover {
        cursor: pointer;
        filter: contrast(0);
    }
}

@media only screen and (max-width: 451px) {
    .col-1Propio {
        grid-column: span 1;
    }
    .col-2Propio {
        grid-column: span 2;
    }
    .col-3Propio {
        grid-column: span 3;
    }
    .col-4Propio {
        grid-column: span 4;
    }
    .col-5Propio {
        grid-column: span 5;
    }
    .col-6Propio {
        grid-column: span 6;
    }
    .col-7Propio {
        grid-column: span 7;
    }
    .col-8Propio {
        grid-column: span 8;
    }
    .col-9Propio {
        grid-column: span 9;
    }
    .col-10Propio {
        grid-column: span 10;
    }
    .col-11Propio {
        grid-column: span 11;
    }
    .col-12Propio {
        grid-column: span 12;
    }

    /* Titulo de los tipos de chat (recientes y todos los contactos) */
    .filterTitlePropio {
        font-size: large;
        padding-top: 1.25rem;
        padding-bottom: 1.25rem;
        user-select: none;
    }

    /* Pone todos los elementos de la lista de contactos en la misma linea */
    .chatCardPropio {
        display: flex;
    }

    /* Cambia el estilo del vector grafico */
    .imgOrgPropio {
        width: 4rem;
    }

    /* Pone todo lo que esta en el contenedor del nombre del chat en la misma linea */
    .nameContainerPropio {
        display: flex;
    }

    /* Botón para ir atras y solo aparece cuando es pequena la pantalla */
    .btnBackPropio {
        display: block;
        background: none;
        border: none;
        margin: -8.5px 1rem -8.5px 0.1rem;
        padding: 1px 6px; /* Estilo propio del botón (el de por defecto) */
    }

    /* Cambia el estilo del vector grafico */
    .btnBackPropio > img {
        width: 2.2rem;
        filter: invert(1);
    }

    /* Estilo cuando se pasa el raton por encima de la imagen */
    .btnBackPropio > img:hover {
        cursor: pointer;
        filter: contrast(0);
    }
}

/* Para 80% de pantalla height (según el zoom). Vuelve a normal al poner 100% zoom. */
@media only screen and (max-height: 762px) and (min-height: 610px) {
    .inputChatPropio {
        width: 85%;
    }

    .chatLimitedPropio {
        height: 37.75rem;
    }

    .chatInputContainerPropio {
        height: 11.8%;
        padding-right: 2rem;
    }

    .chatUsersPropio {
        height: 73.5%;
    }

    .chatContainerPropio {
        height: 38.25rem;
    }

    .borderContainerPropio {
        height: 42rem;
    }
}

/* Ajuste del texto de lastMsg */
@media only screen and (min-width: 649px) and (max-width: 768px) {
    .lastMsgPropio {
        width: 30.9rem;
        white-space: nowrap;
    }
}

@media only screen and (min-width: 549px) and (max-width: 649px) {
    .lastMsgPropio {
        width: 24.9rem;
        white-space: nowrap;
    }
}

@media only screen and (min-width: 451px) and (max-width: 549px) {
    .lastMsgPropio {
        width: 18.9rem;
        white-space: nowrap;
    }
}

@media only screen and (min-width: 325px) and (max-width: 451px) {
    .lastMsgPropio {
        width: 7rem;
        white-space: nowrap;
    }
}

@media only screen and (min-width: 250px) and (max-width: 325px) {
    .lastMsgPropio {
        width: 7rem;
    }
}
</style>
