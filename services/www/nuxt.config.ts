// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    devtools: {
        enabled: true,

        timeline: {
            enabled: true,
        },
    },
    pages: true,
    nitro: {},
    css: ['@/assets/css/main.css'],
    runtimeConfig: {
        private: {
            api_url: process.env.API_URL || 'http://127.0.0.1:8080',
            search_url: process.env.SEARCH_URL || 'http://127.0.0.1:7700',
        },
    },
    modules: [
        //'@nuxt/image',
        //'@nuxt/content',
        //'@nuxtjs/partytown',
        'nuxt-meilisearch',
        '@nuxt/ui',
        //'@nuxt/devtools',
    ],
    meilisearch: {
        hostUrl: process.env.SEARCH_URL || 'http://127.0.0.1:7700',
        searchApiKey: '3213c658b956f584824bef479760f89c96518ecdc1c4c39d2980f3cd7e18b268',
        adminApiKey: '8deeb7a23d0e3646befa1182601c6ac706612ca54f4ddb390f66993d6e9246c5',
        serverSideUsage: true,
        instantSearch: {
            theme: 'algolia',
        },
    },
})
