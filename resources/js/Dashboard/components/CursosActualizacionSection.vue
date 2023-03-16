<template>
    <div>
        <h5 class="modal-title3"><b>Cursos de Actualización</b></h5>
        
        <b-form-group 
            label="Seleccione el curso que se desea registrar" 
            >
            <b-form-checkbox-group 
                v-model="cursos_actualizacion_data" 
                :options="[
                  { text: 'Desarrollos regionales y economía', value: 'dre' },
                  { text: 'Ecología urbana y paisaje', value: 'eup' },
                  { text: 'Gobernanza y participación', value: 'gopa' },
                  { text: 'Temas selectos contaminación del aire', value: 'tsca' }
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
    name:'cursos-actualizacion-section',
    props:{
        cursos_actualizacion_data: Object,
        cursos_act:Object
    }
}
</script>
