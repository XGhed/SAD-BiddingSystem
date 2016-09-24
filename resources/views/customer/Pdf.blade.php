
<html>
<head>
	<title>Example Muna</title>
	<style type="text/css">
		@page{
			size: 800px 3500px; 
      		margin: 35px;
    	}
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
			margin-top: 3%;
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
			margin-top: 3%;
		}
		.address{
			position: absolute;
			text-align: left;
			margin-top: 5%;
		}
		.cell{
			position: absolute;
			text-align: left;
			margin-top: 7%;
		}
		.id{
			position: absolute;
			text-align: left;
			margin-top: 9%;
		}
		.date{
			position: absolute;
			text-align: left;
			margin-top: 12%;
		}
		.name1{
			position: absolute;
			text-align: left;
			margin-left: 10%;
			margin-top: 3%;	
		}
		.add{
			position: absolute;
			text-align: left;
			margin-left: 20%;
			margin-top: 5%;	
		}
		.phone{
			position: absolute;
			text-align: left;
			margin-left: 13%;
			margin-top: 7%;	
		}
		.id2{
			position: absolute;
			text-align: left;
			margin-left: 20%;
			margin-top: 9%;
		}
		.date2{
			position: absolute;
			text-align: left;
			margin-left: 23%;
			margin-top: 12%;
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
			margin-top: 15%;
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
		<img src = "{{$dashboard->valid_id}}" class ="image" >
		<h3 class = "head1">{{$dashboard->CompanyName}}</h3>
		<h4 class = "head2">{{$dashboard->ComapanyAddress}}</h4>
		<h4 class = "head3">{{$dashboard->CompanyEmail}} - {{$dashboard->CellphoneNo}}</h4>
		<h3 class = "head4">Customer's Voucher</h3>
	</div>

	<div>
		<p class = "name">Name:</p>
		<p class = "name1">{{$checkoutRequest->Account->Membership->first()->LastName}}, {{$checkoutRequest->Account->Membership->first()->FirstName}} {{$checkoutRequest->Account->Membership->first()->MiddleName}}</p>
		<p class = "address">Delivery Address:</p>
		<p class = "add">{{$checkoutRequest->Account->Membership->first()->Barangay_Street_Address}}, {{$checkoutRequest->Account->Membership->first()->City->CityName}}, {{$checkoutRequest->Account->Membership->first()->City->Province->ProvinceName}}</p>
		<p class = "cell">Cellphone #:</p>
		<p class = "phone">{{$checkoutRequest->Account->Membership->first()->CellphoneNo}}</p>
		<p class = "id">Checkout Request ID:</p>
		<p class = "id2">{{$checkoutRequest->CheckoutRequestID}}</p>
		<p class = "date">Checkout Request Date:</p>
		<p class = "date2">{{$checkoutRequest->RequestDate}}</p>
	</div>

	<div>
			<table>
			<thead>
				<tr>
					<th colspan = "3" height = "3%">DETAILS</th>
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
		<p class = "note1">WARNING: PLEASE SAVE THIS VOUCHER. TOGETHER WITH YOUR PROOF OF PAYMENT, THIS WILL SERVE AS YOUR PROOF OF PURCHASE.</p>
		<p class = "note2">STANDARD SHIPPING/DELIVERY DAYS: 2-3 WORKING DAYS</p>
	</div>
</body>
</html>
