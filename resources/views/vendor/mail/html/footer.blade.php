
@php
if($color === null)
    $color = 'background-color: #005faf;';
else
    $color = 'background-color: '.$color.';';
@endphp

<tr class="footer" style="{{ $color }}" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
    <td class="content-cell" align="center">
        @isset($eje_trabajo)
        <h1 style="color: white; font-size: 30px; text-transform: uppercase; display:block; margin: 0 auto; text-align: center; letter-spacing: 4px;"> {{ $eje_trabajo }} </h1>
        @else
        {{ Illuminate\Mail\Markdown::parse($slot) }}
        @endisset
    </td>
</tr>
