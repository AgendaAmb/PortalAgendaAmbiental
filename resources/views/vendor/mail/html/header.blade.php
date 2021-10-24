@php
if($color === null)
    $color = 'background-color: #005faf;';
else
    $color = 'background-color: '.$color.';';
if($header_bottom_color === null)
    $header_bottom_color = 'background-color: #012878;';
else
    $header_bottom_color = 'background-color: '.$header_bottom_color.';';
@endphp

<tr>
    <td class="plantilla-correo-header" style="{{ $color }}">
        <a href="{{ $url }}" class="logo">
            <img src="{{ asset('/storage/imagenes/Logos/LogoAgendaUaslp.png') }}" class="logo" height="125" width="150" alt="Logo agenda/Ualsp">

            {{ $slot }}
        </a>
    </td>
</tr>
<tr>
    <td class="headerBottom" style="{{ $header_bottom_color }}"></td>
</tr>
