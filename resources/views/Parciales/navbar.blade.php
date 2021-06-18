<nav class="navbar navbar-expand-lg navbar-expand-xl navbar-expand-md d-flex d-lg-none d-md-none d-xl-none">
  <a class="navbar-brand" href="#">EJES DE TRABAJO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
      <i class="fas fa-sort-down" style="color:#fff; font-size:28px;"></i>

    </span>
  </button>

  <div class="collapse navbar-collapse " id="navbarTogglerDemo02">

    <ul class="navbar-nav w-100 justify-content-md-around">
      <li class="nav-item">
        <a class="nav-link" href={{route('Gestion')}}>GESTION INSTITUCIONAL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href={{route('Educacion')}}>EDUCACIÓN E INVESTIGACIÓN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{route('Vinculacion')}}>VINCULACIÓN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{route('Comunicacion')}}>COMUNICACIÓN</a>
      </li>

    </ul>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-expand-xl navbar-expand-md d-flex d-lg-none d-md-none d-xl-none">
  <a class="navbar-brand" href="#"> NOSOTROS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
      <i class="fas fa-sort-down" style="color:#fff; font-size:28px;"></i>
    </span>
  </button>

  <div class="collapse navbar-collapse " id="navbarTogglerDemo03">
    <ul class="navbar-nav w-100 justify-content-md-around">
      <li class="nav-item">
        <a class="nav-link" href={{route('Nosotros',['id'=> 'Historia'])}}>HISTORIA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href={{route('Nosotros',['id'=> 'QuienesSomos'])}}>¿QUIENES SOMOS?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{route('Nosotros',['id'=> 'Normativa'])}}>NORMATIVA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{route('Nosotros',['id'=> 'MisiónVisión'])}}>MISIÓN Y VISIÓN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{route('Nosotros',['id'=> 'Directorio'])}}>DIRECTORIO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{route('Nosotros',['id'=> 'Contacto'])}}>CONTACTO</a>
      </li>

    </ul>
  </div>

</nav>
<nav class="navbar navbar-expand-lg navbar-expand-xl navbar-expand-md d-flex d-lg-flex d-md-flex d-xl-flex">

  <a class="btn btn-success btn-sm MiPortal navbar-brand " href={{route('login')}} role="button">
    <img src="{{asset('storage/imagenes/Logos/UBICACION-1.png')}}" alt="" srcset="">
    MI PORTAL
  </a>
  <button class="navbar-toggler d-none d-xl-none d-lg-none d-md-none d-sm-none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
      <i class="fas fa-sort-down" style="color:#fff; font-size:28px;"></i>
    </span>
  </button>

  <div class="collapse navbar-collapse d-none d-xl-flex d-lg-flex d-md-none d-sm-none" id="navbarTogglerDemo01">
    <div class="container justify-content-start">

    <ul class="navbar-nav w-100 justify-content-md-start">
      <li class="nav-item active">
        <a class="nav-link" href={{route('Nosotros')}}>NOSOTROS <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown Ejes" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown"
          aria-expanded="true">
          EJES DE TRABAJO
        </a>

        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
          <li><a class="dropdown-item" href={{route('Gestion')}}>GESTION INSTITUCIONAL</a></li>
          <li><a class="dropdown-item" href={{route('Educacion')}}>EDUCACIÓN E INVESTIGACIÓN</a></li>
          <li><a class="dropdown-item" href={{route('Vinculacion')}}>VINCULACIÓN</a></li>
          <li><a class="dropdown-item" href={{route('Comunicacion')}}>COMUNICACIÓN</a></li>
        </ul>
      </li>
      
    </div>
      <div class="container justify-content-end">
        <form class="form-inline my-2 my-lg-0 ESINbnt d-none">
          <input class="form-control mt-1 mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
        </form>
      </div>
      <div class="ESINbnt ">
        <button type="button" class="btn">ESPAÑOL/INGLES</button>
      </div>


      <div>
        <a class="btn btn-primary btn-sm MiPortal" href='http://ambiental.uaslp.mx/controlescolar' role="button">
          <img src="{{asset('storage/imagenes/Logos/UBICACION-1.png')}}" alt="" srcset="">
          MI PORTAL
        </a>
      </div>
    </ul>
  </div>
</nav>