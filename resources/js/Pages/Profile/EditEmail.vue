<script setup>
import InputField from "../../Components/InputField.vue";
import Card from "../../Components/Card.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import {useForm} from "@inertiajs/vue3";

const form = useForm({
    email: null
})
const submit = ()=>{
    form.post(route('profile.update.email'))
}
</script>

<template>
    <!-- Change Email -->
    <Card
        class="mb-8"
    >
        <h2 class="text-xl font-semibold mb-4">
            Change Email
        </h2>

        <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">
            Update your email address. Make sure it is valid and accessible.
        </p>

        <form class="space-y-4" @submit.prevent="submit">
            <InputField
                placeholder="New Email"
                size="py-3"
            />

            <PrimaryBtn size="py-3">
                Save Email
            </PrimaryBtn>
        </form>
    </Card>
</template>

<style scoped>

</style>
