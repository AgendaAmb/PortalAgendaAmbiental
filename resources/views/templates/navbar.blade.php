<div style="height: 6vh" id="main-navbar" v-cloak>
  <b-navbar class="bg-white shadow" toggleable="sm" sticky>
    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item href="{{route('panel')}}">Inicio</b-nav-item>
        @foreach ($Modulos as $Modulo)
                    @if($Modulo->name=='Control Escolar' || $Modulo->id == 2 )
                        <li class="nav-item ">
                            <div class="nav-link">
                                <form action="{{route("PreloginControlEscolar")}}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <button style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" type="submit">
                                        Control Escolar
                                        <span class="sr-only"></span>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @elseif($Modulo->name=='20Aniversario')
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('20home')}}">20 Aniversario<span class="sr-only"></span></a>
                        </li>
                    @else
                        <li class="nav-item" >
                            <a class="nav-link" href="{{$Modulo->url}}">{{$Modulo->name}}<span class="sr-only"></span></a>
                        </li>
                    @endif
                @endforeach
        @if (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('coordinator') ||Auth::user()->hasRole('helper'))
        <li class="nav-item ">
          <a class="nav-link" href="{{route('Administracion')}}">Administración<span class="sr-only"></span></a>
        </li>
        @endif
        @if(!$is_ce)
                <li class="nav-item ">
                    <a class="nav-link text-nowrap" href="https://ambiental.uaslp.mx/controlescolar/">Portal de postulaciones<span class="sr-only"></span></a>
                </li>
        @endif
      </b-navbar-nav>
    </b-collapse>
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

  </b-navbar>
</div>