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
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import { PhX } from "@phosphor-icons/vue";
import { useForm } from '@inertiajs/vue3';

import { ref } from 'vue'

const props = defineProps({
    'crew_id': String
})

const document_form = useForm({
    name: '',
    reminder: '',
    file: {},
});

function upload_document() {
    document_form.post('/crews/'+props.crew_id+'/documents', {
        forceFormData: true,
        onSuccess: () => {
            isOpen.value = false
            document_form.reset()
        }
    })
}

const isOpen = ref(false)

</script>


<template>
    <DialogRoot v-model:open="isOpen">
        <DialogTrigger>
            <slot name="trigger" />
        </DialogTrigger>
        <DialogPortal>
            <DialogOverlay class="bg-black/25 data-[state=open]:animate-overlayShow fixed inset-0 z-30" />
            <DialogContent
                class="data-[state=open]:animate-contentShow fixed top-[50%] left-[50%] max-h-[85vh] w-[90vw] max-w-[500px] translate-x-[-50%] translate-y-[-50%] rounded-[6px] bg-white p-[25px] shadow-[hsl(206_22%_7%_/_35%)_0px_10px_38px_-10px,_hsl(206_22%_7%_/_20%)_0px_10px_20px_-15px] focus:outline-none z-[100]"
            >
                <DialogTitle class="m-0 text-[17px] font-semibold">
                    Upload Document
                </DialogTitle>
                <DialogDescription class="mt-[10px] mb-5 text-[15px] leading-normal">
                    Upload documents and set reminders to update. Click save when you're done.
                </DialogDescription>
                <form @submit.prevent="upload_document" >
                    <fieldset class="mb-[15px] flex items-start gap-5">
                        <label class="w-[90px] text-right text-[15px] pt-1.5" for="file">File</label>
                        <div class="flex-grow">
                            <input 
                                @input="document_form.file = $event.target.files[0]"
                                type="file" 
                                id="file"
                                class="inline-flex  w-full flex-1 leading-none outline-none"
                            >
                            <InputError :message="document_form.errors.file" class="mt-2" />
                        </div>
                    </fieldset>
                    <fieldset class="mb-[15px] flex items-start gap-5">
                        <label class="w-[90px] text-right text-[15px] pt-1.5" for="name">Name</label>
                        <div class="flex-grow">
                            <TextInput
                                v-model="document_form.name"
                                id="name"
                                class="inline-flex h-[35px] w-full flex-1 items-center justify-center rounded-[4px] px-[10px] leading-none outline-none"
                                placeholder="ex: Curriculum vitae"
                            />
                            <InputError :message="document_form.errors.name" class="mt-2" />
                        </div>
                    </fieldset>
                    <fieldset class="mb-[15px] flex items-start gap-5">
                        <label class="w-[90px] text-right text-[15px] pt-1.5" for="reminder">Reminders</label>
                        <TextInput
                            v-model="document_form.reminder"
                            id="reminder"
                            class="inline-flex h-[35px] w-full flex-1 items-center justify-center rounded-[4px] px-[10px] leading-none outline-none"
                            type="date"
                        />
                        <InputError :message="document_form.errors.reminder" class="mt-2" />
                    </fieldset>
                    <div class="mt-[25px] flex justify-end">
                        <PrimaryButton type="submit">Upload</PrimaryButton>
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