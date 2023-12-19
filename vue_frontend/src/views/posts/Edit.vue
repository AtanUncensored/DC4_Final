<template>
  <div class="flex items-center justify-center h-screen">
    <div class="">
      <span
        v-if="validation.message"
        class="px-2 py-2 mb-4 text-red-600 rounded shadow"
      >
        {{ validation.message }}
      </span>
      <form @submit.prevent="submit">
        <div>
          <label for="task">Your Task</label>
          <input
            type="text"
            name="task"
            v-model="post.task"
            class="w-full px-4 py-2 border border-gray-300 outline-none"
          />
        </div>
        <button class="px-6 py-2 text-white bg-blue-600" type="submit">
          Edit
        </button>
      </form>
    </div>
  </div>
</template>
<script>
import { reactive, ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import axios from 'axios';
export default {
  setup() {
    const post = reactive({
      task: '',
    });
    const validation = ref([]);
   
    const router = useRouter();
    const route = useRoute();
    
    onMounted(() => {
      // fetch api from laravel backend
      axios
        .get(`http://localhost:8000/api/posts/${route.params.id}`)
        .then((response) => {
          post.task = response.data.data.task;
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    });
    function submit() {
      let task = post.task;
      axios
        .put(`http://localhost:8000/api/posts/${route.params.id}`, {
          task: task,
        })
        .then(() => {
          router.push({
            name: 'posts',
          });
        })
        .catch((error) => {
          validation.value = error.response.data;
        });
    }
    return {
      post,
      validation,
      router,
      submit,
    };
  },
};
</script>