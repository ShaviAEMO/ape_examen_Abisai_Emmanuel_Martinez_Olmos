<template>
  <div>
    <table>
      <thead>
      <tr>
        <th>Nombre de usuario</th>
        <th>Fecha de nacimiento</th>
        <th>Edad</th>
        <th>Dirección</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="usuario in usuarios" :key="usuario.id">
        <td>{{ usuario.name }}</td>
        <td>{{ usuario.birthdate }}</td>
        <td>{{ usuario.age }}</td>
        <td>{{ usuario.domicilio + ' ' + usuario.numero_exterior + ' ' + usuario.colonia
        + ' ' + usuario.cp + ' ' + usuario.ciudad  }}</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: {
    usuarios: {
      type: Array,
      required: true
    }
  },
};
</script>




