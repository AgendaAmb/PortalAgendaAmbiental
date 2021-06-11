@extends('Bienvenido')

@section('Introduccion')
<x-btns-ejes>

</x-btns-ejes>
<div class="mt-3 row justify-content-center">

  <div class="my-4 col-md-5 order-2 .order-xl-1 order-lg-1 order-md-1 order-sm-2">
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
        <a href="#">
          <button type="button" class="btn botonLeerMas"> Leer más </button>
        </a>
      </div>
     
    </article>
  </div>

  <div class="my-lg-2 my-0 col-md-7 order-1 order-xl-2 order-lg-2 order-md-2 order-sm-1 px-2">
    <div id="carousel" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
        <li data-target="#carousel" data-slide-to="3"></li>
        <li data-target="#carousel" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
              <a href="#" data-toggle="modal" data-target="#modalCursoUnihuerto">
                <img src="{{ asset('storage/imagenes/UPCYCLE/B_Marroquineria1.png')}}" class="imgCaoursel pr-2"
                alt="First slide">
              </a>
              <img src="{{ asset('storage/imagenes/UPCYCLE/B_Marroquineria2.png')}}" class="imgCaoursel pl-2"
                alt="First slide">
            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia.png')}}" class="imgCaoursel pr-2"
                alt="First slide">
              <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia2.png')}}" class="imgCaoursel pl-2"
                alt="First slide">
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
              <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia.png')}}" class="imgCaoursel pr-2"
                alt="First slide">
              <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia2.png')}}" class="imgCaoursel pl-2"
                alt="First slide">
            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia.png')}}" class="imgCaoursel pr-2"
                alt="First slide">
              <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia2.png')}}" class="imgCaoursel pl-2"
                alt="First slide">
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
              <a href="{{route('Unihuerto')}}">

                <img src="{{ asset('storage/imagenes/introduccion/UNIHUERTO-ENCASA.png')}}" class="imgCaoursel pl-2"
                alt="First slide">
                <img src="{{ asset('storage/imagenes/introduccion/CursoJardineria.png')}}" class="imgCaoursel pl-2"
                alt="First slide">
              </a>

            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <img src="{{ asset('storage/imagenes/introduccion/UNIHUERTO-ENCASA.png')}}" class="imgCaoursel pl-2"
                alt="First slide">
              <img src="{{ asset('storage/imagenes/introduccion/CursoJardineria.png')}}" class="imgCaoursel pl-2"
                alt="First slide">
            </div>
          </div>

        </div>
        <div class="carousel-item">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
              <img src="{{ asset('storage/imagenes/introduccion/CicloAgua.png')}}" class="imgCaoursel pl-2"
                alt="First slide">
              <img src="{{ asset('storage/imagenes/introduccion/ConcursoCinemi.png')}}" class="imgCaoursel pl-2"
                alt="First slide">

            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <img src="{{ asset('storage/imagenes/introduccion/CicloAgua.png')}}" class="imgCaoursel pl-2"
                alt="First slide">
              <img src="{{ asset('storage/imagenes/introduccion/ConcursoCinemi.png')}}" class="imgCaoursel pl-2"
                alt="First slide">
            </div>
          </div>

        </div>
        <div class="carousel-item">
          <div class="d-none d-lg-block d-md-block">
            <div class="slide-box">
              <img src="{{ asset('storage/imagenes/introduccion/consumo-responsable.png')}}" class="imgCaoursel pl-2"
                alt="First slide">
                <a href="{{route('DateUnRespiro')}}">
                  <img src="{{ asset('storage/imagenes/introduccion/DateUnRespiro.jpg')}}" class="imgCaoursel pl-2"
                  alt="First slide">
                </a>
            </div>
          </div>

          <div class="d-none d-sm-block d-md-none">
            <div class="slide-box">
              <img src="{{ asset('storage/imagenes/introduccion/consumo-responsable.png')}}" class="imgCaoursel pl-2"
                alt="First slide">
                <a href="{{route('DateUnRespiro')}}">
                  <img src="{{ asset('storage/imagenes/introduccion/DateUnRespiro.jpg')}}" class="imgCaoursel pl-2"
                  alt="First slide">
                </a>
            </div>
          </div>

        </div>
      </div>

      <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
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
      <ol class="carousel-indicators">
        <li data-target="#carouselResponse" data-slide-to="0" class="active"></li>
        <li data-target="#carouselResponse" data-slide-to="1"></li>
        <li data-target="#carouselResponse" data-slide-to="2"></li>
        <li data-target="#carouselResponse" data-slide-to="3"></li>
        <li data-target="#carouselResponse" data-slide-to="4"></li>
        <li data-target="#carouselResponse" data-slide-to="5"></li>
        <li data-target="#carouselResponse" data-slide-to="6"></li>
        <li data-target="#carouselResponse" data-slide-to="7"></li>
        <li data-target="#carouselResponse" data-slide-to="8"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="slide-box">
            <a href="#" data-toggle="modal" data-target="#modalCursoUnihuerto">
              <img src="{{ asset('storage/imagenes/UPCYCLE/B_Marroquineria.png')}}" class="imgCaoursel pr-2 w-100"
              alt="First slide">
            </a>
          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-box">
            <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia.png')}}" class="imgCaoursel pr-2 w-100"
              alt="First slide">
          </div>
        </div>

        <div class="carousel-item">
          <div class="slide-box">
            <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia2.png')}}"
              class="imgCaoursel pl-2 w-100 p-0 p-0" alt="First slide">
          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-box">
            <img src="{{ asset('storage/imagenes/introduccion/CicloAgua.png')}}" class="imgCaoursel pl-2 w-100 p-0"
              alt="First slide">
          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-box">
            <img src="{{ asset('storage/imagenes/introduccion/ConcursoCinemi.png')}}" class="imgCaoursel pl-2 w-100 p-0"
              alt="First slide">
          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-box">
            <img src="{{ asset('storage/imagenes/introduccion/UNIHUERTO-ENCASA.png')}}" class="imgCaoursel pl-2 w-100 p-0"
              alt="First slide">
          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-box">
            <img src="{{ asset('storage/imagenes/introduccion/CursoJardineria.png')}}" class="imgCaoursel pl-2 w-100 p-0"
              alt="First slide">
          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-box">
            <img src="{{ asset('storage/imagenes/introduccion/consumo-responsable.png')}}"
              class="imgCaoursel pl-2 w-100 p-0" alt="First slide">

          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-box">
            <img src="{{ asset('storage/imagenes/introduccion/DateUnRespiro.jpg')}}" class="imgCaoursel pl-2 w-100 p-0"
              alt="First slide">
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

