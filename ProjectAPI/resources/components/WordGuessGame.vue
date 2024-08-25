<template>
    <div class="word-guess-game">
      <h2>🎯 Guess the Word!</h2>
      <p class="instruction">Can you figure out the word from these clues?</p>
      <ul class="definitions-list">
        <li v-for="(definition, index) in definitions" :key="index" class="definition">
          {{ definition.definition }}
        </li>
      </ul>
      <p v-if="!gameEnded" class="attempts-left">
        Attempts left: {{ maxAttempts - attempts }}
      </p>
      <input 
        v-model="userGuess" 
        placeholder="Enter your guess..." 
        class="guess-input"
        @keyup.enter="checkGuess"
        :disabled="gameEnded"
      />
      <button @click="checkGuess" class="submit-button" :disabled="gameEnded">Submit Guess</button>
      <p v-if="resultMessage" :class="{'correct': isCorrect, 'incorrect': !isCorrect}" class="result-message">
        {{ resultMessage }}
      </p>
      <p v-if="gameEnded" class="result-message">
        The correct word was: {{ word }}
      </p>
      <button v-if="gameEnded" @click="restartGame" class="restart-button">Try Again</button>
    </div>
  </template>
  
  <script>
  export default {
    name: 'WordGuessGame',
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
        userGuess: '',
        resultMessage: '',
        isCorrect: false,
        attempts: 0,
        maxAttempts: 5,
        gameEnded: false
      };
    },
    methods: {
      checkGuess() {
        if (this.gameEnded) return;
  
        if (this.userGuess.toLowerCase() === this.word.toLowerCase()) {
          this.isCorrect = true;
          this.resultMessage = '🎉 Correct! You guessed the word!';
          this.gameEnded = true;
        } else {
          this.isCorrect = false;
          this.attempts++;
          if (this.attempts >= this.maxAttempts) {
            this.resultMessage = '❌ Game over! You have used all your attempts.';
            this.gameEnded = true;
          } else {
            this.resultMessage = '❌ Incorrect! Try again.';
          }
        }
  
        // Clear the input field after each guess
        this.userGuess = '';
      },
      restartGame() {
        // Reload the page to reset the game
        window.location.reload();
      }
    }
  };
  </script>
  
  <style scoped>
  .word-guess-game {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    border-radius: 15px;
    background: linear-gradient(135deg, #6dd5ed, #2193b0);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    text-align: center;
    font-family: 'Arial', sans-serif;
    color: white;
  }
  
  h2 {
    font-size: 28px;
    margin-bottom: 10px;
    color: #fff;
  }
  
  .instruction {
    font-size: 16px;
    margin-bottom: 20px;
    color: #eee;
  }
  
  .definitions-list {
    list-style-type: none;
    padding: 0;
    margin-bottom: 20px;
  }
  
  .definition {
    background: rgba(255, 255, 255, 0.2);
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 10px;
    font-size: 18px;
  }
  
  .guess-input {
    width: 100%;
    padding: 12px;
    font-size: 18px;
    border-radius: 10px;
    border: 2px solid transparent;
    outline: none;
    transition: border-color 0.3s;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  }
  
  .guess-input:focus {
    border-color: #fff;
  }
  
  .submit-button {
    width: 100%;
    padding: 12px;
    margin-top: 20px;
    font-size: 18px;
    background: #4CAF50;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  }
  
  .submit-button:hover {
    background: #45a049;
    transform: translateY(-2px);
  }
  
  .result-message {
    margin-top: 20px;
    font-size: 20px;
    font-weight: bold;
  }
  
  .correct {
    color: #4CAF50;
    animation: correctAnimation 0.5s ease-in-out;
  }
  
  .incorrect {
    color: #FF5252;
    animation: incorrectAnimation 0.5s ease-in-out;
  }
  
  .attempts-left {
    font-size: 18px;
    margin-top: 10px;
  }
  
  .restart-button {
    width: 100%;
    padding: 12px;
    margin-top: 20px;
    font-size: 18px;
    background: #f44336;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  }
  
  .restart-button:hover {
    background: #e53935;
    transform: translateY(-2px);
  }
  
  @keyframes correctAnimation {
    0% {
      transform: scale(0.8);
      opacity: 0;
    }
    100% {
      transform: scale(1);
      opacity: 1;
    }
  }
  
  @keyframes incorrectAnimation {
    0% {
      transform: translateY(-10px);
      opacity: 0;
    }
    100% {
      transform: translateY(0);
      opacity: 1;
    }
  }
  </style>
  