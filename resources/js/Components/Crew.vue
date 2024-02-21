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
        <div class="h-56 bg-white text-night shadow-sm transition-all border border-gray-300 
         hover:border-accent hover:shadow-xl
         duration-150 ease-in-out">
            <div class="grid place-items-center h-full">
                <div class="flex flex-col items-center">
                    <div class="p-3 border-2 rounded-full">
                        <PhUser size="30"/>
                    </div>
                    <div class="mt-3 w-52">
                        <p class="text-lg text-center uppercase truncate">{{ crew.name }}</p>
                        <p class="text-sm text-center">{{ crew.role }} &middot; {{ crew.vessel }}</p>
                    </div>
                </div>
            </div>
        </div>
    </Link>
</template>