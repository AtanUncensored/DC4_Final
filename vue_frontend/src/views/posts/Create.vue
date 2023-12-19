<template>
  <div class="flex items-center justify-center h-screen">
    <div class="">
      <span v-if="validation.message" class="px-2 py-2 mb-4 text-red-600 rounded shadow">
        {{ validation.message }}
      </span>
      <form @submit.prevent="submit">
        <div>
          <label for="title">New Task</label>
          <input
            type="text"
            name="task"
            v-model="post.task"
            class="w-full px-4 py-2 border border-gray-300 outline-none"
          />
        </div>
        <button class="px-4 py-2 text-white bg-blue-600 rounded-md p-2" type="submit">
          Add
        </button>
      </form>
    </div>
  </div>
</template>
<style scoped>

</style>

<script>
import { reactive, ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

export default {
  setup() {
    const post = reactive({
      task: '',
    });

    const validation = ref([]);

    const router = useRouter();

    function submit() {
      let task = post.task;


      axios
        .post('http://localhost:8000/api/posts', {
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