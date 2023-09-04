export default defineEventHandler(async (event) => {
  const config = useRuntimeConfig();
  const param = getQuery(event);
  const data = await $fetch(
    `${config.public.api_url}/anime/search?q=${param.query}&l=${param.limit}`
  );
  return data;
});
