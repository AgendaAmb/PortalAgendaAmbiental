@php

if($color === null) 
    $color = 'background-color: #005faf;';
else 
    $color = 'background-color: '.$color.';';

@endphp

<tr class="footer" style="{{ $color }}" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
    <td class="content-cell" align="center"> {{ Illuminate\Mail\Markdown::parse($slot) }} </td>
</tr>
