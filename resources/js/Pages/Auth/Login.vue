<script setup>
import Card from "../../Components/Card.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import Logo from "../../Components/Logo.vue";
import CheckBoxInput from "../../Components/CheckBoxInput.vue";
import {useForm} from "@inertiajs/vue3";

const form = useForm({
    email: null,
    password: null,
    remember: false,
})

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset("password")
    })
}
</script>

<template>
    <!--Register Component-->

    <Head title="Register" />
    <section class="mx-auto flex max-w-7xl items-center justify-center px-6 py-12">
        <Card
            class="
                w-full
                max-w-md
                p-8
                shadow-xl
            "
        >
            <!--Header-->
            <div class="mb-8 text-center">
                <Logo/>

                <p class="mt-4 text-sm text-slate-600 dark:text-slate-400">
                    Login your account to access complete MovieBox content.
                </p>
            </div>

            <!--Form-->
            <form @submit.prevent="submit" class="space-y-6">

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
                </div>

                <div>
                    <div class="mb-2 flex items-center justify-between">
                        <label
                            for="password"
                            class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                        >
                            Password
                        </label>

                        <a
                            href="#"
                            class="text-sm font-medium text-orange-400 transition hover:text-orange-500"
                        >
                            Forgot password?
                        </a>

                    </div>

                    <InputField
                        id="password"
                        placeholder="Enter your password"
                        type="password"
                        v-model="form.password"
                    />
                </div>

                <div class="flex items-center justify-between">
                    <CheckBoxInput
                        span="Remember me"
                        v-model="form.remember"
                    />
                </div>

                <div class="mt-8">
                    <PrimaryBtn
                        type="submit"
                        class="w-full px-4 py-3"
                        :disabled="form.processing"
                    >
                        Login
                    </PrimaryBtn>
                </div>
            </form>

            <!--Login Link-->
            <div>
                <div class="my-6 flex items-center gap-4">
                    <div class="h-px flex-1 bg-slate-200 dark:bg-slate-700"></div>
                    <span class="text-xs uppercase tracking-wider text-slate-400">
                        or
                    </span>
                    <div class="h-px flex-1 bg-slate-200 dark:bg-slate-700"></div>
                </div>

                <p class="mt-8 text-center text-sm text-slate-600 dark:text-slate-400">
                    Need an account?
                    <Link
                        :href="route('register')"
                        class="font-semibold text-orange-400 transition hover:text-orange-500"
                    >
                        Register
                    </Link>
                </p>
            </div>

        </Card>
    </section>
</template>

<style scoped>

</style>
