<div class="containe " id="odsHeader">
    <div class="row no-gutters  ml-md-0 ml-sm-0 ml-3">
        <div class="col mb-2 mt-3 ml-2 odsDNone">
            <a href="https://www.un.org/sustainabledevelopment/es/sustainable-development-goals/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS.webp')}} class="imgODS">
            </a>
        </div>
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/poverty/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS1_Fin_Pobreza.webp')}} class="imgODS">
            </a>
        </div>
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/hunger/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS2_Hambre_Cero.webp')}} class="imgODS">
            </a>
        </div>
    
        <div @if (Str::contains(url()->full(),route('Gestion'))||Str::contains(url()->full(),route('Educacion'))||Str::contains(url()->full(),route('Unibici'))||Str::contains(url()->full(),route('Unihuerto'))||Str::contains(url()->full(),route('Cineminuto'))
            ||Str::contains(url()->full(),route('FotografiaS'))||Str::contains(url()->full(),route('DateUnRespiro'))||Str::contains(url()->full(),route('Proserem'))||Str::contains(url()->full(),route('mmus2021'))||Str::contains(url()->full(),route('ConsumoResponsable')))
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/health/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS3_Salud_Bienestar.webp')}} {{Str::contains(url()->full(),route('Gestion'))||Str::contains(url()->full(),route('Educacion'))||Str::contains(url()->full(),route('Unibici'))||Str::contains(url()->full(),route('Unihuerto'))||Str::contains(url()->full(),route('Cineminuto'))||Str::contains(url()->full(),route('DateUnRespiro'))||Str::contains(url()->full(),route('Proserem'))||Str::contains(url()->full(),route('ConsumoResponsable'))
                ||Str::contains(url()->full(),route('FotografiaS'))||Str::contains(url()->full(),route('mmus2021'))?"id=od3":"class=imgODS"}}>
            </a>
        </div>
        
        <div  @if (Str::contains(url()->full(),route('Educacion'))|| route('Vinculacion')==url()->full())
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/education/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS4_Educacion.webp')}} {{Str::contains(url()->full(),route('Educacion'))|| route('Vinculacion')==url()->full()?"id=od3":"class=imgODS"}}>
            </a>
        </div>
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/gender-equality/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS5_Igualdad_Genero.webp')}} class="imgODS">
            </a>
        </div>
        <div  @if (Str::contains(url()->full(),route('Educacion')))
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/water-and-sanitation/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS6_Agua_Sanamiento.webp')}} {{Str::contains(url()->full(),route('Educacion'))?"id=od3":"class=imgODS"}}>
            </a>
        </div>
        <div  @if (Str::contains(url()->full(),route('Educacion')))
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/energy/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS7_Energia.webp')}} {{Str::contains(url()->full(),route('Educacion'))?"id=od3":"class=imgODS"}}>
            </a>
        </div>
        
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/economic-growth/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS8_Trabajo.webp')}} class="imgODS">
            </a>
        </div>
       
       
    </div>
    <div class="row no-gutters  ml-md-0 ml-sm-0">
        <div @if (route('Vinculacion')==url()->full())
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/infrastructure/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS9_Industria.webp')}} {{route('Vinculacion')==url()->full()?"id=od3":"class=imgODS"}}>
        </div>
        <div class="col mb-2 mt-3  odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/inequality/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS10_Reduccion_Desigualdades.webp')}} class="imgODS">
            </a>
        </div>
        <div  @if (Str::contains(url()->full(),route('Gestion'))||Str::contains(url()->full(),route('mmus2021')) ||Str::contains(url()->full(),route('Educacion'))|| route('Vinculacion')==url()->full()||Str::contains(url()->full(),route('Unibici'))||Str::contains(url()->full(),route('Unihuerto'))||Str::contains(url()->full(),route('Cineminuto'))
            ||Str::contains(url()->full(),route('FotografiaS'))||Str::contains(url()->full(),route('DateUnRespiro')) ||Str::contains(url()->full(),route('Proserem'))||Str::contains(url()->full(),route('ConsumoResponsable')))
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/cities/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS11_Ciudades.webp')}} {{Str::contains(url()->full(),route('Gestion'))||Str::contains(url()->full(),route('mmus2021'))||Str::contains(url()->full(),route('Proserem'))||Str::contains(url()->full(),route('Educacion'))|| route('Vinculacion')==url()->full()||Str::contains(url()->full(),route('Unibici'))||Str::contains(url()->full(),route('Unihuerto'))||Str::contains(url()->full(),route('Cineminuto'))||Str::contains(url()->full(),route('DateUnRespiro'))||Str::contains(url()->full(),route('ConsumoResponsable'))
                ||Str::contains(url()->full(),route('FotografiaS'))?"id=od3":"class=imgODS"}}>
            </a>
        </div>
        <div  @if (Str::contains(url()->full(),route('Gestion'))|| route('Vinculacion')==url()->full()||Str::contains(url()->full(),route('Unibici'))||Str::contains(url()->full(),route('Proserem'))||Str::contains(url()->full(),route('Unihuerto'))||Str::contains(url()->full(),route('Cineminuto'))
            ||Str::contains(url()->full(),route('FotografiaS'))||Str::contains(url()->full(),route('DateUnRespiro'))||Str::contains(url()->full(),route('mmus2021'))||Str::contains(url()->full(),route('ConsumoResponsable')))
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/sustainable-consumption-production/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS12_Produccion.webp')}} {{Str::contains(url()->full(),route('Gestion'))|| route('Vinculacion')==url()->full()||Str::contains(url()->full(),route('Unibici'))||Str::contains(url()->full(),route('Unihuerto'))||Str::contains(url()->full(),route('Cineminuto'))||Str::contains(url()->full(),route('DateUnRespiro'))
                ||Str::contains(url()->full(),route('FotografiaS'))||Str::contains(url()->full(),route('Proserem'))||Str::contains(url()->full(),route('ConsumoResponsable'))||Str::contains(url()->full(),route('mmus2021'))?"id=od3":"class=imgODS"}}>
            </a>
        </div>
       
        <div  @if (route('Comunicacion')==url()->full())
            class="col mb-1 mt-1"@else class="col mb-2 mt-3 odsDNone"@endif
        >
            <a href="https://www.un.org/sustainabledevelopment/es/climate-change-2/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS13_Clima.webp')}} {{route('Comunicacion')==url()->full()?"id=odespe":"class=imgODS"}}>
            </a>
        </div>
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/oceans/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS14_Submarina.webp')}} class="imgODS">
            </a>
        </div>
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/biodiversity/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS15_Biodiversidad.webp')}} class="imgODS">
            </a>
        </div>
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/peace-justice/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS16_Paz.webp')}} class="imgODS">
            </a>
        </div>
        <div class="col mb-2 mt-3 odsDNone" >
            <a href="https://www.un.org/sustainabledevelopment/es/globalpartnerships/">
                <img src={{ asset('storage/imagenes/ods/Iconos/ODS17_Alianzas.webp')}} class="imgODS">
            </a>
        </div>
        
    </div>
</div>
