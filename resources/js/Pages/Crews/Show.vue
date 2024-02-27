<template>
    
    <Head title="Crews" />
    
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between w-full">
                <div class="flex place-items-center gap-5">
                    <Link :href="route('crews.index')">
                        <h2 class="font-semibold text-md text-gray-800 leading-tight inline-flex items-center hover:text-accent">Crews</h2>
                    </Link>
                    <PhCaretRight/> 
                    <span class="text-gray-800">{{ crew.name }}</span>
                </div>
            </div>
        </template>

        <div>
            <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
                <div class="flex gap-8">
                    <div class="flex-none w-60">
                        <p class="font-bold text-3xl text-night">{{ crew.name }}</p>
                        <div id="PHOTO_PROFILE" class="mt-4">
                            <p class="font-bold text-sm uppercase">Photo Profile</p>
                            <div class="mt-3 flex items-center gap-4">
                                <div class="w-full flex flex-col place-items-center">
                                    <div class="p-3 bg-white border rounded-lg w-full aspect-square grid place-items-center">
                                        <h1 class="text-3xl">{{ crew.name[0] }}</h1>
                                    </div>
                                    <SecondaryButton class="mt-3 w-full" disabled>Edit Picture</SecondaryButton>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="flex-1">
                        <div>
                            <CrewContractCard :crew="crew" />
                        </div>
                        <hr class="my-8">
                        <div>
                            <CrewProfileCard class="mt-4" :crew="crew" />
                        </div>
                        <div>
                            <CrewDocumentsCard class="mt-4" :crew="crew" />
                        </div>
                        <!-- <hr class="my-8">
                        <div>
                            <CrewDangerZoneCard class="mt-4" :crew="crew" />
                        </div> -->
                    </div>
                    <div class="flex-none w-60 flex flex-col">
                        <div class="flex flex-col">
                            <p class="font-semibold text-gray-800 mb-1">On this page</p>
                            <a class="pl-3 py-1 border-l-2 font-semibold border-gray-400 text-gray-400 hover:border-accent hover:text-accent cursor-default">Current Contract</a>
                            <a class="pl-3 py-1 border-l-2 font-semibold border-gray-400 text-gray-400 hover:border-accent hover:text-accent cursor-default">Experience</a>
                            <a href="#PROFILE" class="pl-3 py-1 border-l-2 font-semibold border-gray-400 text-gray-400 hover:border-accent hover:text-accent cursor-default">Profile</a>
                            <a href="#DOCUMENTS" class="pl-3 py-1 border-l-2 font-semibold border-gray-400 text-gray-400 hover:border-accent hover:text-accent cursor-default">Document</a>
                            <a class="pl-3 py-1 border-l-2 font-semibold border-gray-400 text-gray-400 hover:border-accent hover:text-accent cursor-default">Discussion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

import { PhCaretRight } from "@phosphor-icons/vue";


import SecondaryButton from '@/Components/SecondaryButton.vue';

import CrewContractCard from '@/Components/CrewContractCard.vue';
import CrewProfileCard from '@/Components/CrewProfileCard.vue';
import CrewDocumentsCard from '@/Components/CrewDocumentsCard.vue';
import CrewDangerZoneCard from '@/Components/CrewDangerZoneCard.vue';

import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);

const props = defineProps({
    'crew': Object
})

const document_form = useForm({
    name: null,
    reminder: null,
    file: null,
});

function upload_document() {
    document_form.post('/crews/'+props.crew.id+'/documents', {
        forceFormData: true
    })
}


</script>