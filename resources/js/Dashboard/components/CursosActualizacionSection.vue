<template>
    <div>
        <h5 class="modal-title3"><b>Cursos de Actualización</b></h5>

        <b-form-group label="Seleccione los cursos que desea registrar">
            <b-form-checkbox-group v-model="cursos_actualizacion_data" :options="cursos" name="flavour-2a" stacked>
            </b-form-checkbox-group>
            <p>Seleccionado: {{ cursos_actualizacion_data }}</p>
        </b-form-group>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cursos_actualizacion_data: [],
            cursos: [
                { text: 'Desarrollos regionales y economía', value: 'dre' },
                { text: 'Ecología urbana y paisaje', value: 'eup' },
                { text: 'Gobernanza y participación', value: 'gopa' },
                { text: 'Temas selectos contaminación del aire', value: 'tsca' }
            ]
        }
    },
    methods: {
        getValues() {
            console.log(this.cursos_actualizacion_data);
            return this.cursos_actualizacion_data;
        }
    }
}
</script>
