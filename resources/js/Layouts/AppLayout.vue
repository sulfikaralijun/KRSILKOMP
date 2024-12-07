<script setup>
import { Head, usePage, Link } from '@inertiajs/vue3';
import {
    Plus, LayoutGrid, Inbox, BookOpen, CheckSquare, Users, Settings, LogOut,
    Search, Bell, ArrowRight, MoreVertical, ChevronLeft, ChevronRight,
    Heart, MoreHorizontal
} from 'lucide-vue-next'

const page = usePage().props;
defineProps({
    title: String
})
const menuItems = [
    { name: 'Inbox', icon: Inbox },
    { name: 'Lesson', icon: BookOpen },
    { name: 'Task', icon: CheckSquare },
    { name: 'Group', icon: Users },
]

</script>

<template>

    <Head :title="title" />

    <div class="min-h-screen bg-[#F5F6FB] flex">
        <!-- Left Sidebar -->
        <aside class="w-64 bg-white hidden md:block me-4">
            <div class="p-4">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center">
                        <img src="https://pps.whatsapp.net/v/t61.24694-24/420482609_1279759263406633_4540009633187187378_n.jpg?ccb=11-4&oh=01_Q5AaIB9scMCzQJRxUWSF5182XED41x7-sZY0fqO-2rV5dzwA&oe=6752B39D&_nc_sid=5e03e0&_nc_cat=104"
                            alt="ilkomp" class="rounded">
                    </div>
                    <span class="text-xl font-semibold">KRS ILKOMP</span>
                </div>

                <nav class="mt-8 space-y-2">
                    <div class="text-sm text-gray-500 px-4 mb-2">OVERVIEW</div>
                    <Link :href="route('dashboard')"
                        class="flex items-center space-x-3 px-4 py-2 text-purple-600 bg-purple-50 rounded-lg">
                    <LayoutGrid class="w-5 h-5" />
                    <span>Dashboard</span>
                    </Link>
                    <a v-for="item in menuItems" :key="item.name"
                        class="flex items-center space-x-3 px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                        <component :is="item.icon" class="w-5 h-5" />
                        <span>{{ item.name }}</span>
                    </a>
                </nav>

                <slot name="friends" />

                <div class="mt-8">
                    <div class="text-sm text-gray-500 px-4 mb-2">SETTINGS</div>
                    <Link :href="route('profile.show')"
                        class="flex items-center space-x-3 px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <Settings class="w-5 h-5" />
                    <span>Setting</span>
                    </Link>
                    <a href="#" class="flex items-center space-x-3 px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg">
                        <LogOut class="w-5 h-5" />
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto">
            <div class="p-4">
                <!-- Search Bar -->
                <div class="flex items-center justify-between mb-6">
                    <div class="relative flex-1 max-w-2xl">
                        <Search class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                        <input type="text" placeholder="Search your course..."
                            class="w-full pl-10 pr-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                </div>

                <slot />
            </div>
        </main>

        <slot name="right-sidebar" />
    </div>
</template>
