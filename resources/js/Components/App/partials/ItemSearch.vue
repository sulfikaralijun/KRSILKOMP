<script setup>
import TextInput from "@/Components/atoms/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import debounce from "lodash.debounce";
import { Search } from "lucide-vue-next";
import { ref, watch, computed } from "vue";

const props = defineProps({
    data: [Array, Object],
    getRoute: String,
});

const emitSelect = defineEmits(["select"]);
let selectedData = ref([]);
let showList = ref(false);
const search = useForm({ searchfilter: "" });

const filteredData = computed(() => {
    return props.data.filter((item) =>
        Object.values(item).some((val) =>
            String(val)
                .toLowerCase()
                .includes(search.searchfilter.toLowerCase())
        )
    );
});

const searchQuery = () => {
    search.post(route(`${props.getRoute}`), {
        preserveScroll: true,
        preserveState: true,
        replace: true,
    });
};

watch(
    () => search.searchfilter,
    debounce(() => {
        if (search.searchfilter.trim()) {
            searchQuery();
        }
    }, 300)
);

function toggleSelection(selectedItem) {
    const index = selectedData.value.findIndex(
        (item) => item.id === selectedItem.id
    );
    if (index === -1) {
        selectedData.value.push(selectedItem);
    } else {
        selectedData.value.splice(index, 1);
    }

    showList.value = false;
    search.searchfilter = "";

    emitSelect("select", selectedData.value[0]);

    selectedData.value = selectedData.value.filter(
        (selectData) => selectData.id !== selectedItem.id
    );
}

function closeList() {
    showList.value = false;
}

function isSelected(id) {
    return selectedData.value.some((item) => item.id === id);
}
</script>

<template>
    <div class="grid grid-cols-4 gap-1 md:grid-cols-12">
        <div class="col-span-12 ps-1 md:col-span-12 relative">
            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                <Search class="w-4 h-4 text-gray-400 dark:text-gray-600" />
            </div>
            <TextInput class="w-full pe-4 ps-10 block" autocomplete="off" v-model="search.searchfilter"
                placeholder="Search..." @focus="showList = true" @blur="closeList" @input="showList = true" />
        </div>
        <div class="col-span-12 md:col-span-12">
            <ul class="overflow-y-auto max-h-64" ref="list" v-if="search.searchfilter.trim() && !search.processing">
                <li v-if="search.searchfilter" class="px-1 pt-1 font-bold">
                    <h4>Mencari "{{ search.searchfilter }}"</h4>
                </li>
                <li v-for="dta in filteredData" :key="dta.id"
                    class="shadow-inner m-1 hover:bg-gray-100 dark:hover:bg-gray-900 rounded-md">
                    <label class="flex cursor-pointer items-center justify-between p-1" id="id">
                        <div class="">
                            <span class="pe-2 font-bold">
                                {{ dta.name }}
                            </span>
                            <input type="checkbox" name="id" class="w-4 h-4 invisible" :checked="isSelected(dta)"
                                @click="toggleSelection(dta)" />
                        </div>
                    </label>
                </li>
                <div v-if="!filteredData.length" class="overflow-y-auto w-full items-list">
                    <label class="flex cursor-pointer items-center justify-between p-1" id="id">
                        <div class="text-center">
                            <p class="text-sm">Tidak ada data</p>
                        </div>
                    </label>
                </div>
            </ul>
            <div v-else-if="search.processing" role="status" class="animate-pulse">
                <div class="skeleton bg-gray-300 rounded h-4 w-36"></div>
            </div>
        </div>
    </div>
</template>
