<template>
    <Transition v-if="$page.props.flash.message != null" 
    leave-active-class="transition ease-in duration-1000" leave-from-class="opacity-100" leave-to-class="opacity-0">
        <div class="transition transform fixed z-40 bottom-0 inset-x-0 pb-2 sm:pb-5 opacity-100 scale-100 translate-y-0 ease-out duration-500">
            <div class="max-w-screen-sm mx-auto px-2 sm:px-4">
                <div :class="{
                    'rounded-lg text-sm shadow-md shadow-stone-500/50 sm:p-3 bg-night text-white' : true,
                    'shadow-success/50' : $page.props.flash['alert-class'] == 'success',
                    'shadow-warning/50' : $page.props.flash['alert-class'] == 'warning',
                    'shadow-danger/50' : $page.props.flash['alert-class'] == 'danger',
                }">
                    <div class="flex items-center justify-between flex-wrap ">
                        <div class="w-0 flex-1 flex items-center">
                            <p class="ml-3 truncate">
                                <span class="hidden lg:inline">
                                    <p class="mr-1"><span class="uppercase font-bold" v-html="$page.props.flash['alert-class']+'!'"></span> <span class="px-1" v-html="$page.props.flash.message"></span></p>
                                </span>
                            </p>
                        </div>
                        <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-2">
                            <SecondaryButton @click="$page.props.flash['message'] = null" type="button" color="night" aria-label="Hide banner">
                                Close
                            </SecondaryButton>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Transition>
</template>

<script setup>

import SecondaryButton from '@/Components/SecondaryButton.vue';

</script>