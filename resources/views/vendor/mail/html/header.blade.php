<tr>
<td class="header"style="background-color: #005faf;">
<a href="{{ $url }}" style="display: inline-block;">
<img src="https://ambiental.uaslp.mx/storage/imagenes/Logos/horizontal%20blanco.png" class="logo" height="200" width="250" alt="Logo agenda/Ualsp">
@if (trim($slot) === 'Laravel')
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
