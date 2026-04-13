<script setup>
import InputField from "../../Components/InputField.vue";
import Card from "../../Components/Card.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import {Link, useForm} from "@inertiajs/vue3";
import SuccessMessage from "../../Components/SuccessMessage.vue";
import ErrorMessage from "../../Components/ErrorMessage.vue";

const props = defineProps({
    userInfo: Object,
    status: Object
})

const form = useForm({
    email: props.userInfo.email,
    name: props.userInfo.name
})
const submit = ()=>{
    form.patch(route('profile.update.info'))
}
</script>

<template>
    <!-- Change Info -->
    <Card
        class="mb-8"
    >
        <h2 class="text-xl font-semibold mb-4">
            Change Info
        </h2>

        <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">
            Update your info. Make sure it is valid and accessible.
        </p>

        <form class="space-y-4" @submit.prevent="submit">
            <InputField
                placeholder="New Name"
                size="py-3"
                type="text"
                v-model="form.name"
            />

            <ErrorMessage
                :error="form.errors.name"
            />

            <InputField
                placeholder="New Email"
                size="py-3"
                type="email"
                v-model="form.email"
            />

            <ErrorMessage
                :error="form.errors.email"
            />

            <SuccessMessage
                :success="props.status"
                class="mb-2"
            />

            <div v-if="!$page.props.auth.user.email_verified_at" class="mb-2">
                <p>
                    Your email is unverified!
                    <Link class="text-green-600 underline cursor-pointer" :href="route('verification.send')" method="post">Verify Email</Link>
                </p>
            </div>

            <PrimaryBtn :disabled="form.processing" size="py-3">
                Save
            </PrimaryBtn>
        </form>
    </Card>
</template>

<style scoped>

</style>
