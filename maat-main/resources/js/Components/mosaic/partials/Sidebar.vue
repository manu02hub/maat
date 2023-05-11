<template>
<<<<<<< HEAD
    <div>
        <!-- Sidebar backdrop (mobile only) -->
        <div
            class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
            :class="
                sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'
            "
            aria-hidden="true"
        ></div>
=======
<<<<<<< HEAD
  <div>
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true"></div>
>>>>>>> carlos

        <!-- Sidebar -->
        <div
            id="sidebar"
            ref="sidebar"
            class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'"
        >
            <!-- Sidebar header -->
            <div class="flex justify-between mb-10 pr-3 sm:px-2">
                <!-- Close button -->
                <button
                    ref="trigger"
                    class="lg:hidden text-slate-500 hover:text-slate-400"
                    @click.stop="$emit('close-sidebar')"
                    aria-controls="sidebar"
                    :aria-expanded="sidebarOpen"
                >
                    <span class="sr-only">Close sidebar</span>
                    <svg
                        class="w-6 h-6 fill-current"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"
                        />
                    </svg>
                </button>
                <!-- Logo -->
                <!--<router-link class="block" to="/">-->
                <svg width="32" height="32" viewBox="0 0 32 32">
                    <defs>
                        <linearGradient
                            x1="28.538%"
                            y1="20.229%"
                            x2="100%"
                            y2="108.156%"
                            id="logo-a"
                        >
                            <stop
                                stop-color="#A5B4FC"
                                stop-opacity="0"
                                offset="0%"
                            />
                            <stop stop-color="#A5B4FC" offset="100%" />
                        </linearGradient>
                        <linearGradient
                            x1="88.638%"
                            y1="29.267%"
                            x2="22.42%"
                            y2="100%"
                            id="logo-b"
                        >
                            <stop
                                stop-color="#38BDF8"
                                stop-opacity="0"
                                offset="0%"
                            />
                            <stop stop-color="#38BDF8" offset="100%" />
                        </linearGradient>
                    </defs>
                    <rect fill="#6366F1" width="32" height="32" rx="16" />
                    <path
                        d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z"
                        fill="#4F46E5"
                    />
                    <path
                        d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z"
                        fill="url(#logo-a)"
                    />
                    <path
                        d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z"
                        fill="url(#logo-b)"
                    />
                </svg>
                <!--</router-link>-->
            </div>

            <!--CARLOS-->

            <SidebarLinkGroup v-slot="parentLink" :active="route().current('dashboard')">

<a class="block text-slate-200 truncate transition duration-150" href="#0"
    @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
    <div class="flex">
        <div class="flex items-center justify-between">
            <div class="items-center">
                <svg class="shrink-0 h-0 w-6" viewBox="0 0 24 24">
                    <!--<path class="fill-current" :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) ? 'text-indigo-500' : 'text-slate-400'" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />-->
                    <!--<path class="fill-current" :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) ? 'text-indigo-600' : 'text-slate-600'" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />-->
                    <!--<path class="fill-current" :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) ? 'text-indigo-200' : 'text-slate-400'" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z" />-->
                </svg>
                <div class="flex items-center">
                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                        <path class="fill-current"
                            :class="isExactActive ? 'text-indigo-500' : 'text-slate-600'"
                            d="M1 3h22v20H1z" />
                        <path class="fill-current"
                            :class="isExactActive ? 'text-indigo-300' : 'text-slate-400'"
                            d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                    </svg>
                    <span
                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                        CARLOS</span>
                </div>
            </div>
<<<<<<< HEAD
            <!-- Icon -->
            <div class="flex shrink-0 ml-2">
                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                    :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                </svg>
            </div>
        </div>
    </div>
</a>
<div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
    <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
        <!--<router-link to="/" custom v-slot="{ href, navigate, isExactActive }">-->
        <li class="mb-1 last:mb-0">

            <a class="block transition duration-150 truncate"
                :class="isExactActive ? 'text-indigo-500' : 'text-slate-400 hover:text-slate-200'"
                :href="href" @click="navigate">
                <NavLink :href="route('perfil-empresa')"><span
                        class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                        Perfil ONG</span></NavLink>
            </a>



        </li>
    </ul>
