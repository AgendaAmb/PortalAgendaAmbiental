@php

if($color === null) 
    $color = 'background-color: #005faf;';
else 
    $color = 'background-color: '.$color.';';

if($header_bottom_color === null) 
    $header_bottom_color = 'background-color: #012878;';
else 
    $header_bottom_color = 'display:block; background-color: '.$header_bottom_color.'; width: 100%; height: 25px; margin-top: -8px';

@endphp

<tr>
    <td class="header" style="{{ $color }}">
        <a href="{{ $url }}" style="display: inline-block;">
            <img src="{{ asset('/storage/imagenes/Logos/LogoAgendaUaslp.png') }}" class="logo" height="125" width="150" alt="Logo agenda/Ualsp">

            @if (trim($slot) !== 'Laravel'){{ $slot }} @endif
        </a>
    </td>
</tr>
<tr>
<td style="{{ $header_bottom_color }}"></td></tr>