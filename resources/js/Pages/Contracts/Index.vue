<template>
    <Head title="Contracts" />
    
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between w-full">
                <h2 class="font-semibold text-md text-gray-800 leading-tight inline-flex items-center">Contracts</h2>

                <div class="flex gap-2">
                    <PrimaryButton @click="router.visit(route('contracts.create'))"><PhPlus weight="bold" size="16" class="mr-2"/>Create</PrimaryButton>
                    <div>
                        <Dialog 
                            dialog-title="Excel"
                            dialog-description="Insert crew data using excel file."
                        >
                            <template #trigger-button>
                                <PrimaryButton color="green"><PhMicrosoftExcelLogo weight="bold" size="16" class="mr-2"/>Excel</PrimaryButton>
                            </template>
                            
                            <div class="flex divide-x text-center my-8 mb-3">
                                <div class="flex-grow basis-1">
                                    <SecondaryButton >
                                        Download Template
                                    </SecondaryButton>
                                </div>
                                <div class="flex-grow basis-1">
                                    <PrimaryButton color="green">
                                        Upload File
                                    </PrimaryButton>
                                </div>
                            </div>
                        </Dialog>
                    </div>
                </div>

            </div>
        </template>

        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="">
                <div class="mt-4 bg-white rounded-md border divide-y">
                    <div class="flex text-xs text-gray-500 p-3">
                        <div class="flex-initial w-56">
                            Contract Code
                        </div>
                        <div class="flex-initial w-52">
                            Nama Crew
                        </div>
                        <div class="flex-1">
                            Vessel
                        </div>
                        <div class="flex-1">
                            Rank
                        </div>
                        <div class="flex-1">
                            Start
                        </div>
                        <div class="flex-1">
                            End
                        </div>
                        <div class="flex-1">
                            Status
                        </div>
                    </div>
                    <div 
                    v-for="(contract, index) in contractData" :key="index"
                    class="flex text-xs p-3 hover:bg-primary"
                    >
                        <div class="flex-initial font-mono w-56">
                            {{ contract.code }}
                        </div>
                        <div class="flex-initial w-52 ">
                            {{ contract.crew }}
                        </div>
                        <div class="flex-1">
                            {{ contract.vessel }}
                        </div>
                        <div class="flex-1">
                            {{ contract.rank }}
                        </div>
                        <div class="flex-1">
                            {{ contract.start }}
                        </div>
                        <div class="flex-1">
                            {{ contract.end }}
                        </div>
                        <div class="flex-1">
                            {{ contract.status }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Dialog from '@/Components/Dialog.vue';



import { PhMicrosoftExcelLogo, PhPlus } from "@phosphor-icons/vue";

import { Head, router } from '@inertiajs/vue3';


const props = defineProps({
    'contracts': Object,
})

const contractData = [
    {
        code : '121/CRW-ENL-PKL/III/2023',
        crew : 'Tanjudin',
        vessel : 'EP300',
        rank : 'Leaderman',
        start : '18 Mar 2022',
        end : '17 Sep 2022',
        status : 'Finish',
    },
    {
        code : '120/CRW-ENL-PKL/III/2023',
        crew : 'YOHAN REJEKKI ARITONANG',
        vessel : 'EP300',
        rank : 'Engineer (Ch.)',
        start : '18 Mar 2023',
        end : '17 Sep 23',
        status : 'Finish',
    },
    {
        code : '119/CRW-ENL-PKL/III/2023',
        crew : 'SEPTIAN TRI NURCAHYO',
        vessel : 'EP300',
        rank : 'Oiler',
        start : '18 Mar 2023',
        end : '17 Jun 2023',
        status : 'Finish',
    }

]

</script>