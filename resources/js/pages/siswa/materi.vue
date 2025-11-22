<script setup lang="ts">
import { materi } from '@/actions/App/Http/Controllers/MateriController';
import HugeiconsTaskDaily01 from '@/icons/HugeiconsTaskDaily01.vue';
import HugeiconsTeaching from '@/icons/HugeiconsTeaching.vue';
import IcBaselineRemoveRedEye from '@/icons/IcBaselineRemoveRedEye.vue';
import MaterialSymbolsCheckCircleUnreadOutline from '@/icons/MaterialSymbolsCheckCircleUnreadOutline.vue';
import MaterialSymbolsLightBook5Rounded from '@/icons/MaterialSymbolsLightBook5Rounded.vue';
import NotFoundVector from '@/icons/NotFoundVector.vue';
import SolarNotebookBold from '@/icons/SolarNotebookBold.vue';
import { view } from '@/routes/siswa/materi';
import { Link, router, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
const matpelCurrent = ref<string | null>(null);
function selectMatpel(e: Event) {
    const target = (e as any).target.value;
    router.visit(
        materi({
            query: {
                matpel_id: target,
            },
        }).url,
    );
}
</script>

<template>
    <div class="py-4">
        <h1 class="text-xl font-bold text-neutral-700">Materi</h1>
        <p class="text-sm">Halaman ini menyajikan materi pada masing masing mata pelajaran</p>
    </div>
    <select
        @change="selectMatpel"
        class="border-sm w-full lg:w-auto mb-3 cursor-pointer rounded border-neutral-200 bg-white p-1 py-1.5 text-sm text-neutral-600 shadow outline-none"
    >
        <option class="text-sm" value="" disabled :selected="!matpelCurrent">Pilih Mata Pelajaran</option>
        <option v-for="matpel in $page.props.matpels" :selected="$page.props.current_matpel === matpel.kode_matpel" :value="matpel.kode_matpel" class="text-sm">
            {{ matpel.nama_matpel ?? '' }} ({{ matpel?.nama_guru ?? '' }})
        </option>
    </select>

    <div v-if="false" class="grid grid-cols-1 gap-3 lg:grid-cols-3">
        <div v-for="i in 4">
            <div class="cursor-pointer rounded-lg bg-white p-4 shadow transition-all hover:translate-y-1">
                <h1>
                    <SolarNotebookBold class="text-red-500" />
                    <p>Materi #{{ i }}: Pemeliharaan Mesin Kendaraan Ringan dan optimasi bahan bakar pada motor</p>
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
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center text-xs text-neutral-600">
                            <HugeiconsTaskDaily01 />
                            <span class="ml-1 block">1 Tugas</span>
                        </div>
                        <MaterialSymbolsCheckCircleUnreadOutline class="text-green-600" />
                    </div>
                </div>
                <Link
                    :href="view({ id: i })"
                    class="mt-3 flex w-full cursor-pointer items-center justify-center gap-2 rounded-lg bg-orange-500 px-1 py-2 text-sm text-neutral-800"
                >
                    <IcBaselineRemoveRedEye />
                    <span>Lihat Materi</span>
                </Link>
            </div>
        </div>
    </div>
    <div v-else class="flex bg-white rounded-lg py-5 flex-col min-h-[400px] border border-neutral-200 w-full items-center justify-center">
        <NotFoundVector />
        <h1 class="mt-4 text-sm">Whoops!Belum Ada Materi! Untuk saat ini.</h1>
    </div>
</template>
