@extends('welcome')

@section('Corpus')
<div class="mt-5 row justify-content-center">
    <div class="col-md-4">
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
    <div class="col-md-7">
        <x-slider   :idSlider="'sliderIntroduccion'"
                    :rutaImagenes="'imagenes/introduccion'"></x-slider>
    </div>
</div>

<div class="mt-5 row justify-content-center">
    <div class="col-md-7">
        
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