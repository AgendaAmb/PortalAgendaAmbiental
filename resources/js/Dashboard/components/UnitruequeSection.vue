<template>
    <div>
        <h5 class="modal-title3"><b>Información unitrueque</b></h5>
        
        <b-form-group id="input-group-2"
            label="Material(es), artículo(s), sustancia(s) o servicio(s) a intercambiar" label-for="input-2">
            <b-form-input id="input-2" placeholder="..." required v-model="unitrueque_data.material"></b-form-input>
        </b-form-group>
        
        <b-form-row>
            <b-col>
                <b-form-group id="input-group-1" label="¿Lleva mobiliario?:" label-for="input-0">
                    <b-form-select v-model="unitrueque_data.isMobiliario" class="mb-3">
                        <b-form-select-option :value="null">Por favor selecciona una opción</b-form-select-option>
                        <b-form-select-option value="Si">Si</b-form-select-option>
                        <b-form-select-option value="No">No</b-form-select-option>
                    </b-form-select>
                </b-form-group>
            </b-col>
            <b-col>
                <b-form-group id="input-group-1" label="Cantidad aproximada (indicar unidad):"
                    label-for="input-1">
                    <b-form-input id="input-1" placeholder="Numero de unidades" required v-model="unitrueque_data.unidad">
                    </b-form-input>
                </b-form-group>
            </b-col>
        </b-form-row>
        
        <b-form-group id="input-group-2"
            label="Nombre de empresa, tienda, colectivo o asociación que participa en el trueque (en caso de tener)"
            label-for="input-2">
            <b-form-input id="input-2" placeholder="..." required v-model="unitrueque_data.empresa"></b-form-input>
        </b-form-group>
    </div>
</template>

<script>
export default {
    name:'unitrueque-section',
    props:{
        unitrueque_data: Object
    }
}
</script>
