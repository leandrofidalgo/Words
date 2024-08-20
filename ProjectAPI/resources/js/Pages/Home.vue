<template>
  <div>
    <h1>Synonyms for "Lovely"</h1>
    <ul>
      <li v-for="(synonym, index) in synonyms" :key="index">{{ synonym }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    synonyms: Array
  }
}
</script>