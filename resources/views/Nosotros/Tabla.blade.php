<div class="tab-content" id="tab-content-nosotros">
    <div 
    @if ($id=="Historia" ||$id==null)class="tab-pane fade show active" @else class="tab-pane fade" @endif 
    id="Historia" role="tabpanel" aria-labelledby="v-pills-home-tab">

        @include('Nosotros.Historia')
        
        @include('Nosotros.Quienes-somos')
        @include('Nosotros.Mision-Vision')
        @include('Nosotros.Normativa')
        @include('Nosotros.Directorio')
        @include('Nosotros.Contacto')
    </div>