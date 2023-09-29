<template>
    <div class="bg-gray-100 dark:bg-gray-900 min-h-screen p-4">
        <!-- Navigation -->
        <nav class="mb-4">
            <NuxtLink to="/" class="link">Home</NuxtLink>
            <NuxtLink to="anime" class="link">Anime</NuxtLink>
            <span class="font-bold text-xl mx-2">Manga Search</span>
        </nav>

        <!-- manga Search -->
        <ais-instant-search :search-client="client" index-name="manga">
            <ais-configure :hits-per-page.camel="10" />
            <ais-search-box placeholder="Search here…" class="mb-4" />
            <ais-pagination
                :show-first="false"
                :show-previous="true"
                :show-next="true"
                :show-last="false"
                class="mb-4"
            />
            <ais-hits>
                <template v-slot="{ items }">
                    <ul class="grid grid-cols-1 gap-4">
                        <li v-for="{ id, mid, original, en, jp } in items" :key="id">
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
                                <h1 class="text-2xl text-blue-400 dark:text-blue-400 font-semibold">{{ original }}</h1>
                                <h2 class="text-lg text-gray-700 dark:text-gray-300">{{ en }}</h2>
                                <h2 class="text-lg text-gray-700 dark:text-gray-300">{{ jp }}</h2>
                                <NuxtLink :to="`/manga/${mid}`" class="mt-2 text-blue-500 hover:underline block">
                                    Click ME
                                </NuxtLink>
                            </div>
                        </li>
                    </ul>
                </template>
            </ais-hits>
        </ais-instant-search>
    </div>
</template>

<script setup>
import { AisInstantSearch, AisConfigure, AisHits, AisSearchBox, AisPagination } from 'vue-instantsearch/vue3/es'

const client = useMeilisearchClient()
</script>
