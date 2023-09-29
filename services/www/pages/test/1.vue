<script setup lang="ts">
const { data: getData, refresh } = await useFetch(`/api/anime/9rt47ch884mou09jya5l`, {
    key: `9rt47ch884mou09jya5l`,
})
const data: Anime = getData

export interface Anime {
    id: string
    names: Names
    season: number
    episodes: number
    score: number
    status: string
    types: string[]
    platforms: string[]
    genres: string[]
    tags: string[]
    trailer_urls: any[]
    info_urls: string[]
    video_urls: string[]
    image_urls: string[]
    updated_at: Date
    created_at: Date
}

export interface Names {
    original: string
    en: string
    jp: string
}
</script>
<template>
    <div class="p-4 space-y-4">
        <div class="flex justify-between items-center">
            <nuxt-link to="/">Home</nuxt-link>
            <nuxt-link to="/anime">Anime</nuxt-link>
            <button @click="refresh" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Refresh</button>
        </div>

        <div class="border rounded shadow-md p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <h2 class="text-xl font-semibold">{{ data.names.original }}</h2>
                    <p class="text-gray-600">{{ data.names.en }}</p>
                    <p class="text-gray-600">{{ data.names.jp }}</p>
                </div>

                <div>
                    <ul class="list-disc list-inside">
                        <li>Season: {{ data.season }}</li>
                        <li>Episodes: {{ data.episodes }}</li>
                        <li>Score: {{ data.score }}</li>
                        <li>Status: {{ data.status }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h3 class="text-lg font-semibold">Types:</h3>
            <div class="flex space-x-2">
                <div v-for="type in data.types" :key="type" class="bg-blue-200 text-blue-700 px-2 py-1 rounded">
                    {{ type }}
                </div>
            </div>
        </div>
    </div>
</template>
