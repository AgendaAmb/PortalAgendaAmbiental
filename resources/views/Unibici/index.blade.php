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
</div>
@endsection