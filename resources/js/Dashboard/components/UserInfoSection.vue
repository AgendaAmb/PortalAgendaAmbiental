<template>
    <div>
        <h5 class="modal-title3"><b>Datos personales</b></h5>

        <b-form-group id="input-group-1" label="Nivel académico:" label-for="input-0">
            <b-form-select v-model="user.academic_degree" class="mb-1" disabled>
                <b-form-select-option :value="null">Por favor selecciona una opción</b-form-select-option>
                <b-form-select-option value="Bachillerato">Bachillerato</b-form-select-option>
                <b-form-select-option value="Licenciatura">Licenciatura</b-form-select-option>
                <b-form-select-option value="Bachillerato">Maestria</b-form-select-option>
                <b-form-select-option value="Licenciatura">Doctorado</b-form-select-option>
                <b-form-select-option value="Bachillerato">Especialidad</b-form-select-option>
                <b-form-select-option value="Licenciatura">Doctorado</b-form-select-option>
                <b-form-select-option value="Licenciatura">Postdoctorado</b-form-select-option>
                <b-form-select-option value="Licenciatura">Otro</b-form-select-option>
            </b-form-select>
            <b-form-invalid-feedback>
                El nombre contacto no puede estar vacío.
            </b-form-invalid-feedback>
        </b-form-group>

        <b-form-group id="input-group-1" label="Nombre(s):" label-for="input-1">
            <b-form-input id="input-1" placeholder="Nombre(s)" required v-model="user.name" disabled></b-form-input>
        </b-form-group>
        
        <b-form-row>
        
            <b-col>
                <b-form-group id="input-group-1" label="Nombre(s):" label-for="input-1">
                    <b-form-input id="input-1" placeholder="Apellido paterno" required v-model="user.middlename" disabled>
                    </b-form-input>
                </b-form-group>
            </b-col>
        
            <b-col>
                <b-form-group id="input-group-1" label="Nombre(s):" label-for="input-1">
                    <b-form-input id="input-1" placeholder="Apellido materno" required v-model="user.surname" disabled>
                    </b-form-input>
                </b-form-group>
            </b-col>
        
        </b-form-row>
        
        <b-form-group id="input-group-2" label="Correo electrónico:" label-for="input-2">
            <b-form-input id="input-2" placeholder="Correo electrónico" required v-model="user.email" disabled></b-form-input>
        </b-form-group>
        
        <b-form-row v-if="user.user_type != 'externs'">
        
            <b-col>
                <b-form-group id="input-group-1" label="Facultad de adscripción:" label-for="input-1">
                    <b-form-input id="input-1" placeholder="Facultad de adscripción" required v-model="user.dependency"
                        disabled></b-form-input>
                </b-form-group>
            </b-col>
        
            <b-col>
                <b-form-group id="input-group-1" label="Clave única/RPE:" label-for="input-1">
                    <b-form-input id="input-1" placeholder="Clave única/RPE" required v-model="user.id" disabled></b-form-input>
                </b-form-group>
            </b-col>
        
        </b-form-row>
        
        <b-form-group id="input-group-2" label="Teléfono" label-for="input-2">
            <b-form-input id="input-2" placeholder="Teléfono" required v-model="user.phone_number"></b-form-input>
        </b-form-group>
    </div>
</template>

<script>
export default {
    name:'user-info-section',
    props:{
        user: Object
    }
}
</script>