</div>
</SidebarLinkGroup>
=======
              </a>
              <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                  <!--<router-link to="/" custom v-slot="{ href, navigate, isExactActive }">-->
                    <li class="mb-1 last:mb-0">

                    <a class="block transition duration-150 truncate" :class="isExactActive ? 'text-indigo-500' : 'text-slate-400 hover:text-slate-200'" :href="href" @click="navigate">
                            <NavLink :href="route('dashboard')"><span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Opcion 1</span></NavLink>
                        </a>



                    </li>
                  <!--</router-link>-->
                  <!--<router-link to="/dashboard/analytics" custom v-slot="{ href, navigate, isExactActive }">-->
                    <li class="mb-1 last:mb-0">

                        <a class="block transition duration-150 truncate" :class="isExactActive ? 'text-indigo-500' : 'text-slate-400 hover:text-slate-200'" :href="href" @click="navigate">
                            <NavLink :href="route('events')"><span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Opcion 2</span></NavLink>
                        </a>

                    </li>
                  <!--</router-link>-->
                  <!--<router-link to="/dashboard/fintech" custom v-slot="{ href, navigate, isExactActive }">-->
                    <li class="mb-1 last:mb-0">

                        <a class="block transition duration-150 truncate" :class="isExactActive ? 'text-indigo-500' : 'text-slate-400 hover:text-slate-200'" :href="href" @click="navigate">
                            <NavLink :href="route('events')"><span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Opcion 3</span></NavLink>
                        </a>

                    </li>
                  <!--</router-link>-->
                </ul>
              </div>
            </SidebarLinkGroup>

            <!-- Calendar -->

                <NavLink :href="route('events')">
                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive ? 'hover:text-slate-200' : 'hover:text-white'" :href="href" @click="navigate">
                  <div class="flex items-center">
                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                      <path class="fill-current" :class="isExactActive ? 'text-indigo-500' : 'text-slate-600'" d="M1 3h22v20H1z" />
                      <path class="fill-current" :class="isExactActive ? 'text-indigo-300' : 'text-slate-400'" d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                    </svg>
                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Opcion</span>
                  </div>
                </a>
              </li>
            </NavLink>

            <!-- PerfilEmpresa -->
                <br>
                <NavLink :href="route('perfil-empresa')">
                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive ? 'hover:text-slate-200' : 'hover:text-white'" :href="href" @click="navigate">
                  <div class="flex items-center">
                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                      <path class="fill-current" :class="isExactActive ? 'text-indigo-500' : 'text-slate-600'" d="M1 3h22v20H1z" />
                      <path class="fill-current" :class="isExactActive ? 'text-indigo-300' : 'text-slate-400'" d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                    </svg>
                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Perfil Empresa</span>
                  </div>
                </a>
              </li>
            </NavLink>

            <!-- EditEmpresa -->
            <br>
                <NavLink :href="route('edit-empresa')">
                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive ? 'hover:text-slate-200' : 'hover:text-white'" :href="href" @click="navigate">
                  <div class="flex items-center">
                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                      <path class="fill-current" :class="isExactActive ? 'text-indigo-500' : 'text-slate-600'" d="M1 3h22v20H1z" />
                      <path class="fill-current" :class="isExactActive ? 'text-indigo-300' : 'text-slate-400'" d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                    </svg>
                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Editar Empresa</span>
                  </div>
                </a>
              </li>
            </NavLink>
=======
    <div>
        <!-- Sidebar backdrop (mobile only) -->
        <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
            :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'
                " aria-hidden="true"></div>

        <!-- Sidebar -->
        <div id="sidebar" ref="sidebar"
            class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'">
            <!-- Sidebar header -->
            <div class="flex justify-between mb-10 pr-3 sm:px-2">
                <!-- Close button -->
                <button ref="trigger" class="lg:hidden text-slate-500 hover:text-slate-400"
                    @click.stop="$emit('close-sidebar')" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                    </svg>
                </button>
                <!-- Logo -->
                <!--<router-link class="block" to="/">-->
                <svg width="32" height="32" viewBox="0 0 32 32">
                    <defs>
                        <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                            <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%" />
                            <stop stop-color="#A5B4FC" offset="100%" />
                        </linearGradient>
                        <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                            <stop stop-color="#38BDF8" stop-opacity="0" offset="0%" />
                            <stop stop-color="#38BDF8" offset="100%" />
                        </linearGradient>
                    </defs>
                    <rect fill="#6366F1" width="32" height="32" rx="16" />
                    <path
                        d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z"
                        fill="#4F46E5" />
                    <path
                        d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z"
                        fill="url(#logo-a)" />
                    <path
                        d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z"
                        fill="url(#logo-b)" />
                </svg>
                <!--</router-link>-->
            </div>
>>>>>>> carlos

            <!-- Links -->
            <div class="space-y-8">
                <!-- Pages group -->
                <div>
<<<<<<< HEAD
                    <h3
                        class="text-xs uppercase text-slate-500 font-semibold pl-3"
                    >
                        <span
                            class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                            aria-hidden="true"
                            >•••</span
                        >
                        <span
                            class="lg:hidden lg:sidebar-expanded:block 2xl:block"
                            >Pages</span
                        >
                    </h3>
                    <ul class="mt-3">
                        <!-- ALEX -->
                        <SidebarLinkGroup
                            v-slot="parentLink"
                            :active="route().current('dashboard')"
                        >
                            <a
                                class="block text-slate-200 truncate transition duration-150"
                                href="#0"
                                @click.prevent="
                                    sidebarExpanded
                                        ? parentLink.handleClick()
                                        : (sidebarExpanded = true)
                                "
                            >
                                <div class="flex">
                                    <div
                                        class="flex items-center justify-between"
                                    >
                                        <div class="items-center">
                                            <svg
                                                class="shrink-0 h-0 w-6"
                                                viewBox="0 0 24 24"
                                            >
=======
                    <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                        <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                            aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pages</span>
                    </h3>
                    <ul class="mt-3">
                        <!-- ALEX -->
                        <SidebarLinkGroup v-slot="parentLink" :active="route().current('dashboard')">
                            <a class="block text-slate-200 truncate transition duration-150" href="#0" @click.prevent="sidebarExpanded
                                    ? parentLink.handleClick()
                                    : (sidebarExpanded = true)
                                ">
                                <div class="flex">
                                    <div class="flex items-center justify-between">
                                        <div class="items-center">
                                            <svg class="shrink-0 h-0 w-6" viewBox="0 0 24 24">
>>>>>>> carlos
                                                <!--<path class="fill-current" :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) ? 'text-indigo-500' : 'text-slate-400'" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />-->
                                                <!--<path class="fill-current" :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) ? 'text-indigo-600' : 'text-slate-600'" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />-->
                                                <!--<path class="fill-current" :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) ? 'text-indigo-200' : 'text-slate-400'" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z" />-->
                                            </svg>
                                            <div class="flex items-center">
<<<<<<< HEAD
                                                <svg
                                                    class="shrink-0 h-6 w-6"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        class="fill-current"
                                                        :class="
                                                            isExactActive
                                                                ? 'text-indigo-500'
                                                                : 'text-slate-600'
                                                        "
                                                        d="M1 3h22v20H1z"
                                                    />
                                                    <path
                                                        class="fill-current"
                                                        :class="
                                                            isExactActive
                                                                ? 'text-indigo-300'
                                                                : 'text-slate-400'
                                                        "
                                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"
                                                    />
                                                </svg>
                                                <span
                                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                                >
                                                    ALEX</span
                                                >
