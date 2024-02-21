<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-night bg-dots-darker dark:bg-dots-lighter selection:bg-accent selection:text-white">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-auto h-12 fill-current text-gray-500" />
            </Link>
        </div>
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white/5 shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
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