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
      <div class="row justify-content-center justify-content-sm-start justify-content-md-start justify-content-lg-start justify-content-xl-start mx-1">
        <a href="{{route('Nosotros')}}">
          <button type="button" class="btn botonLeerMas"> Leer más </button>
        </a>
      </div>
     
    </article>
  </div>

  <div class="my-lg-2 my-0 col-md-7 order-1 order-xl-2 order-lg-2 order-md-2 order-sm-1 p-0">
    <div id="carousel" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block" data-ride="carousel">
      
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
              <a href={{route('Proserem',['nombreModal'=> 'modalCursoUPCYCLE'])}} >
                <img src="{{ asset('storage/imagenes/UPCYCLE/marroquineria1.webp')}}" class="imgCaoursel "
                alt="First slide">
              </a>
              <a href={{route('Proserem',['nombreModal'=> 'modalCursoUPCYCLE'])}} >
                <img src="{{ asset('storage/imagenes/UPCYCLE/marroquineria2.webp')}}" class="imgCaoursel "
                  alt="First slide">

              </a>
            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <a href={{route('Proserem',['nombreModal'=> 'modalCursoUPCYCLE'])}} >
                <img src="{{ asset('storage/imagenes/UPCYCLE/marroquineria1.webp')}}" class="imgCaoursel "
                alt="First slide">
              </a>
              <a href={{route('Proserem',['nombreModal'=> 'modalCursoUPCYCLE'])}} >
                <img src="{{ asset('storage/imagenes/UPCYCLE/marroquineria2.webp')}}" class="imgCaoursel "
                  alt="First slide">

              </a>
            </div>
          </div>
        </div>

       
        <div class="carousel-item">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
              <a href={{route('Proserem',['nombreModal'=> '#modalCursoProserem'])}}>
                <img src="{{ asset('storage/imagenes/introduccion/laboratorios.webp')}}" class="imgCaoursel "
                alt="First slide">
              </a>
              <a href={{route('Unihuerto',['nombreModal'=> 'modalTallerUnihuerto'])}}>

                <img src="{{ asset('storage/imagenes/introduccion/UNIHUERTO-ENCASA.webp')}}" class="imgCaoursel "
                alt="First slide">
              </a>

            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <img src="{{ asset('storage/imagenes/introduccion/UNIHUERTO-ENCASA.webp')}}" class="imgCaoursel "
                alt="First slide">
              <img src="{{ asset('storage/imagenes/introduccion/CursoJardineria.webp')}}" class="imgCaoursel "
                alt="First slide">
            </div>
          </div>

        </div>
        <div class="carousel-item">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
              <a href="{{route('Cineminuto')}}">
                
                <img src="{{ asset('storage/imagenes/introduccion/CINEMINUTOO-B-CH.webp')}}" class="imgCaoursel "
                alt="First slide">
              </a>
              <a href="{{route('Cineminuto')}}">  
                <img src="{{ asset('storage/imagenes/introduccion/CINEMINUTOO-B-1.webp')}}" class="imgCaoursel "
                alt="First slide">
              </a>
            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <img src="{{ asset('storage/imagenes/introduccion/CINEMINUTOO-B-CH.webp')}}" class="imgCaoursel "
                alt="First slide">
              <img src="{{ asset('storage/imagenes/introduccion/CINEMINUTOO-B-1.webp')}}" class="imgCaoursel "
                alt="First slide">
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
              <a href="{{route('ConsumoResponsable')}}">

                <img src="{{ asset('storage/imagenes/introduccion/consumo-responsable.webp')}}" class="imgCaoursel "
                alt="First slide">
              </a>
                <a href="{{route('DateUnRespiro')}}">
                  <img src="{{ asset('storage/imagenes/introduccion/daterespiro.webp')}}" class="imgCaoursel "
                  alt="First slide">
                </a>
            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <img src="{{ asset('storage/imagenes/introduccion/consumo-responsable.webp')}}" class="imgCaoursel "
                alt="First slide">
                <a href="{{route('DateUnRespiro')}}">
                  <img src="{{ asset('storage/imagenes/introduccion/daterespiro.webp')}}" class="imgCaoursel "
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
        <div class="carousel-item active">
          <div class="slide-box">
            <a href={{route('Proserem',['nombreModal'=> 'modalCursoUPCYCLE'])}} >
              <img src="{{ asset('storage/imagenes/UPCYCLE/marroquineria2.webp')}}" class="imgCaoursel  w-100 p-0 p-0"
                alt="First slide">
            </a>
          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-box">
            <a href="{{route('Cineminuto')}}">
                
              <img src="{{ asset('storage/imagenes/introduccion/CINEMINUTOO-B-CH.webp')}}" class="imgCaoursel  w-100  p-0"
              alt="First slide">
            </a>
          </div>
        </div>

        <div class="carousel-item">
          <div class="slide-box">
            <a href="{{route('FotografiaS')}}">

              <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia.webp')}}"
              class="imgCaoursel  w-100 p-0 " alt="First slide">
            </a>
            </div>
        </div>
      
        <div class="carousel-item">
          <div class="slide-box">
            <img src="{{ asset('storage/imagenes/introduccion/UNIHUERTO-ENCASA.webp')}}" class="imgCaoursel  w-100 p-0"
              alt="First slide">
          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-box">
            <a href={{route('Unihuerto',['nombreModal'=> 'modalCursoUnihuerto'])}}>
              <img src="{{ asset('storage/imagenes/introduccion/CursoJardineria.webp')}}" class="imgCaoursel  w-100 p-0"
                alt="First slide">

            </a>
          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-box">
            <a href="{{route('DateUnRespiro')}}">
              <img src="{{ asset('storage/imagenes/introduccion/daterespiro.webp')}}" class="imgCaoursel  w-100 p-0"
              alt="First slide">
            </a>

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
    
    <a  href={{route('Nosotros',['id'=> 'Contacto'])}} class="btn btn-secondary w-100 font-weight-bolder " >
      CONTACTO
    </a>
    <x-acordeon :idAcordeon="'acordeonProgramasInstitucionales'" :tituloAcordeon="'PROGRAMAS INSTITUCIONALES'">
    </x-acordeon>
    <x-acordeon :idAcordeon="'acordeonAccesos'" :tituloAcordeon="'ACCESOS'">
    </x-acordeon>
  </div>
</div>

@endsection