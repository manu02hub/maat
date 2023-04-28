<script setup>
// import Logo from '@/Components/Logo.vue';
</script>
<template>
    <div class="w-full md:w-60 mb-8 md:mb-0">
        <div class="md:sticky  md:h-[calc(100vh-64px)] md:overflow-x-hidden md:overflow-y-auto no-scrollbar">
            <div class="md:pb-8">

                <!-- Title -->

                <header class="mb-6">
                    <!-- <Logo class="w-4 fill-current text-gray-500" /> -->
                    <h1 class="text-2xl md:text-3xl text-slate-800 font-bold border-b-4 border-emerald-500">Feed 🌱🌍</h1>
                </header>

                <!-- Links -->
                <div
                    class="flex flex-nowrap overflow-x-scroll no-scrollbar md:block md:overflow-auto px-4 md:space-y-3 -mx-4">
                    <!-- Group 1 -->
                    <div>
                        <div class="text-xs font-semibold text-slate-400 uppercase mb-3 md:sr-only">Menu</div>
                        <ul class="flex flex-nowrap md:block mr-3 md:mr-0">
                            <li class="mr-0.5 md:mr-0 md:mb-0.5">
                                <a class="flex items-center px-2.5 py-2 rounded whitespace-nowrap bg-white" href="#0">
                                    <svg class="w-4 h-4 shrink-0 fill-current text-emerald-500 mr-2" viewBox="0 0 16 16">
                                        <path
                                            d="M10 16h4c.6 0 1-.4 1-.998V6.016c0-.3-.1-.6-.4-.8L8.6.226c-.4-.3-.9-.3-1.3 0l-6 4.992c-.2.2-.3.5-.3.799v8.986C1 15.6 1.4 16 2 16h4c.6 0 1-.4 1-.998v-2.996h2v2.996c0 .599.4.998 1 .998Zm-4-5.99c-.6 0-1 .399-1 .998v2.995H3V6.515L8 2.32l5 4.194v7.488h-2v-2.995c0-.6-.4-.999-1-.999H6Z" />
                                    </svg>
                                    <span class="text-sm font-medium text-emerald-500">Home</span>
                                </a>
                            </li>
                            <li class="mr-0.5 md:mr-0 md:mb-0.5">
                                <a class="group flex items-center px-2.5 py-2 rounded whitespace-nowrap hover:bg-white"
                                    href="#0">
                                    <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 mr-2 group-hover:stroke-emerald-500 group-hover:fill-emerald-300"
                                        viewBox="0 0 21 21">

                                        <path
                                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />

                                    </svg>
                                    <span
                                        class="text-sm font-medium text-slate-600 group-hover:text-emerald-500 mr-3">Notificaciones</span>
                                    <span class="relative flex h-3 w-3">
                                        <span
                                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-700 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-400"></span>
                                    </span>
                                </a>
                            </li>

                            <li class="mr-0.5 md:mr-0 md:mb-0.5">
                                <a class="group flex items-center px-2.5 py-2 rounded whitespace-nowrap hover:bg-white"
                                    href="#0">
                                    <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 mr-2  group-hover:stroke-emerald-500"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M12.311 9.527c-1.161-.393-1.85-.825-2.143-1.175A3.991 3.991 0 0012 5V4c0-2.206-1.794-4-4-4S4 1.794 4 4v1c0 1.406.732 2.639 1.832 3.352-.292.35-.981.782-2.142 1.175A3.942 3.942 0 001 13.26V16h14v-2.74c0-1.69-1.081-3.19-2.689-3.733zM6 4c0-1.103.897-2 2-2s2 .897 2 2v1c0 1.103-.897 2-2 2s-2-.897-2-2V4zm7 10H3v-.74c0-.831.534-1.569 1.33-1.838 1.845-.624 3-1.436 3.452-2.422h.436c.452.986 1.607 1.798 3.453 2.422A1.943 1.943 0 0113 13.26V14z" />
                                    </svg>
                                    <span class="text-sm font-medium text-slate-600 group-hover:text-emerald-500">Perfil
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Group 2 -->

                </div>

            </div>
        </div>
    </div>
</template>

<style scoped>
@import url('./../../../css/bootstrap.css');
@import url('./../../../css/app.css');
</style>
