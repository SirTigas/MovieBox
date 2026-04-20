<script setup>
defineProps({
    class: {
        type: [String, Array, Object],
        default: '',
    }
})
</script>

<template>
    <div
        class="
            rounded-2xl
            border border-slate-200
            bg-white
            p-4 sm:p-6
            shadow-sm
            dark:border-slate-700
            dark:bg-slate-900
        "
        :class="$props.class"
    >
        <slot/>
    </div>
</template>
