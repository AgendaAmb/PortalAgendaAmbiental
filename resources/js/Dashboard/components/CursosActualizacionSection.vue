<template>
    <div>
        <b-form-checkbox-group
            v-model="cursos_actualizacion_data"
            :options="cursos"
            name="flavour-2a"
            stacked
        >
        </b-form-checkbox-group>
        <p>Seleccionado: {{ cursos_actualizacion_data }}</p>
    </div>
</template>

<script>
export default {
    name:'cursos-actualizacion-section',
    props:{
        cursos_actualizacion_data: []
    },
    data() {
        return {
            cursos: [
                { text: "Desarrollos regionales y economía", value: "dre" },
                { text: "Ecología urbana y paisaje", value: "eup" },
                { text: "Gobernanza y participación", value: "gopa" },
                { text: "Temas selectos contaminación del aire",value: "tsca",},
            ],
        };
    },
};
</script>
