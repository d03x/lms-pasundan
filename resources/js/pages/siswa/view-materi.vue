<script setup lang="ts">
import VideoPlayer from '@/components/video-player.vue';
import HugeiconsTeaching from '@/icons/HugeiconsTeaching.vue';
import MaterialSymbolsLightBook5Rounded from '@/icons/MaterialSymbolsLightBook5Rounded.vue';
</script>

<template>
    <div class="bg-white px-3 lg:px-8 lg:py-5 pt-2">
        <h1 class="text-lg font-semibold text-neutral-700 lg:text-xl">
            Materi #1 Pemeliharaan Mesin Kendaraan Ringan dan optimasi bahan bakar pada motor
        </h1>
        <div class="mt-2 flex flex-col space-y-1 text-sm">
            <div class="flex items-center text-xs text-neutral-600">
                <HugeiconsTeaching />
                <span class="ml-1 block">Prof. Ardiansyah,S.Kom,M.Kom</span>
            </div>
            <div class="flex items-center text-xs text-neutral-600">
                <MaterialSymbolsLightBook5Rounded />
                <span class="ml-1 block">Komputer Dan Dasar Jaringan</span>
            </div>
        </div>
        <hr class="my-3 text-neutral-300" />
        <div class="flex flex-col space-y-4">
            <div class="overflow-hidden rounded">
               <VideoPlayer/>
            </div>
            <div>
                <h2 class="text-sm font-semibold">Description:</h2>
                <p class="text-sm">
                    Materi ini dirancang untuk menguji kemampuan Anda dalam menerapkan teori strategi pemasaran yang telah dibahas dalam Modul 3 ke
                    dalam skenario bisnis nyata. Anda akan menganalisis studi kasus XYZ Corp dan merumuskan rekomendasi strategis berdasarkan data
                    yang tersedia.Materi ini membahas komponen hardware dan software dasar komputer. Siswa memahami jenis-jenis perangkat, fungsi
                    setiap komponen (CPU, RAM, HDD/SSD, motherboard, PSU), serta cara merakit dan melakukan troubleshooting dasar.
                </p>
            </div>
            <div class="overflow-x-auto pb-4">
                <h2 class="text-sm font-semibold">Link Materi:</h2>
                <ul class="space-y-2 lg:text-sm text-xs text-blue-500 lg:space-y-0">
                    <li v-for="i in 4" class="flex flex-col lg:flex-row lg:items-center lg:gap-1">
                        <span class="text-neutral-700">[Buku Otomotif 1]</span>
                        <a class="lg:hover:text-red-500 hover:ring-1 transition-all lg:px-1" href="https://drive.google.com/file/d/1jfTZCwMTQLWng72IsvMg21jvqViZSfod/view"
                            >https://drive.google.com/file/d/1jfTZCwMTQLWng72IsvMg21jvqViZSfod/view</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
