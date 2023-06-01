<template>
    <header class="sticky top-0 bg-white border-b border-slate-200 z-30">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 -mb-px">
                <!-- Header: Left side -->
                <div class="flex">
                    <!-- Hamburger button -->
                    <button
                        class="text-slate-500 hover:text-slate-600 lg:hidden"
                        @click.stop="$emit('toggle-sidebar')"
                        aria-controls="sidebar"
                        :aria-expanded="sidebarOpen"
                    >
                        <span class="sr-only">Open sidebar</span>
                        <svg
                            class="w-6 h-6 fill-current"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <rect x="4" y="5" width="16" height="2" />
                            <rect x="4" y="11" width="16" height="2" />
                            <rect x="4" y="17" width="16" height="2" />
                        </svg>
                    </button>
                </div>
                <!-- Header: Right side -->
                <div class="flex items-center space-x-3">
                    <!-- Divider -->
                    <hr class="w-px h-6 bg-slate-200" />
                    <UserMenu align="right" />
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import { ref } from "vue";

import SearchModal from "../components/ModalSearch.vue";
import Notifications from "../components/DropdownNotifications.vue";
import Help from "../components/DropdownHelp.vue";
import UserMenu from "../components/DropdownProfile.vue";

export default {
    name: "Header",
    props: ["sidebarOpen"],
    components: {
        SearchModal,
        Notifications,
        Help,
        UserMenu,
    },
    setup() {
        const searchModalOpen = ref(false);
        return {
            searchModalOpen,
        };
    },
};
</script>
