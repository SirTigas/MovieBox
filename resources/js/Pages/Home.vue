<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import PrimaryBtn from "../Components/PrimaryBtn.vue";
import InputField from "../Components/InputField.vue";

const form = useForm({
    search: null
})

const submit = () => {
    form.get(route('movie.search'))
}
</script>

<template>
    <Head title="Home" />

    <!-- Page Container -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 py-16 sm:py-24 text-center">

        <!-- Title -->
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 sm:mb-6">
            Discover your next movie
        </h1>

        <!-- Subtitle -->
        <p class="text-slate-600 dark:text-slate-300 text-base sm:text-lg mb-8 sm:mb-10">
            Search thousands of movies instantly
        </p>

        <!-- Search Form -->
        <form
            @submit.prevent="submit"
            class="
                flex flex-col sm:flex-row
                items-stretch sm:items-center
                justify-center
                gap-3
                max-w-2xl
                mx-auto
            "
        >

            <!-- Input -->
            <InputField
                type="search"
                placeholder="Search movies..."
                v-model="form.search"
                class="w-full py-3 sm:py-4"
            />

            <!-- Button -->
            <PrimaryBtn
                type="submit"
                class="w-full sm:w-auto"
                :disabled="form.processing"
            >
                <span v-if="form.processing">Searching...</span>
                <span v-else>Search</span>
            </PrimaryBtn>

        </form>

    </section>
</template>

<style scoped>
</style>
