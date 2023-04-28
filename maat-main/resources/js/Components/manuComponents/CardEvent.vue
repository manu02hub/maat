<template>
    <div class="m-2">
        <!-- <div
            class="border-r border-b border-l border-gray-400 lg:rounded-l lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 justify-between leading-normal"> -->
            <div
            class="rounded border border-gray-200 p-4 justify-between leading-normal bg-white shadow-lg dark:bg-neutral-700">
            <div class="flex flex-row">
                <div class="mb-8">
                    <div class="flex flex-row">
                        <div class="flex-initial items-center">
                            <div class="lg:h-36 lg:w-36 lg:mb-0 mb-3 mt-3">
                                <img src="http://localhost/img/maat/evento1.jpg"
                                    alt="Just a flower"
                                    class=" w-full  object-scale-down lg:object-cover  lg:h-36 rounded-2xl">
                            </div>
                        </div>

                        <div class="flex-initial">
                            <div class="ml-3 justify-evenly py-2">
                                <div class="text-gray-900 font-bold text-xl mb-2">Nombre del Evento</div>
                                <p class="text-gray-700 text-sm">Descripción del evento. eeeee
                                    quia, nulla! Descripción del evento. Voluptatibus
                                    quia, nulla! </p>
                                <p class="text-sm text-gray-600 flex items-center mt-3">
                                    <v-icon name="md-daterange" class="fill-current text-gray-500 w-3 h-3 mr-2">
                                    </v-icon>
                                    15/03/2023
                                </p>
                                <p class="text-sm text-gray-600 flex items-center">
                                    <v-icon name="co-myspace" class="fill-current text-gray-500 w-3 h-3 mr-2">
                                    </v-icon>
                                    20 plazas
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="border-t border-slate-200">
                <div class="flex divide-x divide-slate-200r">
                    <Link
                        class="block flex-1 text-center text-sm text-yellow-400 hover:text-yellow-500 font-medium px-3 py-4 group"
                        :href="route('edit-event')">
                        <div class="flex items-center justify-center">
                            <v-icon name="md-modeedit-outlined"
                                class="w-4 h-4 fill-current text-yellow-400 group-hover:text-yellow-500 shrink-0 mr-2">
                            </v-icon>
                            <span>Edit Event</span>
                        </div>
                    </Link>
                    <router-link
                        class="block flex-1 text-center text-sm text-red-500 hover:text-red-600 font-medium px-3 py-4"
                        to="/messages">
                        <div class="flex items-center justify-center">
                            <v-icon name="ri-delete-bin-6-line" class="w-4 h-4 fill-current shrink-0 mr-2">
                            </v-icon>
                            <span>Delete Event</span>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="flex">
        <div class="flex-none w-14 h-14">
            01
        </div>
        <div class="flex-initial w-64 ...">
            02
        </div>
        <div class="flex-initial w-32 ...">
            03
        </div>
    </div> -->
</template>

<script>
import EditMenu from '../mosaic/components/DropdownEditMenu.vue'
import { Link } from '@inertiajs/vue3';

export default {
    name: 'CardEvent',
    props: ['item'],
    components: {
        EditMenu,
        Link,
    },
}
</script>

<style scoped>
@import url('./../../../css/bootstrap.css');
@import url('./../../../css/app.css');
</style>
