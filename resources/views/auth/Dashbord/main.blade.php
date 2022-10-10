<script>
  const modulos = @json($modulos);
  const workshops = @json($active_workshops);
  const user_workshops = @json($user_registered_workshops);
  const noreg_workshops = @json($user_unregistered_workshops);
  const nombreModal = @json($nombreModal);
  const ejes = @json($ejes);
  const user = @json($user);

  console.log(workshops);

  // Additional data
  // const url = '{{env('APP_URL')}}'
  // const url = 'https://ambiental.uaslp.mx/'
  const url = 'http://portalaa.test/'
  const modal = '{{$nombreModal}}';
  const user_type = '{{Auth::user()->type}}';
  const base_img ='{{ asset('/storage/imagenes')}}' + "/";
</script>

@extends('templates.base')

@push('stylesheets')
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
{{-- <script src="http://unpkg.com/portal-vue"></script> --}}
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
              <b-button class="_card-button" block v-b-toggle.accordion-1>MIS EVENTOS REGISTRADOS</b-button>
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
              <b-button class="_card-button" block v-b-toggle.accordion-2>REGISTRO A PRÓXIMOS EVENTOS</b-button>
            </b-card-header>
            <b-collapse class="_card-collapse" id="accordion-2" visible role="tabpanel">
              <b-card-body v-for="ws in noreg_workshops" v-bind:key="ws.id" class="py-2 m-0 rounded-0">
                <b-card-text @click="openRegisterModal(ws)" class="_card-text">@{{ws.name}}</b-card-text>
              </b-card-body>
            </b-collapse>
          </b-card>

          <b-card no-body class="_card">
            <b-card-header header-tag="header" class="p-0" role="tab">
              <b-button class="_card-button" block v-b-toggle.accordion-3>MAPA DEL SITIO</b-button>
            </b-card-header>
            <b-collapse id="accordion-3" visible role="tabpanel">
              <b-card-body class="py-2 m-0">
                <b-card-text class="_card-text"></b-card-text>
              </b-card-body>
            </b-collapse>
          </b-card>

        </div>
      </div>   
    </b-col>

    <b-col class="bg-white" align-self="stretch" lg="8" md="8" sm="12" cols="12" order-lg="2" order-md="2" order-sm="2" order="2">
      <div class="h-fluid my-2 border">
        <b-row xl="6" lg="4" md="3" sm="2" cols="2" :no-gutters=true align-h="center">
          <b-col cols="12" order="1">
            <div class="h-fluid text-left mx-0 my-0" style="background: #115089; color: white;"><h6 class="px-2 py-2 m-0">PANEL DE REGISTRO</h6></div> 
          </b-col>
          <b-col cols="12" order="2">
            <div class="h-fluid text-left mx-0 my-0" style="background: #f7f7f7; color: #115089"><h6 class="px-2 py-2 m-0">CUPO LIMITADO</h6></div> 
          </b-col>
@verbatim
          <b-col 
            order="3"
            xl="2" 
            lg="3" 
            md="4" 
            sm="6" 
            cols="6" 
            v-for="ws in workshops" 
            v-bind:key="ws.id"
            >
            <b-card
              :img-src=ws.imgsrc
              style="max-width: 200px;"
              class="text-center position-relative mx-1 my-2 p-1 border-0 _card"
              img-alt="evento.png"
              img-top
              no-body
              header-bg-variant="white"
              header-border-variant="white"
              @click="openRegisterModal(ws)"
            >
              <template class="_card-header" #header>
                <div>
                  <h6 class="mb-0">{{ws.start_date}}</h6>
                  <h6 class="mt-1">{{ws.name}}</h6>
                </div>
              </template>
            </b-card>
          </b-col>
@endverbatim
          <b-col cols="12" order="6">
            <b-carousel
              id="carousel-fade"
              style="text-shadow: 0px 0px 2px #000"
              fade
              indicators
              img-width="1024"
              img-height="480"
              class="my-3 mx-2"
              :interval=4000
            >
              <b-carousel-slide
                img-src="{{asset('/storage/imagenes/20Aniversario/Banner.png')}}"
              ></b-carousel-slide>
            </b-carousel>
          </b-col>
        </b-row>
      </div>
    </b-col>
    
    <b-col class="bg-white" align-self="stretch" lg="2" md="2" sm="12" cols="12" order-lg="3" order-md="3" order-sm="1" order="1">
      <div class="h-100 w-100">
        <b-row align-h="center" :no-gutters=true>
          <b-container class="my-2 mx-1 py-4 px-1 bg-light" >
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
            <b-calendar 
              class="mx-2 my-2" 
              block 
              lang="es-ES"
              :date-info-fn="dateClass"
              label-calendar="Mi calendario"
              label-help=""
              label-next-decade="Siguiente decada"
              label-next-year="Siguiente año"
              label-next-month="Siguiente mes"
              label-prev-decade="Decada previa"
              label-prev-year="Año previo"
              label-prev-month="Mes previo"
              :value="getToday()"
              >
            </b-calendar>
          </b-col>
        </b-row>
      </div>
    </b-col>
  </b-row>
</b-container>

@verbatim
<modal-template 
  v-bind:ws="selected" 
  v-bind:estadistic_data="estadistic_data" 
  v-bind:user="user" 
  v-bind:invoice_data="invoice_data"
  >
  <template #event-form-data>
    <unitrueque-section v-bind:unitrueque_data="unitrueque_data"></unitrueque-section>
    <hr>
    <reutronic-section v-bind:reutronic_data="reutronic_data"></reutronic-section>
    <hr>
    <cursos-actualizacion-section v-bind:cursos_actualizacion_data="cursos_actualizacion_data" ></cursos-actualizacion-section>
    <hr>
    <uniruta-section v-bind:uniruta_data="uniruta_data"></uniruta-section>
  </template>
</modal-template>
@endverbatim

@endsection

<script src="{{ asset('js/navbar.js') }}" defer></script>
<script src="{{ asset('js/dashboard.js') }}" defer></script>
