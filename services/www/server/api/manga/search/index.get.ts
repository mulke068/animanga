export default defineEventHandler(async (event) => {
  const config = useRuntimeConfig();
  const param = getQuery(event);
  const data = await $fetch(
    `${config.public.api_url}/manga/search?q=${param.query}&l=${param.limit}`
  );
  return data;
});
