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
        <div class="p-6 flex space-x-2 bg-white shadow-sm rounded-lg transition-all border-b-2 border-transparent hover:border-indigo-400 duration-150 ease-in-out">
            <div class="h-6 w-6 text-gray-600">
                <PhUser/>
            </div>
            <div class="flex-1">
                <div>
                    <p class="text-lg uppercase text-gray-900">{{ crew.name }}</p>
                    <p class="text-md font-bold text-gray-900">{{ crew.role }}</p>
                </div>
                <div class="flex justify-between items-center mt-2">
                    <div>
                        <span class="text-gray-800 font-bold">{{ crew.user.name }}</span>
                        <small class="ml-2 text-sm text-gray-600">{{ dayjs(crew.created_at).fromNow() }}</small>
                    </div>
                </div>
            </div>
        </div>
    </Link>
</template>