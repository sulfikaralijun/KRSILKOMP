<script setup>
import { PencilLine, RefreshCw } from 'lucide-vue-next';
import { ref, onMounted, onBeforeUnmount } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    data: Object
});

const isEditing = ref(false);
const isLoading = ref(false);
const inputRef = ref(null);
const form = useForm({
    topik: props.data.topik,
    smt: props.data.smt
});

const startEdit = () => {
    isEditing.value = true;
    setTimeout(() => {
        inputRef.value?.focus();
    }, 50);
};

const submitForm = () => {
    if (form.smt === props.data.smt) {
        isEditing.value = false;
        return;
    }

    isLoading.value = true;
    form.put(route('pengajuan.update', props.data.id), {
        preserveScroll: true,
        onSuccess: () => {
            isEditing.value = false;
            isLoading.value = false;
        },
        onError: () => {
            isLoading.value = false;
        }
    });
};

const handleClickOutside = (event) => {
    if (isEditing.value && inputRef.value && !inputRef.value.contains(event.target)) {
        submitForm();
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onBeforeUnmount(() => {
    document.removeEventListener('click', handleClickOutside);
});
</script>

<template>
    <td @dblclick.stop="startEdit" class="border text-center text-gray-800 dark:text-gray-100 align-top relative group">
        <div v-if="!isEditing">
            <div class="mt-2.5">
                {{ data.smt }}
            </div>
            <div @click.stop="startEdit"
                class="absolute top-0 right-0 opacity-0 duration-200 group-hover:opacity-100 transition-opacity cursor-pointer">
                <PencilLine class="w-4 h-4" />
            </div>
        </div>
        <div v-else>
            <input ref="inputRef" type="number" v-model="form.smt" min="1" max="14" @click.stop
                class="w-full hide-arrow text-center border-none focus:ring-0 focus:outline-none dark:bg-gray-700">
            <div v-if="isLoading" class="absolute top-0 right-0">
                <RefreshCw class="w-4 h-4 animate-spin" />
            </div>
        </div>
    </td>
</template>
