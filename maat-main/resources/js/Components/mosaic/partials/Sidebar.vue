<template>
  <div>
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true"></div>

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
            <path d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z" fill="#4F46E5" />
            <path d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z" fill="url(#logo-a)" />
            <path d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z" fill="url(#logo-b)" />
          </svg>
        <!--</router-link>-->
      </div>

      <!-- Links -->
      <div class="space-y-8">
        <!-- Pages group -->
        <div>
          <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
            <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
            <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pages</span>
          </h3>
          <ul class="mt-3">
            <!-- Dashboard -->
            <SidebarLinkGroup v-slot="parentLink" :active="route().current('dashboard')">

                <a class="block text-slate-200 truncate transition duration-150" href="#0" @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
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
                      <path class="fill-current" :class="isExactActive ? 'text-indigo-500' : 'text-slate-600'" d="M1 3h22v20H1z" />
                      <path class="fill-current" :class="isExactActive ? 'text-indigo-300' : 'text-slate-400'" d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                    </svg>
                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Lista opciones</span>
                  </div>
                  </div>
                  <!-- Icon -->
                  <div class="flex shrink-0 ml-2">
                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
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




<!--...................................... OPCIONES BRUNO ......................................................................-->

<SidebarLinkGroup v-slot="parentLink" :active="route().current('dashboard')">

<a class="block text-slate-200 truncate transition duration-150" href="#0" @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
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
      <path class="fill-current" :class="isExactActive ? 'text-indigo-500' : 'text-slate-600'" d="M1 3h22v20H1z" />
      <path class="fill-current" :class="isExactActive ? 'text-indigo-300' : 'text-slate-400'" d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
    </svg>
    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Vistas Bruno</span>
  </div>
  </div>
  <!-- Icon -->
  <div class="flex shrink-0 ml-2">
        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
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
    <a class="block transition duration-150 truncate" :class="isExactActive ? 'text-indigo-500' : 'text-slate-400 hover:text-slate-200'" :href="href" @click="navigate">
            <NavLink :href="route('Panel_ong')"><span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Panel admin ONG</span></NavLink>
        </a>
    </li>

    <li class="mb-1 last:mb-0">
        <a class="block transition duration-150 truncate" :class="isExactActive ? 'text-indigo-500' : 'text-slate-400 hover:text-slate-200'" :href="href" @click="navigate">
            <NavLink :href="route('Panel_company')"><span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Panel admin empresa</span></NavLink>
        </a>
    </li>

    <li class="mb-1 last:mb-0">
        <a class="block transition duration-150 truncate" :class="isExactActive ? 'text-indigo-500' : 'text-slate-400 hover:text-slate-200'" :href="href" @click="navigate">
            <NavLink :href="route('Panel_user')"><span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Panel admin usuario</span></NavLink>
        </a>
    </li>

    <li class="mb-1 last:mb-0">
        <a class="block transition duration-150 truncate" :class="isExactActive ? 'text-indigo-500' : 'text-slate-400 hover:text-slate-200'" :href="href" @click="navigate">
            <NavLink :href="route('Panel_maat')"><span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Panel admin Maat</span></NavLink>
        </a>
    </li>

    <li class="mb-1 last:mb-0">
        <a class="block transition duration-150 truncate" :class="isExactActive ? 'text-indigo-500' : 'text-slate-400 hover:text-slate-200'" :href="href" @click="navigate">
            <NavLink :href="route('show')"><span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Mostrar crud</span></NavLink>
        </a>
    </li>

    <li class="mb-1 last:mb-0">
        <a class="block transition duration-150 truncate" :class="isExactActive ? 'text-indigo-500' : 'text-slate-400 hover:text-slate-200'" :href="href" @click="navigate">
            <NavLink :href="route('edit')"><span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Formulario de editar</span></NavLink>
        </a>
    </li>


    <li class="mb-1 last:mb-0">

<a class="block transition duration-150 truncate" :class="isExactActive ? 'text-indigo-500' : 'text-slate-400 hover:text-slate-200'" :href="href" @click="navigate">
    <NavLink :href="route('events')"><span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Zona de control - MAAT</span></NavLink>
</a>

</li>
  <!--</router-link>-->
</ul>
</div>
</SidebarLinkGroup>



<!--...............................................................................-->















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
















          </ul>
        </div>
      </div>

      <!-- Expand / collapse button -->
      <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
        <div class="px-3 py-2">
          <button @click.prevent="sidebarExpanded = !sidebarExpanded">
            <span class="sr-only">Expand / collapse sidebar</span>
            <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
              <path class="text-slate-400" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
              <path class="text-slate-600" d="M3 23H1V1h2z" />
            </svg>
          </button>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
import { ref, onMounted, onUnmounted, watch } from 'vue'
//import { useRouter } from 'vue-router'

import SidebarLinkGroup from './SidebarLinkGroup.vue'
import NavLink from '@/Components/NavLink.vue';



export default {
  name: 'Sidebar',
  props: ['sidebarOpen'],
  components: {
    SidebarLinkGroup,
    NavLink,
  },
  setup(props, { emit }) {

    const trigger = ref(null)
    const sidebar = ref(null)

    const storedSidebarExpanded = localStorage.getItem('sidebar-expanded')
    const sidebarExpanded = ref(storedSidebarExpanded === null ? false : storedSidebarExpanded === 'true')

    //const currentRoute = useRouter().currentRoute.value

    // close on click outside
    const clickHandler = ({ target }) => {
      if (!sidebar.value || !trigger.value) return
      if (
        !props.sidebarOpen ||
        sidebar.value.contains(target) ||
        trigger.value.contains(target)
      ) return
      emit('close-sidebar')
    }

    // close if the esc key is pressed
    const keyHandler = ({ keyCode }) => {
      if (!props.sidebarOpen || keyCode !== 27) return
      emit('close-sidebar')
    }

    onMounted(() => {
      document.addEventListener('click', clickHandler)
      document.addEventListener('keydown', keyHandler)
    })

    onUnmounted(() => {
      document.removeEventListener('click', clickHandler)
      document.removeEventListener('keydown', keyHandler)
    })

    watch(sidebarExpanded, () => {
      localStorage.setItem('sidebar-expanded', sidebarExpanded.value)
      if (sidebarExpanded.value) {
        document.querySelector('body').classList.add('sidebar-expanded')
      } else {
        document.querySelector('body').classList.remove('sidebar-expanded')
      }
    })

    return {
      trigger,
      sidebar,
      sidebarExpanded,
      //currentRoute,
    }
  },
}
</script>
