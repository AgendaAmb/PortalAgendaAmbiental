@extends('Parciales.index')
@section('TextImagen')
<div class="col-xl-4 col-lg-4 col-md-12 align-content-center text-justify mt-5">
    <img src="{{ asset('storage/imagenes/Logos/BannerSup_ECR2023_2.jpg') }}" class="img-fluid  w-75 pl-5" alt="" srcset="">
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
        <img src="{{asset('storage/imagenes/ConsumoResponsable/Banner_CR_2.jpg')}}" class="img-fluid" alt="" srcset="">
    </div>

</div>

<div class="mt-1 col-md-12 col-sm-12 p-0">
    <div class="nav nav-tabs justify-content-between my-2">
        <a class="nav-link w-25  py-2 m-0" data-toggle="modal" data-target="#CartelEspacioConsumo" role="tab"
            aria-controls="nav-home" aria-selected="true">Cartel, Espacio de Consumo Responsable</a>
        <a class="nav-link w-25 py-2 m-0" data-toggle="modal" data-target="#SlowFashion" role="tab" aria-controls="nav-profile"
            aria-selected="false">Slow Fashion. Moda sostenible</a>
        <a class="nav-link w-25 py-2 m-0" data-toggle="modal" data-target="#modalReutronic" role="tab" 
        aria-controls="nav-profile" aria-selected="false">Reutrónic</a>
    </div>
</div>
@endsection

@section('ObjetivosTexto')
<div class="pSize text-justify m-3">
    <div style="font-family: 'Myraid light';">
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
            <li>Llevar a cabo programas que proponen buenas prácticas de consumo como <b>Reutronic</b> y <b>cambalache
                    de Libros</b>.</li>
        </ul><br>
        <h3>Dirigido a</h3>La comunidad universitaria y público en general <br>
        <br>
        <h3>Descripción</h3>
        <p style="text-align: justify;">Este evento forma parte del Programa Universitario de Residuos los módulos del
            Sistema de Gestión Ambiental de la Agenda Ambiental de la UASLP.</p>Se cuenta con espacios de prácticas de
        consumo responsable como:<p></p>
        <ul>
            <li>Asesoría e informes de Agenda Ambiental; donde se registra a los participantes del evento y se ofrece
                información de la Agenda Ambiental; que es, que hace, que cursos, concursos y programas ofrece. También
                expone cómo y dónde la comunidad universitaria y potosina puede disponer de sus residuos de cualquier
                clasificación apropiadamente.</li>
            <li>Talleres de educación ambiental: donde te enseñaremos buenas prácticas de consumo como el rechazar la
                compra innecesaria de productos, reducir su uso, consumo y desecho, reutilizar creativamente todo lo
                posible y regresar en buenas condiciones de uso los bienes y materiales buscando la valorización y el
                reciclaje.</li>
            <li>Programa Reutronic: Busca crear sinergia con profesores y estudiantes para propagar una cultura de
                consumo responsable con la práctica de la Reparación, el Reuso y el Regreso de los materiales
                mecano-eléctricos.</li>

            <li>Programa cambalache de libros: Se reciben libros de cualquier tema y tipo en buen estado para ser
                intercambiados por otros.</li>
            <li>Recepción de materiales específicos para su valorización y destino apropiado.</li>
        </ul><br>
        <h3>Actividades:</h3> 
        <ul>
            <li>Programa Reutronic</li>
            <li>Programa cambalache de libros</li>
            <li>Se recibe para destinar a Reciclaje:
                <ul> <li>Electrónicos y electrodomésticos</li>
                    <li>Papel y cartón</li>
                    <li>Textiles </li>
                    <li>Residuos orgánicos composteables</li>
                    <li>Lonas vulcanizadas</li>
                    <li>Pilas alcalinas</li>
                    <li>Reciclables limpios, secos y comprimidos:
                        <ul>
                        <li>Papel </li>
                        <li>Cartón </li>
                        <li>Tetra Pak  </li>
                        <li>Caple </li>
                        <li>Plásticos (PET, HDPE, LDPE, PP y PS) </li>
                        <li>Metales (Aluminio y acero) </li>
                        <li>Vidrio </li>
                    </ul>
                    </li>
                   
                </ul>
               
            </li>
            </li>

        </ul>

        <h3>Papel post consumo aceptado </h3>
        <p style="text-align: justify;"><b>Sí:</b> periódico, libretas, libros, folders, revistas, hojas, sobres,
            legajos, cajas, folletos, cartón (se acepta encuadernado, engargolado, grapado o triturado).</p>
        <p style="text-align: justify;"><b>No:</b> papel carbón, plastificado, alumninio, celofán, fax, fotografías,
            encerado (envase de tretra pack de leche, jugos, etc.), con adhesivos (post it, calcamonías), doméstico
            usado (servilletas, higiénico, vasos, etc.)</p><br>
        <h3>Electrónicos y electrodomésticos aceptados </h3>
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
            Departamento de Proveeduría e Inventarios en el siguiente enlace: 
            <br>
            <a
                href="http://www.uaslp.mx/SecretariaAdministrativa/catalogo-de-baja"
                target="_blank">http://www.uaslp.mx/SecretariaAdministrativa/catalogo-de-baja</a></p><br>
    
            <h3>Lineamientos de recepción de residuos orgánicos</h3> 
            <ul>
                <li>Si se reciben: residuos de fruta o verduras, residuos de alimentos sin procesar, residuos de café, bolsas de té, cáscaras de frutos secos.</li>
                <li>No se recibe: papel, servilletas, cartón, restos de alimentos procesados, restos de barrido, huesos, residuos cárnicos, colillas de cigarro, chicle</li>
                <li>No se reciben residuos contaminados </li>
                <li>Residuos de no más de 3 días de post consumo</li>
                <li>Llevar y vaciar estos residuos en componentes de reuso </li>
            </ul>
            <h3>Lineamientos de residuos reciclables</h3> 
            <ul>
                <li>Estos materiales deberán estar limpios, secos y sin rastros de comida o de materia orgánica. </li>
                <li>Para el vidrio, no se admiten copas, vasos, espejos o cristales rotos, además, se debe colocar en una caja aparte del resto de residuos.  </li>
            </ul>
            <br>
            <h4>Más Informes</h4>
        <p style="!important;"><b>Laura Daniela Hernández Rodríguez</b><br><b>Sistema de Gestión
                Ambiental</b><br>Agenda Ambiental de la UASLP<br>Universidad Autónoma de San Luis Potosí<br>Manuel Nava
            No. 201, segundo piso<br>Zona Universitaria, C.P. 78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300 Ext.
            7210<br><a href="mailto:gestion.ambiental@uaslp.mx">gestion.ambiental@uaslp.mx</a></p>
    </div>
