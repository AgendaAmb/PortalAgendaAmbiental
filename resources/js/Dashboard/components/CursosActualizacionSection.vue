<template>
  <div>
    <h5 class="modal-title3"><b>Información cursos de actualización</b></h5>
    <b-form-checkbox-group
      :options="cursosOptions"
      name="flavour-2a"
      stacked
      v-model="cursos_actualizacion_data.cursos"
    ></b-form-checkbox-group>
  </div>
</template>

<script>
export default {
  name: "cursos-actualizacion-section",
  props: {
    cursos_actualizacion_data: Object,
    cursos_act: Object
  },
  data() {
    return {
      cursosOptions: []
    };
  },
  methods: {
    ChecarCursos() {
      const opciones = [];
      for (const key in cursos_act) {
        if (cursos_act.hasOwnProperty(key)) {
          const curso = cursos_act[key];
          // Verificamos que curso sea un objeto
          if (typeof curso === 'object' && curso !== null) {
              opciones.push({
                text: curso.name,
                value: curso.id
              });
            
          }
        }
      }
      return opciones;
    }
  },
  mounted() {
    this.cursosOptions = this.ChecarCursos();
  },
};
</script>