=======
                                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                    <path class="fill-current" :class="isExactActive
                                                            ? 'text-indigo-500'
                                                            : 'text-slate-600'
                                                        " d="M1 3h22v20H1z" />
                                                    <path class="fill-current" :class="isExactActive
                                                            ? 'text-indigo-300'
                                                            : 'text-slate-400'
                                                        " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                                </svg>
                                                <span
                                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    ALEX</span>
>>>>>>> carlos
                                            </div>
                                        </div>
                                        <!-- Icon -->
                                        <div class="flex shrink-0 ml-2">
<<<<<<< HEAD
                                            <svg
                                                class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                                :class="
                                                    parentLink.expanded &&
                                                    'rotate-180'
                                                "
                                                viewBox="0 0 12 12"
                                            >
                                                <path
                                                    d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"
                                                />
=======
                                            <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" :class="parentLink.expanded &&
                                                'rotate-180'
                                                " viewBox="0 0 12 12">
                                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
>>>>>>> carlos
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
<<<<<<< HEAD
                            <div
                                class="lg:hidden lg:sidebar-expanded:block 2xl:block"
                            >
                                <ul
                                    class="pl-9 mt-1"
                                    :class="!parentLink.expanded && 'hidden'"
                                >
                                    <!--<router-link to="/" custom v-slot="{ href, navigate, isExactActive }">-->
                                    <li class="mb-1 last:mb-0">
                                        <a
                                            class="block transition duration-150 truncate"
                                            :class="
                                                isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-400 hover:text-slate-200'
                                            "
                                            :href="href"
                                            @click="navigate"
                                        >
                                            <NavLink :href="route('chat')"
                                                ><span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                                >
                                                    Chat</span
                                                ></NavLink
                                            >
=======
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                    <!--<router-link to="/" custom v-slot="{ href, navigate, isExactActive }">-->
                                    <li class="mb-1 last:mb-0">
                                        <a class="block transition duration-150 truncate" :class="isExactActive
                                                ? 'text-indigo-500'
                                                : 'text-slate-400 hover:text-slate-200'
                                            " :href="href" @click="navigate">
                                            <NavLink :href="route('chat')"><span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Chat</span></NavLink>
>>>>>>> carlos
                                        </a>
                                    </li>
                                    <!--</router-link>-->
                                    <!--<router-link to="/dashboard/analytics" custom v-slot="{ href, navigate, isExactActive }">-->
                                    <li class="mb-1 last:mb-0">
<<<<<<< HEAD
                                        <a
                                            class="block transition duration-150 truncate"
                                            :class="
                                                isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-400 hover:text-slate-200'
                                            "
                                            :href="href"
                                            @click="navigate"
                                        >
                                            <NavLink :href="route('listado')"
                                                ><span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                                >
                                                    Listado organizaciones</span
                                                ></NavLink
                                            >
=======
                                        <a class="block transition duration-150 truncate" :class="isExactActive
                                                ? 'text-indigo-500'
                                                : 'text-slate-400 hover:text-slate-200'
                                            " :href="href" @click="navigate">
                                            <NavLink :href="route('listado')"><span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Listado organizaciones</span></NavLink>
>>>>>>> carlos
                                        </a>
                                    </li>
                                    <!--</router-link>-->
                                    <!--<router-link to="/dashboard/fintech" custom v-slot="{ href, navigate, isExactActive }">-->
                                    <!-- <li class="mb-1 last:mb-0">

                                        <a class="block transition duration-150 truncate"
                                            :class="isExactActive ? 'text-indigo-500' : 'text-slate-400 hover:text-slate-200'"
                                            :href="href" @click="navigate">
                                    </li>
                                    </router-link>-->
                                    <!--<router-link to="/dashboard/fintech" custom v-slot="{ href, navigate, isExactActive }">-->
                                    <!--<li class="mb-1 last:mb-0">
                                        <a
                                            class="block transition duration-150 truncate"
                                            :class="
                                                isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-400 hover:text-slate-200'
                                            "
                                            :href="href"
                                            @click="navigate"
                                        >
                                            <NavLink :href="route('perfilP')"
                                                ><span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                                >
                                                    Perfil Publico
                                                    EMPRESA/ORGANIZACION</span
                                                ></NavLink
                                            >
                                        </a>
                                    </li>-->
                                    <!--</router-link>-->
                                </ul>
                            </div>
                        </SidebarLinkGroup>

<<<<<<< HEAD
                        <!-- Calendar -->

                        <NavLink :href="route('events')">
                            <li
                                class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                                :class="isExactActive && 'bg-slate-900'"
                            >
                                <a
                                    class="block text-slate-200 truncate transition duration-150"
                                    :class="
                                        isExactActive
                                            ? 'hover:text-slate-200'
                                            : 'hover:text-white'
                                    "
                                    :href="href"
                                    @click="navigate"
                                >
                                    <div class="flex items-center">
                                        <svg
                                            class="shrink-0 h-6 w-6"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-500'
                                                        : 'text-slate-600'
                                                "
                                                d="M1 3h22v20H1z"
                                            />
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-300'
                                                        : 'text-slate-400'
                                                "
                                                d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"
                                            />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                            >Opcion</span
                                        >
