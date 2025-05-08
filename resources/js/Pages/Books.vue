<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue'
import axios from 'axios';
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  books: Array
})

const headers = [
  'ID',
  'Title',
  'Author',
  'Genre',
  'User',
  'Published Date',
  'Description',
  'Created At',
  'Updated At'
]

// Search
const books = ref(props.books);
const search = ref('');

function searchBooks() {
  const text = search.value

  if (text.length >= 3 || text.length === 0) {
    axios.post('/books/search', {
      search: text,
    })
      .then((response) => {
        books.value = response.data.books
      })
      .catch((error) => {
        console.error(error);
      });
  }
}

</script>

<template>

  <Head title="Books" />
  <div class="p-4">
    <h1 class="text-2xl font-bold mb-4">Books</h1>

    <!-- Search  -->
    <input id="search" v-model="search" @input="searchBooks" type="text" placeholder="Buscar por título..."
      class="border p-2 mb-4 w-full" />

    <!-- Table books -->
    <!-- Table Container -->
    <div class="overflow-x-auto rounded-lg shadow border border-gray-200">
      <table class="min-w-full text-sm text-gray-700 bg-white">
        <thead class="bg-gray-100 text-xs uppercase text-gray-600">
          <tr>
            <th v-for="header in headers" :key="header" class="px-3 py-2 whitespace-nowrap text-left border-b border-gray-200">
              {{ header }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="book in books" :key="book.id" class="hover:bg-gray-50">
            <td class="px-3 py-2 border-b border-gray-200">{{ book.id }}</td>
            <td class="px-3 py-2 border-b border-gray-200">{{ book.title }}</td>
            <td class="px-3 py-2 border-b border-gray-200">{{ book.author.name }}</td>
            <td class="px-3 py-2 border-b border-gray-200">{{ book.genre.name }}</td>
            <td class="px-3 py-2 border-b border-gray-200">{{ book.user.name }}</td>
            <td class="px-3 py-2 border-b border-gray-200">{{ book.published_date }}</td>
            <td class="px-3 py-2 border-b border-gray-200">{{ book.description }}</td>
            <td class="px-3 py-2 border-b border-gray-200">{{ book.created_at }}</td>
            <td class="px-3 py-2 border-b border-gray-200">{{ book.updated_at }}</td>
            <td class="px-3 py-2 border-b border-gray-200">
              <div class="flex flex-col sm:flex-row gap-2">
                <Link
                  :href="`/books/${book.id}/edit`"
                  class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 text-xs rounded text-center"
                >
                  Editar
                </Link>
                
                <Link
                  :href="`/books/${book.id}/delete`"
                  class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 text-xs rounded text-center"
                >
                  Eliminar
                </Link>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>


<style scoped>
table {
  border-collapse: collapse;
}
</style>