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
        <div class="h-64 border border-transparent rounded-lg bg-white text-night shadow-sm shadow-black/80 transition-all
         hover:shadow-inner hover:shadow-black/80
         relative
         ">
            <div class="grid place-items-center justify-start px-3 h-full">
                <div class="flex flex-col items-start">
                    <div class="p-3 border rounded-full">
                        <!-- <PhUser size="30" weight="thin"/> -->
                        {{ crew.name[0] }}{{ crew.name[1] }}
                    </div>
                    <p class="text-lg font-semibold absolute top-40 left-3">{{ crew.name }}</p>
                    <p class="text-xs text-center absolute top-2 left-3">{{ crew.role }}</p>
                    <p class="text-xs text-center absolute bottom-2 right-3">{{ crew.vessel }}</p>
                </div>
            </div>
        </div>
    </Link>
</template>