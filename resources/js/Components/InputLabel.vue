<script setup>
defineProps({
    value: {
        type: String,
    },
    color: {
        default: 'night'
    }
});
</script>

<template>
    <label :class="{
        'block font-medium text-sm' : true,
        'text-gray-300' : color == 'white',
        'text-night' : color == 'night',
        }">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
