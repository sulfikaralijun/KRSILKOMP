<script setup>
import { usePage } from '@inertiajs/vue3';
import { Bell, LayoutGrid, MoreHorizontal } from 'lucide-vue-next';
const page = usePage().props;
const props = defineProps({});

const courses = [
    {
        title: 'Belajar HTML Dasar',
        mentor: {
            name: 'Bagas Mahpie',
            avatar: 'https://randomuser.me/api/portraits/men/1.jpg',
        },
        category: 'HTML',
        description:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, voluptates.',
        image: 'https://randomuser.me/api/portraits/men/1.jpg',
        icon: LayoutGrid,
    },
];

const activityBars = [
    { date: 1, height: 40, isActive: true },
    { date: 2, height: 20 },
    { date: 3, height: 60 },
    { date: 4, height: 40 },
    { date: 5, height: 10 },
    { date: 6, height: 20 },
    { date: 7, height: 40 },
    { date: 8, height: 20 },
    { date: 9, height: 60 },
    { date: 10, height: 40 },
    { date: 11, height: 10 },
    { date: 12, height: 20 },
    { date: 13, height: 40 },
    { date: 14, height: 20 },
    { date: 15, height: 60 },
    { date: 16, height: 40 },
    { date: 17, height: 10 },
    { date: 18, height: 20 },
    { date: 19, height: 40 },
    { date: 20, height: 20 },
    { date: 21, height: 60 },
    { date: 22, height: 40 },
    { date: 23, height: 10 },
    { date: 24, height: 20 },
    { date: 25, height: 40 },
    { date: 26, height: 20 },
    { date: 27, height: 60 },
    { date: 28, height: 40 },
    { date: 29, height: 10 },
    { date: 30, height: 20 },
];

const yourLessons = [
    {
        title: 'Belajar HTML Dasar',
        mentor: {
            name: 'Bagas Mahpie',
            avatar: 'https://randomuser.me/api/portraits/men/1.jpg',
        },
        category: 'HTML',
        description:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, voluptates.',
        image: 'https://randomuser.me/api/portraits/men/1.jpg',
        icon: LayoutGrid,
    },
];

const continueLessons = [
    {
        title: 'Belajar HTML Dasar',
        mentor: {
            name: 'Bagas Mahpie',
            avatar: 'https://randomuser.me/api/portraits/men/1.jpg',
        },
        category: 'HTML',
        description:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, voluptates.',
        image: 'https://randomuser.me/api/portraits/men/1.jpg',
        icon: LayoutGrid,
    },
];

const mentors = [
    {
        name: 'Bagas Mahpie',
        avatar: 'https://randomuser.me/api/portraits/men/1.jpg',
    },
];
</script>
<template>
    <!-- Right Sidebar -->
    <aside class="w-80 hidden lg:block p-4">
        <div class="flex items-center space-x-4 m-4">
            <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                <Bell class="w-5 h-5" />
            </button>
            <img
                src="https://randomuser.me/api/portraits/men/1.jpg"
                alt="Jason Ranti"
                class="w-8 h-8 rounded-full" />
        </div>
        <div class="p-4 bg-white h-screen rounded-2xl">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">Statistic</h2>
                <button class="text-gray-400">
                    <MoreHorizontal class="w-5 h-5" />
                </button>
            </div>

            <div class="text-center mb-8">
                <div class="relative inline-block">
                    <img
                        src="https://randomuser.me/api/portraits/men/1.jpg"
                        alt="Jason Ranti"
                        class="w-20 h-20 rounded-full" />
                    <div
                        class="absolute -top-1 -right-1 bg-purple-600 text-white text-xs rounded-full px-2 py-1">
                        5%
                    </div>
                </div>
                <h3 class="font-medium mt-4">
                    Good Morning {{ page.auth.user.name }}🔥
                </h3>
                <p class="text-sm text-gray-500">
                    Continue your learning to achieve your target!
                </p>
            </div>

            <!-- Activity Graph -->
            <div class="mb-8">
                <div class="h-40 flex items-end space-x-2">
                    <div
                        v-for="bar in activityBars"
                        :key="bar.date"
                        class="flex-1 bg-slate-400">
                        <div
                            :style="`height:${bar.height}%`"
                            :class="`${bar.isActive ? 'bg-purple-600' : 'bg-gray-200'} rounded-t-lg`"></div>
                    </div>
                </div>
                <div class="flex justify-between mt-2 text-sm text-gray-500">
                    <span>1-10 Aug</span>
                    <span>11-20 Aug</span>
                    <span>21-30 Aug</span>
                </div>
            </div>

            <!-- Your Mentor -->
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">Your mentor</h2>
                    <button class="text-purple-600 text-sm font-medium">
                        See All
                    </button>
                </div>

                <div class="space-y-4">
                    <div
                        v-for="mentor in mentors"
                        :key="mentor.name"
                        class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <img
                                :src="mentor.avatar"
                                :alt="mentor.name"
                                class="w-10 h-10 rounded-full" />
                            <div>
                                <div class="font-medium">{{ mentor.name }}</div>
                                <div class="text-sm text-gray-500">Mentor</div>
                            </div>
                        </div>
                        <button
                            class="px-4 py-1 border border-purple-600 text-purple-600 rounded-full text-sm hover:bg-purple-50">
                            Follow
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</template>
