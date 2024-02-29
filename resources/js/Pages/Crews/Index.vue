<template>
    <Head title="Crews" />
    
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between w-full">
                <p class="font-semibold text-gray-800 leading-tight inline-flex items-center">Crews</p>
                <div class="flex gap-2">
                    <div>
                        <Dialog 
                            dialog-title="Excel"
                            dialog-description="Insert crew data using excel file."
                        >
                            <template #trigger-button>
                                <SecondaryButton><PhMicrosoftExcelLogo weight="bold" size="16" class="mr-2"/>Excel</SecondaryButton>
                            </template>
                            
                            <div class="flex divide-x-2 text-center my-8 mb-3">
                                <div class="flex-grow basis-1">
                                    <a :href="$page.props.app_url+'uploads/templates/input-multiple-crew-template.xlsx'">
                                        <SecondaryButton>
                                            Download Template
                                        </SecondaryButton>
                                    </a>
                                </div>
                                <div class="flex-grow basis-1">
                                    <PrimaryButton color="green">
                                        Upload File
                                    </PrimaryButton>
                                </div>
                            </div>
                        </Dialog>
                    </div>
                    <div>
                        <PrimaryButton color="black" @click="router.visit(route('crews.create'))"><PhPlus weight="bold" size="16" class="mr-2"/>Create</PrimaryButton>
                    </div>
                </div>
            </div>
        </template>

        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8
        flex divide-x">
            <div class="flex-none w-60 relative ">
                <div class="fixed w-60 pr-3">
                    <p class="font-semibold text-gray-800 mb-1 text-sm uppercase">Filter</p>
                    <div class="flex flex-col gap-2 mt-4">
                        <div class="flex items-center relative">
                            <PhTextAa class="absolute left-3"/>
                            <TextInput 
                            v-model="_query.name"
                            type="text"
                            placeholder="Name"
                            class="border-slate-300 transition-all pl-10 w-full bg-white text-black"/>
                        </div>
                        <hr class="my-1">
                        <div class="flex items-center relative">
                            <PhAnchor class="absolute left-3"/>
                            <TextInput v-model="_query.vessel"
                            type="text"
                            placeholder="Vessel"
                            class="border-slate-300 transition-all pl-10 w-full bg-white text-black"/>
                        </div>
                        <div class="flex items-center relative">
                            <PhIdentificationBadge class="absolute left-3"/>
                            <TextInput v-model="_query.rank"
                            type="text"
                            placeholder="Rank"
                            class="border-slate-300 transition-all pl-10 w-full bg-white text-black"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1 relative pl-3">
                <!-- Crews -->
                <div class="grid xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-1 gap-4">
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
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Dialog from '@/Components/Dialog.vue';

import Crew from '@/Components/Crew.vue';

import { PhTextAa, PhAnchor, PhIdentificationBadge, PhMicrosoftExcelLogo, PhPlus } from "@phosphor-icons/vue";

import { Head, router } from '@inertiajs/vue3';
import { onMounted, reactive, watch } from 'vue';

const props = defineProps({
    crews :Object,
    search: Object,
})

const _syncronize_query = () => {
    _query.name = props.search.name ?? ''
    _query.rank = props.search.rank ?? ''
    _query.vessel = props.search.vessel ?? ''
}

onMounted(() => {
    // console.log(`OnMounted | prop.search -> ${props.search != undefined}`)
    if(props.search != undefined) _syncronize_query()
})


const _query = reactive({
    name : '',
    rank : '',
    vessel : '',
})

let typingTimer;
let doneTypingInterval = 1000;

watch(
    () => [ _query.name, _query.rank, _query.vessel ],
    () => {
        clearTimeout(typingTimer)
        typingTimer = setTimeout(() => {
            router.visit('/crews',{
                method: 'get',
                data: {
                    search: _query,
                },
                only: ['crews', 'search'],
                preserveState: true,
                replace: true,
            })
        },doneTypingInterval)
    })

</script>