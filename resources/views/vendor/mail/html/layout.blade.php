<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <style>
            
            @font-face {
                font-family: "MyriadPro-Bold";
                src: url(/TiposDeLetra/MyriadPro-Bold.otf);
            }

            @font-face {
                font-family: "MyriadPro-Light";
                src: url(/TiposDeLetra/MyriadPro-Light.otf);
            }

            @font-face {
                font-family: "MyriadPro-Regular";
                src: url(/TiposDeLetra/MyriadPro-Regular.otf);
            }

            tbody > tr > td.mensaje {
                width: 65% !important;
                display: block;
                padding-left: 50px;
            }

            @media only screen and (max-width: 800px) {
                .inner-body {
                    width: 100% !important;
                }

                tbody > tr > td.mensaje {
                    width: 85% !important;
                    display: block;
                    padding-left: 50px;
                }
                
                .footer {
                        width: 100% !important;
                }
            }
            
            @media only screen and (max-width: 500px) {
                .button {
                    width: 100% !important;
                }

                tbody > tr > td.mensaje {
                    width: 95% !important;
                    display: block;
                    padding-left: 50px;
                }
            }
        </style>
    </head>
    <body>
        <table style="width:100%;">
            <thead>
                {{ $header ?? '' }}
            </thead>
            <tbody>
                <tr>
                    <td style="padding-top:50px; padding-left: 50px; display:block;  font-weight:bold;"> {{ Illuminate\Mail\Markdown::parse($saludo ?? 'Estimad@ usuari@:') }}</td>
                </tr>
                <tr>
                    <td class="mensaje">{{ Illuminate\Mail\Markdown::parse($slot) }}</td>
                </tr>
                <tr>
                    <td>

                        <div style="padding-top:50px; padding-left: 50px; display:block;  font-weight:bold;">
                        {{ Illuminate\Mail\Markdown::parse($despedida ?? 'Atentamente') }}
                        </div>

                        <div style="padding:25px; display:block;"> 
                        {{ $firma ?? '' }}
                        </div>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td align="center">{{ $footer ?? '' }}</td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
