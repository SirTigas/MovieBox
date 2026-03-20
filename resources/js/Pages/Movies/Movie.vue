<script setup>
import CardPoster from "../../Components/CardPoster.vue";
import {Head} from "@inertiajs/vue3";

defineProps({
    movies: Object,
})
</script>

<template>
    <Head
        title="Results"
    />
    <!--Show all search results-->
    <section class="max-w-7xl mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold mb-8 text-slate-950 dark:text-white">
            Search Results
        </h1>

        <CardPoster
            :movies="movies"
        />

    </section>
</template>

<style scoped>

</style>
