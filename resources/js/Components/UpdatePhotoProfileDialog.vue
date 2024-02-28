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
    crew_id: Number
})

const _form = useForm({
    file: {},
});

function update_photo_profile() {
    _form.post('/crews/'+props.crew_id+'/photo_profile', {
        forceFormData: true,
        onSuccess: () => {
            isOpen.value = false
            _form.reset()
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
                    Update Photo Profile
                </DialogTitle>
                <DialogDescription class="mt-[10px] mb-5 text-[15px] leading-normal">
                    Upload Photo, then click save when you're done.
                </DialogDescription>
                <form @submit.prevent="update_photo_profile" >
                    <fieldset class="mb-[15px] flex items-start gap-5">
                        <label class="w-[90px] text-right text-[15px] pt-1.5" for="file">File</label>
                        <div class="flex-grow">
                            <input 
                                @input="_form.file = $event.target.files[0]"
                                type="file" 
                                id="file"
                                class="inline-flex  w-full flex-1 leading-none outline-none"
                            >
                            <InputError :message="_form.errors.file" class="mt-2" />
                        </div>
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