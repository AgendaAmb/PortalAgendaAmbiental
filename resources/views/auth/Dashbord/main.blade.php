<script>
  const Modulos = @json($Modulos);
  const workshops = @json($active_workshops);
  const user_workshops = @json($user_registered_workshops);
  const noreg_workshops = @json($user_unregistered_workshops);
  const nombreModal = @json($nombreModal);
  const ejes = @json($ejes);
  const user = @json($user);
  const modules = @json($modules);
  const cursos_act = @json($object_ca);
  const is_ce = @json($is_ce);

  // Additional data
  cursos_act.type = 'cursos_actualizacion';
  cursos_act.payment_required = 1;
  const url = '{{env('
  APP_URL ')}}';
  // const url = 'https://ambiental.uaslp.mx/'
  //const url = 'http://portalaa.test/'
  const modal = '{{$nombreModal}}';
</script>

@extends('templates.base')

@push('stylesheets')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="http://unpkg.com/portal-vue"></script>
@endpush

@section('navbarModulos')
@include('templates.navbar')
@endsection
@section('ContenidoPrincipal')
<b-container id="panel" class="p-0" fluid>
  <b-row class="h-100" :no-gutters=true>
    <b-col class="bg-white" lg="2" md="2" sm="12" cols="12" order-lg="1" order-md="1" order-sm="3" order="3">
      <div class="h-100 m-2">
        <div class="accordion" role="tablist">
          <b-card no-body class="_card rounded-0">
            <b-card-header header-tag="header" class="p-0" role="tab">
              <b-button class="_card-button" block v-b-toggle.accordion-1 style="font-weight:bold">MIS EVENTOS REGISTRADOS</b-button>
            </b-card-header>
            <b-collapse class="_card-collapse" id="accordion-1" visible role="tabpanel">
              <b-card-body v-for="ws in user_workshops" v-bind:key="ws.id" class="_card-body">
                <b-card-text @click="openRegisterModal(ws)" class="_card-text">
                  @{{ws.name}}
                </b-card-text>
              </b-card-body>
            </b-collapse>
          </b-card>

          <b-card no-body class="_card">
            <b-card-header header-tag="header" class="p-0" role="tab">
              <b-button class="_card-button" block v-b-toggle.accordion-2 style="font-weight:bold">REGISTRO A PRÓXIMOS EVENTOS</b-button>
            </b-card-header>
            <b-collapse class="_card-collapse" id="accordion-2" visible role="tabpanel">
              <b-card-body v-for="ws in noreg_workshops" v-bind:key="ws.id" class="py-2 m-0 rounded-0">
                <b-card-text @click="openRegisterModal(ws)" class="_card-text">@{{ws.name}}</b-card-text>
              </b-card-body>
            </b-collapse>
          </b-card>

          <b-card no-body class="_card">
            <b-card-header header-tag="header" class="p-0" role="tab">
              <b-button class="_card-button" block v-b-toggle.accordion-3 style="font-weight:bold">MAPA DEL SITIO</b-button>
            </b-card-header>
            <b-collapse id="accordion-3" visible role="tabpanel">
              <b-card-body class="py-2 m-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1847.7280240526052!2d-101.014503!3d22.146706!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842a98d247b03393%3A0xdf169057b20b53ed!2sAgenda%20Ambiental!5e0!3m2!1ses-419!2smx!4v1677269130728!5m2!1ses-419!2smx" width="500" height="400" style="margin-left:-30px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </b-card-body>
            </b-collapse>
          </b-card>

        </div>
      </div>
    </b-col>

    <b-col class="bg-white" align-self="stretch" lg="7" md="7" sm="12" cols="12" order-lg="2" order-md="2" order-sm="2" order="2">
      <div class="h-fluid my-2 border" style="border-radius: 15px; height:250px;" v-if="is_ce">
        <b-row xl="6" lg="4" md="3" sm="2" cols="2" :no-gutters=true align-h="center" style="margin-top: 27px;">
          <b-col order="3" xl="2" lg="3" md="4" sm="6" cols="6">
            <form action="{{route("PreloginControlEscolar")}}" method="post">
              @csrf
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <button type="submit" style="border:none; background-size: cover; background-position: center;background-color:#FFF;">
                <img src="{{asset('/storage/imagenes/iconosInicio/Control_Escolar.png')}}" alt="Control Escolar" style="max-width: 175px;">
                <div style="text-align:center; background-color:#FFF; margin-top:10px;">
                  <h6 class="mt-1">Control Escolar</h6>
                </div>
              </button>
            </form>
          </b-col>
        </b-row>
      </div>

      <div class="h-fluid my-2 border" style="border-radius: 15px;">
        <b-row xl="6" lg="4" md="3" sm="2" cols="2" :no-gutters=true align-h="center">
          <b-col cols="12" order="1">
            <div class="h-fluid text-left mx-0 my-0" style="background: #115089; color: white; border-radius: 15px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
              <h6 class="px-2 py-2 m-0" style="font-weight:bold">PANEL DE REGISTRO</h6>
            </div>
          </b-col>
          <b-col order="3" xl="2" lg="3" md="4" sm="6" cols="6" style="margin-top:20px;" v-if="Object.keys(cursos_act).length !== 0">
            <b-card img-src="{{asset('/storage/imagenes/Cursos/R_CA2023_II.jpg')}}" style="max-width: 200px;" class="text-center position-relative mx-1 my-2 p-1 border-0 _card" img-alt="evento.png" img-top no-body header-bg-variant="white" header-border-variant="white" @click="openRegisterModal(cursos_act)">
              <template class="_card-header" #header>
                <div>
                  <h6 class="mt-1">Cursos de Actualización</h6>
                </div>
              </template>
            </b-card>
          </b-col>
          @verbatim
          <b-col order="3" xl="2" lg="3" md="4" sm="6" cols="6" style="margin-top:20px;" v-for="ws in workshops" v-bind:key="ws.id">
            <b-card :img-src=ws.imgsrc style="max-width: 200px;" class="text-center position-relative mx-1 my-2 p-1 border-0 _card" img-alt="evento.png" img-top no-body header-bg-variant="white" header-border-variant="white" @click="openRegisterModal(ws)">
              <template class="_card-header" #header>
                <div>
                  <h6 class="mt-1">{{ws.name}}</h6>
                </div>
              </template>
            </b-card>
          </b-col>
          @endverbatim
        </b-row>
      </div>
      <div class="h-fluid my-2 border" style="border-radius: 15px; height:200px; ">
        <b-row xl="6" lg="4" md="3" sm="2" cols="2" :no-gutters=true align-h="center">
          <b-col cols="12" order="1">
            <div class="h-fluid text-left mx-0 my-0" style="background: #115089; color: white; border-radius: 15px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
              <h6 class="px-2 py-2 m-0" style="font-weight:bold">RECURSOS Y HERRAMIENTAS</h6>
            </div>
          </b-col>
        </b-row>
      </div>
      <b-col cols="12" order="6">
        <b-carousel id="carousel-fade" style="text-shadow: 0px 0px 2px #000" fade indicators img-width="1024" img-height="480" class="my-3 mx-2" :interval=4000>
          <b-carousel-slide img-src="{{asset('/storage/imagenes/Unitrueque/Banner.png')}}"></b-carousel-slide>
          <b-carousel-slide img-src="{{asset('/storage/imagenes/introduccion/B_Portal_ProxEve.png')}}"></b-carousel-slide>
          <b-carousel-slide img-src="{{asset('/storage/imagenes/ConsumoResponsable/Banner_CR.png')}}"></b-carousel-slide>
        </b-carousel>
      </b-col>

      <b-row>
        </div>
    </b-col>


    <b-col class="bg-white" align-self="stretch" lg="3" md="3" sm="12" cols="12" order-lg="3" order-md="3" order-sm="1" order="1">
      <div class="h-100 w-100">
        <b-row align-h="center" :no-gutters=true>
          <b-container class="my-2 mx-1 py-4 px-1 bg-light">
            <b-row>
              <b-col cols="5" class="p-0 px-1 align-items-center text-right">
                <p class="my-1">
                  {{Auth::user()->name}} {{Auth::user()->middlename}} {{Auth::user()->surname}}
                </p>
                <p class="my-1" style="font-size:13px">
                  {{Auth::user()->dependency}}
                </p>
              </b-col>
              <b-col cols="7" class="text-center m-0 p-0">
                <b-icon icon="person-circle" style="width: 120px; height: 120px;"></b-icon>
              </b-col>
            </b-row>
          </b-container>
          <b-col cols="12">
            <b-calendar class="mx-2 my-2" block lang="es-ES" :date-info-fn="dateClass" label-calendar="Mi calendario" label-help="" label-next-decade="Siguiente decada" label-next-year="Siguiente año" label-next-month="Siguiente mes" label-prev-decade="Decada previa" label-prev-year="Año previo" label-prev-month="Mes previo" :value="getToday()">
            </b-calendar>
          </b-col>
        </b-row>
      </div>
    </b-col>
  </b-row>
