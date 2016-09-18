<html>
<head>
	<title>Example Muna</title>
	<style type="text/css">

		.image{
			width: 100px;
			height: 100px;
			float: left;
			margin-left: 0%;
		}
		.head1{
			float:left;
			font-size: 25;
			margin-left: 2%;
			margin-top: 0;	
		}

		.head2{
			margin-top: 5%;
			margin-left: 25%;
		}
		.head3{
			margin-top: 0%;
			margin-left: 35%;
		}
		.head4{
			float:left;
			margin-left: 40%;
			margin-top: 0%
		}
		.name{
			position: absolute;
			text-align: left;
			margin-top: 10%;
		}
		.cell{
			position: absolute;
			text-align: left;
			margin-top: 15%;
		}
		.name1{
			position: absolute;
			text-align: left;
			margin-left: 50;
			margin-top: 10%;	
		}
		.phone{
			position: absolute;
			text-align: left;
			margin-left: 70;
			margin-top: 15%;	
		}
		.sub{
			position: absolute;
			text-align: left;
			margin-top: 30%;	
		}
		.ship{
			position: absolute;
			text-align: left;
			margin-top: 35%;	
		}
		.total{
			position: absolute;
			text-align: left;
			margin-top: 40%;	
		}
		.subt{
			position: absolute;
			text-align: left;
			margin-left: 70;
			margin-top: 30%;	
		}
		.shipfee{
			position: absolute;
			text-align: left;
			margin-left: 70;
			margin-top: 35%;	
		}
		.totalfee{
			position: absolute;
			text-align: left;
			margin-left: 50;
			margin-top: 40%;	
		}
		.note1{
			position: absolute;
			text-align: left;
			margin-top: 65%;
			font-weight: bold;
		}
		.note2{
			position: absolute;
			text-align: left;
			margin-top: 70%;
			font-weight: bold;
		}
		.line{
			position: absolute;
			text-align: left;
			margin-top: 55%;
		}
	
	
	</style>
</head>
<body>
	<div>
		<img src = "icons/LOGO.jpg" class ="image" >
		<h3 class = "head1">Online Bidding System with Logistics</h3>
		<h4 class = "head2">6552, Santol st. Centennial 2, Pinagbuhatan, Pasig City</h4>
		<h4 class = "head3">TEL: 00-000000 CEL: 09123456789</h4>
		<h3 class = "head4">Customer's Voucher</h3>
	</div>

	@foreach($checkout as $key)
	<div>
		<p class = "name">Name:</p>
		<p class = "name1">{!! $key->FirstName !!}</p>
		<p class = "cell">Cellphone #:</p>
		<p class = "phone">{!! $key->CellphoneNo !!}</p>
		<p class = 'line'>-----------------------------------------------------------------------------------------------------------------------------------</p>
	</div>
	
	<div>
		<p class = "sub">Sub Total:</p>
		<p class = "subt">SUB TOTAL DAW</p>
		<p class = "ship">Shipping fee:</p>
		<p class = "shipfee">{!! $key->ShippingFee !!}</p>
		<p class = "total">Total:</p>
		<p class = "totalfee">TOTAL MO</p>
	</div>
	@endforeach
	
	<div>
		<p class = "note1">STANDARD SHIPPING/DELIVERY DAYS: 2-3 WORKING DAYS</p>
		<p class = "note2">This will serve as your proof of purchase. Thank you!</p>
	</div>
</body>
</html>
