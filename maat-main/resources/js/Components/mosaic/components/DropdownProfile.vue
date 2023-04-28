<template>
<<<<<<< HEAD
    <div class="relative inline-flex">
        <button ref="trigger" class="inline-flex justify-center items-center group" aria-haspopup="true"
            @click.prevent="dropdownOpen = !dropdownOpen" :aria-expanded="dropdownOpen">
            <img class="w-8 h-8 rounded-full"
                src="https://media.c5n.com/p/23e83bbc00263816974509a0e7ca37e0/adjuntos/326/imagenes/000/045/0000045267/1200x675/smart/foto-perfil-facebook.png"
                width="32" height="32" alt="User" />
            <div class="flex items-center truncate">
                <span class="truncate ml-2 text-sm font-medium group-hover:text-slate-800">{{ this.userData.email }}</span>
                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" viewBox="0 0 12 12">
                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                </svg>
            </div>
        </button>
        <transition enter-active-class="transition ease-out duration-200 transform"
            enter-from-class="opacity-0 -translate-y-2" enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition ease-out duration-200" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-show="dropdownOpen"
                class="origin-top-right z-10 absolute top-full min-w-44 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                :class="align === 'right' ? 'right-0' : 'left-0'">
                <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200">
                    <div class="font-medium text-slate-800">{{ this.userData.email }}</div>

                    <!--  -->
                    <div class="text-xs text-slate-500 italic" v-if="this.userData.rol_id == 1">
                        Administrator
                    </div>
                    <div class="text-xs text-slate-500 italic" v-else-if="this.userData.rol_id == 2">
                        Employee
                    </div>
                </div>
                <ul ref="dropdown" @focusin="dropdownOpen = true" @focusout="dropdownOpen = false">
                    <li>
                        <router-link
                            class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3"
                            to="/settings/account" @click="dropdownOpen = false">Settings</router-link>
                    </li>
                    <li>
                        <router-link
                            class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3"
                            to="logout" @click="dropdownOpen = false">Sign Out</router-link>
                    </li>
                </ul>
            </div>
        </transition>
    </div>
=======
  <div class="relative inline-flex">
    <button
      ref="trigger"
      class="inline-flex justify-center items-center group"
      aria-haspopup="true"
      @click.prevent="dropdownOpen = !dropdownOpen"
      :aria-expanded="dropdownOpen"
    >
      <img class="w-8 h-8 rounded-full" src="https://media.c5n.com/p/23e83bbc00263816974509a0e7ca37e0/adjuntos/326/imagenes/000/045/0000045267/1200x675/smart/foto-perfil-facebook.png" width="32" height="32" alt="User" />
      <div class="flex items-center truncate">
        <span class="truncate ml-2 text-sm font-medium group-hover:text-slate-800">Acme Inc.</span>
        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" viewBox="0 0 12 12">
          <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
        </svg>
      </div>
    </button>
    <transition
      enter-active-class="transition ease-out duration-200 transform"
      enter-from-class="opacity-0 -translate-y-2"
      enter-to-class="opacity-100 translate-y-0"
      leave-active-class="transition ease-out duration-200"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0"
    >
      <div v-show="dropdownOpen" class="origin-top-right z-10 absolute top-full min-w-44 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1" :class="align === 'right' ? 'right-0' : 'left-0'">
        <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200">
          <div class="font-medium text-slate-800">Acme Inc.</div>
          <div class="text-xs text-slate-500 italic">Administrator</div>
        </div>
        <ul
          ref="dropdown"
          @focusin="dropdownOpen = true"
          @focusout="dropdownOpen = false"
        >
          <li>
            <router-link class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" to="/settings/account" @click="dropdownOpen = false">Settings</router-link>
          </li>
          <li>
            <router-link class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" to="/signin" @click="dropdownOpen = false">Sign Out</router-link>
          </li>
        </ul>
      </div>
    </transition>
  </div>
>>>>>>> sergio
</template>

<script>
import { ref, onMounted, onUnmounted } from 'vue'
//import UserAvatar from '../images/user-avatar-32.png'

<<<<<<< HEAD
// Para obtener información del backend, se usa axios
import axios from 'axios';

export default {
    name: 'DropdownProfile',
    props: ['align'],

    // Alex
    // Método, mounted y userData
    data() {
        return {
            //UserAvatar: UserAvatar,
            userData: '',
        }
    },

    mounted() {
        this.userData = this.$page.props.auth.user;
    },

    setup() {

        const dropdownOpen = ref(false)
        const trigger = ref(null)
        const dropdown = ref(null)

        // close on click outside
        const clickHandler = ({ target }) => {
            if (!dropdownOpen.value || dropdown.value.contains(target) || trigger.value.contains(target)) return
            dropdownOpen.value = false
        }

        // close if the esc key is pressed
        const keyHandler = ({ keyCode }) => {
            if (!dropdownOpen.value || keyCode !== 27) return
            dropdownOpen.value = false
        }

        onMounted(() => {
            document.addEventListener('click', clickHandler)
            document.addEventListener('keydown', keyHandler)
        })

        onUnmounted(() => {
            document.removeEventListener('click', clickHandler)
            document.removeEventListener('keydown', keyHandler)
        })

        return {
            dropdownOpen,
            trigger,
            dropdown,
        }
    }
=======
export default {
  name: 'DropdownProfile',
  props: ['align'],
  data() {
    return {
      //UserAvatar: UserAvatar,
    }
  },
  setup() {

    const dropdownOpen = ref(false)
    const trigger = ref(null)
    const dropdown = ref(null)

    // close on click outside
    const clickHandler = ({ target }) => {
      if (!dropdownOpen.value || dropdown.value.contains(target) || trigger.value.contains(target)) return
      dropdownOpen.value = false
    }

    // close if the esc key is pressed
    const keyHandler = ({ keyCode }) => {
      if (!dropdownOpen.value || keyCode !== 27) return
      dropdownOpen.value = false
    }

    onMounted(() => {
      document.addEventListener('click', clickHandler)
      document.addEventListener('keydown', keyHandler)
    })

    onUnmounted(() => {
      document.removeEventListener('click', clickHandler)
      document.removeEventListener('keydown', keyHandler)
    })

    return {
      dropdownOpen,
      trigger,
      dropdown,
    }
  }
>>>>>>> sergio
}
</script>
