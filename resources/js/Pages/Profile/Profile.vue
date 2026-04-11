<script setup>
import EditEmail from "./EditEmail.vue";
import EditPassword from "./EditPassword.vue";
import DeleteAccount from "./DeleteAccount.vue";
</script>

<template>
    <Head title="Profile Edit" />

    <section class="max-w-4xl mx-auto px-6 py-12">

        <h1 class="text-3xl font-bold mb-10 text-slate-950 dark:text-white">
            Profile Settings
        </h1>

        <EditEmail :userInfo="$page.props.auth.user" :success="$page.props.status"/>

        <EditPassword/>

        <DeleteAccount/>
    </section>
</template>

<style scoped>

</style>
