<template>
  <div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Ringkasan Semester</h2>
    
    <div class="mb-6">
      <h3 class="text-lg font-medium text-gray-900 mb-3">Mata Kuliah yang Sedang Diambil</h3>
      <ul class="space-y-2">
        <li v-for="(mataKuliah, index) in mataKuliahDiambil" :key="index" class="flex items-center">
          <Book class="h-5 w-5 text-indigo-500 mr-2" />
          <span>{{ mataKuliah }}</span>
        </li>
      </ul>
    </div>
    
    <div class="mb-6">
      <h3 class="text-lg font-medium text-gray-900 mb-3">Jadwal Kuliah</h3>
      <ul class="space-y-2">
        <li v-for="(jadwal, index) in jadwalKuliah" :key="index" class="flex items-center">
          <Calendar class="h-5 w-5 text-indigo-500 mr-2" />
          <span>{{ jadwal }}</span>
        </li>
      </ul>
    </div>
    
    <div>
      <h3 class="text-lg font-medium text-gray-900 mb-3">Pengumuman Penting</h3>
      <ul class="space-y-2">
        <li v-for="(pengumuman, index) in pengumumanPenting" :key="index" class="flex items-center">
          <Bell class="h-5 w-5 text-indigo-500 mr-2" />
          <span>{{ pengumuman }}</span>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { Book, Calendar, Bell } from 'lucide-vue-next';

const mataKuliahDiambil = ref([
  'Algoritma dan Struktur Data',
  'Basis Data',
  'Pemrograman Web',
  'Kecerdasan Buatan'
]);

const jadwalKuliah = ref([
  'Senin, 08:00 - Algoritma',
  'Selasa, 10:00 - Basis Data',
  'Rabu, 13:00 - Pemrograman Web',
  'Jumat, 09:00 - Kecerdasan Buatan'
]);

const pengumumanPenting = ref([
  'Batas akhir pembayaran UKT: 30 Juni',
  'Seminar Nasional Teknologi: 15 Juli',
  'Libur Semester: 1-31 Agustus'
]);
</script>