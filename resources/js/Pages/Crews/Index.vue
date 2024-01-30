<template>
    <Head title="Crew Database" />
    
    <AuthenticatedLayout>
        <template #header>
            <h2 class="py-6 font-semibold text-xl text-gray-800 leading-tight inline-flex items-center">Crew Database</h2>
        </template>

        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="mt-6 flex gap-2">
                <div class="flex items-center relative">
                    <PhTextAa class="absolute left-3"/>
                    <input v-model="_search.name"
                                type="text"
                                placeholder="Cari siapa?"
                                class="border-transparent rounded-full transition-all pl-10"
                            />
                </div>
                <div class="flex items-center relative">
                    <PhIdentificationBadge class="absolute left-3"/>
                    <input v-model="_search.role"
                                type="text"
                                placeholder="Cari posisi apa?"
                                class="border-transparent rounded-full transition-all pl-10"
                            />
                </div>
                <div class="flex items-center relative">
                    <PhAnchor class="absolute left-3"/>
                    <input v-model="_search.vessel"
                                type="text"
                                placeholder="Cari untuk kapal apa?"
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

import { PhTextAa, PhAnchor, PhIdentificationBadge } from "@phosphor-icons/vue";

import { Head, router } from '@inertiajs/vue3';
import { reactive, watch } from 'vue';

const props = defineProps({
    'crews': Object,
    'search': Object,
})

const _search = reactive({
    'name' : props.search?.name,
    'role' : props.search?.role,
    'vessel' : props.search?.vessel,
})

let typingTimer;
let doneTypingInterval = 1000;

watch(
    () => [ _search.name, _search.role, _search.vessel ],
    () => {
        clearTimeout(typingTimer)
        typingTimer = setTimeout(() => {
            router.visit('/crews',{
                method: 'get',
                data: {
                    search: _search,
                },
                only: ['crews', 'search'],
                preserveState: true,
                replace: true,
            })
            
        },doneTypingInterval)
    })

</script>