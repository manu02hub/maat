<template>
    <div class="bg-white shadow-lg rounded-sm border border-slate-200 relative m-10">
        <header class="px-5 py-4">
            <h2 class="font-semibold text-slate-800">Listado ONGs <span class="text-slate-400 font-medium"></span></h2>
        </header>
        <div>
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <!-- Table header -->
                    <thead
                        class="text-xs font-semibold uppercase text-slate-500 bg-slate-50 border-t border-b border-slate-200">
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Icono</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Nombre</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Email</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Localizacion</div>
                            </th>
                        </tr>
                    </thead>
                    <!-- Table body -->
                    <tbody>

                    </tbody>
                    <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <img class="rounded-full border-2 border-white box-content"
                                src="https://www.corresponsables.com/sites/default/files/save-children.png"
                                width="30" height="30" alt="User 01" />
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left">Save the children</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">savethechildren@gmail.com</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">España</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <button type="submit" class="font-semibold text-left">Donativo</button>
                            </th>
                        </tr>
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <img class="rounded-full border-2 border-white box-content"
                                src="https://vetoriano.com/wp-content/uploads/2020/01/greenpeace.jpg"
                                width="30" height="30" alt="User 01" />
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left">Greenpeace</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Email</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">España</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <button type="submit" class="font-semibold text-left">Donativo</button>
                            </th>
                        </tr>
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <img class="rounded-full border-2 border-white box-content"
                                src="https://www.manosunidas.org/sites/default/files/logo_mu.png"
                                width="30" height="30" alt="User 01" />
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left">Manos Unidas</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Email</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">España</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                               <button type="submit" class="btn tbn-info font-semibold text-left">Donativo</button>
                            </th>
                        </tr>
                </table>

            </div>
        </div>
    </div>
</template>
