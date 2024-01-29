<template>
    <Head title="New Crew" />
    
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Crew</h2>
        </template>

        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('crews.store'), { onSuccess: () => form.reset() })">
                <div class="pb-1 grid grid-cols-2 gap-3">
                    <div v-for="[key, value] of Object.entries(crew_schema)">
                        <div class="mb-2 flex flex-col gap-1">
                            <label>{{ key }}</label>
                            <input type="text" v-model="form[key]" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <InputError :message="form.errors[key]" class="mt-2" />
                        </div>
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
import { useForm, Head } from '@inertiajs/vue3';

const crew_schema = {
    ktp: '',
    name: '',
    role: '',
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