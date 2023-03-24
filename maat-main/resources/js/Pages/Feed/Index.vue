<script setup>
import { ref } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Sidebar from '@/Components/mosaic/partials/Sidebar.vue'

import Header from '@/Components/mosaic/partials/Header.vue'

import FeedIzq from '@/Components/FeedComponents/FeedIzq.vue'
import FeedDcha from '@/Components/FeedComponents/FeedDcha.vue'
import FeedPost from '@/Components/FeedComponents/FeedPost.vue'


</script>

<template>
    <Head title="Feed" />

    <AuthenticatedLayout>
        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

            <!-- Site header -->


            <main>
                <div class="px-4 sm:px-6 lg:px-8 py-8 md:py-0 w-full max-w-9xl mx-auto">

                    <div class="xl:flex">

                        <!-- Left + Middle content -->
                        <div class="md:flex flex-1">

                            <!-- Left content -->
                            <FeedIzq />

                            <!-- Middle content -->
                            <div class="flex-1 md:ml-8 xl:mx-4 2xl:mx-8">
                                <div class="md:py-8">

                                    <!-- Blocks -->
                                    <div class="space-y-4">

                                        <!-- Post Block -->
                                        <div class="bg-white shadow-md rounded-lg border border-emerald-500 border-2 p-5">
                                            <div class="flex items-center space-x-3 mb-5">
                                                <img class="rounded-full shrink-0" src="" width="40" height="40"
                                                    :alt=$page.props.auth.user.name /> <!--Foto-->
                                                <div class="grow">
                                                    <label for="status-input" class="sr-only">What's happening,
                                                        {{ $page.props.auth.user.name }} ?</label>
                                                    <input id="status-input"
                                                        class="form-input w-full bg-emerald-50 rounded-lg border-transparent focus:bg-white focus:border-emerald-500 placeholder-emerald-500 active:border-emerald-500 focus:ring-emerald-500"
                                                        type="text"
                                                        v-bind:placeholder="'Hola ' + $page.props.auth.user.name + ', haz tu próxima publicación!'">
                                                </div>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <div class="grow flex space-x-5">
                                                    <button
                                                        class="inline-flex items-center text-sm font-medium text-slate-600 hover:text-slate-700">
                                                        <svg class="w-4 h-4 fill-emerald-400 mr-2 " viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                                clip-rule="evenodd" />


                                                        </svg>
                                                        <span>Media</span>
                                                    </button>
                                                    <button
                                                        class="inline-flex items-center text-sm font-medium text-slate-600 hover:text-slate-700">
                                                        <svg class="w-4 h-4 fill-emerald-400 mr-2" viewBox="0 0 20 20"
                                                            stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">



                                                            <path fill-rule="evenodd"
                                                                d="M1 5.25A2.25 2.25 0 013.25 3h13.5A2.25 2.25 0 0119 5.25v9.5A2.25 2.25 0 0116.75 17H3.25A2.25 2.25 0 011 14.75v-9.5zm4.026 2.879C5.356 7.65 5.72 7.5 6 7.5s.643.15.974.629a.75.75 0 001.234-.854C7.66 6.484 6.873 6 6 6c-.873 0-1.66.484-2.208 1.275C3.25 8.059 3 9.048 3 10c0 .952.25 1.941.792 2.725C4.34 13.516 5.127 14 6 14c.873 0 1.66-.484 2.208-1.275a.75.75 0 00.133-.427V10a.75.75 0 00-.75-.75H6.25a.75.75 0 000 1.5h.591v1.295c-.293.342-.6.455-.841.455-.279 0-.643-.15-.974-.629C4.69 11.386 4.5 10.711 4.5 10c0-.711.19-1.386.526-1.871zM10.75 6a.75.75 0 01.75.75v6.5a.75.75 0 01-1.5 0v-6.5a.75.75 0 01.75-.75zm3 0h2.5a.75.75 0 010 1.5H14.5v1.75h.75a.75.75 0 010 1.5h-.75v2.5a.75.75 0 01-1.5 0v-6.5a.75.75 0 01.75-.75z"
                                                                clip-rule="evenodd" />



                                                        </svg>
                                                        <span>GIF</span>
                                                    </button>
                                                    <button
                                                        class="inline-flex items-center text-sm font-medium text-slate-600 hover:text-slate-700">
                                                        <svg class="w-4 h-4 fill-emerald-400 mr-2" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">


                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.536-4.464a.75.75 0 10-1.061-1.061 3.5 3.5 0 01-4.95 0 .75.75 0 00-1.06 1.06 5 5 0 007.07 0zM9 8.5c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S7.448 7 8 7s1 .672 1 1.5zm3 1.5c.552 0 1-.672 1-1.5S12.552 7 12 7s-1 .672-1 1.5.448 1.5 1 1.5z"
                                                                clip-rule="evenodd" />


                                                        </svg>
                                                        <span>Emoji</span>
                                                    </button>
                                                </div>
                                                <div>
                                                    <button type="submit"
                                                        class="btn-sm outline  outline-2 outline-emerald-500 text-emerald-500 bg-emerald-100 hover:bg-emerald-500 hover:text-white whitespace-nowrap rounded-full p-1">Publicar</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Posts -->
                                        <FeedPost />

                                    </div>

                                </div>
                            </div>

                        </div>

                        <!-- Right content -->
                        <FeedDcha />

                    </div>

                </div>
            </main>

        </div>
    </AuthenticatedLayout></template>

