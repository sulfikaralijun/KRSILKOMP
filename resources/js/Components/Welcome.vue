<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import {
    ArrowRight,
    ChevronLeft,
    ChevronRight,
    MoreVertical,
} from 'lucide-vue-next';
</script>

<template>
    <!-- Hero Banner -->
    <div
        class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl p-8 mb-6 text-white relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-2xl font-bold mb-2">
                Sharpen Your Skills with<br />Professional Online Courses
            </h1>
            <button
                class="bg-black text-white px-6 py-2 rounded-full mt-4 flex items-center space-x-2">
                <span>Join Now</span>
                <ArrowRight class="w-4 h-4" />
            </button>
        </div>
        <div class="absolute right-0 top-0 h-full w-1/3">
            <div class="absolute right-8 top-1/2 transform -translate-y-1/2">
                <div class="w-20 h-20 bg-white/20 rounded-full"></div>
                <div
                    class="w-32 h-32 bg-white/10 rounded-full absolute -top-8 -right-8"></div>
            </div>
        </div>
    </div>

    <!-- Course Progress -->
    <!-- <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div v-for="course in courses" :key="course.name" class="bg-white p-4 rounded-xl shadow-sm">
            <div class="flex justify-between items-start mb-4">
                <div class="flex items-center space-x-3">
                    <div :class="`w-10 h-10 rounded-lg ${course.bgColor} flex items-center justify-center`">
                        <component :is="course.icon" class="w-5 h-5 text-white" />
                    </div>
                    <div>
                        <h3 class="font-medium">{{ course.name }}</h3>
                        <p class="text-sm text-gray-500">{{ course.progress }} watched</p>
                    </div>
                </div>
                <button class="text-gray-400">
                    <MoreVertical class="w-5 h-5" />
                </button>
            </div>
        </div>
    </div> -->

    <!-- Continue Watching -->
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Continue Watching</h2>
            <div class="flex space-x-2">
                <button class="p-2 rounded-lg bg-gray-100">
                    <ChevronLeft class="w-5 h-5" />
                </button>
                <button class="p-2 rounded-lg bg-purple-600 text-white">
                    <ChevronRight class="w-5 h-5" />
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- <div v-for="lesson in continueLessons" :key="lesson.title"
                class="bg-white rounded-xl overflow-hidden shadow-sm">
                <div class="relative">
                    <img :src="lesson.image" :alt="lesson.title" class="w-full h-48 object-cover">
                    <button class="absolute top-2 right-2 p-2 bg-black/50 rounded-full text-white">
                        <Heart class="w-5 h-5" />
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex items-center space-x-2 text-sm text-purple-600 mb-2">
                        <component :is="lesson.icon" class="w-4 h-4" />
                        <span>{{ lesson.category }}</span>
                    </div>
                    <h3 class="font-medium mb-4">{{ lesson.title }}</h3>
                    <div class="flex items-center space-x-3">
                        <img :src="lesson.mentor.avatar" :alt="lesson.mentor.name" class="w-8 h-8 rounded-full">
                        <div>
                            <div class="text-sm font-medium">{{ lesson.mentor.name }}</div>
                            <div class="text-xs text-gray-500">Mentor</div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <!-- Your Lessons -->
    <div>
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Your Lesson</h2>
            <button class="text-purple-600 text-sm font-medium">See All</button>
        </div>

        <!-- <div class="bg-white rounded-xl overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">MENTOR</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">TYPE</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">DESC</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">ACTION</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr v-for="lesson in yourLessons" :key="lesson.id">
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-3">
                                <img :src="lesson.mentor.avatar" :alt="lesson.mentor.name" class="w-8 h-8 rounded-full">
                                <div>
                                    <div class="text-sm font-medium">{{ lesson.mentor.name }}</div>
                                    <div class="text-xs text-gray-500">{{ lesson.date }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 bg-purple-50 text-purple-600 rounded-full text-sm">
                                {{ lesson.type }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">{{ lesson.description }}</td>
                        <td class="px-4 py-3">
                            <button class="p-2 text-gray-400 hover:text-gray-600">
                                <ArrowRight class="w-5 h-5" />
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> -->
    </div>
</template>
