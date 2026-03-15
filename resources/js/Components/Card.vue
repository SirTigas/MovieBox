<script setup>

defineProps({
    movies: Object,
})
</script>

<template>
    <!--Card component that show info about movie-->

    <div
        v-if="movies.length"
        class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 cursor-pointer"
    >
        <article
            v-for="movie in movies"
            :key="movie.imdbID"
            class="
                    rounded-2xl
                    overflow-hidden
                    bg-white dark:bg-slate-800
                    shadow-md
                    transition-all duration-300
                    hover:scale-105 hover:shadow-xl
            "
        >
            <Link :href="route('movie.detail', movie.imdbID)">
                <!--Poster-->
                <div class="overflow-hidden">

                        <img
                            :src="movie.Poster !== 'N/A' ? movie.Poster : '../../../public/imgs/default/defaul-post.jpg'"
                            :alt="movie.Title"
                            class="w-full h-[28rem] object-cover"
                        >
                </div>

                <!--About Movie-->
                <div class="p-4">
                    <h2 class="text-lg font-semibold">
                        {{ movie.Title }}
                    </h2>

                    <p class="text-sm text-gray-500">
                        {{ movie.Year }}
                    </p>
                </div>
            </Link>
        </article>
    </div>

    <!--If result is 0-->
    <div
        v-else
        class="text-center py-16"
    >
        No movies found.
    </div>
</template>

<style scoped>

</style>
