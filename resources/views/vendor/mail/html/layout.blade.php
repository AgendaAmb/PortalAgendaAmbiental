<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
        <table class="plantilla-correo">
            <thead> {{ $header ?? '' }} </thead>
            <tbody>
                <tr>
                    <td class="saludo"><h3>  {{ $saludo ?? 'Estimad@ usuari@:' }} </h3></td>
                </tr>
                <tr>
                    <td class="mensaje">
                        <p>{{ $slot }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="mensaje">
                        <p>{{ $despedida ?? 'Atentamente' }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="firma">
                        <img src="{{ asset('/storage/imagenes/Logos/rtic.png') }}">
                    </td>
                </tr>
            </tbody>
            <tfoot>{{ $footer ?? '' }}</tfoot>
        </table>
    </body>
</html>
