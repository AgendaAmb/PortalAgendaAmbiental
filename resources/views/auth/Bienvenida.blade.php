@extends('Plantillas.BienvenidaPlantilla')
@push('st')

@endpush
@section('title', 'Bienvenido')


@section('Contenido')

<div class="container-fluid flex-column py-5" style="background-color: rgb(241, 242, 242);">
    <div class="row pl-xl-5 px-3">
        <div class="col-xl-4 col-12 col-md-5">
            <div class="row">
                <div class="col-12 ">
                    <p class="font-weight-bolder h1 text-center" style="color: rgb(252, 202, 86)">¡BIENVENID@!</p>
                </div>
                <div class="col-12 px-0">
                    <p class="h5 font-weight-bold text-center" style="color:rgb(18, 98, 174)"> A Mi Portal de la Agenda Ambiental
                    </p>

                </div>
                <div class="col-12 text-justify mt-3 px-0">
                    <p class="">
                        Les brindamos una cordial bienvenida a Mi Portal, diseñado para la colaboración de la Agenda
                        Ambiental, facilitando un espacio de comunicación y gestión.
                        <br>
                        
                        Nuestro portal te brinda las herramientas para facilitar el diálogo, la colaboración, la gestión
                        académica y administrativa, así como la difusión de eventos y noticias,
                        <br>
                    
                        Nos responsabilizamos del manejo, tratamiento, uso y protección de aquellos datos que son
                        proporcionados.
                        <br>
                        
                        Si ya realizaste tu registro inicia sesión para colaborar activamente con tu cuenta, si aún no
                        lo haces realiza tu Registro.
                    </p>
                </div>
                <div class="col-12 mt-3">
                    <div class="row justify-content-around">
                        <a class="btn btn-primary" href="{{route('login')}}" role="button"
                            style="background-color:rgb(18, 98, 174);border-color: rgb(18, 98, 174);">INICIAR SESIÓN</a>
                        <a class="btn btn-primary" href={{route('login',['Nuevo'=> true])}} role="button"
                            style="background-color:rgb(18, 98, 174);border-color: rgb(18, 98, 174);">REGÍSTRATE</a>
                    </div>
                </div>
                <div class="col-12 mt-5 px-0">
                    <div class="container  p-0">
                        <p class="h4 font-weight-bold" style="color:rgb(18, 98, 174)">ADMINISTRATIVOS / DOCENTES </p>
                        <div class="col-lg-12  col-xl-12 text-justify  p-0 mb-4">
                            <p class=" text-muted h6"> Ingresa con tu cuenta de correo institucional, ya que el usuario
                                y
                                contraseña son los mismos. Si no cuentas con tu cuenta de correo, lo puede habilitar <a
                                    href=" https://tic.uaslp.mx/habilitacorreo">
                                    https://tic.uaslp.mx/habilitacorreo</a>
                                <br>
                                y posteriormente registrarte <a class="font-weight-bold" data-toggle="modal"
                                    data-target="#Registro">
                                    {{ __(' aquí.') }}
                                </a>
                            </P>
                        </div>
                        <p class=" h4 font-weight-bold" style="color:rgb(18, 98, 174)">PÚBLICO EN GENERAL </p>
                        <div class="col-lg-12 text-justify p-0 mb-4">
                            <p class=" text-muted h6">Ingresa con tu cuenta de correo electrónico que registraste, si no
                                recuerdas tu contraseña, podrás restablecerla<a href=" {{route('password.request')}}">
                                    aquí</a>
                                <br>

                                </a>
                            </P>
                        </div>
                        <p class=" h4 font-weight-bold mt-5" style="color:rgb(18, 98, 174)">CONTACTO</p>
                        <div class="col-lg-12 text-justify p-0 mb-4">
                            <div class="row my-1">
                                <div class="col-1 pr-0 mr-3">
                                    <a href="">
                                        <img src="{{asset('/storage/imagenes/Logos/RedesSociales/Facebook.png')}}"
                                            height="30" width="30" alt="">
                                    </a>
                                </div>
                                <div class="col-10 px-0">
                                    <a href="" style="color:rgb(18, 98, 174)">Agenda Ambiental UASLP</a>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-1 pr-0 mr-3">
                                    <a href="">
                                        <img src="{{asset('/storage/imagenes/Logos/RedesSociales/Instagram.png')}}"
                                            height="30" width="30" alt="">
                                    </a>
                                </div>
                                <div class="col-10 px-0">
                                    <a href="" style="color:rgb(18, 98, 174)">agendaambiental_uaslp</a>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-1 pr-0 mr-3">
                                    <a href="">
                                        <img src="{{asset('/storage/imagenes/Logos/RedesSociales/Twitter.png')}}"
                                            height="30" width="30" alt="">
                                    </a>
                                </div>
                                <div class="col-10 px-0">
                                    <a href="" style="color:rgb(18, 98, 174)">AgendaAmbientalUASLP</a>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-1 pr-0 mr-3">
                                    <a href="">
                                        <img src="{{asset('/storage/imagenes/Logos/RedesSociales/Youtube.png')}}"
                                            height="30" width="30" alt="">
                                    </a>
                                </div>
                                <div class="col-10 px-0">
                                    <a href="" style="color:rgb(18, 98, 174)">Agenda Ambiental UASLP</a>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-1 mr-3 pr-0">
                                    <a href="">
                                        <img src="{{asset('/storage/imagenes/Logos/RedesSociales/Buzon.png')}}"
                                            height="30" width="30" alt="" >
                                    </a>
                                </div>
                                <div class="col-10 px-0">
                                    <a href="http://a.uaslp.mx/ContactaCAA" style="color:rgb(18, 98, 174)" >Buzón</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7 col-12 col-md-7 mx-auto px-0">
            <div class="container-fluid" style="border-radius:15px;background-color:rgb(18, 98, 174); height: 100%;">
                <div class="row p-xl-5 p-3" style="color: white;">
                    <div class="col-12">
                        <p>Puedes seguir las instrucciones de este video para registrarte</p>
                        <video controls  id="videoRegistro">
                            <source src="" type="video/mp4" autoplay>
                        </video>
                        <p>Instrucctivo de registro <a href="">Descargar</a></p>
                    </div>
                    <div class="col-xl-8 col-12 my-xl-5 mx-auto">
                        <div class="row row-cols-xl-2 row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-2 justify-content-center">
                            <div class="col my-2">
                                <div class="row">
                                    <div class="col-3 col-xl-3">
                                        <img src="{{asset('/storage/imagenes/Logos/GestionAcadem.png')}}" height="50" width="50" alt="">
                                    </div>
                                    <div class="col-xl-9 col-10 my-auto">
                                        <p class="my-auto">Gestión academica</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col my-2">
                                <div class="row">
                                    <div class="col-3 col-xl-3">
                                        <img src="{{asset('/storage/imagenes/Logos/GestionAdministrativa.png')}}" height="50" width="50" alt="">
                                    </div>
                                    <div class="col-xl-9 col-10 my-auto">
                                        <p class="my-auto">Gestión Administrativa</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col my-2">
                                <div class="row">
                                    <div class="col-3 col-xl-3">
                                        <img src="{{asset('/storage/imagenes/Logos/Comunicacion.png')}}" height="50" width="50" alt="">
                                    </div>
                                    <div class="col-xl-9 col-10 my-auto">
                                        <p class="my-auto">Comunicación</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col my-2">
                                <div class="row ">
                                    <div class="col-3 col-xl-3">
                                        <img src="{{asset('/storage/imagenes/Logos/Vinculacion.png')}}" height="50" width="50" alt="">
                                    </div>
                                    <div class="col-xl-9 col-10 my-auto">
                                        <p class="my-auto">Vinculación</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>



@endsection