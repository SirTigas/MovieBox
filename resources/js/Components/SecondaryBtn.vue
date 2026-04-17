<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit'
    },

})
</script>

<template>
    <button
        :type="type"
        class="
            font-semibold
            transition
            cursor-pointer
            px-6 py-3
            rounded-xl
            border-slate-200
            bg-white
            text-slate-800
            hover:bg-slate-100
            dark:border-slate-700
            dark:bg-slate-800
            dark:text-slate-200
            dark:hover:bg-slate-700
            disabled:bg-slate-400
            dark:disabled:bg-slate-200
            disabled:cursor-wait
        "
    >
        <slot/>
    </button>
</template>

<style scoped>

</style>
