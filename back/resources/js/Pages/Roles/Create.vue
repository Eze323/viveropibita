<script>
export default {
    name: "RolesCreate",
};
</script>
<script setup>
import { useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import RolesForm from "@/Components/Roles/Form.vue";

const form = useForm({
    name: "",
    
});
</script>
<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Roles
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div
                        class="bg-wite overflow-hidden shadow-xl sm:rounded-lg"
                    >
                        <div
                            class="p-6 sm:px-20 bg-white border-b border-gray-200"
                        >
                            <div
                                class="p-6 sm:px-20 bg-white border-b border-gray-200"
                            >
                            
                                <RolesForm :form="form" @submit="form.post(route('roles.store'))" />                            
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
