<div class="containe " id="odsHeader">
    <div class="row no-gutters  ml-md-0 ml-sm-0 ml-3">
        <div class="col mb-2 mt-3 ml-2 odsDNone">
            <a href="https://www.un.org/sustainabledevelopment/es/sustainable-development-goals/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS.jpg')}} class="imgODS">
            </a>
        </div>
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/poverty/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS1_Fin_Pobreza.png')}} class="imgODS">
            </a>
        </div>
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/hunger/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS2_Hambre_Cero.png')}} class="imgODS">
            </a>
        </div>
    
        <div @if (route('Gestion')==url()->full()||route('Educacion')==url()->full()||route('Unibici')==url()->full()||route('Unihuerto')==url()->full() ||route('Cineminuto')==url()->full()
            ||route('FotografiaS')==url()->full())
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/health/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS3_Salud_Bienestar.png')}} {{route('Gestion')==url()->full()||route('Educacion')==url()->full()||route('Unibici')==url()->full()||route('Unihuerto')==url()->full() ||route('Cineminuto')==url()->full()
                ||route('FotografiaS')==url()->full()?"id=od3":"class=imgODS"}}>
            </a>
        </div>
        
        <div  @if (route('Educacion')==url()->full()|| route('Vinculacion')==url()->full())
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/education/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS4_Educacion.png')}} {{route('Educacion')==url()->full()|| route('Vinculacion')==url()->full()?"id=od3":"class=imgODS"}}>
            </a>
        </div>
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/gender-equality/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS5_Igualdad_Genero.png')}} class="imgODS">
            </a>
        </div>
        <div  @if (route('Educacion')==url()->full())
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/water-and-sanitation/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS6_Agua_Sanamiento.png')}} {{route('Educacion')==url()->full()?"id=od3":"class=imgODS"}}>
            </a>
        </div>
        <div  @if (route('Educacion')==url()->full())
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/energy/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS7_Energia.png')}} {{route('Educacion')==url()->full()?"id=od3":"class=imgODS"}}>
            </a>
        </div>
        
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/economic-growth/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS8_Trabajo.png')}} class="imgODS">
            </a>
        </div>
       
       
    </div>
    <div class="row no-gutters  ml-md-0 ml-sm-0">
        <div @if (route('Vinculacion')==url()->full())
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/infrastructure/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS9_Industria.png')}} {{route('Vinculacion')==url()->full()?"id=od3":"class=imgODS"}}>
        </div>
        <div class="col mb-2 mt-3  odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/inequality/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS10_Reduccion_Desigualdades.png')}} class="imgODS">
            </a>
        </div>
        <div  @if (route('Gestion')==url()->full() ||route('Educacion')==url()->full()|| route('Vinculacion')==url()->full()||route('Unibici')==url()->full()||route('Unihuerto')==url()->full() ||route('Cineminuto')==url()->full()
            ||route('FotografiaS')==url()->full())
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/cities/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS11_Ciudades.png')}} {{route('Gestion')==url()->full()||route('Educacion')==url()->full()|| route('Vinculacion')==url()->full()||route('Unibici')==url()->full()||route('Unihuerto')==url()->full() ||route('Cineminuto')==url()->full()
                ||route('FotografiaS')==url()->full()?"id=od3":"class=imgODS"}}>
            </a>
        </div>
        <div  @if (route('Gestion')==url()->full()|| route('Vinculacion')==url()->full()||route('Unibici')==url()->full()||route('Unihuerto')==url()->full() ||route('Cineminuto')==url()->full()
            ||route('FotografiaS')==url()->full())
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/sustainable-consumption-production/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS12_Produccion.png')}} {{route('Gestion')==url()->full()|| route('Vinculacion')==url()->full()||route('Unibici')==url()->full()||route('Unihuerto')==url()->full() ||route('Cineminuto')==url()->full()
                ||route('FotografiaS')==url()->full()?"id=od3":"class=imgODS"}}>
            </a>
        </div>
       
        <div  @if (route('Comunicacion')==url()->full())
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/climate-change-2/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS13_Clima.png')}} {{route('Comunicacion')==url()->full()?"id=odespe":"class=imgODS"}}>
            </a>
        </div>
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/oceans/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS14_Submarina.png')}} class="imgODS">
            </a>
        </div>
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/biodiversity/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS15_Biodiversidad.png')}} class="imgODS">
            </a>
        </div>
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/peace-justice/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS16_Paz.png')}} class="imgODS">
            </a>
        </div>
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/globalpartnerships/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS17_Alianzas.png')}} class="imgODS">
            </a>
        </div>
        
    </div>
</div>
