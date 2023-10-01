<template>
      <div>
    <h5 class="modal-title3"><b>Información del Foro "Presa San José"</b></h5>
    <b-form-group label="Asistir a:"
            >
            <b-form-checkbox-group 
                v-model="foro_data.options" 
                :options="[
                  { text: 'Ponencias', value: 'pon' },
                  { text: 'Mesa de diálogo', value: 'mesdiag' },
                  { text: 'Todo el evento', value: 'all' }
                ]" 
                name="flavour-2a"
                stacked
                >
            </b-form-checkbox-group>
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
  