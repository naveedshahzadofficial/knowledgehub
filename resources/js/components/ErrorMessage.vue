<script setup>
defineProps({
    error: {
        type: Array,
        default: () => []
    }
});
</script>

<template>
    <div v-if="error" class="text-danger">{{ error[0] }}</div>
</template>
