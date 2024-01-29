<template>
    <Head title="Crew Database" />
    
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crew Database</h2>
        </template>

        <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="mt-6 grid grid-cols-2 gap-2">
                <Crew
                    v-for="crew in crews"
                    :key="crew.id"
                    :crew="crew"
                />
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Crew from '@/Components/Crew.vue';

import { Head } from '@inertiajs/vue3';

const props = defineProps({
    'crews': Object
})

</script>