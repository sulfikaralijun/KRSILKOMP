<script setup>
import { ArrowRight, CircleDot, Hourglass } from 'lucide-vue-next';
import { onMounted, ref } from 'vue';

const props = defineProps({
    data: Object
})

const emit = defineEmits(['update-featured']);

const hoveredCard = ref(null);
const draggedCard = ref(null);

onMounted(() => {
    props.data.forEach((card) => {
        card.randomRotate = Math.floor(Math.random() * 10) - 5;
    });
});

const changeCardOrder = () => {
    props.data.sort(() => Math.random() - 0.5);
};

const onDragStart = (event, card) => {
    draggedCard.value = { card, startX: event.clientX, startY: event.clientY };
};

const onDragEnd = (event) => {
    const { startX, startY, card: draggedCardData } = draggedCard.value;
    const endX = event.clientX;
    const endY = event.clientY;
    const deltaX = endX - startX;
    const deltaY = endY - startY;

    let direction = '';
    if (Math.abs(deltaX) > Math.abs(deltaY)) {
        direction = deltaX > 0 ? 'right' : 'left';
    } else {
        direction = deltaY > 0 ? 'down' : 'up';
    }

    const draggedIndex = props.data.findIndex(c => c.id === draggedCardData.id);

    if (direction === 'up' && draggedIndex > 0) {
        const [movedCard] = props.data.splice(draggedIndex, 1);
        props.data.splice(draggedIndex - 1, 0, movedCard);
    } else if (direction === 'down' && draggedIndex < props.data.length - 1) {
        const [movedCard] = props.data.splice(draggedIndex, 1);
        props.data.splice(draggedIndex + 1, 0, movedCard);
    } else if (direction === 'left' || direction === 'right') {
        const [movedCard] = props.data.splice(draggedIndex, 1);
        if (direction === 'left') {
            props.data.unshift(movedCard);
        } else if (direction === 'right') {
            props.data.push(movedCard);
        }

    }

    draggedCard.value = null;
};
</script>
<template>
    <div class="relative h-[400px]">
        <div v-for="(card, index) in data" :key="card.id" :style="{
            transform: hoveredCard === index
                ? `translateY(${index * 40}px) scale(1.05) rotate(0deg)`
                : `translateY(${index * 40}px) scale(${1 - index * 0.05}) rotate(${card.randomRotate}deg)`,
            zIndex: data.length - index,
        }" @mouseover="hoveredCard = index" @mouseleave="hoveredCard = null"
            class="absolute w-full bg-gray-700/50 dark:bg-white/10 backdrop-blur-xl rounded-3xl overflow-hidden transform transition-transform duration-300"
            draggable="true" @dragstart="event => onDragStart(event, card)" @dragend="onDragEnd" @dragover.prevent>
            <div class="p-4">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-2">
                        <img :src="card.avatar" alt="" class="w-8 h-8 rounded-full" />
                        <span class="text-white font-medium">{{ card.username }}</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="p-2 bg-white/20 rounded-full">
                            <Hourglass width="18" height="18" />
                        </button>
                    </div>
                </div>
                <img :src="card.image" :alt="card.title" class="w-full h-48 object-cover rounded-xl" />
                <div class="flex justify-between items-center mt-4">
                    <div class="flex items-center space-x-2">
                        <CircleDot width="18" height="18" />
                        <span class="text-white">{{ card.price }} status</span>
                    </div>
                    <button class="p-2 bg-white/20 rounded-full" @click="emit('update-featured', card)">
                        <ArrowRight />
                    </button>
                </div>
            </div>
        </div>
        <div class="absolute top-4 right-4 hidden">
            <button @click="changeCardOrder" class="p-2 bg-white/20 rounded-full">
                Change Order
            </button>
        </div>
    </div>
</template>
