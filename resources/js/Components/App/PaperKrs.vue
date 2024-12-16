<script setup>
import { ref } from 'vue';
import TopikKrs from './partials/TopikKrs.vue';
defineProps({
    data: {
        type: Array,
        default: () => ([]),
    }
})

// const apiKey = 'xai-SBn8a8jPI5C0bB3xlRO2wG2AI9dxO4NEuW6VcOpWtvWJ5Akri9mv1lcz9RYYcgoC6FcCzcFuBYXD5BK9'
// const url = 'https://api.x.ai/v1/chat/completions'

// const requestPayload = {
//     messages: [
//         {
//             role: 'system',
//             content: 'You are a test assistant.'
//         },
//         {
//             role: 'user',
//             content: 'Testing. Just say hi and hello world and nothing else.'
//         }
//     ],
//     model: 'grok-beta',
//     stream: false,
//     temperature: 0
// }

// const response = await fetch(url, {
//     method: 'POST',
//     headers: {
//         'Content-Type': 'application/json',
//         Authorization: `Bearer ${apiKey}`
//     },
//     body: JSON.stringify(requestPayload)
// })

// const data = await response.json()
// console.log(data);
// Import the ZikAi module

// Call the getCompletionResponse function

</script>
<template>
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table width="100%" class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 border">
                        <thead>
                            <tr>
                                <th width="5%"
                                    class="border px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    No
                                </th>
                                <th width="15%"
                                    class="border px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    Tanggal
                                </th>
                                <th width="50%"
                                    class="border px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    Topik Konsultasi
                                </th>
                                <th width="5%"
                                    class="border px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    SMT
                                </th>
                                <th width="15%"
                                    class="border px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    Paraf PA
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            <tr v-for="d in data">
                                <td class="border text-center px-6 py-3 text-gray-800 dark:text-gray-100">
                                    {{ d.id }}
                                </td>
                                <td class="border text-center px-6 py-3 text-gray-800 dark:text-gray-100 text-sm">
                                    {{ d.tanggal }}
                                </td>
                                <TopikKrs :data="d" />
                                <td class="border text-center px-6 py-3 text-gray-800 dark:text-gray-100">
                                    {{ d.smt }}
                                </td>
                                <td class="border text-center px-6 py-3 text-gray-800 dark:text-gray-100">
                                    {{ d.paraf }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
