<script>
  const modulos = @json($modulos);
  const user_workshops = @json($user_workshops);
  const workshops = @json($workshops);
  const nombreModal = @json($nombreModal);
  const ejes = @json($ejes);
</script>

@extends('Bienvenido')
@push('stylesheets')
<link rel="stylesheet" href="{{ asset('css/Institucional.css') }}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endpush
@section('navbarModulos')
<!--SECCION DONDE SE DESPLEGARAN CADA UNO DE LOS MODULOS EN EL QUE EL USUARIO ESTE REGISTRADO PARA PODER REEDIRIGIRLO A SU SITIO CORRESPONDIENTE-->
@include('templates.navbar')
@endsection

@section('ContenidoPrincipal')

<style>
  #lateral-izq{
      padding: 0;
      margin: 0;
  }

  .card-header{
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #115089;
      height: 15px;
  }

  .card-body{
      padding: 3px 0;
  }

  .card-header > .btn{
      height: auto;
      width: 100%;
      font-size: 12px;
      color: white;
  }

  .card-body > .list-group{
      padding: 0;
      margin: 0;
  }

  .card-body > .list-group > .list-group-item{
      font-size: 13px;
      padding: 0;
      margin: 0px 2px;
  }

  .card-body > .list-group > .list-group-item > a{
      padding: 4px 4px;
      color: gray;
  }

  .card-body > .list-group > .list-group-item > a:hover{
      padding: 4px 4px;
      color: #115089;
      background-color: #DCDCDC;
  }

    /* DERECHA  */
  .perfil-card > #userName{
      font-size: 13px;
      margin: 0px;
  }

  .perfil-card > #userDep{
      font-size: 12px;
      margin-bottom: 0px;
      padding-bottom: 0px;
  }

  .perfil-card > .btn-group > button {
      font-size: 12px;
      text-align: right;
      padding: 0;
      margin: 0;
      border: none;
      box-shadow: none;
  }

  .perfil-card > .btn-group > button:focus,
  .perfil-card > .btn-group > button:visited,
  .perfil-card > .btn-group > button:active,
  .perfil-card > .btn-group > button:hover {
      border: none;
      box-shadow: none;
    }

  .btn-aviso{
      text-align: left;
      border: none;
      padding: 0;
      font-size: 12px;
  }

  .perfil-card > .btn-group > .dropdown-menu {
      font-size: 11px;
      min-width: 0px;
  }

  .perfil-card > .btn-group > .dropdown-menu > .dropdown-item:hover{
      color: #115089;
  }

  .aviso-body{
      border: 1px solid black;
      margin: 4px 2px ;
      padding: 2px 4px;
  }

  .aviso-body > p{
      margin:0;
      font-size: 11px;
  }

  /* ZONA MODALES */
  .modal-icon{
      border-radius: 10px 10px;
      box-shadow: 0px 0px 2px #6b6b6b;
      padding: 0.2em 0.3em; 
      font-size: 7vh; 
      color: white; 
      background: #115089;
  }

  .modal-label{
      color: #115089;
  }

  .modal-content{
    background: white;
  },
  .title{
    /* background: white; */
  }
</style>

