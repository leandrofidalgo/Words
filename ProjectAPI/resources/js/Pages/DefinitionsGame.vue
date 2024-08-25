<template>
    <div id="app">
      <WordGuessGame
        :word="word"
        :definitions="definitions"
      />
    </div>
  </template>
  
  <script>
  import WordGuessGame from '/resources/components/WordGuessGame.vue';
  
  export default {
    name: 'App',
    components: {
      WordGuessGame
    },
    props: {
        word: {
        type: String,
        required: true
        },
        definitions: {
        type: Array,
        required: true
        }
    },
    data() {
      return {
      };
    }
  };
  </script>
  
  <style>
  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 20px;
    background: #f2f2f2;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  </style>
  