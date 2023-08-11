@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center my-2">
    <img src="{{ asset('storage/imagenes/Logos/CursosActualizacion.png') }}" class="rounded mx-auto d-block w-50 py-xl-5 py-md-5 align-middle" alt="" srcset="">
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
    <div class="col-4">
        <a href="#" data-toggle="modal" data-target="#REG" data-modalname="REG">
            <img src="{{asset('storage/imagenes/Cursos/B_REG_2023.jpg')}}" class="img-fluid" alt="" srcset="">
        </a>
    </div>

    <div class="col-4 ">
        <a href="#" data-toggle="modal" data-target="#RI" data-modalname="RI">
            <img src="{{asset('storage/imagenes/Cursos/B_RI_2023.jpg')}}" class="img-fluid" alt="" srcset="">
        </a>
    </div>
    <div class="col-4 ">
        <a href="#" data-toggle="modal" data-target="#SCMU" data-modalname="SCMU">
            <img src="{{asset('storage/imagenes/Cursos/B_SCMU_2023.jpg')}}" class="img-fluid" alt="" srcset=""></a>
    </div>

</div>

@endsection


@section('Modales')
<div class="modal fade" id="REG" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body py-0">
                <div class="col-12 mb-4 ml-3 p-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 ">
                            <img src="{{asset('storage/imagenes/Cursos/Cartel_REG_2023.jpg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="row justify-content-around justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-3 mx-lg-5 mx-xl-5  mx-md-5 mx-sm-5 mt-2 ">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'CursosActualizacion'])}} class="btn btn-secondary bg-light  text-muted downloadBtn " role="button">REGISTRAR</a>
                        </div>

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Cursos/Cartel_REG_2023.jpg')}}" class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button" download="Cartel_REG_2023.jpg">CARTEL GENERAL </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <br><br>
</div>

<div class="modal fade" id="RI" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body py-0">
                <div class="col-12 mb-4 ml-3 p-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 ">
                            <img src="{{asset('storage/imagenes/Cursos/Cartel_RI_2023.jpg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="row justify-content-around justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-3 mx-lg-5 mx-xl-5  mx-md-5 mx-sm-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'CursosActualizacion'])}} class="btn btn-secondary bg-light  text-muted downloadBtn " role="button">REGISTRAR</a>
                        </div>

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Cursos/Cartel_RI_2023.jpg')}}" class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button" download="Cartel_RI_2023.jpg">CARTEL GENERAL </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <br><br>
</div>

<div class="modal fade" id="SCMU" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body py-0">
                <div class="col-12 mb-4 ml-3 p-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 ">
                            <img src="{{asset('storage/imagenes/Cursos/Cartel_SCMU_2023.jpg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="row justify-content-around justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-3 mx-lg-5 mx-xl-5  mx-md-5 mx-sm-5 mt-2 ">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'CursosActualizacion'])}} class="btn btn-secondary bg-light  text-muted downloadBtn " role="button">REGISTRAR</a>
                        </div>

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/Cursos/Cartel_SCMU_2023.jpg')}}" class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button" download="Cartel_SCMU_2023.jpg">CARTEL GENERAL </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <br><br>
</div>

@endsection


@push('stylesheets')
<link href="{{ asset('css/nav-tabs_contenido.css') }}" rel="stylesheet" type="text/css">
@endpush