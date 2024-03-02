<script>
export default {
    name: "RolesForm",
    props: {
        form: Object,
        required: true,
    },
};
</script>
<script setup>
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@//Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

defineProps({
    form: { Object, required: true },
    updating: {
        type: Boolean,
        required: false,
        default: false,
    },
});

defineEmits(["submit"]);
</script>
<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? "Update Role" : "Create New Role" }}
        </template>
        <template #description>
            {{ updating ? "Edit the role" : "Create a new role" }}
        </template>

        <template #form>
            <div class="col-span6 sm:col-span-6">
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    type="text"
                    class="w-full mt-1 block"
                    v-model="form.name"
                    :error="form.errors.name"
                    autocomplete="rol-name"
                />
                <InputError :message="$page.props.errors.name" class="mt-2" />
            </div>
        </template>
        <template #actions>
            <PrimaryButton type="submit" class="ml-4" v-if="!updating">
                Create
            </PrimaryButton>
            <PrimaryButton type="submit" class="ml-4" v-else>
                Update
            </PrimaryButton>
            <Link v-if="updating" href="/admin/roles" method="get">
                <PrimaryButton type="button" class="ml-4">
                    Cancel
                </PrimaryButton>
            </Link>
        </template>
    </FormSection>
</template>
