import {BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue';
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import ModalTemplate from './components/ModalTemplate.vue';
import UnitruequeSection from './components/UnitruequeSection.vue';
import ReutronicSection from './components/ReutronicSection.vue';
import CursosActualizacionSection from './components/CursosActualizacionSection.vue';
import UnirutaSection from './components/UnirutaSection.vue';

window.Vue = require('vue').default

Vue.use(VueToast);
Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);

const app = new Vue({
    el: '#app',
    components: {
        ModalTemplate: ModalTemplate,
        UnitruequeSection: UnitruequeSection,
        ReutronicSection: ReutronicSection,
        CursosActualizacionSection: CursosActualizacionSection,
        UnirutaSection: UnirutaSection
    },
    data: {
        // UI
        user: user,
        spinner: false,
        dismissSecs: 5,
        dismissCountDown:0,
        toastCount: 0,
        // Pass
        src_img: base_img,
        type: user_type,    //tipo del usario autentificado
        modal: modal,       //abrir modal de redirección
        url: url,           //url del app definida en el .env
        modules: modulos,
        user_workshops: user_workshops,
        workshops: workshops,
        noreg_workshops: noreg_workshops,
        ejes: ejes,
        boxTwo: '',
        uwss: new Array(),
        // * UNIRODADAS
        contact_name:'',
        contact_tel:'',
        group:'',
        health_condition:null,
        // * MODALES EN GENERAL
        interested:null,
        confirm:'',
        selected: null,
        academicData: {name: null},
        // * FORMS
        invoice_data:{required:null, name:'', addr:'', rfc:'', email:'', tel:''},
        unitrueque_data:{material:'', unidad:1, isMobiliario:null, empresa:''},
        reutronic_data:{prev: null,material:'', specs:'', reason:''},
        estadistic_data:{isAsistencia:null, assisted_to:'', insterested_on_events:null, comments:''},
        cursos_actualizacion_data: null,
        uniruta_data:{health_condition: null, contact_name: '', contact_tel:''}
    },
    mounted() {
        this.getCalendarEventDays();
        this.getToday();
        // console.log(this.user);
    },
    computed: {
        emptyName() {
            return this.contact_name.length > 0;
        },
        emptyTel() {
            return this.contact_tel.length > 0;
        },
        emptyHC() {
            return this.health_condition != null;
        },
        emptyInterested() {
            return this.interested != null;
        },
        emptyConfirm() {
            return this.confirm == true;
        },
        spinning() {
            return this.spinner;
        },
        // Validaciones de formulario   
        valSpinner(){
            return !(this.emptyName && this.emptyTel && this.emptyHC && this.emptyInterested && this.emptyConfirm)
        }
    },
    methods: {
        showToast(message, type){
            Vue.$toast.open({
                message: message,
                type: type,
                position: 'top-right'
            });
        },
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown
        },
        showAlert() {
            this.dismissCountDown = this.dismissSecs
        },
        getToday(){
            let today = new Date();
            return today.toISOString().split('T')[0];
        },
        // Funcion para obtener las fechas de los eventos
        getCalendarEventDays(){
            const d = new Date();
            let day = d.getDate();
        },
        // ! De momento las fechas son manuales
        dateClass(ymd, date) {

            if(ymd == '2022-09-09' | ymd == '2022-09-10'){
                return 'table-success'
            }

            return ''
        },
        // Inicializador de modales de registro
        openRegisterModal:function(ws){
            let SPECIAL_UNIRODADA_EVENT = 23;
            let UNITRUEQUE = 10;
            let CURSOS_DE_ACTUALIZACION = [16,17,18];
            let UNIRUTA_CP = 39;

            // * Curso seleccionado, para cargar la configuración del modal
            this.selected = ws;

            try{
                if(!ws.registered){
                    if(ws.id == SPECIAL_UNIRODADA_EVENT){
                        this.showModal(ws,modal-unitrueque)
                    }if(ws.id == UNITRUEQUE){
                        this.showModal(ws,'modal-template')
                    }else{
                        this.showRegisterMsgBox(ws);
                    }
                }else{
                    this.showRegisteredMsgBox(ws);
                }
            }catch (error){
                console.error(error);
            }
        },
        // Simple modal para registro de evento 
        showRegisterMsgBox:function(ws) {
            this.boxTwo = ''
            this.$bvModal.msgBoxConfirm('¿Deseas registrar tu asistencia al evento: ' + ws.name + '?', {
                title: 'Registro de evento',
                size: 'sm',
                buttonSize: 'sm',
                okVariant: 'success',
                cancelVariant: 'danger',
                okTitle: 'Registrarme',
                cancelTitle: 'Cancelar',
                footerClass: 'p-2',
                hideHeaderClose: false,
                centered: true,
                hideBackdrop: true,
            }).then(value => {
                if(value){
                    this.registerEvent(ws);
                }
            }).catch(err => {
            // An error occurred
            })
        },
        // Simple modal de evento ya registrado
        showRegisteredMsgBox:function(ws){
            this.boxTwo = ''
            this.$bvModal.msgBoxOk('Ya te encuentras registrado al evento', {
                title: 'Confirmación',
                size: 'sm',
                buttonSize: 'sm',
                okVariant: 'success',
                okTitle: 'Cerrar',
                headerClass: 'p-2 border-bottom-0',
                footerClass: 'p-2 border-top-0',
                centered: true,
                hideBackdrop: true
            })
            .then(value => {
                this.boxTwo = value;
            })
            .catch(err => {
                // An error occurred
            })
        },
        //* Registro de evento simple
        registerEvent:function(ws){
            let headers = {
                'Content-Type': 'application/json;charset=utf-8'
            };
            let data = {
                "ws_id": ws.id,
                "ws_name": ws.name
            };
            axios.post(this.url+'WorkshopUserRegister',data).then(response => (
                // Actualizar datos UI
                this.user_workshops.push(ws), 
                this.uwss = this.uwss.filter(function(element){
                    return element != ws;
                }),
                
                this.workshops.forEach(i => {
                    if(i.id == ws.id){
                        i['registered'] = true; //Actualizar bandera
                        ws['registered'] = true;
                    }
                }),

                this.toastCount++,
                this.$bvToast.toast(`This is toast number ${this.toastCount}`, {
                    title: 'Curso registrado',
                    autoHideDelay: 5000,
                    appendToast: false
                })
                
            )).catch((err) => {
                alert(err.data),
                console.log(err)
                // An error occurred
            })
        },
        //* Registro de unirodada
        registerEventUnirodada:function(){
            // Spinning button
            this.spinner = true;

            let headers = {
                'Content-Type': 'application/json;charset=utf-8'
            };
            
            var data = {
                "ws_id": this.selected.id,
                "ws_name": this.selected.name,
                "contact_name": this.contact_name,
                "contact_tel": this.contact_tel,
                "group": this.group,
                "health_condition": this.health_condition,
                "interested": this.interested=='yes'?true:false,
            };

            axios.post(this.url+'WorkshopUnirodadaUserRegister',data).then(response => (
                
                console.log(response.data),

                this.spinner = false,

                // Actualizar datos UI
                // this.showAlert(),
                this.$bvModal.hide('modal-unirodada'),

                this.user_workshops.push(this.selected), 
                this.uwss = this.uwss.filter(function(element){
                    return element.id != 23;
                }),
                
                this.workshops.forEach(i => {
                    if(i.id == this.selected.id){
                        i['registered'] = true; //Actualizar bandera
                        this.selected['registered'] = true;
                    }
                })	
                
            )).catch((err) => {
                console.log(err.data);
            })
        },
        showModal:function(ws, modal_name ) {
            // Selected workshop
            this.$root.$emit('bv::show::modal', modal_name, '#btnShow')
        },
        onSubmit:function() {
            if(this.emptyName && this.emptyTel && this.emptyHC && this.emptyInterested && this.emptyConfirm){
                this.spinner = true;
            }else{
                console.log("Error");
            }

        }
    }
});