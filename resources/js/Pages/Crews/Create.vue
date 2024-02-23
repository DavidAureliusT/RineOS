<template>
    <Head title="New Crew" />
    
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between w-full">
                <div class="flex place-items-center gap-5">
                    <Link :href="route('crews.index')">
                        <h2 class="font-semibold text-md text-gray-800 leading-tight inline-flex items-center hover:text-accent">Crews</h2>
                    </Link>
                    <PhCaretRight/> 
                    <span class="text-gray-800">Create</span>
                </div>
            </div>
        </template>

        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('crews.store'), { onSuccess: () => form.reset() })">
                <div class="flex flex-wrap gap-4">
                    <div v-for="[key, _] of Object.entries(crew_schema)" class="flex-grow basis-1/5">
                        <InputLabel :for="key" :value="key" color="night" />
    
                        <TextInput
                            :id="key"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form[key]"
                            required
                            autofocus
                        />
    
                        <InputError class="mt-2" :message="form.errors[key]" />
                    </div>
                </div>
                
                <PrimaryButton class="mt-4">Save</PrimaryButton>
            </form>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

import { useForm, Head, Link } from '@inertiajs/vue3';

const crew_schema = {
    ktp: '',
    name: '',
    role: '',
    vessel: '',
    birthplace: '',
    birthdate: '',
    religion: '',
    marital_status: '',
    blood_type: '',
    address: '',
    phone: '',
    emergency_contact: '',
    email: '',
    passport: '',
    seaman_book: '',
    kk: '',
    npwp: '',
    bpjs_tk: '',
    bpjs_kes: '',
    bank: '',
    bank_account_number: '',
    bank_account_owner: '',
}

const form = useForm(crew_schema);

</script>