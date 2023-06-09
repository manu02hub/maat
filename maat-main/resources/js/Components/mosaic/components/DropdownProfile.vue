<template>
    <div class="relative inline-flex">
        <button
            ref="trigger"
            class="inline-flex justify-center items-center group"
            aria-haspopup="true"
            @click.prevent="dropdownOpen = !dropdownOpen"
            :aria-expanded="dropdownOpen"
        >
            <img
                class="w-8 h-8 rounded-full"
                src="https://media.c5n.com/p/23e83bbc00263816974509a0e7ca37e0/adjuntos/326/imagenes/000/045/0000045267/1200x675/smart/foto-perfil-facebook.png"
                width="32"
                height="32"
                alt="User"
            />
            <div class="flex items-center truncate">
                <span
                    class="truncate ml-2 text-sm font-medium group-hover:text-slate-800"
                    >{{ this.email }}</span
                >
                <svg
                    class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                    viewBox="0 0 12 12"
                >
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
            <div
                v-show="dropdownOpen"
                class="origin-top-right z-10 absolute top-full min-w-44 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                :class="align === 'right' ? 'right-0' : 'left-0'"
            >
                <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200">
                    <div class="font-medium text-slate-800">
                        {{ this.email }}
                    </div>
                    <div
                        v-if="$page.props.auth.user.rol_id === 1"
                        class="text-xs text-slate-500 italic"
                    >
                        Organizacion
                    </div>

                    <div
                        v-if="$page.props.auth.user.rol_id === 2"
                        class="text-xs text-slate-500 italic"
                    >
                        Empresa
                    </div>

                    <div
                        v-if="$page.props.auth.user.rol_id === 3"
                        class="text-xs text-slate-500 italic"
                    >
                        Empleado
                    </div>
                </div>
                <ul
                    ref="dropdown"
                    @focusin="dropdownOpen = true"
                    @focusout="dropdownOpen = false"
                >
                    <li>
                        <Link
                            class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3"
                            :href="route('logout')"
                            method="POST"
                            @click="dropdownOpen = false"
                            >Cerrar sesión</Link
                        >
                    </li>
                </ul>
            </div>
        </transition>
    </div>
</template>

<script>
import { ref, onMounted, onUnmounted } from "vue";
import { usePage, Link } from "@inertiajs/vue3";

export default {
    name: "DropdownProfile",
    components: {
        Link,
    },
    props: ["align"],
    data() {
        return {
            //UserAvatar: UserAvatar,
            email: "Acme Inc.",
            idRol: 1,
        };
    },

    mounted() {
        try {
            this.email = usePage().props.auth.user.email;
            this.idRol = usePage().props.auth.user.rol_id;
        } catch (error) {
            console.log(error);
        }
    },

    setup() {
        const dropdownOpen = ref(false);
        const trigger = ref(null);
        const dropdown = ref(null);

        // close on click outside
        const clickHandler = ({ target }) => {
            if (
                !dropdownOpen.value ||
                dropdown.value.contains(target) ||
                trigger.value.contains(target)
            )
                return;
            dropdownOpen.value = false;
        };

        // close if the esc key is pressed
        const keyHandler = ({ keyCode }) => {
            if (!dropdownOpen.value || keyCode !== 27) return;
            dropdownOpen.value = false;
        };

        onMounted(() => {
            document.addEventListener("click", clickHandler);
            document.addEventListener("keydown", keyHandler);
        });

        onUnmounted(() => {
            document.removeEventListener("click", clickHandler);
            document.removeEventListener("keydown", keyHandler);
        });

        return {
            dropdownOpen,
            trigger,
            dropdown,
        };
    },
};
</script>
