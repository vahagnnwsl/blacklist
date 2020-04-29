<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
<style>
    @media only screen and (max-width: 600px) {
        .inner-body {
            width: 100% !important;
        }

        .footer {
            width: 100% !important;
        }
    }

    @media only screen and (max-width: 500px) {
        .button {
            width: 100% !important;
        }
    }
</style>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            {{ $header ?? '' }}

            <!-- Email Body -->
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0">
                        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                               role="presentation">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell">
                                    {{ Illuminate\Mail\Markdown::parse($slot) }}

                                    {{ $subcopy ?? '' }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="100%" cellpadding="0" cellspacing="0"
                        style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#edf2f7;border-bottom:1px solid #edf2f7;border-top:1px solid #edf2f7;margin:0;padding:0;width:100%">
                        <table align="center" width="570" cellpadding="0" cellspacing="0" role="presentation"
                               style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#ffffff;border-color:#e8e5ef;border-radius:2px;border-width:1px;margin:0 auto;padding:0;width:570px">
                            <tbody>
                            <tr>
                                <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100vw;padding:32px">

                                    <table width="100%" cellpadding="0" cellspacing="0" role="presentation"
                                           style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin-top:25px;padding-top:25px">
                                        <tbody>
                                        <tr>
                                            <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">

                                                <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';line-height:1.5em;margin-top:0;text-align:center;font-size:14px">
                                                  <strong>Возникли вопросы?</strong>
                                                </p>
                                                <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';line-height:1.5em;margin-top:0;text-align:center;font-size:14px">
                                                    support@arendolog.com
                                                </p>
                                                <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';line-height:1.5em;margin-top:0;text-align:center;font-size:14px">
                                                    <a  href="https://tele.gs/joinchat/IzJoTkrnmkVeRpGNV4YvcQ"
                                                       target="_blank">
                                                        <img width="25" class="CToWUd"
                                                             style="width:25px;height:25px;display:inline-block;"
                                                             src="https://ci4.googleusercontent.com/proxy/3htpy6FCXkyl7GK-fHO2QG59ioPAfjy4c8Ul1pR8jfjbZ2MU_TgqtwmQA1SXDb09LZ1XVZg=s0-d-e1-ft?_=1588096805070#https://rentrika.com/images/tg.png">
                                                        <span>   </span> Подключайтесь к чату тестирования</a>
                                                    </p>
                                                <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';line-height:1.5em;margin-top:0;text-align:center;font-size:14px">

                                                    <a  href="https://tele.gs/joinchat/IzJoTkmy3e3dOat4Bt0feA"
                                                        target="_blank" >
                                                        <img width="25" class="CToWUd"
                                                             style="width:25px;height:25px;display:inline-block;"
                                                             src="https://ci4.googleusercontent.com/proxy/3htpy6FCXkyl7GK-fHO2QG59ioPAfjy4c8Ul1pR8jfjbZ2MU_TgqtwmQA1SXDb09LZ1XVZg=s0-d-e1-ft?_=1588096805070#https://rentrika.com/images/tg.png">
                                                        Подключайтесь к чату недвижимости наших партнеров</a>
                                                </p>

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                {{ $footer ?? '' }}
            </table>
        </td>
    </tr>
</table>
</body>
</html>

