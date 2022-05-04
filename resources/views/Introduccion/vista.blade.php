@extends('Bienvenido')

@section('Introduccion')
<x-btns-ejes>

</x-btns-ejes>

<div class="mt-3 row justify-content-center">
  <div class="my-4 col-md-5 order-2 order-xl-1 order-lg-1 order-md-1 order-sm-2">
    <article>
      <p class="text-justify px-0" id="textoInicio">
        El primer antecedente de la Agenda Ambiental es la Comisión
        de Medio Ambiente de la Universidad Autónoma de San Luis Potosí
        que nace en 1992 por iniciativa de profesores de las Facultades
        de Ingeniería, Ciencias Químicas y Medicina, bajo la rectoría de
        Lic. Alfonso Lastras Ramírez, bajo la coordinación del Dr. Pedro
        Medellín Milán. Más tarde, en 1996 se crea el Diplomado en Gestión
        Ambiental y Ecología, que lleva la multidisciplina hacia una
        propuesta formal de los estudios ambientales.
      </p>
      <div
        class="row justify-content-center justify-content-sm-start justify-content-md-start justify-content-lg-start justify-content-xl-start mx-1">
        <a href="{{route('Nosotros')}}">
          <button type="button" class="btn botonLeerMas"> Leer más </button>
        </a>
      </div>

    </article>
  </div>

  <div class="my-lg-2 my-0 col-md-7 order-1 order-xl-2 order-lg-2 order-md-2 order-sm-1 p-0">
    <div id="carousel" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block" data-ride="carousel">

      <div class="carousel-inner">
