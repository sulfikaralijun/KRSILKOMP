<script setup>
import { useForm } from '@inertiajs/vue3';
import { getCurrentFormattedDate } from '@/helpers/helper';
import { defineProps, defineEmits, ref } from 'vue';
import { CheckIcon, RefreshCw, Sparkles, XIcon } from 'lucide-vue-next';
import { getCompletion } from '@/libs/ZikAi';

defineProps({
    data: Object,
    showNewRow: Boolean,
});

const emit = defineEmits(['cancel']);
const isLoading = ref(false);
const newPengajuan = useForm({
    topik: '',
    smt: ''
});

const maxTopikLength = 255;

function cancelPengajuan() {
    newPengajuan.reset();
    emit('cancel');
}

async function getCompletionResponse(message) {
    isLoading.value = true;
    try {
        const completion = await getCompletion(message);
        const text = completion.message;

        newPengajuan.topik = '';

        let i = 0;
        const interval = setInterval(() => {
            newPengajuan.topik += text[i];
            i++;
            if (i >= text.length) {
                clearInterval(interval);
            }
        }, 50);
    } catch (error) {
        console.error('Error fetching completion:', error);
    } finally {
        isLoading.value = false;
    }
}

function savePengajuan() {
    newPengajuan.post(route('pengajuan.store'), {
        onSuccess: () => {
            newPengajuan.reset();
            emit('cancel');
        }
    });
}

const validateSmt = (event) => {
    if (event.target.value < 1) {
        event.target.value = 1;
    } else if (event.target.value > 14) {
        event.target.value = 14;
    }
};

const validateKeydown = (event) => {
    return event.keyCode !== 38 && event.keyCode !== 40;
};

</script>
<template>
    <tr v-if="showNewRow">
        <td class="border text-center px-6 py-3 text-gray-800 dark:text-gray-100">
            {{ data.pengajuans.length + 1 }}
        </td>
        <td class="border text-center px-6 py-3 text-gray-800 dark:text-gray-100 text-sm">
            {{ getCurrentFormattedDate() }}
        </td>
        <td class="border text-center text-gray-800 dark:text-gray-100 align-top relative cursor-text">
            <div class="flex items-start relative">
                <button type="button" @click="getCompletionResponse(newPengajuan.topik)"
                    class="cursor-pointer absolute top-1 end-1 bg-sky-500 hover:bg-sky-600 text-white py-1 px-2 rounded z-50"
                    :disabled="isLoading">
                    <template v-if="isLoading">
                        <RefreshCw class="w-4 h-4 animate-spin" />
                    </template>
                    <template v-else>
                        <Sparkles class="w-4 h-4" />
                    </template>
                </button>
                <textarea v-model="newPengajuan.topik"
                    class="w-full p-2 dark:bg-gray-700 overflow-hidden border border-none"
                    placeholder="Masukkan Topik Konsultasi Anda." maxlength="255" @input="(event) => {
                        event.target.style.height = 'auto';
                        event.target.style.height = event.target.scrollHeight + 'px';
                    }"></textarea>
                <div class="absolute bottom-1 right-1 text-xs text-gray-500">
                    {{ newPengajuan.topik.length }} / {{ maxTopikLength }}
                </div>
            </div>
        </td>
        <td class="border text-center text-gray-800 dark:text-gray-100">
            <input v-model="newPengajuan.smt" type="number"
                class="w-full hide-arrow text-center border-none focus:ring-0 focus:outline-none" placeholder="SMT"
                min="1" max="14" @input="validateSmt" @keydown="validateKeydown" />
        </td>
        <td>
            <div class="flex items-center justify-center gap-2">
                <button @click="savePengajuan" :disabled="newPengajuan.processing"
                    :class="{ 'bg-gray-300': newPengajuan.processing }" class="zbutton-primary p-0.5 px-2">
                    <CheckIcon />
                </button>
                <button @click="cancelPengajuan" class="zbutton-danger p-0.5 px-2">
                    <XIcon />
                </button>
            </div>
        </td>
    </tr>
</template>
