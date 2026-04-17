<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit'
    },

    size: {
        type: String,
        default: 'py-4',
    }

})
</script>

<template>
    <button
        :type="type"
        class="
            px-6
            rounded-xl
            bg-orange-400
            disabled:bg-orange-200
            disabled:cursor-wait
            hover:bg-orange-500
            text-white
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
