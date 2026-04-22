<script setup>
import {useForm} from "@inertiajs/vue3";
import SuccessMessage from "./SuccessMessage.vue";
import AlertSuccess from "./AlertSuccess.vue";

defineProps({
    movies: Object,
});

const watchlistForm = useForm({
    imdb_id: null,
    poster: null,
    title: null,
    year: null
})

const submitWatchlist = (movie) => {
    watchlistForm.imdb_id = movie.imdbID
    watchlistForm.poster = movie.Poster
    watchlistForm.title = movie.Title
    watchlistForm.year = movie.Year
    watchlistForm.post(route('watchlist.store'), {
        preserveScroll: true,
    })
}
</script>

<template>
    <div v-if="watchlistForm.recentlySuccessful" class="fixed inset-0 z-50 flex items-start justify-center pt-6 pointer-events-none">
        <AlertSuccess
            class="pointer-events-auto max-w-sm w-full mx-4"
            status="Saved!"
        />

    </div>

    <!-- Movies Grid -->
    <div
        class="
            grid
            grid-cols-2
            sm:grid-cols-3
            md:grid-cols-4
            lg:grid-cols-5
            gap-4 sm:gap-6
        "
    >
        <article
            v-for="movie in movies"
            :key="movie.imdbID"
            class="
                group
                rounded-2xl
                overflow-hidden
                bg-white dark:bg-slate-800
                shadow-md
                transition-all duration-300
                hover:shadow-xl
            "
        >
            <!-- Poster -->
            <div class="relative overflow-hidden">

                <!-- Overlay -->
                <div class="absolute inset-0 z-10 pointer-events-none">

                    <form
                        @submit.prevent="submitWatchlist(movie)"
                        class="pointer-events-auto"
                    >
                        <button
                            type="submit"
                            class="cursor-pointer mt-3 ml-4"
                        >
                            <i class="text-orange-400 fa-solid fa-circle-plus text-3xl"></i>
                        </button>
                    </form>
                </div>

                <!-- Link -->
                <Link :href="route('movie.detail', movie.imdbID)">
                    <img
                        :src="movie.Poster"
                        @error="$event.target.src = '/imgs/default/default-post.jpg'"
                        :alt="movie.Title"
                        class="
                            w-full
                            h-64 sm:h-72 md:h-80
                            object-cover
                            transition-transform duration-300
                            group-hover:scale-105
                        "
                    >
                </Link>

            </div>

            <!-- Info -->
            <div class=" p-3 sm:p-4">
                <h2 class="text-sm sm:text-base font-semibold line-clamp-2">
                    {{ movie.Title }}
                </h2>


                <p class="text-xs sm:text-sm text-gray-500">
                    {{ movie.Year }}
                </p>
            </div>
        </article>
    </div>
</template>

<style scoped>
</style>
