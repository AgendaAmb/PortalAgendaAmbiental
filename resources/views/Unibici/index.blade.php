@extends('Bienvenido')

@section('Introduccion')

<div class="row justify-content-between">
    <div class="col-xl-4 col-lg-4 col-md-12 justify-content-center align-self-center mt-2">
        <img src="{{ asset('storage/imagenes/Logos/Unibici_logo.png') }}" class="img-fluid" alt="" srcset="">
    </div>
    <div class="col-xl-8 col-lg-8 col-md-12">
        <p class="text-justify">
        <br>Las ciudades del mundo ocupan solo el 3% de la tierra, pero representan entre el 60%, el 80% del consumo de
        energía y el 75% de las emisiones de carbono (ONU, 2015).
        Como se menciona en el Objetivo del Desarrollo Sostenible 13: Acción por el clima, se deben adoptar cambios de
        comportamiento y medios de transporte que emitan menos
        o cero emisiones de gases de efecto invernadero para limitar el aumento de la temperatura media mundial.
        <br>
        <br>La manera en la que nos transportamos tiene un impacto directo en el consumo de energía, las emisiones de
        carbono
        y la salud respiratoria, musculo-esquelética y mental de los humanos por lo que es necesario migrar hacía una
        movilidad urbana sostenible.
        <br>
        <br>UNIBICI es un programa de la Agenda Ambiental de la UASLP, que por medio de la bicicleta como insignia
        promueve los derechos del peatón, el derecho a la ciudad y por supuesto la movilidad urbana sostenible.
    </p>
    </div>
    <div class="col-12 justify-content-between">
        <img src="{{asset('storage/imagenes/Unibici/BI_Unibici.png')}}" class="img-fluid" alt="" srcset="">
        <button type="button" class="btn btnCur m-2" data-toggle="modal" data-target="#exampleModalCenter" >
            <p class="p-2 m-0 text-white">UNIRODADA <br> 30 DE ABRIL</p>
          </button>
    </div>
   
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            
            <div class="modal-body">
              <div class="col-12 mb-4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnCloseModal">
                  <span aria-hidden="true">X</span>
                </button>
              </div>
             
             
              <div class="row justify-content-center">
                <div class="col-11">
                  <img src="{{asset('storage/imagenes/Unibici/Unirodada.png')}}"class="img-fluid" alt="">
                </div>

              </div>
            </div>
            
          </div>
        </div>
      </div>
</div>
@endsection