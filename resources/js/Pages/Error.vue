<template>
  <LaraDashLayout>
      <Head title="Error :("/>
        <h2 class="text-gray-600 dark:text-white">{{ title }}</h2>
        <div class="text-gray-700 dark:text-gray-300">{{ description }}</div>
  </LaraDashLayout>
</template>

<script>
import LaraDashLayout from '@/Layouts/Laradash'
import { Head } from '@inertiajs/inertia-vue3';
export default {
  components: {
      LaraDashLayout,
      Head
  },
  props: {
    status: Number,
  },
  computed: {
    title() {
      return {
        503: '503: Servicio no disponible',
        500: '500: Error del Servidor',
        404: '404: Página no encontrada',
        403: '403: Prohibido',
      }[this.status]
    },
    description() {
      return {
        503: 'Lo sentimos, estamos haciendo un mantenimiento. Por favor, revise luego.',
        500: 'Vaya, algo salió mal en nuestros servidores.',
        404: 'Lo sentimos, no se pudo encontrar la página que está buscando.',
        403: 'Lo sentimos, no tiene permiso para acceder a esta página.',
      }[this.status]
    },
  },
}
</script>
