<script setup>
import TopikKrs from './partials/TopikKrs.vue';
import AddPaper from './partials/AddPaper.vue';
import { Plus, X } from 'lucide-vue-next';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { getCurrentFormattedDate } from '@/helpers/helper';

defineProps({
    data: Object,
    dosen: Array
});

const showNewRow = ref(false);
const newPengajuan = useForm({
    topik: '',
    smt: ''
});

function addPengajuan() {
    showNewRow.value = true;
}

function cancelPengajuan() {
    showNewRow.value = false;
    newPengajuan.reset();
}

function savePengajuan() {
    newPengajuan.post(route('pengajuan.store'), {
        onSuccess: () => {
            showNewRow.value = false;
            newPengajuan.reset();
        }
    });
}
</script>
<template>
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <AddPaper v-if="!data?.pengajuans?.length" />
                <div class="overflow-hidden">
                    <table width="100%" class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 border">
                        <thead>
                            <tr>
                                <th width="2%" class="table-head">No</th>
                                <th width="28%" class="px-6 py-3 table-head">Tanggal</th>
                                <th width="50%" class="px-6 py-3 table-head">Topik Konsultasi</th>
                                <th width="5%" class="px-6 py-3 table-head">SMT</th>
                                <th width="15%" class="px-6 py-3 table-head">Paraf PA</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            <tr v-if="!data?.pengajuans && !showNewRow">
                                <td colspan="5" class="border text-center px-6 py-3 text-gray-800 dark:text-gray-100">
                                    Tidak ada data
                                </td>
                            </tr>
                            <tr v-for="(d, index) in data.pengajuans" :key="d.id" v-else>
                                <td class="border text-center px-6 py-3 text-gray-800 dark:text-gray-100">
                                    {{ index + 1 }}
                                </td>
                                <td class="border text-center px-6 py-3 text-gray-800 dark:text-gray-100 text-sm">
                                    {{ d.created_at }}
                                </td>
                                <TopikKrs :data="d" />
                                <td class="border text-center px-6 py-3 text-gray-800 dark:text-gray-100">
                                    {{ d.smt }}
                                </td>
                                <td class="border text-center px-6 py-3 text-gray-800 dark:text-gray-100">
                                    {{ d.paraf }}
                                </td>
                            </tr>
                            <tr v-if="showNewRow">
                                <td class="border text-center px-6 py-3 text-gray-800 dark:text-gray-100">
                                    {{ data.pengajuans.length + 1 }}
                                </td>
                                <td class="border text-center px-6 py-3 text-gray-800 dark:text-gray-100 text-sm">
                                    {{ getCurrentFormattedDate() }}
                                </td>
                                <td class="border text-center text-gray-800 dark:text-gray-100">
                                    <input v-model="newPengajuan.topik" type="text" class="w-full"
                                        placeholder="Topik Konsultasi" />
                                </td>
                                <td class="border text-center text-gray-800 dark:text-gray-100">
                                    <input v-model="newPengajuan.smt" type="text" class="w-full" placeholder="SMT" />
                                </td>
                                <td class="border text-center px-6 py-3 text-gray-800 dark:text-gray-100">
                                    <button @click="savePengajuan"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Save</button>
                                    <button @click="cancelPengajuan"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Cancel</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="border border-none text-center py-2 align-bottom relative overflow-visible">
                    <button @click="addPengajuan"
                        class="bg-blue-500 hover:bg-blue-700 dark:bg-blue-200 text-white dark:text-gray-800 font-bold rounded absolute bottom-2 right-0 translate-x-1.5 p-0.5">
                        <Plus height="18" width="18" />
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.table-head {
    @apply border text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500;
}
</style>
