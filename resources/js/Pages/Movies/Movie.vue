<script setup>
import CardPoster from "../../Components/CardPoster.vue";
import {Head, useForm} from "@inertiajs/vue3";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";

defineProps({
    movies: Object,
})

const form = useForm({
    search: null
})

const submit = () => {
    form.get(route('movie.search'))
}
</script>

<template>
    <Head
        title="Results"
    />
    <!--Show all search results-->
    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-slate-950 dark:text-white">
                Search Results
            </h1>

            <form @submit.prevent="submit" class="flex items-center gap-2 w-1/3">
                <InputField
                    size="py-3"
                    type="search"
                    placeholder="Search another movie..."
                    v-model="form.search"
                />

                <primary-btn size="py-3">
                    Search
                </primary-btn>
            </form>
        </div>
        <CardPoster
            :movies="movies"
        />

    </section>
</template>

<style scoped>

</style>
