<script setup>
import SearchForm from "@/Components/mosaic/components/SearchForm.vue";
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import CardEvent from "@/Components/manuComponents/CardEvent.vue";
import { Head, Link } from "@inertiajs/vue3";
import { defineProps, ref, onMounted } from "vue";

// Definir las propiedades recibidas
const props = defineProps({
    showDeleteModal: {
        type: Boolean,
        default: null,
    },
    deleteModalMessage: {
        type: String,
        default: "",
    },
});

// Definir variables reactivas
const showDeleteModal = ref(props.showDeleteModal || false);
const deleteModalMessage = ref(props.deleteModalMessage);

// Cerrar el modal
const closeModal = () => {
    showDeleteModal.value = false;
};

// Actualizar los props recibidos
onMounted(() => {
    showDeleteModal.value = props.showDeleteModal || false;
    deleteModalMessage.value = props.deleteModalMessage;
});
</script>
<template>
    <Head title="Eventos-ONG" />
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
                <div
                    class="m-2"
                    v-for="evento in $page.props.eventos"
                    :key="evento.id"
                >
                    <div class="event-card">
                        <div class="event-details">
                            <h2 class="event-title">{{ evento.nombre }}</h2>
                            <p class="event-description">
                                {{ evento.descripcion }}
                            </p>
                            <div class="event-meta">
                                <p class="event-date">
                                    {{ evento.fecha_inicio }}
                                </p>
                            </div>
                            <div class="event-meta">
                                <p class="event-spots">
                                    {{ evento.plazas }} plazas
                                </p>
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
                <div v-if="showDeleteModal" class="modal">
                    <div class="modal-content">
                        <p>
                            No se puede eliminar el evento porque hay usuarios
                            apuntados.
                        </p>
                        <a href="#" @click="closeModal()">Cerrar</a>
                    </div>
                </div>
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

/* Estilos del modal */
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: white;
    padding: 1rem;
    border-radius: 4px;
}

.modal-content p {
    margin-bottom: 1rem;
}

.modal-content button {
    padding: 0.5rem 1rem;
    background-color: #eee;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>
