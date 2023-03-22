@extends('Bienvenido')

@section('navbarModulos')
<!--SECCION DONDE SE DESPLEGARAN CADA UNO DE LOS MODULOS EN EL QUE EL USUARIO ESTE REGISTRADO PARA PODER REEDIRIGIRLO A SU SITIO CORRESPONDIENTE-->
@include('auth.Dashbord.navbar')
@endsection
@section('ContenidoPrincipal')
<div class="container-fluid my-3" id="apps">


    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Usuarios</a>
        </li>
        @if (Auth::user()->hasRole('administrator'))
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" @click="cargarModulos()" aria-selected="false">Correos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
        </li>
        @endif

    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        @if (Auth::user()->hasRole('administrator'))
                        <th class="d-block d-xl-none d-lg-none d-md-none">Información</th>
                        @endif
                        <th>Acciones</th>
                        <th>Clave única/RPE</th>
                        <th>Clave de facturación</th>
                        <th>Nombre</th>

                        <th>Curp</th>
                        <th>Correo</th>
                        <th>Metodo de pago</th>
                        @if (Auth::user()->hasRole('coordinator'))
                        <th>Género</th>
                        @endif
                        <th>Teléfono</th>
                        @if (Auth::user()->hasRole('administrator'))
                        <th>Rol</th>
                        <th>Sistema</th>
                        <th>Pago unirodada</th>
                        @endif
                        <th>Cursos/Talleres</th>
                        <th>Eje</th>
                        @if (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('coordinator'))
                        <th>Condición de salud</th>
                        <th>Nombre de contacto de emergencia</th>
                        <th>Télefono de contacto de emergencia</th>

                        <th>Grupo ciclista</th>

                        @endif

                        <!--Se oculta la fecha de alta al portal (no necesaria)-->
                        <!--@if(Auth::user()->hasRole('administrator')||Auth::user()->hasRole('helper')||Auth::user()->hasRole('coordinator'))
                        <th>Fecha de registro al portal</th>
                        @endif-->

                        @if (Auth::user()->hasRole('coordinator'))
                        <th>Comprobante de pago</th>
                        @endif
                        @if (Auth::user()->hasRole('helper'))
                        <th>Enviado</th>
                        <th>Pago</th>
                        <th>Factura</th>
                        @endif

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        @if (Auth::user()->hasRole('administrator'))
                        <th class="d-block d-xl-none d-lg-none d-md-none">Información</th>
                        @endif
                        @if (Auth::user()->hasRole('administrator'))
                        <td>
                            @if ($user->getRegisteredWorkshops()!=[])
                            <a class="edit" data-toggle="modal" id={{$user->id}} data-target="#InfoUser" @click="cargarUser({{$user}})">
                                <i class="fas fa-edit"></i>
                            </a>
                            @endif
                        </td>
                        @else
                        <td>
                            <a class="edit" data-toggle="modal" id={{$user->id}} data-target="#InfoUser" @click="cargarUser({{$user}},{{$user->workshops[0]->pivot->id}})">
                                <i class="fas fa-edit"></i>
                                @if (Auth::user()->hasRole('helper'))
                                <small>ENVIAR FICHA DE PAGO</small>
                                @endif
                            </a>
                        </td>
                        @endif

                        <td>{{$user->id}} </td>
                        <td></td>
                        <td>{{$user->name." ".$user->middlename." ".$user->surname}}</td>
                        <th>{{$user->curp==null?"Sin Registro":$user->curp}}</th>
                        <td>{{$user->email}}</td>
                        
                        <td>
                            @if($user->workshops[0]->id == 45)
                            @foreach($users2 as $user2)
                                @if($user->id == $user2->user_id)
                                    @if($user2->payment_type == 'Ficha_Pago')
                                        Ficha de pago
                                    @elseif($user2->payment_type == 'Descuento_Nomina')
                                        Descuento de nómina
                                    @elseif($user2->payment_type == null)
                                        Sin especificación
                                    @endif
                                @endif
                            @endforeach
                            @endif
                        </td>
                        
                        
                        
                        @if (Auth::user()->hasRole('coordinator'))
                        <td>{{$user->gender==null?"Sin Registro":$user->gender}}</td>
                        @endif
                        <td>{{$user->phone_number==null?"Sin Regitro":$user->phone_number}}</td>

                        @if (Auth::user()->hasRole('administrator'))
                        <td>
                            @foreach ($user->getRoleNames() as $rol)
                            <li>{{$rol}}</li>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($user->userModules as $key => $Modulo)
                            <li>{{$Modulo->name}}</li>
                            @endforeach
                        </td>

                        <td>{{$user->paid?'Si':'No'}}</td>

                        @endif


                        <td>
                            @foreach ($user->workshops as $key => $workshops)
                            <li>{{$workshops->description}}</li> {{-- CURSOS VIGENTES --}}
                            @endforeach
                        </td>
                        <td> </td>
                        @if (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('coordinator'))
                        <th>{{$user->health_condition}}</th>
                        <th>{{$user->emergency_contact}}</th>
                        <th>
                            <a href="tel:{{$user->emergency_contact_phone}}">{{$user->emergency_contact_phone}}</a>
                            @if (Auth::user()->hasRole('coordinator'))
                            @if ($user->invoice_data!=null)
                            <i class="far fa-file-pdf" style="color: red;font-size: 25px;"></i>
                            @endif

                            @endif
                        </th>

                        <th>{{$user->grupoCiclista}}</th>

                        @endif
                        <!--Fecha de registro en el portal
                        @if(Auth::user()->hasRole('administrator')||Auth::user()->hasRole('helper')||Auth::user()->hasRole('coordinator'))

                        <td>{{ Carbon\Carbon::parse($user->created_at)->locale('es')->isoFormat('dddd DD MMMM YYYY,
                            h:mm:ss a')}}</td>

                        @endif-->


                        @if (Auth::user()->hasRole('coordinator'))
                        @if ($user->invoice_data!=null)
                        <td><a href="{{$user->invoice_data}}" target="_blank" rel="noopener noreferrer"> <i class="far fa-file-pdf" style="color: red;font-size: 25px;"></i></td>
                        @else
                        <td></td>
                        @endif

                        @endif
                        @if (Auth::user()->hasRole('helper'))
                        {{--
                            @if ($user->sent == true)
                                <td class="text-center" style="color: green; font-size:25px; "><i
                                        class="fas fa-check-circle"></i></td>
                                    <!-- icono palomita -->
                            @else
                                <td class="text-center" style="color: red; font-size:25px; "><i class="fas fa-times-circle"></i>
                                </td><!-- icono tachita -->
                            @endif
                        --}}

                        <td>
                            @foreach ($user->workshops as $w)
                            @if ($w->pivot->sent == true)
                            <div class="text-center" style="color: green; font-size:25px; ">
                                <i class="fas fa-check-circle"></i>
                            </div><!-- icono palomita -->
                            <small>
                                @foreach ($user->workshops as $ws)
                                {{$ws->id==$w->pivot->workshop_id ? $ws->name : ''}}
                                @endforeach
                            </small>
                            @else
                            <div class="text-center" style="color: red; font-size:25px; ">
                                <i class="fas fa-times-circle"></i>
                            </div><!-- icono tachita -->
                            @endif
                            @endforeach
                        </td>


                        @if ($user->workshops[0]->pivot->paid!=null)
                        <td class="text-center">
                            <i style="color: green; font-size:25px; " class="fas fa-check-circle text-center"></i>
                        </td>
                        @else
                        <td>

                            <input type="checkbox" name="{{$user->id.$user->middlename}}" id="{{$user->id.$user->middlename}}" @change="ConfirmarPago({{$user}},{{$user->workshops[0]->pivot->id}})">
                            Si
                        </td>

                        @endif


                        <th class="text-center ">
                            @if($user->workshops[0]->pivot->invoice_data == 1)
                            <a href="#" data-toggle="modal" data-target="#EnviarFactura"><i class="fas fa-eye text-primary " style="font-size: 25px;" @click="cargarDatosFacturacion({{$user}})"></i>
                            </a>
                            @else
                            no
                            @endif
                        </th>
                        @endif
                    </tr>
                    </tr>

                    @endforeach

                </tbody>
                <tfoot>
                    @if (Auth::user()->hasRole('administrator'))
                    <th class="d-block d-xl-none d-lg-none d-md-none">Información</th>
                    @endif
                    <th>Acciones</th>
                    <th>Clave única/RPE</th>
                    <th>Clave de facturación</th>
                    <th>Nombre</th>
                    <th>Curp</th>

                    <th>Correo</th>
                    @if (Auth::user()->hasRole('administrator'))
                    <th>Genero</th>
                    @endif
                    <th>Teléfono</th>
                    @if (Auth::user()->hasRole('administrator'))
                    <th>Rol</th>

                    <th>Sistema</th>
                    <th>Pago unirodada</th>
                    @endif
                    <th>Cursos/Talleres</th>
                    <th>Eje</th>
                    @if (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('coordinator'))
                    <th>Condición de salud</th>
                    <th>Nombre de contacto de emergencia</th>
                    <th>Télefono de contacto de emergencia</th>

                    <th>Grupo ciclista</th>
                    @endif

                    <!--@if(Auth::user()->hasRole('administrator')||Auth::user()->hasRole('helper')||Auth::user()->hasRole('coordinator'))
                        <th>Fecha de registro: </th> {{-- fecha para el registro(CHECAR --}}
                    @endif-->

                    @if (Auth::user()->hasRole('coordinator'))
                    <th>Comporbante de pago</th>
                    @endif
                    @if (Auth::user()->hasRole('helper'))
                    <th>Enviado</th>
                    <th>Pago</th>
                    <th>Factura</th>
                    @endif
                    </tr>
                </tfoot>
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




    <div class="modal fade" id="InfoUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" v-if="user!=''">
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
                    </div>

                </form>
                @else
                <form @submit.prevent="RegistrarAsistencia" method="post">
                    <div class="modal-body bg-white">
                        <div class="container-fluid">
                            <h5 class="modal-title3" id="exampleModalLabel"></h5>
                            <div class="form-group  ">
                                <label for="Nombre">Nombre</label>
                                <input type="text" class="form-control" :value="user[0].name+' '+user[0].middlename+' '+user[0].surname" readonly>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2 was-validated">
                                    <label for="Nombre">Clave</label>

                                    <input type="text" class="form-control" :value="user[0].id" readonly>

                                </div>
                                @if (Auth::user()->hasRole('administrator'))
                                <div class="form-group col-md-6  ">
                                    <label for="CursosInscritos">Curso a registrar asistencia</label>
                                    <select name="CursosInscritos" id="CursosInscritos" class="custom-select" required v-model="cursoAsistencia">

                                        <option v-for="Curso in CursosInscritos" :value="Curso.id">@{{Curso.name}}
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4 " v-if="user[0].invoice_data!=null">
                                    <label for="Lunch">Registrar lunch</label>

                                    <select name="Lunch" id="Lunch" class="custom-select" required v-model="Lunch" @change="RegistrarLunch(user[0].id)">
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

                                    <input type="text" class="form-control" name="" id="" :value="user[0].email" disabled>
                                </div>
                                <div class="form-group col-md-5  ">
                                    <label for="CursosInscritos">Dependencia</label>

                                    <input type="text" class="form-control" name="" id="" :value="user[0].dependency" disabled>
                                </div>
                                <div class="form-group col-md-6  ">

                                    <label for="CursosInscritos">Correo Alterno</label>
                                    <input type="text" class="form-control" name="" id="" :value="user[0].altern_email" disabled>
                                </div>

                                <div class="form-group col-md-6  ">
                                    <label for="CursosInscritos">Genero</label>
                                    <input type="text" class="form-control" name="" id="" :value="user[0].gender" disabled>
                                </div>

                                <div class="form-group col-md-6  " v-if="user[0].invoice_data!=null">
                                    <label for="CursosInscritos">Comprobante de pago</label> <br>
                                    <a :href="user[0].invoice_url" target="_blank" rel="noopener noreferrer"> <i class="far fa-file-pdf" style="color: red;font-size: 25px;"></i></a>
                                </div>







                            </div>
                            @if (Auth::user()->hasRole('administrator'))
                            <div class="row justify-content-end">
                                <div class="col-3 p-0">

                                    <button class="btn btn-success" type="submit" value="Submit" v-if="!spinnerVisible">Registrar
                                        asistencia</button>
                                    <button class="btn btn-primary" type="button" disabled v-if="spinnerVisible">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
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
    <div class="modal fade" id="EnviarFactura" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" v-if="DatosFacturacion!=''">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary" id="modalComprobante">
                    <h5 class="modal-title mx-auto text-white">Comprobante de pago Unibici</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body bg-white">
                    <form @submit.prevent="MandarFacturaPago({{$user}},{{$user->workshops[0]->pivot->id}})" method="post">
                        <div class="modal-body bg-white">
                            <div class="col-12" v-if="asistenciaExito">
                                <div class="alert alert-success text-center" role="alert">
                                    ¡¡Enviado con exito!!
                                </div>
                            </div>
                            <div class="form-row ">


                            </div>
                            <h5 class="modal-title3 font-weight-bold text-black" id="exampleModalLabel">Datos de
                                facturación</h5>
                            <div class="form-row ">
                                <div class="form-group  was-validated col-12">
                                    <label for="Nombres">Nombre Completo o razón social</label>
                                    <input type="text" class="form-control" id="nombresF" name="nombresF" :value="DatosFacturacion[0].invoice_data.name" readonly style="text-transform: capitalize;">
                                </div>
                                <div class="form-group  was-validated col-12">
                                    <label for="Nombres">Domicilio fiscal</label>
                                    <input type="text" class="form-control" id="DomicilioF" name="DomicilioF" :value="DatosFacturacion[0].invoice_data.address" readonly style="text-transform: capitalize;">
                                </div>
                                <div class="form-group  was-validated col-6">
                                    <label for="Nombres">RFC</label>
                                    <input type="text" class="form-control" id="RFC" name="RFC" :value="DatosFacturacion[0].invoice_data.rfc" readonly style="text-transform: capitalize;">
                                </div>
                                <div class="form-group  was-validated col-6">
                                    <label for="Nombres">Correo electrónico</label>
                                    <input type="email" class="form-control" id="emailF" name="emailF" :value="DatosFacturacion[0].invoice_data.email" readonly>
                                </div>
                                <div class="form-group  was-validated col-6">
                                    <label for="Nombres">Teléfono</label>
                                    <input type="tel" class="form-control" id="telF" name="telF" :value="DatosFacturacion[0].invoice_data.phone" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Factura">Factura</label>
                                    <input type="file" name="Factura" id="Factura" accept=".png, .jpg, .jpeg,.pdf" required @change="cargarPdf($event,'Factura')">
                                </div>
                            </div>
                            <div class="row justify-content-end">
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
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Va a remplazar todo
    const users = @json($users);
    const modulos = @json($Modulos);
    const users2 = @json($users2);
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
        },
        mounted: function() {
            this.$nextTick(function() {
                @foreach($users as $user)
                this.users.push({
                    "id": '{{$user->id}}',
                    "name": '{{$user->name." ".$user->middlename." ".$user->surname}}',
                    "residence": '{{$user->residence}}',
                    "ocupation": '{{$user->ocupation}}',
                    "ethnicity": '{{$user->ethnicity}}',
                    "disability": '{{$user->disability}}',
                    "ethnicity": '{{$user->ethnicity}}',
                    "interested_on_further_courses": '{{$user->interested_on_further_courses}}',
                    "emergency_contact": '{{$user->emergency_contact}}',
                    "emergency_contact_phone": '{{$user->emergency_contact_phone}}',
                    "health_condition": '{{$user->health_condition}}',
                    "invoice_data": users['{{ $loop->index }}'].invoice_data,
                    "file_path": "{{$user->invoice_url}}",
                    "lunch": "{{$user->lunch}}"
                });
                @endforeach
                console.log(this.users);
                $(document).ready(function() {
                    $('#summernote').summernote();
                });
            })
        },
        methods: {
            enviarCorreo: function() {

                const formData = new FormData();
                formData.append('idUsuarioEnvio', '{{Auth::user()->id}}');
                formData.append('CorreoRemitente', this.CorreoRemitente.email);
                formData.append('Destinatario', this.Destinatario);
                formData.append('Asunto', this.Asunto);
                formData.append('Contenido', this.Contenido);
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
            metodoPago: function() {
                console.log(users2.payment_type);
            }
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
                //console.log("soy lunch",this.Lunch);
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
                var data = {
                    "idUsuario": user.id,
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
                this.cargarUser(user);
                this.DatosFacturacion = [],
                    this.DatosFacturacion.push(user);
                console.log(this.DatosFacturacion[0].invoice_data)
            },
            MandarPagoUnirodada: function() {
                console.log("hola");
                this.spinnerVisible = true;
                // Los datos necesitan ser enviados con form data
                var formData = new FormData();
                formData.append("idUser", this.user[0].id);
                formData.append("file", this.file);
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
            MandarFacturaPago: function(user, ws_id) {
                console.log("enviar datos");
                // Los datos necesitan ser enviados con form data
                var formData = new FormData();
                formData.append("idUser", this.user[0].id);
                formData.append("file", this.file);
                formData.append("ws_id", ws_id);
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
                // console.log(ws_id)
                this.ws_id = ws_id;
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
                axios.post('/GetWorkshops', data).then(response => (
                    response.data.forEach(element => {
                        if (!element.asistenciaUsuario) {
                            this.CursosInscritos.push({
                                'id': element.id,
                                'name': element.name
                            })
                        }
                    })
                )).catch((err) => {
                    console.log(err)
                })
            }
        }
    })
</script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({});
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
        $('#example').DataTable({
            "language": {
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
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
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