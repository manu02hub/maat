<script setup>
import CardEventUser from "@/Components/manuComponents/CardEventUser.vue";
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import DropdownFilter from "@/Components/mosaic/components/DropdownFilter.vue";
import { Head, Link, usePage } from "@inertiajs/vue3";
</script>

<template>
    <Head title="EventsUser" />
    <PrivateLayout>
        <div
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 mr-5 ml-5 mt-5 mb-3"
        >
            <div class="flex w-full">
                <div
                    class="flex-1 text-lg-start justify-content-center"
                    style="width: 50%"
                >
                    <h1>Eventos Disponibles</h1>
                </div>
            </div>
        </div>
        <div class="container-fluid mr-5 ml-5 mt-5">
            <div class="flex flex-wrap">
                <div class="w-full">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
                    >
                        <div class="px-4 py-5 flex-auto">
                            <div class="tab-content tab-space">
                                <div>
                                    <div
                                        v-if="$page.props.eventos.length === 0"
                                    >
                                        No hay eventos disponibles
                                    </div>
                                    <div v-else>
                                        <div
                                            class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3"
                                        >
                                            <!---------------------------------------{card}--------------------------------------->
                                            <div
                                                class="flex justify-center m-5"
                                                v-for="evento in $page.props
                                                    .eventos"
                                                :key="evento.id"
                                            >
                                                <div
                                                    class="block max-w-sm rounded-lg bg-white shadow-lg dark:bg-neutral-700"
                                                >
                                                    <img
                                                        class="rounded-t-lg"
                                                        src="https://tecdn.b-cdn.net/img/new/standard/nature/186.jpg"
                                                        alt=""
                                                    />

                                                    <div class="p-6">
                                                        <h5
                                                            class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50 limitador"
                                                        >
                                                            {{ evento.nombre }}
                                                        </h5>
                                                        <p
                                                            class="mb-2 text-base text-neutral-600 dark:text-neutral-200 limitador"
                                                        >
                                                            {{
                                                                evento.descripcion
                                                            }}
                                                        </p>
                                                        <p
                                                            class="text-sm text-gray-600 flex items-center limitador"
                                                        >
                                                            <v-icon
                                                                name="md-daterange"
                                                                class="fill-current text-gray-500 w-3 h-3 mr-2"
                                                            >
                                                            </v-icon>
                                                            {{
                                                                evento.fecha_inicio
                                                            }}
                                                        </p>
                                                        <p
                                                            class="mb-3 text-sm text-gray-600 flex items-center limitador"
                                                        >
                                                            <v-icon
                                                                name="co-myspace"
                                                                class="fill-current text-gray-500 w-3 h-3 mr-2"
                                                            >
                                                            </v-icon>
                                                            20 plazas
                                                        </p>
                                                        <Link
                                                            :href="
                                                                route(
                                                                    'eventInfo',
                                                                    evento.id
                                                                )
                                                            "
                                                            type="button"
                                                            class="inline-block rounded bg-indigo-400 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                                                            data-te-ripple-init
                                                            data-te-ripple-color="light"
                                                        >
                                                            Mas información
                                                        </Link>
                                                    </div>
                                                </div>
                                            </div>
                                            <!---------------------------------------{card}--------------------------------------->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PrivateLayout>
</template>

<style scoped>
.limitador {
    width: 340px; /* ancho del div */
    word-wrap: break-word;
    overflow-wrap: break-word;
}
</style>
