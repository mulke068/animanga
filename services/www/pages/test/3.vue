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
    <div class="bg-gray-100 min-h-screen p-4">
        <nav class="flex justify-between items-center py-4">
            <NuxtLink to="/" class="text-2xl font-bold text-purple-600">Home</NuxtLink>
            <NuxtLink to="/anime" class="text-2xl font-bold text-purple-600">Anime</NuxtLink>
            <button @click="refresh" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700">
                Refresh
            </button>
        </nav>

        <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h2 class="text-3xl font-semibold mb-4">{{ data.names.original }}</h2>
                    <ul>
                        <li>{{ data.names.en }}</li>
                        <li>{{ data.names.jp }}</li>
                    </ul>
                </div>

                <div>
                    <ul>
                        <li><strong>Season:</strong> {{ data.season }}</li>
                        <li><strong>Episodes:</strong> {{ data.episodes }}</li>
                        <li><strong>Score:</strong> {{ data.score }}</li>
                        <li><strong>Status:</strong> {{ data.status }}</li>
                    </ul>
                </div>
            </div>

            <div class="mt-4">
                <div v-for="type in data.types" :key="type">{{ type }}</div>
                <div class="mt-2" v-for="platform in data.platforms" :key="platform">{{ platform }}</div>
                <div class="mt-2" v-for="genre in data.genres" :key="genre">{{ genre }}</div>
                <div class="mt-2" v-for="tag in data.tags" :key="tag">{{ tag }}</div>
            </div>

            <div class="mt-4">
                <h3 class="text-xl font-semibold">Trailer URLs:</h3>
                <div v-for="trailer_url in data.trailer_urls" :key="trailer_url">
                    <NuxtLink :to="trailer_url" class="text-purple-600 hover:underline">{{ trailer_url }}</NuxtLink>
                </div>

                <h3 class="text-xl font-semibold mt-4">Info URLs:</h3>
                <div v-for="info_url in data.info_urls" :key="info_url">
                    <NuxtLink :to="info_url" class="text-purple-600 hover:underline">{{ info_url }}</NuxtLink>
                </div>

                <h3 class="text-xl font-semibold mt-4">Video URLs:</h3>
                <div v-for="video_url in data.video_urls" :key="video_url">
                    <NuxtLink :to="video_url" class="text-purple-600 hover:underline">{{ video_url }}</NuxtLink>
                </div>
            </div>

            <div class="mt-4">
                <h3 class="text-xl font-semibold">Image URLs:</h3>
                <div v-for="image_url in data.image_urls" :key="image_url">
                    <img :src="image_url" :alt="image_url" class="mt-2 max-w-full" />
                </div>
            </div>
        </div>
    </div>
</template>
