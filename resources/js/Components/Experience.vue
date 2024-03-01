<script setup>
defineProps({
    experience: Object
})
</script>

<template>
    <div class="relative h-[70px] w-auto mx-4 pt-3">
        <p class="font-mono text-sm py-2 leading-none">{{ experience.code }}</p>
        <p class="absolute bottom-0 text-3xl font-bold leading-none">{{ experience.vessel }} &middot; {{ experience.rank }}</p>
        <div class="absolute bottom-0 right-0 ">
            <div class="flex h-full">
                <div class="text-right">
                    <p class="uppercase text-xs">Periode</p>
                    <p class="font-semibold text-sm">{{ experience.start_date }} - {{ experience.end_date }}</p>
                </div>
            </div>
        </div>
    </div>
</template>