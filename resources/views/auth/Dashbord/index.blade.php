@extends('Bienvenido')

@section('navbarModulos')
<!--SECCION DONDE SE DESPLEGARAN CADA UNO DE LOS MODULOS EN EL QUE EL USUARIO ESTE REGISTRADO PARA PODER REEDIRIGIRLO A SU SITIO CORRESPONDIENTE-->
@include('auth.Dashbord.navbar')
@endsection

@section('ContenidoPrincipal')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-8  col-lg-8  col-md-8 col-sm-8 col-12  bg-info">QUE ELEMENTOS SE PONDRAN EN ESTA PARTE POR EL MOMENTO</div>
        <div class="col-xl-4  col-lg-4  col-md-4 col-sm-4 col-12  px-0">
            <div class="col">
                <div class="row">
                    <div class="col-8 py-xl-5 py-lg-5 py-md-4 py-sm-4" style="color: gray;">
                        <h5 class="font-weight-bold text-center" style="color: gray;">Maria Eugenia</h5>
                        <h6 style="color: gray;" class="text-center">Tecnologias de la información</h6>
                    </div>
                    <div class="col-4 p-0 "><img src="{{asset('storage/imagenes/Logos/User-default.png')}}"
                            class="img-fluid py-xl-3 py-lg-3 py-md-1 py-sm-4" alt=""></div>
                </div>
            </div>
            <div class="col p-0 ">
                <x-acordeon :idAcordeon="'HerramientasInteres'" :tituloAcordeon="'Herramientas De Interés'"
                    haveStyle=false>
                </x-acordeon>

            </div>


        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-6 p-0 order-xl-1 order-lg-1 order-md-2 order-sm-2 order-2">
            <a class="btn w-100 font-weight-bolder "
                style="background-color: white;color:gray;border: 2px solid gray;border-radius: 0.0rem;"
                data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                CALENDARIO
            </a>
            <div id='calendar' class="mt-2"></div>
        </div>
        <div class="col-xl-5  col-lg-5 col-md-12    order-xl-2 order-lg-2  order-md-1 order-sm-1 order-1">banner de noticias</div>
        <div class="col-xl-4  col-lg-4 col-md-6   order-xl-3 order-lg-3 order-md-3 order-sm-3 order-3 p-0">
                <a class="btn w-100 font-weight-bolder" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"  style="background-color: white;color:gray;border: 2px solid gray;border-radius: 0.0rem;">
                AVISOS
                <i id="i" class="fa fa-chevron-down"></i>
                </a>
              
              <div class="collapse" id="collapseExample">
                <div class="card card-body" style="background-color: gray;
                padding: 1.25rem 0%;
                border-radius: 0.0rem;">
                <a href="" style="color:white;
                font-size: 12px;"> AQUI VAN LOS AVISOS PERSONALES DE CADA USUARIO</a>
                   
                </div>
              </div>
        </div>
    </div>

</div>
@push('stylesheets')


<link rel="stylesheet" href="{{asset('css/fullCalendar/main.css')}}">
<script src="{{asset('js/fullCalendar/main.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          
          var calendar = new FullCalendar.Calendar(calendarEl, {
          
            headerToolbar: {
                left:'prev,next',
                center:'title',
                right: 'timeGridWeek,dayGridMonth' },
            initialView: 'dayGridMonth'
            
          });
          calendar.setOption('contentHeight', 150);
          calendar.setOption('locale','Es');
          calendar.render();
        });
       
</script>
@endpush
@endsection