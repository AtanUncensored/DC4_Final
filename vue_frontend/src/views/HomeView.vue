<script setup> 

</script>

<style scoped>
h1 {
  font-size: 30px;
  text-align: center;
  margin-top: 100px;
  color:rgb(82, 132, 152);
}

p {
  text-align: center;
  font-size: 60px;
  color: rgb(78, 121, 138);
}
button {
  margin-top: 20px;
  font-size: 30px;
  padding: 12px;
  background-color: rgb(48, 194, 48);
  border-radius: 10px;
  color: white;
}
button:hover {
  background-color: green;
}
</style>

<template>

 <div>
    <h1> Welcome my User</h1>
 </div>
 

 <p>Don't forget to Finish your Task!</p>
 <br>
<center><button><RouterLink to="/posts">Get's Started</RouterLink></button></center>
</template>
