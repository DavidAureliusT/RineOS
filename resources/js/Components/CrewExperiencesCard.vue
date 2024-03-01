<template>
    <div id="EXPERIENCES" class="bg-white py-5 rounded-lg border scroll-mt-40">
        <div class="flex justify-between items-start pr-4 h-14">
            <a href="#EXPERIENCES" class="px-8 bg-night text-white font-semibold text-sm py-1">Experiences</a>
        </div>
        <div class="flex flex-col flex-nowrap gap-4 divide-y ">
            <Experience v-for="(contract, index) in crew.contracts" :key="index" :experience="contract" class="flex-none" />
        </div>
    </div>
</template>

<script setup>
import Experience from "@/Components/Experience.vue";

const props = defineProps({
    crew :Object
})

</script>