=======
                        <!--CARLOS-->

                        <SidebarLinkGroup v-slot="parentLink" :active="route().current('dashboard')">

                            <a class="block text-slate-200 truncate transition duration-150" href="#0"
                                @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
                                <div class="flex">
                                    <div class="flex items-center justify-between">
                                        <div class="items-center">
                                            <svg class="shrink-0 h-0 w-6" viewBox="0 0 24 24">
                                                <!--<path class="fill-current" :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) ? 'text-indigo-500' : 'text-slate-400'" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />-->
                                                <!--<path class="fill-current" :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) ? 'text-indigo-600' : 'text-slate-600'" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />-->
                                                <!--<path class="fill-current" :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) ? 'text-indigo-200' : 'text-slate-400'" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z" />-->
                                            </svg>
                                            <div class="flex items-center">
                                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                    <path class="fill-current"
                                                        :class="isExactActive ? 'text-indigo-500' : 'text-slate-600'"
                                                        d="M1 3h22v20H1z" />
                                                    <path class="fill-current"
                                                        :class="isExactActive ? 'text-indigo-300' : 'text-slate-400'"
                                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                                </svg>
                                                <span
                                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    CARLOS</span>
                                            </div>
                                        </div>
                                        <!-- Icon -->
                                        <div class="flex shrink-0 ml-2">
                                            <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                                :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
                                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                    <!--<router-link to="/" custom v-slot="{ href, navigate, isExactActive }">-->
                                    <li class="mb-1 last:mb-0">

                                        <a class="block transition duration-150 truncate"
                                            :class="isExactActive ? 'text-indigo-500' : 'text-slate-400 hover:text-slate-200'"
                                            :href="href" @click="navigate">
                                            <NavLink :href="route('perfil-empresa')"><span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Perfil ONG</span></NavLink>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="block transition duration-150 truncate"
                                            :class="isExactActive ? 'text-indigo-500' : 'text-slate-400 hover:text-slate-200'"
                                            :href="href" @click="navigate">
                                            <NavLink :href="route('noticia-create')"><span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Crear Noticia</span></NavLink>
                                        </a>
                                    </li>
                                </ul>
                            </div>


                        </SidebarLinkGroup>

                        <!-- Calendar -->

                        <NavLink :href="route('events')">
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive
                                        ? 'hover:text-slate-200'
                                        : 'hover:text-white'
                                    " :href="href" @click="navigate">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-600'
                                                " d="M1 3h22v20H1z" />
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-300'
                                                    : 'text-slate-400'
                                                " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Opcion</span>
>>>>>>> carlos
                                    </div>
                                </a>
                            </li>
                        </NavLink>

                        <!-- Calendar -->
                        <br />
                        <NavLink :href="route('eventsIndex')">
<<<<<<< HEAD
                            <li
                                class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                                :class="isExactActive && 'bg-slate-900'"
                            >
                                <a
                                    class="block text-slate-200 truncate transition duration-150"
                                    :class="
                                        isExactActive
                                            ? 'hover:text-slate-200'
                                            : 'hover:text-white'
                                    "
                                    :href="href"
                                    @click="navigate"
                                >
                                    <div class="flex items-center">
                                        <svg
                                            class="shrink-0 h-6 w-6"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-500'
                                                        : 'text-slate-600'
                                                "
                                                d="M1 3h22v20H1z"
                                            />
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-300'
                                                        : 'text-slate-400'
                                                "
                                                d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"
                                            />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                            >Mis eventos ONG</span
                                        >
=======
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive
                                        ? 'hover:text-slate-200'
                                        : 'hover:text-white'
                                    " :href="href" @click="navigate">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-600'
                                                " d="M1 3h22v20H1z" />
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-300'
                                                    : 'text-slate-400'
                                                " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Mis
                                            eventos ONG</span>
>>>>>>> carlos
                                    </div>
                                </a>
                            </li>
                        </NavLink>

                        <!-- Calendar -->
<<<<<<< HEAD
                        <NavLink :href="route('plans')" v-if="$page.props.auth.user.rol_id === 2">
                            <li
                                class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                                :class="isExactActive && 'bg-slate-900'"
                            >
                                <a
                                    class="block text-slate-200 truncate transition duration-150"
                                    :class="
                                        isExactActive
                                            ? 'hover:text-slate-200'
                                            : 'hover:text-white'
                                    "
                                    :href="href"
                                    @click="navigate"
                                >
                                    <div class="flex items-center">
                                        <svg
                                            class="shrink-0 h-6 w-6"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-500'
                                                        : 'text-slate-600'
                                                "
                                                d="M1 3h22v20H1z"
                                            />
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-300'
                                                        : 'text-slate-400'
                                                "
                                                d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"
                                            />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                            >Plans</span
                                        >
=======
                        <br />
                        <NavLink :href="route('plans')">
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive
                                        ? 'hover:text-slate-200'
                                        : 'hover:text-white'
                                    " :href="href" @click="navigate">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-600'
                                                " d="M1 3h22v20H1z" />
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-300'
                                                    : 'text-slate-400'
                                                " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Plans</span>
>>>>>>> carlos
                                    </div>
                                </a>
                            </li>
                        </NavLink>

                        <!-- Calendar -->
                        <br />

<<<<<<< HEAD
                        <SidebarLinkGroup
                            v-slot="parentLink"
                            :active="route().current('dashboard')"
                        >
                            <a
                                class="block text-slate-200 truncate transition duration-150"
                                href="#0"
                                @click.prevent="
                                    sidebarExpanded
                                        ? parentLink.handleClick()
                                        : (sidebarExpanded = true)
                                "
                            >
                                <div class="flex">
                                    <div
                                        class="flex items-center justify-between"
                                    >
                                        <div class="items-center">
                                            <svg
                                                class="shrink-0 h-0 w-6"
                                                viewBox="0 0 24 24"
                                            >
=======
                        <SidebarLinkGroup v-slot="parentLink" :active="route().current('dashboard')">
                            <a class="block text-slate-200 truncate transition duration-150" href="#0" @click.prevent="sidebarExpanded
                                    ? parentLink.handleClick()
                                    : (sidebarExpanded = true)
                                ">
                                <div class="flex">
                                    <div class="flex items-center justify-between">
                                        <div class="items-center">
                                            <svg class="shrink-0 h-0 w-6" viewBox="0 0 24 24">
