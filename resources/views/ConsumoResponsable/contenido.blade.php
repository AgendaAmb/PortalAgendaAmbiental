@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-12 justify-content-center text-justify mt-5">
    <img src="{{ asset('storage/imagenes/Logos/BannerSup_ECR.png') }}" class="img-fluid p-4 w-75" alt="" srcset="">
</div>
<div class="col-xl-8 col-lg-8 col-md-12 mb-5 mt-5">
    <p class="text-justify pSize">
        En esta época donde el consumo se ha convertido en la esencia humana del siglo XXI se nos ha hecho creer que el
        consumo sin límites mide el bienestar de una sociedad, las posibilidades de consumir aumentan en el espacio de
        un universo globalizado y existe una relación muy estrecha entre consumismo y el medio ambiente pues mucha
        materia prima que se utiliza para la fabricación de los artículos que emplea el ser humano proviene de la
        naturaleza, sin olvidar que en la producción industrial se consume energía y recursos que muchas veces no son
        renovables.<br>Además, el consumismo genera en el mundo millones de toneladas de basura, en México se recolectan
        diariamente 86 mil 343 toneladas de basura de la cual se separa diariamente 11% existiendo tecnologías de alta
        calidad que pueden reciclar la mayor cantidad de basura generada.<br><br>Un cambio en los hábitos de consumo y
        en la forma de entenderlos puede hacer frente a estos problemas ambientales y sociales que se viven en la
        actualidad. Muchas veces los materiales pueden encontrar una segunda vida, muchos ya considerados desechos
        tienen reparaciones sencillas que puede extender su tiempo de servicio.<br><br>Por lo anterior la UASLP a través
        de la Agenda Ambiental trabaja en educar respecto a prácticas de consumo, así como proponer mecanismos para el
        manejo apropiado de residuos buscando lograr una sensibilización y socialización de la información en la
        comunidad universitaria y potosina sobre los impactos a la salud y al medio ambiente que generan los productos
        que consumimos y desechamos; de esta forma crear un nivel de responsabilidad y actitud crítica acorde con la
        visión de sustentabilidad de la UASLP.
    </p>
</div>
@endsection

@section('BannerBotones')
<div
    class="row justify-content-center justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-between">
    <div class="col-12 ">
        <img src="{{asset('storage/imagenes/ConsumoResponsable/Banner_ECR.jpg')}}" class="img-fluid" alt="" srcset="">
    </div>

</div>

<div class="container m-0">
    <div class="row mt-1 col-md-12 col-sm-12 pl-md-4 justify-content-start">

        <div class="flex-wrap btn-group " role="group" aria-label="Basic example">
            <a class="btn btnCur m-2 " href="#" role="button" data-toggle="modal" data-target="#exampleModalCenter">
                CARTEL
            </a>

        </div>



    </div>
</div>



@endsection

