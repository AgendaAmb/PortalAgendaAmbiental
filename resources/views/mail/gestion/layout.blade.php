@component('mail::message', [ 'header_color' => '#52AA00', 'header_bottom_color' => '#009100', 'eje_trabajo' => 'Gestión institucional' ])
    @slot('saludo')
    Estimado(a) usuario(a):
    @endslot

    Le enviamos un cordial saludo.Le escribimos de nuestro programa de "MAESTRíA INTERDISCIPLINARIA EN CIUDADES SOSTENIBLES", 
    debido a que nuestro postulante Melgarejo López Daniela, lo ha asignado a usted para otorgarle una carta de recomendación. 
    Dicho documento es requisito indispensable para continuar con su proceso de admisión

    @slot('firma')
    <img src="{{ asset('/storage/imagenes/Logos/rtic.png') }}">
    @endslot
@endcomponent
