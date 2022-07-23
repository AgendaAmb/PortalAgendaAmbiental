<nav class="shadow-lg navbar navbar-expand-lg navbar-light bg-white">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="h6 nav-link text-secondary" href="{{route('panel')}}"> INICIO </a>
        </li>
        {{-- @foreach ($Ejes as $Eje)
          <li class="nav-item">
              <a class="h6 nav-link text-secondary" href="#"> {{ Str::of($Eje->name)->upper() }} </a>
          </li>
        @endforeach --}}

        @foreach ($modulos as $Modulo)
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
          @else
            <li class="nav-item" >
              <a class="nav-link" href="{{$Modulo->url}}"> {{$Modulo->name}} <span class="sr-only"></span></a>
            </li>
          @endif
        @endforeach

        @if (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('coordinator') ||Auth::user()->hasRole('helper'))
          <li class="nav-item ">
              <a class="nav-link" href="{{route('Administracion')}}">Administración<span class="sr-only"></span></a>
          </li>
        @endif
      </ul>

      <div class="d-flex align-items-center justify-content-end">
            <ul class="navbar-nav">
              {{-- icons --}}
              {{-- <li class="nav-item ">
                <a href="#" type="button" class="btn">
                  <i class="icon-nav fas fa-cog" aria-hidden="true"></i>
                </a>
              </li>

              <li class="nav-item ">
                <button type="button" class="btn">
                  <i class="icon-nav far fa-envelope" aria-hidden="true"></i>
                </button>
              </li>
               --}}
              {{-- / icons --}}
              
              {{-- close session --}}
              <li class="nav-item ">

                  <button class="btn btn-sm btn-outline-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{-- <i class="bi bi-box-arrow-right"></i> --}}
                    {{ __('Cerrar sesión') }}
                  </button>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </li>
              
            </ul>
      </div>

    </div>
</nav>

<style>
  .icon-nav{
    font-size: 17px;
  }

  .btn-outline-danger{
      margin-left: 20px;
  }

  .icon-nav:hover,
  .icon-nav:focus{
      color: #115089;
  }

  .navbar-light .navbar-nav .nav-link {
      /* modificar el color  */
      color: black;
      font-size: 12px;
  }

  .navbar-light .navbar-nav .nav-link:hover,
  .navbar-light .navbar-nav .nav-link:focus {
    color: #115089;
    font-weight: 1000;
    border-bottom: 3px solid #115089;
  }
  
</style>