>>>>>>> carlos
                                                <!--<path class="fill-current" :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) ? 'text-indigo-500' : 'text-slate-400'" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />-->
                                                <!--<path class="fill-current" :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) ? 'text-indigo-600' : 'text-slate-600'" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />-->
                                                <!--<path class="fill-current" :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) ? 'text-indigo-200' : 'text-slate-400'" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z" />-->
                                            </svg>
                                            <div class="flex items-center">
<<<<<<< HEAD
                                                <svg
                                                    class="shrink-0 h-6 w-6"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        class="fill-current"
                                                        :class="
                                                            isExactActive
                                                                ? 'text-indigo-500'
                                                                : 'text-slate-600'
                                                        "
                                                        d="M1 3h22v20H1z"
                                                    />
                                                    <path
                                                        class="fill-current"
                                                        :class="
                                                            isExactActive
                                                                ? 'text-indigo-300'
                                                                : 'text-slate-400'
                                                        "
                                                        d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"
                                                    />
                                                </svg>
                                                <span
                                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                                >
                                                    Eventos</span
                                                >
=======
                                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                    <path class="fill-current" :class="isExactActive
                                                            ? 'text-indigo-500'
                                                            : 'text-slate-600'
                                                        " d="M1 3h22v20H1z" />
                                                    <path class="fill-current" :class="isExactActive
                                                            ? 'text-indigo-300'
                                                            : 'text-slate-400'
                                                        " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                                </svg>
                                                <span
                                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Eventos</span>
>>>>>>> carlos
                                            </div>
                                        </div>
                                        <!-- Icon -->
                                        <div class="flex shrink-0 ml-2">
<<<<<<< HEAD
                                            <svg
                                                class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                                :class="
                                                    parentLink.expanded &&
                                                    'rotate-180'
                                                "
                                                viewBox="0 0 12 12"
                                            >
                                                <path
                                                    d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"
                                                />
=======
                                            <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" :class="parentLink.expanded &&
                                                'rotate-180'
                                                " viewBox="0 0 12 12">
                                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
>>>>>>> carlos
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
<<<<<<< HEAD
                            <div
                                class="lg:hidden lg:sidebar-expanded:block 2xl:block"
                            >
                                <ul
                                    class="pl-9 mt-1"
                                    :class="!parentLink.expanded && 'hidden'"
                                >
                                    <!--<router-link to="/" custom v-slot="{ href, navigate, isExactActive }">-->
                                    <li class="mb-1 last:mb-0">
                                        <a
                                            class="block transition duration-150 truncate"
                                            :class="
                                                isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-400 hover:text-slate-200'
                                            "
                                            :href="href"
                                            @click="navigate"
                                        >
                                            <NavLink
                                                :href="route('ownEventsUser')"
                                                ><span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                                >
                                                    Mis eventos</span
                                                ></NavLink
                                            >
=======
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                    <!--<router-link to="/" custom v-slot="{ href, navigate, isExactActive }">-->
                                    <li class="mb-1 last:mb-0">
                                        <a class="block transition duration-150 truncate" :class="isExactActive
                                                ? 'text-indigo-500'
                                                : 'text-slate-400 hover:text-slate-200'
                                            " :href="href" @click="navigate">
                                            <NavLink :href="route('ownEventsUser')"><span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Mis eventos</span></NavLink>
>>>>>>> carlos
                                        </a>
                                    </li>
                                    <!--</router-link>-->
                                    <!--<router-link to="/dashboard/analytics" custom v-slot="{ href, navigate, isExactActive }">-->
                                    <li class="mb-1 last:mb-0">
<<<<<<< HEAD
                                        <a
                                            class="block transition duration-150 truncate"
                                            :class="
                                                isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-400 hover:text-slate-200'
                                            "
                                            :href="href"
                                            @click="navigate"
                                        >
                                            <NavLink
                                                :href="route('allEventsToUser')"
                                                ><span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                                >
                                                    Todos los eventos</span
                                                ></NavLink
                                            >
=======
                                        <a class="block transition duration-150 truncate" :class="isExactActive
                                                ? 'text-indigo-500'
                                                : 'text-slate-400 hover:text-slate-200'
                                            " :href="href" @click="navigate">
                                            <NavLink :href="route('allEventsToUser')"><span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Todos los eventos</span></NavLink>
>>>>>>> carlos
                                        </a>
                                    </li>
                                    <!--</router-link>-->
                                    <!--<router-link to="/dashboard/fintech" custom v-slot="{ href, navigate, isExactActive }">-->

                                    <!--</router-link>-->
                                </ul>
                            </div>
                        </SidebarLinkGroup>

                        <!-- LISTADO USER EMPRESA -->
                        <NavLink :href="route('indexUser')">
<<<<<<< HEAD
                            <li
                                class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                                :class="isExactActive && 'bg-slate-900'"
                            >
                                <a
                                    class="block text-slate-200 truncate transition duration-150"
                                    :class="
                                        isExactActive
                                            ? 'hover:text-slate-200'
                                            : 'hover:text-white'
                                    "
                                    :href="href"
                                    @click="navigate"
                                >
                                    <div class="flex items-center">
                                        <svg
                                            class="shrink-0 h-6 w-6"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-500'
                                                        : 'text-slate-600'
                                                "
                                                d="M1 3h22v20H1z"
                                            />
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-300'
                                                        : 'text-slate-400'
                                                "
                                                d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"
                                            />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                            >Listado Usuarios Empresa</span
                                        >
