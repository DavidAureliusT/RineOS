<template>
    <div id="DANGER_ZONE" class="bg-white py-5 rounded-lg border border-danger">
        <div class="flex justify-between items-start pr-4 h-14">
            <p class="px-8 bg-danger text-white font-semibold text-sm py-1">Danger Zone</p>
        </div>
        <div class="px-4">
            <p class="font-semibold text-lg">Delete Crew</p>
            <p>Caution! This action will delete all related crew's data.</p>
            <div class="mt-3">
                <DeleteCrewDialog :crew_id="crew.id" >
                    <template #trigger>
                        <PrimaryButton color="black">Delete Crew</PrimaryButton>
                    </template>
                </DeleteCrewDialog>
            </div>
        </div>
    </div>
</template>

<script setup>

import PrimaryButton from '@/Components/PrimaryButton.vue';
import DeleteCrewDialog from '@/Components/DeleteCrewDialog.vue';

const props = defineProps({
    'crew' : Object
})

</script>