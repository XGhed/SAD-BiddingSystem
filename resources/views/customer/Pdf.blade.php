
<html>
<head>
	<title>Checkout Voucher</title>
	<style type="text/css">
		/*@page{
			size: 800px 1500px; 
      		margin: 35px;
    	}*/
		.image{
			width: 100px;
			height: 100px;
			float: left;
			margin-left: 0%;
		}
		.head1{
			float:left;
			font-size: 30;
			margin-left: 0%;
			margin-top: 0;	
		}

		.head2{
			margin-top: 4%;
			margin-left: 15%;
		}
		.head3{
			margin-top: -15%;
			margin-left: 15%;
		}
		.head4{
			margin-left: 40%;
			margin-top: 0%
		}
		.voucher{
			text-align: right;
			margin-right: 20%;
			margin-top: 5%;
		}
		.name{
			position: absolute;
			text-align: left;
			margin-top: 0%;
			font-weight: bold;
		}
		.address{
			position: absolute;
			text-align: left;
			margin-top: 3%;
			font-weight: bold;
		}
		.cell{
			position: absolute;
			text-align: left;
			margin-top: 6%;
			font-weight: bold;
		}
		.id{
			position: absolute;
			text-align: left;
			margin-top: 12%;
			font-weight: bold;
		}
		.date{
			position: absolute;
			text-align: left;
			margin-top: 9%;
			font-weight: bold;
		}
		.name1{
			position: absolute;
			text-align: left;
			margin-left: 8%;
			margin-top: 0%;	
		}
		.add{
			position: absolute;
			text-align: left;
			margin-left: 18%;
			margin-top: 3%;	
		}
		.phone{
			position: absolute;
			text-align: left;
			margin-left: 13%;
			margin-top: 6%;	
		}
		.id2{
			position: absolute;
			text-align: left;
			margin-left: 23%;
			margin-top: 12%;
		}
		.date2{
			position: absolute;
			text-align: left;
			margin-left: 35%;
			margin-top: 9%;
		}
		.note1{
			position: absolute;
			text-align: left;
			margin-top: 18%;
			font-weight: bold;
		}
		.note2{
			position: absolute;
			text-align: left;
			margin-left: 13%;
			margin-top: 30%;
			font-weight: bold;
		}
		.deliveryimg{
			width: 75px;
			height: 75px;
			float: left;
			margin-top: 25%;
		}
		table{
			position: absolute;
			margin-top: 35%;
			width: 100%;
			background-color: Mintcream;
		}
		.tdth{
			vertical-align: middle;
			text-align: center;
			border: 1px solid;
		}
		.row{
			border: 1px solid;
			text-align: center;	
		}
		.rows{
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
		@if ($checkoutRequest->CheckoutType == "Deliver")
		<p class = "address">Delivery Address:</p>
		<p class = "add">{{$checkoutRequest->Barangay_Street_Address}}, {{$checkoutRequest->City->CityName}}, {{$checkoutRequest->City->Province->ProvinceName}}</p>
		@elseif ($checkoutRequest->CheckoutType == "Pick up")
		<p class = "address">Home Address:</p>
		<p class = "add">{{$checkoutRequest->Account->Membership->first()->Barangay_Street_Address}}, {{$checkoutRequest->Account->Membership->first()->City->CityName}}, {{$checkoutRequest->Account->Membership->first()->City->Province->ProvinceName}}</p>
		@endif
		<p class = "cell">Cellphone #:</p>
		<p class = "phone">{{$checkoutRequest->Account->Membership->first()->CellphoneNo}}</p>
		<p class = "id">Checkout Request ID:</p>
		<p class = "id2">{{$checkoutRequest->CheckoutRequestID}}</p>
		<p class = "date">Checkout Request Date and Time:</p>
		<p class = "date2">{{$checkoutRequest->RequestDate->format('F-j-Y g:i A')}}</p>
		@if ($checkoutRequest->CheckoutType == "Deliver")
		<p class = "note1">PLEASE SAVE THIS VOUCHER TOGETHER WITH YOUR PROOF OF PAYMENT. THIS WILL SERVE AS YOUR PROOF OF PURCHASE. THANK YOU!</p>	
		<img src = "photos\deliverytruck.JPG" class ="deliveryimg" >
		<p class = "note2">STANDARD SHIPPING/DELIVERY DAYS: 2-3 WORKING DAYS</p>
		@elseif ($checkoutRequest->CheckoutType == "Pick up")
		<p class = "note1">PLEASE SAVE THIS VOUCHER TOGETHER WITH YOUR PROOF OF PAYMENT. THIS WILL SERVE AS YOUR PROOF OF PURCHASE. THANK YOU!</p>	
		@endif

	</div>

	<div>
			<table>
			<thead>
				<tr>
					<th class = "tdth" colspan = "3" height = "3%">ITEM DETAILS</th>
				</tr>
				<tr>
					<th colspan = "2" class = "tdth">Items</th>
					<th class = "tdth">Price</th>
				</tr>
			</thead>
			<tbody>
				@foreach($itemsCheckedOut as $key => $item)
					<tr>
						<td colspan = "2" class = "row">{{$item->itemName}}</td>
						<td class = "row">{{$item->price}}</td>
					</tr>
				@endforeach
				<tr>
					<td colspan = "2"></td>
					<td></td>
				</tr>
				<tr>
					<td class = "rows" colspan = "2" height = "1%">Discount:</td>
					<td class = "row">{{$customerDiscount}}</td>
				</tr>
				<tr>
					<td colspan = "2"></td>
					<td></td>
				</tr>
				<tr>
					<td class = "rows" colspan = "2" height = "1%">Discounted Price:</td>
					<td class = "row">{{$discountedPrice}}</td>
				</tr>
				<tr>
					<td colspan = "2"></td>
					<td></td>
				</tr>
				<tr>
					<td class = "rows" colspan = "2" height = "1%">Service Fee:</td>
					<td class = "row">{{$customerServiceFee}}</td>
				</tr>
				<tr>
					<td class = "rows" colspan = "2" height = "1%">Sub Total:</td>
					<td class = "row">{{$checkoutRequest->ItemPrice}}</td>
				</tr>
				<tr>
					<td colspan = "2"></td>
					<td></td>
				</tr>
				<tr>
					<td class = "rows" colspan = "2" height = "1%">Shipping Fee:</td>
					<td class = "row">{{$checkoutRequest->ShippingFee}}</td>
				</tr>
				<tr>
					<td class = "rows" colspan = "2" height = "1%">Event Fees:</td>
					<td class = "row">{{$checkoutRequest->EventFee}}</td>
				</tr>
				<tr>
					<td colspan = "2"></td>
					<td></td>
				</tr>
				<tr>
					<td style = "font-weight: bold" class = "rows" colspan = "2" height = "1%">Total:</td>
					<th class = "row">{{$checkoutRequest->ItemPrice + $checkoutRequest->ShippingFee + $checkoutRequest->EventFee}}</th>
				</tr>
			</tbody>
		</table>
	</div>

	<div>
		
	</div>
</body>
</html>
