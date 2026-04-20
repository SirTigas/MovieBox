<script setup>
import Card from "../../Components/Card.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import Logo from "../../Components/Logo.vue";
import CheckBoxInput from "../../Components/CheckBoxInput.vue";
import { useForm } from "@inertiajs/vue3";
import ErrorMessage from "../../Components/ErrorMessage.vue";
import SuccessMessage from "../../Components/SuccessMessage.vue";

defineProps({
    status: Object,
});

const form = useForm({
    email: null,
    password: null,
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Login" />

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
                    Login your account to access complete MovieBox content.
                </p>

                <SuccessMessage :success="status" />
            </div>

            <!-- Form -->
            <form @submit.prevent="submit" class="space-y-5 sm:space-y-6">

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
                    <div class="mb-2 flex items-center justify-between">
                        <label
                            for="password"
                            class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                        >
                            Password
                        </label>

                        <Link
                            :href="route('password.request')"
                            class="text-sm font-medium text-orange-400 transition hover:text-orange-500"
                        >
                            Forgot password?
                        </Link>
                    </div>

                    <InputField
                        id="password"
                        placeholder="Enter your password"
                        type="password"
                        v-model="form.password"
                    />

                    <ErrorMessage :error="$page.props.errors.password" />
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between">
                    <CheckBoxInput
                        span="Remember me"
                        v-model="form.remember"
                    />
                </div>

                <!-- Submit -->
                <div class="mt-6 sm:mt-8">
                    <PrimaryBtn
                        type="submit"
                        class="w-full px-4 py-3"
                        :disabled="form.processing"
                    >
                        <span v-if="form.processing">Logging in...</span>
                        <span v-else>Login</span>
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

            <!-- Register Link -->
            <p class="text-center text-sm text-slate-600 dark:text-slate-400">
                Need an account?
                <Link
                    :href="route('register')"
                    class="font-semibold text-orange-400 transition hover:text-orange-500"
                >
                    Register
                </Link>
            </p>

        </Card>
    </section>
</template>

<style scoped>
</style>
