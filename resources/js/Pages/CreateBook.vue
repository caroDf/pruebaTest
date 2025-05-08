<script setup>
import { Head, useForm } from '@inertiajs/vue3'

defineProps({
  authors: Array,
  genres: Array
})


const form = useForm({
  title: '',
  description: '',
  published_date: '',
  genre_id: '',
  author_id: '',
})

const submit = () => {
  form.post('/formbooks/create')
}
</script>

<template>
  <Head title="Create Book" />
  <div class="p-4">
    <h1 class="text-2xl font-bold mb-4">Create book</h1>

    <form @submit.prevent="submit" class="space-y-4">
      <input v-model="form.title" placeholder="Título" class="border p-2 w-full" />
      <input v-model="form.description" placeholder="Descripción" class="border p-2 w-full" />
      <input type="number" v-model="form.published_date" min="1000" max="9999" placeholder="Año de publicación" class="border p-2 w-full" />

      <select v-model="form.genre_id" class="border p-2 w-full">
        <option value="">Selecciona un género</option>
        <option v-for="genre in genres" :key="genre.id" :value="genre.id">
            {{ genre.name }}
        </option>
      </select>
      <select v-model="form.author_id" class="border p-2 w-full">
        <option value="">Selecciona un autor</option>
        <option v-for="author in authors" :key="author.id" :value="author.id">
            {{ author.name }}
        </option>
      </select>

      <button type="submit" class="bg-blue-500 text-white px-4 py-2">Crear libro</button>
    </form>

    <!-- Mostrar errores si los hay -->
    <!-- <div v-if="form.hasErrors" class="text-red-500 mt-4">
      <div v-for="(message, key) in form.errors" :key="key">{{ message }}</div>
    </div> -->
  </div>
</template>
