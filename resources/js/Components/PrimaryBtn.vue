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
                    px-6 py-4
                    rounded-xl
                    bg-orange-400
                    hover:bg-orange-500
                    text-white
                    font-semibold
                    transition
                    cursor-pointer
            "
    >
        <slot/>
    </button>
</template>

<style scoped>

</style>
