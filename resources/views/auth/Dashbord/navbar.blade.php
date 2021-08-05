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
                @foreach ($Modulos as $Modulo)
                <li class="nav-item ">
                    <a class="nav-link" href="{{$Modulo->url}}">{{$Modulo->name}}<span class="sr-only"></span></a>
                </li>
                @endforeach
              
                @if (Auth::user()->hasRole('Administrator'))
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('Administracion')}}">Inicio<span class="sr-only"></span></a>
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