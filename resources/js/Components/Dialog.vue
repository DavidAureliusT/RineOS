<script setup lang="ts">
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
import { PhX } from "@phosphor-icons/vue";

defineProps(['triggerButtonLabel', 'dialogTitle', 'dialogDescription'])

</script>


<template>
    <DialogRoot>
        <DialogTrigger>
            <slot name="trigger-button" />
        </DialogTrigger>
        <DialogPortal>
            <DialogOverlay class="bg-black/25 data-[state=open]:animate-overlayShow fixed inset-0 z-30" />
            <DialogContent
                class="data-[state=open]:animate-contentShow fixed top-[50%] left-[50%] max-h-[85vh] w-[90vw] max-w-[500px] translate-x-[-50%] translate-y-[-50%] rounded-[6px] bg-white p-[25px] shadow-[hsl(206_22%_7%_/_35%)_0px_10px_38px_-10px,_hsl(206_22%_7%_/_20%)_0px_10px_20px_-15px] focus:outline-none z-[100]"
            >
                <DialogTitle class="m-0 text-[17px] font-semibold">
                    {{ dialogTitle }}
                </DialogTitle>
                <DialogDescription class="mt-[10px] mb-5 text-[15px] leading-normal">
                    {{ dialogDescription }}
                </DialogDescription>
                <slot />
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