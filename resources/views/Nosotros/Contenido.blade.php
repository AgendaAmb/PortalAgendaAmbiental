@extends('Nosotros.Nosotros')

@section('Contenido-Nosotros')

     <div class="col-xl-12 p-0">
        <img src="storage/imagenes/Nosotros/portada.jpg" class="img-fluid mx-auto d-block my-2" alt="" srcset="">
      </div>
      <x-btns-ejes>

      </x-btns-ejes>
            <div class="container-fluid mt-4">
                <div class="row justify-content-between">
                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 ml-4  order-2 order-sm-2 order-md-1">
                     @include('Nosotros.Tabla')
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12  order-1  order-sm-1 order-md-2 mb-3">
                        <div class="nav flex-sm-column flex-shrink-0 justify-content-between nav-pills" id="tab-nosotros" role="tablist" >
                          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#Historia" role="tab" aria-controls="v-pills-home" aria-selected="true" >HISTORIA</a>
                          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#QUIENESSOMOS" role="tab" aria-controls="v-pills-profile" aria-selected="false">¿QUIENES SOMOS?</a>
                          <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#Normativa" role="tab" aria-controls="v-pills-messages" aria-selected="false">NORMATIVA</a>
                          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#MISION" role="tab" aria-controls="v-pills-settings" aria-selected="false">MISIÓN Y VISIÓN</a>
                          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#DIRECTORIO" role="tab" aria-controls="v-pills-settings" aria-selected="false">DIRECTORIO</a>
                          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#CONTACTO" role="tab" aria-controls="v-pills-settings" aria-selected="false">CONTACTO</a>
                        </div>
                      </div>
                  </div>
            </div>
        </div>
@endsection