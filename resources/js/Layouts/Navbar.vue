<<script setup>
import { ref } from "vue"
import Logo from "../Components/Logo.vue"
import { switchTheme } from "../theme.js"

const show = ref(false) // user dropdown
const showMenu = ref(false) // mobile menu
</script>

<template>
    <nav
        class="
            bg-gray-300 border-b border-gray-200
            dark:bg-slate-950 dark:border-b-blue-950
        "
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 flex items-center justify-between">

            <!-- Logo -->
            <Logo />

            <!-- Mobile Menu Button -->
            <button
                class="md:hidden text-gray-700 dark:text-gray-300"
                @click="showMenu = !showMenu"
            >
                <i class="fa-solid fa-bars text-xl"></i>
            </button>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center gap-3 text-sm font-medium">

                <Link
                    :href="route('home')"
                    class="hover:text-orange-200 transition cursor-pointer font-bold"
                    :class="($page.component == 'Home') ? `text-orange-400` : `text-gray-600 dark:text-gray-300`"
                >
                    Home
                </Link>

                <!-- Authenticated User -->
                <div v-if="$page.props.auth.user" class="flex items-center">

                    <Link
                        :href="route('watchlist')"
                        class="hover:text-orange-200 font-bold mr-6 cursor-pointer transition"
                        :class="($page.component == 'WatchList') ? `text-orange-400` : `text-gray-600 dark:text-gray-300`"
                    >
                        Watchlist
                    </Link>

                    <!-- User Dropdown -->
                    <div class="relative">
                        <button class="cursor-pointer" @click="show = !show">
                            Hello, <b class="text-orange-400">{{ $page.props.auth.user.name }}</b>
                            <i class="fa-solid fa-angle-down ml-1 transition-transform" :class="{ 'rotate-180': show }"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div
                            v-show="show"
                            class="
                                absolute right-0 mt-4 w-52
                                rounded-xl border border-slate-200
                                bg-white shadow-lg
                                dark:border-slate-700 dark:bg-slate-900
                                overflow-hidden z-50
                            "
                        >
                            <Link
                                :href="route('profile.edit')"
                                class="block px-4 py-3 text-sm text-slate-700 dark:text-slate-200 hover:bg-gray-300 dark:hover:bg-slate-800 transition"
                                @click="show = false"
                            >
                                Profile
                            </Link>

                            <Link
                                :href="route('logout')"
                                method="post"
                                class="w-full text-left px-4 py-3 text-sm text-red-500 hover:bg-gray-300 dark:hover:bg-slate-800 transition cursor-pointer"
                                @click="show = false"
                            >
                                Logout
                            </Link>
                        </div>
                    </div>

                </div>

                <!-- Guest User -->
                <div v-else class="flex items-center gap-2">
                    <Link
                        :href="route('login')"
                        class="hover:text-orange-200 font-bold transition"
                        :class="($page.component == 'Auth/Login') ? `text-orange-400` : `text-gray-600 dark:text-gray-300`"
                    >
                        Login
                    </Link>

                    <span class="text-gray-400">|</span>

                    <Link
                        :href="route('register')"
                        class="hover:text-orange-200 font-bold transition"
                        :class="($page.component == 'Auth/Register') ? `text-orange-400` : `text-gray-600 dark:text-gray-300`"
                    >
                        Register
                    </Link>
                </div>

                <!-- Theme Toggle -->
                <button
                    class="
                        p-2 rounded-lg
                        text-gray-600 hover:bg-slate-200
                        dark:text-gray-300 dark:hover:bg-slate-600
                        transition-colors
                    "
                    @click="switchTheme"
                >
                    <i class="fa-solid fa-circle-half-stroke"></i>
                </button>

            </div>
        </div>

        <!-- Mobile Menu -->
        <div
            v-show="showMenu"
            class="md:hidden px-4 pb-4 space-y-4 bg-gray-300 dark:bg-slate-950"
        >

            <Link
                :href="route('home')"
                class="block font-bold text-gray-700 dark:text-gray-300"
                @click="showMenu = false"
            >
                Home
            </Link>

            <!-- Authenticated User -->
            <div v-if="$page.props.auth.user" class="space-y-3">

                <Link
                    :href="route('watchlist')"
                    class="block font-bold text-gray-700 dark:text-gray-300"
                    @click="showMenu = false"
                >
                    Watchlist
                </Link>

                <Link
                    :href="route('profile.edit')"
                    class="block text-gray-700 dark:text-gray-300"
                    @click="showMenu = false"
                >
                    Profile
                </Link>

                <Link
                    :href="route('logout')"
                    method="post"
                    class="block text-red-500"
                    @click="showMenu = false"
                >
                    Logout
                </Link>
            </div>

            <!-- Guest User -->
            <div v-else class="space-y-3">

                <Link
                    :href="route('login')"
                    class="block font-bold text-gray-700 dark:text-gray-300"
                    @click="showMenu = false"
                >
                    Login
                </Link>

                <Link
                    :href="route('register')"
                    class="block font-bold text-gray-700 dark:text-gray-300"
                    @click="showMenu = false"
                >
                    Register
                </Link>
            </div>

        </div>
    </nav>
</template>

<style scoped>

</style>
