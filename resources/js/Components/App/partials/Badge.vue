<script setup>
const props = defineProps({
    color: {
        type: String,
        default: 'blue'
    }
});
</script>

<template>
    <span
        :class="`inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-lg text-xs font-medium bg-${color}-100 text-${color}-800 dark:bg-${color}-800/30 dark:text-${color}-500`">
        <slot />
    </span>
</template>