=======
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive
                                        ? 'hover:text-slate-200'
                                        : 'hover:text-white'
                                    " :href="href" @click="navigate">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-600'
                                                " d="M1 3h22v20H1z" />
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-300'
                                                    : 'text-slate-400'
                                                " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Listado
                                            Usuarios Empresa</span>
>>>>>>> carlos
                                    </div>
                                </a>
                            </li>
                        </NavLink>

                        <!-- LISTADO USER ONG -->
                        <NavLink :href="route('listUserONG')">
<<<<<<< HEAD
                            <li
                                class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                                :class="isExactActive && 'bg-slate-900'"
                            >
                                <a
                                    class="block text-slate-200 truncate transition duration-150"
                                    :class="
                                        isExactActive
                                            ? 'hover:text-slate-200'
                                            : 'hover:text-white'
                                    "
                                    :href="href"
                                    @click="navigate"
                                >
                                    <div class="flex items-center">
                                        <svg
                                            class="shrink-0 h-6 w-6"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-500'
                                                        : 'text-slate-600'
                                                "
                                                d="M1 3h22v20H1z"
                                            />
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-300'
                                                        : 'text-slate-400'
                                                "
                                                d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"
                                            />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                            >Listado Usuarios ONG</span
                                        >
=======
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive
                                        ? 'hover:text-slate-200'
                                        : 'hover:text-white'
                                    " :href="href" @click="navigate">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-600'
                                                " d="M1 3h22v20H1z" />
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-300'
                                                    : 'text-slate-400'
                                                " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Listado
                                            Usuarios ONG</span>
                                    </div>
                                </a>
                            </li>
                        </NavLink>

                        <!--  LISTADO NOTICIAS -->
                        <NavLink :href="route('noticias-listado')">
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive
                                        ? 'hover:text-slate-200'
                                        : 'hover:text-white'
                                    " :href="href" @click="navigate">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-600'
                                                " d="M1 3h22v20H1z" />
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-300'
                                                    : 'text-slate-400'
                                                " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            Listado Noticias</span>
>>>>>>> carlos
                                    </div>
                                </a>
                            </li>
                        </NavLink>

                        <!-- LPERFIL USUARIO -->
                        <NavLink :href="route('perfil-usuario')">
<<<<<<< HEAD
                            <li
                                class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                                :class="isExactActive && 'bg-slate-900'"
                            >
                                <a
                                    class="block text-slate-200 truncate transition duration-150"
                                    :class="
                                        isExactActive
                                            ? 'hover:text-slate-200'
                                            : 'hover:text-white'
                                    "
                                    :href="href"
                                    @click="navigate"
                                >
                                    <div class="flex items-center">
                                        <svg
                                            class="shrink-0 h-6 w-6"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-500'
                                                        : 'text-slate-600'
                                                "
                                                d="M1 3h22v20H1z"
                                            />
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-300'
                                                        : 'text-slate-400'
                                                "
                                                d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"
                                            />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                        >
                                            Perfil Usuario</span
                                        >
=======
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive
                                        ? 'hover:text-slate-200'
                                        : 'hover:text-white'
                                    " :href="href" @click="navigate">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-600'
                                                " d="M1 3h22v20H1z" />
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-300'
                                                    : 'text-slate-400'
                                                " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            Perfil Usuario</span>
>>>>>>> carlos
                                    </div>
                                </a>
                            </li>
                        </NavLink>

                        <!-- EDITAR PRFIL USUARIO -->
                        <NavLink :href="route('editar-usuario')">
<<<<<<< HEAD
                            <li
                                class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                                :class="isExactActive && 'bg-slate-900'"
                            >
                                <a
                                    class="block text-slate-200 truncate transition duration-150"
                                    :class="
                                        isExactActive
                                            ? 'hover:text-slate-200'
                                            : 'hover:text-white'
                                    "
                                    :href="href"
                                    @click="navigate"
                                >
                                    <div class="flex items-center">
                                        <svg
                                            class="shrink-0 h-6 w-6"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-500'
                                                        : 'text-slate-600'
                                                "
                                                d="M1 3h22v20H1z"
                                            />
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-300'
                                                        : 'text-slate-400'
                                                "
                                                d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"
                                            />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                        >
                                            Editar Perfil Usuario</span
                                        >
=======
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive
                                        ? 'hover:text-slate-200'
                                        : 'hover:text-white'
                                    " :href="href" @click="navigate">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-600'
                                                " d="M1 3h22v20H1z" />
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-300'
                                                    : 'text-slate-400'
                                                " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            Editar Perfil Usuario</span>
>>>>>>> carlos
                                    </div>
                                </a>
                            </li>
                        </NavLink>

                        <!--  PRFIL EMPRESA -->
                        <NavLink :href="route('perfil-empresa')">
<<<<<<< HEAD
                            <li
                                class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                                :class="isExactActive && 'bg-slate-900'"
                            >
                                <a
                                    class="block text-slate-200 truncate transition duration-150"
                                    :class="
                                        isExactActive
                                            ? 'hover:text-slate-200'
                                            : 'hover:text-white'
                                    "
                                    :href="href"
                                    @click="navigate"
                                >
                                    <div class="flex items-center">
                                        <svg
                                            class="shrink-0 h-6 w-6"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-500'
                                                        : 'text-slate-600'
                                                "
                                                d="M1 3h22v20H1z"
                                            />
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-300'
                                                        : 'text-slate-400'
                                                "
                                                d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"
                                            />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                        >
                                            Perfil Empresa</span
                                        >
=======
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive
                                        ? 'hover:text-slate-200'
                                        : 'hover:text-white'
                                    " :href="href" @click="navigate">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-600'
                                                " d="M1 3h22v20H1z" />
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-300'
                                                    : 'text-slate-400'
                                                " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            Perfil Empresa</span>
