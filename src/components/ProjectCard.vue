<template>
  <div class="rounded-2xl shadow-lg bg-white dark:bg-gray-800 p-4 hover:scale-[1.02] transition">
    <img :src="project.image" :alt="project.title" class="rounded-xl w-full h-48 object-cover mb-4" />
    <h3 class="text-xl font-semibold mb-2 text-gray-800 dark:text-gray-100">{{ project.title }}</h3>
    <p class="text-gray-600 dark:text-gray-300 mb-4">{{ project.description }}</p>
    <a :href="project.link" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline font-medium">View Project →</a>
  </div>
</template>

<script>
export default {
  props: {
    project: Object,
  },
};
</script>
