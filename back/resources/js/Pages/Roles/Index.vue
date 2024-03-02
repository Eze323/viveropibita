<script>
export default {
    name: "RolesIndex",
};
</script>

<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";

defineProps({
    roles: {
       type: Object,
       required: true}
});

const deleteRol =  id => {
    
    if (confirm("Quiere continuar con la accion actualizado? ")) {
        Inertia.delete(route('roles.destroy', id))
        //Inertia.reload();
        // Delete the resource
        // this.$inertia.delete(route('roles.destroy', id))
    }
};
</script>
<template>
    <AppLayout title="Roles">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Roles
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex justify-between" v-if="$page.props.user.permissions.includes('create roles')">
                        <Link
                            :href="route('roles.create')"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        >
                            Crear Rol
                           
                        </Link>
                    </div>

                    <div class="mt-4">
                        <ul role="list" class="divide-y divide-gray-100">
                            <li class="flex justify-between gap-x-6 py-5" v-for="rol in roles.data" :key="rol.id">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p
                                            class="text-sm font-semibold leading-6 text-gray-900"
                                        >
                                            {{ rol.name }}
                                          
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="hidden shrink-0 sm:flex sm:flex-col sm:items-end"
                                >
                                    <p class="text-sm leading-6 text-gray-900">
                                        
                                      <Link :href="route('roles.edit', rol.id )"> Edit  </Link>  
                                       <Link @click="deleteRol(rol.id)"> Delete  </Link>       
                                    </p>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
