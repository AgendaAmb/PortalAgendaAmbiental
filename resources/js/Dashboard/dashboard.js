
var app = new Vue({
  el: '#panel',
  data: {
    ClaveU_RPE:'',
    Pais:'',
    userInfo:'',
    emailR:'',
    nombres:'',
    ApellidoP:'',
    ApellidoM:'',
    Errores:[],
    Facultad:'',
    spinnerVisible:false,
    CURP:'',
    LugarResidencia:'',
    profesion:'',
    organizacion:'',
    isDiscapacidad:'',
    Discapacidad:'',
    Genero:'',
    isAsistencia:'',
    CursosC:'',
    InteresAsistencia:'',
    ComentariosSugerencias:'',
    tel:'',
    modalClick:'',
    TipoUsuario:'',
    checkedNames:[],
    hasModule17Gemas:false,
    CondicionSalud:[],
    NombreContacto:'',
    CelularContacto:'',
    cursosInscritos:[],
    Guardado:'',
    isRegisterRodada:false,
    GrupoC:'',
    asistenciaExito:'',
    file:'',
    isFacturaReq:'',
    nombresF:'',
    RFC:'',
    DomicilioF:'',
    emailF:'',
    telF:'',
    nombreT:'',
    DescripcionT:'',
    TEvento:'',
    Eje:'',
    FechaInicio:'',
    FechaFin:'',
    checkedFecha:[],
    NAcademico:'',
    Especificar:'',
    //variables para unitrueque
    MaterialesIntercambio:'',
    Cantidad:'', 
    Mobiliario:'',//si o no
    EmpresaParticipante:'',

    //! Modales pasados
    InscritoHuertoMesaHuasteca:false,
    InscritoPromotoresHuasteca:false,
    InscritoUnirodadaRios:false,
    InscritoUniruta:false,
    InscritoUniruta:false,
    InscritoUnihuertoCasa:false,
    InscritoHuertoMesa:false,
    InscritoGGJ:false,

    //! Modales activos
    InscritoUnitrueque:false,
    InscritoCA_complete: false,
    REGS:false, // Cursos de actualizacion
    RIA:false, // Cursos de actualizacion
    SCMU:false, // Cursos de actualizacion
    Selected_REGS:false, //Cursos de actualizacion
    Selected_RIA:false, //Cursos de actualizacion
    Selected_SCMU:false, //Cursos de actualizacion

    //! 
    teamlength:3,
    team: new Array(),
  },
  mounted:function () {
  this.$nextTick(function () {
    // Initial team
    this.team.push({name: '', email: '', tel: '', inst:'', nedu:'Nivel superior'});
    this.team.push({name: '', email: '', tel: '', inst:'', nedu:'Nivel superior'});
    this.team.push({name: '', email: '', tel: '', inst:'', nedu:'Nivel superior'});
    // 
    this.cargarCursos(),
    this.checarAsistenciaCursos(),
    this.ChecarUrl(),
    this.TipoUsuario='{{Auth::user()->user_type}}',
    this.Errores.push({Mensaje:" Lo sentimos algo a pasado y no te hemos podido registrar",Visible:false});
    this.Errores.push({Mensaje:"Las contraseñas no coinciden",Visible:false});
    this.Errores.push({Mensaje:"El nombre del contacto debe ser diferente al tuyo",Visible:false});
    this.Errores.push({Mensaje:"El teléfono y el teléfono de contacto no pueden ser iguales",Visible:false});
    this.Errores.push({Mensaje:"Eres acredor a una beca por parte de Agenda Ambiental",Visible:false});
    this.Errores.push({Mensaje:"Lo sentimos se ha alcanzado el limite de becas aprobadas y tu registro necesitara realizar el pago.",Visible:false});
  })
},

  methods:{
    addTeamMember:function(){
      if(this.teamlength < 5){
        let user_Data =  {name: '', email: '', tel: '', inst:'', nedu:'Nivel superior'};
        this.team.push(user_Data);
        console.log(this.team);
        this.teamlength+=1;
      }
    },
    deleteTeamMember:function(index){
      if(this.teamlength > 1){
        this.team.splice(index, 1);
      }
      this.teamlength=-1;
      console.log(this.team);
    },
    registrarWorshop:function(){
      this.spinnerVisible=true
        const formData = new FormData();
             formData.append('idUser','{{Auth::id()}}');
             formData.append('nombreT',this.nombreT);
             formData.append('DescripcionT',this.DescripcionT);
             formData.append('TEvento',this.TEvento);
             formData.append('Eje',this.Eje);
             formData.append('FechaInicio',this.FechaInicio);
             formData.append('FechaFin',this.FechaFin);

             formData.append('_method', 'post');
             axios({
                 method: 'post',

                 url: 'api/registerWorkShop',
                 data: formData,
                 headers: {
                     'Content-Type': 'multipart/form-data'
                 }
             }).then(
                     res => {


                         this.file = '',
                         this.spinnerVisible=false,
                         this.asistenciaExito=true
                     }
                 ).catch(
                     err => {

                        this.spinnerVisible=false,
                         this.asistenciaExito=false

                     }
                 )
    },

    ChecarBecas:function(fupUser){
      console.log(fupUser);
      this.Errores[4].Visible=false;
      this.Errores[5].Visible=false;

    if (this.GrupoC.toUpperCase().replace(/ /g, "")=='FUP') {
      if (fupUser>=10) {
        this.Errores[5].Visible=true;
      }else{

      this.Errores[4].Visible=true;
      }

    }else if(this.GrupoC.toUpperCase().replace(/ /g, "")=='STAFF'){
      this.Errores[4].Visible=true;
      console.log("SOY DE STAFF");
    }


    },
    cargarPdf: function (e, index) {
             this.file='';
             this.file = e.target.files[0];
         },
    MandarPagoUnirodada:function(){
        this.spinnerVisible=true
        const formData = new FormData();
             formData.append('idUser','{{Auth::id()}}');
             formData.append('isFacturaReq',this.isFacturaReq);
             formData.append('DomicilioF',this.DomicilioF);
             formData.append('emailF',this.emailF);
             formData.append('nombresF',this.nombresF);
             formData.append('RFC',this.RFC);
             formData.append('telF',this.telF);
             formData.append('file', this.file);
             formData.append('_method', 'post');
             axios({
                 method: 'post',

                 url: '/EnviaComprobante',
                 data: formData,
                 headers: {
                     'Content-Type': 'multipart/form-data'
                 }
             }).then(
                     res => {
                        console.log(response.data),
                         this.file = '',
                         this.spinnerVisible=false,
                         this.asistenciaExito=true
                     }
                 ).catch(
                     err => {

                        this.spinnerVisible=false,
                         this.asistenciaExito=false

                     }
                 )
    },
    VerificaNumeroContacto:function(){

      if ( this.CelularContacto==this.tel) {
        this.Errores[3].Visible=true
      }else{
        this.Errores[3].Visible=false
      }

    },
    VerificaNombreContacto:function(){
      nombreCompleto=this.nombres+this.ApellidoP+this.ApellidoM
      if (nombreCompleto==this.NombreContacto) {
        this.Errores[2].Visible=true
      }else{
        this.Errores[2].Visible=false
      }
    },
    ChecarUrl:function(){
      '{{$nombreModal}}'=='mmus'?this.levantaModal('mmus'):''
      '{{$nombreModal}}'=='17Gemas'?this.levantaModal('17Gemas'):''
      '{{$nombreModal}}'=='UnihuertoCasa'?this.levantaModal('UnihuertoCasa'):''
      '{{$nombreModal}}'=='HuertoMesa'?this.levantaModal('HuertoMesa'):''
      '{{$nombreModal}}'=='UnirutaSierraAlvarez'?this.levantaModal('UnirutaSierraAlvarez'):''
      '{{$nombreModal}}'=='mmus'?this.levantaModal('mmus'):''
    },
    levantaModal:function(data){
        this.DatosUsuario(data),
        
        // Checar usuario registrado
        this.checarInscripcionCursosAct();
        this.checarInscripcionUnitrueque();
        this.checarInscripcionHuertoMesa();
        this.checarInscripcionGGJ();

        $('#' + data).modal('show')

    },
    activaModal:function(){
      //*urlanterior

      let fechaRegistro=new Date('{{Auth::user()->created_at}}')
      let hora =new Date()
      let diferencia=Math.abs(hora - fechaRegistro)

      let diasDiferencia = Math.ceil(diferencia / (1000 * 60 * 60 * 24));
      console.log(diasDiferencia)
      if (diasDiferencia>1) {

      } else {
        this.DatosUsuario('mmus'),
      $('#Registro17gemas').modal('show')
      }

    },
    checarAsistenciaCursos:function(){
      this.CursosC='{{Auth::user()->courses}}',
      this.CursosC==null?this.isAsistencia='No':this.CursosC==''?this.isAsistencia='':this.isAsistencia='Si'

    },
    check_one: function(){
        this.CondicionSalud = [];
    },
    check_two: function(){
        this.checkedFecha = [];
    },
    AbrirModal: function(ModalClick){
      //esta funcion setea los datos del usuario segun el modal que se dio click
      this.DatosUsuario(ModalClick);
      //Modales vigentes
      this.checarInscripcionCursosAct();
      this.checarInscripcionUnitrueque();
      this.checarInscripcionHuertoMesa();
      this.checarInscripcionGGJ();
      //Modales pasados
      // this.checarInscripcionUnihuertoCasa();
      // this.checarInscripcionHuertoMesaHuasteca();
      // this.checarInscripcionPromotoresHuasteca();
      // this.checarInscripcionUnirodadaRios();
      // this.checarInscripcionUniruta();
     
      $('#' + ModalClick).modal('show');
    },
    DatosUsuario:function(ModalClick){
        this.nombres= '{{Auth::user()->name}}',
        this.ApellidoP='{{Auth::user()->middlename}}',
        this.ApellidoM='{{Auth::user()->surname}}',
        this.emailR='{{Auth::user()->email}}',
        this.Pais='{{Auth::user()->nationality}}',
        this.CURP='{{Auth::user()->curp}}',
        this.ClaveU_RPE='{{Auth::user()->id}}',
        this.tel='{{Auth::user()->phone_number}}',
        this.Facultad='{{Auth::user()->dependency}}',
        this.modalClick=ModalClick,
        this.Genero='{{Auth::user()->gender}}',
        this.LugarResidencia='{{Auth::user()->residence}}',
        this.hasModule17Gemas='{{Auth::user()->hasModule("17 gemas")}}',
        this.InteresAsistencia='{{Auth::user()->interested_on_further_courses}}',
        this.CondicionSalud='{{Auth::user()->health_condition}}',
        this.ComentariosSugerencias='{{Auth::user()->comments}}',
        this.NombreContacto='{{Auth::user()->emergency_contact}}'
        this.CelularContacto='{{Auth::user()->emergency_contact_phone}}',
        this.Guardado=false,
        this.url=url,
        this.Ocupacion='{{Auth::user()->ocupation}}'
        if (this.checkedNames.includes("Unirodada cicloturística a la Cañada del Lobo")) {
          this.isRegisterRodada=true,
       this.check_one(),
       this.CondicionSalud='{{Auth::user()->health_condition}}'
        }
      },
      registerGgj:function(){
        let headers = {
          'Content-Type': 'application/json;charset=utf-8'
        };
        var data = {
          "team":this.team,
          "teamlength":this.teamlength,
          "InteresAsistencia":this.InteresAsistencia
        }

        axios.post(this.url+'RegistrarGGJ',data).then(response => (
          console.log(response.data),
          this.spinnerVisible=false,
          $('#GlobalGoalsJam').modal('hide'),
          this.Guardado=true
        )).catch((err) => {
          console.log(err),
          this.Guardado=false
        })

      },
      uaslpUser:function(){
            this.spinnerVisible=true;
           if(this.emailR!=''){
            let headers = {
                    'Content-Type': 'application/json;charset=utf-8'
            };
            var data = {
       	        "emailR":this.emailR,
                "Genero":this.Genero,
                "Clave":this.ClaveU_RPE,
                "FacultadAdscripcion":this.Facultad,
                "Tel":this.tel,
                "Nacionalidad":this.Pais,
                "LugarResidencia":this.LugarResidencia,
                "CURP":this.CURP,
                "Ocupacion":this.Ocupacion,
                "CursoCursado":this.CursosC,
                "ComentariosSugerencias":this.ComentariosSugerencias,
                "InteresAsistencia":this.InteresAsistencia,
                "cursosInscritosMMUS":this.checkedNames,
                "CondicionSalud":this.CondicionSalud,
                "NombreContacto":this.NombreContacto,
                "CelularContacto":this.CelularContacto,
                "GrupoC":this.GrupoC,
                "NAcademico":this.NAcademico,
                "checkedFecha":this.checkedFecha,
                "isFacturaReq":this.isFacturaReq,
                'DomicilioF':this.DomicilioF,
                'emailF':this.emailF,
                'nombresF':this.nombresF,
                'RFC':this.RFC,
                'telF':this.telF,
                'isAsistencia': this.isAsistencia,
                //campos para unitrueque
                'MaterialesIntercambio':this.MaterialesIntercambio,
                'Cantidad':this.Cantidad, 
                'Mobiliario':this.Mobiliario,
                'EmpresaParticipante':this.EmpresaParticipante,
                'profesion':this.profesion,
                'organizacion':this.organizacion,
            }

            if (this.modalClick=='Agricultura') {
              axios.post(this.url+'RegistrarTallerUsuario',data).then(response => (
              console.log(response.data),
              this.spinnerVisible=false,
              $('#RegistroAgricultura').modal('hide'),
              $('#Registro17gemas').modal('hide'),
              this.Guardado=true
              )).catch((err) => {
                  this.Errores[0].Visible,
                  this.Guardado=false
              })

           }else
           if (this.modalClick=='17Gemas') {
            axios.post(this.url+'17Gemas/api/register',data).then(response => (

              this.spinnerVisible=false,
               window.location.href = this.url+'17Gemas/'
               )).catch((err) => {
                  this.Errores[0].Visible
            })

           }else if(this.modalClick=='mmus'){
              //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
            axios.post(this.url+'RegistrarTallerUsuario',data).then(response => (

              console.log(response.data),
              this.spinnerVisible=false,
              $('#Registro17gemas').modal('hide'),
              this.Guardado=true
               )).catch((err) => {
                  this.Errores[0].Visible,
                  this.Guardado=false
            })
           }
           else if(this.modalClick=='UnihuertoCasa'){
              //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
              axios.post(this.url+'RegistrarUnihuertoCasaUsuario',data).then(response => {
                  console.log(response.status);
                  if(response.status == 200){
                    //console.log(response.data);
                    this.spinnerVisible=false;
                    $('#UnihuertoCasa').modal('hide');
                    this.Guardado=true;
                  }else{
                    console.log("Mensaje: " + response.data.Message);
                  }
                }).catch((err) => {
                  console.log(err);
                  if(err.response.data.Message)
                    console.log("Mensaje: " + err.response.data.Message);
                  this.Errores[0].Visible;
                  this.Guardado=false;
              })
           }
           else if(this.modalClick=='HuertoMesa'){
              //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
              axios.post(this.url+'RegistrarHuertoMesaUsuario',data).then(response => {
                  console.log(response.status);
                  if(response.status == 200){
                    //console.log(response.data);
                    this.spinnerVisible=false;
                    $('#HuertoMesa').modal('hide');
                    this.Guardado=true;
                  }else{
                    console.log("Mensaje: " + response.data.Message);
                  }
                }).catch((err) => {
                  console.log(err);
                  if(err.response.data.Message)
                    console.log("Mensaje: " + err.response.data.Message);
                  this.Errores[0].Visible;
                  this.Guardado=false;
              })
           }           
           else if(this.modalClick=='Unitrueque'){
               //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
               axios.post(this.url+'RegistrarUnitruequeUsuario',data).then(response => {
                   console.log(response.status);
                   if(response.status == 200){
                       console.log(response.data);
                       this.spinnerVisible=false;
                       $('#Unitrueque').modal('hide');
                       this.Guardado=true;
                   }else{
                       console.log("Mensaje: " + response.data.Message);
                   }
               }).catch((err) => {
                   console.log(err);
                   if(err.response.data.Message)
                       console.log("Mensaje: " + err.response.data.Message);
                   this.Errores[0].Visible;
                   this.Guardado=false;
               })
           }
           else if(this.modalClick=='HuertoMesaHuasteca'){
              //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
              axios.post(this.url+'RegistrarHuertoMesaHuastecaUsuario',data).then(response => {
                  console.log(response.status);
                  if(response.status == 200){
                    //console.log(response.data);
                    this.spinnerVisible=false;
                    $('#HuertoMesaHuasteca').modal('hide');
                    this.Guardado=true;
                  }else{
                    console.log("Mensaje: " + response.data.Message);
                  }
                }).catch((err) => {
                  console.log(err);
                  if(err.response.data.Message)
                    console.log("Mensaje: " + err.response.data.Message);
                  this.Errores[0].Visible;
                  this.Guardado=false;
              })
           }
           else if(this.modalClick=='PromotoresHuasteca'){
              //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
              axios.post(this.url+'RegistrarPromotoresHuastecaUsuario',data).then(response => {
                  console.log(response.status);
                  if(response.status == 200){
                    //console.log(response.data);
                    this.spinnerVisible=false;
                    $('#PromotoresHuasteca').modal('hide');
                    this.Guardado=true;
                  }else{
                    console.log("Mensaje: " + response.data.Message);
                  }
                }).catch((err) => {
                  console.log(err);
                  if(err.response.data.Message)
                    console.log("Mensaje: " + err.response.data.Message);
                  this.Errores[0].Visible;
                  this.Guardado=false;
              })
           }  
           else if(this.modalClick=='UnirodadaRios'){
            data['TipoEvento'] = 'unirodada'
            //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
            axios.post(this.url+'RegistrarRodadaRioUsuario',data).then(response => {
                console.log(response.status);
                if(response.status == 200){
                  //console.log(response.data);
                  this.spinnerVisible=false;
                  $('#UnirodadaRios').modal('hide');
                  this.Guardado=true;
                }else{
                  console.log("Mensaje: " + response.data.Message);
                }
              }).catch((err) => {
                console.log(err);
                if(err.response.data.Message)
                  console.log("Mensaje: " + err.response.data.Message);
                this.Errores[0].Visible;
                this.Guardado=false;
            })
           }
          else if(this.modalClick=='UnirutaSierraAlvarez'){
            // console.log(data);
            data['TipoEvento'] = 'uniruta'
            //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
            axios.post(this.url+'RegistrarUnirutaUsuario',data).then(response => {
                console.log(response.status);
                if(response.status == 200){
                  //console.log(response.data);
                  this.spinnerVisible=false;
                  $('#UnirutaSierraAlvarez').modal('hide');
                  this.Guardado=true;
                }else{
                  console.log("Mensaje: " + response.data.Message);
                }
              }).catch((err) => {
                console.log(err);
                if(err.response.data.Message)
                  console.log("Mensaje: " + err.response.data.Message);
                this.Errores[0].Visible;
                this.Guardado=false;
            })
           }
          else if(this.modalClick=='CursosActualizacion'){
            // console.log('REGS: ');
            // console.log(this.Selected_REGS);
            data['REGS'] = this.Selected_REGS;
            data['RIA'] =  this.Selected_RIA;
            data['SCMU'] = this.Selected_SCMU;
            data['TipoEvento'] = 'curso';
            console.log(data);
            //*Ruta para guardar informacion de un usuario y sus cursos o concursos inscritos*//
            axios.post(this.url+'RegistrarCAUsuario',data).then(response => {
                if(response.status == 200){
                  console.log(response.data.Message);
                  this.spinnerVisible=false;
                  $('#CursosActualizacion').modal('hide');
                  this.Guardado=true;
                }else{
                  console.log("Mensaje: " + response.data.Message);
                }
              }).catch((err) => {
                console.log(err);
                if(err.response.data.Message)
                  console.log("Mensaje: " + err.response.data.Message);
                this.Errores[0].Visible;
                this.Guardado=false;
            })
           }
           else{
            data['TipoEvento'] = 'unirodada'
            axios.post(this.url+'RegistrarTallerUsuario',data). then(response => (

              console.log(response.data),
             this.spinnerVisible=false,
             $('#Registro17gemas').modal('hide'),
             this.Guardado=true
               )).catch((err) => {
                  this.Errores[0].Visible;
            })
           }

        }
      },
      //Verifica la inscripcion en cursos de actualizacion
      checarInscripcionGGJ: function(){
        axios.post(this.url + 'ChecarGGJ',{ "Clave":'{{Auth::user()->id}}'})
          .then(response => {
            console.log(response.data);
            this.InscritoGGJ = response.data;
          }).catch((err) => {
            console.log(err.response);
          })
      },
      //Verifica la inscripcion en cursos de actualizacion
      checarInscripcionCursosAct: function(){
        axios.post(this.url + 'ChecarCAUsuario',{ "Clave":this.ClaveU_RPE })
          .then(response => {
            // console.log(response.data);
            this.REGS = response.data.data.REGS;
            this.RIA = response.data.data.RIA;
            this.SCMU = response.data.data.SCMU;
            this.InscritoCA_complete = response.data.flag;
          }).catch((err) => {
            console.log(err.response);
          })
      },
      checarInscripcionHuertoMesaHuasteca: function(){
        axios.post(this.url + 'ChecarHuertoMesaHuastecaUsuario',{ "Clave":this.ClaveU_RPE })
          .then(response => {
            // console.log(response.data);
            this.InscritoHuertoMesaHuasteca = response.data;
          }).catch((err) => {
            console.log(err.response.data);
          })
      },
      checarInscripcionPromotoresHuasteca: function(){
        axios.post(this.url + 'ChecarPromotoresHuastecaUsuario',{ "Clave":this.ClaveU_RPE })
          .then(response => {
            // console.log(response.data);
            this.InscritoPromotoresHuasteca = response.data;
          }).catch((err) => {
            console.log(err.response.data);
          })
      },
      checarInscripcionUnirodadaRios: function(){
        axios.post(this.url + 'ChecarRodadaRioUsuario',{ "Clave":this.ClaveU_RPE })
          .then(response => {
            // console.log("Rodada rio: " + response.data);
            this.InscritoUnirodadaRios = response.data;
          }).catch((err) => {
            console.log(err.response.data);
          })
      },
      checarInscripcionUniruta: function(){
        axios.post(this.url + 'ChecarUnirutaUsuario',{ "Clave":this.ClaveU_RPE })
          .then(response => {
            // console.log("Uniruta: " + response.data);
            this.InscritoUniruta = response.data;
          }).catch((err) => {
            console.log(err.response.data);
          })
      },
      checarCursosActualizacion: function(){
        axios.post(this.url + 'ChecarCursoaUsuario',{ "Clave":this.ClaveU_RPE })
          .then(response => {
            // console.log("Uniruta: " + response.data);
            this.InscritoCursosa = response.data;
          }).catch((err) => {
            console.log(err.response.data);
          })
      },
      checarInscripcionHuertoMesa: function(){
        axios.post(this.url + 'ChecarHuertoMesaUsuario',{ "Clave":this.ClaveU_RPE })
          .then(response => {
            // console.log(response.data);
            this.InscritoHuertoMesa = response.data;
          }).catch((err) => {
            console.log(err.response.data);
          })
      },      
      checarInscripcionUnihuertoCasa: function(){
        axios.post(this.url + 'ChecarUnihuertoCasaUsuario',{ "Clave":this.ClaveU_RPE })
          .then(response => {
            this.InscritoUnihuertoCasa = response.data;
          }).catch((err) => {
            console.log(err);
          })
      },
      checarInscripcionUnitrueque: function(){
          axios.post(this.url + 'ChecarUnitruequeUsuario',{ "Clave":this.ClaveU_RPE })
              .then(response => {
                  this.InscritoUnitrueque = response.data;
              }).catch((err) => {
              console.log(err);
          })
      }
    }
})