<tr>
<td class="header"style="background-color: #005faf;">
<a href="{{ $url }}" style="display: inline-block;">
<img src="http://ambiental.uaslp.mx/storage/imagenes/Logos/horizontal_blanco.webp" class="logo" alt="Laravel Logo">
@if (trim($slot) === 'Laravel')
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
