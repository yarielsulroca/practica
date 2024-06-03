<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head , useForm} from '@inertiajs/vue3';

const props = defineProps({
    clients: {type:Object}
});

</script>

<template>
    <AuthenticatedLayout>
        <Head title="Clientes" />
        <template #header>
			Clientes
		</template>
        <div class="w-full overflow-hidden rounded-lg border shadow-md">
            <div class=" w-full overflow-x-auto bg-white">
                <table class=" w-full whitespace-no-wrap ">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                      <th class="px-4 py-3">#</th>
                      <th class="px-4 py-3">Contacto</th>
                      <th class="px-4 py-3">Social</th>
                      <th class="px-4 py-3">Direccion</th>
                      <th class="px-4 py-3">Ciudad</th>
                      <th class="px-4 py-3">Cliente</th>
                      <th class="px-4 py-3">CUIT</th>
                      <th class="px-4 py-3">Email</th>
                      <th class="px-4 py-3">Contacto_Telef</th>
                      <th class="px-4 py-3">Cliente_Telef</th>
                      <th class="px-4 py-3">Permitido?</th>
                      <th class="px-4 py-3"></th>

                     
                    </tr>
                  </thead>
                  <tbody class="bg-withe divide-y dark:divide-gray-700 dark:bg-gray-700">
                    <tr v-for=" a,i in clients " :key= "a.id" class="text-gray-700" >

                        <td class="px-4 py-3">
                            {{ (i+1) }}
                        </td>
                        <td class="px-4 py-3">
                            {{ a.contacto }}
                        </td>
                        <td class="px-4 py-3">
                            {{ a.social }}
                        </td>
                        <td class="px-4 py-3">
                            {{ a.direccion }}
                        </td>
                        <td class="px-4 py-3">
                            {{ a.ciudad }}
                        </td>
                        <td class="px-4 py-3">
                            {{ a.nombre_cliente }}
                        </td>
                        <td class="px-4 py-3">
                            {{ a.cuit }}
                        </td>
                        <td class="px-4 py-3">
                            {{ a.email }}
                        </td>
                        <td class="px-4 py-3">
                            {{ a.telefono_cliente }}
                        </td>
                        <td class="px-4 py-3">
                            {{ a.telefono_contacto }}
                        </td>
                        <td class="px-4 py-3">
                            {{ a.allow }}
                        </td>

                    </tr>
                  </tbody>
                </table>

            </div>
        </div>
    </AuthenticatedLayout>

</template>
