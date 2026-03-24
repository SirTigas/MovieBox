<script setup>
import Logo from "../Components/Logo.vue";
import {switchTheme} from "../theme.js";
</script>

<template>

    <div class="min-h-screen">
        <!-- Navbar -->
        <nav
            class="
                bg-gray-300 border-b border-gray-200
                dark:bg-slate-950 dark:border-b-blue-950
            "
        >
            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

                <!-- Logo -->
                <Logo/>

                <!-- Navigation -->
                <div class="flex items-center gap-6 text-sm font-medium">

                    <Link
                        href="/watchlist"
                        class="
                            text-gray-600 hover:text-gray-900
                            dark:text-gray-300 dark:hover:text-white
                            transition
                        "
                    >
                        Watchlist
                    </Link>

                    <!--Switch theme-->
                    <button
                        class="
                            p-2
                            rounded-lg
                            text-gray-600
                            hover:bg-slate-200
                            dark:text-gray-300
                            dark:hover:bg-slate-600
                            transition-colors
                            cursor-pointer
                        "

                        @click="switchTheme"
                    >
                        <i class="fa-solid fa-circle-half-stroke"></i>
                    </button>

                    <div v-if="$page.props.auth.user">
                        <Link
                            href="/login"
                            class="
                            text-gray-600 hover:text-gray-900
                            dark:text-gray-300 dark:hover:text-white
                            transition
                        "
                        >
                            Profile
                        </Link>
                    </div>

                    <div v-else>
                        <Link
                            href="/login"
                            class="
                            text-gray-600 hover:text-gray-900
                            dark:text-gray-300 dark:hover:text-white
                            transition
                        "
                        >
                            Login
                        </Link>

                        <span class="text-gray-300 dark:text-gray-500">
                        |
                        </span>

                        <Link
                            :href="route('register')"
                            class="
                            text-gray-600 hover:text-gray-900
                            dark:text-gray-300 dark:hover:text-white
                            transition
                        "
                        >
                            Register
                        </Link>
                    </div>

                </div>

            </div>
        </nav>

        <!-- Page Content -->
        <main class="max-w-7xl mx-auto px-6 py-12">
            <slot />
        </main>

    </div>

</template>

<style scoped>

</style>
