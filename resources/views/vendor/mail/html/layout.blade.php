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

            @media screen and (max-width: 800px) {
                .inner-body {
                    width: 100% !important;
                }
                
                .footer {
                        width: 100% !important;
                }
            }
            
            @media screen and (max-width: 500px) {
                .button {
                    width: 100% !important;
                }
            }

            @media screen and (min-width: 900px) {
                .mensaje {
                    width: 75% !important;
                    margin-top: 40px;
                    padding-left: 50px;
                    display: block;
                }
            }

            @media screen and (min-width: 600px) and (max-width: 899px) {
                .mensaje {
                    width: 85% !important;
                    margin-top: 40px;
                    padding-left: 50px;
                    display: block;
                }
            }

            @media screen and (min-width: 300px) and (max-width: 599px){
                .mensaje {
                    width: 95% !important;
                    margin-top: 40px;
                    padding-left: 50px;
                    display: block;
                }
            }
        </style>
    </head>
    <body>
        <table style="width:100%;">
            <thead> {{ $header ?? '' }} </thead>
            <tbody>
                <tr>
                    <td style="padding-top:50px; padding-left: 50px; display:block;  font-weight:bold;"><h1>  {{ $saludo ?? 'Estimad@ usuari@:' }} </h1></td>
                </tr>
                <tr>
                    <td class="mensaje"><p style="text-align: justify;">{{ $slot }}</p></td>
                </tr>
                <tr>
                    <td style="padding-top:50px; padding-left: 50px; display:block; font-weight:bold;"><h1> {{ $despedida ?? 'Atentamente' }} </h1></td>
                </tr>
                <tr>
                    <td style="padding-top:50px; padding-left: 25px; display:block; font-weight:bold;"> {{ $firma ?? '' }} </td>
                </tr>
            </tbody>
            <tfoot>{{ $footer ?? '' }}</tfoot>
        </table>
    </body>
</html>
