<script setup>
import InputField from "../../Components/InputField.vue";
import Card from "../../Components/Card.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
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

        <form class="space-y-4">
            <InputField
                placeholder="Current Password"
                size="py-3"
            />

            <InputField
                placeholder="New Password"
                size="py-3"
            />

            <InputField
                placeholder="Confirm new password"
                size="py-3"
            />

            <PrimaryBtn size="py-3">
                Update Password
            </PrimaryBtn>
        </form>
    </Card>
</template>

<style scoped>

</style>
