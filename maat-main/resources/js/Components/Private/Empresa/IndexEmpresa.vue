<script setup>
import SearchForm from "@/Components/mosaic/components/SearchForm.vue";
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import CardEvent from "@/Components/manuComponents/CardEvent.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";


</script>

<template>
    <div class="grid-system">
        <div class="div-header">
            <header>
                <span class="empresa">Empresa</span>
                <div class="action-buttons">
                    <Link :href="route('createEmpresa')" class="action-añadir">
                    <button>Añadir Empresa</button>
                    </Link>
                </div>
            </header>

            <div class="div-tabla">
                <table>
                    <thead>
                        <tr>
                            <th class="th-id">id</th>
                            <th class="attr-input-checkbox">
                                <input type="checkbox">
                            </th>
                            <th class="attr-th">entidad_id</th>
                            <th class="attr-th">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="empresas in $page.props.empresa" :key="empresas.id">
                            <td class="th-id">1</td>
                            <td class="attr-input-checkbox">
                                <input type="checkbox">
                            </td>
                            <td class="attr-td">{{ empresas.entidad_id }}</td>

                            <td class="attr-td">
                                <Link :href="route('editEmpresa', empresas.id)" class="text-slate-400 hover:text-slate-500 rounded-full">
                                <button class="action-buttons-list">
                                    <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                </Link>
                                <button class="action-buttons-list">
                                    <svg class="h-6 w-6 text-gray-500" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="7" r="4" />
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    </svg>
                                </button>
                                <Link :href="route('deleteEmpresa', empresas.id)">
                                <button class="action-buttons-list" @click="Eliminar">
                                    <svg class="h-6 w-6 text-red-500" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="4" y1="7" x2="20" y2="7" />
                                        <line x1="10" y1="11" x2="10" y2="17" />
                                        <line x1="14" y1="11" x2="14" y2="17" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                </button>
                                </Link>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<style scoped>
.button-enviar{
    margin-left: 1%;
    background-color: rgb(81, 161, 0);
    padding: 0.9%;
}
.Email{
    margin: 20px;
}
.grid-system {
    display: grid;
    grid-template-columns: 1fr;
    grid-gap: 0;
    grid-auto-rows: minmax(0, auto);
    grid-template-areas: "area-1";
    grid-template-rows: auto;
    grid-template-columns: repeat(1, minmax(0, 1fr));
    grid-auto-flow: dense;
    width: 100%;
}

.email{
border-radius: 6px;
}

.div-header {
    background-color: white;
    border: 1px solid;
    border-color: rgb(226 232 240);
}

.empresa {
    font-size: 30px;
    padding-left: 2%;
}

.div-tabla {
    overflow-x: auto;
}

header {
    display: flex;
    justify-content: space-between;
    font-size: 20px;
    padding-right: 3%;
    padding-top: 2%;
}

table {
    table-layout: auto;
    width: 100%;
}

thead {
    background-color: rgb(248 250 252);
    font-size: 12px;
    border-top: 1px solid;
    border-bottom: 1px solid;
    border-color: rgb(226 232 240);
    text-transform: uppercase;
    color: #64748b;
}

th {
    /*arriba izq culo der*/
    padding: 12px 20px 12px 20px;
}

.th-id {
    display: none;
}

.attr-th {
    text-align: left;
}

.attr-td {
    padding: 1%;
    border-top: 1px solid;
    border-bottom: 1px solid;
    border-color: rgb(226 232 240);
}

.attr-input-checkbox {
    text-align: center;
}

.action-añadir{
    background-color: coral;
    border-radius: 6px;
    padding: 7%;
}

.action-buttons-list {
    padding-bottom: 0%;
    padding-left: 3%;
    padding-right: 3%;
    padding-top: 0%;
}


</style>
