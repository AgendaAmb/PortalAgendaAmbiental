@extends('Bienvenido')

@section('navbarModulos')
@include('auth.Dashbord.navbar')
@endsection

@section('ContenidoPrincipal')

<!--Contenedor padre de la vista-->
<div class="container-fluid my-3" id="apps">

    <!--Pestañas-->
    <ul class="nav nav-tabs" id="myTab" role="tablist">

        <!--Pestaña Usuarios-->
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Usuarios
            </a>
        </li>

        <!--Pestaña Correos-->
        @if (Auth::user()->hasRole('administrator'))
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" @click="cargarModulos()" aria-selected="false">Correos</a>
            </li>
        @endif
    </ul>


    <!--Contenido de la pestaña, aqui se carga el contenido de ambas pestañas-->
    <div class="tab-content" id="myTabContent">

        <!--Cuerpo de la pestaña Usuarios, aqui se carga la tabla-->
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">

                <!--Cabecera de la tabla-->
                <thead>
                    <tr>
                        <!--Encabezado oculto-->
                        <th class="d-none"></th>
                        
                        <!--Acciones-->
                        @if (Auth::user()->hasRole('helper'))
                            <th>Acciones</th>
                        @endif

                        <!--Clave unica/RPE-->
                        <th>Clave única/RPE</th>

                        <!--Clave de facturacion-->
                        @if (Auth::user()->hasRole('helper'))
                            <th>Clave de facturación</th>
                        @endif

                        <!--Nombre(s)-->
                        <th>Nombre(s)</th>

                        <!--Appellido paterno-->
                        <th>Apellido paterno</th>

                        <!--Apellido materno-->
                        <th>Apellido materno</th>

                        <!--Fecha de nacimiento, Curp y Genero-->
                        @if (Auth::user()->hasRole('helper'))
                            <th>Fecha de nacimiento</th>
                        @elseif (Auth::user()->hasRole('administrator') || Auth::user()->hasRole('coordinator'))
                            <th>Curp</th>
                            <th>Genero</th>
                        @endif

                        <!--Correo electronico-->
                        <th>Correo</th>

                        <!--Numero de telefono-->
                        <th>Teléfono</th>

                        <!--Registro de workshops/modulos/portal/etc-->
                        @if (Auth::user()->hasRole('helper'))
                            <th>Curso/Taller</th>
                        @elseif (Auth::user()->hasRole('administrator'))
                            <th>Registrado en</th>
                        @endif

                        <!--Enviado (si se envio el comprobante de pago)-->
                        @if (Auth::user()->hasRole('helper'))
                            <th>Enviado</th>
                        @endif

                        <!--Pago (si el usuario ya pago), Tipo de pago (ficha de pago o descuento de nomina), Datos de facturacion, Fecha de registro al portal, Detalles para algunos workshops-->
                        @if (Auth::user()->hasRole('helper'))
                            <th>Pago</th>
                            <th>Tipo de pago</th>
                            <th>Factura</th>
                        @elseif (Auth::user()->hasRole('administrator') || Auth::user()->hasRole('coordinator'))
                            <th>Pagado</th>
                            <th>Fecha de registro al portal</th>
                            <th>Detalles</th>
                        @endif

                    </tr>
                </thead><!--Fin del encabezado de la tabla-->
                
                <!--Cuerpo de la tabla-->
                <tbody>
                    <!--Para obtener los datos de los usuarios se utilizo un procedimiento almacenado que es llamado desde HomeController, esto se encuentra en las funciones getAdministratorUsers y getHelperUsersNew-->
                    @foreach ($users as $user)
                        <!--La etiqueta tr sirve para crear una fila dentro de la tabla, para cada usuario se crea una fila con sus datos correspondientes-->
                        <tr>
                            <!--Columna oculta-->
                            <td class="d-none"></td>
                            
                            <!--Boton que abre el modal para enviar la ficha de pago-->
                            @if (Auth::user()->hasRole('helper'))
                                <td>
                                    <a class="edit" data-toggle="modal" id="{{$user->id}}" data-target="#InfoUser" @click="cargarUser('{{json_encode($user)}}',{{$user->user_workshop_id}})">
                                        <i class="fas fa-edit"></i>
                                        <small>Enviar ficha de pago</small>
                                    </a>
                                </td>
                            @endif

                            <!--Clave unica/RPE-->
                            <td>{{$user->id}}</td>

                            <!--Clave de facturacion-->
                            <!--La clave de facturacion para internos o estudiantes de la UASLP es igual a la clave unica o RPE, en caso de ser externos la clave sera proporcionada por finanzas-->
                            @if (Auth::user()->hasRole('helper'))
                                <td>
                                    @if ($user->type == 'App\Models\Auth\Extern')
                                        Clave de facturación pendiente
                                    @else
                                        {{$user->id}}
                                    @endif
                                </td>
                            @endif

                            <!--Nombre(s)-->
                            @if (Auth::user()->hasRole('helper'))
                                <td>{{$user->name}}</td>
                            @elseif (Auth::user()->hasRole('administrator') || Auth::user()->hasRole('coordinator'))
                                <td>{{$user->user_name}}</td>
                            @endif

                            <!--Apellido paterno-->
                            <td>{{$user->middlename}}</td>

                            <!--Apellido materno-->
                            <td>{{$user->surname}}</td>

                            <!--Fecha de nacimiento o CURP y genero-->
                            @if (Auth::user()->hasRole('helper'))
                                <td>{{$user->curp}}</td>
                            @elseif (Auth::user()->hasRole('administrator') || Auth::user()->hasRole('coordinator'))
                                <td>{{$user->curp}}</td>
                                <td>{{$user->gender}}</td>
                            @endif

                            <!--Correo electronico-->
                            <td>{{$user->email}}</td>

                            <!--Numero telefonico-->
                            <td>{{$user->phone_number}}</td>

                            <!--Registro del usuario (workshops, modulos, portal)-->
                            @if (Auth::user()->hasRole('helper'))
                                <td>{{$user->workshop_name}}</td>
                            @elseif (Auth::user()->hasRole('administrator'))
                                <td>{{$user->registered_in}}</td>
                            @endif

                            <!--Se envio la ficha de pago?-->
                            @if (Auth::user()->hasRole('helper'))
                                <td>
                                    @if ($user->workshop_sent_payment == true)
                                        <div class="text-center" style="color: green; font-size: 25px;">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <small>
                                            {{$user->workshop_name}}
                                        </small>
                                    @else
                                        <div class="text-center" style="color: red; font-size: 25px;">
                                            <i class="fas fa-times-circle"></i>
                                        </div>
                                    @endif
                                </td>
                            @endif

                            <!--Confirmacion de pago, Tipo de pago y Boton para ver los Datos de Facturacion-->
                            @if (Auth::user()->hasRole('helper'))
                                
                                <!--Si el usuario tiene registrado el pago aparece el icono de la flechita verde, sino, aparece una checkbox que el helper utilizara para marcar el workshop como pagado-->
                                <td>
                                    @if ($user->workshop_paid != null)
                                        <i class="fas fa-check-circle text-center" style="color: green; font-size: 25px;"></i>
                                    @else
                                        <input type="checkbox" id="{{$user->user_workshop_id}}" @change="ConfirmarPago('{{json_encode($user)}}',{{$user->user_workshop_id}})"> Marcar como pagado
                                    @endif
                                </td>

                                <!--Tipo de Pago-->
                                <td>
                                    @if($user->payment_type == 'Ficha_Pago')
                                        Ficha de pago
                                    @elseif($user->payment_type == 'Descuento_Nomina')
                                        Descuento de nómina
                                    @else
                                        
                                    @endif
                                </td>

                                <!--Informacion para facturacion, al presional el icono del ojo se abre un modal que muestra la informacion para generar la factura, tambien dentro del mismo modal se puede cargar la factura para enviarla-->
                                <th class="text-center">
                                    @if ($user->workshop_invoicedata == 1)
                                        <a href="#" data-toggle="modal" data-target="#EnviarFactura">
                                            <i class="fas fa-eye text-primary " style="font-size: 25px;" @click="cargarDatosFacturacion('{{json_encode($user)}}')"></i>
                                        </a>
                                    @else
                                        No
                                    @endif
                                </th>

                            <!--Si el usuario pago el Curso, Fecha de Verificacion de Correo Electronico e Informacion Adicional para cada usuario de algunos Workshops-->
                            @elseif (Auth::user()->hasRole('administrator') || Auth::user()->hasRole('coordinator'))

                                <!--El usuario ya pago el curso o taller?, Si el usuario esta registrado en un workshop que no requiera pago aparecera que No Aplica-->
                                <td>
                                    @if ($user->pay_req == 1)
                                        @if ($user->workshop_paid == true)
                                        <div class="text-center" style="color: green; font-size: 25px;">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        @else
                                        <div class="text-center" style="color: red; font-size: 25px;">
                                            <i class="fas fa-times-circle"></i>
                                        </div>
                                        @endif
                                    @else
                                        No aplica
                                    @endif
                                </td>

                                <!--Fecha de verificacion de correo electronico-->
                                <td>
                                    {{$user->email_verified_at}}
                                </td>

                                <!--Informacion adicional-->
                                <td>
                                    <!--Detalles para uniruta y unirodada-->
                                    @if($user->ws_type == "unirodada" || $user->ws_type == "uniruta")
                                        <li><small>Contacto de emergencia: {{$user->emergency_contact}}</small></li>
                                        <li><small>Numero de emergencia: {{$user->emergency_phone}}</small></li>
                                        <li><small>Condicion de salud: {{$user->health_condition}}</small></li>
                                        @if($user->ws_type == "unirodada" && $user->cycling_group != null)
                                            <li><small>Grupo ciclista: {{$user->cycling_group}}</small></li>
                                        @endif

                                    <!--Detalles para unitrueque-->
                                    @elseif($user->ws_type == "unitrueque")
                                        <li><small>Materiales para intercambio: {{$user->unitrueque_materials}}</small></li>
                                        <li><small>Cantidad: {{$user->unitrueque_quantity}}</small></li>
                                        @if($user->unitrueque_company != null)
                                            <li><small>Empresa participante: {{$user->unitrueque_company}}</small></li>
                                        @endif
                                        <li><small>Mobiliario: {{$user->unitrueque_furniture}}</small></li>

                                    <!--Detalles para reutronic-->
                                    @elseif($user->ws_type == "reutronic")
                                        <li><small>Material solicitado: {{$user->reutronic_materials}}</small></li>
                                        <li><small>Detalles: {{$user->reutronic_details}}</small></li>
                                        <li><small>Razon de uso: {{$user->reutronic_use}}</small></li>

                                    <!--Detalles para minirodada-->
                                    @elseif($user->ws_type == "minirodada")
                                        <li><small>Participante: {{$user->minirodada_name1}}<br>Edad: {{$user->minirodada_age1}}</small></li>
                                        @if($user->minirodada_name2 != null)
                                            <li><small>Participante: {{$user->minirodada_name2}}<br>Edad: {{$user->minirodada_age2}}</small></li>
                                        @endif
                                        @if($user->minirodada_name3 != null)
                                            <li><small>Participante: {{$user->minirodada_name3}}<br>Edad: {{$user->minirodada_age3}}</small></li>
                                        @endif
                                    @else
                                        <li><small>Sin detalles</small></li>
                                    @endif

                                </td><!--Fin de los detalles de usuario-->
                            @endif
                        </tr><!--Fin de la fila para cada usuario-->
                    @endforeach
                </tbody><!--Fin del cuerpo de la tabla-->
            </table>
        </div><!--Cierre cuerpo de la pestaña que carga la tabla-->



        <!--Cuerpo de la pestaña para el apartado de correos (aun no funciona, esta en proceso-->
        <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <h1 class="text-center mt-3">Correos</h1>

            <div class="row">

                <!--Contenedor para el formulario-->
                <div class="col-6">
                    <form @submit.prevent="enviarCorreo" method="post" class="text-left">

                        <div class="form-group row was-validated justify-content-start">
                            <label for="emailR" class="col-sm-2 col-form-label">Correo remitente</label>
                            <div class="col-9">
                                <select class="custom-select" id="CorreoRemitente" required v-model="CorreoRemitente">
                                    <option selected disabled value="">Remitente</option>
                                    <option :value="correo" v-for="correo in Correos">@{{correo.email}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row was-validated justify-content-start">
                            <label for="emailR" class="col-sm-2 col-form-label">Destinatario</label>
                            <div class="col-9">
                                <select class="custom-select" id="validationDefault05" required v-model="Destinatario">
                                    <option selected disabled value="">Destinatario</option>
                                    <option :value="work.name" v-for="work in workshop">@{{work.name}}</option>
                                    <option :value="modulo.name" v-for="modulo in modulos">@{{modulo.name}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row was-validated justify-content-start d-none">
                            <label for="emailR" class="col-sm-2 col-form-label">CC</label>
                            <div class="col-9">
                                <select class="js-example-basic-multiple" v-model="cc" name="CC[]" multiple="multiple" style="width: 100%">
                                    <option :value="user.id" v-for="user in users">@{{user.name}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row was-validated justify-content-start">
                            <label for="emailR" class="col-sm-2 col-form-label">Asunto</label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="validationDefault03" required v-model="Asunto">
                            </div>
                        </div>

                        <div class="form-group row was-validated justify-content-start">
                            <label for="emailR" class="col-sm-2 col-form-label">Contenido</label>
                            <div class="col-9">
                                <textarea name="" id="" class="form-control" required rows="10" v-model="Contenido"></textarea>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-md-6 col-6 p-0">
                                <button class="btn btn-success" type="submit" value="Submit" v-if="!spinnerVisible">Enviar correo</button>
                                <button class="btn btn-primary" type="button" disabled v-if="spinnerVisible">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Enviando
                                </button>
                            </div>
                        </div>

                    </form>
                </div><!--Cierre de contenedor de formulario-->


                <!--Contenedor para la previsualizavcion del correo-->
                <div class="col-6">
                    <div class="row">

                        <div class="col-12" :style="CorreoRemitente.eje_id==1?'background-color:#3A97BA':CorreoRemitente.eje_id==2?'background-color:#52AA00':CorreoRemitente.eje_id==3?'background-color:#DAB631':CorreoRemitente.eje_id==4?'background-color:#003590':CorreoRemitente.eje_id==5?'background-color:#DE3043':'background-color:#FFFFFF'">
                            <div class="row justify-content-center">
                                <img src="{{asset('/storage/imagenes/Logos/LogoAgendaUaslp.png')}}" height="125" width="150" alt="">
                            </div>
                        </div>

                        <div class="col-12" :style="CorreoRemitente.eje_id==1?'background-color:#086588':CorreoRemitente.eje_id==2?'background-color:#009100':CorreoRemitente.eje_id==3?'background-color:#C39c00':CorreoRemitente.eje_id==4?'background-color:#001d56':CorreoRemitente.eje_id==5?'background-color:#9e0000':'background-color:#FFFFFF'">
                            <div class="row justify-content-start" style="height: 20px;width: 100px"></div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <pre>@{{Contenido}}</pre>
                                <div id="summernote">
                                    Hello Summernote
                                </div>
                            </div>

                            <div class="row justify-content-start">
                                <img src="{{asset('/storage/imagenes/Logos/rtic.png')}}" height="125" width="auto" alt="">
                            </div>
                        </div>

                        <div class="col-12" :style="CorreoRemitente.eje_id==1?'background-color:#3A97BA':CorreoRemitente.eje_id==2?'background-color:#52AA00':CorreoRemitente.eje_id==3?'background-color:#DAB631':CorreoRemitente.eje_id==4?'background-color:#003590':CorreoRemitente.eje_id==5?'background-color:#DE3043':'background-color:#FFFFFF'">
                            <div class="row justify-content-start" style="height: 125px;width: auto;">
                            </div>
                        </div>

                    </div>
                </div><!--Cierre para la previsualizacion del correo-->

            </div><!--Cierre row-->
        </div><!--Cierre cuerpo de la pestaña de la seccion de correos-->



        <!--Modal para la vista de helper para enviar la ficha de pago-->
        <div class="modal fade" id="InfoUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" v-if="user!=''">
            <div class="modal-dialog modal-lg">

                <!--Contenido del modal-->
                <div class="modal-content ">

                    <!--Encabezado del modal-->
                    <div class="modal-header bg-primary ">
                        <h5 class="modal-title mx-auto  text-white" id="exampleModalLabel">
                            Enviar ficha de pago
                        </h5>

                        <!--Boton para cerrar el modal-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form @submit.prevent="MandarPagoUnirodada()" method="post">
                        <!--Cuerpo del modal-->
                        <div class="modal-body bg-white">

                            <div class="col-12" v-if="asistenciaExito">
                                <div class="alert alert-success text-center" role="alert">
                                    ¡¡Enviado con exito!!
                                </div>
                            </div>

                            <div class="form-row justify-content-center">
                                <input type="file" name="pdfUniPago" id="pdfUniPago" accept="application/pdf" @change="cargarPdf($event,'pdfUniPago')">
                            </div>

                            <div class="row justify-content-end">

                                <div class="col-3 p-0">
                                    <button class="btn btn-success" type="submit" value="Submit" v-if="!spinnerVisible">Enviar comprobante</button>
                                    <button class="btn btn-primary" type="button" disabled v-if="spinnerVisible">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Enviando
                                    </button>

                                </div>
                            </div>
                        </div><!--Fin del cuerpo del modal-->
                    </form>
                    
                </div><!--Cierre del contenido del modal-->

            </div>
        </div><!--Cierre de modal para enviar la ficha de pago-->



        <!--Modal para ver la informacion de facturacion y enviar factura-->
        <div class="modal fade" id="EnviarFactura" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" v-if="DatosFacturacion!=''">
            <div class="modal-dialog modal-lg">

                <!--Contenido del modal-->
                <div class="modal-content">

                    <!--Encabezado del modal-->
                    <div class="modal-header bg-primary" id="modalComprobante">
                        <h5 class="modal-title mx-auto text-white">Enviar Factura</h5>

                        <!--Boton para cerrar el modaL-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!--Cuerpo del modal-->
                    <div class="modal-body bg-white">
                        <form @submit.prevent="MandarFacturaPago('{{json_encode($user)}}')" method="post">
                            <div class="modal-body bg-white">

                                <!--Notificacion de envio exitoso de la factura de pago-->
                                <div class="col-12" v-if="asistenciaExito">
                                    <div class="alert alert-success text-center" role="alert">
                                        ¡¡Enviado con exito!!
                                    </div>
                                </div>
                                
                                <!--Formulario con los datos de facturacion-->
                                <h5 class="modal-title3 font-weight-bold text-black" id="exampleModalLabel">Datos de facturación</h5>
                                <div class="form-row ">

                                    <div class="form-group  was-validated col-12">
                                        <label for="Nombres">Nombre Completo o razón social</label>
                                        <input type="text" class="form-control" id="nombresF" name="nombresF" :value="DatosFacturacion[0].invoice_name" readonly style="text-transform: capitalize;">
                                    </div>

                                    <div class="form-group  was-validated col-12">
                                        <label for="Nombres">Domicilio fiscal</label>
                                        <input type="text" class="form-control" id="DomicilioF" name="DomicilioF" :value="DatosFacturacion[0].invoice_address" readonly style="text-transform: capitalize;">
                                    </div>

                                    <div class="form-group  was-validated col-6">
                                        <label for="Nombres">RFC</label>
                                        <input type="text" class="form-control" id="RFC" name="RFC" :value="DatosFacturacion[0].invoice_rfc" readonly style="text-transform: capitalize;">
                                    </div>

                                    <div class="form-group  was-validated col-6">
                                        <label for="Nombres">Correo electrónico</label>
                                        <input type="email" class="form-control" id="emailF" name="emailF" :value="DatosFacturacion[0].invoice_email" readonly>
                                    </div>

                                    <div class="form-group  was-validated col-6">
                                        <label for="Nombres">Teléfono</label>
                                        <input type="tel" class="form-control" id="telF" name="telF" :value="DatosFacturacion[0].invoice_phone" readonly>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="Factura">Factura</label>
                                        <input type="file" name="Factura" id="Factura" accept=".png, .jpg, .jpeg,.pdf" required @change="cargarPdf($event,'Factura')">
                                    </div>

                                </div>


                                <div class="row justify-content-end">

                                    <!--Boton para cargar y enviar la factura de pago-->
                                    <div class="col-md-3 col-6 p-0">
                                        <button class="btn btn-success" type="submit" value="Submit" v-if="!spinnerVisible">Enviar comprobante</button>
                                        <button class="btn btn-primary" type="button" disabled v-if="spinnerVisible">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Enviando
                                        </button>
                                    </div>

                                </div>

                            </div>

                        </form>
                    </div><!--Fin del cuerpo del modal-->
                    
                </div><!--Fin del contenido del modal-->

            </div>
        </div><!--Cierre modal de factura-->



    </div><!--Cierre de contenedor donde se carga el conetido de las pestañas-->
</div><!--Cierre de contenedor padre-->



<script>
    const users = @json($users);
</script>



<script>
    var app = new Vue({
        el: '#apps',

        data: {
            users: [],
            user: [],
            CursosInscritos: [],
            cursoAsistencia: '',
            spinnerVisible: false,
            asistenciaExito: false,
            file: '',
            Guardando: false,
            exito: true,
            DatosFacturacion: [],
            checkPago: [],
            Lunch: '',
            lunchRegister: false,
            modulos: [],
            workshop: [],
            CorreoRemitente: '',
            Correos: [],
            Destinatario: '',
            Asunto: '',
            Contenido: '',
            cc: [],
            Summernote: '',
            ws_id: -1,
            Facturacion: [],
            Detalles: [],
        },

        methods: {
            enviarCorreo: function() {
                const formData = new FormData();
                formData.append('idUsuarioEnvio', '{{Auth::user()->id}}');
                console.log(this.idUsuarioEnvio);
                formData.append('CorreoRemitente', this.CorreoRemitente.email);
                console.log(this.CorreoRemitente);
                formData.append('Destinatario', this.Destinatario);
                console.log(this.Destinatario);
                formData.append('Asunto', this.Asunto);
                console.log(this.Asunto);
                formData.append('Contenido', this.Contenido);
                console.log(this.Contenido);

                axios({
                    method: 'post',
                    url: '/sendEmail',
                    data: formData,
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(
                    res => {
                        console.log("Exito")
                    }
                ).catch(
                    err => {
                        console.log("Falso")
                    }
                )
            },


            cargarModulos: function() {
                axios.get('/api/getAllModules').then(res => {
                    this.modulos = res.data.modulos;
                    this.workshop = res.data.workshop;
                    this.Correos = res.data.Correos;
                    console.log(this.Correos);
                })
            },


            RegistrarLunch: function(idUser) {
                const formData = new FormData();
                formData.append('idUsuario', idUser);

                if (this.Lunch == 'Si') {
                    formData.append('lunch', true);
                } else {
                    formData.append('lunch', false);
                }

                axios({
                    method: 'post',
                    url: '/actualizaLunchUsuario',
                    data: formData,
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(res => {
                    console.log("Exito")
                    this.lunchRegister = true
                    this.lunch = '';
                }).catch(err => {
                    console.log("Falso")
                })
            },


            ConfirmarPago: function(user, ws_id) {
                this.cargarUser(user);
                let obj = eval('(' + user + ')');
                var data = {
                    "idUsuario": obj.id,
                    "nuevoEstadoPago": true,
                    "user_workshop_id": ws_id
                };

                axios({
                    method: 'post',
                    url: '/cambiaStatusPago',
                    data: data
                }).then(res => {
                    console.log(res.data);
                }).catch(err => {
                    console.log(err.data)
                })
            },


            cargarDatosFacturacion: function(user) {
                let obj = eval('(' + user + ')');
                this.cargarUser(obj),
                this.DatosFacturacion = [],
                this.DatosFacturacion.push(obj),
                    //console.log("Hola",
                        //this.DatosFacturacion[0].name);
            },


            MandarPagoUnirodada: function() {
                //console.log("hola");
                this.spinnerVisible = true;
                // Los datos necesitan ser enviados con form data
                var formData = new FormData();
                formData.append("idUser", this.user[0].id);
                formData.append("file", this.file);
                formData.append("ws_id", this.ws_id);
                //console.log(this.ws_id);

                axios({
                    method: 'post',
                    url: '/EnviaFicha',
                    data: formData,
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(res => {
                    console.log(res.data),
                        this.file = '',
                        this.spinnerVisible = false,
                        this.asistenciaExito = true
                }).catch(
                    err => {
                        console.log(err),
                            this.spinnerVisible = false,
                            this.asistenciaExito = false
                    }
                )
            },


            MandarFacturaPago: function(user) {
                console.log("enviar datos");
                // Los datos necesitan ser enviados con form data

                let formData = new FormData();
                formData.append("idUser", this.user[0].id);
                formData.append("file", this.file);
                formData.append("ws_id", this.user[0].user_workshop_id);

                axios({
                    method: 'post',
                    url: '/EnviaFactura',
                    data: formData,
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(res => {
                    console.log(res.data),
                        this.file = '',
                        this.spinnerVisible = false,
                        this.asistenciaExito = true
                }).catch(
                    err => {
                        console.log(err),
                            this.spinnerVisible = false,
                            this.asistenciaExito = false
                    }
                )
            },
            

            RegistrarAsistencia: function() {
                this.spinnerVisible = true
                let headers = {
                    'Content-Type': 'application/json;charset=utf-8'
                };
                var data = {
                    "idUser": this.user[0].id,
                    "idWorkshop": this.cursoAsistencia,
                }

                axios.post('/RegistraAsistencia', data).then(response => (
                    console.log("completo"),
                    this.spinnerVisible = false,
                    this.asistenciaExito = true,
                    this.cargarUser(this.user[0])
                )).catch((err) => {
                    this.asistenciaExito = false,
                        this.spinnerVisible = false,
                        console.log("error")
                })
            },


            cargarPdf: function(e, index) {
                this.file = '';
                this.file = e.target.files[0];
            },


            cargarUser: function(user, ws_id = -1) {
                console.log(ws_id),
                    this.ws_id = ws_id,
                    this.file = '',
                    this.asistenciaExito = false,
                    this.user = [],
                    this.CursosInscritos = [],
                    this.user.push(user);
                // console.log("soy lunch", this.user[0].lunch)
                // console.log(this.user[0].lunch==1)
                if (this.user[0].lunch == 1) {
                    this.Lunch = 'Si'
                } else {
                    this.Lunch = ''
                }
                let headers = {
                    'Content-Type': 'application/json;charset=utf-8'
                };
                var data = {
                    "id": user.id,
                }
            }

        },
    })
</script>




@push('stylesheets')
<!--Importacion de Booststrap-->
<link rel="stylesheet" href="{{asset('/css/DataTable/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/DataTable/Buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/DataTable/Responsive/css/responsive.bootstrap4.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="{{asset('/css/DataTable/datatables.min.js')}}"></script>
<script src="{{asset('/css/DataTable/DataTables/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/css/DataTable/Responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/css/DataTable/Responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('/css/DataTable/Buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/css/DataTable/Buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/css/DataTable/Buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/css/DataTable/Buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/css/DataTable/Buttons/js/buttons.colVis.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<!--Este script contiene todo lo relacionado a los estilos de booststrap para la vista, aqui se puede encontrar los botones para exportar la tabla a diferentes formatos,
    la paginacion y estilos de la tabla, el filtro de busqueda, etc-->
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {

                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d&lt;\\\/i&gt;<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmente"
                },

                "buttons": {
                    "collection": "Colección",
                    "colvis": "Visibilidad",
                    "colvisRestore": "Restaurar visibilidad",
                    "copy": "Copiar",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %d fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir"
                },

                "decimal": ",",
                "emptyTable": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "infoThousands": ",",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",

                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },

                "processing": "Procesando...",
                "search": "Buscar:",
                "searchBuilder": {
                    "add": "Añadir condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    "data": "Data",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor",
                    "conditions": {
                        "date": {
                            "after": "Después",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "not": "Diferente de",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual a",
                            "not": "Diferente de",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina con",
                            "equals": "Igual a",
                            "not": "Diferente de",
                            "notEmpty": "Nop vacío",
                            "startsWith": "Inicia con"
                        },
                        "array": {
                            "equals": "Igual a",
                            "empty": "Vacío",
                            "contains": "Contiene",
                            "not": "Diferente",
                            "notEmpty": "No vacío",
                            "without": "Sin"
                        }
                    }
                },

                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d",
                    "countFiltered": "{shown} ({total})"
                },

                "select": {
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "$d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    }
                },

                "thousands": ",",
                "zeroRecords": "No se encontraron resultados",
                "datetime": {
                    "previous": "Anterior",
                    "hours": "Horas",
                    "minutes": "Minutos",
                    "seconds": "Segundos",
                    "unknown": "-",
                    "amPm": [
                        "am",
                        "pm"
                    ],
                    "next": "Siguiente"
                },

                

            },
            "responsive": true,
            "lengthChange": false,
            "autoWidth": true,
            dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
                "<'row'<'col-sm-22'tr>>" +
                "<'row'<'col-sm-4'i><'col-sm-4 text-center'l><'col-sm-4'p>>",
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ],
            "searching": true,
        });
    });
</script>

@endpush

@endsection