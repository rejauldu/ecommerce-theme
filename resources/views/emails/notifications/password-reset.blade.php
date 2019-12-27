<!DOCTYPE html>
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Password Reset E-mail</title>
    </head>
    <style>
        body{
               font-family: myriad-pro;
        }
        p{
                font-family: myriad-pro;
        }
    </style>
    <body>
    <div style="font-family: myriad-pro;">
        <table style="width: 100%;">
          <tr>
            <td></td>
            <td bgcolor="#FFFFFF ">
              <div style="padding: 15px; max-width: 600px;margin-left:5px ;display: block; border-radius: 0px;padding: 0px; border: 1px solid #291d88;">
                <table style="width: 100%;background: #291d88;">
                  <tr>
                    <td></td>
                    <td>
                      <div>
                        <table width="100%">
                          <tr>
                            <td rowspan="2" style="text-align:center;padding:2px;">
    							<img style="float:left;height:46px;"  src="{{ config('app.logo') ?? 'assets/logo.png' }}" />
    							<span style="color:white;float:right;font-size: 13px;font-style: italic;margin-top: 18px; padding:0px; font-size: 14px; font-weight:normal;font-family: myriad-pro;">
    							{{ config('app.name') ?? url('/') }}<span></span></span></td>
                          </tr>
                        </table>
                      </div>
                    </td>
                    <td></td>
                  </tr>
                </table>
                <table style="padding: 10px;font-size:14px; width:100%;">
                  <tr>
                    <td style="padding:10px;font-size:14px; width:100%;font-family: monospace;">
                        <p>Thanks,</p>
                        <p>{{ config('app.name') ?? url('/') }} Team.</p>
                     </td>
                  </tr>
    			  <tr>
    			  <td>
    				 <div align="center" style="font-size:12px; margin-top:20px; padding:5px; width:100%; background:#eee;font-family: myriad-pro;">
                        © {{ date("Y") }} <a href="{{ url('/') }}" target="_blank" style="color:#333; text-decoration: none;">{{ url('/') }}</a>
                      </div>
                    </td>
    			  </tr>
            </table>
        </div>
    </body>
</html>