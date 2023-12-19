<template>
  <main class="container flex items-center justify-center h-screen mx-auto">
    <div class="flex flex-col">
      <div class="overflow-x-auto">
        <div class="p-1.5 w-full inline-block align-middle">
          <RouterLink to="/posts/create" class="p-2 text-white bg-blue-600 rounded-md"
            >Add New Task</RouterLink
          >
          <div class="mt-5 overflow-hidden border rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
              <thead>
                <tr>
                  <th
                    scope="col"
                    class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
                  >
                    ID
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
                  >
                    Task
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
                  >
                    Edit
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-xs font-bold text-center text-gray-500 uppercase"
                  >
                    Delete
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr v-for="post in posts" :key="post.id">
                  <td
                    class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap"
                  >
                    {{ post.id }}
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                    {{ post.task }}
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap ">
                    <RouterLink
                      :to="{ name: 'posts.edit', params: { id: post.id } }"
                      class="text-green-500"
                      >EDIT</RouterLink
                    >
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap ">
                    <button
                      @click.prevent="postDelete(post.id, index)"
                      class="text-red-600"
                    >
                      DELETE
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
<script>
import axios from 'axios';
import { onMounted, ref } from 'vue';
export default {
  setup() {
    let posts = ref([]);

    onMounted(() => {
      // fetch api from laravel backend
      axios
        .get('http://localhost:8000/api/posts')
        .then((res) => {
          posts.value = res.data.data;
        })
        .catch((error) => {
          console.log(error.res.data);
        });
    });
    function postDelete(id, index) {
      axios
        .delete(`http://localhost:8000/api/posts/${id}`)
        .then(() => {
          posts.value.splice(index, 1);
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    }
    return {
      posts,
      postDelete,
    };
  },
};
</script>
<style scoped>
thead {
    background-color: rgb(97, 246, 97);
}
</style>