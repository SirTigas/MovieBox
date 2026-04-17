<script setup>
import PrimaryBtn from "../Components/PrimaryBtn.vue";
import {Head, Link} from "@inertiajs/vue3";

defineProps({
    watchlist: Object,
})
</script>

<template>
    <Head title="Watchlist" />
    <section class="max-w-7xl mx-auto px-6 py-12">
        <!-- Header -->
        <div class="flex items-center justify-between mb-10">
            <h1 class="text-3xl font-bold text-slate-950 dark:text-white">
                My Watchlist
            </h1>

            <span class="text-sm text-slate-500 dark:text-slate-400">
                {{ watchlist.total }} movies saved
            </span>
        </div>

        <!-- Grid -->
        <div
            v-if="watchlist.total > 0"
            class="
                grid gap-8
                grid-cols-2
                sm:grid-cols-3
                md:grid-cols-4
                lg:grid-cols-5
            "
        >

            <!-- Card -->
            <div
                v-for="movie in watchlist.data"
                class="
                    group
                    relative
                    rounded-2xl
                    overflow-hidden
                    bg-white
                    shadow-md
                    transition
                    hover:shadow-xl
                    dark:bg-slate-900
                    cursor-pointer
                "
            >
                <Link :href="route('movie.detail', movie.imdb_id)">
                    <!-- Poster -->
                    <div class="overflow-hidden">
                        <img
                            :src="movie.poster"
                            alt="Movie Poster"
                            class="
                                w-full h-full object-cover
                                transition-transform duration-300
                                group-hover:scale-110
                            "
                        >
                    </div>


                    <!-- Overlay (hover) -->
                    <div
                        class="
                            absolute inset-0
                            bg-black/60
                            opacity-0
                            group-hover:opacity-100
                            transition
                            flex flex-col justify-end
                            p-4
                        "
                    >

                        <h3 class="text-white font-semibold text-lg leading-tight">
                            {{ movie.title }}
                        </h3>

                        <p class="text-sm text-gray-300">
                            {{ movie.year }}
                        </p>

                        <button
                            class="
                                mt-4
                                w-full
                                rounded-lg
                                bg-red-500
                                py-2 text-sm font-medium text-white
                                hover:bg-red-600
                                transition
                            "
                        >
                            Remove
                        </button>
                    </div>
                </Link>
            </div>
        </div>

        <!-- Empty State -->
        <div
            v-else
            class="
                mt-20
                flex flex-col items-center justify-center
                text-center
            "
        >
            <div
                class="
                    w-20 h-20
                    rounded-full
                    bg-slate-200
                    dark:bg-slate-800
                    flex items-center justify-center
                    mb-4
                "
            >
                <i class="fa-solid fa-film text-2xl text-slate-500"></i>
            </div>

            <h2 class="text-xl font-semibold text-slate-800 dark:text-white mb-2">
                Your watchlist is empty
            </h2>

            <p class="text-slate-500 dark:text-slate-400 mb-6">
                Start adding movies to keep track of what you want to watch.
            </p>

            <Link :href="route('home')">
                <PrimaryBtn>
                    Explore Movies
                </PrimaryBtn>
            </Link>
        </div>

    </section>
</template>

<style scoped>

</style>
