@extends('Bienvenido')

@section('Introduccion')
<div class="mt-3 row justify-content-center">
  
    <div class="my-4 col-md-4">
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
    <div class="my-4 col-md-7">
        <x-slider   :idSlider="'sliderIntroduccion'"
                    :rutaImagenes="'imagenes/introduccion'"></x-slider>
    </div>
</div>
<div class="justify-content-around EjesTrabajo">
    <button type="button" class="btn btn-success m-2">GESTION INSTITUCIONAL</button>
    <button type="button" class="btn btn-warning   m-2">VINCULACIÓN</button>
    <button type="button" class="btn btn-danger  m-2">COMUNICACIÓN</button>
    <button type="button" class="btn btn-info m-2">EDUCACIÓN E INVESTIGACIÓN</button>
   
</div>
<div class="mt-3 row justify-content-end Ejes">
    <div class="col-md-5">
        <div class="envoltorioCirculoODS">
            <img src="storage/imagenes/ods/circulo-UASLP-SOCIEDAD.jpg"
                class="img-fluid"
                width="518" 
                id="circuloODS"
                usemap="#circuloODS">

            <img class="img-fluid" 
                src="storage/imagenes/ods/circulo-UASLP-SOCIEDAD-e1587668903442.png" 
                id="circuloUaslp"
                width="228">
        </div>
    </div>
    <div class="col-md-4">
        <x-acordeon :idAcordeon="'acordeonProgramasInstitucionales'" 
                    :tituloAcordeon="'PROGRAMAS INSTITUCIONALES'">
        </x-acordeon>
        <x-acordeon :idAcordeon="'acordeonAccesos'" 
                    :tituloAcordeon="'ACCESOS'">
        </x-acordeon>
    </div>
</div>
@endsection