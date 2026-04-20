<script setup >
import Navbar from "./Navbar.vue";
import Footer from "./Footer.vue";
</script>

<template>

    <div class="min-h-screen flex flex-col">
        <!--Navbar-->
        <Navbar/>

        <!-- Page Content -->
        <main class="max-w-7xl mx-auto px-6 py-12 flex-1">
            <slot />
        </main>

        <!--Footer-->
        <Footer/>
    </div>
</template>

<style scoped>

</style>
