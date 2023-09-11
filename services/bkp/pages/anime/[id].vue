<script lang="ts" setup>
const { id } = useRoute().params;
// const { data } = await useFetch(`http://127.0.0.1:8080/anime?id=${id}`, { key: `${id}` })
const { data: getData, refresh } = await useFetch(`/api/anime/${id}`, { key: `${id}` });
const data: Anime = getData;

export interface Anime {
    id: string;
    names: Names;
    season: number;
    episodes: number;
    score: number;
    status: string;
    types: string[];
    platforms: string[];
    genres: string[];
    tags: string[];
    trailer_urls: any[];
    info_urls: string[];
    video_urls: string[];
    image_urls: string[];
    updated_at: Date;
    created_at: Date;
}

export interface Names {
    original: string;
    en: string;
    jp: string;
}

</script>

<template>
    <NuxtLink to="/">Home</NuxtLink>
    <NuxtLink to="/anime">Anime</NuxtLink>
    <button @click="refresh">Refresh</button>
    <div>
        <!-- {{ data }} -->
        <div>
            <ul>
                <li>
                    {{ data.names.original }}
                </li>
                <li>
                    {{ data.names.en }}
                </li>
                <li>
                    {{ data.names.jp }}
                </li>
            </ul>
        </div>
        <div>
            <ul>
                <li>
                    {{ data.season }}
                </li>
                <li>
                    {{ data.episodes }}
                </li>
                <li>
                    {{ data.score }}
                </li>
                <li>
                    {{ data.status }}
                </li>
            </ul>
        </div>
        <div v-for="type in data.types">
            {{ type }}
        </div>
        <br>
        <div v-for="platform in data.platforms">
            {{ platform }}
        </div>
        <br>
        <div v-for="genre in data.genres">
            {{ genre }}
        </div>
        <br>
        <div v-for="tag in data.tags">
            {{ tag }}
        </div>
        <br>
        <div v-for="trailer_url in data.trailer_urls">
            <NuxtLink :to="trailer_url">{{ trailer_url }}</NuxtLink>
        </div>
        <br>
        <div v-for="info_url in data.info_urls">
            <NuxtLink :to="info_url">{{ info_url }}</NuxtLink>
        </div>
        <br>
        <div v-for="video_url in data.video_urls">
            <NuxtLink :to="video_url">{{ video_url }}</NuxtLink>
        </div>
        <br>
        <div v-for="image_url in data.image_urls">
            <img :src="image_url" :alt="image_url">
        </div>
    </div>
</template>
