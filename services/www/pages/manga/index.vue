
<template>
    <div>
        <NuxtLink to="/">Home</NuxtLink>
        <ais-instant-search :search-client="client" index-name="manga">
            <ais-configure :hits-per-page.camel="10" />
            <ais-search-box placeholder="Search here..." class="searchbox"></ais-search-box>
            <ais-hits>
                <template v-slot="{ items }">
                    <ul>
                        <li v-for="{ id, mid, original, en, jp } in items" :key="id" class="card">
                            <div>
                                <h1>{{ original }}</h1>
                                <h2>{{ en }}</h2>
                                <h2> {{ jp }}</h2>
                                <div>{{ id }}</div>
                                <NuxtLink :to="`/manga/${mid}`">Click ME</NuxtLink>
                            </div>
                            <img :src="url" :alt="`Poster from ${original}`" />
                        </li>
                    </ul>
                </template>
            </ais-hits>
        </ais-instant-search>
    </div>
</template>

<script setup>

import {
    AisInstantSearch,
    AisConfigure,
    AisHits,
    AisSearchBox
} from 'vue-instantsearch/vue3/es'

const client = useMeilisearchClient()
</script>

<style scoped>
.card {
    display: flex;
    margin-bottom: 20px;
}

.card img {
    margin-right: 10px;
}
</style>