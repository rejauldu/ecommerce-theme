<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Registration Confirmation</title>
    </head>
    <style>
        body{
            font-family: myriad-pro;
        }
        p{
            font-family: myriad-pro;
        }
        .im {
            color: black;
          }
    </style>
    <body>
    <div style="font-family: myriad-pro;">
        <table style="width: 100%;">
          <tr>
            <td></td>
            <td bgcolor="#FFFFFF ">
              <div style="padding: 15px; max-width: 600px;margin-left:5px ;display: block; border-radius: 0px;padding: 0px; border: 1px solid #f6d33b;">
                <table style="width: 100%;background: #f6d33b;">
                  <tr>
                    <td></td>
                    <td>
                      <div>
                        <table width="100%">
                          <tr>
                            <td rowspan="2" style="text-align:center;padding:2px;">
    							<img style="float:left;height:46px;"  src="{{ config('app.logo') ?? 'assets/logo.png' }}" />
    							<span style="color:#423f3f;float:right;font-size: 13px;font-style: italic;margin-top: 18px; padding:0px; font-size: 14px; font-weight:normal;font-family: myriad-pro;">
    							A {{ config('app.name') ?? url('/') }} Venture<span></span></span></td>
                          </tr>
                        </table>
                      </div>
                    </td>
                    <td></td>
                  </tr>
                </table>
                <table style="padding: 10px;font-size:14px; width:100%;">
                  <tr>
                    <td style="padding:10px;font-size:14px; width:100%;font-family: myriad-pro;">
                        <p>Dear {{ $user->name }},</p>
                        <p><br /> Welcome to {{ config('app.name') }}. Your account has been created.</p>
                        <p>Form now on, please login to your account using your email address <a href="mailto:{{ $user->email }}" target="_blank">{{ $user->email }}</a> and your password.</p>
                        <p>If you need to make any changes to your account or add more information, login to your account and click <a href="{{ route('users.show', $user->id) }}">My Account.</a></p>
                        <p> </p>
                        <p>Thanks for registering,</p>
                        <p>Penrpencil Team.</p>
                     </td>
                  </tr>
    			  <tr>
    			  <td>
    				 <div align="center" style="font-size:12px; margin-top:20px; padding:5px; width:100%; background:#eee;font-family: myriad-pro;">
                        © {{ date("Y") }} <a href="{{ url('/') }}" style="color:#333; text-decoration: none;">{{ config('app.name') ?? url('/') }}</a>
                      </div>
                    </td>
    			  </tr>
            </table>
        </div>
    </body>
</html>