</b-container>

@verbatim
<modal-template v-if="selected != null" v-bind:ws="selected" v-bind:estadistic_data="estadistic_data" v-bind:user="user" v-bind:invoice_data="invoice_data">
  <template #event-form-data>
    <reutronic-section v-if="selected.type == 'reutronic'" v-bind:reutronic_data="reutronic_data"></reutronic-section>
    <unitrueque-section v-if="selected.type == 'unitrueque'" v-bind:unitrueque_data="unitrueque_data"></unitrueque-section>
    <minirodada-section v-if="selected.type == 'minirodada'" v-bind:minirodada_data="minirodada_data"></minirodada-section>
    <cursos-actualizacion-section v-if="selected.type == 'cursos_actualizacion'" v-bind:cursos_actualizacion_data="cursos_actualizacion_data"></cursos-actualizacion-section>
    <uniruta-section v-if="selected.type == 'uniruta'" v-bind:uniruta_data="uniruta_data"></uniruta-section>
    <unirodada-section v-if="selected.type == 'unirodada'" v-bind:unirodada_data="unirodada_data"></unirodada-section>
  </template>
</modal-template>
@endverbatim
@endsection

<!--Agregar mix para subir a producción
<script src="{{ mix('js/navbar.js') }}" defer></script>
<script src="{{ mix('js/dashboard.js') }}" defer></script>
-->
<script src="{{ ('js/navbar.js') }}" defer></script>
<script src="{{ ('js/dashboard.js') }}" defer></script>