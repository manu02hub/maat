<script setup>

import { Head, Link } from '@inertiajs/vue3';

</script>

<template>
    <div class="flex justify-center m-5">
        <div class="block max-w-sm rounded-lg bg-white shadow-lg dark:bg-neutral-700">
            <Link href="/eventInfo" data-te-ripple-init data-te-ripple-color="light">
                <img class="rounded-t-lg" src="https://tecdn.b-cdn.net/img/new/standard/nature/186.jpg" alt="" />
            </Link>
            <div class="p-6">
                <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                    Nombre Evento
                </h5>
                <p class="mb-2<!--  --> text-base text-neutral-600 dark:text-neutral-200">
                    Some quick example text to build on the card title and make up the
                    bulk of the card's content.
                </p>
                <p class="text-sm text-gray-600 flex items-center">
                    <v-icon name="md-daterange" class="fill-current text-gray-500 w-3 h-3 mr-2">
                    </v-icon>
                    15/03/2023
                </p>
                <p class="mb-3 text-sm text-gray-600 flex items-center">
                    <v-icon name="co-myspace" class="fill-current text-gray-500 w-3 h-3 mr-2">
                    </v-icon>
                    20 plazas
                </p>
                <button type="button"
                    class="inline-block rounded bg-indigo-400 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                    data-te-ripple-init data-te-ripple-color="light">
                    Apuntarme
                </button>
            </div>
        </div>
    </div>
</template>

