import Vue from 'vue';
import {BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue';
import JsonExcel from "vue-json-excel";

Vue.component("downloadExcel", JsonExcel);
Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);

new Vue({
    el: '#app',
    data() {
      return {
        items: users,
        filteredItems: users,
        fields: [
          { key: 'actions', label: 'Acciones' },
          { key: 'workshop', label: 'Curso/Taller/Evento', sortable: true, sortDirection: 'desc' },
          { key: 'name', label: 'Nombre', sortable: true},
          { key: 'curp', label: 'Curp' },
          { key: 'gender', label: 'Genero' },
          { key: 'email', label: 'Correo' },
          { key: 'tel', label: 'Teléfono' },
          { key: 'created_at', label: 'Fecha de registro al portal'}
        ],
        excel_export_fields: {
          "Curso/Taller/Evento":"workshop",
          "Nombre completo": "name",
          "CURP":"curp",
          "Género":"gender",
          "Email":"email",
          "Teléfono":"tel",
          "Fecha de registro al portal":"created_at"
        },
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
        },
        // ! Datos para el form de correos
        Correos:[],
        receiverList: [],
        emailForm:{'cc': null, 'subject': null, 'content':null},
        senderEmail: null,
        receiver: null,
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
      console.log("hola")
      // Set the initial number of items
      this.totalRows = this.items.length;
      this.cargarModulos();
    },
    methods: {
      async fetchData(){
        return this.filteredItems;
      },
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
        this.filteredItems = filteredItems
        console.log(this.filteredItems)
        this.totalRows = filteredItems.length
        this.currentPage = 1
      },
      enviarCorreo:function(){
        const formData = new FormData();
        formData.append('idUsuarioEnvio','{{Auth::user()->id}}');
        formData.append('CorreoRemitente',this.CorreoRemitente.email);
        formData.append('Destinatario',this.Destinatario);
        formData.append('Asunto',this.Asunto);
        formData.append('Contenido',this.Contenido);

        axios({
          method: 'post',
          url: '/sendEmail',
          data: formData,
          headers: {
              'Content-Type': 'multipart/form-data'
          }
        }).then(
          res => {
            console.log("Exito")
          }
        ).catch(
          err => {
            console.log("Falso")
          }
        )
      },
      cargarModulos:function(){
        axios.get('/api/getAllModules').then(res => {
            // ! Preprocesar la info
            let modulos = res.data.modulos;
            let correos = res.data.Correos;
            let workshops = res.data.workshop;
            
            this.Correos.push({value: null, text: 'Por favor selecciona una opción'});
            correos.forEach(element => {
              this.Correos.push({value: element['email'], text: element['email'] })
            });

            this.receiverList.push({value: null, text: 'Por favor selecciona una opción'});

            modulos.forEach(element => {
              this.receiverList.push({value: element['name'], text: element['name'] })
            });
            
            workshops.forEach(element => {
              this.receiverList.push({value: element['name'], text: element['name'] })
            });
            
            console.log(this.Correos);
        })
      },
    }
});