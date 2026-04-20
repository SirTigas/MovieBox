<script setup>

import {Link} from "@inertiajs/vue3";
import Logo from "../Components/Logo.vue";
</script>

<template>
    <footer
        class="
            bg-gray-300 border-t border-gray-200
            dark:bg-slate-950 dark:border-t-blue-950
        "
    >
        <div class="max-w-7xl mx-auto px-6 py-10">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Logo & description -->
                <div>
                    <Logo/>

                    <p class="mt-3 text-sm text-slate-600 dark:text-slate-400">
                        Discover movies, build your watchlist, and keep track of what you love.
                    </p>
                </div>

                <!-- Nav -->
                <div v-if="$page.props.auth.user">
                    <h3 class="text-sm font-semibold text-slate-800 dark:text-white mb-3">
                        Navigation
                    </h3>

                    <ul class="space-y-2 text-sm">
                        <li>
                            <Link :href="route('home')" class="text-slate-600 dark:text-slate-400 hover:text-orange-400 transition">
                                Home
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('watchlist')" class="text-slate-600 dark:text-slate-400 hover:text-orange-400 transition">
                                Watchlist
                            </Link>
                        </li>
                    </ul>
                </div>

                <!-- Social -->
                <div>
                    <h3 class="text-sm font-semibold text-slate-800 dark:text-white mb-3">
                        Connect
                    </h3>

                    <div class="flex items-center gap-4 text-lg">

                        <a href="https://github.com/SirTigas" target="_blank" class="text-slate-600 dark:text-slate-400 hover:text-orange-400 transition">
                            <i class="fa-brands fa-github"></i>
                        </a>

                        <a href="https://www.linkedin.com/in/tiago-rodrigues-cardoso/" target="_blank" class="text-slate-600 dark:text-slate-400 hover:text-orange-400 transition">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>

                    </div>
                </div>

            </div>

            <!-- credits -->
            <div class="mt-10 border-t border-gray-200 dark:border-slate-800 pt-6 text-center text-sm text-slate-500 dark:text-slate-400">
                © 2026 MovieBox. All rights reserved.
            </div>

        </div>
    </footer>
</template>

<style scoped>

</style>
