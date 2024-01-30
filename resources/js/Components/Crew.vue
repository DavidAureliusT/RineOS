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
        <div class="p-6 bg-white shadow-sm rounded-lg transition-all border-2 border-transparent hover:border-indigo-400 duration-150 ease-in-out">
            <div class="flex flex-col items-center">
                <div class="p-3 border rounded-full">
                    <PhUser/>
                </div>
                <p class="text-lg text-center uppercase text-gray-900">{{ crew.name }}</p>
                <p class="text-sm text-center text-gray-900">{{ crew.role }}</p>
            </div>
            <!-- <div>
                <span class="text-gray-800 font-bold">{{ crew.user.name }}</span>
                <small v-if="crew.updated_at == null" class="ml-2 text-sm text-gray-600">{{ dayjs(crew.created_at).fromNow() }}</small>
                <small v-else class="ml-2 text-sm text-gray-600"> {{ dayjs(crew.updated_at).fromNow() }} &middot; edited</small>
            </div> -->
        </div>
    </Link>
</template>