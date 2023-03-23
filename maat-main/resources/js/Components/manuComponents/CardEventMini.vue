
<script>


export default {
    name: "CardEventMini",
}
</script>

<template>
    <li class="sm:flex sm:items-center sm:justify-between">
        <div class="flex justify-center mb-5 mr-5">
            <div class="block max-w-sm rounded-lg bg-white shadow-lg dark:bg-neutral-700">
                <a href="#!" data-te-ripple-init data-te-ripple-color="light">
                    <img class="rounded-t-lg" src="https://tecdn.b-cdn.net/img/new/standard/nature/186.jpg" alt="" />
                </a>
                <div class="p-6">
                    <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                        Card title
                    </h5>
                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                        Some quick example text to build on the card title and make up the
                        bulk of the card's content.
                    </p>
                    <p class="text-sm text-gray-600 flex items-center mt-3">
                        <v-icon name="md-daterange" class="fill-current text-gray-500 w-3 h-3 mr-2">
                        </v-icon>
                        15/03/2023
                    </p>
                </div>
            </div>

        </div>
    </li>
</template>
