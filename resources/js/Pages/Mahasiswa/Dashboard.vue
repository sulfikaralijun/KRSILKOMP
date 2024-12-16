<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/atoms/Welcome.vue';
import RightSidebar from '@/Components/App/RightSidebar.vue';
import StatistikAkademik from '@/Components/organisms/StatistikAkademik.vue';
import RingkasanSemester from '@/Components/organisms/RingkasanSemester.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <StatistikAkademik />
        <template #right-sidebar>
            <RingkasanSemester />
        </template>
    </AppLayout>
</template>
