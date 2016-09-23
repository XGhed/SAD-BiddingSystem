
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
		.note1{
			position: absolute;
			text-align: left;
			margin-top: 90%;
			font-weight: bold;
		}
		.note2{
			position: absolute;
			text-align: left;
			margin-top: 95%;
			font-weight: bold;
		}
		.line{
			position: absolute;
			text-align: left;
			margin-top: 60%;
		}
		table{
			position: absolute;
			margin-top: 25%;
			width: 100%;
			background-color: #F0E0B0;
		}
		th, td{
			vertical-align: middle;
			text-align: center;
			border: 1px solid;
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

	<div>
		<p class = "name">Name:</p>
		<p class = "name1">Customer Name</p>
		<p class = "address">Delivery Address:</p>
		<p class = "add">Customer Delivery Address</p>
		<p class = "cell">Cellphone #:</p>
		<p class = "phone">09xxxxxxxxx</p>
	</div>

	<div>
			<table>
			<thead>
				<tr>
					<th colspan = "3" height = "5%">DETAILS</th>
				</tr>
				<tr>
					<th></th>
					<th>Items</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				@foreach($itemsCheckedOut as $key => $item)
					<tr>
						<td></td>
						<td>{{$item->itemName}}</td>
						<td>{{$item->price}}</td>
					</tr>
				@endforeach
				<tr>
					<td colspan = "2">Discount:</td>
					<td>{{$customerDiscount}}</td>
				</tr>
				<tr>
					<td colspan = "2">Discounted Price:</td>
					<td>{{$discountedPrice}}</td>
				</tr>
				<tr>
					<td colspan = "2"></td>
					<td></td>
				</tr>
				<tr>
					<td colspan = "2">Service Fee:</td>
					<td>{{$customerServiceFee}}</td>
				</tr>
				<tr>
					<td colspan = "2">Sub Total:</td>
					<td >{{$checkoutRequest->ItemPrice}}</td>
				</tr>
				<tr>
					<td colspan = "2"></td>
					<td></td>
				</tr>
				<tr>
					<td colspan = "2">Shipping Fee:</td>
					<td>{{$checkoutRequest->ShippingFee}}</td>
				</tr>
				<tr>
					<td colspan = "2">Event Fees:</td>
					<td>{{$checkoutRequest->EventFee}}</td>
				</tr>
				<tr>
					<td colspan = "2"></td>
					<td></td>
				</tr>
				<tr>
					<td colspan = "2">Total:</td>
					<td>{{$checkoutRequest->ItemPrice + $checkoutRequest->ShippingFee + $checkoutRequest->EventFee}}</td>
				</tr>
			</tbody>
		</table>
	</div>


	<div>
		<p class = "note1">STANDARD SHIPPING/DELIVERY DAYS: 2-3 WORKING DAYS</p>
		<p class = "note2">This will serve as your proof of purchase. Thank you!</p>
	</div>
</body>
</html>
