import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue';
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import ModalTemplate from './components/ModalTemplate.vue';
import UnitruequeSection from './components/UnitruequeSection.vue';
import ReutronicSection from './components/ReutronicSection.vue';
import CursosActualizacionSection from './components/CursosActualizacionSection.vue';
import UnirutaSection from './components/UnirutaSection.vue';
import MiniRodadaSection from './components/MiniRodadaSection.vue';
import UnirodadaSection from './components/UnirodadaSection.vue';

window.Vue = require('vue').default

Vue.use(VueToast);
Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);
Vue.component('minirodada-section', MiniRodadaSection);
Vue.component('unirodada-section', UnirodadaSection);

const app = new Vue({
    el: '#app',
    components: {
        ModalTemplate: ModalTemplate,
        UnitruequeSection: UnitruequeSection,
        ReutronicSection: ReutronicSection,
        CursosActualizacionSection: CursosActualizacionSection,
        UnirutaSection: UnirutaSection,
        MiniRodadaSection: MiniRodadaSection,
        UnirodadaSection: UnirodadaSection,
    },
    data: {
        // UI
        user: user,
        is_ce,
        spinner: false,
        // Pass
        modal: modal,       //abrir modal de redirección
        url: url,           //url del app definida en el .env
        modules: Modulos,
        user_workshops: user_workshops,
        workshops: workshops,
        noreg_workshops: noreg_workshops,
        cursos_act: cursos_act,
        ejes: ejes,
        boxTwo: '',
        uwss: new Array(),
        // * UNIRODADAS
        contact_name: '',
        contact_tel: '',
        group: '',
        health_condition: null,
        // * MODALES EN GENERAL
        interested: null,
        confirm: '',
        selected: null,
        academicData: { name: null },
        // * FORMS
        invoice_data: { required: null, name: '', addr: '', rfc: '', email: '', tel: '', payment_type: null },
        unitrueque_data: { material: '', unidad: '', isMobiliario: '', empresa: '' },
        reutronic_data: { prev: null, material: '', specs: '', reason: '' },
        estadistic_data: { isAsistencia: null, assisted_to: '', insterested_on_events: null, comments: '' },
        uniruta_data: { health_condition: null, contact_name: '', contact_tel: '' },
        minirodada_data: {
            kids: [{ name: '', age: '' }],
            kidslength: 1,
        },
        unirodada_data: { health_condition: null, contact_name: '', contact_tel: '', group: '' },
        cursos_actualizacion_data: [],
    },
    mounted() {
        this.getCalendarEventDays();
        this.getToday();
        // console.log(this.user);
    },
    methods: {
        actualizarDatos() {
            // Actualizar datos aquí
            this.$forceUpdate(); // Forzar la actualización de la vista
        },

        showToast(message, type) {
            Vue.$toast.open({
                message: message,
                type: type,
                position: 'top-right'
            });
        },
        getToday() {
            let today = new Date();
            return today.toISOString().split('T')[0];
        },
        // Funcion para obtener las fechas de los eventos
        getCalendarEventDays() {
            const d = new Date();
            let day = d.getDate();
        },
        // ! De momento las fechas son manuales
        dateClass(ymd, date) {

            if (ymd == '2023-09-09' | ymd == '2023-09-10') {
                return 'table-success'
            }

            return ''
        },
        // Inicializador de modales de registro
        openRegisterModal: function (ws) {
            // * Curso seleccionado, para cargar la configuración del modal
            this.selected = ws;
            console.log("tipo: ", this.selected.type);
            try {
                if (!ws.registered) {
                    this.$root.$emit('bv::show::modal', 'modal-template', '#btnShow');
                } else {
                    this.showRegisteredMsgBox(ws);
                }
            } catch (error) {
                this.showToast('Error al mostrar modal', 'Error');
                console.error(error);
            }
        },
        // * Simple modal (si/no) para registro de evento simple 
        showRegisterMsgBox: function (ws) {
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
                if (value) {
                    this.registerEvent(ws);
                }
            }).catch(err => {
                // An error occurred
            })
        },
        // Simple modal de evento ya registrado
        showRegisteredMsgBox: function (ws) {
            if (ws.type == 'minirodada') {
                this.boxTwo = ''
                this.$bvModal.msgBoxOk('Por favor, descarga, completa y entrega el día del evento, el formato adjunto, esto es para cada participante que registres.       Gracias', {
                    title: 'REGISTRO COMPLETO',
                    size: 'sm',
                    buttonSize: 'sm',
                    okVariant: 'success',
                    okTitle: 'Descargar',
                    headerClass: 'p-2 border-bottom-0',
                    footerClass: 'p-2 border-top-0',
                    centered: true,
                    hideBackdrop: true,
                })
                    .then(value => {
                        this.download();
                    })
                    .catch(err => {
                        // An error occurred
                    })
            }
            else {
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
            }
        },
        download: function () {
            window.open(this.url + 'FormatoMinirodada');
        },
        //* Registro de evento
        registerEvent: function (ws) {
            //console.log(ws);
            let headers = {
                'Content-Type': 'application/json;charset=utf-8'
            };
            console.log("Cursos: ", this.cursos_actualizacion_data);

            let data = {
                "workshop_id": ws.id,
                "workshop_type": ws.type,
                "estadistic_data": this.estadistic_data,
                "invoice_data": this.invoice_data,
            };
            // ! Additional data 

            switch (ws.type) {
                case 'unitrueque':
                    data["additional_data"] = this.unitrueque_data;
                    break;
                case 'uniruta':
                    data["additional_data"] = this.uniruta_data;
                    break;
                case 'reutronic':
                    data["additional_data"] = this.reutronic_data;
                    break;
                case 'minirodada':
                    data["additional_data"] = this.minirodada_data;
                    break;
                case 'unirodada':
                    data["additional_data"] = this.unirodada_data;
                    break;
                default:
                    break;
            }
            //console.log(data["additional_data"]);
            axios.post(this.url + 'WorkshopUserRegister', data).then(response => (
                console.log("subiendo: ", response.data)
            )).catch((err) => {
                console.log(err)
            })
            // Actualizar datos UI
            this.user_workshops.push(ws),
                this.uwss = this.uwss.filter(function (element) {
                    return element != ws;
                }),
                this.workshops.forEach(i => {
                    if (i.id == ws.id) {
                        i['registered'] = true; //Actualizar bandera
                        ws['registered'] = true;
                    }
                })
            //window.location.reload();
        }
    }
});