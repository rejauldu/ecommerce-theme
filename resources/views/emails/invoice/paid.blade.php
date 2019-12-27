<!DOCTYPE html>
<html lang="en">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>{{ config('app.name') ?? url('/') }}</title>
	</head>
	<body>
	
		<div style='width:92%; max-width:800px; margin:0 auto; border:1px solid #dedede; padding:0 3% 5% 3%; display:block; overflow:hidden; font-family:myriad-pro;'>
			<div style="width:96%;padding:0">
				<div style="margin:0 auto; width:160px; max-width:30%;"><img style="width:100%; max-width:100%" src="{{ config('app.logo') ?? 'assets/logo.png' }}" alt="Logo" /></div>
			</div>
			<hr style="border:1px solid #555;">
			<div style="width:100%;">
				<h3 style="text-transform: uppercase;">Order Confirmation</h3>
			</div>
			<div style="width:100%;text-align:justify">
				<p>Dear {{ $first_name ?? 'Customer'}} {{ $last_name ?? '' }},</p>
				<p>Thank you for shopping with us. Penrpencil has received your order {{ $track_number ?? '' }}, and is preparing it for shipment. Your order details are indicated below.</p>
			</div>
			@php($date = date('M d, Y', strtotime($order_date ?? now())))
			<div style="width:100%">
				<span style="text-transform: uppercase;">Order Number: {{ $track_number ?? '' }}</span><br/>
				<span style="text-transform: uppercase; color:#555">Order Date: {{ $date ?? '' }}</span>
			</div>
			<hr style="color:#555; border-top:1px dotted #555;">
			<div style="width:100%; height:30px;"></div>
			<div style="width:100%">
				<div>
					<strong>Shipping address</strong><br/>
					<span>{{ $first_name ?? 'Customer'}} {{ $last_name ?? '' }}</span><br/>
					<span>{{ $address ?? '' }}</span><br/>
					<span>{{ $city ?? '' }}-{{ $zip ?? '' }}</span><br/>
					<span>{{ $country ?? '' }}</span><br/>
					<span style="color:#555; font-size:70%;">Mob: {{ $phone ?? '' }}</span><br/>
					<span style="color:#555; font-size:70%;">Email: {{ $email ?? '' }}</span><br/>
				</div>
			</div>
			<div style="width:100%; height:30px;"></div>
			<hr style="color:#555; border-top:1px dotted #555;">
			
			<div style="width:100%; overflow:hidden;">
				<table style="width:100%; text-align:center;">
					<thead>
						<tr style="text-transform:uppercase; font-size:0.7em;"><th>Image</th><th>Description</th><th>Color</th><th>Size</th><th>Units</th><th>Amount</th></tr>
					</thead>
					<tbody>
						@foreach ($products as $product)
						<tr style="border-top:1px dotted #555; border-bottom:1px dotted #555; font-size:0.8em;">
							<td style="width:100px;max-width:50%;">
								<img style="width:100px; max-width:100%;" src="{{ '/' }}/{{ $product->cart_image ?? '' }}" alt="Product image" />
							</td>
							<td style="width:200px; max-width:18%; overflow:hidden;">
								{{ $product->product_name ?? '' }}
							</td>
							<td>
								{{ $product->productalbum_name ?? '' }}
							</td>
							<td>
								{{ $product->prosize_name ?? '' }}
							</td>
							<td>
								{{ $product->shoppinproduct_quantity ?? '' }}
							</td>
							<td>
								{{ $product->product_price ?? '' }}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<hr style="color:#555; border-top:1px dotted #555;">
			<div style="width:100%; height:30px;"></div>
			<div style="width:100%">
				<table style="width:100%;">
					<tbody>
						<tr><td style="width:70%; text-align:right; padding-right:1%;">Total product costs:</td><td style="width:30%; text-align:left; padding-left:1%;">{{ $shoppingcart_subtotal ?? '0' }} TK</td></tr>
						<tr><td style="width:70%; text-align:right; padding-right:1%;">Delivery costs:</td><td style="width:30%; text-align:left; padding-left:1%;">{{ $shipping_Charge ?? '0' }} TK</td></tr>
						<tr><td style="width:70%; text-align:right; padding-right:1%;">Subtotal:</td><td style="width:30%; text-align:left; padding-left:1%;font-weight: 700;"> {{ $shoppingcart_subtotal ?? 0 + $shipping_Charge ?? 0 }}  TK</td></tr>
						<tr><td style="width:70%; text-align:right; padding-right:1%;">Discount:</td><td style="width:30%; text-align:left; padding-left:1%;">{{ $discount ?? 0 }} TK</td></tr>
						<tr><td style="width:70%; text-align:right; padding-right:1%;">Total costs:</td><td style="width:30%; text-align:left; padding-left:1%;font-weight: 700;">{{ $shoppingcart_subtotal ?? 0 + $shipping_Charge ?? 0 }} TK</td></tr>
					</tbody>
				</table>
			</div>
			<div style="width:100%; height:30px;"></div>
			<hr style="color:#555; border-top:1px dotted #555;">
			<div style="width:100%; height:30px;"></div>
			<div style="width:100%">
				<p>For any furthur questions or concerns, please contact <a href="{{ route('contact-us') ?? url('/') }}" style="color:#555">{{ config('app.name') ?? url('/') }}</a> customer services.</p>
				<span style="color:#555">Thanks for ordering,</span><br/>
				<span style="color:#555"></span><br/>
				<span style="color:#555"><strong>{{ config('app.name') ?? url('/') }} Team</strong></span>
			</div>
		</div>
	</body>
</html>