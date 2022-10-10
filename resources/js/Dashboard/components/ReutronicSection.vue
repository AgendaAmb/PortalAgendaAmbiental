<template>
    <div>
        <h5 class="modal-title3"><b>Información Reutronic</b></h5>
        
        <b-form-group id="input-group-1" label="¿Ha solicitado material Reutronic previamente?" label-for="input-0">
            <b-form-select v-model="reutronic_data.prev" class="mb-3">
                <b-form-select-option :value="null">Por favor selecciona una opción</b-form-select-option>
                <b-form-select-option value="Si">Si</b-form-select-option>
                <b-form-select-option value="No">No</b-form-select-option>
            </b-form-select>
        </b-form-group>
        
        <b-form-group id="input-group-2"
            label="Material electrónico y/o mecánico que requiere"
            label-for="textarea1">
            <b-form-textarea id="textarea1" v-model="reutronic_data.material" placeholder="Escribe aqui..." rows="3" max-rows="3"></b-form-textarea>
        </b-form-group>

        <b-form-group id="input-group-2"
            label="Características y observaciones del material que requiere"
            label-for="textarea2">
            <b-form-textarea id="textarea2" v-model="reutronic_data.specs" placeholder="Escribe aqui..." rows="3" max-rows="3"></b-form-textarea>
        </b-form-group>
        
        <b-form-group id="input-group-2"
            label="¿Que úso le dará al material?"
            label-for="textarea3">
            <b-form-textarea id="textarea3" v-model="reutronic_data.reason" placeholder="Escribe aqui..." rows="3" max-rows="3"></b-form-textarea>
        </b-form-group>
    </div>
</template>

<script>
export default {
    name:'reutronic-section',
    props:{
        reutronic_data: Object
    }
}
</script>
