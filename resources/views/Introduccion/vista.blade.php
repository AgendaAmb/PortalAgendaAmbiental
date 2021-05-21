@extends('Bienvenido')

@section('Introduccion')
<div class="container EjesTrabajo col-md-12 col-sm-12">
    <div class="btn-group flex-wrap" role="group" aria-label="Basic example">
        <a class="btn btn-primary m-1" href="#" role="button" id="btnGestion">GESTION INSTITUCIONAL</a>
        <a class="btn btn-primary m-1" href="#" role="button" id="btnVinculacion">VINCULACIÓN</a>
        <a class="btn btn-primary  m-1" href="#" role="button" id="btnComunicacion">COMUNICACIÓN</a>
        <a class="btn btn-primary m-1" href="#" role="button" id="btnEduInv">EDUCACIÓN E INVESTIGACIÓN</a>
    </div>


</div>
<div class="mt-3 row justify-content-center">

    <div class="my-4 col-md-5 order-2 .order-xl-1 order-lg-1 order-md-1 order-sm-2">
        <article>
            <p class="text-justify" id="textoInicio">
                El primer antecedente de la Agenda Ambiental es la Comisión
                de Medio Ambiente de la Universidad Autónoma de San Luis Potosí
                que nace en 1992 por iniciativa de profesores de las Facultades
                de Ingeniería, Ciencias Químicas y Medicina, bajo la rectoría de
                Lic. Alfonso Lastras Ramírez, bajo la coordinación del Dr. Pedro
                Medellín Milán. Más tarde, en 1996 se crea el Diplomado en Gestión
                Ambiental y Ecología, que lleva la multidisciplina hacia una
                propuesta formal de los estudios ambientales.
            </p>
            <a href="#">
                <button type="button" class="btn botonLeerMas"> Leer más </button>
            </a>
        </article>
    </div>
    <div class="my-4 col-md-7 order-1 order-xl-2 order-lg-2 order-md-2 order-sm-1">
        <x-slider :idSlider="'sliderIntroduccion'" :rutaImagenes="'imagenes/introduccion'"></x-slider>
    </div>
</div>

<div class="mt-3 row justify-content-end Ejes">
    <div class="col-md-5">
        <div class="envoltorioCirculoODS">
            <img src="storage/imagenes/ods/circulo-UASLP-SOCIEDAD.png" class="img-fluid" width="518" id="circuloODS"
                usemap="#circuloODS">
            <a href="#">
                <img class="img-fluid seccionODS" src="storage/imagenes/ods/gestion.png" id="gestion" width="270">
            </a>
            <a href="#">
                <img class="img-fluid seccionODS" src="storage/imagenes/ods/educacion.png" id="educacion" width="270">
            </a>

            <a href="#">
                <img class="img-fluid seccionODS" src="storage/imagenes/ods/vinculacion.png" id="vinculacion"
                    width="270">
            </a>

            <a href="#">
                <img class="img-fluid seccionODS" src="storage/imagenes/ods/comunicacion.png" id="comunicacion"
                    width="270">
            </a>

            <a href="http://www.uaslp.mx">
                <img class="img-fluid" src="storage/imagenes/ods/circulo-UASLP-SOCIEDAD-e1587668903442.png"
                    id="circuloUaslp" width="228">
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
    <div class="col-md-4 ">
        <x-acordeon :idAcordeon="'acordeonProgramasInstitucionales'" :tituloAcordeon="'PROGRAMAS INSTITUCIONALES'">
        </x-acordeon>
        <x-acordeon :idAcordeon="'acordeonAccesos'" :tituloAcordeon="'ACCESOS'">
        </x-acordeon>
    </div>
</div>
@endsection