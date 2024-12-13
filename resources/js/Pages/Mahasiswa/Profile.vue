<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/atoms/Welcome.vue';
import RightSidebar from '@/Components/App/RightSidebar.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <div>
            
        </div>
        <template #right-sidebar>
            <RightSidebar></RightSidebar>
        </template>
    </AppLayout>
</template>