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
        <div class="h-[150px] rounded-lg bg-white text-night border border-black/20 shadow-md shadow-black/30 transition-all
         hover:shadow-transparent
         relative overflow-clip p-3">
            <div v-html="crew.contracts[0].status" class="text-xs text-center rounded-bl-md absolute top-0 right-0 uppercase bg-night/80 text-white px-2 py-0.5"></div>
            <div class="
            absolute top-8 inset-x-0 px-3
            flex place-items-center gap-1">
                <div v-if="crew.photo_profile_url != null" 
                class="p-1.5 h-14 aspect-square grid place-items-center border rounded-lg bg-contain bg-center bg-no-repeat"
                :style="`background-image: url(${$page.props.app_url+crew.photo_profile_url})`">
                </div>
                <div v-else
                class="p-1.5 h-14 aspect-square grid place-items-center border rounded-lg">
                    <ApplicationLogo class="h-4 w-auto text-gray-800 " />
                </div>
                <div class="px-2">
                    <p class="text-lg font-semibold font-mono leading-6">{{ crew.name }}</p>
                </div>
            </div>
            
            <p class="text-sm text-center absolute bottom-2 left-3 font-semibold ">{{ crew.vessel }} &middot; {{ crew.rank }}</p>
        </div>
    </Link>
</template>