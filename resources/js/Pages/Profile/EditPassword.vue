<script setup>
import InputField from "../../Components/InputField.vue";
import Card from "../../Components/Card.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import {useForm} from "@inertiajs/vue3";
import SuccessMessage from "../../Components/SuccessMessage.vue";
import ErrorMessage from "../../Components/ErrorMessage.vue";

defineProps({
    status: Object
})

const form = useForm({
    current_password: null,
    password: null,
    password_confirmation: null,
})

const submit = ()=>{
    form.post(route('profile.update.password'), {
        onSuccess: ()=> form.reset('current_password', 'password', 'password_confirmation')
    })
}
</script>

<template>
    <!-- Change Password -->
    <Card
        class="mb-8"
    >
        <h2 class="text-xl font-semibold mb-4">
            Change Password
        </h2>

        <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">
            Use a strong password to keep your account secure.
        </p>

        <form @submit.prevent="submit" class="space-y-4">
            <InputField
                placeholder="Current Password"
                type="password"
                size="py-3"
                v-model="form.current_password"
            />
            <ErrorMessage
                :error="form.errors.current_password"
            />

            <InputField
                placeholder="New Password"
                type="password"
                size="py-3"
                v-model="form.password"
            />

            <InputField
                placeholder="Confirm new password"
                type="password"
                size="py-3"
                v-model="form.password_confirmation"
            />

            <ErrorMessage
                :error="form.errors.password"
            />

            <p v-if="form.recentlySuccessful" class="text-sm text-green-500">Saved!</p>

            <PrimaryBtn size="py-3">
                Update Password
            </PrimaryBtn>
        </form>
    </Card>
</template>

<style scoped>

</style>
