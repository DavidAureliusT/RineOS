<template>
    <div id="DOCUMENTS" class="bg-white py-5 rounded-lg border scroll-mt-40">
        <div class="flex justify-between items-start pr-4 h-14">
            <a href="#DOCUMENTS" class="px-8 bg-night text-white font-semibold text-sm py-1">Documents</a>
            <UploadDocumentDialog :crew_id="crew.id" >
                <template #trigger>
                    <PrimaryButton class="w-24">Upload</PrimaryButton>
                </template>
            </UploadDocumentDialog>
        </div>

        <div>
            <div v-if="crew.documents.length" class="mt-4 divide-y">
                <div class="flex items-center text-black/50 font-bold h-[35px] p-3">
                    <div class="flex-none w-8"></div>
                    <div class="flex-1">
                        Name
                    </div>
                    <div class="flex-none w-32">
                        Reminder
                    </div>
                    <div class="flex-none w-56 text-right">
                        Actions
                    </div>
                </div>
                
                <div class="p-3">
                    <Document v-for="(item, index) in crew.documents" :key="index" 
                        :id="item.id"
                        :url="item.url"
                        :name="item.name"
                        :reminder="item.reminder"
                    />
                </div>
            </div>
            <p v-else class="px-4 text-gray-500 text-right animate-pulse">No Document</p>
        </div>

    </div>
</template>

<script setup>

defineProps({
    'crew' : Object
})

import UploadDocumentDialog from '@/Components/UploadDocumentDialog.vue';
import Document from '@/Components/Document.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';


</script>