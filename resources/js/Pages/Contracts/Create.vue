<template>
    <Head title="New Contract" />
    
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between w-full">
                <div class="flex place-items-center gap-5">
                    <Link :href="route('contracts.index')">
                        <h2 class="font-semibold text-md text-gray-800 leading-tight inline-flex items-center hover:text-accent">Contracts</h2>
                    </Link>
                    <PhCaretRight/> 
                    <span class="text-gray-800">Create</span>
                </div>
            </div>
        </template>

        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="flex gap-8">
                <div class="flex-1">
                    <div class="bg-white py-5 rounded-lg border ">
                        <form action="" class="px-4">
                            <div>
                                <InputLabel for="crew" value="Choose Crew" color="night" />

                                <TextInput
                                    id="crew"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                />

                                <InputError class="mt-2" :message="form.errors.crew" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="flex-none w-60">
                    <div class="flex flex-col">
                        <p class="font-semibold text-gray-800 mb-1">On this page</p>
                        <p v-html="'Crew'" class="pl-3 py-1 border-l-2 font-semibold border-gray-400 text-gray-400 hover:border-accent hover:text-accent cursor-default"></p>
                        <p v-html="'Vessel'" class="pl-3 py-1 border-l-2 font-semibold border-gray-400 text-gray-400 hover:border-accent hover:text-accent cursor-default"></p>
                        <p v-html="'Rank'" class="pl-3 py-1 border-l-2 font-semibold border-gray-400 text-gray-400 hover:border-accent hover:text-accent cursor-default"></p>
                        <p v-html="'Start at'" class="pl-3 py-1 border-l-2 font-semibold border-gray-400 text-gray-400 hover:border-accent hover:text-accent cursor-default"></p>
                        <p v-html="'Period'" class="pl-3 py-1 border-l-2 font-semibold border-gray-400 text-gray-400 hover:border-accent hover:text-accent cursor-default"></p>
                        <p v-html="'End At'" class="pl-3 py-1 border-l-2 font-semibold border-gray-400 text-gray-400 hover:border-accent hover:text-accent cursor-default"></p>
                        <p v-html="'Transport'" class="pl-3 py-1 border-l-2 font-semibold border-gray-400 text-gray-400 hover:border-accent hover:text-accent cursor-default"></p>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

import { useForm, Head, Link } from '@inertiajs/vue3';

const crew = {
    ktp: '3674020707810014',
    name: 'Toni Kosoyo',
    birthplace: 'Kemang',
    birthdate: '7-Jul-1981',
    religion: 'Islam',
    marital_status: 'K2',
    blood_type: 'A+',
    address: 'Griya Asri B8/29 A Rt.53/Rw.07, BSD City, Jelupang, Serpong Utara, Tanggerang Selatan, Banten',
    phone: '0813 1096 5552',
    emergency_contact: '08215378364',
    email: 'Toni.kosoyo@gmail.com',
    passport: 'C 3901987',
    seaman_book: 'F 238911',
    kk: '3674022803100948',
    npwp: '09.845.898.7411.000',
    bpjs_tk: '3674 0207 0781 0014',
    bpjs_kes: '1816730335',
    bank: 'Mandiri',
    bank_account_number: '128-00-0539424-9',
    bank_account_owner: 'Toni Kosoyo',
}

const contract_schema = {
    crew_id: '',
    vesesl: '',
    rank: '',
    start_at: '',
    end_at: '',
}

const form = useForm(contract_schema);

</script>