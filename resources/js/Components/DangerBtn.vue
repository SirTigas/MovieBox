<script setup>
defineProps({
    size: {
        type: String,
        default: 'py-2'
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
            cursor-pointer
            mt-4
            w-full
            rounded-lg
            bg-red-500
            text-sm font-medium text-white
            hover:bg-red-600
            transition
            disabled:bg-red-300
            disabled:cursor-wait
        "
        :class="size"
    >
        <slot
        />
    </button>
</template>

<style scoped>

</style>
