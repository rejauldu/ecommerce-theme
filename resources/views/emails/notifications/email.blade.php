<!DOCTYPE html>
<html lang="en">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>{{ config('app.name') ?? url('/') }}</title>
	</head>
	<body>
		<div style='width:92%; max-width:800px; margin:0 auto; border:1px solid #dedede; padding:0 3% 5% 3%; display:block; overflow:hidden; font-family: myriad-pro;'>
			<div style="width:96%;padding:1%">
				<div style="margin:auto; width:150px; max-width:30%;"><img style="width:100%; max-width:100%" src="{{ config('app.logo') ?? 'assets/logo.png' }}" alt="Logo" /></div>
			</div>
			<hr style="border:1px solid #555;">
			<div style="width:100%;">
				<h3 style="text-transform: uppercase;">{{ $notification->subject ?? ''}}</h3>
			</div>
			<div style="width:100%;text-align:justify">
			    {!! $notification->body ?? '' !!}
			</div>
			<hr style="color:#555; border-top:1px dotted #555;">
			<div style="width:100%; height:30px;"></div>
			<div style="width:100%">
				<p>For any furthur questions or concerns, please contact <a href="{{ route('contact-us.create') ?? url('/') }}" style="color:#555">{{ config('app.name') ?? url('/') }}</a> customer services.</p>
				<span style="color:#555">Thanks,</span><br/>
				<span style="color:#555"></span><br/>
				<span style="color:#555"><strong>{{ config('app.name') ?? url('/') }} Team</strong></span>
			</div>
		</div>
	</body>
</html>