<script lang="ts" setup>

const { data } = useFetch("https://api.jikan.moe/v4/anime/1/full");

</script>
<template>
    <div>
        {{ data }}
    </div>
</template>
