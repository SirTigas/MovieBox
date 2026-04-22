<script setup>
import PrimaryBtn from "../Components/PrimaryBtn.vue";
import DangerBtn from "../Components/DangerBtn.vue";
import {Link, useForm} from "@inertiajs/vue3";
import InputField from "../Components/InputField.vue";
import AlertSuccess from "../Components/AlertSuccess.vue";
import Paginate from "../../../Paginate.vue";

defineProps({
    watchlist: Object,
    status: String
})

const form = useForm({
    imdb_id: null,
})

const submit = (id) => {
    form.imdb_id = id
    form.delete(route('watchlist.destroy'))
}
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

        <AlertSuccess
            v-if="form.recentlySuccessful"
            :status="status"
            class="mb-2"
        />

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

                    <!-- Poster -->
                <Link :href="route('movie.detail', movie.imdb_id)">
                    <div class="overflow-hidden">
                        <img
                            :src="movie.poster"
                            alt="Movie Poster"
                            @error="$event.target.src = '/imgs/default/default-post.jpg'"
                            class="
                                w-full h-full object-cover
                                transition-transform duration-300
                                group-hover:scale-110
                            "
                        >
                    </div>
                </Link>


                    <!-- Overlay (hover) -->
                    <div
                        class="
                            absolute inset-0
                            pointer-events-none
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
                        <form @submit.prevent="submit(movie.imdb_id)" class="pointer-events-auto">
                            <DangerBtn type="submit" :disabled="form.processing" size="py-2" class="mt-4 w-full">
                                <b>Remove</b>
                            </DangerBtn>
                        </form>
                    </div>
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
