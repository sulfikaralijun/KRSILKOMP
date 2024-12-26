<script setup>
import { inject } from 'vue';
import { Link } from '@inertiajs/vue3'
import { Settings, X } from 'lucide-vue-next';
import LogoKrs from '@/Components/App/LogoKrs.vue';
import Menus from '@/Components/App/Menus.vue';
import SignOutApp from '@/Components/App/SignOutApp.vue';

const toggleSidebar = inject('toggleSidebar');
const isSidebarOpen = inject('isSidebarOpen');
</script>

<template>
    <aside
        :class="[
            'fixed top-0 left-0 h-screen bg-white dark:bg-gray-800 w-64 z-50 transition-transform duration-300',
            isSidebarOpen ? 'translate-x-0' : '-translate-x-full',
        ]"
    >
        <div class="p-4 flex justify-between items-center border-b dark:border-gray-700">
            <LogoKrs />
            <!-- Close Button -->
            <button
                @click="toggleSidebar"
                class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 md:hidden"
            >
                <X class="w-5 h-5" />
            </button>
        </div>
        <div class="p-4">
            <Menus />
            <slot name="friends" />
            <div class="mt-8">
                <div class="text-sm text-gray-500 px-4 mb-2">SETTINGS</div>
                <Link :href="route('profile.show')"
                    class="flex items-center space-x-3 px-4 py-2 text-gray-600 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-900 rounded-lg">
                    <Settings class="w-5 h-5" />
                    <span>Setting</span>
                </Link>
                <SignOutApp />
            </div>
        </div>
    </aside>
</template>
