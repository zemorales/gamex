@extends('content.mails.layout.main')
@section('title')
    <tr style="border-collapse:collapse">
        <td align="center" style="Margin:0;padding-bottom:5px;padding-left:30px;padding-right:30px;padding-top:35px">
            <h3
                style="Margin:0;line-height:58px;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:43px;font-style:normal;font-weight:normal;color:#111111">
                ¡Atención! <br>
            </h3>
        </td>
    </tr>
@endsection
@section('content')
    <table
        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:4px;background-color:#ffffff"
        width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff" role="presentation">
        <tr style="border-collapse:collapse">
            <td class="es-m-txt-l" bgcolor="#ffffff" align="justify"
                style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:30px;padding-right:30px">
                <p>
                    Estas recibiendo este correo porque solicitaste cambiar tu contraseña.<br>
                    Para restablecerla presiona el botón.</b>

                </p>
                <a href="https://alercom.org/reset/password/{{ $token }}" class="es-button es-button-1"
                    target="_blank"
                    style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:20px;border-style:solid;border-color:#FFA73B;border-width:15px 30px;display:inline-block;background:#FFA73B;border-radius:2px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-weight:normal;font-style:normal;line-height:24px;width:auto;text-align:center">
                    Cambiar contraseña</a>
                    <p> <small> Si eso no funciona, copie y pegue el siguiente enlace en su navegador:</small></p>
                    <p>
                      <a target="_blank" href="https://alercom.org/reset/password/{{ $token }}" style="text-size:8px;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#FFA73B;font-size:18px">
                        <small>https://alercom.org/reset/password/{{ $token }} </small></a>
                    </p>
                    <small>Si no has sido tú, puedes omitir este mensaje.<br>  ALERCOM </small></p>
               

            </td>
        </tr>

        <tr style="border-collapse:collapse">
            <td class="es-m-txt-l" align="left"
                style="padding:0;Margin:0;padding-top:20px;padding-left:30px;padding-right:30px;text-size:15px">

            </td>
        </tr>
        <tr style="border-collapse:collapse">
            <td class="es-m-txt-l" align="left"
                style="padding:0;Margin:0;padding-top:20px;padding-left:30px;padding-right:30px">

            </td>
        </tr>
        <tr style="border-collapse:collapse">
            <td class="es-m-txt-l" align="left"
                style="padding:0;Margin:0;padding-top:20px;padding-left:30px;padding-right:30px">
                <p
                    style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#666666;font-size:18px">

                </p>
            </td>
        </tr>
        <tr style="border-collapse:collapse">
            <td class="es-m-txt-l" align="left"
                style="Margin:0;padding-top:20px;padding-left:30px;padding-right:30px;padding-bottom:40px">

            </td>
        </tr>
        <tr>
            <td style="padding: 5px">
                {{--  <img style="width: 40px;height:60px;" src="{{ asset('dist/img/PNUD_azul.png') }}" alt="">
                --}}
            </td>
        </tr>
    </table>
@endsection
