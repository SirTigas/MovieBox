<script setup>
import Card from "../../Components/Card.vue";
import Logo from "../../Components/Logo.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import {useForm} from "@inertiajs/vue3";
import ErrorMessage from "../../Components/ErrorMessage.vue";
import SuccessMessage from "../../Components/SuccessMessage.vue";

defineProps({
    status: Object,
})

const form = useForm({
    email: null,
});

const submit = () => {
    form.post(route('password.email'))
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
            <div class="mb-5 text-center">
                <Logo/>

                <p class="mt-2">
                    Do you forgot your password? No problem! Just let we know your email address and we'll send you a link to reset your password.
                </p>
            </div>

            <div class="text-center mb-3">
                <ErrorMessage
                    :error="$page.props.errors.email"
                />

                <SuccessMessage
                    :success="status"
                />
            </div>

            <form @submit.prevent="submit" class="flex items-center gap-2">
                <InputField
                    type="email"
                    placeholder="Enter your email address"
                    size="py-3"
                    v-model="form.email"
                />

                <primary-btn size="py-3">Send</primary-btn>
            </form>
        </Card>
    </section>
</template>

<style scoped>

</style>
