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


    <div class="col-md-7">
        <section
        class="elementor-element elementor-element-552f52e elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section"
        data-id="552f52e" data-element_type="section">
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-row">
                <div class="elementor-element elementor-element-6c87e5e elementor-column elementor-col-50 elementor-inner-column"
                    data-id="6c87e5e" data-element_type="column"
                    id="columnaInicio">
                    <div
                        class="elementor-column-wrap  elementor-element-populated">
                        <div class="elementor-widget-wrap">
                            <div class="elementor-element elementor-element-10878d5 elementor-hidden-phone elementor-widget elementor-widget-html"
                                data-id="10878d5" data-element_type="widget"
                                id="rangoODS" data-widget_type="html.default">
                                <div class="elementor-widget-container">
                                    <img src="storage/imagenes/ods/circulo-UASLP-SOCIEDAD.jpg"
                                        width="518px" id="circuloODS"
                                        usemap="#circuloODS">
                                    <a href="http://www.uaslp.mx"
                                        target="_blank"><img class="img-fluid"
                                            src="storage/imagenes/ods/circulo-UASLP-SOCIEDAD-e1587668903442.png"
                                            id="circuloUaslp"></a>



                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/4.png"
                                            id="ods4" style="position: absolute; width: 112px;
height: 102px;
top: 122px;
right: 40px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/1.png"
                                            id="ods1" style="position: absolute; width: 97px;
height: 101px;
top: -47px;
right: 244px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/2.png"
                                            id="ods2" style="position: absolute; width: 118px;
height: 119px;
top: -25px;
right: 147px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/3.png"
                                            id="ods3" style="position: absolute; width: 126px;
height: 121px;
top: 34px;
right: 74px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/5.png"
                                            id="ods5" style="position: absolute;     width: 99px;
height: 101px;
top: 233px;
right: 38px; display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/6.png"
                                            id="ods6" style="position: absolute; width: 122px;
height: 123px;
top: 322px;
right: 47px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/7.png"
                                            id="ods7" style="position: absolute; width: 131px;
height: 127px;
top: 396px;
right: 97px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/8.png"
                                            id="ods8" style="position: absolute;     width: 114px;
height: 113px;
top: 448px;
right: 187px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/9.png"
                                            id="ods9" style="position: absolute; width: 102px;
height: 99px;
top: 470px;
right: 295px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/10.png"
                                            id="ods10" style="position: absolute; width: 111px;
height: 117px;
top: 447px;
right: 394px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/11.png"
                                            id="ods11" style="position: absolute; width: 126px;
height: 125px;
top: 396px;
right: 464px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/12.png"
                                            id="ods12" style="position: absolute; width: 118px;
height: 121px;
top: 324px;
right: 524px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/13.png"
                                            id="ods13" style="position: absolute;width: 103px;
height: 100px;
top: 237px;
right: 554px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/14.png"
                                            id="ods14"
                                            style="position: absolute; width:113px;height: 102px;top:131px;right: 542px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/15.png"
                                            id="ods15"
                                            style="position: absolute; height: 119px; top: 39px; right: 500px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/16.png"
                                            id="ods16"
                                            style="position: absolute; height: 119px; top: -21px; right: 436px;display:none;"></a>

                                    <a
                                        href="https://www.un.org/sustainabledevelopment/es/objetivos-de-desarrollo-sostenible/"><img
                                            src="storage/imagenes/ods/17.png"
                                            id="ods17" style="position: absolute; height: 106px;
width: 101px;
top: -47px;
right: 356px;
display:none;"></a>

                                    <map name="circuloODS">
                                        <area shape="poly" id="gestionCirculo"
                                            coords="
65, 260,
96, 160,
160, 98,
260, 65, 
260, 150, 
226, 163, 
160, 193, 
150, 260">
                                        <area shape="poly" id="areaVinculacion"
                                            coords="
260, 150, 
260, 65, 
380, 101, 
425, 131, 
455, 260, 
370, 260, 
340, 180,
260, 150">
                                        <area shape="poly" id="areaComunicacion"
                                            coords="
370, 260,
455, 260,
450, 323,
380, 415,
260, 455,
260, 370,
350, 330,
370, 260">
                                        <area shape="poly" id="areaEducacion"
                                            coords="
65, 260,
150, 260,
180, 340, 
260, 370,
260, 455,
180, 440,
85, 350, 
65, 260">
                                    </map>
                                    <a href="../gestion-2/index.html"><img
                                            src="storage/imagenes/ods/gestion.png"
                                            id="gestion" width="270px"
                                            style="position: absolute;top: 8px;left: 4px; display: none; cursor:pointer"></a>
                                    <a href="../vinculacion/index.html"><img
                                            src="storage/imagenes/ods/CIRCULO-INICIO-GRANDE.png"
                                            id="vinculacion" width="265px"
                                            style="position: absolute;top: 30px;left: 225px; display: none; cursor:pointer"></a>
                                    <a href="../comunicaciones/index.html"> <img
                                            src=".storage/imagenes/ods/CIRCULO-INICIO-GRANDE-1.png"
                                            id="comunicacion" width="265px"
                                            style="position: absolute;top: 225px;left: 225px; display: none; cursor:pointer">
                                    </a>
                                    <a href="../educacion-2/index.html">
                                        <img src="storage/imagenes/ods/educacion.png"
                                            id="educacion" width="270px"
                                            style="position: absolute;top: 247px;left: 4px; display: none; cursor:pointer">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
           
            </div>
        </div>
    </section>
</div>
</div>
</div>
</div>
</section>

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