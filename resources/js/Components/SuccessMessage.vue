<script setup>
defineProps({
    success: null
})
</script>

<template>
    <div v-if="success">
        <small class="text-green-500">{{ success }}</small>
    </div>
</template>

<style scoped>

</style>
