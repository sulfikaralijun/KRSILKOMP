<script setup>
import ListKrs from '@/Components/App/ListKrs.vue';
import PaperKrs from '@/Components/App/PaperKrs.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
const page = usePage().props;
const isMahasiswa = computed(() => page.auth.user.roles[0].name === 'mahasiswa');
defineProps({
    krs: Object
})
</script>
<template>
    <AppLayout :title="'Pengajuan'">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm dark:shadow-gray-800 sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-700 rounded-xl dark:bg-gray-800">
                    <PaperKrs v-if="isMahasiswa" :data="krs.data" />
                    <ListKrs v-else />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
