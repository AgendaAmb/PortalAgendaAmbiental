import Vue from 'vue';
import {BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue';

Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);

new Vue({
    el: '#app',
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
        //
        selected: null,
        // * FORMS
        egresado_form: {posgrado: 'null', gen:'', ocupacion: '', sector:'null', nombre_empleador:'', tel_empleador:'', email_empleador:'', comentarios:''},
        user_data: user_data
    },
    created() {
        this.checkRegisteredWs();   // Checar los cursos a los que el usuario esta registrado y crea bandera 
    },
    mounted() {
        this.getCalendarEventDays();
        this.getToday();
        this.openModal();
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
        openModal(){
            if(user_data.status == 'Graduado' && user_data.isform == false){
                this.$bvModal.show("modal-register");
            }
        },
        // ! De momento las fechas son manuales
        dateClass(ymd, date) {

            if(ymd == '2022-09-09' | ymd == '2022-09-10'){
                return 'table-success'
            }

            return ''
        },
        // Checar los cursos a los que el usuario no esta registrado y crea bandera 
        checkRegisteredWs:function(){
            if(user_workshops.length > 0){
                this.user_workshops.forEach(ws => { ws['registered'] = true;}); //Actualizar bandera
                // Eventos
                // this.workshops = this.workshops.filter(ws => ws.id == 23);
                if(this.user_data.status != "Graduado" && this.user_data.status != "Activo" && this.user_data.status != "Profesor"){
                    this.workshops = [];
                }else if(this.user_data.status == "Profesor"){
                    this.workshops = this.workshops.filter(ws => ws.id == 23);
                }

                this.workshops.forEach(ws => {
                    let cont = 0;
                    user_workshops.forEach(uws => {
                        if(ws.id != uws.id){
                            cont++;
                        }
                    }); 

                    if(cont == this.user_workshops.length){
                        ws['registered'] = false;
                        this.uwss.push(ws);
                    }else{
                        ws['registered'] = true;
                    }
                });
            }else{
                // Eventos
                // this.workshops = this.workshops.filter(ws => ws.id == 23);
                if(this.user_data.status != "Graduado" && this.user_data.status != "Activo" && this.user_data.status != "Profesor"){
                    this.workshops = [];
                }else if(this.user_data.status == "Profesor"){
                    this.workshops = this.workshops.filter(ws => ws.id == 23);
                }
                console.log("pass");

                this.workshops.forEach(ws => { 
                    ws['registered'] = false; //Actualizar bandera
                    this.uwss.push(ws);
                });
            }
        },
        // Inicializador de modales de registro
        openRegisterModal:function(ws){
            // Unirodadas
            try{
                if(!ws.registered){
                    if(ws.id == 23){
                        this.showModal(ws)
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
            var data = {
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
        //* Registro de egresados
        registerEgresados:function(){

            // console.log(this.egresado_form);
            // return true;
            
            // Spinning button
            this.spinner = true;
            let headers = {
                'Content-Type': 'application/json;charset=utf-8'
            };
            axios.post(this.url+'EgresadoData', this.egresado_form).then(response => (
                console.log(response.data),
                this.spinner = false,
                this.$bvModal.hide('modal-register')
            )).catch((err) => {
                console.log(err.data);
            })
        },
        showModal:function(ws) {
            // Selected workshop
            this.selected = ws;
            this.$root.$emit('bv::show::modal', 'modal-unirodada', '#btnShow')
        },
        onSubmit:function() {
            if(this.emptyName && this.emptyTel && this.emptyHC && this.emptyInterested && this.emptyConfirm){
                this.spinner = true;
            }else{
                console.log("Error");
            }

        },
        makeToast:function(append = false) {
            this.toastCount++;
            this.$bvToast.toast(`This is toast number`, {
                title: 'BootstrapVue Toast',
                autoHideDelay: 5000,
                appendToast: append
            });
        }
    }
});
