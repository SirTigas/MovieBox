<script setup>
defineProps({
   size: {
       type: String,
       default: 'text-4xl'
   }
})
</script>

<template>
    <Link :href="route('home')" :class="size" class="font-bold tracking-tight">
        <span class="text-slate-950 dark:text-white">Movie</span><span class="text-orange-400">Box</span>
    </Link>
</template>

<style scoped>

</style>
