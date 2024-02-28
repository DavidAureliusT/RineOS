<template>
    <div id="PHOTO_PROFILE">
        <p class="font-bold text-sm uppercase">Photo Profile</p>
        <div class="mt-3 flex items-center gap-4">
            <div class="w-full flex flex-col place-items-center">
                <div class="p-3 bg-white border rounded-lg w-full aspect-square grid place-items-center">
                    <h1 class="text-3xl">{{ crew.name[0] }}</h1>
                </div>
                <UpdatePhotoProfileDialog :crew_id="crew.id">
                    <template #trigger>
                        <SecondaryButton class="mt-3 w-full">Edit Picture</SecondaryButton>
                    </template>
                </UpdatePhotoProfileDialog>
            </div>
        </div>
    </div>
</template>

<script setup>
import SecondaryButton from '@/Components/SecondaryButton.vue';
import UpdatePhotoProfileDialog from '@/Components/UpdatePhotoProfileDialog.vue'
defineProps({
    crew : Object
})
</script>