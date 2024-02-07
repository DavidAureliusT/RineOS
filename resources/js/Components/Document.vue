<template>
    <div class="flex items-center h-[45px]">
        <div class="flex-none w-8 text-blue-500">
            <PhLink />
        </div>
        <div class="flex-1 text-blue-500">
            <a :href="$page.props.app_url+url">{{ name }}</a>
        </div>
        <div class="flex-none w-32">
            {{ reminder != null ? dayjs(reminder).fromNow() : '-' }}
        </div>
        <div class="flex-none w-56">
            <div class="flex flex-row-reverse gap-1">
                <Dialog 
                    :dialog-title="'Delete Document - '+name"
                    dialog-description="Are you sure?"
                >
                    <template #trigger-button>
                        <SecondaryButton class="text-red-500"><PhTrash class="mr-2" />Delete</SecondaryButton>
                    </template>
                    <div class="mt-[25px] flex justify-end">
                        <form @submit.prevent="delete_form.delete(route('documents.destroy', id))">
                            <PrimaryButton class="bg-red-500 text-white">Delete</PrimaryButton>
                        </form>
                    </div>
                </Dialog>

                <Dialog 
                    :dialog-title="'Update Document - '+name "
                    dialog-description="Update documents information."
                >
                    <template #trigger-button>
                        <SecondaryButton class="text-teal-500"><PhPencil class="mr-2" />Update</SecondaryButton>
                    </template>
                    <form @submit.prevent="update_form.put(route('documents.update', id))">
                        <fieldset class="mb-[15px] flex items-center gap-5">
                            <label class="w-[90px] text-right text-[15px]" for="name">Name</label>
                            <input
                                v-model="update_form.name"
                                id="name"
                                class="inline-flex h-[35px] w-full flex-1 items-center justify-center rounded-[4px] px-[10px] leading-none outline-none"
                                placeholder="ex: Curriculum vitae"
                            >
                            <InputError :message="update_form.errors['name']" class="mt-2" />
                        </fieldset>
                        <fieldset class="mb-[15px] flex items-center gap-5">
                            <label class="w-[90px] text-right text-[15px]" for="reminder">Reminders</label>
                            <input
                                v-model="update_form.reminder"
                                id="reminder"
                                class="inline-flex h-[35px] w-full flex-1 items-center justify-center rounded-[4px] px-[10px] leading-none outline-none"
                                type="date"
                            >
                            <InputError :message="update_form.errors['reminder']" class="mt-2" />
                        </fieldset>
                        <div class="mt-[25px] flex justify-end">
                            <PrimaryButton type="submit">Update</PrimaryButton>
                        </div>
                    </form>

                </Dialog>
                
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, Link, router } from '@inertiajs/vue3';

import { PhLink, PhPencil, PhTrash } from "@phosphor-icons/vue";
import Dialog from '@/Components/Dialog.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);

const props = defineProps(['id', 'url', 'name', 'reminder'])

const delete_form = useForm({})
const update_form = useForm({
    name: props.name ?? null,
    reminder: props.reminder ?? null,
});

</script>