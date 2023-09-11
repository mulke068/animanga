export default defineEventHandler(async (event) => {
  const config = useRuntimeConfig();
  const id = event.context.params.id;
  const data = await $fetch(`${config.public.api_url}/anime?id=${id}`);
  return data;
});
