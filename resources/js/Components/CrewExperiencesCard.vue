<template>
    <div id="EXPERIENCES" class="bg-white py-5 rounded-lg border scroll-mt-40">
        <div class="flex justify-between items-start pr-4 h-14">
            <a href="#EXPERIENCES" class="px-8 bg-night text-white font-semibold text-sm py-1">Experiences</a>
        </div>
        <div class="flex flex-col gap-3 divide-y border-y">
            <div v-for="(contract, index) in crew.contracts" :key="index" class="p-4">
                <div class="relative h-16">
                    <p class="font-mono text-sm py-2 leading-none">{{ contract.code }}</p>
                    <p class="absolute bottom-0 text-3xl font-bold leading-none">{{ crew.vessel }} &middot; {{ crew.rank }}</p>
                    <div class="absolute bottom-0 right-0 ">
                        <div class="flex h-full">
                            <div class="text-right">
                                <p class="uppercase text-xs">Periode</p>
                                <p class="font-semibold text-sm">{{ contract.start_date }} - {{ contract.end_date }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

const props = defineProps({
    crew :Object
})

</script>