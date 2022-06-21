{{--

--}}

@extends('Bienvenido')

@php
$titulo = '<strong> ¿Qué hacemos? </strong>';
$texto = 'El área de
Comunicación difunde
y visibiliza las
acciones que la
Universidad
implementa para
mejorar de forma
continua la
sostenibilidad en
todas las acciones
sustantivas; para
ello se basa en
estrategias de
comunicación que
buscan fortalecer la
cooperación entre la
comunidad
universitaria y la
sociedad.

Difunde los
programas
universitarios
dentro de la
Universidad y la
oferta educativa de
cursos, talleres,
diplomados, foros,
entre otros, con la
sociedad.

<br><br>
Promociona la oferta
académica y los
alcances logrados de
sus estudiantes y
egresados a través
de sus proyectos de
investigación.
Promueve la
participación de la
comunidad científica
en materia de
educación ambiental
a través de la
Revista Mexicana de
Educación Ambiental
Jandiekua.

Desde la perspectiva
de los Derechos
Humanos y la
responsabilidad
social, genera
contenidos propios
para que a través de
nuestras acciones,
logremos que la
sostenibilidad sea
parte de la vida
universitaria.
';
/*
// Establece la zona horaria
\Carbon\Carbon::setLocale('es-mx');

// Obtiene el intervalo de meses, entre la fecha de inicio de los eventos y la
// fecha del día de hoy.
$monthPeriod = \Carbon\CarbonPeriod::create('2019-01-01', \Carbon\Carbon::now())->month();

// Crea un arreglo, para almacenar los meses del intervalo establecido.
$months = [];

// Mapea los meses del intervalo en un arreglo.
foreach ($monthPeriod as $month){
$date = \Carbon\Carbon::parse($month);
$date = strtoupper($date->monthName);
$months[] = $date;
}*/
@endphp

@section('ContenidoPrincipal')
<div class="row justify-content-center my-3">
    <x-o-d-s-wheel />
    <x-ejeTrabajo :titulo="$titulo" :descripcion="$texto" :imagen="'noHayxd.png'">

    </x-ejeTrabajo>
</div>

{{--
    Tabs del programa de Comunicación.
--}}



<div class="row">
    <div id="hide-me" class="ml-2 ml-xl-5 ml-lg-5  ml-md-4  py-5">
        <a id="left" href="#multi-item-example" data-slide="prev">
            <i class="iconos fas fa-angle-left"></i>
        </a>
    </div>

    <div id="multi-item-example" class="carousel slide carousel-multi-item col-11 pointer-event" data-ride="carousel"
        data-interval="false">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                {{--
                        Pestañas del 2022
                    --}}

                @include('Parciales.TabsCalendario.2022-pill-tabs')
            </div>
            <div class="carousel-item mx-1">
                    {{--
                        Pestañas del 2021
                    --}}

                @include('Parciales.TabsCalendario.2021-pill-tabs')
            </div>
                <div class="carousel-item">
                {{--
                        Pestañas del 2020
                    --}}
                @include('Parciales.TabsCalendario.2020-pill-tabs')
            </div>
            <div class="carousel-item">
                {{--
                        Pestañas del 2019.
                    --}}

                @include('Parciales.TabsCalendario.2019-pill-tabs')

                </ul>
            </div>
            <div class="carousel-item">
                {{--
                        Muestra nuevamente las pestañas del 2021.
                    --}}
                @include('Parciales.TabsCalendario.2021-pill-tabs')
            </div>
            <div class="carousel-item">
                {{--
                        Muestra nuevamente las pestañas del 2020.
                    --}}
                @include('Parciales.TabsCalendario.2020-pill-tabs')
            </div>
        </div>
    </div>

    <div id="hide-me" class="  py-5">
        <a id="right" href="#multi-item-example" data-slide="next">
            <i class="iconos2 fas fa-angle-right"></i>
        </a>
    </div>
</div>


{{--
        2022
    --}}
