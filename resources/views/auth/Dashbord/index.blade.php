@extends('Bienvenido')
@push('stylesheets')
<link rel="stylesheet" href="{{ asset('css/Institucional.css') }}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endpush
@section('navbarModulos')
<!--SECCION DONDE SE DESPLEGARAN CADA UNO DE LOS MODULOS EN EL QUE EL USUARIO ESTE REGISTRADO PARA PODER REEDIRIGIRLO A SU SITIO CORRESPONDIENTE-->
@include('auth.Dashbord.navbar')
@endsection


@section('ContenidoPrincipal')

<div class="container-fluid my-4" id="panel">
  <div class="row">
    <div class="col-xl-3 col-12  h-auto order-xl-0 order-2">
      <div id='calendar' class="mt-0"></div>
    </div>
    <div class="col-xl-7 col-12 d-flex align-items-center flex-column order-xl-1 order-1">
      <div class="col-12  d-flex align-items-center flex-column">
        <div
          class=" row row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-2  d-flex align-items-center ">

          <div class="col px-0">
            <a href="#" data-toggle="modal" data-target="#RegistroUnitrueque" @click="AbrirModal('Unitrueque')">
              <img src="{{ asset('/storage/imagenes/Unitrueque/Registro_img.png')}}" class="img-fluid pr-xl-1 px-1">
            </a>
          </div>

          @if(Auth::user()->user_type!="externs")
          <div class="col px-0">
            <a href="#" data-toggle="modal" data-target="#Registro17gemas" @click="AbrirModal('17Gemas')">

              <img src="{{ asset('/storage/imagenes/17Gemas/1.png')}}" class="img-fluid pl-xl-1 px-1 mt-1 mt-xl-0">
            </a>
          </div>
          @endif

          @if(Auth::user()->hasRole('administrator'))
          <div class="col px-0">  
            <a href="#" data-toggle="modal" data-target="#RegistroUnihuertoCasa" @click="AbrirModal('UnihuertoCasa')">
              <img src="{{ asset('/storage/imagenes/UnihuertoCasa/Registro_img.png')}}" class="img-fluid pr-xl-1 px-1">
            </a>
          </div>
          @endif

          {{-- Promotores ambientales  --}}
          <div class="col px-0">  
            <a href="#" data-toggle="modal" data-target="#PromotoresHuasteca" @click="AbrirModal('PromotoresHuasteca')">
              <img src="{{ asset('/storage/imagenes/Promotores/PromotoresAmbientales.png')}}" class="img-fluid pr-xl-1 px-1">
            </a>
          </div>

          <div class="col px-0">
              @if (Auth::user()->id === 321158 || Auth::user()->id === 228 || Auth::user()->id === 235 
                  || Auth::user()->id === 275494 || Auth::user()->id === 306148 || Auth::user()->id === 322492 || Auth::user()->id === 223 || Auth::user()->id === 207 || Auth::user()->id === 240 || Auth::user()->id === 214 || Auth::user()->id === 18536 || Auth::user()->id === 249 || Auth::user()->id === 244731 || Auth::user()->id === 49 || Auth::user()->id === 238 || Auth::user()->id === 6346 || Auth::user()->id === 24010 || Auth::user()->id === 266697 || Auth::user()->id === 250
              )
              <a href="#" data-toggle="modal" data-target="#UnirutaSierraAlvarez" @click.prevent="excepcion_usuario" @click="AbrirModal('UnirutaSierraAlvarez')">
              @endif
              <img src="{{ asset('/storage/imagenes/Uniruta/B_RegistroC.png')}}" class="img-fluid pr-xl-1 px-1">
          </div>

          {{-- Unirodada rios  --}}
          {{-- <div class="col px-0">  
            <a href="#" data-toggle="modal" data-target="#UnirodadaRios" @click="AbrirModal('UnirodadaRios')">
              <img src="{{ asset('/storage/imagenes/Unibici/Unirodada_rios.png')}}" class="img-fluid pr-xl-1 px-1">
            </a>
          </div> --}}

          {{-- Del huerto a la mesa husteca  --}}
          <!--<div class="col px-0">  
            <a href="#" data-toggle="modal" data-target="#HuertoMesaHuasteca" @click="AbrirModal('HuertoMesaHuasteca')">
              <img src="{{ asset('/storage/imagenes/Unihuerto/UnihuertoHuasteca.png')}}" class="img-fluid pr-xl-1 px-1">
            </a>
          </div>-->

          {{-- Del huerto a la mesa --}}
          {{-- <div class="col px-0">  
            <a href="#" data-toggle="modal" data-target="#RegistroHuertoMesa" @click="AbrirModal('HuertoMesa')">
              <img src="{{ asset('/storage/imagenes/Unihuerto/REG_HuertoMesa.png')}}" class="img-fluid pr-xl-1 px-1">
            </a>
          </div> --}}

          {{-- Rodada   --}}
          {{-- <div class="col px-0 d-none" >
            <a href="#" data-toggle="modal" data-target="#Registro17gemas" @click="AbrirModal('Rodada')">
              <img src="{{ asset('/storage/imagenes/mmus2021/3.png')}}" class="img-fluid px-xl-1 px-1">
            </a>
          </div> --}}

        </div>
        <div class="row  ">
          <div class="col  d-flex align-items-center my-xl-5 my-2 px-0">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                {{-- <div class="carousel-item ">
                  <img src="{{asset('/storage/imagenes/Unihuerto/BINT_HuertoalaMesa.png')}}" class="d-block w-100" alt="...">
                </div> --}}
                <div class="carousel-item ">
                  <img src="{{asset('/storage/imagenes/Uniruta/BI_Uniruta.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                  <img src="{{asset('/storage/imagenes/Unitrueque/Banner.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item active">
                  <img src="{{asset('/storage/imagenes/introduccion/B_Portal_ProxEve.png')}}" class="d-block w-100"
                    alt="...">
                </div>

                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Siguiente</span>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    <div
      class="col-xl-2 col-lg-12 col-md-12 col-12 order-xl-2 order-0 px-0 mb-5 d-flex flex-xl-column flex-md-row flex-column justify-content-around">
      <div class="row justify-content-end align-items-center  ">
        <div class="col-6  col-xl-6 order-1 order-xl-1 px-0"><img
            src="{{asset('storage/imagenes/Logos/User-default.png')}}" class="img-fluid pl-5" alt="">

        </div>
        <div class="col-6 col-xl-6 mt-2 order-0 order-xl-0" style="color: gray;">
          <h5 class="font-weight-bold text-center" style="color: gray;">{{Auth::user()->name}}</h5>
          <h6 style="color: gray;" class="text-center">{{Auth::user()->dependency}}</h6>
        </div>

      </div>

      <div class="row justify-content-end align-items-center ml-1 ">
        {{-- @if(Auth::user()->sent&&Auth::user()->invoice_data==null)
        <div class=" col-md-11 col-xl-12 col-lg-12 col-12 px-0"
          v-if="checkedNames.includes('Unirodada cicloturística a la Cañada del Lobo')">
          <a class="btn btn-secondary w-100 font-weight-bold" data-toggle="collapse" href="#collapseExample"
            role="button" aria-expanded="true" aria-controls="collapseExample">
            AVISOS
          </a>
        </div>

        <div class="collapse show px-0" id="collapseExample">
          <div class="card card-body" style="font-size: 15px;border: 0px solid rgba(0, 0, 0, 0.125);">
            <p class="">Recuerda subir tu comprobante de pago de la Unirodada
              <a href="" href="#" data-toggle="modal" data-target="#RegistroComprobanteP">Aquí</a>
            </p>
          </div>
        </div>
        @endif --}}

      </div>


    </div>


  </div>

{{-- Modales con programas vigentes  --}}

@include("RegistroModales.PromotoresHuasteca")

@include("RegistroModales.Unitrueque")

@include("RegistroModales.17gemas")

@include("RegistroModales.Uniruta")

{{-- Modales Programas pasados --}}

@include("RegistroModales.UnirodadaRios")

@include("RegistroModales.HuertoMesaHuasteca")

@include("RegistroModales.UnihuertoCasa")

@include("RegistroModales.ComprobanteP")

@include("RegistroModales.Worshop")

@include("RegistroModales.Agricultura")

@include("RegistroModales.HuertoMesa")

</div>
</div>
</div>


<script>
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
    InscritoUnihuertoCasa:false,
    InscritoUnitrueque:false,
    InscritoHuertoMesa:false,
    InscritoHuertoMesaHuasteca:false,
    InscritoPromotoresHuasteca:false,
    InscritoUnirodadaRios:false,
    InscritoUniruta:false
  },
  mounted:function () {
  this.$nextTick(function () {
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
      /*
        this.urlAnterior='{{url()->previous()}}'
        this.urlAnterior=='https://ambiental.uaslp.mx/MovilidadUrbanaSostenible2021'?this.levantaModal('mmus'):''
        this.urlAnterior=='https://ambiental.uaslp.mx/GemasDeLaUnisostenibilidad'?this.levantaModal('17Gemas'):''
        this.urlAnterior=='https://ambiental.uaslp.mx/Concurso17gemas'?this.levantaModal('17Gemas'):''
        this.urlAnterior=='https://ambiental.uaslp.mx/login?nombreModal=Rodada'?this.levantaModal('mmus'):''
      */
    },
    levantaModal:function(data){
        this.DatosUsuario(data),
        console.log("data:" + data);
        $('#Registro17gemas').modal('show')

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
    cargarCursos:function(){
      @foreach(Auth::user()->getRegisteredWorkshops() as $E)
                this.checkedNames.push(
                    '{{$E['name']}}'
                )
      @endforeach
      // console.log(this.checkedNames);
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
      //Nuevos Cursos
      this.checarInscripcionHuertoMesa();
      this.checarInscripcionUnihuertoCasa();
      this.checarInscripcionUnitrueque();
      this.checarInscripcionHuertoMesaHuasteca();
      this.checarInscripcionPromotoresHuasteca();
      this.checarInscripcionUnirodadaRios();
      this.checarInscripcionUniruta();
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
        this.url='{{env('APP_URL')}}',
        this.Ocupacion='{{Auth::user()->ocupation}}'

        if (this.checkedNames.includes("Unirodada cicloturística a la Cañada del Lobo")) {
          this.isRegisterRodada=true,
       this.check_one(),
       this.CondicionSalud='{{Auth::user()->health_condition}}'
        }
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
                //campos para unitrueque
                'MaterialesIntercambio':this.MaterialesIntercambio,
                'Cantidad':this.Cantidad, 
                'Mobiliario':this.Mobiliario,
                'EmpresaParticipante':this.EmpresaParticipante, 

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
      checarInscripcionHuertoMesaHuasteca: function(){
        axios.post(this.url + 'ChecarHuertoMesaHuastecaUsuario',{ "Clave":this.ClaveU_RPE })
          .then(response => {
            console.log(response.data);
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
</script>
@push('stylesheets')
<script>
  $('.collapseExample').collapse('show')
</script>
<link rel="stylesheet" href="{{asset('css/fullCalendar/main.css')}}">
<script src="{{asset('js/fullCalendar/main.js')}}"></script>
<script>
  var roles = '{{Auth::user()->hasRole('administrator')}}';
  console.log(roles);
  document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');

          var calendar = new FullCalendar.Calendar(calendarEl, {


           events:[
             @foreach($workshops as $workshop)
              {
                title:'{{$workshop->name}}',
                start:'{{$workshop->start_date}}',
                end:'{{$workshop->end_date}}',
                color:"#FFCCAA",
                textColor:"#000000"
              },
           @endforeach
           ],
            dateClick:function(info){
              if (roles) {
                $('#FechaInicio').val(info.dateStr);


                 $('#RegistraWorshop').modal('show')

              }

          },
            headerToolbar: {
              start: 'prev,next',
                center:'title',
                right: false },
            initialView: 'dayGridMonth'

          });

          calendar.setOption('contentHeight', "auto");
          calendar.setOption('locale','Es');
          calendar.render();
        });

</script>
@endpush
@endsection
