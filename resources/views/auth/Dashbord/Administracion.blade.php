@extends('Bienvenido')

@section('navbarModulos')
<!--SECCION DONDE SE DESPLEGARAN CADA UNO DE LOS MODULOS EN EL QUE EL USUARIO ESTE REGISTRADO PARA PODER REEDIRIGIRLO A SU SITIO CORRESPONDIENTE-->
@include('auth.Dashbord.navbar')
@endsection

@section('ContenidoPrincipal')

<div class="container-fluid my-3" id="apps">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Usuarios
            </a>
        </li>

        @if (Auth::user()->hasRole('administrator'))
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                @click="cargarModulos()" aria-selected="false">Correos</a>
        </li>
        @endif
    </ul>


    <div class="tab-content" id="myTabContent"> 
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">  
            <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">

                <!--Cabecera de la tabla-->
                <thead>
                    <tr>
                        <th>Acciones</th>
                        <th>Clave única/RPE</th>

                        @if (Auth::user()->hasRole('helper'))
                            <th>Clave de facturación</th>
                        @endif

                        <th>Nombre(s)</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>

                        @if (Auth::user()->hasRole('helper'))
                            <th>Fecha de nacimiento</th>
                        @elseif (Auth::user()->hasRole('administrator') || Auth::user()->hasRole('coordinator'))
                            <th>Curp</th>
                            <th>Genero</th>
                        @endif 

                        <th>Correo</th>
                        <th>Teléfono</th>
                        @if (Auth::user()->hasRole('helper'))
                            <th>Curso/Taller</th>
                        @elseif (Auth::user()->hasRole('administrator'))
                            <th>Registrado en</th>
                        @endif

                        @if (Auth::user()->hasRole('helper'))        
                            <th>Enviado</th>
                        @endif

                        @if (Auth::user()->hasRole('helper')) 
                            <th>Pago</th>
                            <th>Tipo de pago</th>
                            <th>Factura</th>
                        @elseif (Auth::user()->hasRole('administrator') || Auth::user()->hasRole('coordinator'))
                            <th>Pagado</th>
                            <th>Fecha de registro al portal</th>
                        @endif
                    </tr>
                </thead>

                <!--Cuerpo de la tabla-->
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <!--Pendiente-->
                            @if (Auth::user()->hasRole('administrator') || Auth::user()->hasRole('coordinator'))
                                @if ($user->workshop_id == 6 ||
                                    $user->workshop_id == 10 || 
                                    $user->workshop_id == 12 ||
                                    $user->workshop_id == 15 ||
                                    $user->workshop_id == 23 ||
                                    $user->workshop_id == 35 ||
                                    $user->workshop_id == 36 ||
                                    $user->workshop_id == 38 ||
                                    $user->workshop_id == 39)
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userDetails" @click="cargarDetalles('{{json_encode($user)}}')">
                                            Detalles
                                            <i class="fas fa-eye ml-2"></i>
                                        </button>
                                    </td>
                                @else
                                    <td>Sin detalles</td>
                                @endif

                            @elseif (Auth::user()->hasRole('helper'))
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
                            <td>{{$user->name}}</td>

                            <!--Apellido paterno-->
                            <td>{{$user->middlename}}</td>

                            <!--Apellido materno-->
                            <td>{{$user->surname}}</td>

                            <!--Fecha de nacimiento o CURP-->
                            @if (Auth::user()->hasRole('helper'))
                                <td>
                                {{$user->curp}}
                                </td>
                            @elseif (Auth::user()->hasRole('administrator') || Auth::user()->hasRole('coordinator'))
                                <td>{{$user->curp}}</td>
                                <td>{{$user->gender}}</td>
                            @endif

                            <!--Correo electronico-->
                            <td>{{$user->email}}</td>

                            <!--Numero telefonico-->
                            <td>{{$user->phone_number}}</td>
                            
                            @if (Auth::user()->hasRole('helper'))
                                <!--Nombre del curso/taller-->
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

                            @if (Auth::user()->hasRole('helper'))
                                <!--Pago el curso o taller?-->
                                <td>
                                    @if ($user->workshop_paid != null)
                                        <i  class="fas fa-check-circle text-center" style="color: green; font-size: 25px;"></i>
                                    @else
                                        <!--<input type="checkbox" id="{{$user->user_workshop_id}}" @change="ConfirmarPago({{$user->id}}, {{$user->user_workshop_id}})"> Marcar como pagado-->
                                        <input type="checkbox" id="{{$user->user_workshop_id}}" @change="ConfirmarPago('{{json_encode($user)}}',{{$user->user_workshop_id}})"> Marcar como pagado
                                    @endif
                                </td>
                            
                                    @if($user->payment_type == 'Ficha_Pago')
                                        <td>Ficha de pago</td>
                                    @elseif($user->payment_type == 'Descuento_Nomina')
                                        <td>Descuento de nómina</td>
                                    @else
                                        <td></td>
                                    @endif
                            
                                <!--Informacion para facturacion-->
                                <th class="text-center">
                                    @if ($user->workshop_invoicedata == 1)
                                        <a href="#" data-toggle="modal" data-target="#EnviarFactura">
                                            <i class="fas fa-eye text-primary " style="font-size: 25px;" @click="cargarDatosFacturacion('{{json_encode($user)}}')"></i>
                                        </a>
                                    @else
                                        No
                                    @endif    
                                </th>
                                
                            @elseif (Auth::user()->hasRole('administrator') || Auth::user()->hasRole('coordinator'))
                                <!--El usuario ya pago el curso o taller?-->
                                <td>
                                    @if ($user->workshop_paid == true)
                                        <div class="text-center" style="color: green; font-size: 25px;">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                    @else
                                        <div class="text-center" style="color: red; font-size: 25px;">
                                            <i class="fas fa-times-circle"></i>
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    @if ($user->email_verified_at != NULL)
                                        {{ Carbon\Carbon::parse($user->email_verified_at)->locale('es')->isoFormat('dddd DD MMMM YYYY, hh:mm a')}}
                                    @else
                                        Sin verificar.
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        

        <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <h1 class="text-center mt-3">Correos</h1>
            <div class="row">
            
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
                                <select class="js-example-basic-multiple" v-model="cc" name="CC[]" multiple="multiple" style="width: 100%" >
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
                                <textarea name="" id="" class="form-control"required rows="10" v-model="Contenido"></textarea>
                            </div>
                        </div>
        
                        <div class="form-group row justify-content-end">
                            <div class="col-md-6 col-6 p-0">
        
                                <button class="btn btn-success" type="submit" value="Submit"
                                    v-if="!spinnerVisible">Enviar correo</button>
                                <button class="btn btn-primary" type="button" disabled v-if="spinnerVisible">
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Enviando
                                </button>
        
                            </div>
        
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-12" :style="CorreoRemitente.eje_id==1?'background-color:#3A97BA':CorreoRemitente.eje_id==2?'background-color:#52AA00':CorreoRemitente.eje_id==3?'background-color:#DAB631':CorreoRemitente.eje_id==4?'background-color:#003590':CorreoRemitente.eje_id==5?'background-color:#DE3043':'background-color:#FFFFFF'">
                            <div class="row justify-content-center">
                                <img src="{{asset('/storage/imagenes/Logos/LogoAgendaUaslp.png')}}" height="125" width="150" alt="">
                            </div>
                        </div>
                        <div class="col-12" :style="CorreoRemitente.eje_id==1?'background-color:#086588':CorreoRemitente.eje_id==2?'background-color:#009100':CorreoRemitente.eje_id==3?'background-color:#C39c00':CorreoRemitente.eje_id==4?'background-color:#001d56':CorreoRemitente.eje_id==5?'background-color:#9e0000':'background-color:#FFFFFF'">
                            <div class="row justify-content-start" style="height: 20px;width: 100px">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <pre>  @{{Contenido}}</pre>
                                <div id="summernote">Hello Summernote</div>
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
                    
                </div>
            </div>


        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>

    


        <div class="modal fade" id="InfoUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        v-if="user!=''">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header bg-primary ">
                    @if (Auth::user()->hasRole('helper'))
                    <h5 class="modal-title mx-auto  text-white" id="exampleModalLabel">Enviar ficha de pago
                    </h5>

                    @else
                    @if (Auth::user()->hasRole('coordinator'))
                    <h5 class="modal-title mx-auto  text-white" id="exampleModalLabel">Consultar información</h5>

                    @else
                    <h5 class="modal-title mx-auto  text-white" id="exampleModalLabel">Registrar asistencia</h5>

                    @endif

                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if (Auth::user()->hasRole('helper'))
                <form @submit.prevent="MandarPagoUnirodada()" method="post">
                    <div class="modal-body bg-white">
                        <div class="col-12" v-if="asistenciaExito">
                            <div class="alert alert-success text-center" role="alert">
                                ¡¡Enviado con exito!!
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <input type="file" name="pdfUniPago" id="pdfUniPago" accept="application/pdf"
                                @change="cargarPdf($event,'pdfUniPago')">
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-3 p-0">

                                <button class="btn btn-success" type="submit" value="Submit"
                                    v-if="!spinnerVisible">Enviar comprobante</button>
                                <button class="btn btn-primary" type="button" disabled v-if="spinnerVisible">
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Enviando
                                </button>

                            </div>

                        </div>
                    </div>

                </form>
                @else
                <form @submit.prevent="RegistrarAsistencia" method="post">
                    <div class="modal-body bg-white">
                        <div class="container-fluid">
                            <h5 class="modal-title3" id="exampleModalLabel"></h5>
                            <div class="form-group  ">
                                <label for="Nombre">Nombre</label>
                                <input type="text" class="form-control"
                                    :value="user[0].name+' '+user[0].middlename+' '+user[0].surname" readonly>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2 was-validated">
                                    <label for="Nombre">Clave</label>

                                    <input type="text" class="form-control" :value="user[0].id" readonly>

                                </div>
                                @if (Auth::user()->hasRole('administrator'))
                                <div class="form-group col-md-6  ">
                                    <label for="CursosInscritos">Curso a registrar asistencia</label>
                                    <select name="CursosInscritos" id="CursosInscritos" class="custom-select" required
                                        v-model="cursoAsistencia">

                                        <option v-for="Curso in CursosInscritos" :value="Curso.id">@{{Curso.name}}
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4 " v-if="user[0].invoice_data!=null">
                                    <label for="Lunch">Registrar lunch</label>

                                    <select name="Lunch" id="Lunch" class="custom-select" required v-model="Lunch"
                                        @change="RegistrarLunch(user[0].id)">
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>

                                </div>

                                @endif

                                <div class="form-group col-md-6  ">
                                    <label for="CursosInscritos">Edad</label>
                                    <input type="text" class="form-control" name="" id="" :value="user[0].age" disabled>
                                </div>
                                <div class="form-group col-md-5  ">
                                    <label for="CursosInscritos">Correo </label>

                                    <input type="text" class="form-control" name="" id="" :value="user[0].email"
                                        disabled>
                                </div>
                                <div class="form-group col-md-5  ">
                                    <label for="CursosInscritos">Dependencia</label>

                                    <input type="text" class="form-control" name="" id="" :value="user[0].dependency"
                                        disabled>
                                </div>
                                <div class="form-group col-md-6  ">

                                    <label for="CursosInscritos">Correo Alterno</label>
                                    <input type="text" class="form-control" name="" id="" :value="user[0].altern_email"
                                        disabled>
                                </div>

                                <div class="form-group col-md-6  ">
                                    <label for="CursosInscritos">Genero</label>
                                    <input type="text" class="form-control" name="" id="" :value="user[0].gender"
                                        disabled>
                                </div>

                                <div class="form-group col-md-6  " v-if="user[0].invoice_data!=null">
                                    <label for="CursosInscritos">Comprobante de pago</label> <br>
                                    <a :href="user[0].invoice_url" target="_blank" rel="noopener noreferrer"> <i
                                            class="far fa-file-pdf" style="color: red;font-size: 25px;"></i></a>
                                </div>

                            </div>
                            @if (Auth::user()->hasRole('administrator'))
                            <div class="row justify-content-end">
                                <div class="col-3 p-0">

                                    <button class="btn btn-success" type="submit" value="Submit"
                                        v-if="!spinnerVisible">Registrar
                                        asistencia</button>
                                    <button class="btn btn-primary" type="button" disabled v-if="spinnerVisible">
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Registrando asistencia
                                    </button>

                                </div>
                                <div class="col-5" v-if="asistenciaExito">
                                    <div class="alert alert-success" role="alert">
                                        ¡¡Asistencia registrada!!
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>

                    </div>
                </form>
                @endif

            </div>
        </div>
    </div>

    

    <div class="modal fade" id="userDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" v-if="Detalles!=''">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary" id="modalDetalles">
                    <h5 class="modal-title mx-auto text-white">Detalles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body bg-white">
                    <form>             
                        <div class="form-row">
                            <!--Informacion de las unirutas y unirodadas-->
                            <div class="form-group  was-validated col-12" 
                            v-if="Detalles[0].workshop_id === 6 || Detalles[0].workshop_id === 12 || Detalles[0].workshop_id === 15 || Detalles[0].workshop_id === 23 || Detalles[0].workshop_id === 36 || Detalles[0].workshop_id === 39">
                                <label for="Nombres">Contacto de emergancia</label>
                                <input type="text" class="form-control" id="nombreD" name="nombreD"
                                    :value="Detalles[0].emergency_contact" readonly
                                    style="text-transform: capitalize;">
                            </div>

                            <div class="form-group  was-validated col-12" 
                            v-if="Detalles[0].workshop_id === 6 || Detalles[0].workshop_id === 12 || Detalles[0].workshop_id === 15 || Detalles[0].workshop_id === 23 || Detalles[0].workshop_id === 36 || Detalles[0].workshop_id === 39">
                                <label for="Nombres">Telefono de contacto de emergancia</label>
                                <input type="text" class="form-control" id="nombreD" name="nombreD"
                                    :value="Detalles[0].emergency_phone" readonly
                                    style="text-transform: capitalize;">
                            </div>

                            <div class="form-group  was-validated col-12" 
                            v-if="Detalles[0].workshop_id === 6 || Detalles[0].workshop_id === 12 || Detalles[0].workshop_id === 15 || Detalles[0].workshop_id === 23 || Detalles[0].workshop_id === 36 || Detalles[0].workshop_id === 39">
                                <label for="Nombres">Condicion de salud</label>
                                <input type="text" class="form-control" id="nombreD" name="nombreD"
                                    :value="Detalles[0].health_condition" readonly
                                    style="text-transform: capitalize;">
                            </div>

                            <div class="form-group  was-validated col-12" 
                            v-if="Detalles[0].workshop_id === 6 || Detalles[0].workshop_id === 12 || Detalles[0].workshop_id === 23 || Detalles[0].workshop_id === 36">
                                <label for="Nombres">Grupo ciclista</label>
                                <input type="text" class="form-control" id="nombreD" name="nombreD"
                                    :value="Detalles[0].cycling_group" readonly
                                    style="text-transform: capitalize;">
                            </div>


                            <!--Informacion de unitrueque-->
                            <div class="form-group  was-validated col-12" v-if="Detalles[0].workshop_id == 10">
                                <label for="Nombres">Materiales para intercambiar</label>
                                <input type="text" class="form-control" id="nombreD" name="nombreD"
                                    :value="Detalles[0].unitrueque_materials" readonly
                                    style="text-transform: capitalize;">
                            </div>

                            <div class="form-group  was-validated col-12" v-if="Detalles[0].workshop_id == 10">
                                <label for="Nombres">Cantidad</label>
                                <input type="text" class="form-control" id="nombreD" name="nombreD"
                                    :value="Detalles[0].unitrueque_quantity" readonly
                                    style="text-transform: capitalize;">
                            </div>

                            <div class="form-group  was-validated col-12" v-if="Detalles[0].workshop_id == 10">
                                <label for="Nombres">Mobiliario</label>
                                <input type="text" class="form-control" id="nombreD" name="nombreD"
                                    :value="Detalles[0].unitrueque_furniture" readonly
                                    style="text-transform: capitalize;">
                            </div>

                            <div class="form-group  was-validated col-12" v-if="Detalles[0].workshop_id == 10">
                                <label for="Nombres">Empresa participante</label>
                                <input type="text" class="form-control" id="nombreD" name="nombreD"
                                    :value="Detalles[0].unitrueque_company" readonly
                                    style="text-transform: capitalize;">
                            </div>


                            <!--Informacion de reutronic-->
                            <div class="form-group  was-validated col-12" v-if="Detalles[0].workshop_id == 38">
                                <label for="Nombres">Material</label>
                                <input type="text" class="form-control" id="nombreD" name="nombreD"
                                    :value="Detalles[0].reutronic_materials" readonly
                                    style="text-transform: capitalize;">
                            </div>

                            <div class="form-group  was-validated col-12" v-if="Detalles[0].workshop_id == 38">
                                <label for="Nombres">Detalles</label>
                                <input type="text" class="form-control" id="nombreD" name="nombreD"
                                    :value="Detalles[0].reutronic_details" readonly
                                    style="text-transform: capitalize;">
                            </div>

                            <div class="form-group  was-validated col-12" v-if="Detalles[0].workshop_id == 38">
                                <label for="Nombres">Razón de uso</label>
                                <input type="text" class="form-control" id="nombreD" name="nombreD"
                                    :value="Detalles[0].reutronic_use" readonly
                                    style="text-transform: capitalize;">
                            </div>


                            <!--Informacion de minirodada-->
                            <div class="form-group  was-validated col-12" v-if="Detalles[0].workshop_id == 35">
                                <label for="Nombres">Nombre del participante</label>
                                <input type="text" class="form-control" id="nombreD" name="nombreD"
                                    :value="Detalles[0].minirodada_name" readonly
                                    style="text-transform: capitalize;">
                            </div>

                            <div class="form-group  was-validated col-12" v-if="Detalles[0].workshop_id == 35">
                                <label for="Nombres">Edad del participante</label>
                                <input type="text" class="form-control" id="nombreD" name="nombreD"
                                    :value="Detalles[0].minirodada_age" readonly
                                    style="text-transform: capitalize;">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="EnviarFactura" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        v-if="DatosFacturacion!=''">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary" id="modalComprobante">
                    <h5 class="modal-title mx-auto text-white">Enviar Factura</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body bg-white">
                    <form @submit.prevent="MandarFacturaPago('{{json_encode($user)}}')" method="post">
                        <div class="modal-body bg-white">
                            <div class="col-12" v-if="asistenciaExito">
                                <div class="alert alert-success text-center" role="alert">
                                    ¡¡Enviado con exito!!
                                </div>
                            </div>
                            <div class="form-row ">


                            </div>
                            <h5 class="modal-title3 font-weight-bold text-black" id="exampleModalLabel">Datos de facturación</h5>
                            <div class="form-row ">
                                <div class="form-group  was-validated col-12">
                                    <label for="Nombres">Nombre Completo o razón social</label>
                                    <input type="text" class="form-control" id="nombresF" name="nombresF"
                                        :value="DatosFacturacion[0].invoice_name" readonly
                                        style="text-transform: capitalize;">
                                </div>
                                <div class="form-group  was-validated col-12">
                                    <label for="Nombres">Domicilio fiscal</label>
                                    <input type="text" class="form-control" id="DomicilioF" name="DomicilioF"
                                        :value="DatosFacturacion[0].invoice_address" readonly
                                        style="text-transform: capitalize;">
                                </div>
                                <div class="form-group  was-validated col-6">
                                    <label for="Nombres">RFC</label>
                                    <input type="text" class="form-control" id="RFC" name="RFC"
                                        :value="DatosFacturacion[0].invoice_rfc" readonly style="text-transform: capitalize;">
                                </div>
                                <div class="form-group  was-validated col-6">
                                    <label for="Nombres">Correo electrónico</label>
                                    <input type="email" class="form-control" id="emailF" name="emailF"
                                        :value="DatosFacturacion[0].invoice_email" readonly>
                                </div>
                                <div class="form-group  was-validated col-6">
                                    <label for="Nombres">Teléfono</label>
                                    <input type="tel" class="form-control" id="telF" name="telF"
                                        :value="DatosFacturacion[0].invoice_phone" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Factura">Factura</label>
                                    <input type="file" name="Factura" id="Factura" accept=".png, .jpg, .jpeg,.pdf"
                                        required @change="cargarPdf($event,'Factura')">
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-3 col-6 p-0">

                                    <button class="btn btn-success" type="submit" value="Submit"
                                        v-if="!spinnerVisible">Enviar comprobante</button>
                                    <button class="btn btn-primary" type="button" disabled v-if="spinnerVisible">
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Enviando
                                    </button>

                                </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    </div>
