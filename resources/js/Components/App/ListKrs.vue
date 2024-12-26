<script setup>
import { ref } from 'vue'
import {
    Check, Heart,
    Coins, Users,
} from 'lucide-vue-next'
import CardStack from './Krs/CardStack.vue'
import TableListKrs from './Krs/TableListKrs.vue'
defineProps({
    data: Object
})

const recentCollections = ref([
    {
        id: 1,
        username: 'Jackie Hong',
        avatar: 'https://via.assets.so/img.jpg?w=400&h=150&tc=blue&bg=#cecece&t=gambar',
        image: 'https://via.assets.so/img.jpg?w=400&h=150&tc=blue&bg=#cecece&t=gambar',
        price: '4.71',
        title: 'Robot Collection 1'
    },
    {
        id: 2,
        username: 'Steven Paul',
        avatar: 'https://via.assets.so/img.jpg?w=400&h=150&tc=blue&bg=#cecece&t=gambar',
        image: 'https://via.assets.so/img.jpg?w=400&h=150&tc=blue&bg=#cecece&t=gambar',
        price: '3.21',
        title: 'Robot Collection 2'
    },
    {
        id: 3,
        username: 'Mike Store',
        avatar: 'https://via.assets.so/img.jpg?w=400&h=150&tc=blue&bg=#cecece&t=gambar',
        image: 'https://via.assets.so/img.jpg?w=400&h=150&tc=blue&bg=#cecece&t=gambar',
        price: '2.56',
        title: 'Robot Collection 3'
    }
])

const transactions = ref([
    {
        id: 1,
        event: 'Transfer',
        fromAvatar: 'https://via.assets.so/img.jpg?w=24&h=24&tc=blue&bg=#cecece&t=gambar',
        toAvatar: 'https://via.assets.so/img.jpg?w=24&h=24&tc=blue&bg=#cecece&t=gambar',
        amount: '3',
        value: '12.4',
        date: '21/08'
    },
    {
        id: 2,
        event: 'Purchase',
        fromAvatar: 'https://via.assets.so/img.jpg?w=24&h=24&tc=blue&bg=#cecece&t=gambar',
        toAvatar: 'https://via.assets.so/img.jpg?w=24&h=24&tc=blue&bg=#cecece&t=gambar',
        amount: '7',
        value: '11.3',
        date: '12/07'
    },
    {
        id: 3,
        event: 'List',
        fromAvatar: 'https://via.assets.so/img.jpg?w=24&h=24&tc=blue&bg=#cecece&t=gambar',
        toAvatar: 'https://via.assets.so/img.jpg?w=24&h=24&tc=blue&bg=#cecece&t=gambar',
        amount: '1',
        value: '2.56',
        date: '04/01'
    },
    {
        id: 'FGA-asjdhb7adf-adsflkn',
        event: 'Transfer',
        fromAvatar: 'https://via.assets.so/img.jpg?w=24&h=24&tc=blue&bg=#cecece&t=gambar',
        toAvatar: 'https://via.assets.so/img.jpg?w=24&h=24&tc=blue&bg=#cecece&t=gambar',
        amount: '3',
        value: '6.51',
        date: '24/02'
    }
])

const updateFeaturedNFT = (card) => {
    featuredNFT.value = card;
};

const featuredNFT = ref({
    username: 'Lynn Chang',
    avatar: '/placeholder.svg?height=40&width=40',
    image: 'https://via.assets.so/img.jpg?w=600&h=800&tc=blue&bg=#fff',
    title: 'Adventure Robot #141',
    price: '21.345 ETH',
    likes: 420
});

</script>
<template>
    <div class="grid md:grid-cols-2 gap-8">
        <!-- Left Section -->
        <div class="space-y-6">
            <h2 class="text-white text-2xl font-bold">Recent Collections</h2>
            <CardStack :data="recentCollections" @update-featured="updateFeaturedNFT" />
            <TableListKrs :data="transactions" />
        </div>

        <!-- Right Section - Featured NFT -->
        <div class="bg-gray-700/50 dark:bg-white/10 backdrop-blur-xl rounded-3xl overflow-hidden">
            <div class="relative">
                <div class="absolute -top-2 right-[-5px] w-80 h-8 bg-[#2A2533] rounded-b-full rounded-r-none z-20">
                </div>
                <div
                    class="absolute top-4 rotate-45 right-[-15px] w-8 h-5 bg-[#2A2533] rounded-b-none rounded-full z-20">
                </div>
                <img :src="featuredNFT.image" :alt="featuredNFT.title" class="w-full h-[500px] object-cover">
                <div class="absolute top-4 left-4 right-4 flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <img :src="featuredNFT.avatar" :alt="featuredNFT.username"
                            class="w-10 h-10 rounded-full border-2 border-white">
                        <div>
                            <h3 class="text-white font-bold">{{ featuredNFT.username }}</h3>
                            <p class="text-white/60 text-sm">@{{ featuredNFT.username }}</p>
                        </div>
                        <div class="w-5 h-5 bg-blue-500 rounded-full flex items-center justify-center">
                            <Check class="w-3 h-3 text-white" />
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-4 right-4">
                    <button class="p-3 bg-white/20 backdrop-blur-xl rounded-full hover:bg-white/30 transition-colors">
                        <Heart class="w-5 h-5 text-white" />
                    </button>
                </div>
            </div>

            <div class="p-6">
                <h2 class="text-white text-2xl font-bold mb-4">{{ featuredNFT.title }}</h2>
                <div class="flex space-x-4">
                    <div
                        class="bg-[#C4A484] px-4 py-2 rounded-full flex items-center space-x-2 hover:bg-[#B39476] transition-colors">
                        <Users class="w-5 h-5 text-white" />
                        <span class="text-white font-medium">{{ featuredNFT.likes }}</span>
                    </div>
                    <div
                        class="bg-[#C4A484] px-4 py-2 rounded-full flex items-center space-x-2 hover:bg-[#B39476] transition-colors">
                        <Coins class="w-5 h-5 text-white" />
                        <span class="text-white font-medium">{{ featuredNFT.price }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
