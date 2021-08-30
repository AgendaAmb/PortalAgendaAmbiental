@extends('Bienvenido')

@section('navbarModulos')
<!--SECCION DONDE SE DESPLEGARAN CADA UNO DE LOS MODULOS EN EL QUE EL USUARIO ESTE REGISTRADO PARA PODER REEDIRIGIRLO A SU SITIO CORRESPONDIENTE-->
@include('auth.Dashbord.navbar')
@endsection
@section('ContenidoPrincipal')
<div class="container-fluid mt-3" id="apps">

    <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                @if (Auth::user()->hasRole('administrator'))
                <th class="d-block d-xl-none d-lg-none d-md-none">Información</th>
                @endif
                <th>Acciones</th>
                <th>Clave única/RPE</th>
                <th>Nombre</th>

                <th>Correo</th>
                <th>Genero</th>

                <th>Teléfono</th>
                @if (Auth::user()->hasRole('administrator'))
                <th>Rol</th>
                <th>Sistema</th>
                @endif
                <th>Cursos/Talleres</th>
                @if (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('coordinator'))
                <th>Condición de salud</th>
                <th>Nombre de contacto de emergencia</th>
                <th>Télefono de contacto de emergencia</th>
                @endif

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)

            <tr>
                @if (Auth::user()->hasRole('administrator'))
                <th class="d-block d-xl-none d-lg-none d-md-none">Información</th>
                @endif
                <td>
                    <a class="edit" data-toggle="modal" id={{$user->id}} data-target="#InfoUser"
                        @click="cargarUser({{$user}})">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>{{$user->id}} </td>
                <td>{{$user->name." ".$user->middlename." ".$user->surname}}</td>

                <td>{{$user->email}}</td>
                <td>{{$user->gender==null?"Sin Registro":$user->gender}}</td>

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
                @endif


                <td>
                    @foreach ($user->workshops as $key => $workshops)
                    <li>{{$workshops->description}}</li>
                    @endforeach
                </td>
                @if (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('coordinator'))
                <th>{{$user->health_condition}}</th>
                <th>{{$user->emergency_contact}}</th>
                <th>
                    <a href="tel:{{$user->emergency_contact_phone}}">{{$user->emergency_contact_phone}}</a>
                </th>
                @endif

            </tr>

            @endforeach

        </tbody>
        <tfoot>
            @if (Auth::user()->hasRole('administrator'))
            <th class="d-block d-xl-none d-lg-none d-md-none">Información</th>
            @endif
            <th>Acciones</th>
            <th>Clave única/RPE</th>
            <th>Nombre</th>


            <th>Correo</th>
            <th>Genero</th>

            <th>Teléfono</th>
            @if (Auth::user()->hasRole('administrator'))
            <th>Rol</th>

            <th>Sistema</th>
            @endif
            <th>Cursos/Talleres</th>
            @if (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('coordinator'))
            <th>Condición de salud</th>
            <th>Nombre de contacto de emergencia</th>
            <th>Télefono de contacto de emergencia</th>
            @endif
            </tr>
        </tfoot>
    </table>

    <div class="modal fade" id="InfoUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        v-if="user!=''">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header bg-primary ">
                    <h5 class="modal-title mx-auto  text-white" id="exampleModalLabel">Registrar asistencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="RegistrarAsistencia" method="post"  >
                <div class="modal-body bg-white" >
                    <div class="container-fluid">
                        <h5 class="modal-title3" id="exampleModalLabel"></h5>
                        <div class="form-group  ">
                            <label for="Nombre">Nombre</label>
                            <input type="text" class="form-control" :value="user[0].name" readonly>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4 was-validated">
                                <label for="Nombre">Clave</label>
                              
                                <input type="text" class="form-control" :value="user[0].id" readonly>
                              
                            </div>
                            <div class="form-group col-md-6  ">
                                <label for="CursosInscritos">Curso a registrar asistencia</label>
                               <select name="CursosInscritos" id="CursosInscritos" class="custom-select" required v-model="cursoAsistencia">
                               
                                <option v-for="Curso in CursosInscritos" :value="Curso.id">@{{Curso.name}}</option>
                               </select>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-4">
                                
                            <button class="btn btn-success" type="submit" value="Submit"
                               >Registrar asistencia</button v-if="!spinnerVisible">
                                <button class="btn btn-primary" type="button" disabled  v-if="spinnerVisible"> 
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Registrando asistencia
                                  </button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            </div>
        </div>
    </div>
</div>


<script>
    var app = new Vue({
  el: '#apps',
  data: {
    users:[],
    user:[],
    CursosInscritos:[],
    cursoAsistencia:'',
    spinnerVisible:false
  },
  mounted: function () {
  this.$nextTick(function () {
    @foreach($users as $user)
                this.users.push({
                    "id":'{{$user->id}}',
                    "name":'{{$user->name." ".$user->middlename." ".$user->surname}}',
                    "residence":'{{$user->residence}}',
                    "ocupation":'{{$user->ocupation}}',
                    "ethnicity":'{{$user->ethnicity}}',
                    "disability":'{{$user->disability}}',
                    "ethnicity":'{{$user->ethnicity}}',
                    "interested_on_further_courses":'{{$user->interested_on_further_courses}}',
                    "emergency_contact":'{{$user->emergency_contact}}',
                    "emergency_contact_phone":'{{$user->emergency_contact_phone}}',
                    "health_condition":'{{$user->health_condition}}'
                });
    @endforeach
  })
},
  methods: {
    RegistrarAsistencia:function(){
        this.spinnerVisible=true
        let headers = {
                    'Content-Type': 'application/json;charset=utf-8'
            };
            var data = {
       	        "iduser": this.user[0].id,
                "idWorshop":this.cursoAsistencia,
            }
            axios.post('/RegistraAsistencia',data).then(response => (
                console.log("completo"),
            this.spinnerVisible=false
           
             )).catch((err) => {
                this.spinnerVisible=false,
                console.log("error")
          })
    },
    cargarUser: function (user) {
      this.user=[],
      this.CursosInscritos=[],
        this.user=this.users.filter(E=>E.id=={{$user->id}});
       
        @foreach(Auth::user()->getRegisteredWorkshops() as $E)
                this.CursosInscritos.push({
                    "id":'{{$E['id']}}',
                    "name":'{{$E['name']}}'
                }  
                )
      @endforeach
     
    }
    }
})
</script>


@push('stylesheets')

<link rel="stylesheet" href="{{asset('/css/DataTable/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/DataTable/Buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/DataTable/Responsive/css/responsive.bootstrap4.min.css')}}">




<script src="{{asset('/css/DataTable/datatables.min.js')}}"></script>
<script src="{{asset('/css/DataTable/DataTables/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/css/DataTable/Responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/css/DataTable/Responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('/css/DataTable/Buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/css/DataTable/Buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/css/DataTable/Buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/css/DataTable/Buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/css/DataTable/Buttons/js/buttons.colVis.min.js')}}"></script>
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
        "<'row'<'col-sm-12'tr>>" +
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