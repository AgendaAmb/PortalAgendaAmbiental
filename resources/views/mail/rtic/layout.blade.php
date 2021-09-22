@component('mail::message', [ 'header_color' => '#004292' ])
    @slot('saludo')
    # Estimado(a) usuario(a):<br><br><br>
    @endslot

    Le enviamos un cordial saludo.Le escribimos de nuestro programa de "MAESTRíA INTERDISCIPLINARIA EN CIUDADES SOSTENIBLES", 
    debido a que nuestro postulante Melgarejo López Daniela, lo ha asignado a usted para otorgarle una carta de recomendación. 
    Dicho documento es requisito indispensable para continuar con su proceso de admisión
    
    
    @slot('firma')
    <img src="{{ asset('/storage/imagenes/Logos/rtic.png') }}">
    @endslot
@endcomponent
