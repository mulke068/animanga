// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: {
    enabled: true,

    timeline: {
      enabled: true,
    },
  },
  runtimeConfig: {
    public: {
      api_url: process.env.API_URL || "http://127.0.0.1:8080",
      www_url: process.env.WWW_URL || "http://127.0.0.1:3000",
    },
  },
  css: [
    '@/assets/css/main.css',
  ],
  build: {
    postcss: {
      postcssOptions: {
        plugins: {
          tailwindcss: {},
          autoprefixer: {},
        },
      },
    },
  },
  nitro: {},
  modules: [
    "nuxt-meilisearch",
    "nuxt-icon",
    "nuxt-icons",
    "nuxt-swiper",
    "@formkit/nuxt",
  ],
  meilisearch: {
    hostUrl: "http://127.0.0.1:7700",
    searchApiKey:
      "d7186401994c0af63d1a4df28f10204bb3ee8a8a7912db88ec4ba732b13e1c2d",
    adminApiKey:
      "c019e7d5b86b6641361c0822206fa5c24e05cb311a134984f583ef07fa1410f1",
    serverSideUsage: true,
    instantSearch: {
      theme: "algolia",
    },
  },
  nuxtIcon: {
    size: "24px",
    class: "icon",
    aliases: {
      nuxt: "logos:nuxt-icon",
    },
  },
  formkit: {
    defaultConfig: false,
    configFile: './formkit.config.ts',
  },
});
