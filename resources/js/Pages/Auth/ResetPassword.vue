<script setup>
import Card from "../../Components/Card.vue";
import Logo from "../../Components/Logo.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import {useForm} from "@inertiajs/vue3";
import ErrorMessage from "../../Components/ErrorMessage.vue";

const props = defineProps({
    status: Object,
    email: String,
    token: String,

})

const form = useForm({
    email: props.email,
    token: props.token,
    password: null,
    password_confirmation: null,
});

const submit = () => {
    form.post(route('password.update'))
}
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
                    Reset your password.
                </p>
            </div>

            <div class="text-center mb-2">
                <ErrorMessage
                    :error="$page.props.errors.password"
                />
            </div>

            <form @submit.prevent="submit">
                <InputField
                    type="password"
                    placeholder="Enter your password"
                    size="py-3"
                    v-model="form.password"
                    class="mb-4"
                />

                <InputField
                    type="password"
                    placeholder="Confirm your password"
                    size="py-3"
                    v-model="form.password_confirmation"
                    class="mb-4"
                />

                <primary-btn size="py-3">Save</primary-btn>
            </form>
        </Card>
    </section>
</template>

<style scoped>

</style>
