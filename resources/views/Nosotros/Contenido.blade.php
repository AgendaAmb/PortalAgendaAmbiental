@extends('Nosotros.Nosotros')

@section('Contenido-Nosotros')

<div class="col-xl-12 p-0">
  <img src="{{asset('storage/imagenes/Nosotros/portada.jpg')}}" class="img-fluid mx-auto d-block my-2" alt="" srcset="">
</div>
<x-btns-ejes>

</x-btns-ejes>
<div class="container-fluid mt-4">
  <div class="row justify-content-between">
    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 ml-4  order-2 order-sm-2 order-md-1">
      @include('Nosotros.Tabla')
    </div>

    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12  order-1  order-sm-1 order-md-2 mb-3 d-none d-xl-block d-lg-block d-md-block">
      <div class="nav flex-sm-column flex-shrink-0 justify-content-between nav-pills" id="tab-nosotros" role="tablist">
        <a @if ($id=="Historia" ||$id==null) class="nav-link active" @else class="nav-link" @endif id="v-pills-home-tab"
          data-toggle="pill" href="#Historia" role="tab" aria-controls="v-pills-home" aria-selected="true">HISTORIA </a>
        <a @if ($id=='QuienesSomos' ) class="nav-link active" @else class="nav-link" @endif id="v-pills-profile-tab"
          data-toggle="pill" href="#QUIENESSOMOS" role="tab" aria-controls="v-pills-profile"
          aria-selected="false">¿QUIENES SOMOS?
        </a>
        <a @if ($id=='Normativa' ) class="nav-link active" @else class="nav-link" @endif id="v-pills-messages-tab"
          data-toggle="pill" href="#Normativa" role="tab" aria-controls="v-pills-messages"
          aria-selected="false">NORMATIVA
        </a>
        <a @if ($id=='MisiónVisión' ) class="nav-link active" @else class="nav-link" @endif id="v-pills-settings-tab"
          data-toggle="pill" href="#MISION" role="tab" aria-controls="v-pills-settings" aria-selected="false">MISIÓN Y
          VISIÓN
        </a>
        <a @if ($id=='Directorio' ) class="nav-link active" @else class="nav-link" @endif id="v-pills-settings-tab"
          data-toggle="pill" href="#DIRECTORIO" role="tab" aria-controls="v-pills-settings"
          aria-selected="false">DIRECTORIO
        </a>
        <a @if($id=='Contacto' ) class="nav-link active" @else class="nav-link" @endif id="v-pills-settings-tab"
          data-toggle="pill" href="#CONTACTO" role="tab" aria-controls="v-pills-settings" aria-selected="false">CONTACTO
        </a>
      </div>
    </div>
  </div>
</div>
</div>
@endsection