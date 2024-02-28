<script setup>
import { Link } from '@inertiajs/vue3'

import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

import { PhUser } from "@phosphor-icons/vue";
import ApplicationLogo from './ApplicationLogo.vue';

dayjs.extend(relativeTime);

defineProps(['crew', 'url']);
</script>
 
<template>
    <Link :href="url">
        <div class="h-48 rounded-lg bg-white text-night border border-black/20 shadow-md shadow-black/30 transition-all
         hover:shadow-transparent
         relative overflow-clip
         ">
            <div class="grid place-items-center justify-start px-3 h-full">
                <div class="flex flex-col items-start">
                    <div class="p-1.5 aspect-square rounded-lg absolute top-0 grid place-items-center">
                        <ApplicationLogo class="h-4 w-auto text-gray-800" />
                        <!-- {{ crew.contracts.length }} Contracts -->
                    </div>
                    <div class="absolute top-20 px-2">
                        <p class="text-xs">{{ crew.rank }}</p>
                        <p class="text-lg font-semibold font-mono leading-6">{{ crew.name }}</p>
                    </div>
                    <p class="text-xs text-center rounded-bl-md absolute top-0 right-0 uppercase bg-night/80 text-white px-2 py-0.5">expired</p>
                    <!-- <p class="text-xs text-center rounded-bl-md absolute top-0 right-0 uppercase bg-success text-white px-2 py-0.5 ">appr</p> -->
                    
                    <p class="text-xs text-center absolute bottom-2 right-3">{{ crew.vessel }}</p>
                </div>
            </div>
        </div>
    </Link>
</template>