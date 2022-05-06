@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center my-2">
    <img src="{{ asset('storage/imagenes/Logos/Bs_Proserem.png') }}"
        class="rounded mx-auto d-block w-50 py-xl-5 py-md-5 align-middle" alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-8">
    <p class="text-justify pSize pt-3 pt-xl-3 pt-lg-3  pt-md-0 my-5">
        Son programas de actualización profesional, formación general o especializada en temas ambientales. Se dirige hacia la capacitación para el manejo de los instrumentos de gestión ambiental (evaluación de impacto ambiental, planeación y ordenamientos ecológicos, manejo de áreas naturales protegidas), normativas vigentes o conceptos, metodologías y técnicas de educación ambiental.
        <br><br>

        Esta modalidad ofrece oportunidades flexibles, diversificadas y de gran calidad a personas adultas que desean o requieren profundizar o extender su conocimiento hacia áreas complementarias para su desarrollo profesional, o que quieren conocer las últimas tendencias relacionadas con la sostenibilidad.
        <br><br>

</div>
@endsection

@section('BannerBotones')
<div class="row justify-content-center justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-between">
    <div class="col-12 ">
        <img src="{{asset('storage/imagenes/Cursos/B_RE.png')}}" class="img-fluid" alt="" srcset="">
        <img src="{{asset('storage/imagenes/Cursos/B_REI.png')}}" class="img-fluid" alt="" srcset="">
        <img src="{{asset('storage/imagenes/Cursos/B_SC.png')}}" class="img-fluid" alt="" srcset="">
    </div>

</div>

@endsection

@section('ObjetivosTexto')
@endsection

@section('Modales')
@endsection

@push('stylesheets')
<link href="{{ asset('css/nav-tabs_contenido.css') }}" rel="stylesheet" type="text/css">
@endpush