<template>
    
    <Head title="Crews" />
    
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between w-full">
                <div class="flex place-items-center gap-5">
                    <Link :href="route('crews.index')">
                        <h2 class="font-semibold text-md text-gray-800 leading-tight inline-flex items-center hover:text-accent">Crews</h2>
                    </Link>
                    <PhCaretRight/> 
                    <span class="text-gray-800">{{ crew.name }}</span>
                </div>
            </div>
        </template>

        <div>
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
                                    <UploadDocumentDialog :crew_id="crew.id" />
                                </div>
                            </div>
                            <hr>
                            <div class="mt-6">
                                <div v-if="crew.documents != null">
                                    <div class="flex items-center text-black/50 font-bold h-[35px]">
                                        <div class="flex-none w-8"></div>
                                        <div class="flex-1">
                                            Name
                                        </div>
                                        <div class="flex-none w-32">
                                            Reminder
                                        </div>
                                        <div class="flex-none w-56 text-right">
                                            Actions
                                        </div>
                                    </div>
                                    <Document v-for="(item, index) in crew.documents" :key="index" 
                                        :id="item.id"
                                        :url="item.url"
                                        :name="item.name"
                                        :reminder="item.reminder"
                                    />
                                </div>
                                <p v-else class="text-gray-500 animate-pulse">No document exist.</p>
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
import UploadDocumentDialog from '@/Components/UploadDocumentDialog.vue';
import Document from '@/Components/Document.vue';

import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);

const props = defineProps({
    crew :Object
})

const crew_schema = {
    ktp: props.crew.ktp ?? '',
    name: props.crew.name ?? '',
    role: props.crew.role ?? '',
    vessel: props.crew.vessel ?? '',
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

const document_form = useForm({
    name: null,
    reminder: null,
    file: null,
});

function upload_document() {
    document_form.post('/crews/'+props.crew.id+'/documents', {
        forceFormData: true
    })
}

const editing = ref(false);

</script>