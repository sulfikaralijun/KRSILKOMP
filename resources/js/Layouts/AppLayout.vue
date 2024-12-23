<script setup>
import LogoKrs from '@/Components/App/LogoKrs.vue';
import SignOutApp from '@/Components/App/SignOutApp.vue';
import Menus from '@/Components/App/Menus.vue';
import { Head, Link } from '@inertiajs/vue3';
import ToggleDarkMode from '@/Components/App/ToggleDarkMode.vue';
import { Settings, Search, PanelLeft } from 'lucide-vue-next';
import { onMounted, onUnmounted, ref } from 'vue';
import ToastAlert from '@/Components/App/partials/ToastAlert.vue';

defineProps({
    title: String,
});

const leftSideBarActive = ref(false);
const leftSideBar = ref(null);
const panelLeft = ref(null);
function handleClickOutside(event) {
    if (
        leftSideBarActive.value &&
        !leftSideBar.value.contains(event.target) &&
        !panelLeft.value.contains(event.target)
    ) {
        leftSideBarActive.value = false;
    }
}

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});
onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});
</script>

<template>

    <Head :title="title" />
    <keep-alive>
        <div class="min-h-screen bg-[#F5F6FB] dark:bg-gray-900 flex relative">
            <!-- Left Sidebar -->
            <aside ref="leftSideBar" :class="[
                'w-64 bg-white dark:bg-gray-800 absolute md:relative z-50 transition-all duration-500 -left-full md:left-0  md:block me-4',
                leftSideBarActive ? 'left-0' : '-left-full',
            ]">
                <div class="p-4">
                    <LogoKrs />
                    <Menus />
                    <slot name="friends" />

                    <div class="mt-8">
                        <div class="text-sm text-gray-500 px-4 mb-2">
                            SETTINGS
                        </div>
                        <Link :href="route('profile.show')"
                            class="flex items-center space-x-3 px-4 py-2 text-gray-600 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-900 rounded-lg">
                        <Settings class="w-5 h-5" />
                        <span>Setting</span>
                        </Link>
                        <SignOutApp />
                    </div>
                </div>
            </aside>
            <!-- Main Content -->
            <main :key="$page.url" class="flex-1 overflow-auto">
                <div class="p-4">
                    <!-- Search Bar -->
                    <div class="flex gap-6 items-center justify-between mb-6">
                        <PanelLeft ref="panelLeft" @click="leftSideBarActive = !leftSideBarActive"
                            class="md:hidden h-6 w-6 cursor-pointer ring-offset-1 hover:ring-2 ring-blue-500 rounded-sm transition-colors duration-100 hover:text-blue-500" />
                        <div class="relative flex-1 max-w-2xl">
                            <Search
                                class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 dark:text-gray-600 w-5 h-5" />
                            <input type="text" placeholder="Search your course..."
                                class="w-full pl-10 pr-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-purple-500 dark:bg-gray-800" />
                        </div>
                        <ToggleDarkMode />
                    </div>
                    <slot />
                </div>
                <!-- Toast Container -->
                <ToastAlert :errors="$page.props.errors" />
            </main>

            <slot name="right-sidebar" />
        </div>
    </keep-alive>
</template>
