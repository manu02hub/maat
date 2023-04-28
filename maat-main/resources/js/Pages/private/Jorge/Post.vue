<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import FeedIzq from '@/Components/jorgeComponents/FeedIzq.vue'
import FeedDcha from '@/Components/jorgeComponents/FeedDcha.vue'
import EntradaPost from '@/Components/jorgeComponents/EntradaPost.vue';
</script>

<template>
    <Head title="Post" />

    <AuthenticatedLayout>
        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

            <!-- Site header -->


            <main>
                <div class="px-4 sm:px-6 lg:px-8 py-8 md:py-0 w-full max-w-9xl mx-auto">

                    <div class="xl:flex">

                        <!-- Left + Middle content -->
                        <div class="md:flex flex-1">

                            <!-- Left content -->
                            <FeedIzq />

                            <!-- Middle content -->

                            <div class="flex-1 md:ml-8 xl:mx-4 2xl:mx-8">
                                <div class="md:py-8">

                                    <!-- Blocks -->
                                    <div class="space-y-4">
                                        <EntradaPost />
                                    </div>
                                </div>
                            </div>



                        </div>

                        <!-- Right content -->
                        <FeedDcha />

                    </div>

                </div>
            </main>

        </div>
    </AuthenticatedLayout>
</template>