<!--<div class="row tab-content mx-2 justify-content-center" id="myTabContent">
    <div class="tab-pane fade show " id="septiembre3" role="tabpanel" aria-labelledby="septiembre2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('mmus2021')}}>
                                <img src="{{ asset('/storage/imagenes/mmus2021/Banner2.png')}}" class="imgCaoursel "
                                    alt="First slide">
                            </a>
                            <a href={{route('mmus2021')}}>
                                <img src="{{ asset('/storage/imagenes/mmus2021/Banner1.png')}}" class="imgCaoursel "
                                    alt="First slide">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('mmus2021',['nombreModal'=> 'modalUnirodada'])}}>
                                <img src="{{ asset('/storage/imagenes/mmus2021/Banner2Unirodada.png')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                            <a href={{route('mmus2021',['nombreModal'=> 'modalUnirodada'])}}>
                                <img src="{{ asset('/storage/imagenes/mmus2021/Banner1Unirodada.png')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                        </div>
                    </div>


                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Gemas')}}>
                                <img src="{{ asset('storage/imagenes/17Gemas/Banner1.png')}}" class="imgCaoursel "
                                    alt="First slide">
                            </a>
                            <a href={{route('Gemas')}}>
                                <img src="{{ asset('storage/imagenes/17Gemas/Banner2.png')}}" class="imgCaoursel "
                                    alt="First slide">
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('mmus2021')}}>
                                <img src="{{ asset('/storage/imagenes/mmus2021/Banner2.png')}}"
                                    class="imgCaoursel w-100 p-0 p-0" alt="First slide">
                            </a>


                        </div>
                    </div>


                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('mmus2021',['nombreModal'=> 'modalUnirodada'])}}>
                                <img src="{{ asset('/storage/imagenes/mmus2021/Banner2Unirodada.png')}}"
                                    class="imgCaoursel w-100 p-0 p-0" alt="First slide">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Gemas')}}>
                                <img src="{{ asset('storage/imagenes/17Gemas/Banner1.png')}}" class="imgCaoursel w-100 p-0 p-0 "
                                    alt="First slide">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show  " id="agosto3" role="tabpanel" aria-labelledby="agosto2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('ConsumoResponsable',['nombreModal'=> 'CartelEspacioConsumo'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/Banner-1.png')}}" class="imgCaoursel "
                                    alt="First slide">
                            </a>
                            <a href={{route('ConsumoResponsable',['nombreModal'=> 'CartelEspacioConsumo'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/Banner-2.png')}}" class="imgCaoursel "
                                    alt="First slide">

                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Educacion',['nombreModal'=> 'CartelPromotores'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/Promotores1.png')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                            <a href={{route('Educacion',['nombreModal'=> 'CartelPromotores'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/Promotores2.png')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('ConsumoResponsable',['nombreModal'=> 'CartelEspacioConsumo'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/Banner-1.png')}}"
                                    class="imgCaoursel  w-100 p-0 p-0  " alt="First slide">
                            </a>


                        </div>
                    </div>


                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Educacion',['nombreModal'=> 'CartelPromotores'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/Promotores1.png')}}"
                                    class="imgCaoursel  w-100 p-0 p-0 " alt="First slide">
                            </a>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show  " id="julio3" role="tabpanel" aria-labelledby="julio2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Unihuerto',['nombreModal'=> 'modalTallerFunicultura'])}}>
                                <img src="{{ asset('storage/imagenes/Unihuerto/FUNGICULTURA-BANNER.jpg')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                            <a href={{route('Unihuerto',['nombreModal'=> 'modalTallerFunicultura'])}}>
                                <img src="{{ asset('storage/imagenes/Unihuerto/FUNGICULTURA-BANNER1.jpg')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Unihuerto',['nombreModal'=> 'modalTallerFunicultura'])}}>
                                <img src="{{ asset('storage/imagenes/Unihuerto/FUNGICULTURA-BANNER.jpg')}}"
                                    class="imgCaoursel  w-100 p-0 p-0 " alt="First slide">
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>-->


    <div class="tab-pane fade show active " id="junio3" role="tabpanel" aria-labelledby="junio2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('ConsumoResponsable',['nombreModal'=> 'CartelEspacioConsumo'])}}>
                                <img src="{{ asset('storage/imagenes/ConsumoResponsable/BannerECR_1.png')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                            <a href={{route('ConsumoResponsable',['nombreModal'=> 'CartelEspacioConsumo'])}}>
                                <img src="{{ asset('storage/imagenes/ConsumoResponsable/BannerECR_2.png')}}"
                                    class="imgCaoursel " alt="First slide">

                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('ConsumoResponsable',['nombreModal'=> 'CartelEspacioConsumo'])}}>
                                <img src="{{ asset('storage/imagenes/ConsumoResponsable/BannerECR_2.png')}}"
                                    class="imgCaoursel  w-100 p-0 p-0" alt="First slide">
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show  " id="mayo3" role="tabpanel" aria-labelledby="mayo2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Uniruta',['nombreModal'=> 'UnirutaSierraAlvarez'])}}>
                                <img src="{{ asset('storage/imagenes/Uniruta/B1_Uniruta.png')}}"
                                    class="imgCaoursel p-0 " alt="First slide">
                            </a>
                            <a href={{route('Uniruta',['nombreModal'=> 'UnirutaSierraAlvarez'])}}>
                                <img src="{{ asset('storage/imagenes/Uniruta/B2_Uniruta.png')}}"
                                    class="imgCaoursel  p-0 " alt="First slide">
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Uniruta',['nombreModal'=> 'UnirutaSierraAlvarez'])}}>
                                <img src="{{ asset('storage/imagenes/Uniruta/B1_Uniruta.png')}}"
                                    class="imgCaoursel w-100 p-0 " alt="First slide">
                            </a>

                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Uniruta',['nombreModal'=> 'UnirutaSierraAlvarez'])}}>
                                <img src="{{ asset('storage/imagenes/Uniruta/B2_Uniruta.png')}}"
                                    class="imgCaoursel w-100 p-0 " alt="First slide">
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show  " id="abril3" role="tabpanel" aria-labelledby="abril2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('Unibici')}}">
                                <img src="{{ asset('storage/imagenes/Unibici/unirodada-banner1.jpg')}}"
                                    class="imgCaoursel  " alt="First slide">
                            </a>
                            <a href="{{route('Unibici')}}">
                                <img src="{{ asset('storage/imagenes/Unibici/unirodada-banner2.jpg')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>

                        </div>

                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('Unibici')}}">
                                <img src="{{ asset('storage/imagenes/Unibici/unirodada-banner1.jpg')}}"
                                    class="imgCaoursel  w-100" alt="First slide">
                            </a>

                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            </a>
                            <a href="{{route('Unibici')}}">
                                <img src="{{ asset('storage/imagenes/Unibici/unirodada-banner2.jpg')}}"
                                    class="imgCaoursel w-100" alt="First slide">
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show  " id="marzo3" role="tabpanel" aria-labelledby="marzo2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('Cineminuto')}}">

                                <img src="{{ asset('storage/imagenes/introduccion/CINEMINUTOO-B-CH.webp')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                            <a href="{{route('Cineminuto')}}">
                                <img src="{{ asset('storage/imagenes/introduccion/CINEMINUTOO-B-1.webp')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('Cineminuto')}}">

                                <img src="{{ asset('storage/imagenes/introduccion/CINEMINUTOO-B-CH.webp')}}"
                                    class="imgCaoursel  w-100 p-0 p-0" alt="First slide">
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show  " id="febrero3" role="tabpanel" aria-labelledby="febrero2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('FotografiaS')}}">

                                <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia.webp')}}"
                                    class="imgCaoursel  " alt="First slide">
                            </a>
                            <a href="{{route('FotografiaS')}}">

                                <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia2.png')}}"
                                    class="imgCaoursel  " alt="First slide">
                            </a>
                        </div>

                    </div>


                </div>

            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('FotografiaS')}}">

                                <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia.webp')}}"
                                    class="imgCaoursel w-100 " alt="First slide">
                            </a>

                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('FotografiaS')}}">

                                <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia2.png')}}"
                                    class="imgCaoursel w-100  " alt="First slide">
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="tab-pane fade " id="enero3" role="tabpanel" aria-labelledby="enero2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">

                            <a href="{{route('Unihuerto')}}">
                                <img src="{{ asset('storage/imagenes/introduccion/UNIHUERTO-B-CH.jpg')}}"
                                    class="imgCaoursel  p-0 " alt="First slide">
                            </a>
                            <a href="{{route('Unihuerto')}}">
                                <img src="{{ asset('storage/imagenes/introduccion/UNIHUERTO-B-1.jpg')}}"
                                    class="imgCaoursel p-0 " alt="First slide">
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('Unihuerto')}}">
                                <img src="{{ asset('storage/imagenes/introduccion/UNIHUERTO-B-CH.jpg')}}"
                                    class="imgCaoursel w-100 p-0 " alt="First slide">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('Unihuerto')}}">
                                <img src="{{ asset('storage/imagenes/introduccion/UNIHUERTO-B-1.jpg')}}"
                                    class="imgCaoursel w-100 p-0 " alt="First slide">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