<!--
        <div class="carousel-item active">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
              <a href={{route('mmus2021')}}>
                <img src="{{ asset('/storage/imagenes/mmus2021/Banner2.png')}}" class="imgCaoursel " alt="First slide">
              </a>
              <a href={{route('mmus2021')}}>
                <img src="{{ asset('/storage/imagenes/mmus2021/Banner1.png')}}" class="imgCaoursel " alt="First slide">
              </a>

            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <a href={{route('mmus2021')}}>
                <img src="{{ asset('/storage/imagenes/mmus2021/Banner2.png')}}" class="imgCaoursel " alt="First slide">
              </a>
              <a href={{route('mmus2021')}}>
                <img src="{{ asset('/storage/imagenes/mmus2021/Banner1.png')}}" class="imgCaoursel " alt="First slide">
              </a>

            </div>
          </div>

        </div>
      -->
        <div class="carousel-item active">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
             
              <a href={{route('educación',['nombreModal'=> 'CartelPromotores'])}}>
                <img src="{{asset('/storage/imagenes/Promotores/Promotores1.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
              <a href={{route('educación',['nombreModal'=> 'CartelPromotores'])}}>
                <img src="{{asset('/storage/imagenes/Promotores/Promotores2.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              
              <a href={{route('educación',['nombreModal'=> 'CartelPromotores'])}}>
                <img src="{{ asset('/storage/imagenes/Promotores/Promotores1.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
              <a href={{route('educación',['nombreModal'=> 'CartelPromotores'])}}>
                <img src="{{asset('/storage/imagenes/Promotores/Promotores2.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
            </div>
          </div>
        </div>

        <div class="carousel-item ">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
             
              <a href={{route('Unihuerto',['nombreModal'=> 'modalUnitrueque'])}}>
                <img src="{{asset('/storage/imagenes/Unitrueque/B_UniTrueque1.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
              <a href={{route('Unihuerto',['nombreModal'=> 'modalUnitrueque'])}}>
                <img src="{{asset('/storage/imagenes/Unitrueque/B_UniTrueque2.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              
              <a href={{route('Unihuerto',['nombreModal'=> 'modalUnitrueque'])}}>
                <img src="{{ asset('/storage/imagenes/Unitrueque/B_UniTrueque1.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
              <a href={{route('Unihuerto',['nombreModal'=> 'modalUnitrueque'])}}>
                <img src="{{asset('/storage/imagenes/Unitrueque/B_UniTrueque2.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
            </div>
          </div>

        </div>
      
        <!--<div class="carousel-item ">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
              <a  href={{route('Gemas')}}>
                <img src="{{ asset('storage/imagenes/17Gemas/Banner1.png')}}" class="imgCaoursel " alt="First slide">
              </a>
              <a href={{route('Gemas')}}>
                <img src="{{ asset('storage/imagenes/17Gemas/Banner2.png')}}" class="imgCaoursel " alt="First slide">
              </a>
             
            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <a href={{route('Gemas')}}>
                <img src="{{ asset('/storage/imagenes/17Gemas/Banner1.png')}}" class="imgCaoursel " alt="First slide">
              </a>
              <a href={{route('Gemas')}}>
                <img src="{{ asset('/storage/imagenes/17Gemas/Banner2.png')}}" class="imgCaoursel " alt="First slide">
              </a>
            </div>
          </div>

        </div>-->

       
        <div class="carousel-item ">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
              <a href={{route('Unihuerto',['nombreModal'=> 'modalTallerUnihuerto'])}}>
                <img src="{{ asset('/storage/imagenes/Unihuerto/B_Unihuerto1.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
              <a href={{route('Unihuerto',['nombreModal'=> 'modalTallerUnihuerto'])}}>
                <img src="{{ asset('/storage/imagenes/Unihuerto/B_Unihuerto2.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <a href={{route('Unihuerto',['nombreModal'=> 'modalTallerUnihuerto'])}}>
                <img src="{{ asset('/storage/imagenes/Unihuerto/B_Unihuerto1.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
              <a href={{route('Unihuerto',['nombreModal'=> 'modalTallerUnihuerto'])}}>
                <img src="{{ asset('/storage/imagenes/Unihuerto/B_Unihuerto2.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
            </div>
          </div>
        </div>

        <div class="carousel-item ">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
              <a href={{route('ConsumoResponsable',['nombreModal'=> 'CartelEspacioConsumo'])}}>
                <img src="{{ asset('/storage/imagenes/ConsumoResponsable/BannerECR_1.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
              <a href={{route('ConsumoResponsable',['nombreModal'=> 'CartelEspacioConsumo'])}}>
                <img src="{{ asset('/storage/imagenes/ConsumoResponsable/BannerECR_2.png')}}" class="imgCaoursel "
                  alt="First slide">

              </a>
            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <a href={{route('ConsumoResponsable',['nombreModal'=> 'CartelEspacioConsumo'])}}>
                <img src="{{ asset('/storage/imagenes/ConsumoResponsable/BannerECR_1.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
              <a href={{route('ConsumoResponsable',['nombreModal'=> 'CartelEspacioConsumo'])}}>
                <img src="{{ asset('/storage/imagenes/ConsumoResponsable/BannerECR_2.png')}}" class="imgCaoursel "
                  alt="First slide">

              </a>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
             
              <a href={{route('Gestion',['nombreModal'=> 'pdf'])}}>
                <img src="{{asset('/storage/imagenes/PUR/Banner1.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
              <a href={{route('Gestion',['nombreModal'=> 'pdf'])}}>
                <img src="{{asset('/storage/imagenes/PUR/Banner2.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              
              <a href={{route('Gestion',['nombreModal'=> 'pdf'])}}>
                <img src="{{ asset('/storage/imagenes/PUR/Banner1.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
              <a href={{route('Gestion',['nombreModal'=> 'pdf'])}}>
                <img src="{{asset('/storage/imagenes/PUR/Banner2.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
            </div>
          </div>          
        </div>
        <!--
        <div class="carousel-item">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
              <img src="{{ asset('storage/imagenes/introduccion/CicloAgua.png')}}" class="imgCaoursel "
                alt="First slide">
              <img src="{{ asset('storage/imagenes/introduccion/ConcursoCinemi.png')}}" class="imgCaoursel "
                alt="First slide">

            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <img src="{{ asset('storage/imagenes/introduccion/CicloAgua.png')}}" class="imgCaoursel "
                alt="First slide">
              <img src="{{ asset('storage/imagenes/introduccion/ConcursoCinemi.png')}}" class="imgCaoursel "
                alt="First slide">
            </div>
          </div>

        </div>
      -->
        <div class="carousel-item">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
              <a href="{{route('DateUnRespiro')}}">

                <img src="{{ asset('/storage/imagenes/DateUnRespiro/BannerDateRespiro1.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
              <a href="{{route('DateUnRespiro')}}">
                <img src="{{ asset('/storage/imagenes/DateUnRespiro/BannerDateRespiro2.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <img src="{{ asset('/storage/imagenes/DateUnRespiro/BannerDateRespiro1.png')}}" class="imgCaoursel "
                alt="First slide">
              <a href="{{route('DateUnRespiro')}}">
                <img src="{{ asset('/storage/imagenes/DateUnRespiro/BannerDateRespiro2.png')}}" class="imgCaoursel "
                  alt="First slide">
              </a>
            </div>
          </div>
        </div>
      </div>


      <a class="carousel-control-prev " href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div id="carouselResponse" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
      data-ride="carousel">

      <div class="carousel-inner">

        <!--<div class="carousel-item ">
          <div class="slide-box">
            <a href={{route('mmus2021')}}>
              <img src="{{ asset('storage/imagenes/mmus2021/Banner1.png')}}" class="imgCaoursel w-100 p-0 p-0 "
                alt="First slide">
            </a>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="slide-box">
            <a href={{route('mmus2021',['nombreModal'=> 'modalUnirodada'])}}>
              <img src="{{ asset('storage/imagenes/mmus2021/Banner1Unirodada.png')}}" class="imgCaoursel w-100 p-0 p-0 "
                alt="First slide">
            </a>
          </div>
        </div>
        
      -->
      <div class="carousel-item active">
        <div class="slide-box">
          <a href={{route('Unihuerto',['nombreModal'=> 'modalTallerAgricultura'])}}>
            <img src="{{asset('/storage/imagenes/Unihuerto/TallerAgricultura_1.png')}}" class="imgCaoursel w-100 p-0 p-0 "
            alt="First slide">
        </a>
        </div>
      </div>
     
        <div class="carousel-item ">
          <div class="slide-box">
            <a href={{route('Gemas')}}>
              <img src="{{ asset('storage/imagenes/17Gemas/Banner1.png')}}" class="imgCaoursel w-100 p-0 p-0 "
                alt="First slide">
            </a>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="slide-box">
            <a href={{route('Educacion',['nombreModal'=> 'CartelPromotores'])}}>
              <img src="{{ asset('storage/imagenes/introduccion/Promotores1.png')}}" class="imgCaoursel w-100 p-0 p-0 "
                alt="First slide">
            </a>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="slide-box">
            <a href={{route('ConsumoResponsable',['nombreModal'=> 'CartelEspacioConsumo'])}}>
              <img src="{{ asset('storage/imagenes/ConsumoResponsable/B_ECR_Nov2021.png')}}"
                class="imgCaoursel w-100 p-0 p-0 " alt="First slide">
            </a>
          </div>
        </div>


        <div class="carousel-item">
          <div class="slide-box">
            <a href="{{route('DateUnRespiro')}}">
              <img src="{{ asset('storage/imagenes/DateUnRespiro/BannerDateRespiro1.png')}}"
                class="imgCaoursel  w-100 p-0 " alt="First slide">
            </a>
          </div>
        </div>


      </div>

      <a class="carousel-control-prev" href="#carouselResponse" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselResponse" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
