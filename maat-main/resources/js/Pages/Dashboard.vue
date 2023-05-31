<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DangerButton from "@/Components/DangerButton.vue";
import AnalyticsCard01 from "@/Components/mosaic/partials/analytics/AnalyticsCard01.vue";
import AnalyticsCard02 from "@/Components/mosaic/partials/analytics/AnalyticsCard02.vue";
import AnalyticsCard03 from "@/Components/mosaic/partials/analytics/AnalyticsCard03.vue";
import AnalyticsCard04 from "@/Components/mosaic/partials/analytics/AnalyticsCard04.vue";
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import WelcomeBanner from "@/Components/mosaic/partials/dashboard/WelcomeBanner.vue";
import Sidebar from "@/Components/mosaic/partials/Sidebar.vue";

import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />
    <PrivateLayout>
        <div class="card">
            <h2>¿Que es MAAT?</h2>
            <div>
                La plataforma en línea creada para este proyecto tiene como
                objetivo promover la realización de eventos con fines
                medioambientales y sociales, con la participación de empresas y
                organizaciones. Esta plataforma cuenta con tres tipos de
                usuarios: empresas, organizaciones y personal de empresa. Las
                empresas y las organizaciones pueden crear eventos de forma
                independiente o en conjunto, utilizando el sistema de match para
                encontrar colaboradores para su evento. La plataforma también
                dispone de un chat que permite a las empresas y las
                organizaciones comunicarse entre sí. Además, tanto las empresas
                como las organizaciones pueden registrar a sus trabajadores y
                colaboradores, quienes serán asignados a los eventos
                correspondientes en caso de haber un match. De esta manera, se
                fomenta la participación de los trabajadores y colaboradores en
                eventos con fines medioambientales y sociales, lo que contribuye
                a promover la conciencia y responsabilidad social corporativa.

            </div>

            <h2>¿Creadores/CEOS?</h2>

            <div class="cartaImagenes">
                <div class="CEO">
                    <img src="./../../img/Sergio.png" />
                    <p>SERGIO HERVAS ARAGON</p>
                </div>
                <div class="CEO">
                    <img src="./../../img/Alex.png" />
                    <p>SHI HAO ALEX ZHU LIN</p>
                </div>
                <div class="CEO">
                    <img src="./../../img/Carlos.png" />
                    <p>CARLOS DE LA CRUZ VINDEL</p>
                </div>
                <div class="CEO">
                    <img src="./../../img/Mario.png" />
                    <p>MARIO GONZALEZ SOLAS</p>
                </div>
            </div>
        </div>
    </PrivateLayout>
</template>

<style scoped>
h2 {
    font-size: 30px;
    margin: 2%;
}
.card {
    width: 80%;
    max-width: 4000px; /* Cambia el valor según tus necesidades */
    margin-left: auto;
    margin-right: auto;
}

.cartaImagenes {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.CEO {
    text-align: center;
    margin: 0 40px;
}

.CEO img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
}

.CEO p {
    margin-top: 10px;
    font-weight: bold;
}
</style>
