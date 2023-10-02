<template>
      <div>
    <h5 class="modal-title3"><b>Información del Foro "Presa San José"</b></h5>
    <b-form-group label="Asistir a:">
  <b-form-radio-group v-model="foro_data.options" name="flavour-2a" stacked>
    <b-form-radio value="pon">Ponencias</b-form-radio>
    <b-form-radio value="mesdiag">Mesa de diálogo</b-form-radio>
    <b-form-radio value="all">Todo el evento</b-form-radio>
  </b-form-radio-group>
</b-form-group>

  </div>
</template>
  
  <script>
  export default {
    name: "foro-section",
    props: {
    foro_data: Object,
  },
  };
  </script>
  