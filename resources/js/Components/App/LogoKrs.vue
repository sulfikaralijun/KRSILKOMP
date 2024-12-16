<template>
    <lazy-component>
        <div class="flex items-center space-x-2">
            <div
                class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center">
                <img
                    v-lazy="'/assets/img/logokrs.jpg'"
                    alt="ilkomp"
                    class="rounded" />
            </div>
            <span class="text-xl font-semibold">KRS ILKOMP</span>
        </div>
    </lazy-component>
</template>
