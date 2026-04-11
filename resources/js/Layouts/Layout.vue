<script setup >
import Logo from "../Components/Logo.vue";
import {switchTheme} from "../theme.js";
import {ref} from "vue";
import {Link} from "@inertiajs/vue3";

const show = ref(false)
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
                <div class="flex items-center gap-3 text-sm font-medium">

                    <Link
                        :href="route('home')"
                        class="
                                hover:text-orange-200
                                transition
                                cursor-pointer
                                font-bold
                            "

                        :class="($page.component == 'Home') ? `text-orange-400` : `text-gray-600 dark:text-gray-300`"
                    >
                        Home
                    </Link>


                    <!--Auth users-->
                    <div v-if="$page.props.auth.user" class="flex">
                        <Link
                            :href="route('watchlist')"
                            class="
                                hover:text-orange-200
                                font-bold
                                mr-10
                                cursor-pointer
                                transition
                            "

                            :class="($page.component == 'WatchList') ? `text-orange-400` : `text-gray-600 dark:text-gray-300`"
                        >
                            Watchlist
                        </Link>

                        <!--Dropdown-->
                        <div >
                            <button class="cursor-pointer" @click="show = !show">
                                Hello, <b class="text-orange-400">{{ $page.props.auth.user.name }}</b>
                                <i class="fa-solid fa-angle-down ml-1" :class="{ 'rotate-180' : show }"></i>
                            </button>

                            <!--dropdown menu-->
                            <div
                                v-show="show"
                                class="
                                absolute mt-8 w-52
                                rounded-xl border border-slate-200
                                bg-white shadow-lg
                                dark:border-slate-700 dark:bg-slate-900
                                overflow-hidden z-50
                            "
                            >
                                <Link
                                    :href="route('profile.edit')"
                                    class="
                                    block px-4 py-3 text-sm
                                    text-slate-700 dark:text-slate-200
                                    hover:bg-gray-300 dark:hover:bg-slate-800
                                    transition
                                "
                                    @click="show = !show"
                                >
                                    Profile
                                </Link>

                                <Link
                                    :href="route('logout')"
                                    method="post"
                                    class="
                                        w-full text-left px-4 py-3 text-sm
                                        text-red-500
                                        hover:bg-gray-300 dark:hover:bg-slate-800
                                        transition cursor-pointer
                                    "
                                    @click="show = !show"
                                >
                                    Logout
                                </Link>
                            </div>
                        </div>

                    </div>

                    <!--Guest users-->
                    <div v-else>
                        <Link
                            :href="route('login')"

                            class="
                                hover:text-orange-200
                                font-bold
                                cursor-pointer
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
                                cursor-pointer
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
