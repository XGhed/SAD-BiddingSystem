
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
			color: DarkBlue;
		}

		.head2{
			margin-top: 5%;
			margin-left: 25%;
			color: DarkBlue;
		}
		.head3{
			margin-top: 0%;
			margin-left: 35%;
			color: DarkBlue;
		}
		.head4{
			float:left;
			margin-left: 40%;
			margin-top: 0%
			color: DarkBlue;
		}
		.voucher{
			text-align: right;
			margin-right: 20%;
			margin-top: 5%;
		}
		.name{
			position: absolute;
			text-align: left;
			margin-top: 10%;
		}
		.address{
			position: absolute;
			text-align: left;
			margin-top: 15%;
		}
		.cell{
			position: absolute;
			text-align: left;
			margin-top: 20%;
		}
		.email{
			position: absolute;
			text-align: left;
			margin-top: 25%;
		}
		.name1{
			position: absolute;
			text-align: left;
			margin-left: 50;
			margin-top: 10%;	
		}
		.add{
			position: absolute;
			text-align: left;
			margin-left: 100;
			margin-top: 15%;	
		}
		.phone{
			position: absolute;
			text-align: left;
			margin-left: 70;
			margin-top: 20%;	
		}
		.sub{
			position: absolute;
			text-align: left;
			margin-top: 35%;	
		}
		.ship{
			position: absolute;
			text-align: left;
			margin-top: 40%;	
		}
		.discount{
			position: absolute;
			text-align: left;
			margin-top: 45%;

		}
		.total{
			position: absolute;
			text-align: left;
			margin-top: 50%;	
		}
		.subt{
			position: absolute;
			text-align: left;
			margin-left: 70;
			margin-top: 35%;	
		}
		.shipfee{
			position: absolute;
			text-align: left;
			margin-left: 70;
			margin-top: 40%;	
		}
		.bawas{
			position: absolute;
			text-align: left;
			margin-left: 50;
			margin-top: 45%;
		}
		.totalfee{
			position: absolute;
			text-align: left;
			margin-left: 50;
			margin-top: 50%;	
		}
		.note1{
			position: absolute;
			text-align: left;
			margin-top: 70%;
			font-weight: bold;
		}
		.note2{
			position: absolute;
			text-align: left;
			margin-top: 75%;
			font-weight: bold;
		}
		.line{
			position: absolute;
			text-align: left;
			margin-top: 60%;
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
		<p class = "name1">{!! $key->CheckoutRequest->FirstName !!} {!! $key->CheckoutRequest->LastName !!}</p>
		<p class = "address">Delivery Address:</p>
		<p class = "add">{!! $key->CheckoutRequest->Barangay_Street_Address !!} {!! $key->CheckoutRequest->City->CityName !!}, {!! $key->CheckoutRequest->City->Province->ProvinceName!!}</p>
		<p class = "cell">Cellphone #:</p>
		<p class = "phone">{!! $key->CheckoutRequest->CellphoneNo !!}</p>
		<p class = 'line'>-----------------------------------------------------------------------------------------------------------------------------------</p>
	</div>
	

	<div>
		<p class = "sub">Sub Total:</p>
		<p class = "subt">SUB TOTAL DAW</p>
		<p class = "ship">Delivery fee:</p>
		<p class = "discount">Discount:</p>
		<p class = "bawas">DISCOUNT</p>
		<p class = "shipfee">{!! $key->CheckoutRequest->ShippingFee !!}</p>
		<h4 class = "total">Total:</h4>
		<h4 class = "totalfee">TOTAL MO</h4>
	</div>

	@endforeach

	<div>
		<p class = "note1">STANDARD SHIPPING/DELIVERY DAYS: 2-3 WORKING DAYS</p>
		<p class = "note2">This will serve as your proof of purchase. Thank you!</p>
	</div>
</body>
</html>
