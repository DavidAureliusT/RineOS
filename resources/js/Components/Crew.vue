<script setup>
import { Link } from '@inertiajs/vue3'

import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

import { PhUser } from "@phosphor-icons/vue";

dayjs.extend(relativeTime);

defineProps(['crew', 'url']);
</script>
 
<template>
    <Link :href="url">
        <div class="h-64 rounded-lg bg-white text-night border border-black/20 shadow-md shadow-black/30 transition-all
         hover:shadow-transparent
         relative overflow-clip
         ">
            <div class="grid place-items-center justify-start px-3 h-full">
                <div class="flex flex-col items-start">
                    <div class="p-3 border rounded-full">
                        <!-- <PhUser size="30" weight="thin"/> -->
                        {{ crew.id }}
                    </div>
                    <p class="text-lg font-semibold absolute top-40 left-3">{{ crew.name }}</p>
                    <p class="text-xs text-center rounded-bl-md absolute top-0 right-0 uppercase bg-night/80 text-white px-2 py-0.5">expired</p>
                    <!-- <p class="text-xs text-center rounded-bl-md absolute top-0 right-0 uppercase bg-success text-white px-2 py-0.5 ">appr</p> -->
                    <p class="text-xs text-center absolute top-2 left-3">{{ crew.rank }}</p>
                    <p class="text-xs text-center absolute bottom-2 right-3">{{ crew.vessel }}</p>
                </div>
            </div>
        </div>
    </Link>
</template>