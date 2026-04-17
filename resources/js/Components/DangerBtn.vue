<script setup>
defineProps({
    size: {
        type: String,
        default: 'py-3'
    },

    type: {
        type: String,
        default: 'submit'
    }
})
</script>

<template>
    <button
        :type="type"
        class="
            px-6
            rounded-xl
            bg-red-500
            disabled:bg-red-300
            disabled:cursor-wait
            hover:bg-red-600
            font-semibold
            transition
            cursor-pointer
        "

        :class="size"
    >
        <slot/>
    </button>
</template>

<style scoped>

</style>
