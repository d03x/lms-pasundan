<template>
    <li class="relative p-1 z-50 text-neutral-700">
        <Link v-if="!hasDropdown" class="flex items-center px-2 py-1.5 hover:rounded-md hover:bg-neutral-100 focus:bg-neutral-100" :href="href">
            <div class="flex items-center">
                <component width="17" height="17" :is="icon" />
                <span class="ml-1.5 text-sm">{{ label }}</span>
            </div>

            <!-- Jika ada submenu, tampilkan arrow -->
            <div v-if="hasDropdown" class="ml-2 lg:ml-4">
                <RiArrowDownSLine />
            </div>
        </Link>
        <button v-else class="flex cursor-pointer items-center" @click="click">
            <div class="flex items-center">
                <component :is="icon" />
                <span class="ml-1.5 text-sm">{{ label }}</span>
            </div>

            <!-- Jika ada submenu, tampilkan arrow -->
            <div v-if="hasDropdown" :class="['ml-4 transition-all', menuOpen ? 'rotate-180' : 'rotate-0']">
                <RiArrowDownSLine />
            </div>
        </button>
        <div v-if="menuOpen" class="absolute z-[9999] top-[40px] flex max-w-[200px] min-w-[200px] flex-col gap-0 rounded-lg bg-white shadow">
            <slot />
        </div>
    </li>
</template>

<script setup lang="ts">
import RiArrowDownSLine from '@/icons/RiArrowDownSLine.vue';
import { Link, usePage } from '@inertiajs/vue3';
import {  ref, watch } from 'vue';
import type { Component } from 'vue';
defineProps<{
    href:
        | string
        | {
              url: string;
              method: any;
          } | any;
    icon?: Component;
    label: string;
    hasDropdown?: boolean;
}>();
const menuOpen = ref(false);
const click = () => {
    menuOpen.value = !menuOpen.value;
};
const page = usePage();
watch(page, () => {
    menuOpen.value = false;
});
</script>
