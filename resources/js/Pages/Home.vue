<script setup>
import {useForm} from "@inertiajs/vue3";
const form = useForm({
    search: null
})

const submit = () =>{
    form.get(route('movie.search'))
}
</script>

<template>
    <form @submit.prevent="submit">
        <input type="search" placeholder="search" v-model="form.search">
        <button type="submit">Search</button>
    </form>

</template>

<style scoped>

</style>
