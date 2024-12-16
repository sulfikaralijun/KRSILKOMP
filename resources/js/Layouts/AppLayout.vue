<script setup>
import LogoKrs from '@/Components/App/LogoKrs.vue';
import SignOutApp from '@/Components/App/SignOutApp.vue';
import Menus from '@/Components/App/Menus.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Settings, Search } from 'lucide-vue-next';
import ToggleDarkMode from '@/Components/App/ToggleDarkMode.vue';

defineProps({
    title: String,
});
</script>

<template>

    <Head :title="title" />
    <keep-alive>
        <div class="min-h-screen bg-[#F5F6FB] dark:bg-gray-900 flex">
            <!-- Left Sidebar -->
            <aside class="w-64 bg-white dark:bg-gray-800 hidden md:block me-4">
                <div class="p-4">
                    <LogoKrs />
                    <Menus />
                    <slot name="friends" />

                    <div class="mt-8">
                        <div class="text-sm text-gray-500 dark:text-gray-400 px-4 mb-2">SETTINGS</div>
                        <Link :href="route('profile.show')"
                            class="flex items-center space-x-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-900 rounded-lg">
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
                    <div class="sticky top-0 z-50 bg-[#F5F6FB] dark:bg-gray-900">
                        <div class="flex items-center justify-between mb-6 gap-3 px-8">
                            <div class="relative flex-1 max-w-2xl">
                                <Search class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                                <input type="text" placeholder="Search your course..."
                                    class="w-full pl-10 pr-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-purple-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white" />
                            </div>
                            <ToggleDarkMode />
                        </div>
                    </div>
                    <slot />
                </div>
            </main>

            <slot name="right-sidebar" />
        </div>
    </keep-alive>
</template>
