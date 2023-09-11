<div class="bg-secondary mx-0 px-0" style="height: 40px; width: 100%;">
</div>
<nav class="navbar navbar-expand-lg navbar-expand-md" style="background-color: #115089;">
    <a class="navbar-brand" href="#">Modulos</a>
    <button class="navbar-toggler d-flex" type="button" data-toggle="collapse" data-target="#navbarSistemas"
        aria-controls="navbarSistemas" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon  d-flex d-xl-none d-lg-none d-md-none">
            <i class="fas fa-sort-down" style="color:#fff; font-size:28px;"></i>
        </span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSistemas">
        <div class="container justify-content-start">
            <ul class="navbar-nav w-100 justify-content-md-start">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('panel')}}">Inicio<span class="sr-only"></span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="https://apps.powerapps.com/play/e/default-60681658-0f2d-4a4e-aaf1-6fd5f2dba33f/a/cf4c2f6d-8328-49ab-9881-ce3ae30da8c9?tenantId=60681658-0f2d-4a4e-aaf1-6fd5f2dba33f&hint=d9449612-ac5a-4155-9deb-3ccd9a1d5b56&sourcetime=1694406393065">Solicitud instalaciones<span class="sr-only"></span></a>
                </li>

                @foreach ($Modulos as $Modulo)
                @if($Modulo->name!='Control Escolar')
                    @if($Modulo->name=='20Aniversario')
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('20home')}}">20 Aniversario<span class="sr-only"></span></a>
                        </li>
                    @else
                        <li class="nav-item" >
                            <a class="nav-link" href="{{$Modulo->url}}">{{$Modulo->name}}<span class="sr-only"></span></a>
                        </li>
                    @endif
                @endif
                @endforeach

                @if (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('coordinator') || Auth::user()->hasRole('helper'))
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('Administracion')}}">Administración<span class="sr-only"></span></a>
                    </li>
                @endif
                

                @if(!$is_ce)
                <li class="nav-item ">
                    <a class="nav-link text-nowrap" href="https://ambiental.uaslp.mx/controlescolar/">Portal de postulaciones<span class="sr-only"></span></a>
                </li>
                @endif

            </ul>
        </div>
        <div class="container justify-content-end">
            <ul class="navbar-nav w-100 justify-content-md-end">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Cerrar sesión') }}
                    <span class="sr-only">

                    </span>

                </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>



    </div>
</nav>

