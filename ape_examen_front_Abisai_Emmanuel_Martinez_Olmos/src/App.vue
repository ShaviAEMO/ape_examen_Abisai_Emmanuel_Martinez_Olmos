<template>
  <div>
    <tabla_usuarios :usuarios="usuarios" />
  </div>
</template>


<script>
import TablaUsuarios from './components/tabla_usuarios/Tabla_usuarios.vue';
import axios from 'axios';

export default {
  components: {
    tabla_usuarios: TablaUsuarios
  },
  data() {
    return {
      usuarios: []
    };
  },
  created() {
    this.obtenerUsuarios();
  },
  methods: {
    obtenerUsuarios() {
      axios.get('http://localhost:8000/api/users')
          .then(response => {
            this.usuarios = response.data;
          })
          .catch(error => {
            console.error(error);
          });
    }
  }
};
</script>

