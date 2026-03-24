<script setup>
defineProps({
    span: String
})
</script>

<template>
    <label class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400">
        <input
            type="checkbox"
            class="
                h-4 w-4
                rounded
                border-slate-300
                text-orange-400
                focus:ring-orange-400
                dark:border-slate-600
                dark:bg-slate-800
            "
        >
        <span>{{ span }}</span>
    </label>
</template>

<style scoped>

</style>
