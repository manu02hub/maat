<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="cabezera">
        <!-- Panel body -->
        <div class="panel-body">
            <!-- Plans -->
            <section>
                <div class="mb-8">
                    <h2 class="titulo">Plans</h2>
                </div>

                <!-- Pricing -->
                <div>
                    <!-- Pricing tabs -->
                    <div class="grid grid-cols-12 gap-3">
                        <!-- ------------------------------------------------------------------------------------------------------ -->
                        <div
                            class="relative col-span-full xl:col-span-3 bg-white shadow-md rounded-sm border border-slate-200"
                            v-for="planes in $page.props.planes"
                            :key="planes.id"
                        >
                            <div
                                class="px-5 pt-5 pb-6 border-b border-slate-200 text-center"
                            >
                                <header
                                    class="flex items-center mb-2 text-center justify-center"
                                >
                                    <h3
                                        class="text-lg text-slate-800 font-semibold"
                                    >
                                        {{ planes.nombre }}
                                    </h3>
                                </header>
                                <!--<div class="text-sm mb-2">
                                    Ideal for individuals that need a custom
                                    solution with custom tools.
                                </div>-->
                                <!-- Price -->
                                <div class="text-slate-800 font-bold mb-4">
                                    <span class="text-2xl">$</span
                                    ><span class="text-3xl">{{
                                        planes.precio
                                    }}</span
                                    ><span
                                        class="text-slate-500 font-medium text-sm"
                                        >/mo</span
                                    >
                                </div>
                                <!-- CTA -->
                                <div v-if="$page.props.existePlanValidator">
                                    <a
                                        class="btn-save cursor-not-allowed"
                                        v-if="
                                            $page.props.plan.nombre ===
                                            planes.nombre
                                        "
                                        disabled
                                    >
                                        Plan contratado
                                    </a>
                                    <Link
                                        :href="route('joinPlan', planes.id)"
                                        v-else
                                        class="btn-save"
                                    >
                                        Contratar plan
                                    </Link>
                                </div>
                                <div v-else>
                                    <Link
                                        :href="route('deposePlan', planes.id)"
                                        class="btn-save"
                                    >
                                        Contratar plan
                                    </Link>
                                </div>
                            </div>
                            <div class="px-5 pt-4 pb-5">
                                <!-- List -->
                                <ul>
                                    <li class="flex items-center py-1">
                                        <!---------------------------------{PLAZAS}--------------------------------->
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-users"
                                            width="30"
                                            height="30"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="#2c3e50"
                                            fill="none"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >
                                            <path
                                                stroke="none"
                                                d="M0 0h24v24H0z"
                                                fill="none"
                                            />
                                            <circle cx="9" cy="7" r="4" />
                                            <path
                                                d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2 M16 3.13a4 4 0 0 1 0 7.75 M21 21v-2a4 4 0 0 0 -3 -3.85"
                                            />
                                        </svg>
                                        <div class="text-xl ml-4">
                                            {{ planes.num_max_asociaciones }}
                                            organizaciones a contratar
                                        </div>
                                        <!------------------------------------------------------------------>
                                    </li>
                                    <li class="flex items-center py-1">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-calendar"
                                            width="30"
                                            height="30"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="#2c3e50"
                                            fill="none"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >
                                            <path
                                                stroke="none"
                                                d="M0 0h24v24H0z"
                                                fill="none"
                                            />
                                            <rect
                                                x="4"
                                                y="5"
                                                width="16"
                                                height="16"
                                                rx="2"
                                            />
                                            <line
                                                x1="16"
                                                y1="3"
                                                x2="16"
                                                y2="7"
                                            />
                                            <line x1="8" y1="3" x2="8" y2="7" />
                                            <line
                                                x1="4"
                                                y1="11"
                                                x2="20"
                                                y2="11"
                                            />
                                            <line
                                                x1="11"
                                                y1="15"
                                                x2="12"
                                                y2="15"
                                            />
                                            <line
                                                x1="12"
                                                y1="15"
                                                x2="12"
                                                y2="18"
                                            />
                                        </svg>
                                        <div class="text-xl ml-4">
                                            {{ planes.duracion }}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- ------------------------------------------------------------------------------------------------------ -->
                    </div>
                </div>
            </section>
            <!-- Contact Sales -->
            <section>
                <div
                    class="px-5 py-3 bg-indigo-50 border border-indigo-100 rounded-sm text-center xl:text-left xl:flex xl:flex-wrap xl:justify-between xl:items-center"
                >
                    <div class="text-slate-800 font-semibold mb-2 xl:mb-0">
                        Mirar otras opciones
                    </div>
                    <button
                        class="inline-block rounded bg-indigo-400 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                    >
                        Contactar con ventas
                    </button>
                </div>
            </section>

            <!-- FAQs -->
            <section>
                <div class="my-8">
                    <h2 class="text-2xl text-slate-800 font-bold">
                        Preguntas frecuentes
                    </h2>
                </div>
                <ul class="space-y-5">
                    <li>
                        <div class="font-semibold text-slate-800 mb-1">
                            ¿Cuál es la diferencia entre las tres versiones?
                        </div>
                        <div class="text-sm">
                            Excepteur sint occaecat cupidatat non proident, sunt
                            in culpa qui officia deserunt mollit.
                        </div>
                    </li>
                    <li>
                        <div class="font-semibold text-slate-800 mb-1">
                            ¿Hay alguna diferencia entre Basic y Plus?
                            licencias?
                        </div>
                        <div class="text-sm">
                            Excepteur sint occaecat cupidatat non proident, sunt
                            in culpa qui officia deserunt mollit anim id est
                            laborum in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur.
                        </div>
                    </li>
                    <li>
                        <div class="font-semibold text-slate-800 mb-1">
                            ¿Tienes más preguntas?
                        </div>
                        <div class="text-sm"></div>
                    </li>
                </ul>
            </section>
        </div>
    </div>
</template>

<style scope>
.cabezera {
    flex-grow: 1;
}

.panel-body {
    padding: 1.5rem; /* El valor 6 de Tailwind equivale a 1.5rem */
    margin-top: 1.5rem; /* 24px */
}
.titulo {
    font-size: 1.5rem; /* 24px */
    line-height: 2rem; /* 32px */
    color: rgb(30 41 59);
    font-weight: 700;
    margin-bottom: 1rem; /* 16px */
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
    border-radius: 6px;
}
</style>
