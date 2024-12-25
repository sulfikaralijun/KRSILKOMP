<script setup>
import { onMounted, ref } from 'vue';
import QRCodeStyling from "qr-code-styling";
import { Hourglass } from 'lucide-vue-next';
const qrCodeCanvas = ref(null);
const props = defineProps({
    data: Object
});

const visitKrs = route('pengajuan.show', props.data.id);

const options = {
    width: 120,
    height: 120,
    data: visitKrs,
    image: "/assets/img/logokrs.jpg",
    dotsOptions: {
        color: "#000",
        type: "rounded"
    },
    backgroundOptions: {
        color: "transparent",
    },
    imageOptions: {
        crossOrigin: "anonymous",
    },
    cornersSquareOptions: {
        color: "#344094",
        type: "extra-rounded",
    },
    cornersDotOptions: {
        color: "#000",
        type: "extra-rounded"
    },
}

const qrCode = new QRCodeStyling(options);

onMounted(() => {
    qrCode.append(qrCodeCanvas.value);
});
</script>
<template>
    <td class="border text-center text-gray-800 dark:text-gray-100 max-h-20 max-w-20">
        <div v-if="data.status != 'draft'" ref="qrCodeCanvas" class="flex justify-center items-center"></div>
        <div v-else>
            <span class="text-xs flex items-center text-gray-800 dark:text-gray-100 select-none">
                Menunggu konfirmasi
                <Hourglass class="hourglass-icon" />
            </span>
        </div>
    </td>
</template>
<style scoped>
@keyframes spin-slow {
    0% {
        transform: rotate(0deg);
    }

    50% {
        transform: rotate(180deg);
    }

    80% {
        transform: rotate(180deg);
    }
}

.hourglass-icon {
    animation: spin-slow 4s linear infinite;
}
</style>
