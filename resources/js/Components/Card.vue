<script setup>
defineProps({
    style: {
        type: String,
        default: '',
    }
})
</script>

<template>
    <div
        class="
            rounded-2xl border border-slate-200
            bg-white p-6 shadow-sm
            dark:border-slate-700
            dark:bg-slate-800
        "

        :class="style"
    >
        <slot/>

    </div>
</template>

<style scoped>

</style>