</div>


<script>
    const users = @json($users);
</script>

<script>
    var app = new Vue({
    el: '#apps',
    data: {
        users:[],
        user:[],
        CursosInscritos:[],
        cursoAsistencia:'',
        spinnerVisible:false,
        asistenciaExito:false,
        file:'',
        Guardando :false,
        exito:true,
        DatosFacturacion:[],
        checkPago:[],
        Lunch:'',
        lunchRegister:false,
        modulos:[],
        workshop:[],
        CorreoRemitente:'',
        Correos:[],
        Destinatario:'',
        Asunto:'',
        Contenido:'',
        cc:[],
        Summernote:'',
        ws_id:-1,
        Facturacion:[],
        Detalles:[],
    },
methods: {
    enviarCorreo:function(){
    
        const formData = new FormData();
        formData.append('idUsuarioEnvio','{{Auth::user()->id}}');
        console.log(this.idUsuarioEnvio);
        formData.append('CorreoRemitente',this.CorreoRemitente.email);
        console.log(this.CorreoRemitente);
        formData.append('Destinatario',this.Destinatario);
        console.log(this.Destinatario);
        formData.append('Asunto',this.Asunto);
        console.log(this.Asunto);
        formData.append('Contenido',this.Contenido);
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
    cargarModulos:function(){
        axios.get('/api/getAllModules').then(res => {
            this.modulos=res.data.modulos;
            this.workshop=res.data.workshop;
            this.Correos=res.data.Correos;
            console.log( this.Correos);
        })
    },
    RegistrarLunch:function(idUser){
        const formData = new FormData();
        formData.append('idUsuario',idUser);
        //console.log("soy lunch",this.Lunch);
        if (this.Lunch=='Si') {
            formData.append('lunch',true);
        }else{
            formData.append('lunch',false);
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
            this.lunchRegister=true
            this.lunch='';
        }).catch(err => {
            console.log("Falso")
        })
    },
    ConfirmarPago:function(user, ws_id){
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
    cargarDatosFacturacion:function(user){
        let obj = eval('(' + user + ')');
        this.cargarUser(obj),
        this.DatosFacturacion=[],
        this.DatosFacturacion.push(obj),
        console.log("Hola",
            this.DatosFacturacion[0].name);
    },
    MandarPagoUnirodada:function(){
        console.log("hola");
        this.spinnerVisible=true;
        // Los datos necesitan ser enviados con form data
        var formData = new FormData();
        formData.append("idUser", this.user[0].id);
        formData.append("file",this.file);
        formData.append("ws_id", this.ws_id);
        console.log(this.ws_id);
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
                this.spinnerVisible=false,
                this.asistenciaExito=true
        }).catch(
            err => {
            console.log(err),
            this.spinnerVisible=false,
                this.asistenciaExito=false
            }
        )
    },
    MandarFacturaPago:function(user){
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
                this.spinnerVisible=false,
                this.asistenciaExito=true
        }).catch(
            err => {
            console.log(err),
            this.spinnerVisible=false,
                this.asistenciaExito=false
            }
        )
    },
    cargarDetalles:function(user){
        let obj = eval('(' + user + ')');
        this.cargarUser(obj),
        this.Detalles=[],
        this.Detalles.push(obj),
        console.log("Hola",
            this.Detalles[0]);
    },
    RegistrarAsistencia:function(){
        this.spinnerVisible=true
        let headers = {
                    'Content-Type': 'application/json;charset=utf-8'
            };
            var data = {
                "idUser": this.user[0].id,
                "idWorkshop":this.cursoAsistencia,
            }
            axios.post('/RegistraAsistencia',data).then(response => (
                console.log("completo"),
            this.spinnerVisible=false,
            this.asistenciaExito=true,
            this.cargarUser(this.user[0])
            )).catch((err) => {
                this.asistenciaExito=false,
                this.spinnerVisible=false,
                console.log("error")
            })
    },
    cargarPdf: function (e, index) {
            this.file='';
            this.file = e.target.files[0];
        },
    cargarUser: function (user, ws_id=-1) {
        console.log(ws_id),
        this.ws_id = ws_id,
        this.file='',
        this.asistenciaExito=false,
        this.user=[],
        this.CursosInscritos=[],
        this.user.push(user);
            // console.log("soy lunch", this.user[0].lunch)
            // console.log(this.user[0].lunch==1)
        if (this.user[0].lunch==1) {
            this.Lunch='Si'
        }else{
            this.Lunch=''
        }
        let headers = {
                    'Content-Type': 'application/json;charset=utf-8'
            };
            var data = {
                "id":user.id,
        }
        
        
    }
    }
})
</script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
        });
    });
    var markupStr = $('#summernote').summernote('code');
    console.log(markupStr);
    
