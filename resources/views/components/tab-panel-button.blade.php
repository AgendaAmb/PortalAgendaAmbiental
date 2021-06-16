<a {{ $attributes }} 
    id="{{ $id."-tab" }}" 
    data-toggle="pill" 
    href="{{ $idTabPanelContent }}" 
    role="tab" 
    aria-controls="{{ $id }}"
    aria-selected="true">
    {{ $nombre }}
</a>
<a class="nav-link d-lg-none d-xl-none d-md-none d-sm-none d-flex"
    id="{{ $id."-tab" }}" 
    data-toggle="pill" 
    href="{{ $idTabPanelContent }}" 
    role="tab" 
    aria-controls="{{ $id }}"
    aria-selected="true">
    {{ $nombreRes }}
</a>

