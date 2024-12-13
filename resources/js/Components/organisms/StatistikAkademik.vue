<template>
  <div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Statistik Akademik</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="bg-blue-100 rounded-lg p-4">
        <div class="flex items-center">
          <BookOpen class="h-8 w-8 text-blue-600 mr-3" />
          <div>
            <p class="text-sm font-medium text-blue-600">Total SKS diambil</p>
            <p class="text-2xl font-semibold text-blue-800">{{ totalSKS }}</p>
          </div>
        </div>
      </div>
      <div class="bg-green-100 rounded-lg p-4">
        <div class="flex items-center">
          <Award class="h-8 w-8 text-green-600 mr-3" />
          <div>
            <p class="text-sm font-medium text-green-600">Indeks Prestasi</p>
            <p class="text-2xl font-semibold text-green-800">{{ indeksPrestasi }}</p>
          </div>
        </div>
      </div>
      <div class="bg-yellow-100 rounded-lg p-4">
        <div class="flex items-center">
          <TrendingUp class="h-8 w-8 text-yellow-600 mr-3" />
          <div>
            <p class="text-sm font-medium text-yellow-600">Progres kelulusan</p>
            <p class="text-2xl font-semibold text-yellow-800">{{ progresKelulusan }}%</p>
          </div>
        </div>
      </div>
      <div class="bg-red-100 rounded-lg p-4">
        <div class="flex items-center">
          <BookMarked class="h-8 w-8 text-red-600 mr-3" />
          <div>
            <p class="text-sm font-medium text-red-600">Mata kuliah tersisa</p>
            <p class="text-2xl font-semibold text-red-800">{{ mataKuliahTersisa }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { BookOpen, Award, TrendingUp, BookMarked } from 'lucide-vue-next';

const totalSKS = ref(120);
const indeksPrestasi = ref(3.75);
const progresKelulusan = ref(75);
const mataKuliahTersisa = ref(10);
</script>