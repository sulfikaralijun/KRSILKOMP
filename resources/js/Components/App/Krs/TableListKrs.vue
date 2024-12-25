<script setup>
import { ArrowRight } from 'lucide-vue-next';

defineProps({
    data: Array
})
</script>
<template>
    <div class="bg-gray-700/50 dark:bg-white/10  backdrop-blur-xl rounded-3xl p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-white text-xl font-bold">History</h3>
            <div class="flex space-x-4">
                <button class="text-white/60 hover:text-white">All history</button>
                <button class="text-white/60 hover:text-white">Purchase</button>
                <button class="text-white/60 hover:text-white">Transfer</button>
            </div>
        </div>

        <table class="w-full">
            <thead>
                <tr class="text-white/60 text-sm">
                    <th class="text-left pb-4">Event</th>
                    <th class="text-left pb-4">From/To</th>
                    <th class="text-left pb-4">Amount</th>
                    <th class="text-left pb-4">Value</th>
                    <th class="text-left pb-4">Date</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="transaction in data" :key="transaction.id" class="text-white border-t border-white/10">
                    <td class="py-4">{{ transaction.event }}</td>
                    <td class="py-4">
                        <div class="flex items-center space-x-2">
                            <img :src="transaction.fromAvatar" alt="" class="w-6 h-6 rounded-full">
                            <ArrowRight class="w-4 h-4" />
                            <img :src="transaction.toAvatar" alt="" class="w-6 h-6 rounded-full">
                        </div>
                    </td>
                    <td class="py-4">{{ transaction.amount }}</td>
                    <td class="py-4">{{ transaction.value }} ETH</td>
                    <td class="py-4">{{ transaction.date }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