@section('ObjetivosTexto')
<div class="pSize text-justify m-3">
    <div style="font-size: 14px; font-family: 'Myraid light';">
        <h3>Objetivo general</h3>
        <p>Informar, educar y proveer medios y herramientas respecto al manejo apropiados de los bienes.</p><br>
        <h3>Objetivos específicos</h3>
        <ul>
            <li>Desde un enfoque participativo, <b>informar</b> a la comunidad universitaria acerca de la problemática
                ambiental existente en el ámbito de la adquisición, manejo y disposición de los bienes.</li>
            <li><b>Educar</b> acerca de las <b>estrategias</b>: Rechaza, Reduce, Reutiliza, Repara, Regresa y permite
                que los materiales tengan la oportunidad de llegar al Reciclaje. Rechazando materiales y empaques que no
                se necesitan; promoviendo Reducir la cantidad de estos; Reutilizar los materiales que aún tienen tiempo
                de vida útil; Reparar y Regresar en buenas condiciones de uso los materiales y finalmente colaborar en
                que se lleguen a Reciclar.</li>
            <li><b>Motivar</b> a la comunidad para iniciar una nueva <b>cultura del consumo</b>, uso y disposición de
                materiales, fomentando cambios en la sociedad y así contribuir con la disminución de residuos.</li>
            <li>Mostrar a la comunidad universitaria los <b>medios y herramientas</b> con los que se cuenta para hacer
                una disposición adecuada de todos los tipos de residuos, de tal forma que se contribuyan a la solución
                de los problemas ambientales que surjan en su entorno.</li>
            <li>Llevar a cabo programas que proponen buenas prácticas de consumo como <b>Reutronic</b> y <b>Cambalache
                    de Libros</b>.</li>
        </ul><br>
        <h3>Descripción</h3>
        <p style="text-align: justify;">Este evento forma parte de los módulos "Manejo adecuado de las sustancias y
            materiales reguladas" y "Cumplimiento en residuos, descargas y emisiones" del Sistema de Gestión Ambiental
            de la Agenda Ambiental de la UASLP.</p>Se tendrán espacios de prácticas de consumo responsable como:<p></p>
        <ul>
            <li>Asesoría e informes de Agenda Ambiental; donde se registra a los participantes del evento y se ofrece
                información de la Agenda Ambiental; que es, que hace, que cursos, concursos y programas ofrece. También
                expone cómo y dónde la comunidad universitaria y potosina puede disponer de sus residuos de cualquier
                clasificación apropiadamente.</li>
            <li>Talleres de Educación Ambiental: donde te enseñaremos buenas prácticas de consumo como el rechazar la
                compra innecesaria de productos, reducir su uso, consumo y desecho, reutilizar creativamente todo lo
                posible y regresar en buenas condiciones de uso los bienes y materiales buscando la valorización y el
                reciclaje.</li>
            <li>Programa Reutronic: Busca crear sinergia con profesores y estudiantes para propagar una cultura de
                consumo responsable con la práctica de la Reparación, el Reuso y el Regreso de los materiales
                mecano-eléctricos.</li>
            <li>Programa Cambalache de libros: Se reciben libros de cualquier tema y tipo en buen estado para ser
                intercambiados por otros.</li>
        </ul><br>
        <h3>Material aceptado</h3>
        <p style="text-align: justify;"><b>Sí:</b> periódico, libretas, libros, folders, revistas, hojas, sobres,
            legajos, cajas, folletos, cartón (se acepta encuadernado, engargolado, grapado o triturado).</p>
        <p style="text-align: justify;"><b>No:</b> papel carbón, plastificado, alumninio, celofán, fax, fotografías,
            encerado (envase de tretra pack de leche, jugos, etc.), con adhesivos (post it, calcamonías), doméstico
            usado (servilletas, higiénico, vasos, etc.)</p><br>
        <h3>Chatarra electrónica</h3>
        <p style="text-align: justify;"><b>Computación:</b> CPU, impresoras, teclados, mouse, monitores, discos duros,
            floppys, tarjetas, memorias, procesadores, reguladores, servidores, laptops.</p>
        <p style="text-align: justify;"><b>Telefonía:</b> celulares, cargadores, palms, radiolocalizadores, teléfonos
            inalámbricos, equipo de comunicación.</p>
        <p style="text-align: justify;"><b>Electrónica:</b> CD, tarjetas electrónicas, decodificadores, consolas de
            videojuegos, reproductores de audio portátiles, adaptadores.</p>
        <p style="text-align: justify;"><b>Eléctrica:</b> cables, interruptores, capacitores, conductores,
            transformadores.</p>
        <p style="text-align: justify;">Para los equipos electrónicos que cuentan con etiqueta propiedad de la UASLP, se
            deberá trámitar la "baja de inventarios" en el SIIA, para más información comunícate al Departamento de
            Proveeduría e Inventarios al tel. 102-7200 ext. 7557.<br><br>Si tu entidad está por comprar equipo o
            mobiliario asegúrate de revisar primero el catálogo de bienes en resguardo del almacén de bajas del
            Departamento de Proveeduría e Inventarios en el siguiente enlace <a
                href="http://www.uaslp.mx/SecretariaAdministrativa/catalogo-de-baja"
                target="_blank">http://www.uaslp.mx/SecretariaAdministrativa/catalogo-de-baja</a></p><br>
        <h4>Más Informes</h4>
        <p style="font-size: 14px !important;"><b>Laura Daniela Hernández Rodríguez</b><br><b>Sistema de Gestión
                Ambiental</b><br>Agenda Ambiental de la UASLP<br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava
            No. 201, segundo piso<br>Zona Universitaria, C.P. 78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300 Ext.
            7210<br><a href="mailto:gestion.ambiental@uaslp.mx">gestion.ambiental@uaslp.mx</a></p>
    </div>
</div>

@endsection

@section('Modales')
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/ConsumoResponsable/ENERO2021_ECR.jpg')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end mx-5 mt-2">

                        <div class="col-6  col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/ConsumoResponsable/ENERO2021_ECR.jpg')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="ENERO2021_ECR.jpg">CARTEL GENERAL </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection