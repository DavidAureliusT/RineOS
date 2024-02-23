<template>
    <button
        :class="{
            'inline-flex items-center px-4 py-2 rounded-full shadow-md shadow-black/80 hover:shadow-inner font-bold text-xs transition-all' : true,
            'bg-accent text-white uppercase tracking-widest hover:shadow-black focus:bg-accent/60 active:bg-accent/90 focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2' : color == 'red',
            'bg-night/70 text-white uppercase tracking-widest hover:shadow-black focus:bg-night/60 active:bg-night/90 focus:outline-none focus:ring-2 focus:ring-night/70 focus:ring-offset-2' : color == 'night',
            'bg-success text-white uppercase tracking-widest hover:shadow-black focus:bg-success/60 active:bg-success/90 focus:outline-none focus:ring-2 focus:ring-success focus:ring-offset-2' : color == 'green'

    }"
    >
        <slot />
    </button>
</template>

<script setup>
defineProps({
    color: { default: 'red' }
})
</script>
