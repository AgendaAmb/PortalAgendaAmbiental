@extends('Plantillas.BienvenidaPlantilla')
@push('st')

@endpush
@section('title', 'Bienvenido')


@section('Contenido')
<div class="container-fluid flex-column py-5" style="background-color: rgb(241, 242, 242);">
    <div class="row pl-5">
        <div class="col-xl-3 col-4  col-md-6">
            <div class="row">
                <div class="col-12 ">
                    <p class="font-weight-bolder h1" style="color: rgb(252, 202, 86)">¡BIENVENIDO!</p>
                </div>
                <div class="col-12 px-0">
                    <p class="h5 font-weight-bold" style="color:rgb(18, 98, 174)"> A Mi Portal de la Agenda Ambiental
                    </p>

                </div>
                <div class="col-12 text-justify mt-3 px-0">
                    <p class="">
                        Les brindamos una cordial bienvenida a Mi Portal, diseñado para la colaboración de la Agenda
                        Ambiental, facilitando un espacio de comunicación y gestión.
                        <br>
                        <br>
                        Nuestro portal te brinda las herramientas para facilitar el diálogo, la colaboración, la gestión
                        académica y administrativa, así como la difusión de eventos y noticias,
                        <br>
                        <br>
                        Nos responsabilizamos del manejo, tratamiento, uso y protección de aquellos datos que son
                        proporcionados.
                        <br>
                        <br>
                        Si ya realizaste tu registro inicia sesión para colaborar activamente con tu cuenta, si aún no
                        lo haces realiza tu Registro.
                    </p>
                </div>
                <div class="col-12">
                    <div class="row justify-content-between">
                        <a class="btn btn-primary" href="#" role="button"
                            style="background-color:rgb(18, 98, 174);border-color: rgb(18, 98, 174);">INICIAR SESIÓN</a>
                        <a class="btn btn-primary" href="#" role="button"
                            style="background-color:rgb(18, 98, 174);border-color: rgb(18, 98, 174);">REGÍSTRATE</a>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <div class="container mb-5 p-0">
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
                        <p class=" h4 font-weight-bold" style="color:rgb(18, 98, 174)">CONTACTO</p>
                        <div class="col-lg-12 text-justify p-0 mb-4">
                            <div class="row my-1">
                                <div class="col-2">
                                    <a href="">
                                        <img src="{{asset('/storage/imagenes/Logos/RedesSociales/Facebook.png')}}"
                                            height="30" width="30" alt="">
                                    </a>
                                </div>
                                <div class="col-10">
                                    <a href="" style="color:rgb(18, 98, 174)">Agenda Ambiental UASLP</a>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-2">
                                    <a href="">
                                        <img src="{{asset('/storage/imagenes/Logos/RedesSociales/Instagram.png')}}"
                                            height="30" width="30" alt="">
                                    </a>
                                </div>
                                <div class="col-10">
                                    <a href="" style="color:rgb(18, 98, 174)">agendaambiental_uaslp</a>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-2">
                                    <a href="">
                                        <img src="{{asset('/storage/imagenes/Logos/RedesSociales/Twitter.png')}}"
                                            height="30" width="30" alt="">
                                    </a>
                                </div>
                                <div class="col-10">
                                    <a href="" style="color:rgb(18, 98, 174)">AgendaAmbientalUASLP</a>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-2">
                                    <a href="">
                                        <img src="{{asset('/storage/imagenes/Logos/RedesSociales/Youtube.png')}}"
                                            height="30" width="30" alt="">
                                    </a>
                                </div>
                                <div class="col-10">
                                    <a href="" style="color:rgb(18, 98, 174)">Agenda Ambiental UASLP</a>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-2">
                                    <a href="">
                                        <img src="{{asset('/storage/imagenes/Logos/RedesSociales/Buzon.png')}}"
                                            height="30" width="30" alt="">
                                    </a>
                                </div>
                                <div class="col-10">
                                    <a href="http://a.uaslp.mx/ContactaCAA" style="color:rgb(18, 98, 174)">Buzón</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-8 col-md-6">
            <div class="container-fluid" style="border-radius:15px;background-color:rgb(18, 98, 174);">
                <div class="row p-5" style="color: white;">
                    <div class="col-12">
                        <p>Puedes seguir las instrucciones de este video para registrarte</p>
                        <video controls style="height: 350px;width: 100%;">
                            <source src="" type="video/mp4" autoplay>
                        </video>
                        <p>Instrucctivo de registro <a href="">Descargar</a></p>
                    </div>
                    <div class="col-6 mt-4">
                        <div class="row row-cols-xl-2 row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-2 justify-content-center">
                            <div class="col my-2">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{asset('/storage/imagenes/Logos/GestionAcadem.png')}}" height="50" width="50" alt="">
                                    </div>
                                    <div class="col-7 my-auto">
                                        <p class="my-auto">Gestión academica</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col my-2">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{asset('/storage/imagenes/Logos/GestionAcadem.png')}}" height="50" width="50" alt="">
                                    </div>
                                    <div class="col-7 my-auto">
                                        <p class="my-auto">Gestión academica</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col my-2">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{asset('/storage/imagenes/Logos/GestionAcadem.png')}}" height="50" width="50" alt="">
                                    </div>
                                    <div class="col-7 my-auto">
                                        <p class="my-auto">Gestión academica</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col my-2">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{asset('/storage/imagenes/Logos/GestionAcadem.png')}}" height="50" width="50" alt="">
                                    </div>
                                    <div class="col-7 my-auto">
                                        <p class="my-auto">Gestión academica</p>
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


<script>
    var app = new Vue({
  el: '#Registro',
  data: {
    PerteneceUaslp:'',
    Pais:'',
    userInfo:'',
    emailR:'',
    nombres:'',
    ApellidoP:'',
    ApellidoM:'',
    passwordR:'',
    password:'',
    Errores:[],
    Facultad:'',
    Edad:'',
    Genero:'',
    OtroGenero:'',
    GEtnico:'',
    CP:'',
    isDiscapacidad:'',
    Discapacidad:'',
    LugarResidencia:'',
    spinnerVisible:false,
    urlAnterior:'',
    registroVa:'',
    CorreoAlterno:'',
    Ocupacion:'',
  },
  mounted:function () {
  
},


       
})
</script>
@endsection