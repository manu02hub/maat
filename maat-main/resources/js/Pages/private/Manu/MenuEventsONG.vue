<script setup>
import SearchForm from "@/Components/mosaic/components/SearchForm.vue";
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import CardEvent from "@/Components/manuComponents/CardEvent.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>
    <Head title="eventoIndex" />

    <PrivateLayout>
        <div
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 mr-8 ml-8 mt-5 mb-3"
        >
            <div class="flex w-full">
                <div
                    class="flex-1 text-lg-start justify-content-center"
                    style="width: 50%"
                >
                    <h1>Todos los eventos</h1>
                </div>
                <div class="flex">
                    <div class="" style="width: auto">
                        <SearchForm></SearchForm>
                    </div>
                    <div class="ml-2" style="width: 100%">
                        <div>
                            <Link
                                type="button"
                                style="width: 120px"
                                class="flex items-center rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                :href="route('createNewEvent')"
                            >
                                <v-icon
                                    name="io-add-outline"
                                    fill="#9FA8DA"
                                ></v-icon>
                                Add Event
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mr-5 ml-5">
            <div
                class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3"
            >
                <!--------------------------------------------{card}-------------------------------------------->
                <div
                    class="m-2"
                    v-for="evento in $page.props.eventos"
                    :key="evento.id"
                >
                    <div class="event-card">
                        <div class="event-image">
                            <img
                                src="http://localhost/img/maat/evento1.jpg"
                                alt=""
                            />
                        </div>
                        <div class="event-details">
                            <h2 class="event-title">{{ evento.nombre }}</h2>
                            <p class="event-description">
                                {{ evento.descripcion }}
                            </p>
                            <div class="event-meta">
                                <p class="event-date">
                                    {{ evento.fecha_inicio }} /
                                    {{ evento.fecha_inicio }}
                                </p>
                                <p class="event-spots">{{ evento.plazas }}</p>
                            </div>
                            <div class="event-actions">
                                <Link
                                    :href="route('edit', evento.id)"
                                    class="btn-edit"
                                    >Edit Event</Link
                                >
                                <Link
                                    :href="route('delete', evento.id)"
                                    class="btn-delete"
                                    >Delete Event</Link
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------------------------------{card}-------------------------------------------->
            </div>
        </div>
    </PrivateLayout>
</template>

<style scope>
.limitador {
    width: 340px; /* ancho del div */
    word-wrap: break-word;
    overflow-wrap: break-word;
}

.event-card {
    display: flex;
    flex-direction: row;
    align-items: center;
    border-radius: 0.5rem;
    border: 1px solid #fff;
    padding: 1rem;
    justify-content: space-between;
    background-color: #fff;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
}

.event-image {
    flex-shrink: 0;
    margin-right: 1rem;
    width: 150px;
    height: 150px;
    overflow: hidden;
    border-radius: 1rem;
}

.event-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.event-details {
    flex-grow: 1;
}

.event-title {
    font-weight: bold;
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.event-description {
    font-size: 1rem;
    color: #888;
    margin-bottom: 1rem;
}

.event-meta {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-bottom: 1rem;
}

.event-meta p {
    margin-right: 1rem;
}

.event-actions {
    display: flex;
    flex-direction: row;
}

.btn-edit,
.btn-delete {
    color: #fff;
    border-radius: 0.5rem;
    padding: 0.5rem 1rem;
    text-align: center;
    cursor: pointer;
}

.btn-edit {
    background-color: #ffce00;
    margin-right: 1rem;
}

.btn-delete {
    background-color: #ff4d4d;
}
</style>

<!--
    <div
                    class="m-2"
                    v-for="evento in $page.props.eventos"
                    :key="evento.id"
                >
                    <div
                        class="rounded border border-white-700 p-4 justify-between leading-normal bg-white shadow-lg dark:bg-neutral-500"
                    >
                        <div class="flex flex-row">
                            <div class="mb-8">
                                <div class="flex flex-row">
                                    <div class="flex-initial items-center">
                                        <div
                                            class="lg:h-36 lg:w-36 lg:mb-0 mb-3 mt-3"
                                        >
                                            <img
                                                src="http://localhost/img/maat/evento1.jpg"
                                                alt=""
                                                class="w-full object-scale-down lg:object-cover lg:h-36 rounded-2xl"
                                            />
                                        </div>
                                    </div>

                                    <div class="flex-initial">
                                        <div class="ml-3 justify-evenly py-2">
                                            <div
                                                class="text-white-900 font-bold text-xl mb-2 limitador"
                                            >
                                                {{ evento.nombre }}
                                            </div>
                                            <p
                                                class="text-white-700 text-sm limitador"
                                            >
                                                {{ evento.descripcion }}
                                            </p>
                                            <p
                                                class="text-sm text-white-600 flex items-center mt-3"
                                            >
                                                <v-icon
                                                    name="md-daterange"
                                                    class="fill-current text-white-500 w-3 h-3 mr-2"
                                                >
                                                </v-icon>
                                                {{ evento.fecha_inicio }} /
                                                {{ evento.fecha_inicio }}
                                            </p>
                                            <p
                                                class="text-sm text-white-600 flex items-center"
                                            >
                                                <v-icon
                                                    name="co-myspace"
                                                    class="fill-current text-white-500 w-3 h-3 mr-2"
                                                >
                                                </v-icon>
                                                {{ evento.plazas }}
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
                                    :href="route('edit', evento.id)"
                                >
                                    <div
                                        class="flex items-center justify-center"
                                    >
                                        <v-icon
                                            name="md-modeedit-outlined"
                                            class="w-4 h-4 fill-current text-yellow-400 group-hover:text-yellow-500 shrink-0 mr-2"
                                        >
                                        </v-icon>
                                        <span>Edit Event</span>
                                    </div>
                                </Link>
                                <router-link
                                    class="block flex-1 text-center text-sm text-red-500 hover:text-red-600 font-medium px-3 py-4"
                                    to="/messages"
                                >
                                    <div
                                        class="flex items-center justify-center"
                                    >
                                        <v-icon
                                            name="ri-delete-bin-6-line"
                                            class="w-4 h-4 fill-current shrink-0 mr-2"
                                        >
                                        </v-icon>
                                        <Link :href="route('delete', evento.id)"
                                            >Delete Event</Link
                                        >
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
-->
