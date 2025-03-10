@extends('content.mails.layout.main')
@section('title')
<tr style="border-collapse:collapse">
  <td align="center"
      style="Margin:0;padding-bottom:5px;padding-left:30px;padding-right:30px;padding-top:35px">
      <h3
          style="Margin:0;line-height:58px;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:43px;font-style:normal;font-weight:normal;color:#111111">
          ¡Felicitaciones! <br>
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
                   Hola {{$user->name}}<br> 
                   <br>
                   {{$mensaje}}<br>
                   El valor del ticket es ${{number_format($boleto->valor_boleto,2,".")}}<br>                                  
                   La fecha del evento es {{getSmallDateWithHour($boleto->torneo->fecha)}}
                </p>               

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
