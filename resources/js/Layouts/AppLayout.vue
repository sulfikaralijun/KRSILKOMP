<script setup>
import LogoKrs from '@/Components/App/LogoKrs.vue';
import SignOutApp from '@/Components/App/SignOutApp.vue';
import Menus from '@/Components/App/Menus.vue';
import { Head, Link } from '@inertiajs/vue3';
import ToggleDarkMode from '@/Components/App/ToggleDarkMode.vue';
import { Settings, Search, PanelLeft, X } from 'lucide-vue-next';
import { ref, onMounted, watch } from 'vue';
import ToastAlert from '@/Components/App/partials/ToastAlert.vue';

defineProps({
    title: String,
});

const leftSideBarActive = ref(true);
const leftSideBar = ref(null);
const panelLeft = ref(null);

onMounted(() => {
    const savedState = localStorage.getItem('leftSideBarActive');
    if (savedState !== null) {
        leftSideBarActive.value = JSON.parse(savedState);
    }
});

watch(leftSideBarActive, (newValue) => {
    localStorage.setItem('leftSideBarActive', JSON.stringify(newValue));
});
</script>

<template>

    <Head :title="title" />
    <keep-alive>
        <div class="min-h-screen bg-[#F5F6FB] dark:bg-gray-900 flex relative">
            <!-- Left Sidebar -->
            <aside ref="leftSideBar" :class="[
                'bg-white dark:bg-gray-800 fixed md:relative z-50 transition-all duration-500 ease-in-out',
                leftSideBarActive ? 'w-64 translate-x-0' : 'w-20 -translate-x-full md:translate-x-0',
            ]">
                <div class="p-4">
                    <div class="flex items-center mb-4"
                        :class="leftSideBarActive ? 'justify-between' : 'justify-center'">
                        <LogoKrs :leftSideBarActive="leftSideBarActive" />
                        <!-- Close Button for Small Screens -->
                        <button @click="leftSideBarActive = !leftSideBarActive"
                            class="md:hidden p-2 rounded-full bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
                            <X class="w-6 h-6" />
                        </button>
                    </div>
                    <Menus :compact="!leftSideBarActive" />
                    <slot name="friends" v-if="leftSideBarActive" />
                    <!-- settings -->
                    <div class="mt-8">
                        <div class="text-sm text-gray-500 px-4 mb-2">
                            <span v-if="leftSideBarActive">SETTINGS</span>
                            <span v-else>
                                <hr>
                            </span>
                        </div>
                        <Link :href="route('profile.show')"
                            class="flex items-center space-x-3 px-4 py-2 text-gray-600 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-900 rounded-lg">
                            <Settings class="w-5 h-5" />
                            <span v-if="leftSideBarActive">Setting</span>
                        </Link>
                        <SignOutApp :compact="!leftSideBarActive" />
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main :key="$page.url" class="flex-1 overflow-auto">
                <div class="p-4">
                    <!-- Search Bar -->
                    <div class="flex gap-6 items-center justify-between mb-6">
                        <!-- PanelLeft Icon (visible di semua media) -->
                        <PanelLeft ref="panelLeft" @click="leftSideBarActive = !leftSideBarActive"
                            class="h-6 w-6 cursor-pointer ring-offset-1 hover:ring-2 ring-blue-500 rounded-sm transition-colors duration-100 hover:text-blue-500" />
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
