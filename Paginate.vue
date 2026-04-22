<script setup>
import {router} from "@inertiajs/vue3";
import {ref} from "vue";

const props = defineProps({
    movies: Object,
    currentPage: Number
});

const page = ref(props.currentPage || 1); // set the current page

const maxPage = Number.isInteger(props.movies.totalResults / 10) ? (props.movies.totalResults / 10) : Math.floor(props.movies.totalResults / 10) + 1; // Calculates the maximum number of pages

const changePage = (direction, search) => {
    if (direction === 'next') page.value++;
    if (direction === 'prev') page.value--;
    router.get(route('movie.search'), {
        search: search,
        page: page.value
    }, {
        preserveScroll: true,
        preserveState: true,
        replace: true
    })
}
</script>

<template>
    <div class="flex justify-between">
        <button
            @click="changePage('prev', $page.props.search)"
            v-if="page > 1"
            class="
                hidden sm:flex
                items-center justify-center
                absolute left-2 sm:left-4
                top-1/2 -translate-y-1/2
                z-10
                w-10 h-10 sm:w-12 sm:h-12
                rounded-full
                bg-orange-400
                backdrop-blur
                shadow-lg
                hover:scale-110
                transition
                cursor-pointer
                ml-60
            "
        >
            <i class="fa-solid fa-arrow-left"></i>
        </button>

        <main>
            <slot/>
        </main>

        <!-- Right Button -->
        <button
            @click="changePage('next', $page.props.search)"
            v-if="!(page === maxPage)"
            class="
                hidden sm:flex
                items-center justify-center
                absolute right-2 sm:right-4
                top-1/2 -translate-y-1/2
                z-10
                w-10 h-10 sm:w-12 sm:h-12
                rounded-full
                bg-orange-400
                backdrop-blur
                shadow-lg
                hover:scale-110
                transition
                cursor-pointer
                mr-60
            "
        >
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>
</template>

<style scoped>

</style>
