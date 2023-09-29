<script setup lang="ts">
const { id } = useRoute().params

const { data: setData, refresh } = await useFetch(`/api/anime/${id}`, { key: `${id}` })
const data: Anime = setData

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
    <div class="bg-gray-100 dark:bg-gray-900 min-h-screen p-4">
        <nav class="flex justify-between items-center py-4">
            <NuxtLink to="/" class="text-2xl font-bold text-purple-600 dark:text-purple-300">Home</NuxtLink>
            <NuxtLink to="/anime" class="text-2xl font-bold text-purple-600 dark:text-purple-300">Anime</NuxtLink>
            <button
                @click="refresh"
                class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 dark:bg-blue-500 dark:hover:bg-blue-600 dark:text-white focus:outline-none"
            >
                Refresh
            </button>
        </nav>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mt-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="max-w-prose">
                    <h2 class="text-3xl font-semibold mb-4">{{ data.names.original }}</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400">{{ data.names.en }}</p>
                    <p class="text-lg text-gray-600 dark:text-gray-400">{{ data.names.jp }}</p>
                </div>

                <div class="mt-4 border-t pt-4">
                    <h3 class="text-xl font-semibold">Details:</h3>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <strong class="text-purple-600">Season:</strong>
                            <span class="text-gray-800 dark:text-gray-300 p-2">{{ data.season }}</span>
                        </li>
                        <li>
                            <strong class="text-purple-600">Episodes:</strong>
                            <span class="text-gray-800 dark:text-gray-300 p-2">{{ data.episodes }}</span>
                        </li>
                        <li>
                            <strong class="text-purple-600">Score:</strong>
                            <span class="text-gray-800 dark:text-gray-300 p-2">{{ data.score }}</span>
                        </li>
                        <li>
                            <strong class="text-purple-600">Status:</strong>
                            <span class="text-gray-800 dark:text-gray-300 p-2">{{ data.status }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="break-all">
                <div class="mt-4">
                    <h3 class="text-xl font-semibold">Types:</h3>
                    <div class="flex flex-wrap space-x-2 mt-2">
                        <div
                            v-for="type in data.types"
                            class="bg-blue-200 text-blue-700 dark:bg-green-400 dark:text-green-900 rounded-full px-2 py-1 mt-2"
                        >
                            {{ type }}
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <h3 class="text-xl font-semibold">Platforms:</h3>
                    <div class="flex flex-wrap space-x-2 mt-2">
                        <div
                            v-for="platform in data.platforms"
                            class="bg-blue-200 text-blue-700 dark:bg-green-400 dark:text-green-900 rounded-full px-2 py-1 mt-2"
                        >
                            {{ platform }}
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <h3 class="text-xl font-semibold">Genres:</h3>
                    <div class="flex flex-wrap space-x-2 mt-2">
                        <div
                            v-for="genre in data.genres"
                            class="bg-blue-200 text-blue-700 dark:bg-green-400 dark:text-green-900 rounded-full px-2 py-1 mt-2"
                        >
                            {{ genre }}
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <h3 class="text-xl font-semibold">Tags:</h3>
                    <div class="flex flex-wrap space-x-2 mt-2">
                        <div
                            v-for="tag in data.tags"
                            class="bg-blue-200 text-blue-700 dark:bg-green-400 dark:text-green-900 rounded-full px-2 py-1 mt-2"
                        >
                            {{ tag }}
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <h3 class="text-xl font-semibold">Trailer URLs:</h3>
                    <div v-for="trailer_url in data.trailer_urls" :key="trailer_url">
                        <NuxtLink
                            :to="trailer_url"
                            class="text-purple-600 hover:underline dark:text-yellow-300 dark:hover:text-yellow-500"
                            >{{ trailer_url }}</NuxtLink
                        >
                    </div>

                    <h3 class="text-xl font-semibold mt-4">Info URLs:</h3>
                    <div v-for="info_url in data.info_urls" :key="info_url">
                        <NuxtLink
                            :to="info_url"
                            class="text-purple-600 hover:underline dark:text-yellow-300 dark:hover:text-yellow-500"
                            >{{ info_url }}</NuxtLink
                        >
                    </div>

                    <h3 class="text-xl font-semibold mt-4">Video URLs:</h3>
                    <div v-for="video_url in data.video_urls" :key="video_url">
                        <NuxtLink
                            :to="video_url"
                            class="text-purple-600 hover:underline dark:text-yellow-300 dark:hover:text-yellow-500"
                            >{{ video_url }}</NuxtLink
                        >
                    </div>
                </div>

                <div class="mt-4">
                    <h3 class="text-xl font-semibold">Image URLs:</h3>
                    <div class="mt-2">
                        <div v-for="image_url in data.image_urls" :key="image_url">
                            <img :src="image_url" :alt="image_url" class="max-w-full rounded-lg shadow-md" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
