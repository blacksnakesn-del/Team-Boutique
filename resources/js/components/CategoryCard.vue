<script setup>
const props = defineProps({
  categories: {
    type: Array,
    required: true,
  },
});

</script>

<template>
  <div class="categories">
    <a
      v-for="category in props.categories"
      :key="category.id"
      class="category"
      :style="{ '--category-color': category.color }"
    >
      <img :alt="category.name" :src="category.image" width="56" />
      <span>{{ category.name }}</span>
    </a>
  </div>
</template>