>>>>>>> carlos
                                    </div>
                                </a>
                            </li>
                        </NavLink>

                        <!--  EDITAR EMPRESA -->
                        <NavLink :href="route('edit-empresa')">
<<<<<<< HEAD
                            <li
                                class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                                :class="isExactActive && 'bg-slate-900'"
                            >
                                <a
                                    class="block text-slate-200 truncate transition duration-150"
                                    :class="
                                        isExactActive
                                            ? 'hover:text-slate-200'
                                            : 'hover:text-white'
                                    "
                                    :href="href"
                                    @click="navigate"
                                >
                                    <div class="flex items-center">
                                        <svg
                                            class="shrink-0 h-6 w-6"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-500'
                                                        : 'text-slate-600'
                                                "
                                                d="M1 3h22v20H1z"
                                            />
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-300'
                                                        : 'text-slate-400'
                                                "
                                                d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"
                                            />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                        >
                                            Editar Empresa</span
                                        >
=======
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive
                                        ? 'hover:text-slate-200'
                                        : 'hover:text-white'
                                    " :href="href" @click="navigate">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-600'
                                                " d="M1 3h22v20H1z" />
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-300'
                                                    : 'text-slate-400'
                                                " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            Editar Empresa</span>
>>>>>>> carlos
                                    </div>
                                </a>
                            </li>
                        </NavLink>

<<<<<<< HEAD
                        <!--  FEED -->
                        <NavLink :href="route('feed')">
                            <li
                                class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                                :class="isExactActive && 'bg-slate-900'"
                            >
                                <a
                                    class="block text-slate-200 truncate transition duration-150"
                                    :class="
                                        isExactActive
                                            ? 'hover:text-slate-200'
                                            : 'hover:text-white'
                                    "
                                    :href="href"
                                    @click="navigate"
                                >
                                    <div class="flex items-center">
                                        <svg
                                            class="shrink-0 h-6 w-6"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-500'
                                                        : 'text-slate-600'
                                                "
                                                d="M1 3h22v20H1z"
                                            />
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-300'
                                                        : 'text-slate-400'
                                                "
                                                d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"
                                            />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                        >
                                            FEED</span
                                        >
=======
                        <!--  EDITAR ORGANIZACION -->
                        <NavLink :href="route('edit-organizacion')">
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive
                                        ? 'hover:text-slate-200'
                                        : 'hover:text-white'
                                    " :href="href" @click="navigate">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-600'
                                                " d="M1 3h22v20H1z" />
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-300'
                                                    : 'text-slate-400'
                                                " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            Editar Organización</span>
                                    </div>
                                </a>
                            </li>
                        </NavLink>


                        <!--  FEED -->
                        <NavLink :href="route('feed')">
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive
                                        ? 'hover:text-slate-200'
                                        : 'hover:text-white'
                                    " :href="href" @click="navigate">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-600'
                                                " d="M1 3h22v20H1z" />
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-300'
                                                    : 'text-slate-400'
                                                " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            FEED</span>
>>>>>>> carlos
                                    </div>
                                </a>
                            </li>
                        </NavLink>
                        <br />
                        <!--  POST -->
                        <NavLink :href="route('post')">
<<<<<<< HEAD
                            <li
                                class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                                :class="isExactActive && 'bg-slate-900'"
                            >
                                <a
                                    class="block text-slate-200 truncate transition duration-150"
                                    :class="
                                        isExactActive
                                            ? 'hover:text-slate-200'
                                            : 'hover:text-white'
                                    "
                                    :href="href"
                                    @click="navigate"
                                >
                                    <div class="flex items-center">
                                        <svg
                                            class="shrink-0 h-6 w-6"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-500'
                                                        : 'text-slate-600'
                                                "
                                                d="M1 3h22v20H1z"
                                            />
                                            <path
                                                class="fill-current"
                                                :class="
                                                    isExactActive
                                                        ? 'text-indigo-300'
                                                        : 'text-slate-400'
                                                "
                                                d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"
                                            />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                        >
                                            POST</span
                                        >
=======
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">
                                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive
                                        ? 'hover:text-slate-200'
                                        : 'hover:text-white'
                                    " :href="href" @click="navigate">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-500'
                                                    : 'text-slate-600'
                                                " d="M1 3h22v20H1z" />
                                            <path class="fill-current" :class="isExactActive
                                                    ? 'text-indigo-300'
                                                    : 'text-slate-400'
                                                " d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            POST</span>
>>>>>>> carlos
                                    </div>
                                </a>
                            </li>
                        </NavLink>
                    </ul>
                </div>
            </div>

            <!-- Expand / collapse button -->
<<<<<<< HEAD
            <div
                class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto"
            >
                <div class="px-3 py-2">
                    <button @click.prevent="sidebarExpanded = !sidebarExpanded">
                        <span class="sr-only">Expand / collapse sidebar</span>
                        <svg
                            class="w-6 h-6 fill-current sidebar-expanded:rotate-180"
                            viewBox="0 0 24 24"
                        >
                            <path
                                class="text-slate-400"
                                d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z"
                            />
=======
            <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
                <div class="px-3 py-2">
                    <button @click.prevent="sidebarExpanded = !sidebarExpanded">
                        <span class="sr-only">Expand / collapse sidebar</span>
                        <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                            <path class="text-slate-400"
                                d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
>>>>>>> carlos
                            <path class="text-slate-600" d="M3 23H1V1h2z" />
                        </svg>
                    </button>
                </div>
            </div>
<<<<<<< HEAD
=======
>>>>>>> master
>>>>>>> carlos




<<<<<<< HEAD
=======
<<<<<<< HEAD












          </ul>
>>>>>>> carlos
        </div>
    </div>
</template>

<script>
import { ref, onMounted, onUnmounted, watch } from "vue";
//import { useRouter } from 'vue-router'