{{--
        2021
    --}}
<div class="row tab-content mx-2 justify-content-center" id="myTabContent">
    <div class="tab-pane fade show active " id="septiembre2" role="tabpanel" aria-labelledby="septiembre2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('mmus2021')}}>
                                <img src="{{ asset('/storage/imagenes/mmus2021/Banner2.png')}}" class="imgCaoursel "
                                    alt="First slide">
                            </a>
                            <a href={{route('mmus2021')}}>
                                <img src="{{ asset('/storage/imagenes/mmus2021/Banner1.png')}}" class="imgCaoursel "
                                    alt="First slide">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('mmus2021',['nombreModal'=> 'modalUnirodada'])}}>
                                <img src="{{ asset('/storage/imagenes/mmus2021/Banner2Unirodada.png')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                            <a href={{route('mmus2021',['nombreModal'=> 'modalUnirodada'])}}>
                                <img src="{{ asset('/storage/imagenes/mmus2021/Banner1Unirodada.png')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                        </div>
                    </div>


                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Gemas')}}>
                                <img src="{{ asset('storage/imagenes/17Gemas/Banner1.png')}}" class="imgCaoursel "
                                    alt="First slide">
                            </a>
                            <a href={{route('Gemas')}}>
                                <img src="{{ asset('storage/imagenes/17Gemas/Banner2.png')}}" class="imgCaoursel "
                                    alt="First slide">
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('mmus2021')}}>
                                <img src="{{ asset('/storage/imagenes/mmus2021/Banner2.png')}}"
                                    class="imgCaoursel w-100 p-0 p-0" alt="First slide">
                            </a>


                        </div>
                    </div>


                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('mmus2021',['nombreModal'=> 'modalUnirodada'])}}>
                                <img src="{{ asset('/storage/imagenes/mmus2021/Banner2Unirodada.png')}}"
                                    class="imgCaoursel w-100 p-0 p-0" alt="First slide">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Gemas')}}>
                                <img src="{{ asset('storage/imagenes/17Gemas/Banner1.png')}}" class="imgCaoursel w-100 p-0 p-0 "
                                    alt="First slide">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show  " id="agosto2" role="tabpanel" aria-labelledby="agosto2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('ConsumoResponsable',['nombreModal'=> 'CartelEspacioConsumo'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/Banner-1.png')}}" class="imgCaoursel "
                                    alt="First slide">
                            </a>
                            <a href={{route('ConsumoResponsable',['nombreModal'=> 'CartelEspacioConsumo'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/Banner-2.png')}}" class="imgCaoursel "
                                    alt="First slide">

                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Educacion',['nombreModal'=> 'CartelPromotores'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/Promotores1.png')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                            <a href={{route('Educacion',['nombreModal'=> 'CartelPromotores'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/Promotores2.png')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('ConsumoResponsable',['nombreModal'=> 'CartelEspacioConsumo'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/Banner-1.png')}}"
                                    class="imgCaoursel  w-100 p-0 p-0  " alt="First slide">
                            </a>


                        </div>
                    </div>


                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Educacion',['nombreModal'=> 'CartelPromotores'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/Promotores1.png')}}"
                                    class="imgCaoursel  w-100 p-0 p-0 " alt="First slide">
                            </a>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show  " id="julio2" role="tabpanel" aria-labelledby="julio2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Unihuerto',['nombreModal'=> 'modalTallerFunicultura'])}}>
                                <img src="{{ asset('storage/imagenes/Unihuerto/FUNGICULTURA-BANNER.jpg')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                            <a href={{route('Unihuerto',['nombreModal'=> 'modalTallerFunicultura'])}}>
                                <img src="{{ asset('storage/imagenes/Unihuerto/FUNGICULTURA-BANNER1.jpg')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Unihuerto',['nombreModal'=> 'modalTallerFunicultura'])}}>
                                <img src="{{ asset('storage/imagenes/Unihuerto/FUNGICULTURA-BANNER.jpg')}}"
                                    class="imgCaoursel  w-100 p-0 p-0 " alt="First slide">
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="tab-pane fade show  " id="junio2" role="tabpanel" aria-labelledby="junio2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Proserem',['nombreModal'=> 'modalCursoUPCYCLE'])}}>
                                <img src="{{ asset('storage/imagenes/UPCYCLE/marroquineria1.webp')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                            <a href={{route('Proserem',['nombreModal'=> 'modalCursoUPCYCLE'])}}>
                                <img src="{{ asset('storage/imagenes/UPCYCLE/marroquineria2.webp')}}"
                                    class="imgCaoursel " alt="First slide">

                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Proserem',['nombreModal'=> 'modalCursoUPCYCLE'])}}>
                                <img src="{{ asset('storage/imagenes/UPCYCLE/marroquineria2.webp')}}"
                                    class="imgCaoursel  w-100 p-0 p-0" alt="First slide">
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show  " id="mayo2" role="tabpanel" aria-labelledby="mayo2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Proserem',['nombreModal'=> 'modalCursoProserem'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/laboratorios.webp')}}"
                                    class="imgCaoursel p-0 " alt="First slide">
                            </a>
                            <a href={{route('Proserem',['nombreModal'=> 'modalCursoProserem'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/LABORATORIOS2.jpg')}}"
                                    class="imgCaoursel  p-0 " alt="First slide">
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Proserem',['nombreModal'=> 'modalCursoProserem'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/laboratorios.webp')}}"
                                    class="imgCaoursel w-100 p-0 " alt="First slide">
                            </a>

                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href={{route('Proserem',['nombreModal'=> 'modalCursoProserem'])}}>
                                <img src="{{ asset('storage/imagenes/introduccion/LABORATORIOS2.jpg')}}"
                                    class="imgCaoursel w-100 p-0 " alt="First slide">
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show  " id="abril2" role="tabpanel" aria-labelledby="abril2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('Unibici')}}">
                                <img src="{{ asset('storage/imagenes/Unibici/unirodada-banner1.jpg')}}"
                                    class="imgCaoursel  " alt="First slide">
                            </a>
                            <a href="{{route('Unibici')}}">
                                <img src="{{ asset('storage/imagenes/Unibici/unirodada-banner2.jpg')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>

                        </div>

                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('Unibici')}}">
                                <img src="{{ asset('storage/imagenes/Unibici/unirodada-banner1.jpg')}}"
                                    class="imgCaoursel  w-100" alt="First slide">
                            </a>

                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            </a>
                            <a href="{{route('Unibici')}}">
                                <img src="{{ asset('storage/imagenes/Unibici/unirodada-banner2.jpg')}}"
                                    class="imgCaoursel w-100" alt="First slide">
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show  " id="marzo2" role="tabpanel" aria-labelledby="marzo2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('Cineminuto')}}">

                                <img src="{{ asset('storage/imagenes/introduccion/CINEMINUTOO-B-CH.webp')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                            <a href="{{route('Cineminuto')}}">
                                <img src="{{ asset('storage/imagenes/introduccion/CINEMINUTOO-B-1.webp')}}"
                                    class="imgCaoursel " alt="First slide">
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('Cineminuto')}}">

                                <img src="{{ asset('storage/imagenes/introduccion/CINEMINUTOO-B-CH.webp')}}"
                                    class="imgCaoursel  w-100 p-0 p-0" alt="First slide">
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show  " id="febrero2" role="tabpanel" aria-labelledby="febrero2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('FotografiaS')}}">

                                <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia.webp')}}"
                                    class="imgCaoursel  " alt="First slide">
                            </a>
                            <a href="{{route('FotografiaS')}}">

                                <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia2.png')}}"
                                    class="imgCaoursel  " alt="First slide">
                            </a>
                        </div>

                    </div>


                </div>

            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('FotografiaS')}}">

                                <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia.webp')}}"
                                    class="imgCaoursel w-100 " alt="First slide">
                            </a>

                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('FotografiaS')}}">

                                <img src="{{ asset('storage/imagenes/introduccion/ConcursoFotografia2.png')}}"
                                    class="imgCaoursel w-100  " alt="First slide">
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="tab-pane fade " id="enero2" role="tabpanel" aria-labelledby="enero2-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-xl-block d-lg-block d-md-none d-sm-block"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">

                            <a href="{{route('Unihuerto')}}">
                                <img src="{{ asset('storage/imagenes/introduccion/UNIHUERTO-B-CH.jpg')}}"
                                    class="imgCaoursel  p-0 " alt="First slide">
                            </a>
                            <a href="{{route('Unihuerto')}}">
                                <img src="{{ asset('storage/imagenes/introduccion/UNIHUERTO-B-1.jpg')}}"
                                    class="imgCaoursel p-0 " alt="First slide">
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide d-block d-xl-none d-lg-none d-md-block d-sm-none px-0"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('Unihuerto')}}">
                                <img src="{{ asset('storage/imagenes/introduccion/UNIHUERTO-B-CH.jpg')}}"
                                    class="imgCaoursel w-100 p-0 " alt="First slide">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class=" d-lg-block d-md-block">
                        <div class="slide-box">
                            <a href="{{route('Unihuerto')}}">
                                <img src="{{ asset('storage/imagenes/introduccion/UNIHUERTO-B-1.jpg')}}"
                                    class="imgCaoursel w-100 p-0 " alt="First slide">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{--
            2020
        --}}
    <div class="tab-pane fade " id="enero1" role="tabpanel" aria-labelledby="enero1-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('img/Comunicacion/2020/enero1.png') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/Comunicacion/2020/enero2.jpg') }}" alt="First slide">
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="febrero1" role="tabpanel" aria-labelledby="febrero1-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('img/Comunicacion/2020/febrero1.png') }}"
                        alt="First slide">
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="marzo1" role="tabpanel" aria-labelledby="marzo1-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('img/Comunicacion/2020/marzo1.jpg') }}" alt="First slide">
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade ml-2" id="abril1" role="tabpanel" aria-labelledby="abril1-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="{{route('CicloConf')}}">
                        <img class="d-block w-100" src="{{ asset('img/Comunicacion/2020/abril1.png') }}"
                            alt="First slide">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{ route('DateUnRespiro') }}">
                        <img class="d-block w-100" src="{{ asset('img/Comunicacion/2020/abril2.png') }}"
                            alt="Second slide">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="mayo1" role="tabpanel" aria-labelledby="mayo1-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="{{ route('CicloConf') }}">
                        <img class="d-block w-100" src="{{ asset('img/Comunicacion/2020/mayo1.png') }}"
                            alt="First slide">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade ml-2" id="junio1" role="tabpanel" aria-labelledby="junio1-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href={{ route('ConsumoResponsable') }}>
                        <img class="d-block w-100" src="{{ asset('img/Comunicacion/2020/junio1.png') }}"
                            alt="First slide">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{ route('CicloConf') }}">
                        <img class="d-block w-100" src="{{ asset('img/Comunicacion/2020/junio2.png') }}"
                            alt="Second slide">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="julio1" role="tabpanel" aria-labelledby="julio1-tab">
        <div class="carousel-item active">
            <a href="{{ route('CicloConf') }}">
                <img class="d-block w-100" src="{{ asset('img/B_Conferencias.png') }}" alt="First slide">
            </a>
        </div>
    </div>
    <div class="tab-pane fade" id="agosto1" role="tabpanel" aria-labelledby="agosto1-tab">
        <div class="carousel-item active">
            <a href="{{ route('CicloConf') }}">
                <img class="d-block w-100" src="{{ asset('img/B_Conferencias.png') }}" alt="First slide">
            </a>
        </div>
    </div>
    <div class="tab-pane fade ml-2" id="septiembre1" role="tabpanel" aria-labelledby="septiembre1-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="{{ route('mmus') }}">
                        <img class="d-block w-100" src="{{ asset('img/Comunicacion/2020/banner.png') }}"
                            alt="First slide">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="octubre1" role="tabpanel" aria-labelledby="octubre1-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a
                        href="http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/_layouts/15/FormServer.aspx?XsnLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegTallerUnihuerto/forms/template.xsn&amp;OpenIn=browser&amp;SaveLocation=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegTallerUnihuerto&amp;Source=http://evirtual.uaslp.mx/Ambiental/Agenda/formularios/RegTallerUnihuerto">
                        <img class="d-block w-100" src="{{ asset('img/Banner_UnihuertoP.jpg') }}" alt="First slide">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{ route('ConsumoResponsable') }}">
                        <img class="d-block w-100" src="{{ asset('img/Banner_ECR.jpg') }}" alt="First slide">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img class="d-block w-100" src="{{ asset('img/Comunicacion/2020/B_forovirtual.jpg') }}"
                            alt="First slide">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade m1-2" id="noviembre1" role="tabpanel" aria-labelledby="noviembre1-tab">
        <div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="{{ route('ConsumoResponsable') }}">
                        <img class="d-block w-100" src="{{ asset('img/Banner_ECR.jpg') }}" alt="First slide">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{ route('Gestion') }}">
                        <img class="d-block w-100" src="{{ asset('img/Banner_Unihuerto.jpg') }}" alt="First slide">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="diciembre1" role="tabpanel" aria-labelledby="diciembre1-tab"></div>
</div>


@endsection

@push('stylesheets')
<link href="{{ asset('css/nav-pill_Comunicacion.css') }}" rel="stylesheet" type="text/css">
@endpush

{{--
    Hace push a la pila de las hojas de estilo, para indicar estilos y color de
    los botones del nav-tab
--}}
@push('scripts')
<script src="{{ asset('js/odsComunicacion.js') }}"></script>
@endpush