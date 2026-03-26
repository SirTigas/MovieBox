<script setup xmlns="http://www.w3.org/1999/html">
import Logo from "../Components/Logo.vue";
import {switchTheme} from "../theme.js";
import {Link} from "@inertiajs/vue3";
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
                        :href="route('home')"
                        class="
                                hover:text-orange-200
                                transition
                                font-bold
                            "

                        :class="($page.component == 'Home') ? `text-orange-400` : `text-gray-600 dark:text-gray-300`"
                    >
                        Home
                    </Link>


                    <!--Auth users-->
                    <div v-if="$page.props.auth.user">
                        <Link
                            :href="route('watchlist')"
                            class="
                                hover:text-orange-200
                                font-bold
                                mr-10
                                transition
                            "

                            :class="($page.component == 'WatchList') ? `text-orange-400` : `text-gray-600 dark:text-gray-300`"
                        >
                            Watchlist
                        </Link>

                        <Link>
                            Hello, <b class="text-orange-400">{{ $page.props.auth.user.name }}</b>
                        </Link>

                        <span class="text-shadow-slate-950 dark:text-gray-500">
                        |
                        </span>

                        <Link
                            :href="route('logout')"

                            method="post"

                            class="
                                hover:text-orange-200
                                font-bold
                                transition
                            "
                        >
                            Logout
                        </Link>
                    </div>

                    <!--Guest users-->
                    <div v-else>
                        <Link
                            :href="route('login')"

                            class="
                                hover:text-orange-200
                                font-bold
                                transition
                            "

                            :class="($page.component == 'Auth/Login') ? `text-orange-400` : `text-gray-600 dark:text-gray-300`"

                        >
                            Login
                        </Link>

                        <span class="text-shadow-slate-950 dark:text-gray-500">
                        |
                        </span>

                        <Link
                            :href="route('register')"

                            class="
                                hover:text-orange-200
                                font-bold
                                transition
                            "

                            :class="($page.component == 'Auth/Register') ? `text-orange-400` : `text-gray-600 dark:text-gray-300`"
                        >
                            Register
                        </Link>
                    </div>

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
