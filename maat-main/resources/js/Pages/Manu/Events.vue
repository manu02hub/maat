<script setup>
import SearchForm from '@/Components/mosaic/components/SearchForm.vue';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CardEvent from '@/Components/manuComponents/CardEvent.vue';
import { Head,Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="EventsIndex" />

    <PrivateLayout>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 mr-8 ml-8 mt-5 mb-3">
            <div class="flex w-full">
                <div class="flex-1 text-lg-start justify-content-center" style="width: 50%;">
                    <h1>Todos los eventos</h1>
                </div>
                <div class="flex">

                    <div class="" style="width: auto;">
                        <SearchForm></SearchForm>
                    </div>
                    <div class="ml-2" style="width: 100%;">
                        <div>
                            <Link type="button" style="width: 120px;"
                                class="flex items-center rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" :href="route('create-event')">
                                <v-icon name="io-add-outline" fill="#9FA8DA"></v-icon>
                                Add Event
                            </Link>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container-fluid mr-5 ml-5">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
                <CardEvent></CardEvent>
                <CardEvent></CardEvent>
                <CardEvent></CardEvent>
                <CardEvent></CardEvent>
                <CardEvent></CardEvent>
                <CardEvent></CardEvent>
            </div>
        </div>


    </PrivateLayout>
</template>

