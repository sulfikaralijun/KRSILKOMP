<script setup>
import { router } from '@inertiajs/vue3';
import { LogOut } from 'lucide-vue-next';
const logout = () => {
    router.post(route('logout'));
};
</script>
<template>
    <form @submit.prevent="logout">
        <button
            type="submit"
            class="flex items-center space-x-3 px-4 py-2 text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-gray-900 rounded-lg w-full">
            <LogOut class="w-5 h-5" />
            <span>Logout</span>
        </button>
    </form>
</template>