<div class="container-fluid my-4" id="panel">
  <div class="row">
    {{-- aui  --}}
    <div id="lateral-izq" class="col-xl-2 col-12 h-auto order-xl-0 order-2 d-flex">

      <div id="accordion" class="w-100">

        <div class="card bg-light border-0">
          <div class="card-header" id="headingOne">
            <button class="w-100 d-flex align-items-center justify-content-between btn btn-sm collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              EVENTOS ACTUALES
              <span class="fas fa-angle-down"></span>
            </button>
          </div>

          <div id="collapseOne" class="collapse show border-0" aria-labelledby="headingOne">
            <div class="card-body">
              <ul class="list-group list-group-flush">
                  <li v-for="ws in workshops" class="list-group-item">
                    <a href="#" class="nav-link">@{{ws.name}}</a>
                  </li>
              </ul>
            </div>
          </div>

        </div>
        <br/>

        <div class="card bg-light border-0">
          <div class="card-header" id="headingTwo">
            <button class="w-100 d-flex align-items-center justify-content-between btn btn-sm collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              PRÓXIMOS EVENTOS
              <span class="fas fa-angle-down"></span>
            </button>
          </div>
          <div id="collapseTwo" class="collapse show border-0" aria-labelledby="headingTwo">
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li v-for="ws in workshops" class="list-group-item">
                  <a href="#" class="nav-link">@{{ws.name}}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <br/>

        <div class="card bg-light border-0">
          <div class="card-header" id="headingThree">
            <button class="w-100 d-flex align-items-center justify-content-between btn btn-sm collapsed text-white pt-0 pb-0 " data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              MAPA DEL SITIO
              <span class="fas fa-angle-down"></span>
            </button>
          </div>
          <div id="collapseThree" class="collapse show border-0" aria-labelledby="headingThree">
            <div class="card-body">
              <ul class="list-group list-group-flush">
                {{-- <li v-for="ws in workshops" class="list-group-item">
                  <a href="#" class="nav-link">@{{ws.name}}</a>
                </li> --}}
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>

    {{-- ZONA CENTRAL --}}
    <div class="col-xl-8 col-12 d-flex align-items-center flex-column order-xl-1 order-1">
      
      <div class="d-flex flex-column align-items-center">

        <div class="row w-100 d-flex aling-items-start text-right" style="color:#115089">
          <h5><strong>Eventos</strong></h5>
        </div>

        <div id="modales" class="mb-3 py-3 border shadow-sm rounded row row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-2 d-flex align-items-center justify-content-start w-100 flex-wrap">

          {{-- ZONA MODALES --}}
          <div v-for="ws in workshops" class="col p-2">  
            <a href="#" style="text-decoration:none;">
              <div class="d-flex-column align-items-center justify-content-center text-center">
                <a href="#" data-toggle="modal" data-target="#RegistroGeneral" @click="AbrirModal('RegistroGeneral', ws)">
                  <i class="modal-icon bi bi-calendar-plus"></i>
                  {{-- <img src="{{ asset('/storage/imagenes/Unitrueque/Registro_img.png')}}" class="img-fluid pr-xl-1 px-1"> --}}
                  <p class="modal-label mt-1 mb-0">@{{ws.name}}<p>
                </a>
              </div>
            </a>
          </div>

          @if(Auth::user()->hasRole('administrator')||Auth::user()->hasRole('helper')||Auth::user()->hasRole('coordinator')) 

          <div class="col p-2">  
            <form class="d-flex flex-column justify-content-center"action="{{route("PreloginControlEscolar")}}" method="post">
              @csrf
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <button style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" type="submit">
                  <i class="modal-icon bi bi-journals"></i>
                  <p class="modal-label mt-1">CONTROL ESCOLAR<p>
              </button>
            </form>
          </div>

          @endif 

        </div>
        
        <div class="row w-100 d-flex aling-items-start text-right" style="color:#115089">
          <h5><strong>Recursos</strong></h5>
        </div>

        <div class="mb-3 py-3 border shadow-sm rounded row row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-2  d-flex align-items-center justify-content-start w-100">

          <div class="col p-2">  
            <a href="#" style="text-decoration:none;">
              <div class="d-flex-column align-items-center justify-content-center text-center">
                <i class="modal-icon bi bi-calendar-date-fill"></i>
                <p class="modal-label mt-1">CALENDARIO<p>
              </div>
            </a>
          </div>
        </div>
        
        <div class="row">
          <div class="col d-flex align-items-center mx-2 my-xl-2 my-2 px-0">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                {{-- <div class="carousel-item ">
                  <img src="{{asset('/storage/imagenes/Unihuerto/BINT_HuertoalaMesa.png')}}" class="d-block w-100" alt="...">
                </div> --}}
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

    {{-- <div id="lateral-izq" class="col-xl-2 col-12 h-auto order-xl-0 order-2 d-flex"> --}}
    <div id="lateral-der" class="col-xl-2 col-12 order-xl-2 order-0 d-flex flex-xl-column flex-lg-row flex-md-row">

      <div class="row pt-3 border shadow-sm rounded mb-3">
        <div class="perfil-card col-7 d-flex flex-column justify-content-center text-right">

          <p id="userName"><strong>{{Auth::user()->name}} {{Auth::user()->middlename}} {{Auth::user()->surname}}</strong></p>
          <p id="userDep">{{Auth::user()->dependency}}</p>

          <div class="btn-group">
            <button class="btn dropdown-toggle " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu">
              {{-- <a href="{{route('perfil')}}" class="dropdown-item" >Mi perfil</a> --}}
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </div>

        </div>

        <div class="col-5">
          <img src="{{asset('storage/imagenes/Logos/User-default.png')}}" class="rounded-circle w-100 img-fluid p-0 m-0" alt="User-image.jpg">
        </div>
      </div>

      {{-- <div class="row border shadow-sm rounded">
        <div class="card bg-light border-0">
          <div class="card-header h-auto" id="headingThree">
            <button class="w-100 d-flex align-items-center justify-content-between btn btn-sm collapsed text-white pt-0 pb-0 " data-toggle="collapse" data-target="#collapseAvisos" aria-expanded="false" aria-controls="collapseAvisos">
              AVISOS Y NOTIFICACIONES 
              <span class="fas fa-angle-down"></span>
            </button>
          </div>
          <div id="collapseAvisos" class="collapse show border-0" aria-labelledby="collapseAvisos">
            <div class="card-body">
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    @for ($i = 0; $i < 5; $i++)
                    <div class="col-md-11 col-xl-12 col-lg-12 col-12 px-1 mt-1">
                      <a class="btn-aviso btn btn-outline-secondary w-100 rounded-0 py-0" data-toggle="collapse" href="#collapseExample{{$i}}" role="button" aria-expanded="true" aria-controls="collapseExample">
                        Informe del rector
                      </a>
                    </div>
                    <div class="collapse show px-1 mb-1" id="collapseExample{{$i}}">
                      <div class="aviso-body card card-body ">
                        <p class="smg">
                          Recuerda subir tu comprobante de pago de la Unirodada
                        </p>
                      </div>
                    </div>
                    @endfor
                  </li>
              </ul>
            </div>
          </div>
        </div> --}}
        
      </div>
    </div>
    {{-- Modales para eventos  --}}
    @include("auth.20Aniversario.Modales.basic")

  </div>
