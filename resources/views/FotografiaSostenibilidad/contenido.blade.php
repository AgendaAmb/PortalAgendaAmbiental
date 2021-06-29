@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-4 justify-content-center my-2">
    <img src="{{ asset('storage/imagenes/Logos/BannerSup_CFS.png') }}"
        class="rounded mx-auto d-block w-75 py-xl-5 py-md-5" alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-8">
    <p class="text-justify pSize pt-5 pt-xl-4 pt-lg-3  pt-md-0">
        La crisis ambiental se ha agudizado y en las últimas décadas los efectos del cambio climático se han hecho
        sentir en todo el planeta. La pérdida acelerada de la biodiversidad es consecuencia de los modos de vida
        insostenibles y del modelo económico actual. Los Objetivos de Desarrollo Sostenible ODS configuran acciones
        estratégicas a nivel global para alcanzar la sostenibilidad al atender las problemáticas sociales, ambientales y
        económicas desde un enfoque integrador en diferentes escalas. Por su parte, las Naciones Unidas han promovido el
        periodo 2021-2030 como el Decenio de las Naciones Unidas para la Restauración de los Ecosistemas, para así
        buscar los instrumentos necesarios para lograr la sostenibilidad hacia el 2030.<br><br>Por ello en el marco del
        Decenio de las Naciones Unidas sobre la Restauración de los Ecosistemas, hemos centrado el primer concurso de
        fotografía por la sostenibilidad en la restauración de los ecosistemas y la resiliencia que podemos encontrar en
        los ecosistemas habitados, tales como los parques, avenidas, jardines, plazas públicas, espacios en desusos,
        comunidades, azoteas útiles, huertos entre muchos otros.
</div>
@endsection

@section('BannerBotones')
<div
    class="row justify-content-center justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-between">
    <div class="col-12 ">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <a href="{{asset('storage/imagenes/ConcursoFotografia/Conv_ConFotografia.pdf')}}" target="_blank" rel="noopener noreferrer">
                
                <div class="carousel-item active">
                    <img src="{{asset('storage/imagenes/ConcursoFotografia/B_ConcursoFotografia.png')}}"
                    class="d-block img-fluid" alt="...">
                </div>
            </a>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>

</div>



<div class="mt-1 col-md-12 col-sm-12 p-0">
    <div class="nav nav-tabs justify-content-center">
        <a class="nav-link w-50 p-1 m-0" target="_blank" 
        href="http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/_layouts/15/FormServer.aspx?XsnLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/ConcursoFotografia/forms/template.xsn&OpenIn=browser&SaveLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/ConcursoFotografia&Source=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/ConcursoFotografia"           >Registrate</a>
        <a class="nav-link w-50 p-1 m-0"  href="{{asset('storage/imagenes/ConcursoFotografia/Cartel_CFS.jpeg')}}"
        role="button group"  download="B_ConcursoFotografia.jpeg">Cartel General</a>
           
    </div>
</div>
@endsection

