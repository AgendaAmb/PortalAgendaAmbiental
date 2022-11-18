import Vue from 'vue';
import {BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue';

Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);

new Vue({
    el: '#app',
    data() {
      return {
        items: users,
        fields: [
          { key: 'actions', label: 'Acciones' },
          { key: 'workshop', label: 'Curso/Taller/Evento', sortable: true, sortDirection: 'desc' },
          { key: 'name', label: 'Nombre', sortable: false},
          { key: 'curp', label: 'Curp' },
          { key: 'tel', label: 'Teléfono' },
          { key: 'envio', label: 'Enviado' },
          { key: 'pago', label: 'Pago' },
          { key: 'factura', label: 'Factura' }
        ],
        totalRows: 1,
        currentPage: 1,
        perPage: 20,
        pageOptions: [20, 30],
        sortBy: '',
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        filterOn: [],
        infoModal: {
          id: 'info-modal',
          title: '',
          content: ''
        }
      }
    },
    computed: {
      sortOptions() {
        // Create an options list from our fields
        return this.fields
          .filter(f => f.sortable)
          .map(f => {
            return { text: f.label, value: f.key }
          })
      }
    },
    mounted() {
      // Set the initial number of items
      this.totalRows = this.items.length;
    },
    methods: {
      info(item, index, button) {
        this.infoModal.title = `Row index: ${index}`
        this.infoModal.content = JSON.stringify(item, null, 2)
        this.$root.$emit('bv::show::modal', this.infoModal.id, button)
      },
      resetInfoModal() {
        this.infoModal.title = ''
        this.infoModal.content = ''
      },
      onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      }
    }
});