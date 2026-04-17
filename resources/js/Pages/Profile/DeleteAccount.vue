<script setup>

import {useForm} from "@inertiajs/vue3";
import ErrorMessage from "../../Components/ErrorMessage.vue";
import InputField from "../../Components/InputField.vue";
import DangerBtn from "../../Components/DangerBtn.vue";

const form = useForm({
    password: null
})

const submit = () => {
    form.post(route('profile.destroy'), {
        onError: () => form.reset('password')
    })
}
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

        <form @submit.prevent="submit" class="space-y-4">
            <InputField
                type="password"
                size="py-3"
                placeholder="Type your password to continue"
                required
                v-model="form.password"
            />

            <ErrorMessage
                :error="form.errors.password"
            />

            <DangerBtn type="submit" :disabled="form.processing">
                <b>Delete Account</b>
            </DangerBtn>
        </form>
    </div>
</template>

<style scoped>

</style>
