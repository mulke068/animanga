// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: {
    enabled: true,

    timeline: {
      enabled: true
    }
  },
  //runtimeConfig: {
  //  public: {
  //    api_url: process.env.API_URL || "http://127.0.0.1:8080",
  //    www_url: process.env.WWW_URL || "http://127.0.0.1:3000",
  //  },
  //},
  //nitro: {},
  //meilisearch: {
  //  hostUrl: "http://127.0.0.1:7700",
  //  searchApiKey: "",
  //  adminApiKey: "",
  //  serverSideUsage: true,
  //  instantSearch: {
  //    theme: "algolia",
  //  },
  //},
})
