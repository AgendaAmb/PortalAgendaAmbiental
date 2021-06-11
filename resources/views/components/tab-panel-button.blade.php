<a {{ $attributes }}
    id="{{ $id."-tab" }}" 
    data-toggle="pill" 
    href="{{ $idTabPanelContent }}" 
    role="tab" 
    aria-controls="{{ $id }}"
    aria-selected="true">
    {{ $nombre }}
</a>