</div>

<div class="mt-3 row justify-content-between  Ejes d-none d-xl-flex d-lg-flex d-md-flex">
  <div class="col-md-7 pl-5 ">
    <div class="envoltorioCirculoODS">
      <img src="storage/imagenes/ods/circulo-UASLP-SOCIEDAD.webp" class="img-fluid" width="518" id="circuloODS"
        usemap="#circuloODS">
      <a href="{{route('Gestion')}}">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/gestion.webp" id="gestion" width="270">
      </a>
      <a href="{{route('Educacion')}}">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/educacion.webp" id="educacion" width="270">
      </a>

      <a href="{{route('Vinculacion')}}">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/vinculacion.webp" id="vinculacion" width="270">
      </a>

      <a href="{{route('Comunicacion')}}">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/comunicacion.webp" id="comunicacion" width="270">
      </a>

      <a href="http://www.uaslp.mx">
        <img class="img-fluid" src="storage/imagenes/ods/circulo-UASLP-SOCIEDAD-e1587668903442.webp" id="circuloUaslp"
          width="228">
      </a>

      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/1.png" width="131" id="ods1">
      </a>
      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/2.png" width="131" id="ods2">
      </a>
      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/3.png" width="131" id="ods3">
      </a>

      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/4.png" width="131" id="ods4">
      </a>

      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/5.png" width="131" id="ods5">
      </a>

      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/6.png" width="131" id="ods6">
      </a>

      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/7.png" width="131" id="ods7">
      </a>

      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/8.png" width="103" id="ods8">
      </a>

      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/9.png" width="103" id="ods9">
      </a>

      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/10.png" width="131" id="ods10">
      </a>
      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/11.png" width="131" id="ods11">
      </a>
      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/12.png" width="131" id="ods12">

      </a>
      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/13.png" width="131" id="ods13">
      </a>
      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/14.png" width="131" id="ods14">
      </a>
      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/15.png" width="131" id="ods15">
      </a>
      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/16.png" width="131" id="ods16">
      </a>
      <a href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/17.png" width="131" id="ods17">
      </a>
    </div>
  </div>
  <div class="col-md-3 px-0">

    <a href={{route('Nosotros',['id'=> 'Contacto'])}} class="btn btn-secondary w-100 font-weight-bolder ">
      CONTACTO
    </a>
    <x-acordeon :idAcordeon="'acordeonProgramasInstitucionales'" :tituloAcordeon="'PROGRAMAS INSTITUCIONALES'">
    </x-acordeon>
    <x-acordeon :idAcordeon="'acordeonAccesos'" :tituloAcordeon="'ACCESOS'">
    </x-acordeon>

  </div>
