<script>
import EditMenu from '../mosaic/components/DropdownEditMenu.vue'

export default {
    name: 'FeedPost',
    components: {
        EditMenu,
    },
}
</script>

<template>
    <!-- Post 1 -->
    <div class="bg-white shadow-md rounded-lg border border-emerald-500 border-2 p-5">
        <!-- Header -->
        <header class="flex justify-between items-start space-x-3 mb-3">
            <!-- User -->
            <div class="flex items-start space-x-3">
                <img class="rounded-full shrink-0" src="" width="40" height="40" alt="User (foto)" />
                <div>
                    <div class="leading-tight">
                        <a class="text-sm font-semibold text-slate-800" href="#0">N’Golo Kanté</a>
                    </div>
                    <div class="text-xs text-emerald-500">Ayer a las 10:48 AM</div>
                </div>
            </div>
            <!-- Menu button -->
            <div class="relative">
                <EditMenu align="right" class="absolute top-0 right-0 inline-flex">
                    <li>
                        <router-link class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3"
                            to="#0">Option 1</router-link>
                    </li>
                    <li>
                        <router-link class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3"
                            to="#0">Option 2</router-link>
                    </li>
                    <li>
                        <router-link class="font-medium text-sm text-rose-500 hover:text-rose-600 flex py-1 px-3"
                            to="#0">Remove</router-link>
                    </li>
                </EditMenu>
            </div>
        </header>
        <!-- Body -->
        <div class="text-sm text-slate-800 space-y-2 mb-5">
            <p>👋</p>
            <p>Vestibulum commodo dui sagittis, gravida leo eget, molestie eros. Duis laoreet orci vitae lacus facilisis,
                sit amet malesuada nibh cursus. Aliquam dapibus elit vel leo ornare, non faucibus ligula volutpat. Duis
                auctor urna nec sollicitudin pulvinar. Maecenas quis augue nec odio tempor tristique. Aliquam erat volutpat.
            </p>
            <p>Hilo 👇</p>
        </div>
        <!-- Footer -->
        <footer class="flex items-center space-x-4">
            <!-- Like button -->
            <button class="flex items-center text-slate-400 hover:text-red-600">
                <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                    <path
                        d="M14.682 2.318A4.485 4.485 0 0011.5 1 4.377 4.377 0 008 2.707 4.383 4.383 0 004.5 1a4.5 4.5 0 00-3.182 7.682L8 15l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L8 12.247l-5.285-5A2.5 2.5 0 014.5 3c1.437 0 2.312.681 3.5 2.625C9.187 3.681 10.062 3 11.5 3a2.5 2.5 0 011.785 4.251h-.003z" />
                </svg>
                <div class="text-sm text-slate-500">411</div>
            </button>
            <!-- Share button -->
            <button class="flex items-center text-slate-400 hover:text-emerald-500">
                <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                    <path d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z" />
                </svg>
                <div class="text-sm text-slate-500">44</div>
            </button>
            <!-- Replies button -->
            <button class="flex items-center text-slate-400 hover:text-amber-500">
                <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                    <path
                        d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                </svg>
                <div class="text-sm text-slate-500">62</div>
            </button>
        </footer>
        <!-- Comments -->
        <div class="mt-5 pt-3 border-t border-emerald-600">
            <ul class="space-y-2 mb-3">
                <!-- Comment -->
                <li class="p-3 bg-emerald-50 rounded-lg">
                    <div class="flex items-start space-x-3">
                        <img class="rounded-full shrink-0" src="" width="32" height="32" alt="User (foto)" />
                        <div>
                            <div class="text-xs text-slate-500">
                                <a class="font-semibold text-slate-800" href="#0">Myke Towers</a> · 44min
                            </div>
                            <div class="text-sm"><a class="font-medium text-yellow-500 hover:text-yellow-600"
                                    href="#0">@Eladio Carrion</a> Ut est quam, fringilla a ligula sed, suscipit posuere
                                enim. Praesent a aliquet diam, a mattis lorem. </div>
                        </div>
                    </div>
                </li>
                <!-- Comment -->
                <li class="p-3 bg-emerald-50 rounded-lg">
                    <div class="flex items-start space-x-3">
                        <img class="rounded-full shrink-0" src="" width="32" height="32" alt="User (foto)" />
                        <div>
                            <div class="text-xs text-slate-500">
                                <a class="font-semibold text-slate-800" href="#0">Brrruno</a> · 1h
                            </div>
                            <div class="text-sm"> Morbi interdum, erat et aliquet facilisis, augue sapien dignissim ante,
                                mollis accumsan neque neque quis massa.</div>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Comments footer -->
            <div class="flex justify-between space-x-2">
                <div class="text-sm text-slate-500"><span class="font-medium text-slate-600">2</span> de <span
                        class="font-medium text-slate-600">67</span> comentarios</div>
                <button class="text-sm  font-medium text-emerald-500 hover:text-emerald-600">Ver más</button>
            </div>
            <!-- Comment form -->
            <div class="flex items-center space-x-3 mt-3">
                <img class="rounded-full shrink-0" src="" width="32" height="32" alt="User (foto)" />
                <div class="grow">
                    <label for="comment-form" class="sr-only">Escribir un comentario...</label>
                    <input id="comment-form"
                        class="rounded-lg form-input w-full bg-emerald-50 border-transparent focus:bg-white focus:border-slate-300 placeholder-emerald-500  active:border-emerald-500 focus:ring-emerald-500"
                        type="text" placeholder="Escribir un comentario…">
                </div>
            </div>
        </div>
    </div>

    <!-- Post 2 -->
    <div class="bg-white shadow-md rounded-lg border border-emerald-500 border-2 p-5">
        <!-- Header -->
        <header class="flex justify-between items-start space-x-3 mb-3">
            <!-- User -->
            <div class="flex items-start space-x-3">
                <img class="rounded-full shrink-0" src="" width="40" height="40" alt="User (foto)" />
                <div>
                    <div class="leading-tight">
                        <a class="text-sm font-semibold text-slate-800" href="#0">Saheed Adebayo Akinfenwa</a>
                    </div>
                    <div class="inline-flex items-center">
                        <svg class="w-3 h-3 shrink-0 fill-yellow-500 mr-1" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.953 4.29a.5.5 0 0 0-.454-.29H6.14L6.984.62A.5.5 0 0 0 6.12.174l-6 7A.5.5 0 0 0 .499 8h5.359l-.844 3.38a.5.5 0 0 0 .864.445l6-7a.5.5 0 0 0 .075-.534Z" />
                        </svg>
                        <div class="text-xs text-slate-500">Sponsor (ONG)</div>
                    </div>
                </div>
            </div>
            <!-- Menu button -->
            <div class="relative">
                <EditMenu align="right" class="absolute top-0 right-0 inline-flex">
                    <li>
                        <router-link class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3"
                            to="#0">Option 1</router-link>
                    </li>
                    <li>
                        <router-link class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3"
                            to="#0">Option 2</router-link>
                    </li>
                    <li>
                        <router-link class="font-medium text-sm text-rose-500 hover:text-rose-600 flex py-1 px-3"
                            to="#0">Remove</router-link>
                    </li>
                </EditMenu>
            </div>
        </header>
        <!-- Body -->
        <div class="text-sm text-slate-800 space-y-2 mb-5">
            <p>Juntos por un futuro mejor 🌿</p>
            <div class="relative !my-4">
                <img class="block w-75" src="https://cdn-icons-png.flaticon.com/512/490/490091.png" width="590" height="332"
                    alt="Feed 01" />
                <div class="absolute left-0 right-0 bottom-0 p-4 bg-black bg-opacity-25 backdrop-blur-md">
                    <div class="flex items-center justify-between">
                        <div class="text-xs font-medium text-slate-300">togethernature.com</div>
                        <a class="text-xs font-medium text-indigo-400 hover:text-indigo-300" href="#0">Learn More -&gt;</a>
                    </div>
                </div>
            </div>
        </div>
        <footer class="flex items-center space-x-4">
            <!-- Like button -->
            <button class="flex items-center text-slate-400 hover:text-red-600">
                <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                    <path
                        d="M14.682 2.318A4.485 4.485 0 0011.5 1 4.377 4.377 0 008 2.707 4.383 4.383 0 004.5 1a4.5 4.5 0 00-3.182 7.682L8 15l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L8 12.247l-5.285-5A2.5 2.5 0 014.5 3c1.437 0 2.312.681 3.5 2.625C9.187 3.681 10.062 3 11.5 3a2.5 2.5 0 011.785 4.251h-.003z" />
                </svg>
                <div class="text-sm text-slate-500">4.8k</div>
            </button>
            <!-- Share button -->
            <button class="flex items-center text-slate-400 hover:text-emerald-500">
                <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                    <path d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z" />
                </svg>
                <div class="text-sm text-slate-500">1.2k</div>
            </button>
            <!-- Replies button -->
            <button class="flex items-center text-slate-400 hover:text-amber-500">
                <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                    <path
                        d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                </svg>
                <div class="text-sm text-slate-500">881</div>
            </button>
        </footer>
        <!-- Comments -->
        <div class="mt-5 pt-3 border-t border-emerald-600">
            <ul class="space-y-2 mb-3">
                <!-- Comment -->
                <li class="p-3 bg-emerald-50 rounded-lg">
                    <div class="flex items-start space-x-3">
                        <img class="rounded-full shrink-0" src="" width="32" height="32" alt="User (foto)" />
                        <div>
                            <div class="text-xs text-slate-500">
                                <a class="font-semibold text-slate-800" href="#0">Manuel Alonso</a> · 44min
                            </div>
                            <div class="text-sm"><a class="font-medium text-yellow-500 hover:text-yellow-600"
                                    href="#0">@Carlos Rufiangel</a> Ut est quam, fringilla a ligula sed, suscipit posuere
                                enim. Praesent a aliquet diam, a mattis lorem. </div>
                        </div>
                    </div>
                </li>
                <!-- Comment -->
                <li class="p-3 bg-emerald-50 rounded-lg">
                    <div class="flex items-start space-x-3">
                        <img class="rounded-full shrink-0" src="" width="32" height="32" alt="User (foto)" />
                        <div>
                            <div class="text-xs text-slate-500">
                                <a class="font-semibold text-slate-800" href="#0">Esteban Velazquez</a> · 1h
                            </div>
                            <div class="text-sm"> Morbi interdum, erat et aliquet facilisis, augue sapien dignissim ante,
                                mollis accumsan neque neque quis massa.</div>
                        </div>
                    </div>
                </li>

                <!-- Comment -->
                <li class="p-3 bg-emerald-50 rounded-lg">
                    <div class="flex items-start space-x-3">
                        <img class="rounded-full shrink-0" src="" width="32" height="32" alt="User (foto)" />
                        <div>
                            <div class="text-xs text-slate-500">
                                <a class="font-semibold text-slate-800" href="#0">Elias Benitez</a> · 4h
                            </div>
                            <div class="text-sm"> Pellentesque a condimentum velit, eu ultrices mauris. Cras quis dui id
                                magna lacinia condimentum. Donec commodo volutpat elit quis elementum. </div>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Comments footer -->
            <div class="flex justify-between space-x-2">
                <div class="text-sm text-slate-500"><span class="font-medium text-slate-600">3</span> de <span
                        class="font-medium text-slate-600">881</span> comentarios</div>
                <button class="text-sm  font-medium text-emerald-500 hover:text-emerald-600">Ver más</button>
            </div>
            <!-- Comment form -->
            <div class="flex items-center space-x-3 mt-3">
                <img class="rounded-full shrink-0" src="" width="32" height="32" alt="User (foto)" />
                <div class="grow">
                    <label for="comment-form" class="sr-only">Escribir un comentario...</label>
                    <input id="comment-form"
                        class="rounded-lg form-input w-full bg-emerald-50 border-transparent focus:bg-white focus:border-slate-300 placeholder-emerald-500  active:border-emerald-500 focus:ring-emerald-500"
                        type="text" placeholder="Escribir un comentario…">
                </div>
            </div>
        </div>
    </div>

     <!-- Post 3 -->
     <div class="bg-white shadow-md rounded-lg border border-emerald-500 border-2 p-5">
        <!-- Header -->
        <header class="flex justify-between items-start space-x-3 mb-3">
            <!-- User -->
            <div class="flex items-start space-x-3">
                <img class="rounded-full shrink-0" src="" width="40" height="40" alt="User (foto)" />
                <div>
                    <div class="leading-tight">
                        <a class="text-sm font-semibold text-slate-800" href="#0">Georges-Kévin Nkoudou Mbida</a>
                    </div>
                    <div class="text-xs text-emerald-500">Anteayer a las 17:23 PM</div>
                </div>
            </div>
            <!-- Menu button -->
            <div class="relative">
                <EditMenu align="right" class="absolute top-0 right-0 inline-flex">
                    <li>
                        <router-link class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3"
                            to="#0">Option 1</router-link>
                    </li>
                    <li>
                        <router-link class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3"
                            to="#0">Option 2</router-link>
                    </li>
                    <li>
                        <router-link class="font-medium text-sm text-rose-500 hover:text-rose-600 flex py-1 px-3"
                            to="#0">Remove</router-link>
                    </li>
                </EditMenu>
            </div>
        </header>
        <!-- Body -->
        <div class="text-sm text-slate-800 space-y-2 mb-5">

            <p>Sed sollicitudin porta ex ut aliquam. Ut risus velit, varius in elit at, viverra mattis odio. Donec dignissim semper gravida. Donec tempus faucibus dictum. Praesent scelerisque interdum auctor. Nullam at erat a nisl tempor pharetra vitae vel nunc. Ut vulputate felis ut placerat fermentum. Aenean sed eros congue, gravida tellus quis, dapibus massa. Vivamus quis congue turpis, eu gravida est. Praesent justo augue, pellentesque vitae volutpat id, faucibus ut quam. Proin non eros nisl. Vestibulum tristique orci consequat cursus facilisis. Etiam finibus maximus leo, id commodo justo ultrices sit amet. Duis in ipsum varius, euismod dolor et, gravida ex.
            </p>
            <p>Hilo 👇</p>
        </div>
        <!-- Footer -->
        <footer class="flex items-center space-x-4">
            <!-- Like button -->
            <button class="flex items-center text-slate-400 hover:text-red-600">
                <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                    <path
                        d="M14.682 2.318A4.485 4.485 0 0011.5 1 4.377 4.377 0 008 2.707 4.383 4.383 0 004.5 1a4.5 4.5 0 00-3.182 7.682L8 15l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L8 12.247l-5.285-5A2.5 2.5 0 014.5 3c1.437 0 2.312.681 3.5 2.625C9.187 3.681 10.062 3 11.5 3a2.5 2.5 0 011.785 4.251h-.003z" />
                </svg>
                <div class="text-sm text-slate-500">3.8M</div>
            </button>
            <!-- Share button -->
            <button class="flex items-center text-slate-400 hover:text-emerald-500">
                <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                    <path d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z" />
                </svg>
                <div class="text-sm text-slate-500">1M</div>
            </button>
            <!-- Replies button -->
            <button class="flex items-center text-slate-400 hover:text-amber-500">
                <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                    <path
                        d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                </svg>
                <div class="text-sm text-slate-500">772,4k</div>
            </button>
        </footer>
        <!-- Comments -->
        <div class="mt-5 pt-3 border-t border-emerald-600">
            <ul class="space-y-2 mb-3">
                <!-- Comment -->
                <li class="p-3 bg-emerald-50 rounded-lg">
                    <div class="flex items-start space-x-3">
                        <img class="rounded-full shrink-0" src="" width="32" height="32" alt="User (foto)" />
                        <div>
                            <div class="text-xs text-slate-500">
                                <a class="font-semibold text-slate-800" href="#0">Jamal Musiala</a> · 2d
                            </div>
                            <div class="text-sm"><a class="font-medium text-yellow-500 hover:text-yellow-600"
                                    href="#0">@Jude Bellingham</a> Ut est quam, fringilla a ligula sed, suscipit posuere
                                enim. Praesent a aliquet diam, a mattis lorem. </div>
                        </div>
                    </div>
                </li>
                <!-- Comment -->
                <li class="p-3 bg-emerald-50 rounded-lg">
                    <div class="flex items-start space-x-3">
                        <img class="rounded-full shrink-0" src="" width="32" height="32" alt="User (foto)" />
                        <div>
                            <div class="text-xs text-slate-500">
                                <a class="font-semibold text-slate-800" href="#0">Jean-Eric Maxim Choupo-Moting</a> · 5d
                            </div>
                            <div class="text-sm"> Morbi interdum, erat et aliquet facilisis, augue sapien dignissim ante,
                                mollis accumsan neque neque quis massa.</div>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Comments footer -->
            <div class="flex justify-between space-x-2">
                <div class="text-sm text-slate-500"><span class="font-medium text-slate-600">2</span> de <span
                        class="font-medium text-slate-600">772.4k</span> comentarios</div>
                <button class="text-sm  font-medium text-emerald-500 hover:text-emerald-600">Ver más</button>
            </div>
            <!-- Comment form -->
            <div class="flex items-center space-x-3 mt-3">
                <img class="rounded-full shrink-0" src="" width="32" height="32" alt="User (foto)" />
                <div class="grow">
                    <label for="comment-form" class="sr-only">Escribir un comentario...</label>
                    <input id="comment-form"
                        class="rounded-lg form-input w-full bg-emerald-50 border-transparent focus:bg-white focus:border-slate-300 placeholder-emerald-500  active:border-emerald-500 focus:ring-emerald-500"
                        type="text" placeholder="Escribir un comentario…">
                </div>
            </div>
        </div>
    </div>
</template>