</div>

@endsection

@section('Modales')

<div class="modal fade" id="CartelEspacioConsumo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                        <div class="col-12 col-xl-10 col-lg-10 col-md-10 col-sm-10 text-center ">
                            <img src="{{asset('storage/imagenes/ConsumoResponsable/Cartel_ECR_Oct2023.png')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-end justify-content-sm-end justify-content-md-center justify-content-lg-end justify-content-xl-end mt-2">
                        <br><br>
                        <div class=" col-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 px-0 mr-4 ">
                            <a href="{{asset('storage/imagenes/ConsumoResponsable/CartelECR_semestral2023_2.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="CartelECR_semestral.jpg">CARTEL SEMESTRAL</a>
                        </div>


                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="SlowFashion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                        <div class="col-12 col-xl-10 col-lg-10 col-md-10 col-sm-10 text-center ">
                            <img src="{{asset('storage/imagenes/SlowFashion/Cartel_SlowFashion.png')}}"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div
                        class="row justify-content-around justify-content-sm-between justify-content-md-between justify-content-lg-between justify-content-xl-between mx-3 mx-lg-5 mx-xl-5  mx-md-5 mx-sm-5 mt-2">

                        <div class=" col-5 col-xl-3 col-lg-3 col-md-6 col-sm-6  ">
                            <a href={{route('Bienvenida',['nombreModal'=> 'slowFashion'])}} class="btn btn-secondary bg-light  text-muted downloadBtn "
                                role="button">REGISTRAR</a>
                        </div>
                        <div class=" col-6 col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <a href="{{asset('storage/imagenes/SlowFashion/Cartel_SlowFashion.png')}}"
                                class="btn btn-secondary bg-light  text-muted downloadBtn " href="#" role="button"
                                download="Cartel_SlowFashion.png">CARTEL</a>
                        </div>

                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'"><br>
                            <h4>Slow Fashion. Moda sostenible</h4>
                            <br><br>
                            <h4>Dirigido a</h4>
                            <p>Alumnos, docentes y personal administrativo de la UASLP, público en general.</p><br>
                            <h4>Objetivo general</h4>
                            <p>Ofrecer las herramientas teórico-prácticas necesarias para que puedas construir tus propias prendas.</p>
                            <br>
                            <h4>Programa del curso</h4>
                            <p>El curso tendrá una duración total de 32 horas divididas en 4 módulos.<br>Sesiones de practica presenciales en aulas de la UASLP (obligatorio para quien inscriba el curso como actividad de aprendizaje) </p>
                            <br>
                            <h4>Módulos</h4>
                            <ul>
                                <li><b>Módulo I y II.</b> Upcicling y Fast Fashion: 22 de abril.</li>
                                <li><b>Módulo III.</b> Alternativas sustentables y Patronaje: 29 de abril.</li>
                                <li><b>Módulo IV.</b> Confección de pieza: 6 de mayo.</li>
                                <li><b>Módulo V.</b> Acabados: 13 de mayo.</li>
                            </ul>
                            <br>
                            <h4>Prerrequisitos</h4>
                            <ul>
                                <li>Contar con disponibilidad de horarios para asistir a las sesiones programadas.</li>
                                <li>Personas con cualquier tipo de perfil, que tengan o no experiencia con el tema o manejo de maquinaria pero que tenga el interés de conocer y adaptarse.</li>
                                <li>Tener excelente disposición hacia la comunicación, aprendizaje y colaboración en el
                                    desarrollo del curso, así como de los objetivos planteados.</li>
                            </ul>
                            <br>
                            <h4>Lugar, fecha y horario</h4>
                            <ul>
                                <li>Horas teóricas: 14 horas.</li>
                                <li>Horas de práctica: 18 horas.</li>
                            </ul>
                            <br>
                            <h4>Fecha límite de registro</h4>
                            <p>19 de abril del 2023.</p>
                            <p align="center">CUPO LÍMITE: 15 personas.</p>
                            <br>
                            <h4>Costo</h4>
                            <p>Pago de curso completo (los 4 módulos):
                                <ul>
                                    <li>Participantes que pertenecen a la comunidad universitaria: Estudiantes y trabajadores de la UASLP, tiene un costo de $ 650</li>
                                    <li>Participantes externos: Instituciones públicas o privadas, dependencias de gobiernos y público en general, tiene un costo de $ 1200</li>
                                </ul>
                            <br>
                            <h4>Registro</h4>
                            <p>El taller tiene varias modalidades:<br>* Se puede llevar como actividad de aprendizaje para alumnos de licenciatura.<br><br>Para inscribirte debes registrarte en el botón "REGISTRAR" y después de eso recibirás una ficha de pago que se puede pagar directamente en el banco o se pueden hacer transferencias desde el portal de multipagos de la UASLP: <a href="https://www.finanzas.uaslp.mx/Multipagos">https://www.finanzas.uaslp.mx/Multipagos</a>.<br><br>Para que la puedas llevar como actividad de aprendizaje debes seguir los lineamientos de tu facultad.
                            </p>
                            <br>
                            <h4>Inscripciones</h4>
                            <p>Los interesados en participar deberán enviar debidamente llenado el formulario de registro, esperar 2 días a que les sea notificada su pre-inscripción y recibir la ficha de pago para que realicen el depósito del costo del curso.<br><br>El proceso de inscripción se completará al acreditar el pago de la cuota correspondiente, enviando su recibo de pago.</p>
                            <br>
                            <h4>Más información</h4>
                            <p><b>Dra. Mariana Buendía Oliva</b><br>Agenda Ambiental de la UASLP<br>Universidad Autónoma de San
                                Luis Potosí<br>Manuel Nava No. 201, segundo piso<br>Zona Universitaria, C.P.
                                78210<br>San Luis Potosí, S.L.P.<br>Tel. 826-2300 ext. 7209<br><a
                                    href="mailto:mariana.buendia@uaslp.mx">mariana.buendia@uaslp.mx<br></a>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalReutronic" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <img src="{{asset('storage/imagenes/ConsumoResponsable/ECR_Mesa_de_trabajo_1.png')}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10"
                            style="color:white; font-size:14px; padding-top: 3%; font-family: 'Myraid light';'"><br><br>
                            <h1>Programa REUTRÓNIC
                            </h1><br><br>
                            <div class="elementor-text-editor elementor-clearfix">
                                <div style="font-size: 14px; font-family: 'Myraid light';">
                                    <h3 style="color: #5c94d7;">Objetivo General</h3>
                                    <p>Crear sinergia con profesores y estudiantes para propagar en la comunidad UASLP una cultura 
                                        de consumo responsable con la práctica de y priorizando la Reparación, Reuso y Regreso de 
                                        los materiales mecano-eléctricos.</p><br>
                                        <h3 style="color: #5c94d7;">Objetivos específicos</h3>
                                        <ul>
                                            <li>Colaborar con los <b>profesores</b> de la UASLP en la formación de los estudiantes de 
                                                las carreras mecano eléctricas con la práctica de clasificación, mantenimiento 
                                                y reparación de equipos mecano- eléctricas.</li>
                                            <li><b>Ofrecer</b>, dentro de las posibilidades, a la comunidad universitaria equipos y 
                                                materiales que necesitan para sus actividades académicas y administrativas, 
                                                en especial los materiales usados en los laboratorios y talleres de las carreras 
                                                mecano- eléctricas</li>
                                            <li><b>Educar</b> acerca de las estrategias: Repiensa, Rechaza, Reduce, Reutiliza, Repara, 
                                                Regresa y permitir que los materiales tengan la oportunidad de llegar al Reciclaje. 
                                                En particular Reutilizar los materiales que aún tienen tiempo de vida útil, 
                                                así como Reparar y Regresar en buenas condiciones de uso los bienes y materiales.</li>
                                            <li><b>Mitigar</b> la obsolencia programada, los impactos a la salud y al medio ambiente que 
                                                existen por el mal manejo de los residuos electrónicos</li>
                                            <li>Motivar a la comunidad a iniciar una nueva <b>cultura de consumo</b>, uso y disposición de bienes, 
                                                que fomentan cambios en la sociedad a partir de talleres de reparación y reuso.</li>
                                        </ul><br>
                                        <h3 style="color: #5c94d7;">Dirigido a</h3>
                                        <p>La comunidad UASLP y público en general, en especial a los laboratorios, talleres y oficinas 
                                            de la UASLP que utilizan elementos electro-mecánicos.</p><br>
                                        <h3 style="color: #5c94d7;">Descripción</h3>
                                        <p>El programa de “Reutrónic” forma parte del Programa Universitario de Residuos y busca ofrecer 
                                            mecanismos para obtener circularidad en nuestros procesos, para participar en Reutrónic se 
                                            deben seguir los siguientes pasos:</p><br>
                                        <ol>
                                            <li>Realizar un trabajo previo de revisión de materiales necesitados.</li>
                                            <li>Llenar el formato de solicitud en esta página web.</li>
                                            <li>Los días calendarizados donde se lleve a cabo el programa Reutrónic se recibirán los 
                                                materiales electrónicos provenientes de la comunidad universitaria y potosina establecidos 
                                                su difusión y éstos se manejarán adecuadamente para recuperación, reuso y reparación de los 
                                                materiales que se solicitaron previamente.</li>
                                            <li>Se avisa que se encontró su solicitud y se dan opciones de horarios de entrega</li>
                                            <li>Los materiales electrónicos sobrantes se entregan el día del evento a la empresa recicladora 
                                                del material; ésta entregará un documento legal donde asegura su correcta disposición final.</li>
                                        </ol><br>
                                        <h3 style="color: #5c94d7;">Material que se pueden solicitar:</h3>
                                        <b>Residuos electrónicos y mecánicos</b><br><br>
                                        <ul>
                                            <li><b>Computación: </b>cpu, impresoras, teclados, mouse, monitores, discos duros, floppys, 
                                                tarjetas, memorias, procesadores, reguladores, servidores, laptops.
                                            </li>
                                            <li><b>Telefonia: </b>celulares, cargadores, palms, radiolocalizadores, teléfonos inalámbricos, 
                                                equipos de comunicación.
                                            </li>
                                            <li><b>Electrónica: </b>cd, tarjetas electrónicas, decodificadores, consolas de videojuegos, 
                                                reproductores de audio portátiles, adaptadores.
                                            </li>
                                            <li><b>Eléctrica: </b>cables, interruptores, capacitores, conductores, transformadores.
                                            </li>
                                        </ul><br>
                                        <p>*Esta lista no está limitada, se pueden solicitar más materiales afines al programa.</p><br>
                                        <p>*Este es un programa de gestión institucional de la UASLP que no considera ningún intercambio económico.</p><br><br><br>
                                        
                                        <h4 style="color: #5c94d7;">Más Información</h4>
                                        <p style="font-size: 14px !important;">
                                        Sistema de Gestión Ambiental
                                        <br>Agenda Ambiental de la UASLP
                                        <br>Universidad Autónoma de San Luis Potosí
                                        <br>Manuel Nava No. 201, segundo
                                        piso
                                        <br>Zona Universitaria, C.P. 78210
                                        <br>San Luis Potosí, S.L.P.
                                        <br>Tel.826-2300 Ext. 7215
                                        <br><a href="mailto:gestion.ambiental@uaslp.mx" style="color: #5c94d7">gestion.ambiental@uaslp.mx</a></p>
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
    //console.log({{$NombreM}});
     $('#{{$NombreM}}').modal('show')
 </script>
@endsection

@push('stylesheets')
<link href="{{ asset('css/nav-tabs_contenido.css') }}" rel="stylesheet" type="text/css">
@endpush
