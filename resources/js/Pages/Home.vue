<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import PrimaryBtn from "../Components/PrimaryBtn.vue";
import InputField from "../Components/InputField.vue";

const form = useForm({
    search: null
})

const submit = () =>{
    form.get(route('movie.search'))
}
</script>

<template>
    <Head title="Home" />

    <section class="max-w-5xl mx-auto px-6 py-24 text-center">

        <h1 class="text-4xl md:text-5xl font-bold mb-6">
            Discover your next movie
        </h1>

        <p class="text-slate-600 dark:text-slate-300 text-lg mb-10">
            Search thousands of movies instantly
        </p>

        <form @submit.prevent="submit" class="flex items-center justify-center gap-3 max-w-2xl mx-auto">

            <InputField
                type="search"
                placeholder="Search movies..."
                v-model="form.search"
                class="py-4"
            />

            <PrimaryBtn type="submit">
                Search
            </PrimaryBtn>
        </form>
    </section>
</template>

<style scoped>

</style>
