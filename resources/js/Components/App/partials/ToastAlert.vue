<template>
    <div v-if="errors && Object.keys(errors).length" class="fixed top-4 right-4">
        <transition-group name="toast" tag="div">
            <div v-for="(error, key) in errors" :key="key"
                class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-neutral-800 dark:border-neutral-700 mb-2"
                role="alert" tabindex="-1" aria-labelledby="hs-toast-condensed-label">
                <div class="flex p-4">
                    <p id="hs-toast-condensed-label" class="text-sm text-gray-700 dark:text-neutral-400">
                        {{ error }}
                    </p>
                    <div class="ms-auto flex items-center space-x-3">
                        <button type="button"
                            class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-white"
                            aria-label="Close" @click="removeError(key)">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </transition-group>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    errors: Object
});

const removeError = (key) => {
    delete props.errors[key];
};
</script>

<style scoped>
.toast-enter-active,
.toast-leave-active {
    transition: opacity 0.5s, transform 0.5s;
}

.toast-enter-from,
.toast-leave-to {
    opacity: 0;
    transform: translateX(20px);
}
</style>
