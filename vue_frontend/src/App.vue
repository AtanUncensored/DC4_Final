<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
</script>

<template>
  <header>
      <nav>
        <div class="container">
           <h1>TO DO TASK</h1>
        </div>

        <div>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/posts">Task</RouterLink>
        <RouterLink to="/about">About</RouterLink>
        </div>
      </nav>  
  </header>
  <div class="body">
      <RouterView />
  </div>
</template>

<style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
}
nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
  display: flex;

}
nav a {
  padding: 15px;
  margin:15px;
  color: black;
  font-size: 30px;
}

nav a:hover {
  background-color: rgb(117, 135, 194);
  border-radius: 10px;
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: right;
    margin-left: -1rem;
    font-size: 1rem;
    padding: 20px;
    margin-top: 1rem;
    background-color: rgba(142, 177, 212, 0.924);
  }
  h1 {
    font-size: 40px;
    float: left;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  }
}
</style>
