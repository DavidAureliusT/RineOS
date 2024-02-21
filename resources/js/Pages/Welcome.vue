<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { PhPerson } from "@phosphor-icons/vue";

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
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-primary selection:text-white"
    >
        <div class="
        fixed inset-x-0 top-12
        grid place-items-center
        ">
            <div class="
            xl:max-w-6xl lg:max-w-4xl md:max-w-md sm:max-w-md
            w-full
            flex items-center justify-between
            ">
                <svg width="62" height="28" viewBox="0 16 62 28" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-8 w-auto">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M37.5034 18L25.2572 45.554H32.1457L37.5034 33.3078V45.554H58.9343L61.9958 37.9001H48.2188L56.6381 18H49.7496L44.3919 31.0116V18H37.5034ZM30.4862 25.5923L33.6771 18.0001H12.4413L9.25037 25.5923H30.4862ZM8.44986 27.9586H29.6857L26.2835 35.5732H5.04768L8.44986 27.9586ZM24.6726 37.9507H3.4368L0 45.5541H21.2358L24.6726 37.9507Z" class="fill-primary"/>
                </svg>
                <p class="px-3 text-sm text-gray-500 dark:text-gray-400 hover:underline">Help</p>
            </div>
        </div>
        

        <div class="xl:max-w-6xl lg:max-w-4xl md:max-w-md sm:max-w-md
            w-full">
            <div class="grid xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-8">
                
                <div 
                @click="router.visit(route('crews.index'))"
                class="col-span-1 rounded-lg border-2 h-96 flex justify-center items-center hover:bg-primary/70 hover:border-transparent hover:rounded-3xl transition-all">
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
            xl:max-w-6xl lg:max-w-4xl md:max-w-md sm:max-w-md
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
