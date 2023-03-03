<div style="height: 6vh" id="main-navbar" v-cloak>
  <b-navbar class="bg-white shadow" toggleable="sm" sticky>
    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item href="{{route('panel')}}">Inicio</b-nav-item>
        @if (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('coordinator') ||Auth::user()->hasRole('helper'))
        <li class="nav-item ">
          <a class="nav-link" href="{{route('Administracion')}}">Administración<span class="sr-only"></span></a>
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