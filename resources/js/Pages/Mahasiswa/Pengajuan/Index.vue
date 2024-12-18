<script setup>
import PaperKrs from '@/Components/App/PaperKrs.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

const data = [
    {
        id: 1,
        topik: 'Topik 1',
        tanggal: '2023-01-01',
        smt: 1,
        paraf: 'Paraf 1',
    },
    {
        id: 2,
        topik: 'Topik 2',
        tanggal: '2025-02-02',
        smt: 2,
        paraf: 'Paraf 2',
    },
    {
        id: 3,
        topik: 'Topik 3',
        tanggal: '2025-06-03',
        smt: 3,
        paraf: 'Paraf 1',
    },
];
</script>
<template>
    <AppLayout :title="'Pengajuan'">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm dark:shadow-gray-800 sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-700 rounded-xl dark:bg-gray-800">
                    <PaperKrs :data="data" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
