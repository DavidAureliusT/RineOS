<template>
    <DialogRoot v-model:open="isOpen">
        <DialogTrigger>
            <slot name="trigger" />
        </DialogTrigger>
        <DialogPortal>
            <DialogOverlay class="bg-accent/25 data-[state=open]:animate-overlayShow fixed inset-0 z-30" />
            <DialogContent
                class="data-[state=open]:animate-contentShow fixed top-[50%] left-[50%] max-h-[85vh] w-[90vw] max-w-[500px] translate-x-[-50%] translate-y-[-50%] rounded-[6px] bg-black text-white p-[25px] shadow-[hsl(206_22%_7%_/_35%)_0px_10px_38px_-10px,_hsl(206_22%_7%_/_20%)_0px_10px_20px_-15px] focus:outline-none z-[100]"
            >
                <DialogTitle class="m-0 text-[17px] font-semibold">
                    Delete Crew
                </DialogTitle>
                <DialogDescription class="mt-[10px] mb-5 text-[15px] leading-normal">
                    Caution! This action will delete all related crew's data.
                </DialogDescription>
                <form @submit.prevent="delete_form.delete(route('crews.destroy', crew_id))" >
                    <div class="mt-[25px] flex justify-end gap-3">
                        <SecondaryButton @click="isOpen = false" color="white">Cancel</SecondaryButton>
                        <PrimaryButton type="submit">Delete Crew</PrimaryButton>
                    </div>
                </form>
                <DialogClose
                    class="absolute top-[10px] right-[10px] inline-flex h-[25px] w-[25px] appearance-none items-center justify-center rounded-full focus:shadow-[0_0_0_2px] focus:outline-none"
                    aria-label="Close"
                >
                    <PhX />
                </DialogClose>
            </DialogContent>
        </DialogPortal>
    </DialogRoot>
</template>

<script setup>
import {
  DialogClose,
  DialogContent,
  DialogDescription,
  DialogOverlay,
  DialogPortal,
  DialogRoot,
  DialogTitle,
  DialogTrigger,
} from 'radix-vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

import { PhX } from "@phosphor-icons/vue";
import { useForm } from '@inertiajs/vue3';

import { ref } from 'vue'

const props = defineProps({
    'crew_id': String
})

const isOpen = ref(false)

const delete_form = useForm({})

</script>