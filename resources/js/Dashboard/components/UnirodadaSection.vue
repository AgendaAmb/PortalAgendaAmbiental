<template>
    <div>
        <h5 class="modal-title3"><b>Datos de uniruta</b></h5>

        <h5 style="color:115089" class="modal-title3">- Contacto de emergencia</h5>

        <b-form-group id="input-group-2" label="Nombre del contacto"
            label-for="input-2">
            <b-form-input id="input-2" placeholder="Nombre" required v-model="unirodada_data.contact_name"></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" label="Teléfono de contacto"
            label-for="input-2">
            <b-form-input id="input-2" placeholder="Numero de teléfono" required v-model="unirodada_data.contact_tel"></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" label="Grupo Ciclista"
            label-for="input-2">
            <b-form-input id="input-2" placeholder="Grupo ciclista" required v-model="unirodada_data.group"></b-form-input>
        </b-form-group>

        <h5 style="color:115089" class="modal-title3">- Información de salud</h5>

        <b-form-group 
            label="Condición de salud" 
            >
            <b-form-group>
                <b-form-radio v-model="unirodada_data.health_condition" name="some-radios" value="Excelente">Excelente
                </b-form-radio>
                <b-form-radio v-model="unirodada_data.health_condition" name="some-radios" value="Buena">Buena
                </b-form-radio>
                <b-form-radio v-model="unirodada_data.health_condition" name="some-radios" value="Mala">Mala
                </b-form-radio>
            </b-form-group>
        </b-form-group>
    </div>
</template>

<script>
export default {
    name:'unirodada-section',
    props:{
        unirodada_data: Object
    }
}
</script>
