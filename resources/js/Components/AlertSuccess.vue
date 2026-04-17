<script setup>
defineProps({
    status: String
})
</script>

<template>
    <div
        class="
            inline-flex items-center gap-3
            rounded-xl
            bg-green-100
            px-4 py-2
            text-sm font-medium
            text-green-800
            border border-green-200
            shadow-sm
            dark:bg-green-900/30
            dark:text-green-300
            dark:border-green-800
        "
    >
        <i class="fa-solid fa-circle-check text-green-500"></i>

        <span>
            {{ status }}
        </span>
    </div>
</template>

<style scoped>

</style>
