<template>
    <div>
        <h5 class="modal-title3"><b>Cursos de Actualización</b></h5>
        
        <b-form-group 
            label="Seleccione los curso(s) que se desea registrar" 
            >
            <b-form-checkbox-group 
                v-model="cursos_actualizacion_data" 
                :options="[
                  { text: 'Recursos ecónomicos y de gestión para la sostenibilidad', value: 'recursos_eco' },
                  { text: 'Reglamento e instituciones ambientales', value: 'reglamento_ins' },
                  { text: 'Sistema de ciudad y metabolismo urbano', value: 'sistema_ciu' }
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
        cursos_actualizacion_data: Object
    }
}
</script>
