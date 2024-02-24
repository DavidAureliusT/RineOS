<template>
    <div id="PROFILE" class="bg-white py-5 rounded-lg border ">
        <div class="flex justify-between items-start pr-4 h-14">
            <p class="px-8 bg-night text-white font-semibold text-sm py-1">Profile</p>
            <PrimaryButton @click="editing = !editing" class="mb-4 w-24">{{ !editing ? 'Edit' : 'Cancel' }}</PrimaryButton>
        </div>
        <form class="px-4" @submit.prevent="form.put(route('crews.update', crew.id), { onSuccess: () => editing = false })">
            <div class="pb-1 grid grid-cols-1 gap-3">
                <div v-for="[key, value] of Object.entries(crew_schema)">
                    <div class="mb-2 flex flex-row gap-4">
                        <label class="w-48 py-2 font-semibold text-right capitalize">{{ key }}</label>
                        <div class="flex-1 flex flex-col">
                            <TextInput type="text" 
                                :class="[
                                    editing == true ? '' : 'border-transparent'
                                ]" 
                                v-model="form[key]" :disabled="!editing" />
                            <InputError :message="form.errors[key]" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-start items-start flex-row-reverse gap-2 h-14">
                <PrimaryButton v-if="editing" class="mt-4">Save</PrimaryButton>
                <SecondaryButton v-if="editing" @click="editing = false; form.reset(); form.clearErrors()" class="mt-4">Cancel</SecondaryButton>
            </div>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    'crew' : Object
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

const editing = ref(false);

</script>