<div class="mt-3 row justify-content-around  Ejes d-none d-xl-flex d-lg-flex d-md-flex">
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
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/vinculacion.png" id="vinculacion" width="270">
      </a>

      <a href="#">
        <img class="img-fluid seccionODS" src="storage/imagenes/ods/comunicacion.png" id="comunicacion" width="270">
      </a>

      <a href="http://www.uaslp.mx">
        <img class="img-fluid" src="storage/imagenes/ods/circulo-UASLP-SOCIEDAD-e1587668903442.png" id="circuloUaslp"
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
  <div class="col-md-4 ">
    <x-acordeon :idAcordeon="'acordeonProgramasInstitucionales'" :tituloAcordeon="'PROGRAMAS INSTITUCIONALES'">
    </x-acordeon>
    <x-acordeon :idAcordeon="'acordeonAccesos'" :tituloAcordeon="'ACCESOS'">
    </x-acordeon>
  </div>
</div>



<div class="modal fade" id="modalCursoUnihuerto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
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
                            <img src="{{asset('storage/imagenes/UPCYCLE/Cartel-Marroquineria.jpg')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/_layouts/15/FormServer.aspx?XsnLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/Reg_Marroquineria/forms/template.xsn&OpenIn=browser&SaveLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/Reg_Marroquineria&Source=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/Reg_Marroquineria"
                                class="btn btn-secondary bg-light  text-muted downloadBtn "  target="_blank" role="button"
                              >REGISTRATE </a>

                        </div>
                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/UPCYCLE/Cartel-Marroquineria.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel-Marroquineria.jpg">CARTEL GENERAL </a>

                        </div>

                    </div>
                    <div class="row justify-content-center">
                      <div class="col-10" style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'"><br><br><h4>Curso-taller: UPCYCLE Marroquinería con materiales reciclados
                      </h4><br><br>
                         <div class="elementor-text-editor elementor-clearfix"><div style="font-size: 14px; font-family: 'Myraid light';"><h3 style="color: #5c94d7;">Dirigido a</h3><p>Estudiantes UASLP y público general.</p><br><h3 style="color: #5c94d7;">Requisitos</h3><p></p><ul>
                              <li>Tener nociones en construcción de bolsas.</li>
                              <li>Contar con disponibilidad de horarios para atender las sesiones programadas y realizar las actividades del curso.</li>
                     <li>Tener excelente disposición hacia la comunicación, aprendizaje y colaboración en el desarrollo del curso, así como de los objetivos planteados.</li>
               </ul><p></p><br><h3 style="color: #5c94d7;">Instructores</h3>				<p>
                 </p><ul>
                   <li>MDP José Luis González Cabrero</li>
                   <li>TA Juan Rodríguez Guzmán</li>
                   <li>Personal Agenda Ambiental </li>
                 </ul>
               <p></p><h3 style="color: #5c94d7;">Programa</h3>				<p>
                 </p><ul>
                   <li>Introducción a sostenibilidad y residuos</li>
                   <li>Casos de estudio</li>
                   <li>Marroquinería</li>
                   <li>Patronaje y planeación</li>
                   <li>Construcción</li>
                 </ul>
               <p></p>
                         <h3 style="color: #5c94d7;">Lugar, fechas y horarios</h3>
                        <p></p><ul>
                          <li>21 de junio al 2 de julio del 2021 de 9:00 a 14:00 horas</li>
                          <li><b>Modalidad:</b><br>Teoría: Microsoft Teams<br>Práctica: Facultad del Hábitat</li>
                          <li><b>Número total de horas:</b> 50 horas</li>
                        </ul>* Las sesiones prácticas son presenciales en los talleres de la Facultad de Hábitat según medidas sanitarias vigentes.
                        <p></p><br>
                         <h3 style="color: #5c94d7;">Registro</h3><p>Pasos para registro de participantes:<br>
                           </p><ol>
                             <li>Llenar correctamente el formulario en línea de registro de esta página web.</li>
                             <li>Al finalizar y dar clic en el botón enviar, con esta primera etapa del proceso queda PRE-INSCRITO.</li>
                             <li>Asistir a la administración de la Facultad del Hábitat con Edith Lorena Moreno para obtener su ficha de pago. De lunes a viernes de 10:30 a 13:30 horas. Los pagos se podrán hacer a partir del 10 de junio del 2021.</li>
                             <li>Pagar en la Facultad del Hábitat o en Finanzas.</li>
                             <li>Como último paso obligatorio para su INSCRIPCIÓN oficial debe enviar su comprobante de pago por correo electrónico a <a href="mailto:proserem@uaslp.mx" style="color: #5c94d7">proserem@uaslp.mx</a></li>
                           </ol>
                         * Facturación en la Facultad del Hábitat<br>	
                         * Cupo limitado<br><br>
                         <b>Costo:</b> $500 Comunidad Universitaria, $850 externos<br><br>* El curso tendrá valor curricular y cuenta como ELECTIVA LIBRE para estudiantes UASLP<p></p><br>
                         <h3 style="color: #5c94d7;">Formas de pago</h3>
                         <p></p><ul>
                           <li>Las fichas de pago se pueden pagar directamente en el banco o se pueden hacer transferencias desde el portal de multipagos de la UASLP: <a href="https://www.finanzas.uaslp.mx/Multipagos" style="color: #5c94d7">https://www.finanzas.uaslp.mx/Multipagos</a></li>
                           <li>Los pagos por nómina se realizan al firmar el vale que le haremos llegar por correo y se debe llevar firmado a las instalaciones de la Agenda Ambiental en el horario asignado o enviarlo firmado en pdf al correo <a href="proserem@uaslp.mx" style="color: #5c94d7">proserem@uaslp.mx</a></li>
                         </ul><p></p><br>
                         <p><b>Fecha límite para pre-registro:</b> 14 de junio del 2021 a las 12:00 horas<br><b>Fecha límite para pago:</b> 16 de junio del 2021 a las 16:00 horas.</p><br>
                         <h4 style="color: #5c94d7;">Más Información</h4><p style="font-size: 14px !important;">Programa Universitario de Residuos<br>Sistema de Gestión Ambiental<br>Agenda Ambiental de la UASLP<br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava No. 201, segundo piso<br>Zona Universitaria, C.P. 78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300 Ext. 7210 y 7215<br><a href="mailto:proserem@uaslp.mx" style="color: #5c94d7">proserem@uaslp.mx</a><br><a href="mailto:luis.cabrero@uaslp.mx" style="color: #5c94d7">luis.cabrero@uaslp.mx</a></p></div></div>
                 </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection