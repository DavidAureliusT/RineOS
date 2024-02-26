<template>
    <div id="PROFILE" class="bg-white py-5 rounded-lg border ">
        <div class="flex justify-between items-start pr-4 h-14">
            <p class="px-8 bg-night text-white font-semibold text-sm py-1">Current Contract</p>
            <PrimaryButton @click="editing = !editing" class="mb-4 w-24">{{ !editing ? 'Update' : 'Cancel' }}</PrimaryButton>
        </div>
        <div class="px-4">
            <div class="flex gap-4">
                <div class="flex-none relative w-48 aspect-square flex justify-center items-center bg-primary rounded-lg">
                    <PhBoat size="56" weight="duotone" />
                    <!-- <p class="absolute bottom-3 font-bold">{{ contract.vessel }}</p> -->
                </div>
                <div class="flex-1 relative">
                    <p class="font-mono text-sm py-2 leading-none">{{ contract.code }}</p>
                    <p class="text-3xl font-bold leading-none">{{ contract.rank }}</p>
                    <p class="text-sm">{{ contract.vessel }}</p>
                    <div 
                    class="font-bold tracking-widest w-fit px-3 py-1 text-white uppercase text-xs mt-2 animate-pulse"
                    :class="[
                        contract.status == 'expired' ? 'bg-night' : '',
                        contract.status == 'active' ? 'bg-accent' : ''
                    ]">
                        <p>{{ contract.status }}</p>
                    </div>
                    <div class="absolute bottom-0 inset-x-0">
                        <div class="flex justify-between text-xs">
                            <p>{{ contract.start }}</p>
                            <p>{{ contract.end }}</p>
                        </div>
                        <div class="mt-2">
                            <ProgressRoot
                                v-model="progressValue"
                                class="relative overflow-hidden border-4 border-black bg-black rounded-full md:w-full h-4 sm:h-5"
                                style="transform: translateZ(0)"
                            >
                                <ProgressIndicator
                                class="bg-primary rounded-full w-full h-full transition-transform duration-[660ms] ease-[cubic-bezier(0.65, 0, 0.35, 1)]"
                                :style="`transform: translateX(-${100 - progressValue}%)`"
                                />
                            </ProgressRoot>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

import { ProgressIndicator, ProgressRoot } from 'radix-vue'

const progressValue = ref(10)

onMounted(() => {
  const timer = setTimeout(() => (progressValue.value = 100), 500)
  return () => clearTimeout(timer)
})


import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

import { PhBoat } from "@phosphor-icons/vue";

const props = defineProps({
    'crew' : Object
})

const contract =  {
        code : '121/CRW-ENL-PKL/III/2023',
        vessel : 'EN3000',
        rank : 'Barge Master',
        start : '18 Mar 2022',
        end : '17 Sep 2022',
        status : 'expired',
    }

const _schema = {
    
}

const form = useForm(_schema);

const editing = ref(false);

</script>