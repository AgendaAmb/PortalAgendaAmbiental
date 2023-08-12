<template>
    <div>
        <h5 class="modal-title3"><b>Información estadística</b></h5>

        <b-form-group id="input-group-1" label="¿Has asistido a cursos ó talleres en la Agenda Ambiental?:"
            label-for="input-0">
            <b-form-select v-model="estadistic_data.isAsistencia" class="mb-1">
                <b-form-select-option :value="null">Por favor selecciona una opción</b-form-select-option>
                <b-form-select-option value="Si">Si</b-form-select-option>
                <b-form-select-option value="No">No</b-form-select-option>
            </b-form-select>
        </b-form-group>

        <b-form-group v-if="estadistic_data.isAsistencia == 'Si'" id="input-group-1" label="¿A cúales?" label-for="input-1">
            <b-form-input id="input-1" placeholder="..." v-model="estadistic_data.assisted_to">
            </b-form-input>
        </b-form-group>

        <b-form-group id="input-group-1" label="¿Te interesaria seguir participando en actividades de la Agenda Ambiental?"
            label-for="input-0">
            <b-form-select v-model="estadistic_data.insterested_on_events" class="mb-1">
                <b-form-select-option :value="null">Por favor selecciona una opción</b-form-select-option>
                <b-form-select-option value="Si">Si</b-form-select-option>
                <b-form-select-option value="No">No</b-form-select-option>
            </b-form-select>
        </b-form-group>

        <b-form-group id="input-group-2" label="Comentarios o sugerencias" label-for="input-2">
            <b-form-textarea v-model="estadistic_data.comments" id="textarea" placeholder="..." rows="3" max-rows="6">
            </b-form-textarea>
        </b-form-group>
    </div>
</template>

<script>
export default {
    name: 'statistics-section',
    props: {
        estadistic_data: Object
    },
    methods: {
    }
}
</script>
