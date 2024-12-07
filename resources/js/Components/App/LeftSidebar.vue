<script setup>

const friends = [
    { name: 'Bagas Mahpie', status: 'Friend', avatar: 'https://randomuser.me/api/portraits/men/1.jpg' },
    { name: 'Jason Ranti', status: 'Friend', avatar: 'https://randomuser.me/api/portraits/men/2.jpg' },
    { name: 'Rizky Maulana', status: 'Friend', avatar: 'https://randomuser.me/api/portraits/men/3.jpg' },
]
</script>
<template>
    <div class="mt-8">
        <div class="text-sm text-gray-500 px-4 mb-2">FRIENDS</div>
        <div v-for="friend in friends" :key="friend.name" class="flex items-center space-x-3 px-4 py-2">
            <img :src="friend.avatar" :alt="friend.name" class="w-8 h-8 rounded-full">
            <div>
                <div class="text-sm font-medium">{{ friend.name }}</div>
                <div class="text-xs text-gray-500">{{ friend.status }}</div>
            </div>
        </div>
    </div>
</template>

