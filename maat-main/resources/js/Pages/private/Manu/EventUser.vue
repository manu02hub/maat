<script>

import CardEventUser from '@/Components/manuComponents/CardEventUser.vue';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import DropdownFilter from '@/Components/mosaic/components/DropdownFilter.vue';
import { Head, Link } from '@inertiajs/vue3';

export default {
    data() {
        return {
            openTab: 1
        }
    },
    components: {
        PrivateLayout,
        CardEventUser,
        DropdownFilter,
    },
    methods: {
        toggleTabs: function (tabNumber) {
            this.openTab = tabNumber
        }
    }
}
</script>

<template>
    <Head title="EventsUser" />
    <PrivateLayout>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 mr-5 ml-5 mt-5 mb-3">
            <div class="flex w-full">
                <div class="flex-1 text-lg-start justify-content-center" style="width: 50%;">
                    <h1>Todos los eventos</h1>
                </div>
                <div class="flex-1">

                    <div class="flex" style="width: auto;">
                        <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                            <input type="date"
                                class="bg-white relative m-0 block w-[1px] min-w-0 flex-auto rounded-l border border-r-0 border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition ease-in-out focus:z-[3] focus:border-primary-600 focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                placeholder="Recipient's username" aria-label="Recipient's username"
                                aria-describedby="button-addon2" />
                            <button
                                class="relative z-[2] rounded-r bg-indigo-600 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:z-[3] focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                                type="button" id="button-addon2">
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
                    <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                            <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal"
                                v-on:click="toggleTabs(1)"
                                v-bind:class="{ 'text-indigo-500 bg-white': openTab !== 1, 'text-white bg-indigo-500': openTab === 1 }">
                                Mis Eventos
                            </a>
                        </li>
                        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                            <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal"
                                v-on:click="toggleTabs(2)"
                                v-bind:class="{ 'text-indigo-500 bg-white': openTab !== 2, 'text-white bg-indigo-500': openTab === 2 }">
                                Todos los eventos
                            </a>
                        </li>
                    </ul>
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                        <div class="px-4 py-5 flex-auto">
                            <div class="tab-content tab-space">
                            <div v-bind:class="{ 'hidden': openTab !== 1, 'block': openTab === 1 }">
                                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
                                    <CardEventUser></CardEventUser>
                                    <CardEventUser></CardEventUser>
                                    <CardEventUser></CardEventUser>
                                </div>
                            </div>
                                <div v-bind:class="{ 'hidden': openTab !== 2, 'block': openTab === 2 }">
                                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
                                        <CardEventUser></CardEventUser>
                                        <CardEventUser></CardEventUser>
                                        <CardEventUser></CardEventUser>
                                        <CardEventUser></CardEventUser>
                                        <CardEventUser></CardEventUser>
                                        <CardEventUser></CardEventUser>
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