import SidebarLinkGroup from "./SidebarLinkGroup.vue";
import NavLink from "@/Components/NavLink.vue";

export default {
    name: "Sidebar",
    props: ["sidebarOpen"],
    components: {
        SidebarLinkGroup,
        NavLink,
    },
    setup(props, { emit }) {
        const trigger = ref(null);
        const sidebar = ref(null);

        const storedSidebarExpanded = localStorage.getItem("sidebar-expanded");
        const sidebarExpanded = ref(
            storedSidebarExpanded === null
                ? false
                : storedSidebarExpanded === "true"
        );

        //const currentRoute = useRouter().currentRoute.value

        // close on click outside
        const clickHandler = ({ target }) => {
            if (!sidebar.value || !trigger.value) return;
            if (
                !props.sidebarOpen ||
                sidebar.value.contains(target) ||
                trigger.value.contains(target)
            )
                return;
            emit("close-sidebar");
        };

        // close if the esc key is pressed
        const keyHandler = ({ keyCode }) => {
            if (!props.sidebarOpen || keyCode !== 27) return;
            emit("close-sidebar");
        };

        onMounted(() => {
            document.addEventListener("click", clickHandler);
            document.addEventListener("keydown", keyHandler);
        });

        onUnmounted(() => {
            document.removeEventListener("click", clickHandler);
            document.removeEventListener("keydown", keyHandler);
        });

        watch(sidebarExpanded, () => {
            localStorage.setItem("sidebar-expanded", sidebarExpanded.value);
            if (sidebarExpanded.value) {
                document
                    .querySelector("body")
                    .classList.add("sidebar-expanded");
            } else {
                document
                    .querySelector("body")
                    .classList.remove("sidebar-expanded");
            }
        });

        return {
            trigger,
            sidebar,
            sidebarExpanded,
            //currentRoute,
        };
    },

<<<<<<< HEAD
=======
    return {
      trigger,
      sidebar,
      sidebarExpanded,
      //currentRoute,
    }
  },
}
=======
        </div>
    </div>
</template>

<script>
import { ref, onMounted, onUnmounted, watch } from "vue";
//import { useRouter } from 'vue-router'

import SidebarLinkGroup from "./SidebarLinkGroup.vue";
import NavLink from "@/Components/NavLink.vue";

export default {
    name: "Sidebar",
    props: ["sidebarOpen"],
    components: {
        SidebarLinkGroup,
        NavLink,
    },
    setup(props, { emit }) {
        const trigger = ref(null);
        const sidebar = ref(null);

        const storedSidebarExpanded = localStorage.getItem("sidebar-expanded");
        const sidebarExpanded = ref(
            storedSidebarExpanded === null
                ? false
                : storedSidebarExpanded === "true"
        );

        //const currentRoute = useRouter().currentRoute.value

        // close on click outside
        const clickHandler = ({ target }) => {
            if (!sidebar.value || !trigger.value) return;
            if (
                !props.sidebarOpen ||
                sidebar.value.contains(target) ||
                trigger.value.contains(target)
            )
                return;
            emit("close-sidebar");
        };

        // close if the esc key is pressed
        const keyHandler = ({ keyCode }) => {
            if (!props.sidebarOpen || keyCode !== 27) return;
            emit("close-sidebar");
        };

        onMounted(() => {
            document.addEventListener("click", clickHandler);
            document.addEventListener("keydown", keyHandler);
        });

        onUnmounted(() => {
            document.removeEventListener("click", clickHandler);
            document.removeEventListener("keydown", keyHandler);
        });

        watch(sidebarExpanded, () => {
            localStorage.setItem("sidebar-expanded", sidebarExpanded.value);
            if (sidebarExpanded.value) {
                document
                    .querySelector("body")
                    .classList.add("sidebar-expanded");
            } else {
                document
                    .querySelector("body")
                    .classList.remove("sidebar-expanded");
            }
        });

        return {
            trigger,
            sidebar,
            sidebarExpanded,
            //currentRoute,
        };
    },

>>>>>>> carlos
    name: "Sidebar",
    props: ["sidebarOpen"],
    components: {
        SidebarLinkGroup,
        NavLink,
    },
    setup(props, { emit }) {
        const trigger = ref(null);
        const sidebar = ref(null);

        const storedSidebarExpanded = localStorage.getItem("sidebar-expanded");
        const sidebarExpanded = ref(
            storedSidebarExpanded === null
                ? false
                : storedSidebarExpanded === "true"
        );

        //const currentRoute = useRouter().currentRoute.value

        // close on click outside
        const clickHandler = ({ target }) => {
            if (!sidebar.value || !trigger.value) return;
            if (
                !props.sidebarOpen ||
                sidebar.value.contains(target) ||
                trigger.value.contains(target)
            )
                return;
            emit("close-sidebar");
        };

        // close if the esc key is pressed
        const keyHandler = ({ keyCode }) => {
            if (!props.sidebarOpen || keyCode !== 27) return;
            emit("close-sidebar");
        };

        onMounted(() => {
            document.addEventListener("click", clickHandler);
            document.addEventListener("keydown", keyHandler);
        });

        onUnmounted(() => {
            document.removeEventListener("click", clickHandler);
            document.removeEventListener("keydown", keyHandler);
        });

        watch(sidebarExpanded, () => {
            localStorage.setItem("sidebar-expanded", sidebarExpanded.value);
            if (sidebarExpanded.value) {
                document
                    .querySelector("body")
                    .classList.add("sidebar-expanded");
            } else {
                document
                    .querySelector("body")
                    .classList.remove("sidebar-expanded");
            }
        });

        return {
            trigger,
            sidebar,
            sidebarExpanded,
            //currentRoute,
        };
    },
};
<<<<<<< HEAD
=======
>>>>>>> master
>>>>>>> carlos
</script>
