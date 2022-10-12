<template>
    <b-modal
        id="modal-template" 
        size="lg" 
        title="Registro" 
        scrollable
        centered
        hide-backdrop
        no-close-on-backdrop
        header-bg-variant="light" 
        footer-bg-variant="light" 
        button-size="sm"
        content-class="shadow"
        >
            <template #modal-header="{ close }">
                <h4 class="modal-title" style="color:115089"><b>Registro {{ ws.name }}</b></h4>
                <b-button size="sm" variant="outline-danger rounded" @click="close()">
                    <b-icon icon="x-circle" scale="2"></b-icon>
                </b-button>
            </template>

            <template #modal-footer="{}">
                <b-button
                    v-if="!isRegistering"
                    type="submit" 
                    size="sm" 
                    variant="success"
                    @click="onSubmit()"
                    >
                    Registrarme
                </b-button>
                <b-button v-if="isRegistering"
                    size="sm" 
                    variant="success" 
                    disabled
                    >
                    <b-spinner small type="grow"></b-spinner>
                    Registrando...
                </b-button>
            </template>

        <div>
            <b-form>
                <user-info-section v-bind:user="user"></user-info-section>
                <hr>
                <slot name="event-form-data"></slot>
                <hr>
                <invoicedata-section v-if="ws.payment_required == 1" v-bind:invoice_data="invoice_data"></invoicedata-section>
                <hr v-if="ws.payment_required == 1">
                <statistics-section v-bind:estadistic_data="estadistic_data"></statistics-section>
            </b-form>
        </div>
    </b-modal>
</template>

<script>
import StatisticsSection from './StatisticsSection.vue'
import UserInfoSection from './UserInfoSection.vue'
import InvoicedataSection from './InvoicedataSection.vue'

export default {
    name:'modal-template',
    components: {
        StatisticsSection: StatisticsSection,
        UserInfoSection: UserInfoSection,
        InvoicedataSection: InvoicedataSection
    },
    data() {
        return {
            isRegistering: false
        }
    },
    props:{
        ws: Object,
        estadistic_data: Object,
        user: Object,
        invoice_data: Object
    },
    methods: {
        onSubmit(){
            this.isRegistering = true;
            this.$parent.registerEvent(this.$props.ws);
            this.isRegistering = false;
            this.$bvModal.hide('modal-template');
        },
    }
}
</script>
