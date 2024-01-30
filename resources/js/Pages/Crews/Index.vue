<template>
    <Head title="Crew Database" />
    
    <AuthenticatedLayout>
        <template #header>
            <h2 class="py-6 font-semibold text-xl text-gray-800 leading-tight inline-flex items-center">Crew Database</h2>
        </template>

        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="mt-6">
                <div class="flex items-center relative">
                    <PhMagnifyingGlass class="absolute left-3"/>
                    <input v-model="_search"
                                type="text"
                                placeholder="Cari siapa?"
                                class="border-transparent rounded-full transition-all pl-10"
                            />
                </div>
            </div>
            <div class="mt-6 grid grid-cols-4 gap-2">
                <Crew
                    v-for="crew in crews"
                    :key="crew.id"
                    :crew="crew"
                    :url="route('crews.show', crew.id)"
                />
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Crew from '@/Components/Crew.vue';

import { PhMagnifyingGlass } from "@phosphor-icons/vue";

import { Head, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps({
    'crews': Object,
    'search': String
})

const _search = ref(props.search)

let typingTimer;
let doneTypingInterval = 1000;

watch(
    () => [ _search.value ],
    () => {
        clearTimeout(typingTimer)
        typingTimer = setTimeout(() => {
            _search.value == "" 
                ? router.visit('/crews',{
                    method: 'get',
                    only: ['crews', 'search'],
                    preserveState: true,
                    replace: true,
                })
                : router.visit('/crews',{
                    method: 'get',
                    data: {
                        search: _search.value,
                    },
                    only: ['crews', 'search'],
                    preserveState: true,
                    replace: true,
                })
            
        },doneTypingInterval)
    })

</script>