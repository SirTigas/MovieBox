<script setup>
import Card from "../../Components/Card.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import SecondaryBtn from "../../Components/SecondaryBtn.vue";
import BackgroundCard from "../../Components/BackgroundCard.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryTag from "../../Components/PrimaryTag.vue";
import SecondaryTag from "../../Components/SecondaryTag.vue";
import {useForm} from "@inertiajs/vue3";

defineProps({
    movieDetails: Object
})

const form = useForm({
    search: null
})

const submit = () => {
    form.get(route('movie.search'))
}
</script>

<template>
    <Head title="Movie Detail" />
    <pre>
    {{ movieDetails }}
    </pre>
    <BackgroundCard>
        <div class="max-w-7xl mx-auto px-6 py-10">
            <!--Search field-->
            <form @submit.prevent="submit" class="mb-8 flex items-center justify-center gap-3 max-w-2xl mx-auto">
                <InputField
                    type="search"
                    placeholder="Search another movies..."
                    v-model="form.search"
                />

                <PrimaryBtn type="submit">
                    Search
                </PrimaryBtn>
            </form>

            <div
                class="
                overflow-hidden rounded-3xl
                border border-slate-200
                bg-slate-100
                dark:border-slate-800
                dark:bg-slate-900
                "
            >
                <!--Background Poster-->
                <div
                    class="
                        relative
                        min-h-10
                        w-full
                        overflow-hidden
                    "
                >
                    <img
                        :src="movieDetails.Poster"
                        alt="Movie Backdrop"
                        class="h-full w-full object-cover max-h-150 contrast-50"
                    >

                    <!--Background shadow-->
                    <div
                        class="
                        absolute inset-0
                        bg-linear-to-t from-white via-white/70 to-transparent
                        dark:from-[#0B1120] dark:via-[#0B1120]/75 dark:to-transparent
                        "
                    ></div>
                </div>

                <div class="relative px-6 pb-8 md:px-10 md:pb-10">
                    <div
                        class="
                        -mt-24
                        grid grid-cols-1 gap-8
                        lg:grid-cols-[280px_1fr]
                        lg:items-start
                        "
                    >
                        <!--Poster-->
                        <div
                            class="
                            overflow-hidden rounded-3xl
                            border border-slate-200
                            bg-white
                            shadow-xl
                            dark:border-slate-700
                            dark:bg-slate-800
                            "
                        >
                            <img
                                :src="movieDetails.Poster"
                                alt="Movie Poster"
                                class="h-full w-full object-cover"
                            >
                        </div>


                        <div class="pt-2 lg:pt-20">
                            <!--Tags-->
                            <div class="mb-4 flex flex-wrap items-center gap-3">
                                <PrimaryTag>
                                    {{ movieDetails.Type }}
                                </PrimaryTag>

                                <SecondaryTag>
                                    {{ movieDetails.Year }}
                                </SecondaryTag>

                                <SecondaryTag>
                                    {{ movieDetails.Runtime }}
                                </SecondaryTag>
                            </div>

                            <!--Title-->
                            <h1 class="mb-3 text-4xl font-bold tracking-tight md:text-5xl">
                                {{ movieDetails.Title }}
                            </h1>

                            <!--Genre-->
                            <p class="mb-6 text-lg text-slate-600 dark:text-slate-300">
                                {{ movieDetails.Genre }}
                            </p>

                            <!--Plot-->
                            <p class="max-w-4xl text-base leading-8 text-slate-700 dark:text-slate-300 md:text-lg">
                                {{ movieDetails.Plot }}
                            </p>

                            <!--Actions-->
                            <div class="mt-8 flex flex-wrap gap-4">
                                <PrimaryBtn>
                                    Add to Watchlist
                                </PrimaryBtn>

                                <SecondaryBtn>
                                    Watch Trailer
                                </SecondaryBtn>
                            </div>
                        </div>
                    </div>

                    <!--Cards with more info about the movie-->
                    <div class="mt-12 grid grid-cols-1 gap-6 xl:grid-cols-3">

                        <!--Ratings-->
                        <Card>
                            <h2 class="mb-5 text-xl font-semibold">
                                Ratings
                            </h2>

                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-slate-600 dark:text-slate-300">IMDb</span>
                                    <span class="font-semibold">{{ movieDetails.imdbRating }}</span>
                                </div>

                                <div class="flex items-center justify-between">
                                    <span class="text-slate-600 dark:text-slate-300">Metascore</span>
                                    <span class="font-semibold">{{ movieDetails.Metascore }}</span>
                                </div>

                                <div class="flex items-center justify-between">
                                    <span class="text-slate-600 dark:text-slate-300">Votes</span>
                                    <span class="font-semibold">{{ movieDetails.imdbVotes }}</span>
                                </div>
                            </div>
                        </Card>

                        <!--Movie Info-->
                        <Card>
                            <h2 class="mb-5 text-xl font-semibold">
                                Movie Info
                            </h2>

                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm text-slate-500 dark:text-slate-400">Director</p>
                                    <p class="mt-1 font-medium">{{ movieDetails.Director }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-slate-500 dark:text-slate-400">Writer</p>
                                    <p class="mt-1 font-medium">{{ movieDetails.Writer }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-slate-500 dark:text-slate-400">Language</p>
                                    <p class="mt-1 font-medium">{{ movieDetails.Language }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-slate-500 dark:text-slate-400">Country</p>
                                    <p class="mt-1 font-medium">{{ movieDetails.Country }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-slate-500 dark:text-slate-400">Released</p>
                                    <p class="mt-1 font-medium">{{ movieDetails.Released }}</p>
                                </div>
                            </div>
                        </Card>

                        <!--Cast-->
                        <Card>
                            <h2 class="mb-5 text-xl font-semibold">
                                Cast
                            </h2>

                            <div class="space-y-4">
                                <p class="font-medium">{{ movieDetails.Actors }}</p>
                            </div>
                        </Card>
                    </div>

                </div>
            </div>
        </div>
    </BackgroundCard>
</template>

<style scoped>

</style>
