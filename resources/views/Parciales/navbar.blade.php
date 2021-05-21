<nav class="navbar navbar-expand-lg navbar-expand-xl navbar-expand-md " >
  <a class="navbar-brand" href="#">NOSOTROS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse " id="navbarTogglerDemo03">
      <ul class="navbar-nav w-100 justify-content-md-around">
        <li class="nav-item active">
          <a class="nav-link" href={{route('Nosotros')}}>NOSOTROS <span class="sr-only">(current)</span></a>
        </li>
       
        <li class="nav-item dropdown">
            <a class="nav-link dropdown Ejes"  href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="true">
              EJES DE TRABAJO
            </a>
            
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href={{route('Gestion')}}>GESTION INSTITUCIONAL</a></li>
              <li><a class="dropdown-item" href={{route('Educacion')}}>EDUCACIÓN  E INVESTIGACIÓN</a></li>
              <li><a class="dropdown-item" href={{route('Vinculacion')}}>VINCULACIÓN</a></li>
              <li><a class="dropdown-item" href={{route('Comunicacion')}}>COMUNICACIÓN</a></li>
            </ul>
          </li>
          <div>
            <form class="form-inline my-2 my-lg-0 ESINbnt">
              <input class="form-control mt-1 mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
            </form>
          </div>
          <div class="ESINbnt">
            <button type="button" class="btn">ESPAÑOL/INGLES</button>
          </div>
          <a class="btn btn-primary btn-sm MiPortal" href={{route('login')}} role="button">
            <img src="storage/imagenes/Logos/UBICACION-1.png" alt="" srcset="">
            MI PORTAL
          </a>
         
          <div>
           
          </div>
      </ul>
    </div>
   
  </nav>
 
  
  