<script setup>

</script>

<template>
    <!-- Delete Account -->
    <div
        class="
        rounded-2xl border border-red-300
        bg-red-50 p-6
        dark:border-red-800 dark:bg-red-950/30
        "
    >
        <h2 class="text-xl font-semibold text-red-600 mb-4">
            Delete Account
        </h2>

        <p class="text-sm text-red-500 mb-6">
            This action is irreversible. All your data will be permanently deleted.
        </p>

        <form class="space-y-4">
            <input
                type="password"
                placeholder="Enter your password to confirm"
                class="
                w-full rounded-xl border border-red-300
                px-4 py-3
                bg-white text-slate-900
                focus:border-red-500 focus:ring-2 focus:ring-red-500/30
                outline-none transition
                dark:border-red-700 dark:bg-slate-800 dark:text-white
                "
            >

            <button
                class="
                rounded-xl bg-red-500
                px-5 py-2.5 text-white font-semibold
                hover:bg-red-600 transition
                "
            >
                Delete Account
            </button>
        </form>
    </div>
</template>

<style scoped>

</style>
