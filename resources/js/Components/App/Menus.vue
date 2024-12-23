<template>
    <nav class="mt-8 space-y-2">
        <div class="text-sm text-gray-500 dark:text-gray-400 px-4 mb-2">
            OVERVIEW
        </div>
        <div v-for="(item, index) in menuItems" :key="item.id">
            <div class="flex justify-between items-center w-full">
                <Link
                    v-if="!item.children || !item.children.length"
                    :href="route(item.route)"
                    :class="isActive(item)"
                    class="menus w-full">
                    <component :is="resolveIcon(item.icon)" class="w-5 h-5" />
                    <span>{{ item.name }}</span>
                </Link>

                <div
                    v-else
                    @click="toggleMenu(index)"
                    :class="isActive(item)"
                    class="menus cursor-pointer w-full">
                    <component :is="resolveIcon(item.icon)" class="w-5 h-5" />
                    <span>{{ item.name }}</span>
                    <LucideIcons.ChevronDown
                        v-if="!menuState[index]"
                        class="w-4 h-4 ml-auto" />
                    <LucideIcons.ChevronUp v-else class="w-4 h-4 ml-auto" />
                </div>
            </div>

            <div
                v-if="item.children && item.children.length && menuState[index]"
                class="ml-6 space-y-1 mt-2">
                <Link
                    v-for="child in item.children"
                    :key="child.id"
                    :href="route(child.route)"
                    :class="isActive(child)"
                    class="submenu">
                    <component :is="resolveIcon(child.icon)" class="w-5 h-5" />
                    <span>{{ child.name }}</span>
                </Link>
            </div>
        </div>
    </nav>
</template>
<script setup>
import { reactive, onMounted } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import * as LucideIcons from 'lucide-vue-next';

const { props } = usePage();

const menuItems = buildMenuHierarchy(props.menus || []);

const menuState = reactive(Array(menuItems.length).fill(false));

const isActive = (item) =>
    route().current(item.route) ? 'active' : 'inactive';

function resolveIcon(iconName) {
    return LucideIcons[iconName] || LucideIcons.LayoutGrid;
}

function toggleMenu(index) {
    menuState[index] = !menuState[index];
}

function buildMenuHierarchy(menuItems) {
    const menuMap = {};
    menuItems.forEach((item) => (menuMap[item.id] = { ...item, children: [] }));

    const hierarchy = [];
    menuItems.forEach((item) => {
        if (item.parent_id) {
            menuMap[item.parent_id].children.push(menuMap[item.id]);
        } else {
            hierarchy.push(menuMap[item.id]);
        }
    });

    return hierarchy;
}

onMounted(() => {
    menuItems.forEach((item, index) => {
        if (item.children && item.children.length) {
            item.children.forEach((child) => {
                if (route().current(child.route)) {
                    menuState[index] = true;
                }
            });
        }
    });
});
</script>
