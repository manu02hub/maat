<template>

        <div class="col p-5 m-10" style="background-color:rgb(239, 239, 239);">
            <!-- Content -->
            <div class="grow p-5 flex flex-col">
                <div class="grow">
                    <h3 class="text-lg font-bold text-slate-800">Artículo destacado de la semana</h3>
                    <div class="text-sm font-semibold text-indigo-500 uppercase mb-2">Martes 28 Enero, 2013</div>
                    <router-link class="inline-flex mb-2" to="/community/meetups-post">
                        <h3 class="text-lg font-bold text-slate-800">“Los coches diésel más nuevos tienen exceso de
                            emisiones en el 77% de las pruebas, según una ONG</h3>
                    </router-link>
                    <div class="text-sm">El Consejo Internacional de Transporte Limpio denuncia que estos datos, recabados
                        de los test oficiales y de investigaciones independientes, sugieren que las marcas siguen usando
                        dispositivos de desactivación como los prohibidos tras el ‘dieselgate’.
                    </div>
                </div>
            </div>
        </div>
        <div class="grid xl:grid-cols-2 gap-6 m-10">

        <!-- Item 1 -->
        <article class="flex bg-white shadow-lg rounded-sm border border-slate-200 overflow-hidden">
            <!-- Image -->
            <router-link class="relative block w-24 sm:w-56 xl:sidebar-expanded:w-40 2xl:sidebar-expanded:w-56 shrink-0"
                to="/community/meetups-post">
                <img class="absolute object-cover object-center w-full h-full"
                    src="https://images.pexels.com/photos/7656124/pexels-photo-7656124.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    width="220" height="236" alt="Meetup 01" />
            </router-link>
            <!-- Content -->
            <div class="grow p-5 flex flex-col">
                <div class="grow">
                    <div class="text-sm font-semibold text-indigo-500 uppercase mb-2">Lunes 27 Enero, 2013</div>
                    <router-link class="inline-flex mb-2" to="/community/meetups-post">
                        <a :href="route('item1noticia')" class="text-lg font-bold text-slate-800">“YA NUNCA es primavera”: Greenpeace cambia el mensaje
                            de la icónica campaña de El Corte Inglés</a>
                    </router-link>
                    <div class="text-sm">Los escaladores de la organización han desplegado una pancarta a más de 25 metros
                        de altura en el edificio de Nuevos Ministerios en Madrid, para alertar sobre la emergencia climática
                    </div>
                </div>
                <!-- Footer -->
                <div class="flex justify-between mt-3">

                    <!-- Avatars -->
                    <div class="flex items-center space-x-2">
                        <div class="flex -space-x-3 -ml-0.5">
                            <img class="rounded-full border-2 border-white box-content"
                                src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                width="28" height="28" alt="User 01" />
                            <img class="rounded-full border-2 border-white box-content"
                                src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                width="28" height="28" alt="User 04" />
                            <img class="rounded-full border-2 border-white box-content"
                                src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                width="28" height="28" alt="User 05" />
                        </div>
                        <div class="text-xs font-medium text-slate-400 italic">+22</div>
                    </div>
                </div>
            </div>
        </article>

        <!-- Item 2 -->
        <article class="flex bg-white shadow-lg rounded-sm border border-slate-200 overflow-hidden">
            <!-- Image -->
            <router-link class="relative block w-24 sm:w-56 xl:sidebar-expanded:w-40 2xl:sidebar-expanded:w-56 shrink-0"
                to="/community/meetups-post">
                <img class="absolute object-cover object-center w-full h-full"
                    src="https://images.pexels.com/photos/459728/pexels-photo-459728.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    width="220" height="236" alt="Meetup 02" />
            </router-link>
            <!-- Content -->
            <div class="grow p-5 flex flex-col">
                <div class="grow">
                    <div class="text-sm font-semibold text-indigo-500 uppercase mb-2">Lunes 27 Enero, 2013</div>
                    <router-link class="inline-flex mb-2" to="/community/meetups-post">
                        <h3 class="text-lg font-bold text-slate-800">Helena Viñes, experta en ecoimpostura: “Está muy bien
                            compensar las emisiones, pero lo fundamental es recortarlas”</h3>
                    </router-link>
                    <div class="text-sm">Esta consejera de la CNMV advierte de que el compromiso de emisiones netas cero es
                        “incompatible con las inversiones en nuevas infraestructuras de energías fósiles”</div>
                </div>
                <!-- Footer -->
                <div class="flex justify-between mt-3">

                    <!-- Avatars -->
                    <div class="flex items-center space-x-2">
                        <div class="flex -space-x-3 -ml-0.5">
                            <img class="rounded-full border-2 border-white box-content"
                                src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                width="28" height="28" alt="User 02" />
                            <img class="rounded-full border-2 border-white box-content"
                                src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                width="28" height="28" alt="User 03" />
                            <img class="rounded-full border-2 border-white box-content"
                                src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                width="28" height="28" alt="User 04" />
                        </div>
                        <div class="text-xs font-medium text-slate-400 italic">+132</div>
                    </div>
                </div>
            </div>
        </article>

        <!-- Item 3 -->
        <article class="flex bg-white shadow-lg rounded-sm border border-slate-200 overflow-hidden">
            <!-- Image -->
            <router-link class="relative block w-24 sm:w-56 xl:sidebar-expanded:w-40 2xl:sidebar-expanded:w-56 shrink-0"
                to="/community/meetups-post">
                <img class="absolute object-cover object-center w-full h-full"
                    src="https://images.pexels.com/photos/3831240/pexels-photo-3831240.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    width="220" height="236" alt="Meetup 03" />
            </router-link>
            <!-- Content -->
            <div class="grow p-5 flex flex-col">
                <div class="grow">
                    <div class="text-sm font-semibold text-indigo-500 uppercase mb-2">Miercoles 29 Enero, 2013</div>
                    <router-link class="inline-flex mb-2" to="/community/meetups-post">
                        <h3 class="text-lg font-bold text-slate-800">Los cuatro errores de quienes critican las reservas
                            privadas de Kenia</h3>
                    </router-link>
                    <div class="text-sm">Las críticas al modelo de conservación comunitario adoptan la doctrina
                        postcolonialista radical sin dar cuenta de sus evidentes logros medioambientales y sociales.</div>
                </div>
                <!-- Footer -->
                <div class="flex justify-between mt-3">

                    <!-- Avatars -->
                    <div class="flex items-center space-x-2">
                        <div class="flex -space-x-3 -ml-0.5">
                            <img class="rounded-full border-2 border-white box-content"
                                src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                width="28" height="28" alt="User 06" />
                            <img class="rounded-full border-2 border-white box-content"
                                src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                width="28" height="28" alt="User 03" />
                            <img class="rounded-full border-2 border-white box-content"
                                src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                width="28" height="28" alt="User 01" />
                        </div>
                        <div class="text-xs font-medium text-slate-400 italic">+12</div>
                    </div>
                </div>
            </div>
        </article>

        <!-- Item 4 -->
        <article class="flex bg-white shadow-lg rounded-sm border border-slate-200 overflow-hidden">
            <!-- Image -->
            <router-link class="relative block w-24 sm:w-56 xl:sidebar-expanded:w-40 2xl:sidebar-expanded:w-56 shrink-0"
                to="/community/meetups-post">
                <img class="absolute object-cover object-center w-full h-full"
                    src="https://images.pexels.com/photos/6069562/pexels-photo-6069562.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    width="220" height="236" alt="Meetup 04" />
            </router-link>
            <!-- Content -->
            <div class="grow p-5 flex flex-col">
                <div class="grow">
                    <div class="text-sm font-semibold text-indigo-500 uppercase mb-2">Jueves 30 Enero, 2013</div>
                    <router-link class="inline-flex mb-2" to="/community/meetups-post">
                        <h3 class="text-lg font-bold text-slate-800">“Mejor gastar 50 euros en una buena camiseta que en
                            cinco”: las pequeñas marcas españolas que luchan contra la moda rápida</h3>
                    </router-link>
                    <div class="text-sm">Nuevas marcas españolas de moda masculina o unisex retan, desde calles adyacentes
                        de Madrid, al consumo insostenible. Sus armas: pequeñas tiradas, tejidos de calidad y prendas
                        atemporales</div>
                </div>
                <!-- Footer -->
                <div class="flex justify-between mt-3">

                    <!-- Avatars -->
                    <div class="flex items-center space-x-2">
                        <div class="flex -space-x-3 -ml-0.5">
                            <img class="rounded-full border-2 border-white box-content"
                                src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                width="28" height="28" alt="User 05" />
                            <img class="rounded-full border-2 border-white box-content"
                                src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                width="28" height="28" alt="User 02" />
                        </div>
                        <div class="text-xs font-medium text-slate-400 italic">+17</div>
                    </div>
                </div>
            </div>
        </article>



    </div>
</template>

<script>
export default {
    name: 'MeetupsPosts',
}
</script>
