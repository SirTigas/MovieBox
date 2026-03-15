<script setup>
const model = defineModel()

defineProps({
    type: {
        type: String,
        default: "text"
    },

    placeholder: {
        type: String,
        default: '',
    },

})
</script>

<template>
    <!--Template input for all application-->
    <input
        :type="type"
        :placeholder="placeholder"
        v-model="model"
        class="
            w-full
            px-5 py-4
            rounded-xl
            border border-slate-300
            dark:border-slate-600
            bg-white
            dark:bg-slate-800
            text-slate-900
            dark:text-white
            placeholder:text-slate-400
            focus:outline-none
            focus:ring-2
            focus:ring-orange-400
            transition
        "
    >
</template>

<style scoped>

</style>
