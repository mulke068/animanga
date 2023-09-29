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
    <div class="bg-gradient-to-b from-purple-500 to-pink-500 py-8">
        <div class="container mx-auto">
            <nav class="flex space-x-4 items-center justify-center">
                <NuxtLink to="/" class="text-white">Home</NuxtLink>
                <NuxtLink to="/anime" class="text-white">Anime</NuxtLink>
                <button
                    @click="refresh"
                    class="bg-pink-600 hover:bg-pink-700 text-white py-2 px-4 rounded-full focus:outline-none"
                >
                    Refresh
                </button>
            </nav>

            <div class="bg-white p-8 mt-8 rounded-lg shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">{{ data.names.original }}</h2>
                        <p class="text-lg text-gray-600">{{ data.names.en }}</p>
                        <p class="text-lg text-gray-600">{{ data.names.jp }}</p>
                    </div>
                    <div>
                        <ul class="space-y-2">
                            <li><span class="font-semibold">Season:</span> {{ data.season }}</li>
                            <li><span class="font-semibold">Episodes:</span> {{ data.episodes }}</li>
                            <li><span class="font-semibold">Score:</span> {{ data.score }}</li>
                            <li><span class="font-semibold">Status:</span> {{ data.status }}</li>
                        </ul>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-gray-800">Types:</h3>
                    <div class="flex flex-wrap space-x-2 mt-2">
                        <div v-for="type in data.types" class="bg-purple-500 text-white rounded-full px-2 py-1">
                            {{ type }}
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-gray-800">Platforms:</h3>
                    <div class="flex flex-wrap space-x-2 mt-2">
                        <div v-for="platform in data.platforms" class="bg-purple-500 text-white rounded-full px-2 py-1">
                            {{ platform }}
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-gray-800">Genres:</h3>
                    <div class="flex flex-wrap space-x-2 mt-2">
                        <div v-for="genre in data.genres" class="bg-purple-500 text-white rounded-full px-2 py-1">
                            {{ genre }}
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-gray-800">Tags:</h3>
                    <div class="flex flex-wrap space-x-2 mt-2">
                        <div v-for="tag in data.tags" class="bg-purple-500 text-white rounded-full px-2 py-1">
                            {{ tag }}
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-gray-800">Trailer URLs:</h3>
                    <div class="space-y-2 mt-2">
                        <div v-for="trailer_url in data.trailer_urls">
                            <NuxtLink :to="trailer_url" class="text-blue-600 hover:underline">{{
                                trailer_url
                            }}</NuxtLink>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-gray-800">Info URLs:</h3>
                    <div class="space-y-2 mt-2">
                        <div v-for="info_url in data.info_urls">
                            <NuxtLink :to="info_url" class="text-blue-600 hover:underline">{{ info_url }}</NuxtLink>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-gray-800">Video URLs:</h3>
                    <div class="space-y-2 mt-2">
                        <div v-for="video_url in data.video_urls">
                            <NuxtLink :to="video_url" class="text-blue-600 hover:underline">{{ video_url }}</NuxtLink>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-gray-800">Images:</h3>
                    <div class="mt-4">
                        <div v-for="image_url in data.image_urls" :key="image_url">
                            <img :src="image_url" :alt="image_url" class="max-w-full rounded-lg shadow-md" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
