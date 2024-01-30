<template>
    <Head title="Crew Database" />
    
    <AuthenticatedLayout>
        <template #header>
            <div class="flex place-items-center gap-5">
                <Link :href="route('crews.index')">
                    <h2 class="
                    py-6 font-semibold text-xl text-gray-500 leading-tight
                    inline-flex items-center border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out 
                    ">Crew Database</h2>
                </Link>
                <PhCaretRight/> 
                <span class="text-gray-800">{{ crew.name }}</span>
            </div>
        </template>
        <div class="bg-white">
            <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 ">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-bold text-gray-500 mb-4 mt-2">Profile</h3>
                    </div>
                    <div>
                        <SecondaryButton v-if="!editing" @click="editing = true" class="mb-4 mt-2">Edit</SecondaryButton>
                        <SecondaryButton v-else @click="editing = false" class="mb-4 mt-2">Cancel</SecondaryButton>
                    </div>
                </div>
                <hr>
                <div class="mt-6">
                    <form @submit.prevent="form.put(route('crews.update', crew.id), { onSuccess: () => editing = false })">
                        <div class="pb-1 grid grid-cols-1 gap-3">
                            <div v-for="[key, value] of Object.entries(crew_schema)">
                                <div class="mb-2 flex flex-row gap-1">
                                    <label class="w-48 py-2">{{ key }}</label>
                                    <div class="flex-1 flex flex-col">
                                        <input type="text" v-model="form[key]" :class="[
                                            'block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm',
                                            editing == false ? 'bg-transparent border-transparent shadow-transparent' : ''
                                            ]" :disabled="!editing">
                                        <InputError :message="form.errors[key]" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="editing" class="flex flex-row-reverse gap-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <SecondaryButton @click="editing = false; form.reset(); form.clearErrors()" class="mt-4">Cancel</SecondaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

import { PhCaretRight } from "@phosphor-icons/vue";

import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

const props = defineProps({
    'crew': Object
})

const crew_schema = {
    ktp: props.crew.ktp ?? '',
    name: props.crew.name ?? '',
    role: props.crew.role ?? '',
    birthplace: props.crew.birthplace ?? '',
    birthdate: props.crew.birthdate ?? '',
    religion: props.crew.religion ?? '',
    marital_status: props.crew.marital_status ?? '',
    blood_type: props.crew.blood_type ?? '',
    address: props.crew.address ?? '',
    phone: props.crew.phone ?? '',
    emergency_contact: props.crew.emergency_contact ?? '',
    email: props.crew.email ?? '',
    passport: props.crew.passport ?? '',
    seaman_book: props.crew.seaman_book ?? '',
    kk: props.crew.kk ?? '',
    npwp: props.crew.npwp ?? '',
    bpjs_tk: props.crew.bpjs_tk ?? '',
    bpjs_kes: props.crew.bpjs_kes ?? '',
    bank: props.crew.bank ?? '',
    bank_account_number: props.crew.bank_account_number ?? '',
    bank_account_owner: props.crew.bank_account_owner ?? '',
}

const form = useForm(crew_schema);

const editing = ref(false);

</script>