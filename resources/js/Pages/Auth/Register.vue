<script setup>
import Card from "../../Components/Card.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import Logo from "../../Components/Logo.vue";
import { useForm } from "@inertiajs/vue3";
import ErrorMessage from "../../Components/ErrorMessage.vue";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register" />

    <!-- Page Container -->
    <section class="flex items-center justify-center px-4 sm:px-6 py-8">

        <!-- Card -->
        <Card
            class="
                w-full
                max-w-md
                p-6 sm:p-8
                shadow-xl
            "
        >

            <!-- Header -->
            <div class="mb-6 sm:mb-8 text-center">
                <Logo />

                <p class="mt-3 sm:mt-4 text-sm text-slate-600 dark:text-slate-400">
                    Create your account and start building your watchlist.
                </p>
            </div>

            <!-- Form -->
            <form @submit.prevent="submit" class="space-y-5 sm:space-y-6">

                <!-- Name -->
                <div>
                    <label
                        for="name"
                        class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300"
                    >
                        Name
                    </label>

                    <InputField
                        id="name"
                        placeholder="Enter your name"
                        type="text"
                        v-model="form.name"
                    />

                    <ErrorMessage :error="$page.props.errors.name" />
                </div>

                <!-- Email -->
                <div>
                    <label
                        for="email"
                        class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300"
                    >
                        Email
                    </label>

                    <InputField
                        id="email"
                        placeholder="Enter your email"
                        type="email"
                        v-model="form.email"
                    />

                    <ErrorMessage :error="$page.props.errors.email" />
                </div>

                <!-- Password -->
                <div>
                    <label
                        for="password"
                        class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300"
                    >
                        Password
                    </label>

                    <InputField
                        id="password"
                        placeholder="Enter your password"
                        type="password"
                        v-model="form.password"
                    />

                    <ErrorMessage :error="$page.props.errors.password" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label
                        for="confirm_password"
                        class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300"
                    >
                        Confirm Password
                    </label>

                    <InputField
                        id="confirm_password"
                        placeholder="Confirm your password"
                        type="password"
                        v-model="form.password_confirmation"
                    />
                </div>

                <!-- Submit -->
                <div class="mt-6 sm:mt-8">
                    <PrimaryBtn
                        type="submit"
                        class="w-full px-4 py-3"
                        :disabled="form.processing"
                    >
                        <span v-if="form.processing">Creating account...</span>
                        <span v-else>Register</span>
                    </PrimaryBtn>
                </div>

            </form>

            <!-- Divider -->
            <div class="my-6 flex items-center gap-4">
                <div class="h-px flex-1 bg-slate-200 dark:bg-slate-700"></div>
                <span class="text-xs uppercase tracking-wider text-slate-400">
                    or
                </span>
                <div class="h-px flex-1 bg-slate-200 dark:bg-slate-700"></div>
            </div>

            <!-- Login Link -->
            <p class="text-center text-sm text-slate-600 dark:text-slate-400">
                Already have an account?
                <Link
                    :href="route('login')"
                    class="font-semibold text-orange-400 transition hover:text-orange-500"
                >
                    Login
                </Link>
            </p>
        </Card>
    </section>
</template>

<style scoped>
</style>
