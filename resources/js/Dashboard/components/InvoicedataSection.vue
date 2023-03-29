<template>
    <div>        
        <h5 class="modal-title3"><b>Datos de facturación</b></h5>
        <b-form-group 
            id="input-group-1" 
            label="Selecciona el método de pago:" 
            label-for="input-0"
            >
            <b-form-select
                v-model="invoice_data.payment_type"
                class="mb-1">
                <b-form-select-option :value="null">Por favor selecciona una opción</b-form-select-option>
                <b-form-select-option value="Ficha_Pago">Ficha de pago</b-form-select-option>
                <b-form-select-option value="Descuento_Nomina">Descuento de nómina</b-form-select-option>
            </b-form-select>
        </b-form-group>

        <b-form-group 
            id="input-group-1" 
            label="¿Requieres factura?:" 
            label-for="input-0"
            >
            <b-form-select
                v-model="invoice_data.required"
                class="mb-1">
                <b-form-select-option :value="null">Por favor selecciona una opción</b-form-select-option>
                <b-form-select-option value="Si">Si</b-form-select-option>
                <b-form-select-option value="No">No</b-form-select-option>
            </b-form-select>
        </b-form-group>

        <div v-if="invoice_data.required == 'Si'">
        <b-form-group 
            id="input-group-1" 
            label="Nombre Completo o razón social" 
            label-for="input-1"
            >
            <b-form-input 
                id="input-1" 
                placeholder="..."
                v-model="invoice_data.name"
                >
            </b-form-input>
        </b-form-group>

        <b-form-row>
            <b-col>
                <b-form-group 
                    id="input-group-1" 
                    label="Domicilio fiscal" 
                    label-for="input-1"
                    >
                    <b-form-input 
                        id="input-1" 
                        placeholder="Domicilio fiscal" 
                        v-model="invoice_data.addr" 
                        >
                    </b-form-input>
                </b-form-group>
            </b-col>
            <b-col>
                <b-form-group 
                    id="input-group-1" 
                    label="RFC" 
                    label-for="input-1">
                    <b-form-input 
                        id="input-1" 
                        placeholder="RFC" 
                        v-model="invoice_data.rfc"
                        >
                    </b-form-input>
                </b-form-group>
            </b-col>
        </b-form-row>

        <b-form-group id="input-group-1" label="Correo electrónico" label-for="input-1">
            <b-form-input id="input-1" placeholder="..." v-model="invoice_data.email">
            </b-form-input>
        </b-form-group>

        <b-form-group id="input-group-1" label="Teléfono" label-for="input-1">
            <b-form-input id="input-1" placeholder="..." v-model="invoice_data.tel">
            </b-form-input>
        </b-form-group>

        </div>
    </div>
</template>

<script>
export default {
    name:'invoicedata-section',
    props:{
        invoice_data: Object
    }
}
</script>
