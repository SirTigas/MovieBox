<script setup>
import Card from "../../Components/Card.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import Logo from "../../Components/Logo.vue";
import {useForm} from "@inertiajs/vue3";
import ErrorMessage from "../../Components/ErrorMessage.vue";

const form = useForm({
    password: null,
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset()
    })
};
</script>

<template>
    <!--Register Component-->

    <Head title="Login" />
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
                    You need confirm your password to continue
                </p>
            </div>

            <!--Form-->
            <form @submit.prevent="submit" class="space-y-6">

                <div>
                    <InputField
                        id="password"
                        placeholder="Enter your password"
                        type="password"
                        v-model="form.password"
                    />

                    <ErrorMessage
                        :error="$page.props.errors.password"
                    />
                </div>

                <div class="mt-8">
                    <PrimaryBtn
                        type="submit"
                        class="w-full px-4 py-3"
                        :disabled="form.processing"
                    >
                        Confirm
                    </PrimaryBtn>
                </div>
            </form>
        </Card>
    </section>
</template>

<style scoped>

</style>