</div>
<div class="modal fade" id="Concurso17gemas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body py-0">
        <div class="col-12 mb-4 ml-3 p-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
          </button>
        </div>
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12 col-xl-10 col-lg-10 col-md-10 col-sm-10 ">
              <img src="{{asset('storage/imagenes/17Gemas/Cartel17Gemas.png')}}" class="img-fluid" alt="">
            </div>
          </div>
          <div
            class="row justify-content-start justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-xl-5 mx-2 mt-2">
            <div class=" col-4 col-xl-4 col-lg-3 col-md-6 col-sm-6  px-0 px-xl-3">
            <a href="{{route('login')}}" class="btn btn-secondary bg-light  text-muted  "  id="botones" role="button"
              id="botones">REGISTRO</a>
            </div>
              <div class=" col-4 col-xl-4 col-lg-3 col-md-6 col-sm-6  ">
            <a href="{{asset('storage/imagenes/17Gemas/Bases17gemas.pdf')}}"
              class="btn btn-secondary bg-light  text-muted  " href="#" role="button" id="botones"
              download="Bases17gemas.pdf">BASES </a>
        </div>
              <div class=" col-4 col-xl-3 col-lg-3 col-md-6 col-sm-6 mr-xl-3 ">
            <a href="{{asset('storage/imagenes/17Gemas/Cartel17Gemas.png')}}"
              class="btn btn-secondary bg-light  text-muted  pr-0 mr-xl-3" href="#" role="button" id="botones"
              download="Cartel17Gemas.png">CARTEL </a>
            </div>
            <div class="row justify-content-center">
              <div class="col-10" style="color:white; font-size:15px; padding-top: 3%; font-family: 'Myraid light';' ">
                <br>
                <p class="h4 font-weight-bold text-justify" style=" color: #5c94d7;">¡Ayúdanos a encontrar las 17 gemas
                  de la sostenibilidad y lograr la mejor
                  universidad de los 14 millones de futuros posibles! </p>
                <br>
                <p style="font-size: 15px;" class="text-justify">
                  La Agenda Ambiental, Dirección de Fomento Editorial y Publicaciones, Dirección de Comunicación Social
                  e Imagen, División de Desarrollo Humano y la División de Servicios Estudiantiles incitan a los
                  administradores, docentes y alumnos de la UASLP a participar en el concurso “17 gemas para la
                  Unisostenibilidad” durante el periodo de septiembre 2021 a junio 2022.


                </p>
                <p style="font-size: 15px;" class="text-justify">
                  Para participar primero tendrás que registrarte con tu correo institucional a la Comunidad de la
                  Agenda Ambiental en el botón "Registrate", sigue los pasos que se te indican después complementa el
                  registro del concurso “17 gemas para la Unisostenibilidad” para que puedas tener acceso a la
                  plataforma.

                </p>

                <p style="font-size: 15px;" class="text-justify">Para mayor información consulta las <a
                    href="{{asset('storage/imagenes/17Gemas/Bases17gemas.pdf')}}"
                    download="Bases17gemas.pdf">bases.</a></p>

              </div>
            </div>

          </div>

        </div>

      </div>

    </div>
  </div>
</div>

<script>
  if ('{{$NombreM}}'!='') {
    $('#{{$NombreM}}').modal('show')
  } 
  
</script>
@endsection