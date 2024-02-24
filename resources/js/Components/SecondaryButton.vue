<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
    color: { default: 'white' }
});
</script>

<template>
    <button
        :type="type"
        :class="{
            'inline-flex items-center justify-center px-4 py-2 border rounded-md hover:shadow-inner font-bold text-xs transition-all' : true,
            'bg-accent text-white uppercase tracking-widest hover:shadow-black focus:bg-accent/60 active:bg-accent/90 focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2' : color == 'red',
            'bg-night/70 text-white uppercase tracking-widest hover:shadow-black focus:bg-night/60 active:bg-night/90 focus:outline-none focus:ring-2 focus:ring-night/70 focus:ring-offset-2' : color == 'night',
            'bg-success text-white uppercase tracking-widest hover:shadow-black focus:bg-success/60 active:bg-success/90 focus:outline-none focus:ring-2 focus:ring-success focus:ring-offset-2' : color == 'green',
            'bg-primary text-gray-800 uppercase tracking-widest hover:shadow-black focus:bg-primary/60 active:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2' : color == 'white'
    }"
    >
        <slot />
    </button>
</template>
