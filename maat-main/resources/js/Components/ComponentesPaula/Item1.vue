<template>
    <div class="grid xl:grid-cols gap-6 m-10">
        <h1 class="text-lg font-bold text-slate-500">Lunes 27 Enero, 2013</h1>
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
                    <router-link class="inline-flex mb-2" to="/community/meetups-post">
                        <a :href="route('item1noticia')" class="text-lg font-bold text-slate-800">“YA NUNCA es primavera”:
                            Greenpeace cambia el mensaje
                            de la icónica campaña de El Corte Inglés</a>
                    </router-link>
                    <div class="text-sm">Los escaladores de la organización han desplegado una pancarta a más de 25 metros
                        de altura en el edificio de Nuevos Ministerios en Madrid, para alertar sobre la emergencia climática
                    </div>
                    <br>
                    <div class="text-sm">Greenpeace ha desplegado este jueves una pancarta en la fachada de el edificio de
                        El Corte Inglés en Nuevos Ministerios, en Madrid, para denunciar el cambio climático y el uso de
                        combustibles fósiles. Los escaladores de la organización ecologista se han descolgado a más de 25
                        metros de altura y han adaptado el icónico mensaje de la marca “Ya es primavera” a “YA NUNCA es
                        primavera”. El objetivo de Greenpeace, según su comunicado, es: “Alertar sobre cómo el cambio
                        climático, provocado por los combustibles fósiles, está modificando el clima, agravando los eventos
                        climáticos extremos y diluyendo las estaciones de transición, primavera y otoño”.
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
