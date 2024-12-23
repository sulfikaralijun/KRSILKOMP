<script setup>
import { computed, ref } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import Modal from '@/Components/atoms/Modal.vue';
import PaperIcon from '@/Components/Icons/PaperIcon.vue';
import ItemSearch from './ItemSearch.vue';
import DangerButton from '@/Components/atoms/DangerButton.vue';
import PrimaryButton from '@/Components/atoms/PrimaryButton.vue';
import InputLabel from '@/Components/atoms/InputLabel.vue';
import Badge from './Badge.vue';
import { Trash } from 'lucide-vue-next';
const page = usePage().props;
const form = useForm({
    dosen_id: null,
    dosen_pa_id: null,
});

const isOpen = ref(false);
const selectedDosen = ref([
    { dosen_koor: null, dosen_pa: null },
]);

const openModal = () => {
    isOpen.value = true;
};

const submit = () => {
    form.post(route('pengajuan.store'), {
        preserveScroll: true,
        onSuccess: () => {
            isOpen.value = false;
        },
        onError: (e) => {
            console.log(e);
        }
    });
};

const selectDosenKoordinator = (dosen) => {
    form.dosen_id = dosen.id;
    selectedDosen.value.dosen_koor = dosen;
}

const selectDosenPa = (dosen) => {
    form.dosen_pa_id = dosen.id;
    selectedDosen.value.dosen_pa = dosen;
}

const closeModal = () => {
    isOpen.value = false;
    form.reset();
    selectedDosen.value = [];
}
</script>
<template>
    <div class="flex justify-end mb-4">
        <Modal :show="isOpen" @close="isOpen = false">
            <div class="p-6">
                <div class="mb-3 border rounded-2xl p-12 flex flex-col items-center bg-gray-100 dark:bg-gray-900">
                    <PaperIcon class="w-56 h-56" />
                    <h4 class="text-lg text-gray-900 dark:text-gray-100">Buat Paper KRS</h4>
                </div>
                <div class="flex flex-col-2 gap-4">
                    <div class="w-full">
                        <InputLabel class="ps-1" value="Koordinator PS Ilkomp" />
                        <div v-if="selectedDosen.dosen_koor" class="flex items-center mb-2 gap-2">
                            <Badge class="ms-1">
                                {{ selectedDosen.dosen_koor.name }}
                            </Badge>
                            <Trash @click="selectedDosen.dosen_koor = null"
                                class="w-6 h-6 bg-red-600 text-white rounded-md p-1 cursor-pointer" />
                        </div>
                        <ItemSearch get-route="pengajuan.search" :data="page.dosen" @select="selectDosenKoordinator" />
                    </div>
                    <div class="w-full">
                        <InputLabel class="ps-1" value="Dosen PA" />
                        <div v-if="selectedDosen.dosen_pa" class="flex items-center mb-2 gap-2">
                            <Badge class="ms-1">
                                {{ selectedDosen.dosen_pa.name }}
                            </Badge>
                            <Trash @click="selectedDosen.dosen_pa = null"
                                class="w-6 h-6 bg-red-600 text-white rounded-md p-1 cursor-pointer" />
                        </div>
                        <ItemSearch get-route="pengajuan.search" :data="page.dosen" @select="selectDosenPa" />
                    </div>
                </div>
                <div class="pt-4 flex justify-end gap-3">
                    <DangerButton @click="closeModal">Batal</DangerButton>
                    <PrimaryButton @click="submit" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">Buat</PrimaryButton>
                </div>
            </div>
        </Modal>
        <PrimaryButton @click="openModal">Buat KRS</PrimaryButton>
    </div>
</template>