</div>
</div>
</div>

<script>
  var app = new Vue({
  el: '#panel',
  data: {
    // Datos cargados para la vista
    workshops: workshops,
    modulos: modulos,
    user_workshops: user_workshops,
    nombreModal: nombreModal,
    ejes: ejes,
    
    TipoUsuario:'',
    Errores:[],
    // Inscripción a cursos
    InscritoUniruta:false,
    InscritoUniruta:false,
    InscritoUnihuertoCasa:false,
    InscritoHuertoMesa:false,

    activeModal:null,

    // CRUD 
    spinnerVisible: false,
    Guardado:false,
    Error: false
  },
  computed: {
    testing() {
      return "hola wes"
    }
  },
  mounted:function () {
    this.$nextTick(function () {
      console.log(ejes)
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
    // Activa los modales disponebles
    ActivaModales:function(){
      '{{$nombreModal}}'=='mmus'?this.isActive('mmus'):''
      '{{$nombreModal}}'=='17Gemas'?this.isActive('17Gemas'):''
      '{{$nombreModal}}'=='UnihuertoCasa'?this.isActive('UnihuertoCasa'):''
      '{{$nombreModal}}'=='HuertoMesa'?this.isActive('HuertoMesa'):''
    },
    isActive:function(data){
        this.DatosUsuario(data),
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
    cargarCursos:function(){
      @foreach(Auth::user()->getRegisteredWorkshops() as $E)
                this.checkedNames.push(
                    '{{$E['name']}}'
                )
      @endforeach
      // console.log(this.checkedNames);
    },
    AbrirModal: function(ModalClick, ws){
      this.activeModal = ws;
      $('#' + ModalClick).modal('show');
    },
    CerrarModal: function(ModalClick){
      // Reset
      this.Error=false;
      this.Guardado=false;
      this.spinnerVisible=false;
    },
    RegistrarEvento: function(modal){
      this.spinnerVisible = true;
      let headers = {
        'Content-Type': 'application/json;charset=utf-8'
      };
      var data = {
        "event":this.activeModal,
      };
      axios.post("{{route('WorkshopUserRegister')}}",data).then(response => (
        console.log(response.data),
        this.spinnerVisible=false,
        this.Guardado=true
      )).catch((err) => {
        this.spinnerVisible=false,
        this.Error=true
      })
      // $('#' + modal).modal('hide')
    },
    DatosUsuario:function(ModalClick){
        this.nombres= '{{Auth::user()->name}}',
        this.ApellidoP='{{Auth::user()->middlename}}',
        this.ApellidoM='{{Auth::user()->surname}}'
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
          }
          if(this.modalClick=='Agricultura') {
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
          }else if(this.modalClick=='17Gemas') {
            axios.post(this.url+'17Gemas/api/register',data).then(response => (
              this.spinnerVisible=false,
                window.location.href = this.url+'17Gemas/'
                )).catch((err) => {
                  this.Errores[0].Visible
            })
          }
        }
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
      }
    }
})
</script>
@endsection
