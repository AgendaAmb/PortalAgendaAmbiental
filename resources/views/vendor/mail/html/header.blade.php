<tr>
<td class="header"
    style="@if($color === null){{ 'background-color: #005faf;'}}
            @else {{ 'background-color: '.$color }}
            @endif" >

<a href="{{ $url }}" style="display: inline-block;">
<img src="{{ asset('/storage/imagenes/Logos/LogoAgendaUaslp.png') }}" class="logo" height="125" width="150" alt="Logo agenda/Ualsp">
@if (trim($slot) === 'Laravel')
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
