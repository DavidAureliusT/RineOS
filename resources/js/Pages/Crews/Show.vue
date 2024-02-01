<template>
    <Head title="Crew Database" />
    
    <AuthenticatedLayout>
        <template #header>
            <div class="flex place-items-center gap-5">
                <Link :href="route('crews.index')">
                    <h2 class="
                    font-semibold text-xl text-gray-500 leading-tight inline-flex items-center hover:text-gray-800 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out 
                    ">Crew Database</h2>
                </Link>
                <PhCaretRight/> 
                <span class="text-gray-800">{{ crew.name }}</span>
            </div>
        </template>
        <div class="bg-white">
            <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
                <div class="flex gap-10">
                    <div class="flex-none w-56 flex flex-col place-items-center">
                        <div class="p-3 bg-white border rounded-full w-full aspect-square grid place-items-center">
                            <h1 class="text-3xl">{{ crew.name[0] }}</h1>
                        </div>
                        <SecondaryButton class="mt-4" disabled>Edit Picture</SecondaryButton>
                    </div>
                    <div class="flex-1">
                        <!-- Document -->
                        <div class="bg-white border p-8 rounded-lg">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-500 mb-4">Documents</h3>
                                </div>
                                <div>
                                    <Dialog 
                                    trigger-button-label="Upload" 
                                    dialog-title="Upload Document"
                                    dialog-description="Upload documents and set reminders to update. Click save when you're done."
                                    >
                                        <fieldset class="mb-[15px] flex items-center gap-5">
                                            <label class="text-grass11 w-[90px] text-right text-[15px]" for="label">Label</label>
                                            <input
                                                id="label"
                                                class="text-grass11 shadow-green7 focus:shadow-green8 inline-flex h-[35px] w-full flex-1 items-center justify-center rounded-[4px] px-[10px] text-[15px] leading-none shadow-[0_0_0_1px] outline-none focus:shadow-[0_0_0_2px]"
                                                defaultValue="Curriculum vitae"
                                            >
                                        </fieldset>
                                        <fieldset class="mb-[15px] flex items-center gap-5">
                                            <label class="text-grass11 w-[90px] text-right text-[15px]" for="fileDocument">File</label>
                                            <input
                                                id="fileDocument"
                                                type="file"
                                                class="text-grass11 shadow-green7 focus:shadow-green8 inline-flex h-[35px] w-full flex-1 items-center justify-center rounded-[4px] px-[10px] text-[15px] leading-none shadow-[0_0_0_1px] outline-none focus:shadow-[0_0_0_2px]"
                                            >
                                        </fieldset>
                                        <fieldset class="mb-[15px] flex items-center gap-5">
                                            <label class="text-grass11 w-[90px] text-right text-[15px]" for="reminder">Reminder</label>
                                            <input
                                                id="reminder"
                                                type="date"
                                                class="text-grass11 shadow-green7 focus:shadow-green8 inline-flex h-[35px] w-full flex-1 items-center justify-center rounded-[4px] px-[10px] text-[15px] leading-none shadow-[0_0_0_1px] outline-none focus:shadow-[0_0_0_2px]"
                                            >
                                        </fieldset>
                                    </Dialog>
                                </div>
                            </div>
                            <hr>
                            <div class="mt-6">
                                <p class="text-gray-500 animate-pulse">No document exist.</p>
                            </div>
                        </div>
                        <!-- Profile -->
                        <div class="bg-white border p-8 rounded-lg mt-6">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-500 mb-4">Profile</h3>
                                </div>
                                <div>
                                    <SecondaryButton @click="editing = !editing" class="mb-4">{{ !editing ? 'Edit' : 'Cancel' }}</SecondaryButton>
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
import Dialog from '@/Components/Dialog.vue';

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