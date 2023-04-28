<script setup>
import CardEventUser from "@/Components/manuComponents/CardEventUser.vue";
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import DropdownFilter from "@/Components/mosaic/components/DropdownFilter.vue";
import { Head, Link } from "@inertiajs/vue3";
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
                    <h1>Mis eventos</h1>
                </div>
                <div class="flex-1">
                    <div class="flex" style="width: auto">
                        <div
                            class="relative mb-4 flex w-full flex-wrap items-stretch"
                        >
                            <input
                                type="date"
                                class="bg-white relative m-0 block w-[1px] min-w-0 flex-auto rounded-l border border-r-0 border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition ease-in-out focus:z-[3] focus:border-primary-600 focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                placeholder="Recipient's username"
                                aria-label="Recipient's username"
                                aria-describedby="button-addon2"
                            />
                            <button
                                class="relative z-[2] rounded-r bg-indigo-600 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:z-[3] focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                                type="button"
                                id="button-addon2"
                            >
                                Button
                            </button>
                        </div>
                    </div>
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
                                                <Link
                                                    href="/eventInfo"
                                                    data-te-ripple-init
                                                    data-te-ripple-color="light"
                                                >
                                                    <img
                                                        class="rounded-t-lg"
                                                        src="https://tecdn.b-cdn.net/img/new/standard/nature/186.jpg"
                                                        alt=""
                                                    />
                                                </Link>
                                                <div class="p-6">
                                                    <h5
                                                        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50 limitador"
                                                    >
                                                        {{ evento.nombre }}
                                                    </h5>
                                                    <p
                                                        class="mb-2 text-base text-neutral-600 dark:text-neutral-200 limitador"
                                                    >
                                                        {{ evento.descripcion }}
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
                                                                'delete_event_of_user',
                                                                evento.id
                                                            )
                                                        "
                                                        type="button"
                                                        class="inline-block rounded bg-indigo-400 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                                                        data-te-ripple-init
                                                        data-te-ripple-color="light"
                                                    >
                                                        desapuntarme
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
    </PrivateLayout>
</template>
