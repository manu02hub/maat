<script setup>
import AvatarGroup from "../carlosComponents/AvatarGroup.vue";
import CardEventMini from "../manuComponents/CardEventMini.vue";
import SearchForm from "@/Components/mosaic/components/SearchForm.vue";
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import CardEvent from "@/Components/manuComponents/CardEvent.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";

const { props } = usePage();
let { datosEvento, datosOrganizacionEvento } = props;

const {
    id,
    nombre,
    descripcion,
    fecha_inicio,
    fecha_final,
    hora_inicio,
    hora_final,
    plazas,
} = datosEvento;

const {
    id: orgId,
    nombre: orgNombre,
    logo,
    ubicacion,
    web,
    descripcion: orgDescripcion,
    tamano,
    numero_tarjeta,
} = datosOrganizacionEvento;

const form = useForm({
    id: id,
    nombre: nombre,
    descripcion: descripcion,
    fecha_inicio: fecha_inicio,
    fecha_final: fecha_final,
    hora_inicio: hora_inicio,
    hora_final: hora_final,
    plazas: plazas,
});

const form2 = useForm({
    descripcion: "",
    post_id: "",
});
</script>

<template>
    <div class="grow flex flex-col md:translate-x-0 transition-transform duration-300 ease-in-out w-full bg-white"
        :class="profileSidebarOpen ? 'translate-x-1/3' : 'translate-x-0'">
        <!-- Profile background -->
        <div class="relative h-80 bg-slate-200">
            <img class="object-cover h-full w-full" src="./../../../img/profile-bg.jpg" alt=""
                style="height: 100%; width: 100%" />
            <!-- Close button -->
            <button class="md:hidden absolute top-4 left-4 sm:left-6 text-white opacity-80 hover:opacity-100"
                @click.stop="$emit('toggle-profilesidebar')" aria-controls="profile-sidebar"
                :aria-expanded="profileSidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
        </div>
        <!-- Content -->
        <div class="relative px-4 sm:px-6 pb-8">
            <!-- Pre-header -->
            <div class="-mt-16 mb-6 sm:mb-3">
                <div class="flex flex-col items-center sm:flex-row sm:justify-between sm:items-end">
                    <!-- Avatar -->
                    <div class="inline-flex -ml-1 -mt-1 mb-4 sm:mb-0">
                        <img class="rounded-full border-4 border-white" src="./../../../img/fotoPerfil.png"
                            style="height: 128px; width: 128px" alt="Avatar" />
                    </div>
                </div>
            </div>

            <!-- Header -->
            <header class="text-center sm:text-left mb-6 bg-white">
                <!-- Name -->
                <div class="inline-flex items-start mb-2">
                    <h1 class="text-2xl text-slate-800 font-bold">
                        {{ nombre }}
                    </h1>
                </div>
                <div class="flex flex-wrap justify-center sm:justify-start space-x-4">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 fill-current shrink-0 text-slate-400" viewBox="0 0 16 16">
                            <path
                                d="M8 8.992a2 2 0 1 1-.002-3.998A2 2 0 0 1 8 8.992Zm-.7 6.694c-.1-.1-4.2-3.696-4.2-3.796C1.7 10.69 1 8.892 1 6.994 1 3.097 4.1 0 8 0s7 3.097 7 6.994c0 1.898-.7 3.697-2.1 4.996-.1.1-4.1 3.696-4.2 3.796-.4.3-1 .3-1.4-.1Zm-2.7-4.995L8 13.688l3.4-2.997c1-1 1.6-2.198 1.6-3.597 0-2.798-2.2-4.996-5-4.996S3 4.196 3 6.994c0 1.399.6 2.698 1.6 3.697 0-.1 0-.1 0 0Z" />
                        </svg>
                        <span class="text-sm font-medium whitespace-nowrap text-slate-500 ml-2">{{ ubicacion }}</span>
                    </div>
                    <div class="flex items-center">
                        <v-icon name="md-daterange" class="fill-current text-gray-500 w-3 h-3 mr-2">
                        </v-icon>
                        <span class="text-sm font-medium whitespace-nowrap text-slate-500 ml-2">{{ fecha_inicio }}</span>
                    </div>
                    <div class="flex items-center">
                        <v-icon name="co-myspace" class="fill-current text-gray-500 w-3 h-3 mr-2">
                        </v-icon>
                        <span class="text-sm font-medium whitespace-nowrap text-slate-500 ml-2">{{ plazas }} Plazas</span>
                    </div>
                    <!-- <div class="flex items-center">
                        <svg
                            class="w-4 h-4 fill-current shrink-0 text-slate-400"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M11 0c1.3 0 2.6.5 3.5 1.5 1 .9 1.5 2.2 1.5 3.5 0 1.3-.5 2.6-1.4 3.5l-1.2 1.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l1.1-1.2c.6-.5.9-1.3.9-2.1s-.3-1.6-.9-2.2C12 1.7 10 1.7 8.9 2.8L7.7 4c-.4.4-1 .4-1.4 0-.4-.4-.4-1 0-1.4l1.2-1.1C8.4.5 9.7 0 11 0ZM8.3 12c.4-.4 1-.5 1.4-.1.4.4.4 1 0 1.4l-1.2 1.2C7.6 15.5 6.3 16 5 16c-1.3 0-2.6-.5-3.5-1.5C.5 13.6 0 12.3 0 11c0-1.3.5-2.6 1.5-3.5l1.1-1.2c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4L2.9 8.9c-.6.5-.9 1.3-.9 2.1s.3 1.6.9 2.2c1.1 1.1 3.1 1.1 4.2 0L8.3 12Zm1.1-6.8c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-4.2 4.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l4.2-4.2Z"
                            />
                        </svg>
                        <a
                            class="text-sm font-medium whitespace-nowrap text-indigo-500 hover:text-indigo-600 ml-2"
                            href="#0"
                            >{{ $page.props.estaInscrito }} MAIL AQUI</a
                        >
                    </div> -->
                </div>
            </header>

            <!-- Profile content -->
            <div class="flex flex-col xl:flex-row xl:space-x-16">
                <!-- Main content -->
                <div class="space-y-5 mb-8 xl:mb-0">
                    <!-- About Me -->
                    <div>
                        <h2 class="text-slate-800 font-semibold mb-2">
                            Descripción del Evento
                        </h2>
                        <div class="text-sm space-y-2">
                            <p>
                                {{ descripcion }}
                            </p>
                        </div>
                    </div>

                    <Link v-if="!$page.props.estaInscrito" :href="route('add_event_to_user', id)" type="button"
                        class="inline-block rounded bg-indigo-400 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                        data-te-ripple-init data-te-ripple-color="light">
                    Inscribirme
                    </Link>
                    <Link v-if="$page.props.estaInscrito" :href="route('delete_event_of_user', id)" type="button"
                        class="inline-block rounded bg-indigo-400 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                        data-te-ripple-init data-te-ripple-color="light">
                    Desapuntarme
                    </Link>

                    <!-- Departments -->
                    <!-- <div>
                        <h2 class="text-slate-800 font-semibold mb-2">
                            Participantes
                        </h2>
                         Cards 
                        <div class="grid xl:grid-cols-2 gap-4">
                            <Card 
                            <div class="bg-white">
                                 Card footer
                                <div
                                    class="flex justify-between items-center align"
                                >
                                     Avatars group 
                                    <AvatarGroup></AvatarGroup>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- ____________________________________________________________________________________________________________________________ -->

                    <div class="mb-2" v-if="$page.props.validator">
                        <ul class="inline-flex flex-wrap text-sm font-medium">
                            <li class="flex items-center">
                                <router-link class="text-slate-500 hover:text-emerald-500"
                                    to="/feed/index">Eventos</router-link>
                                <svg class="h-4 w-4 fill-current text-emerald-500 mx-2" viewBox="0 0 16 16">
                                    <path d="M6.6 13.4L5.2 12l4-4-4-4 1.4-1.4L12 8z" />
                                </svg>
                            </li>
                            <li class="flex items-center">
                                <a class="text-slate-500 hover:text-emerald-500" href="#0">{{ nombre }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Header -->
                    <header class="pb-4" v-if="$page.props.validator">
                        <!-- Title -->
                        <div class="flex items-start space-x-3 mb-3">
                            <h2 class="text-2xl text-slate-800 font-bold">
                                {{ $page.props.posts.titulo }}
                            </h2>
                        </div>
                        <!-- Meta -->
                        <div class="flex flex-wrap text-sm">
                            <div
                                class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                                <a class="font-medium text-yellow-500 hover:text-yellow-600" href="#0">{{
                                    $page.props.posts.descripcion }}</a>
                            </div>
                            <!-- Footer -->
                            <footer class="flex items-center space-x-4">
                                <!-- Like button -->
                                <Link :href="route(
                                    'añadirLike',
                                    $page.props.posts.id
                                )
                                    ">
                                <button :class="{ 'red': $page.props.like.isLiked === 1 }"
                                    class="flex items-center text-slate-400">
                                    <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                                        <path
                                            d="M14.682 2.318A4.485 4.485 0 0011.5 1 4.377 4.377 0 008 2.707 4.383 4.383 0 004.5 1a4.5 4.5 0 00-3.182 7.682L8 15l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L8 12.247l-5.285-5A2.5 2.5 0 014.5 3c1.437 0 2.312.681 3.5 2.625C9.187 3.681 10.062 3 11.5 3a2.5 2.5 0 011.785 4.251h-.003z" />
                                    </svg>
                                    <div>
                                        <div>
                                            <div class="text-sm text-slate-500">
                                                {{ $page.props.likes }}
                                            </div>
                                        </div>
                                    </div>
                                </button>
                                </Link>
                            </footer>
                        </div>
                    </header>
                    <!-- Content -->
                    <div class="space-y-4 mb-6" v-if="$page.props.validator">
                        <p>{{}}</p>
                    </div>
                    <!-- Comment form -->
                    <div v-if="$page.props.validator">
                        <form @submit.prevent="
                            form2.patch(
                                route(
                                    'crearComentario',
                                    $page.props.posts.id
                                )
                            )
                            ">
                            <div class="flex items-start space-x-3 mb-3">
                                <img class="rounded-full shrink-0" src="" width="40" height="40" alt="User (foto)" />
                                <div class="grow">
                                    <label for="comment" class="sr-only">Escribir un comentario…</label>
                                    <textarea id="comment"
                                        class="rounded-lg bg-emerald-50 placeholder-emerald-500 border border-0 form-textarea w-full focus:border-emerald-500 focus:ring-emerald-500 focus:bg-white"
                                        rows="4" placeholder="Escribir un comentario…"
                                        v-model="form2.descripcion"></textarea>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit"
                                    class="btn-sm outline outline-2 outline-emerald-500 text-emerald-500 bg-emerald-100 hover:bg-emerald-500 hover:text-white whitespace-nowrap rounded-full p-1">
                                    Responder
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Comments -->
                    <div class="mt-4" v-if="$page.props.validator">
                        <!-- <div v-if="posts.id == comentarios.post_id"> -->
                        <h3 class="font-semibold text-slate-800 mb-4 border-t-4 border-emerald-500">
                            Comentarios
                        </h3>
                        <ul v-for="comentarios in $page.props.comentario" class="space-y-5">
                            <!-- Comment -->
                            <li class="relative pl-9 space-y-5">
                                <!-- Comment wrapper -->
                                <div class="flex items-start">
                                    <!-- Comment upvote -->
                                    <div class="absolute top-0 left-0">
                                        <button
                                            class="group text-xs font-semibold text-left w-6 rounded-sm flex flex-col justify-center items-center hover:text-emerald-500">
                                            <!-- <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5 group-hover:fill-emerald-500"
                                                width="12" height="6" xmlns="http://www.w3.org/2000/svg">
                                                <path d="m0 6 6-6 6 6z" />
                                            </svg> -->
                                            <div>{{ comentarios.id }}</div>
                                        </button>
                                    </div>
                                    <!-- Comment content -->
                                    <div>
                                        <!-- Comment text -->
                                        <div class="grow text-sm text-slate-800 space-y-2 mb-2">
                                            <p>{{ comentarios.descripcion }}</p>
                                        </div>
                                        <!-- Comment footer -->
                                        <div class="flex flex-wrap text-xs">
                                            <div
                                                class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                                                <a class="block mr-2" href="#0">
                                                    <img class="rounded-full" src="" width="24" height="24"
                                                        alt="User (foto)" />
                                                </a>
                                                <div v-for="users in $page.props
                                                    .user">
                                                    <a v-if="comentarios.user_id ==
                                                        users.id
                                                        " class="font-medium text-yellow-500 hover:text-yellow-600"
                                                        href="#0">{{ users.nombre }}</a>
                                                </div>
                                            </div>
                                            <!-- Footer -->
                                            <footer class="flex items-center space-x-4">
                                                <Link :href="route(
                                                    'deleteComentario',
                                                    comentarios.id
                                                )
                                                    ">
                                                <button class="action-buttons-list" @click="Eliminar">
                                                    <svg class="h-6 w-6 text-red-500" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" />
                                                        <line x1="4" y1="7" x2="20" y2="7" />
                                                        <line x1="10" y1="11" x2="10" y2="17" />
                                                        <line x1="14" y1="11" x2="14" y2="17" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                </button>
                                                </Link>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- </div> -->
                        <!-- View more link -->
                    </div>

                    <!-- ____________________________________________________________________________________________________________________________ -->

                    <!-- Work History -->
                    <div>
                        <h2 class="text-slate-800 font-semibold mb-2">
                            Otros Eventos
                        </h2>
                        <ul class="space-y-3">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                                <div v-for="eventoExtras in $page.props
                                            .eventosDeMismaOrganizacion" :key="eventoExtras.id">
                                    <li class="sm:flex sm:items-center sm:justify-between">
                                        <div class="flex justify-center mb-5 mr-5">
                                            <div class="block max-w-sm rounded-lg bg-white shadow-lg dark:bg-neutral-700">
                                                <Link :href="route(
                                                    'eventInfo',
                                                    eventoExtras.id
                                                )
                                                    " data-te-ripple-init data-te-ripple-color="light">
                                                <img class="rounded-t-lg"
                                                    src="https://tecdn.b-cdn.net/img/new/standard/nature/186.jpg" alt="" />
                                                </Link>
                                                <div class="p-6">
                                                    <h5
                                                        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                                        {{
                                                            eventoExtras.nombre
                                                        }}
                                                    </h5>
                                                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                                        {{
                                                            eventoExtras.descripcion
                                                        }}
                                                    </p>
                                                    <p class="text-sm text-white flex items-center mt-3">
                                                        <v-icon name="md-daterange"
                                                            class="fill-current text-gray-500 w-3 h-3 mr-2">
                                                        </v-icon>
                                                        {{
                                                            eventoExtras.fecha_final
                                                        }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<style>
.red {
    color: red;
}
</style>