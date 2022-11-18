
<div class="header">
    <a id="header-title" href="{{ route("panel") }}">Mi Portal</a>
    {{-- LOGO DE AGENDA --}}
    <a id= href={{route('Index')}}>
        <img src={{ asset('storage/imagenes/Logos/INICIO-AGENDA-300x127.png')}}
        class="imagenAgenda">
    </a>
    {{-- Imagen uaslp --}}
    <a href="http://www.uaslp.mx">
        <img src={{ asset('storage/imagenes/Logos/LOGO_UASLP-300x116.png')}}
        class="imagenUASLP" >
    </a> 
</div>

<style>
    .header{
        display: flex;
        align-items: center;
        justify-content: end;
        background-color:#115089;
        height: 12vh;
    }

    .imagenUASLP{
        height: 50px;
    }

    .imagenAgenda{
        height: 44px;
    }

    .header a{
        padding-right: 20px;
    }

    #header-title{
        font-size: 25px;
        color:white;
    }

    #header-title:hover{
        text-decoration: none;
        font-size: 25px;
        color:white;
    }
</style>