<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';
import {
    Calendar,
    FileText,
    User,
    LayoutDashboard,
    FilePlus,
    MessageSquare,
    Settings,
    LogOut,
} from 'lucide-vue-next';

const props = defineProps({
    on: {
        type: Boolean,
        default: false,
    },
    panelLeftRef: {
        type: Object,
    }
});


const emit = defineEmits(['update']);

const navigations = {
    mahasiswa: [
        { name: 'Dashboard', path: 'dashboard', icon: LayoutDashboard },
        { name: 'KRS Registration', path: 'krs-registration', icon: FilePlus },
        { name: 'Class Schedule', path: 'class-schedule', icon: Calendar },
        {
            name: 'Grades & Transcript',
            path: 'grades-transcript',
            icon: FileText,
        },
        {
            name: 'Academic Consultation',
            path: 'academic-consultation',
            icon: MessageSquare,
        },
        { name: 'Profile', path: 'profile', icon: User },
    ],
    dosen: [
        { name: 'Dashboard', path: 'dashboard' },
        { name: 'Course Management', path: 'course-management' },
        { name: 'KRS Monitoring', path: 'krs-monitoring' },
        { name: 'KRS Approval', path: 'krs-approval' },
        { name: 'Academic Report', path: 'academic-report' },
        { name: 'System Settings', path: 'system-settings' },
    ],
};

console.log(props.panelLeftRef);

const sideBarRef = ref(null);

defineExpose({
    sideBarRef
})

const handleClickOutside = (event) => {
    if (
        props.on &&
        !sideBarRef.value.contains(event.target) &&
        !props.panelLeftRef?.contains(event.target)
    ) {
        emit('update', false);
        console.log('Klik diluar sidebar');
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});

import logo from '@/assets/logo.png'

</script>

<template>
    <aside
        ref="sideBarRef"
        :class="[
            'w-64 bg-white absolute md:left-0 transition-all duration-500 ease-in-out md:block md:relative me-4 z-10',
            on ? 'left-0' : '-left-full',
        ]">
        <div class="p-4">
            <div class="flex items-center space-x-2">
                <div
                    class="w-8 h-8 rounded-lg flex items-center justify-center">
                    <img
                        :src="logo"
                        alt="ilkomp"
                        class="rounded" />
                </div>
                <span class="text-xl font-semibold">KRS ILKOMP</span>
            </div>

            <nav class="mt-8 space-y-2">
                <div class="text-sm text-gray-500 px-4 mb-2">OVERVIEW</div>
                <Link
                    v-for="{ name, path, icon } in navigations.mahasiswa"
                    :href="route(path)"
                    :class="[
                        'flex items-center space-x-3 px-4 py-2 rounded-lg cursor-pointer',
                        route().current() == path
                            ? 'text-blue-600 bg-blue-50'
                            : 'text-gray-600 hover:bg-gray-100',
                    ]">
                    <component :is="icon" class="w-5 h-5" />
                    <span>{{ name }}</span>
                </Link>
            </nav>

            <slot name="friends" />

            <div class="mt-8">
                <div class="text-sm text-gray-500 px-4 mb-2">SETTINGS</div>
                <Link
                    :href="route('profile.show')"
                    class="flex items-center space-x-3 px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <Settings class="w-5 h-5" />
                    <span>Setting</span>
                </Link>
                <a
                    href="#"
                    class="flex items-center space-x-3 px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg">
                    <LogOut class="w-5 h-5" />
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </aside>
</template>
