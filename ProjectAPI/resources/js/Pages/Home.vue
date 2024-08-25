<template>
  <div>
    <nav>
      <ul class="menu">
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/gamedefinitions">Definitions Game</router-link></li>
        <li><router-link to="/synonyms">Synonyms</router-link></li>
        <li><router-link to="/about">About</router-link></li>
      </ul>
    </nav>
    <div class="content">
      <h1>Welcome to the Home Page</h1>
      <p>This is the main landing page of your application.</p>
    </div>
    <footer class="footer">
      <p>&copy; 2024 Leandro Fidalgo - Made with love for the web.</p>
    </footer>
  </div>
</template>

<script>
export default {
  name: "Home",
}
</script>

<style scoped>
/* Wrapper to structure the content and footer */
.wrapper {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

/* Menu styles */
.menu {
  list-style-type: none;
  padding: 0;
  display: flex;
  gap: 20px;
  background-color: #42b983;
  padding: 10px 20px;
  border-radius: 8px;
}

.menu li {
  display: inline;
  color: white;
  font-weight: bold;
}

/* Content styles */
.content {
  flex: 1;
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 12px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: center;
  max-width: 600px;
  margin: 40px auto;
}

.content h1 {
  color: #333;
  font-size: 2.5rem;
  margin-bottom: 10px;
}

.content p {
  color: #666;
  font-size: 1.2rem;
  line-height: 1.6;
}

/* Footer styles */
.footer {
  text-align: center;
  padding: 15px;
  background-color: #42b983;
  color: white;
  border-radius: 8px;
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
}

.footer p {
  margin: 0;
  font-size: 1rem;
}
</style>