@section('ObjetivosTexto')
<div class="pSize text-justify mt-5">
    En el marco del Decenio por la Regeneración de los Ecosistemas que promueven las Naciones Unidas, la Universidad Autónoma de San Luis Potosí a través de la Agenda Ambiental y la Coordinación Académica en Arte, Difusión Cultura y la Dirección de Cultura Municipal invitan a participar en el  <b>“Concurso de fotografía por la sostenibilidad Resiliencia. Ecosistemas en ambientes habitados”</b>.<br><br><h3 style="color: #5c94d7;">Objetivo del concurso</h3><p>Construir un retrato colectivo sobre la resiliencia de la naturaleza en comunidades habitadas. Los trabajos presentados deberán invitar al cuidado, protección y regeneración de los ecosistemas, a través de una fotografía acompañada de un breve texto.</p><br><h3 style="color: #5c94d7;">Bases</h3><ul><li>Podrán participar todas las personas pertenecientes a la comunidad universitaria: profesores, alumnos, administrativos, trabajadores y egresados de la Universidad Autónoma de San Luis Potosí.</li><li>El concurso queda abierto desde la fecha de su publicación hasta las 23:00 horas del día 12 de abril de 2021.</li><li>La participación es individual.</li><li>Como parte del concurso, se ofrecerá un taller sobre servicios ambientales y la restauración de ecosistemas, con el objetivo de conocer con detalle la problemática ambiental y las posibles soluciones.<br>
        <ul>
            <li>El taller forma parte del concurso y es de carácter obligatorio.
                <ul>
                    <li><b>Duración:</b> 4 horas </li>
                    <li><b>Fecha:</b> viernes 5 de marzo de 2021</li>
                </ul>
            </li>
        </ul>	
        </li></ul><a href="../../wp-content/uploads/2020/09/Conv_ConFotografia.pdf">Consulta las bases</a><br><br><h3 style="color: #5c94d7;">Fechas clave</h3><ul><li>Límite para el registro al concurso: jueves 4 de marzo.</li><li>Taller "Servicios ambientales y la restauración de ecosistemas": viernes 5 de marzo.</li><li>Envío de fotografías: del 8 de marzo al 12 de abril.</li><li>Premiación: 22 de abril en el marco del día de la tierra.</li></ul><br><h3 style="color: #5c94d7;">Sobre las fotografías</h3><p style="text-align: justify;">
        </p><ul>
            <li>Las fotografías deberán contar con un título y ser originales e inéditas a color o en blanco y negro.</li>
            <li><b>Se permiten</b> ediciones básicas de balance y ajuste de color.</li>
            <li><b>No se permite</b> edición avanzada de fotografías; retoque creativo; incluir, quitar o crear elementos que afecten la naturalidad de la toma. El comité organizador se reserva el derecho de evaluar y descartar cualquier fotografía conforme lo anterior.</li>
            <li>La fotografía deberá ser enviada al correo <a href="mailto:difusion.agenda@uaslp.mx">difusion.agenda@uaslp.mx</a> en formato original JPEG o JPG con una resolución 720 dpi y un peso máximo de 10 MB. </li>
            <li>Se recomienda tomar fotografías en modalidad Full HD o 4K en proporción 4:3</li>
            <li>La fotografía deberá estar acompañada de un texto breve sobre el tema de la fotografía (máximo 300 palabras).</li>
            <li>Cada participante podrá enviar hasta dos fotografías (cada una acompañada de su propio texto breve).</li>
        </ul><br>
        <h3 style="color: #5c94d7;">Evaluación</h3><p style="text-align: justify;">Los trabajos serán recibidos al correo electrónico <a href="difusion.agenda@uaslp.mx">difusion.agenda@uaslp.mx</a> del 8 de marzo al 12 de abril a las 23:00 y serán sometidos a una evaluación ciega por un comité externo a la Universidad, quienes realizarán la selección de los trabajos ganadores. Su dictamen será inapelable.</p><br><h3 style="color: #5c94d7;">Selección oficial</h3><p style="text-align: justify;">Se hará una selección final de 30 fotografías para formar parte de la exposición perimetral del Parque de Morales Juan H. Sánchez y del libro digital “Regeneración. Resiliencia en espacios habitados” que será publicado en la página de la Agenda Ambiental de la UASLP.<br>Todos los participantes recibirán constancia de participación.</p><br><h3 style="color: #5c94d7;">Premiación</h3><p style="text-align: justify;">Adicionalmente, un comité evaluador premiará las tres mejores fotografías:<br>
            </p><ul>
                <li><b>Primer lugar:</b> Cámara fotográfica profesional.</li>
                <li><b>Segundo lugar:</b> Cámara GoPro.</li>
                <li><b>Tercer lugar:</b> Tableta gráfica.</li>
            </ul><p></p><br>
        <p style="text-align: center">El registro en este concurso implica la total aceptación de la convocatoria.<br>Los asuntos no previstos en la presente convocatoria serán resueltos por las entidades organizadoras.<br><br>EL FALLO DEL JURADO SERÁ INAPELABLE<br><br>Este concurso es realizado por la Universidad Autónoma de San Luis Potosí a través de la Agenda Ambiental, la Coordinación Académica en Arte,<br> Difusión Cultural y la Dirección de Cultura Municipal de San Luis Potosí.</p>	
    </div>
</div>
@endsection
@push('stylesheets')
<link href="{{ asset('css/nav-tabs_contenido.css') }}" rel="stylesheet" type="text/css">
@endpush

