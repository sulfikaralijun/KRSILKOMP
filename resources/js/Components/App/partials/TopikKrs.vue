<script setup>
import { PencilLine, RefreshCw, Sparkles } from 'lucide-vue-next';
import { getCompletion } from '@/libs/ZikAi';
import { textBold } from '@/helpers/helper';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    data: {
        type: Object,
        default: () => ({}),
    }
})

const isEdit = ref(false);
const isLoading = ref(false);

const form = useForm({
    id: props.data.id,
    topik: props.data.topik,
    smt: props.data.smt,
});

async function getCompletionResponse(message) {
    isLoading.value = true;
    try {
        const completion = await getCompletion(message);
        const text = completion.message;

        form.topik = '';

        let i = 0;
        const interval = setInterval(() => {
            form.topik += text[i];
            i++;
            if (i >= text.length) {
                clearInterval(interval);
                sendToBackend();
            }
        }, 50);
    } catch (error) {
        console.error('Error fetching completion:', error);
    } finally {
        isLoading.value = false;
    }
}

const sendToBackend = () => {
    if (form.topik !== props.data.topik) {
        form.put(route('pengajuan.update', form.id), {
            preserveScroll: true,
        });
    }
};

const onBlur = () => {
    if (form.topik !== props.data.topik) {
        sendToBackend();
    }
    isEdit.value = false;
};

const onKeyDown = (event) => {
    if (event.key === 'Enter' && !event.shiftKey) {
        event.preventDefault();
        onBlur();
    }
};
</script>

<template>
    <td class="border text-start text-gray-800 dark:text-gray-100 align-top relative cursor-text"
        @dblclick="isEdit = true">
        <template v-if="isEdit">
            <div class="flex items-start relative">
                <button @mousedown.stop="getCompletionResponse(form.topik)" type="button"
                    class="cursor-pointer absolute top-1 end-1 bg-sky-500 hover:bg-sky-600 text-white py-1 px-2 rounded z-50"
                    :disabled="isLoading">
                    <template v-if="isLoading">
                        <RefreshCw class="w-4 h-4 animate-spin" />
                    </template>
                    <template v-else>
                        <Sparkles class="w-4 h-4" />
                    </template>
                </button>

                <textarea :key="form.id" :id="'topik' + form.id" rows="5"
                    class="w-full p-2 dark:text-gray-800 overflow-hidden border border-none" v-model="form.topik"
                    @blur="onBlur" @keydown="onKeyDown" @input="(event) => {
                        event.target.style.height = 'auto';
                        event.target.style.height = event.target.scrollHeight + 'px';
                    }"></textarea>
            </div>
        </template>

        <template v-else>
            <div class="flex items-start">
                <!-- {{ form.id }} -->
                <div class="w-full" v-html="textBold(form?.topik || '-')"></div>
                <template v-if="form.processing">
                    <RefreshCw class="w-4 h-4 ml-1 animate-spin" />
                </template>
                <template v-else>
                    <PencilLine class="w-4 h-4 ml-1 cursor-pointer" @click="isEdit = true" />
                </template>
            </div>
        </template>
    </td>
</template>