</script>


@push('stylesheets')

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

<script>
    $(document).ready(function() {
 $('#example').DataTable( {
        "language":{
    "aria": {
        "sortAscending": "Activar para ordenar la columna de manera ascendente",
        "sortDescending": "Activar para ordenar la columna de manera descendente"
    },
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
    "editor": {
        "close": "Cerrar",
        "create": {
            "button": "Nuevo",
            "title": "Crear Nuevo Registro",
            "submit": "Crear"
        },
        "edit": {
            "button": "Editar",
            "title": "Editar Registro",
            "submit": "Actualizar"
        },
        "remove": {
            "button": "Eliminar",
            "title": "Eliminar Registro",
            "submit": "Eliminar",
            "confirm": {
                "_": "¿Está seguro que desea eliminar %d filas?",
                "1": "¿Está seguro que desea eliminar 1 fila?"
            }
        },
        "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\\\\\/a&gt;).&lt;\\\/a&gt;<\/a>"
        },
        "multi": {
            "title": "Múltiples Valores",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
        }
}
        },
        "responsive": true, "lengthChange": false, "autoWidth": false,
        dom:
        "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-22'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-4 text-center'l><'col-sm-4'p>>",
        buttons: [
             'csv', 'excel', 'pdf', 'print'
        ],
        "searching": true,
    }
    );
} );
</script>

@endpush

@endsection