<script setup>
defineProps({
    paginateArray: Object
})

</script>

<template>
    <div
        class="
            flex flex-wrap items-center justify-center
            gap-1 sm:gap-2
            mt-6 sm:mt-8
        "
    >
        <template v-for="page in paginateArray.links" :key="page.label">

            <!-- Disabled -->
            <span
                v-if="!page.url"
                class="
                        px-2 sm:px-3
                        py-1.5 sm:py-2
                        text-xs sm:text-sm
                        text-gray-400
                        cursor-not-allowed
                    "
                v-html="page.label"
            />

            <!-- Active -->
            <span
                v-else-if="page.active"
                class="
                    px-2 sm:px-3
                    py-1.5 sm:py-2
                    text-xs sm:text-sm
                    bg-orange-400 text-white
                    rounded-md sm:rounded-lg
                    font-semibold
                "
                v-html="page.label"
            />

            <!-- Normal -->
            <Link
                v-else
                :href="page.url"
                preserve-state
                preserve-scroll
                class="
                    px-2 sm:px-3
                    py-1.5 sm:py-2
                    text-xs sm:text-sm
                    rounded-md sm:rounded-lg
                    bg-white dark:bg-slate-800
                    text-gray-700 dark:text-gray-300
                    hover:bg-orange-100
                    active:scale-95
                    transition
                "
                v-html="page.label"
            />
        </template>
    </div>
</template>

<style scoped>

</style>
