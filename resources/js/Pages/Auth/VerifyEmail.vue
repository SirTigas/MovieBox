<script setup>

import Card from "../../Components/Card.vue";
import Logo from "../../Components/Logo.vue";
import {Head, Link} from "@inertiajs/vue3";
</script>

<template>
    <Head title="Email verify"/>
    <section class="mx-auto flex max-w-7xl items-center justify-center px-6 py-12">
        <Card class="
                w-full
                max-w-md
                p-8
                shadow-xl
            "
        >
            <!--Header-->
            <div class="mb-8 text-center">
                <Logo/>

                <p class="mt-2">
                    Thank you for registering with MovieBox, we'll send you a link to verify your email.
                </p>
            </div>

            <div class="text-center">
                <p class="mt-4 text-sm text-slate-600 dark:text-slate-400">If you not haven't received it, click in the link to resend it.</p>

                <Link :href="route('verification.send')" class="text-orange-400 underline">Resend link</Link>
            </div>
        </Card>
    </section>
</template>

<style scoped>

</style>
