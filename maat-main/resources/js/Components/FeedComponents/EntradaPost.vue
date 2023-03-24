<script>
export default {
    name: 'EntradaPost',
}
</script>
<template>
    <article class="bg-white shadow-md rounded-lg border border-emerald-500 border-2 p-5">
        <!-- Breadcrumbs -->
        <div class="mb-2">
            <ul class="inline-flex flex-wrap text-sm font-medium">
                <li class="flex items-center">
                    <router-link class="text-slate-500 hover:text-emerald-500" to="/feed/index">Home</router-link>
                    <svg class="h-4 w-4 fill-current text-emerald-500 mx-2" viewBox="0 0 16 16">
                        <path d="M6.6 13.4L5.2 12l4-4-4-4 1.4-1.4L12 8z" />
                    </svg>
                </li>
                <li class="flex items-center">
                    <a class="text-slate-500 hover:text-emerald-500" href="#0">Post</a>
                </li>
            </ul>
        </div>
        <!-- Header -->
        <header class="pb-4">
            <!-- Title -->
            <div class="flex items-start space-x-3 mb-3">
                <h2 class="text-2xl text-slate-800 font-bold">Sed sollicitudin porta ex ut aliquam. Ut risus velit, varius in elit at, viverra mattis odio. Donec dignissim semper gravida. Donec tempus faucibus dictum? 🤔</h2>

            </div>
            <!-- Meta -->
            <div class="flex flex-wrap text-sm">
                <div
                    class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                    <a class="font-medium text-yellow-500 hover:text-yellow-600" href="#0">katemerlu</a>
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
                            <path
                                d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z" />
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
            </div>
        </header>
        <!-- Content -->
        <div class="space-y-4 mb-6">
            <p> Praesent scelerisque interdum auctor. Nullam at erat a nisl tempor pharetra vitae vel nunc. Ut vulputate felis ut placerat fermentum. Aenean sed eros congue, gravida tellus quis, dapibus massa?</p>
            <p>Praesent justo 🙌</p>
        </div>
        <!-- Comment form -->
        <div>
            <div class="flex items-start space-x-3 mb-3">
                <img class="rounded-full shrink-0" src="" width="40" height="40" alt="User (foto)" />
                <div class="grow">
                    <label for="comment" class="sr-only">Escribir un comentario…</label>
                    <textarea id="comment"
                        class="rounded-lg bg-emerald-50 placeholder-emerald-500 border border-0 form-textarea w-full focus:border-emerald-500 focus:ring-emerald-500 focus:bg-white"
                        rows="4" placeholder="Escribir un comentario…"></textarea>
                </div>
            </div>
            <div class="text-right">
                <button type="submit"
                    class="btn-sm outline  outline-2 outline-emerald-500 text-emerald-500 bg-emerald-100 hover:bg-emerald-500 hover:text-white whitespace-nowrap rounded-full p-1">Responder</button>
            </div>
        </div>
        <!-- Comments -->
        <div class="mt-4 ">
            <h3 class="font-semibold text-slate-800 mb-4 border-t-4 border-emerald-500">Comentarios</h3>
            <ul class="space-y-5">
                <!-- Comment -->
                <li class="relative pl-9 space-y-5">
                    <!-- Comment wrapper -->
                    <div class="flex items-start">
                        <!-- Comment upvote -->
                        <div class="absolute top-0 left-0">
                            <button
                                class="group text-xs font-semibold text-left w-6 rounded-sm flex flex-col justify-center items-center hover:text-emerald-500">
                                <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5 group-hover:fill-emerald-500"
                                    width="12" height="6" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m0 6 6-6 6 6z" />
                                </svg>
                                <div>44</div>
                            </button>
                        </div>
                        <!-- Comment content -->
                        <div>
                            <!-- Comment text -->
                            <div class="grow text-sm text-slate-800 space-y-2 mb-2">
                                <p>Aenean sed eros congue, gravida tellus quis, dapibus massa. Vivamus quis congue turpis, eu gravida est. Praesent justo augue, pellentesque vitae volutpat id, faucibus ut quam. Proin non eros nisl. Vestibulum tristique orci consequat cursus facilisis. Etiam finibus maximus leo, id commodo justo ultrices sit amet.</p>
                                <p> Nullam at dictum dui. Aliquam malesuada pharetra pulvinar. Nullam ultrices purus sit amet elementum porta. </p>
                            </div>
                            <!-- Comment footer -->
                            <div class="flex flex-wrap text-xs">
                                <div
                                    class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                                    <a class="block mr-2" href="#0">
                                        <img class="rounded-full" src="" width="24" height="24" alt="User (foto)" />
                                    </a>
                                    <a class="font-medium text-yellow-500 hover:text-yellow-600" href="#0">ekuplu89</a>
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
                                            <path
                                                d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z" />
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
                            </div>
                        </div>
                    </div>
                    <!-- Nested comments -->
                    <ul class="space-y-5">
                        <!-- Comment -->
                        <li class="relative pl-9 space-y-5">
                            <!-- Comment wrapper -->
                            <div class="flex items-start">
                                <!-- Comment upvote -->
                                <div class="absolute top-0 left-0">
                                    <button
                                        class=" group text-xs font-semibold text-left w-6 rounded-sm flex flex-col justify-center items-center hover:text-emerald-500">
                                        <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5 group-hover:fill-emerald-500"
                                            width="12" height="6" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m0 6 6-6 6 6z" />
                                        </svg>
                                        <div>2</div>
                                    </button>
                                </div>
                                <!-- Comment content -->
                                <div>
                                    <!-- Comment text -->
                                    <div class="grow text-sm text-slate-800 space-y-2 mb-2">
                                        <p>Lorem ipsum aemet, <a class="font-medium text-yellow-500 hover:text-yellow-600"
                                                href="#0">@ekuplu89</a> 👏</p>
                                    </div>
                                    <!-- Comment footer -->
                                    <div class="flex flex-wrap text-xs">
                                        <div
                                            class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                                            <a class="block mr-2" href="#0">
                                                <img class="rounded-full" src="" width="24" height="24" alt="User (foto)" />
                                            </a>
                                            <a class="font-medium text-yellow-500 hover:text-yellow-600"
                                                href="#0">ellielong</a>
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
                                                    <path
                                                        d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z" />
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
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Comment -->
                <li class="relative pl-9 space-y-5">
                    <!-- Comment wrapper -->
                    <div class="flex items-start">
                        <!-- Comment upvote -->
                        <div class="absolute top-0 left-0">
                            <button
                                class="group text-xs font-semibold text-left  w-6 rounded-sm flex flex-col justify-center items-center hover:text-emerald-500">
                                <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5 group-hover:fill-emerald-500"
                                    width="12" height="6" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m0 6 6-6 6 6z" />
                                </svg>
                                <div>27</div>
                            </button>
                        </div>
                        <!-- Comment content -->
                        <div>
                            <!-- Comment text -->
                            <div class="grow text-sm text-slate-800 space-y-2 mb-2">
                                <p>Proin pharetra ullamcorper fringilla. Aliquam sit amet nulla at massa pretium pharetra. Donec a ipsum nulla. Etiam vel fermentum felis, in vulputate purus. Donec elit lorem, interdum id malesuada nec, dignissim id est. </p>
                            </div>
                            <!-- Comment footer -->
                            <div class="flex flex-wrap text-xs">
                                <div
                                    class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                                    <a class="block mr-2" href="#0">
                                        <img class="rounded-full" src="" width="24" height="24" alt="User (foto)" />
                                    </a>
                                    <a class="font-medium text-yellow-500 hover:text-yellow-600" href="#0">markcuttik</a>
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
                                            <path
                                                d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z" />
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
                            </div>
                        </div>
                    </div>
                </li>
                <!-- Comment -->
                <li class="relative pl-9 space-y-5">
                    <!-- Comment wrapper -->
                    <div class="flex items-start">
                        <!-- Comment upvote -->
                        <div class="absolute top-0 left-0">
                            <button
                                class="group text-xs font-semibold text-left w-6 rounded-sm flex flex-col justify-center items-center hover:text-emerald-500">
                                <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5 group-hover:fill-emerald-500"
                                    width="12" height="6" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m0 6 6-6 6 6z" />
                                </svg>
                                <div>24</div>
                            </button>
                        </div>
                        <!-- Comment content -->
                        <div>
                            <!-- Comment text -->
                            <div class="grow text-sm text-slate-800 space-y-2 mb-2">
                                <p> Nullam lacus arcu, tincidunt ut pulvinar vel, porttitor vitae diam. Nullam ultrices sapien at ante pellentesque sollicitudin. Donec vitae ex fringilla, efficitur justo vitae, fermentum felis. Fusce vitae ipsum ligula. Nullam at dictum dui. Aliquam malesuada pharetra pulvinar. Nullam ultrices purus sit amet elementum porta. </p>
                            </div>
                            <!-- Comment footer -->
                            <div class="flex flex-wrap text-xs">
                                <div
                                    class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                                    <a class="block mr-2" href="#0">
                                        <img class="rounded-full" src="" width="24" height="24" alt="User (foto)" />
                                    </a>
                                    <a class="font-medium text-yellow-500 hover:text-yellow-600" href="#0">davidp1</a>
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
                                            <path
                                                d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z" />
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
                            </div>
                        </div>
                    </div>
                    <!-- Nested comments -->
                    <ul class="space-y-5">
                        <!-- Comment -->
                        <li class="relative pl-9 space-y-5">
                            <!-- Comment wrapper -->
                            <div class="flex items-start">
                                <!-- Comment upvote -->
                                <div class="absolute top-0 left-0">
                                    <button
                                        class="group text-xs font-semibold text-left w-6 rounded-sm flex flex-col justify-center items-center hover:text-emerald-500">
                                        <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5 group-hover:fill-emerald-500"
                                            width="12" height="6" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m0 6 6-6 6 6z" />
                                        </svg>
                                        <div>2</div>
                                    </button>
                                </div>
                                <!-- Comment content -->
                                <div>
                                    <!-- Comment text -->
                                    <div class="grow text-sm text-slate-800 space-y-2 mb-2">
                                        <p>Aenean luctus in metus in elementum. Nam eu laoreet velit, ut luctus leo.
                                        </p>
                                    </div>
                                    <!-- Comment footer -->
                                    <div class="flex flex-wrap text-xs">
                                        <div
                                            class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                                            <a class="block mr-2" href="#0">
                                                <img class="rounded-full" src="" width="24" height="24" alt="User (foto)" />
                                            </a>
                                            <a class="font-medium text-yellow-500 hover:text-yellow-600"
                                                href="#0">ellielong</a>
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
                                                    <path
                                                        d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z" />
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
                                    </div>
                                </div>
                            </div>
                            <!-- Nested comments -->
                            <ul class="space-y-5">
                                <!-- Comment -->
                                <li class="relative pl-9 space-y-5">
                                    <!-- Comment wrapper -->
                                    <div class="flex items-start">
                                        <!-- Comment upvote -->
                                        <div class="absolute top-0 left-0">
                                            <button
                                                class="group text-xs font-semibold text-left w-6 rounded-sm flex flex-col justify-center items-center hover:text-emerald-500">
                                                <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5 group-hover:fill-emerald-500"
                                                    width="12" height="6" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="m0 6 6-6 6 6z" />
                                                </svg>
                                                <div>1</div>
                                            </button>
                                        </div>
                                        <!-- Comment content -->
                                        <div>
                                            <!-- Comment text -->
                                            <div class="grow text-sm text-slate-800 space-y-2 mb-2">
                                                <p> In facilisis neque ligula! 👊</p>
                                            </div>
                                            <!-- Comment footer -->
                                            <div class="flex flex-wrap text-xs">
                                                <div
                                                    class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                                                    <a class="block mr-2" href="#0">
                                                        <img class="rounded-full" src="" width="24" height="24"
                                                            alt="User (foto)" />
                                                    </a>
                                                    <a class="font-medium text-yellow-500 hover:text-yellow-600"
                                                        href="#0">davidp1</a>
                                                </div>
                                                <!-- Footer -->
                                                <footer class="flex items-center space-x-4">
                                                    <!-- Like button -->
                                                    <button class="flex items-center text-slate-400 hover:text-red-600">
                                                        <svg class="w-4 h-4 shrink-0 fill-current mr-1.5"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M14.682 2.318A4.485 4.485 0 0011.5 1 4.377 4.377 0 008 2.707 4.383 4.383 0 004.5 1a4.5 4.5 0 00-3.182 7.682L8 15l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L8 12.247l-5.285-5A2.5 2.5 0 014.5 3c1.437 0 2.312.681 3.5 2.625C9.187 3.681 10.062 3 11.5 3a2.5 2.5 0 011.785 4.251h-.003z" />
                                                        </svg>
                                                        <div class="text-sm text-slate-500">411</div>
                                                    </button>
                                                    <!-- Share button -->
                                                    <button class="flex items-center text-slate-400 hover:text-emerald-500">
                                                        <svg class="w-4 h-4 shrink-0 fill-current mr-1.5"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z" />
                                                        </svg>
                                                        <div class="text-sm text-slate-500">44</div>
                                                    </button>
                                                    <!-- Replies button -->
                                                    <button class="flex items-center text-slate-400 hover:text-amber-500">
                                                        <svg class="w-4 h-4 shrink-0 fill-current mr-1.5"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                                                        </svg>
                                                        <div class="text-sm text-slate-500">62</div>
                                                    </button>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- Comment -->
                <li class="relative pl-9 space-y-5">
                    <!-- Comment wrapper -->
                    <div class="flex items-start">
                        <!-- Comment upvote -->
                        <div class="absolute top-0 left-0">
                            <button
                                class="group text-xs font-semibold text-left w-6 rounded-sm flex flex-col justify-center items-center hover:text-emerald-500">
                                <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5 group-hover:fill-emerald-500"
                                    width="12" height="6" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m0 6 6-6 6 6z" />
                                </svg>
                                <div>19</div>
                            </button>
                        </div>
                        <!-- Comment content -->
                        <div>
                            <!-- Comment text -->
                            <div class="grow text-sm text-slate-800 space-y-2 mb-2">
                                <p>Sed lorem lorem, bibendum vel erat at, aliquam molestie metus. Morbi luctus diam pharetra dolor finibus posuere. </p>
                            </div>
                            <!-- Comment footer -->
                            <div class="flex flex-wrap text-xs">
                                <div
                                    class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
                                    <a class="block mr-2" href="#0">
                                        <img class="rounded-full" src="" width="24" height="24" alt="User (foto)" />
                                    </a>
                                    <a class="font-medium text-yellow-500 hover:text-yellow-600" href="#0">patrick2</a>
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
                                            <path
                                                d="M13 7h2v6a1 1 0 0 1-1 1H4v2l-4-3 4-3v2h9V7ZM3 9H1V3a1 1 0 0 1 1-1h10V0l4 3-4 3V4H3v5Z" />
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
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- View more link -->
            <div class="text-center mt-5">
                <button class="text-sm font-medium text-emerald-500 hover:text-emerald-600">Ver más comentarios</button>
            </div>
        </div>
    </article>
</template>

