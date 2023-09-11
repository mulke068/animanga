<script lang="ts" setup>
const { id } = useRoute().params;
// const { data } = await useFetch(`http://127.0.0.1:8080/manga?id=${id}`, { key: `${id}` })
const { data: getData, refresh } = await useFetch(`/api/manga/${id}`, { key: `${id}` });
const data: Manga = getData;

export interface Manga {
    id: string;
    names: Names;
    chapters: number;
    volumes: number;
    score: number;
    status: string;
    types: string[];
    platforms: string[];
    genres: string[];
    tags: string[];
    info_urls: string[];
    read_urls: string[];
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
    <NuxtLink to="/anime">Manga</NuxtLink>
    <button @click="refresh">Refresh</button>
    <!-- {{ data }} -->
    <div>
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
                    {{ data.chapters }}
                </li>
                <li>
                    {{ data.volumes }}
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
        <div v-for="info_url in data.info_urls">
            <NuxtLink :to="info_url">
                {{ info_url }}
            </NuxtLink>
        </div>
        <br>
        <div v-for="read_url in data.read_urls">
            <NuxtLink :to="read_url">
                {{ read_url }}
            </NuxtLink>
        </div>
        <br>
        <div v-for="image_url in data.image_urls">
            <img :src="image_url" :alt="image_url">
        </div>
    </div>
</template>
