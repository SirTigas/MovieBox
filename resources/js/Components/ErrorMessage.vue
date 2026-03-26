<script setup>
defineProps({
    error: null
})
</script>

<template>
    <div v-if="error">
        <small class="text-red-500">{{ error }}</small>
    </div>
</template>

<style scoped>

</style>
