<script setup>
import { useDark, useToggle } from '@vueuse/core';
import { Sun, MoonStar } from 'lucide-vue-next';

const isDark = useDark();
const toggleDark = useToggle(isDark);
</script>

<template>
    <div class="relative inline-block" @click="toggleDark()">
        <input
            id="darkmode-switch"
            type="checkbox"
            class="peer checked-doggle"
            :checked="isDark" />
        <span class="peer-checked:text-blue-600 doggle-peer-r">
            <Sun />
        </span>
        <span class="peer-checked:text-white doggle-peer-l">
            <MoonStar />
        </span>
    </div>
</template>

<style scoped>
.checked-doggle {
    @apply relative w-[52px] h-7 p-px bg-gray-100 border border-gray-200 text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-100 checked:border-blue-200 focus:checked:border-blue-200 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-800/30 dark:checked:border-blue-800 dark:focus:ring-offset-gray-600 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-600 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-500;
}

.doggle-peer-r {
    @apply size-6 absolute top-0.5 start-0.5 flex justify-center items-center pointer-events-none transition-colors ease-in-out duration-200 dark:text-neutral-500;
}

.doggle-peer-l {
    @apply size-6 absolute top-0.5 end-0.5 flex justify-center items-center pointer-events-none transition-colors ease-in-out duration-200 dark:text-neutral-50;
}
</style>
