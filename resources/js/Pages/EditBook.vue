<script setup>
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  book: Object,
  authors: Array,
  genres: Array
})

const form = useForm({
  title: props.book.title,
  description: props.book.description,
  published_date: props.book.published_date,
  genre_id: props.book.genre.id,
  author_id: props.book.author.id,
})


function submit() {
  form.put(route('books.update', props.book.id))
}

</script>

<template>
    <Head title="Editar Libro" />

      <div class="max-w-3xl mx-auto mt-20">
        <div class="bg-white rounded-lg p-8 shadow">
          <h2 class="text-2xl font-bold text-center mb-6">Editar Libro</h2>
  
          <form @submit.prevent="submit" class="space-y-4">
            <div>
              <label class="block mb-1">Título</label>
              <input v-model="form.title" type="text" class="border p-2 w-full rounded" />
            </div>
  
            <div>
              <label class="block mb-1">Descripción</label>
              <textarea v-model="form.description" class="border p-2 w-full rounded"></textarea>
            </div>
  
            <div>
              <label class="block mb-1">Año de publicación</label>
              <input v-model="form.published_date" type="number" class="border p-2 w-full rounded" />
            </div>
  
            <div>
              <label class="block mb-1">Género</label>
              <select v-model="form.genre_id" class="border p-2 w-full rounded">
                <option v-for="genre in props.genres" :key="genre.id" :value="genre.id">{{ genre.name }}</option>
              </select>
            </div>
  
            <div>
              <label class="block mb-1">Autor</label>
              <select v-model="form.author_id" class="border p-2 w-full rounded">
                <option v-for="author in props.authors" :key="author.id" :value="author.id">{{ author.name }}</option>
              </select>
            </div>
  
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded w-full">
              Guardar
            </button>
          </form>
        </div>
      </div>

</template>