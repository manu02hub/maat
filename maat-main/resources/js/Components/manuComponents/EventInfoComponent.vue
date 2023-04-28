<template>
    <div class="grow flex flex-col md:translate-x-0 transition-transform duration-300 ease-in-out w-full bg-white"
        :class="profileSidebarOpen ? 'translate-x-1/3' : 'translate-x-0'">

        <!-- Profile background -->
        <div class="relative h-80 bg-slate-200">
            <img class="object-cover h-full w-full" src="http://localhost/img/maat/logo_Telefonica.jpg"
                alt="Profile background" style="height: 100%; width: 100%;" />
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
                        <img class="rounded-full border-4 border-white" src="http://localhost/img/maat/telefonica2.jpg"
                            style="height: 128px; width: 128px;" alt="Avatar" />
                    </div>

                </div>

            </div>

            <!-- Header -->
            <header class="text-center sm:text-left mb-6 bg-white">
                <!-- Name -->
                <div class="inline-flex items-start mb-2">
                    <h1 class="text-2xl text-slate-800 font-bold">Nombre del Evento</h1>
                    <!-- <svg class="w-4 h-4 fill-current shrink-0 text-amber-500 ml-2" viewBox="0 0 16 16">
                        <path
                            d="M13 6a.75.75 0 0 1-.75-.75 1.5 1.5 0 0 0-1.5-1.5.75.75 0 1 1 0-1.5 1.5 1.5 0 0 0 1.5-1.5.75.75 0 1 1 1.5 0 1.5 1.5 0 0 0 1.5 1.5.75.75 0 1 1 0 1.5 1.5 1.5 0 0 0-1.5 1.5A.75.75 0 0 1 13 6ZM6 16a1 1 0 0 1-1-1 4 4 0 0 0-4-4 1 1 0 0 1 0-2 4 4 0 0 0 4-4 1 1 0 1 1 2 0 4 4 0 0 0 4 4 1 1 0 0 1 0 2 4 4 0 0 0-4 4 1 1 0 0 1-1 1Z" />
                    </svg> -->
                </div>
                <!-- Bio -->
                <div class="text-sm mb-3">#Fin de la pobreza #Hambre cero</div>
                <!-- Meta -->
                <div class="flex flex-wrap justify-center sm:justify-start space-x-4">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 fill-current shrink-0 text-slate-400" viewBox="0 0 16 16">
                            <path
                                d="M8 8.992a2 2 0 1 1-.002-3.998A2 2 0 0 1 8 8.992Zm-.7 6.694c-.1-.1-4.2-3.696-4.2-3.796C1.7 10.69 1 8.892 1 6.994 1 3.097 4.1 0 8 0s7 3.097 7 6.994c0 1.898-.7 3.697-2.1 4.996-.1.1-4.1 3.696-4.2 3.796-.4.3-1 .3-1.4-.1Zm-2.7-4.995L8 13.688l3.4-2.997c1-1 1.6-2.198 1.6-3.597 0-2.798-2.2-4.996-5-4.996S3 4.196 3 6.994c0 1.399.6 2.698 1.6 3.697 0-.1 0-.1 0 0Z" />
                        </svg>
                        <span class="text-sm font-medium whitespace-nowrap text-slate-500 ml-2">Ubicación</span>
                    </div>
                    <div class="flex items-center">
                        <v-icon name="md-daterange" class="fill-current text-gray-500 w-3 h-3 mr-2">
                        </v-icon>
                        <span class="text-sm font-medium whitespace-nowrap text-slate-500 ml-2">15/03/2022-14:00</span>
                    </div>
                    <div class="flex items-center">
                        <v-icon name="co-myspace" class="fill-current text-gray-500 w-3 h-3 mr-2">
                        </v-icon>
                        <span class="text-sm font-medium whitespace-nowrap text-slate-500 ml-2">20 Plazas</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 fill-current shrink-0 text-slate-400" viewBox="0 0 16 16">
                            <path
                                d="M11 0c1.3 0 2.6.5 3.5 1.5 1 .9 1.5 2.2 1.5 3.5 0 1.3-.5 2.6-1.4 3.5l-1.2 1.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l1.1-1.2c.6-.5.9-1.3.9-2.1s-.3-1.6-.9-2.2C12 1.7 10 1.7 8.9 2.8L7.7 4c-.4.4-1 .4-1.4 0-.4-.4-.4-1 0-1.4l1.2-1.1C8.4.5 9.7 0 11 0ZM8.3 12c.4-.4 1-.5 1.4-.1.4.4.4 1 0 1.4l-1.2 1.2C7.6 15.5 6.3 16 5 16c-1.3 0-2.6-.5-3.5-1.5C.5 13.6 0 12.3 0 11c0-1.3.5-2.6 1.5-3.5l1.1-1.2c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4L2.9 8.9c-.6.5-.9 1.3-.9 2.1s.3 1.6.9 2.2c1.1 1.1 3.1 1.1 4.2 0L8.3 12Zm1.1-6.8c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-4.2 4.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l4.2-4.2Z" />
                        </svg>
                        <a class="text-sm font-medium whitespace-nowrap text-indigo-500 hover:text-indigo-600 ml-2"
                            href="#0">maat@gmail.com</a>
                    </div>
                </div>
            </header>

            <!-- Profile content -->
            <div class="flex flex-col xl:flex-row xl:space-x-16">

                <!-- Main content -->
                <div class="space-y-5 mb-8 xl:mb-0">

                    <!-- About Me -->
                    <div>
                        <h2 class="text-slate-800 font-semibold mb-2">Descripción del Evento</h2>
                        <div class="text-sm space-y-2">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.</p>
                        </div>
                    </div>

                    <button type="button"
                        class="inline-block rounded bg-indigo-400 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                        data-te-ripple-init data-te-ripple-color="light">
                        Apuntarme
                    </button>

                    <!-- Departments -->
                    <div>
                        <h2 class="text-slate-800 font-semibold mb-2">Participantes</h2>
                        <!-- Cards -->
                        <div class="grid xl:grid-cols-2 gap-4">

                            <!-- Card -->
                            <div class="bg-white">

                                <!-- Card footer -->
                                <div class="flex justify-between items-center align">
                                    <!-- Avatars group -->
                                    <AvatarGroup></AvatarGroup>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Work History -->
                    <div>
                        <h2 class="text-slate-800 font-semibold mb-2">Otros Eventos</h2>

                            <ul class="space-y-3">

                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">

                                <!-- Item -->
                                <CardEventMini></CardEventMini>
                                <!-- Item -->
                                <CardEventMini></CardEventMini>
                                <!-- Item -->
                                <CardEventMini></CardEventMini>

                                </div>

                            </ul>

                    </div>

                </div>

                <!-- Sidebar -->
                <aside class="xl:min-w-56 xl:w-56 space-y-3">
                    <div class="text-sm">
                        <h3 class="font-medium text-slate-800">Empresa</h3>
                        <div>Telefonica</div>
                    </div>
                    <div class="text-sm">
                        <h3 class="font-medium text-slate-800">Location</h3>
                        <div>Alcobendas, Madrid</div>
                    </div>
                    <div class="text-sm">
                        <h3 class="font-medium text-slate-800">Web</h3>
                        <div>www.telefonica.com</div>
                    </div>
                    <div class="text-sm">
                        <h3 class="font-medium text-slate-800">Fundacion</h3>
                        <div>1987</div>
                    </div>
                    <!-- <div class="text-sm">
                    <h3 class="font-medium text-slate-800">Joined Acme</h3>
                    <div>7 April, 2017</div>
                </div> -->
                </aside>

            </div>

        </div>

    </div>
</template>

<script>

import AvatarGroup from './AvatarGroup.vue';
import CardEventMini from './CardEventMini.vue';

export default {
    name: "EventInfoComponent",
    props: ["profileSidebarOpen"],
    components: { AvatarGroup, CardEventMini }
}
</script>
