<script>
  const modulos = @json($modulos);
  const user_workshops = @json($user_workshops);
  const workshops = @json($workshops);
  const nombreModal = @json($nombreModal);
  const ejes = @json($ejes);
  const user = @json($user);
  const user_data = @json($_data);

  // Additional data
  const url = '{{env('APP_URL')}}';
  const modal = '{{$nombreModal}}';
  const user_type = '{{Auth::user()->type}}';

  const base_img ='{{ asset('/storage/imagenes')}}' + "/";

  console.log(user_data);
</script>

@extends('templates.base')

@push('stylesheets')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('navbarModulos')
@include('templates.navbar')
@endsection

@section('ContenidoPrincipal')

<b-container id="panel" class="p-0" fluid>
  <b-row class="h-100" :no-gutters=true>
    <b-col class="bg-white" align-self="stretch" lg="2" md="2" sm="12" cols="12" order-lg="1" order-md="1" order-sm="3" order="3">
      <div class="h-100 mx-1">
        <div class="accordion" role="tablist">

          <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
              <b-button class="_card-button" block v-b-toggle.accordion-1>MIS EVENTOS REGISTRADOS</b-button>
            </b-card-header>
            <b-collapse id="accordion-1" visible role="tabpanel">
              <b-card-body v-for="ws in user_workshops" v-bind:key="ws.id" class="py-2 m-0">
                <b-card-text @click="openRegisterModal(ws)" class="_card-text">
                  @{{ws.name}}
                </b-card-text>
              </b-card-body>
            </b-collapse>
          </b-card>

          <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
              <b-button class="_card-button" block v-b-toggle.accordion-2>REGISTRO A PRÓXIMOS EVENTOS</b-button>
            </b-card-header>
            <b-collapse id="accordion-2" visible role="tabpanel">
              <b-card-body v-for="ws in uwss" v-bind:key="ws.id" class="py-2 m-0">
                <b-card-text @click="openRegisterModal(ws)" class="_card-text">@{{ws.name}}</b-card-text>
              </b-card-body>
            </b-collapse>
          </b-card>

          <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
              <b-button class="_card-button" block v-b-toggle.accordion-3>MAPA DEL SITIO</b-button>
            </b-card-header>
            <b-collapse id="accordion-3" visible role="tabpanel">
              <b-card-body class="py-2 m-0">
                <b-card-text class="_card-text"></b-card-text>
              </b-card-body>
              <b-card-body v-for="ws in workshops" v-bind:key="ws.id" class="py-2 m-0">
                <b-card-text @click="openRegisterModal(ws)" class="_card-text">@{{ws.name}}</b-card-text>
              </b-card-body>
            </b-collapse>
          </b-card>

        </div>
      </div>
    </b-col>

    <b-col class="bg-white" align-self="stretch" lg="8" md="8" sm="12" cols="12" order-lg="2" order-md="2" order-sm="2" order="2">
      <div class="h-fluid border">
        <b-row xl="6" lg="4" md="3" sm="2" cols="2" :no-gutters=true>
@verbatim
          <b-col 
            xl="2" 
            lg="3" 
            md="4" 
            sm="6" 
            cols="6" 
            v-for="ws in workshops" 
            v-bind:key="ws.id"
            >
            <b-card 
              :title=ws.name
              :img-src=ws.imgsrc
@endverbatim
              img-height="150px"
              img-weight="150px"
              img-alt="evento.png"
              img-top
              tag="article"
              class="my-2 mx-1 px-3 py-2"
            >
              <b-card-text>
@verbatim
                {{ws.description}}
              </b-card-text>
              <b-button style="background: #115089;" v-if="ws.registered == false && ws.id != 23" @click="openRegisterModal(ws)">Registrarme</b-button>
              <b-button style="background: #115089;" v-if="ws.registered == false && ws.id == 23" ref="btnShow" @click="showModal(ws)">Registrarme</b-button>
            </b-card>
@endverbatim
          </b-col>
          
          <b-col cols="12">
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
          <b-container class="my-2 mx-1 py-4 bg-light" >
            <b-row>
              <b-col cols="5" class="p-0 px-1 align-items-center text-right">
                <p class="my-1">
                  {{Auth::user()->name}} {{Auth::user()->middlename}} {{Auth::user()->surname}}
                </p>
                <p class="my-1" style="font-size:13px">
                  {{Auth::user()->dependency}}
                </p>
              </b-col>
              <b-col cols="7" class="text-center">
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

@include("auth.20Aniversario.Modales.unirodada")
@include("auth.20Aniversario.Modales.encuesta")

@endsection

<script src="{{ asset('js/aniversario.js') }}" defer></script>
