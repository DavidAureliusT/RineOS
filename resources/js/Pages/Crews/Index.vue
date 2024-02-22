<template>
    <Head title="Crews" />
    
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between w-full">
                <h2 class="font-semibold text-md text-gray-800 leading-tight inline-flex items-center">Crews</h2>
                
                <PrimaryButton @click="router.visit(route('crews.create'))">Create</PrimaryButton>
            </div>
        </template>

        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="flex gap-2 flex-wrap">
                <div class="flex-grow flex items-center relative">
                    <PhTextAa class="absolute left-3"/>
                    <TextInput v-model="_search.name"
                                type="text"
                                placeholder="Cari siapa?"
                                class="border-slate-300 transition-all pl-10 w-full bg-white text-black"
                            />
                </div>
                <div class="flex-grow flex items-center relative">
                    <PhIdentificationBadge class="absolute left-3"/>
                    <TextInput v-model="_search.role"
                                type="text"
                                placeholder="Cari posisi apa?"
                                class="border-slate-300 transition-all pl-10 w-full bg-white text-black"
                            />
                </div>
                <div class="flex-grow flex items-center relative">
                    <PhAnchor class="absolute left-3"/>
                    <TextInput v-model="_search.vessel"
                                type="text"
                                placeholder="Cari untuk kapal apa?"
                                class="border-slate-300 transition-all pl-10 w-full bg-white text-black"
                            />
                </div>
            </div>
            <div class="overflow-auto">
                <div class="mt-4 grid xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-4">
                    <Crew
                        v-for="crew in crews"
                        :key="crew.id"
                        :crew="crew"
                        :url="route('crews.show', crew.id)"
                    />
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TextInput from '@/Components/TextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';

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