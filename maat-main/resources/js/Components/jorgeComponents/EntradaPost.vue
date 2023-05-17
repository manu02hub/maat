<script setup>
import SearchForm from "@/Components/mosaic/components/SearchForm.vue";
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import CardEvent from "@/Components/manuComponents/CardEvent.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";


const form = useForm({
    descripcion: "",
    post_id: "",
});


</script>

<template>
    <article v-for="posts in $page.props.post" class="bg-white shadow-md rounded-lg border border-emerald-500 border-2 p-5">
        <div v-for="users in $page.props.user">
            <div v-if="posts.user_id == users.id">
                <!-- Breadcrumbs -->
                <div class="mb-2">
                    <ul class="inline-flex flex-wrap text-sm font-medium">
                        <li class="flex items-center">
                            <router-link class="text-slate-500 hover:text-emerald-500" to="/feed/index">Home</router-link>
                            <svg class="h-4 w-4 fill-current text-emerald-500 mx-2" viewBox="0 0 16 16">
                                <path d="M6.6 13.4L5.2 12l4-4-4-4 1.4-1.4L12 8z" />
                            </svg>
                        </li>
                        <li class="flex items-center">
                            <a class="text-slate-500 hover:text-emerald-500" href="#0">Post</a>
                        </li>
                    </ul>
                </div>
                <!-- Header -->
                <header class="pb-4">
                    <!-- Title -->
                    <div class="flex items-start space-x-3 mb-3">
                        <h2 class="text-2xl text-slate-800 font-bold">{{ posts.titulo }}</h2>
                    </div>
                    <!-- Meta -->
                    <div class="flex flex-wrap text-sm">
                        <div
                            class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                            <a class="font-medium text-yellow-500 hover:text-yellow-600" href="#0">{{ users.nombre }}</a>
                        </div>
                        <!-- Footer -->
                        <footer class="flex items-center space-x-4">
                            <!-- Like button -->

                            <Link :href="route('añadirLike', posts.id)">
                            <button class="flex items-center text-slate-400 hover:text-red-600">
                                <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                                    <path
                                        d="M14.682 2.318A4.485 4.485 0 0011.5 1 4.377 4.377 0 008 2.707 4.383 4.383 0 004.5 1a4.5 4.5 0 00-3.182 7.682L8 15l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L8 12.247l-5.285-5A2.5 2.5 0 014.5 3c1.437 0 2.312.681 3.5 2.625C9.187 3.681 10.062 3 11.5 3a2.5 2.5 0 011.785 4.251h-.003z" />
                                </svg>
                                <div v-for="likes in $page.props.like">
                                    <div v-if="posts.id == likes.post_id">
                                        <div class="text-sm text-slate-500">{{ $page.props.like.length }}</div>
                                    </div>
                                </div>
                            </button>
                            </Link>

                            <!-- Share button -->
                            <button class="flex items-center text-slate-400 hover:text-emerald-500">
                                <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                                    <path
                                        d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z" />
                                </svg>
                                <div class="text-sm text-slate-500">{{ posts.repost }}</div>
                            </button>
                            <!-- Replies button -->
                            <button class="flex items-center text-slate-400 hover:text-amber-500">
                                <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                                </svg>
                                <div class="text-sm text-slate-500"> {{ $page.props.comentario.length }}</div>
                            </button>
                        </footer>
                    </div>
                </header>
                <!-- Content -->
                <div class="space-y-4 mb-6">
                    <p> {{ posts.descripcion }}</p>
                </div>
                <!-- Comment form -->
                <div>
                    <form @submit.prevent="form.patch(route('crearComentario', posts.id))">
                        <div class="flex items-start space-x-3 mb-3">
                            <img class="rounded-full shrink-0" src="" width="40" height="40" alt="User (foto)" />
                            <div class="grow">
                                <label for="comment" class="sr-only">Escribir un comentario…</label>
                                <textarea id="comment"
                                    class="rounded-lg bg-emerald-50 placeholder-emerald-500 border border-0 form-textarea w-full focus:border-emerald-500 focus:ring-emerald-500 focus:bg-white"
                                    rows="4" placeholder="Escribir un comentario…" v-model="form.descripcion"></textarea>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit"
                                class="btn-sm outline  outline-2 outline-emerald-500 text-emerald-500 bg-emerald-100 hover:bg-emerald-500 hover:text-white whitespace-nowrap rounded-full p-1">Responder</button>
                        </div>
                    </form>
                </div>



                <!-- Comments -->
                <div class="mt-4 ">
                    <!-- <div v-if="posts.id == comentarios.post_id"> -->
                    <h3 class="font-semibold text-slate-800 mb-4 border-t-4 border-emerald-500">Comentarios</h3>
                    <ul v-for="comentarios in $page.props.comentario" class="space-y-5">
                        <!-- Comment -->
                        <li class="relative pl-9 space-y-5" v-if="posts.id == comentarios.post_id">
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
                                                <img class="rounded-full" src="" width="24" height="24" alt="User (foto)" />
                                            </a>
                                            <div v-for="users in $page.props.user">
                                                <a v-if="comentarios.user_id == users.id"
                                                    class="font-medium text-yellow-500 hover:text-yellow-600" href="#0">{{
                                                        users.nombre }}</a>
                                            </div>
                                        </div>
                                        <!-- Footer -->
                                        <footer class="flex items-center space-x-4">
                                            <!-- Like button -->
                                            <button class="flex items-center text-slate-400 hover:text-red-600">
                                                <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14.682 2.318A4.485 4.485 0 0011.5 1 4.377 4.377 0 008 2.707 4.383 4.383 0 004.5 1a4.5 4.5 0 00-3.182 7.682L8 15l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L8 12.247l-5.285-5A2.5 2.5 0 014.5 3c1.437 0 2.312.681 3.5 2.625C9.187 3.681 10.062 3 11.5 3a2.5 2.5 0 011.785 4.251h-.003z" />
                                                </svg>
                                                <div class="text-sm text-slate-500">{{ comentarios.like }}</div>
                                            </button>
                                            <!-- Share button -->
                                            <button class="flex items-center text-slate-400 hover:text-emerald-500">
                                                <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z" />
                                                </svg>
                                                <div class="text-sm text-slate-500">{{ comentarios.repost }}</div>
                                            </button>
                                            <Link :href="route('deleteComentario', comentarios.id)">
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
                    <div class="text-center mt-5">
                        <button class="text-sm font-medium text-emerald-500 hover:text-emerald-600">Ver más
                            comentarios</button>
                    </div>
                </div>
            </div>
        </div>
    </article>
</template>
