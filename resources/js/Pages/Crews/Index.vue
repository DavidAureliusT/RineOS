<template>
    <Head title="Crews" />
    
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex items-center uppercase tracking-widest">Crews</h2>
                
                <PrimaryButton>Create</PrimaryButton>
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
            <div class="mt-6 overflow-auto">
                <!-- <table class="table-auto border border-collapse border-slate-400">
                    <thead class="bg-gray-200 text-black/50">
                        <tr>
                            <th v-for="[key, value] of Object.entries(crews[0])" :key="index"
                            class="px-3 py-1 border border-slate-300"
                            >
                                {{ key }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr v-for="crew in crews" :key="crew.id"
                            class="hover:bg-slate-300/20 transition-all"
                            @click="router.visit(route('crews.show', crew.id))"
                            >
                                <td v-for="[key, value] of Object.entries(crew)" :key="index"
                                class="px-3 py-1 border border-slate-300"
                                >
                                    {{ value }}
                                </td>
                            </tr>
                    </tbody>
                </table> -->
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