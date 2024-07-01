<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
/* PROPS */
const props = defineProps({
    products: Object,
});
</script>

<template>

    <Head title="Prodotti" />
    <!-- AUTENTICAZIONE -->
    <AuthenticatedLayout>

        <!-- SEZIONE HEADER -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Prodotti</h2>
        </template>

        <div class="container mx-auto">
            <div class="text-end mt-5">

                <Link :href="route('products.create')"
                    class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded-md">
                Crea
                Prodotto
                </Link>
            </div>

            <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-black-500 dark:text-black-400">
                    <thead class="text-xs text-black-700 uppercase bg-gray-50 dark:bg-gray-200 dark:text-black-500">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-white-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Immagine
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Prodotto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stato
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Prezzo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Azioni
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in props.products" :key="product.id"
                            class="bg-white border-b dark:bg-white-800 dark:border-gray-400 hover:bg-gray-50 dark:hover:bg-gray-200">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-white-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-6 py-4">
                                # {{ product.id }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                <img width="50px" height="50px" :src="product.image" :alt="product.title">
                            </th>
                            <td class="px-6 py-4">
                                {{ product.title }}
                            </td>
                            <td class="px-6 py-4">

                                <span v-if="product.status == 0" class="text-red-500"> OFF</span>
                                <span class="text-green-500" v-else>ON</span>
                            </td>
                            <td class="px-6 py-4">
                                {{ product.price }} €
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <Link :href="route('products.edit', product.id)"
                                    class="text-lg text-blue-600 dark:text-blue-500 hover:underline me-3"><i
                                    class="fa-regular fa-pen-to-square"></i>
                                </Link>
                                <Link :href="route('products.destroy', product.id)" method="delete" as="button"
                                    type="button" class="text-lg text-red-500 hover:text-red-700"><i
                                    class="fa-regular fa-trash-can"></i>
                                </Link>
                                <!-- SHOW PRODOTTO -->
                                <!-- <Link :href="route('products.show', product.id)" class="text-center ml-auto text-lg"> >
                                </Link> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </AuthenticatedLayout>

</template>

<style scoped></style>