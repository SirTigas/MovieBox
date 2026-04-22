<script setup>
import CardPoster from "../../Components/CardPoster.vue";
import {Head, router, useForm, usePage} from "@inertiajs/vue3";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import {ref} from "vue";
import SecondaryBtn from "../../Components/SecondaryBtn.vue";
import Paginate from "../../../../Paginate.vue";

defineProps({
    movies: Object,
});

const form = useForm({
    search: null,
});

const submit = () => {
    form.get(route("movie.search"), {
        preserveScroll: true,
        replace: true,
    });
};
</script>

<template>
    <Head title="Results" />

    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-10">

        <!-- Header -->
        <div
            class="
            flex flex-col sm:flex-row
            items-start sm:items-center
            justify-between
            gap-4 sm:gap-6
            mb-6 sm:mb-8
        "
        >

            <h1 class="text-2xl sm:text-3xl font-bold text-slate-950 dark:text-white">
                Search Results
            </h1>

            <!-- Search Form -->
            <form
                @submit.prevent="submit"
                class="
                    flex flex-col sm:flex-row
                    items-stretch sm:items-center
                    gap-2
                    w-full sm:w-auto
                    sm:min-w-75
                "
            >
                <InputField
                    type="search"
                    placeholder="Search another movie..."
                    class="w-full py-2 sm:py-3"
                    v-model="form.search"
                />

                <PrimaryBtn class="w-full sm:w-auto">
                    Search
                </PrimaryBtn>
            </form>
        </div>

        <!-- Movies + Side Buttons -->
        <div>
            <!-- Movies -->
            <Paginate v-if="movies.length" :movies="movies" :currentPage="$page.props.currentPage">
                <CardPoster :movies="movies.Search" />
            </Paginate>

            <!-- Empty State -->
            <div v-else class="text-center py-16 text-slate-500 dark:text-slate-400">
                No movies found.
            </div>
        </div>
    </section>
</template>

<style scoped>
</style>
