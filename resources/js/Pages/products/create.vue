<!-- JS -->
<script setup>
/* IMPORTAZIONI */
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

/* PROPS */
defineProps({
    products: Array
});

/* CAMPI CHE RICEVARA' LA REQUEST */
const form = useForm({
    title: '',
    image: null,
    slug: '',
    status: 0,
    description: '',
    price: null,
});

const generateSlug = (form) => {
    form.slug = form.title.trim().toLowerCase().split(' ').join('-');
    return form.slug;

};

const preview = (form) => {

    let preview = form.image;
    if (!form.image) {
        preview = 'https://marcolanci.it/boolean/assets/placeholder.png'
    }
    return preview;

};

/* INVIO MODULO IN POST, CORRISPONDENTE ALLA ROTTA DEFINITA SU WEB.PHP (STORE) */
const submit = () => {
    form.post(route('products.store'));
};
</script>

<!-- HTML -->
<template>

    <!-- TITOLO PAGINA -->

    <Head title="Crea Prodotto" />

    <!-- AUTENTICAZIONE -->
    <AuthenticatedLayout>

        <!-- SEZIONE HEADER -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crea Prodotto</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


                <div class=" mx-auto sm:px-6 lg:px-8 bg-white py-6 shadow-sm sm:rounded-lg">

                    <!-- FORM -->
                    <form class="p-4" @submit.prevent="submit">

                        <!-- NOME PROGETTO -->
                        <div class="mt-2 flex gap-2">
                            <div class="w-1/2">

                                <InputLabel for="title" value="NOME PRODOTTO" />

                                <TextInput id="title" type="text" class="mt-1 w-full" v-model="form.title" autofocus
                                    autocomplete="title" />

                                <InputError class="mt-2" :message="form.errors.title" />
                            </div>
                            <div class="w-1/2">

                                <InputLabel for="slug" value="SLUG" disabled />

                                <TextInput id="slug" type="text" :value="generateSlug(form)"
                                    class="mt-1 w-full bg-gray-200 " v-model="form.slug" autofocus autocomplete="slug"
                                    disabled />

                                <InputError class="mt-2" :message="form.errors.slug" />
                            </div>
                        </div>

                        <div class="flex gap-5 mt-5 items-center">

                            <!-- URL PROGETTO -->
                            <div class=" w-1/2">
                                <InputLabel for="image" value="IMMAGINE" />

                                <TextInput id="image" type="url" class="mt-1 block w-full" v-model="form.image"
                                    autocomplete="projecturl" />

                                <InputError class="mt-2" :message="form.errors.image" />
                            </div>

                            <div class=" w-1/2">
                                <InputLabel for="preview" />

                                <img width="100px" height="100px" :src="preview(form)" alt="">

                                <InputError class="mt-2" />
                            </div>
                        </div>

                        <!-- descrizione -->
                        <div class="mt-3">

                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                DESCRIZIONE
                            </label>
                            <textarea id="description" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-black-500 focus:border-black-500 dark:bg-white mb-3 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-black-500 dark:focus:border-black-500"
                                v-model="form.description">
                    </textarea>
                        </div>

                        <div class="flex justify-between w-full">
                            <div>

                                <InputLabel for="price" value="PREZZO" />

                                <TextInput id="price" type="number" class="mt-1" v-model="form.price" autofocus
                                    autocomplete="price" step=".01" />
                                <InputError class="mt-2" :message="form.errors.price" />
                            </div>


                            <!-- status -->


                            <label class="inline-flex items-center mb-5 cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" v-model="form.status">
                                <div
                                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                </div>
                                <span class="ms-3 text-sm font-medium text-black dark:text-black">PUBBLICA</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-8">

                            <!-- BOTTONE DI SALVATAGGIO DEL PROGETTO CREATO (PASSATA ALLO STORE)-->
                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                SALVA
                            </PrimaryButton>
                        </div>
                    </form>
                </div>

                <!-- BOTTONE TORNA ALL'INDEX -->
                <div class="flex justify-star m-2 p-2">
                    <Link :href="route('products.index')"
                        class="px-4 py-2 bg-cyan-600 hover:bg-cyan-800 text-white rounded-md">
                    Torna Indietro</Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>