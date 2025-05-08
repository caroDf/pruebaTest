<script setup>
import { Head } from '@inertiajs/vue3';
import axios from 'axios';

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
</script>

<template>
    <Head title="Books" />
    <div class="p-4">
      <h1 class="text-2xl font-bold mb-4">Books</h1>
      <table class="min-w-full border border-gray-300">
        <thead class="bg-gray-200">
          <tr>
            <th v-for="header in headers" :key="header" class="px-4 py-2 border">{{ header }}</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="book in books" :key="book.id" class="hover:bg-gray-100">
            <td class="px-4 py-2 border">{{ book.id }}</td>
            <td class="px-4 py-2 border">{{ book.title }}</td>
            <td class="px-4 py-2 border">{{ book.author.name }}</td>
            <td class="px-4 py-2 border">{{ book.genre.name }}</td>
            <td class="px-4 py-2 border">{{ book.user.name }}</td>
            <td class="px-4 py-2 border">{{ book.published_date }}</td>
            <td class="px-4 py-2 border">{{ book.description }}</td>
            <td class="px-4 py-2 border">{{ book.created_at }}</td>
            <td class="px-4 py-2 border">{{ book.updated_at }}</td>
          </tr>
        </tbody>
      </table>
    </div>

</template>

  
<style scoped>
  table {
    border-collapse: collapse;
  }
</style>
  