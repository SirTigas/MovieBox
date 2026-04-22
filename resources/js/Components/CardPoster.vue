<script setup>
defineProps({
    movies: Object,
});
</script>

<template>
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
            <Link :href="route('movie.detail', movie.imdbID)">

                <!-- Poster -->
                <div class="overflow-hidden">
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
                </div>

                <!-- Info -->
                <div class="p-3 sm:p-4">
                    <h2 class="text-sm sm:text-base font-semibold line-clamp-2">
                        {{ movie.Title }}
                    </h2>

                    <p class="text-xs sm:text-sm text-gray-500">
                        {{ movie.Year }}
                    </p>
                </div>

            </Link>
        </article>
    </div>
</template>

<style scoped>
</style>
