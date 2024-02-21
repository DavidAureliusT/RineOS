<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { PhPerson } from "@phosphor-icons/vue";
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-accent selection:text-white"
    >
        <div class="
        fixed inset-x-0 top-12
        grid place-items-center
        ">
            <div class="
            xl:max-w-5xl lg:max-w-4xl md:max-w-md sm:max-w-md
            w-full
            flex items-center justify-between
            ">
                <ApplicationLogo
                    class="block h-5 w-auto fill-current text-gray-800"
                />
                <p class="px-3 text-sm text-gray-500 dark:text-gray-400 hover:underline">Help</p>
            </div>
        </div>
        

        <div class="xl:max-w-5xl lg:max-w-4xl md:max-w-md sm:max-w-md
            w-full">
            <div class="grid xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-8">
                
                <div 
                @click="router.visit(route('crews.index'))"
                class="col-span-1 rounded-lg border-2 h-96 flex justify-center items-center hover:bg-accent/70 hover:border-transparent hover:rounded-3xl transition-all">
                    <div class="flex flex-col items-center text-white">
                        <PhPerson weight="thin" size="50" class="mb-4"/>
                        <p class="font-semibold">Crew Management</p>
                    </div>
                </div>

                <div class="col-span-1 rounded-lg border-2 border-zinc-500 border-dashed h-96 flex justify-center items-center">
                    <p class="text-white/70">Coming Soon</p>
                </div>
            </div>
        </div>


        <div class="
        fixed inset-x-0 bottom-12
        grid place-items-center
        ">
            <div class="
            xl:max-w-5xl lg:max-w-4xl md:max-w-md sm:max-w-md
            w-full
            flex mt-4 items-center justify-between
            sm:divide-x sm:divide-slate-500 lg:divide-x-0
            text-sm text-gray-500 dark:text-gray-400
            ">
                <p class="px-3">RineOS@Eka Nusantara Line</p>
                <p class="px-3">by davidaurelius</p>
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
