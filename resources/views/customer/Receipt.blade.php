
<style>
    .image{
        margin-top: -20px;
        margin-left: -25px;
        width: 100px;
        height: 100px;
        position: absolute;
        z-index: 99;
    }
    .head1{
        float:left;
        font-size: 30;
        margin-left: 12%;
        margin-top: 0;  
    }
    .head2{
        margin-top: 7%;
        margin-left: 13%;
    }
    .head3{
        margin-top: -15%;
        margin-left: 13%;
    }
    .head4{
		margin-left: 40%;
		margin-top: 0%
	}
    .title{
        margin-top: 0;
        margin-left: 35%
    }
    span {
        font-weight: normal;
    }
    .table th {
        background-color: gray;
        border: 1px solid black;
        color: white;
        font-size: 13px;
    }
    .table {
        margin-right: 10px;
        margin-left: 10px;
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-top: 25%;
    }
    .stable td, th {
        border: 1px solid black;
        text-align: left;
        padding: 8px;
    }
    .table td {
        border-collapse: collapse;
        border: 1px solid black;
        /*font-weight: bold;*/
    }
    span {
        font-weight: normal;
    }
    h3 {
        margin-top: 30px;
    }
    h4 {
        padding-top: -20px;
    }
    .margin {
        padding-top: -20px;
        padding-right: 10px;
    }
    .margin2 {
        padding-right: 10px;
    }
    .date {
        padding-top: -20px;
    }
    .to {
        padding-left: 10px;
    }
    .from {
        padding-left: 10px;
        padding-top: -20px;
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
	.check{
		position: absolute;
		text-align: left;
		margin-top: 9%;
		font-weight: bold;
	}
	.id{
		position: absolute;
		text-align: left;
		margin-top: 12%;
		font-weight: bold;
	}
	.cdate{
		position: absolute;
		text-align: left;
		margin-top: 15%;
		font-weight: bold;
	}
	.date{
		position: absolute;
		text-align: left;
		margin-top: 20%;
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
		margin-left: 20%;
		margin-top: 3%;	
	}
	.phone{
		position: absolute;
		text-align: left;
		margin-left: 13%;
		margin-top: 6%;	
	}
	.checkout{
		position: absolute;
		text-align: left;
		margin-left: 16%;
		margin-top: 9%;	
	}
	.id2{
		position: absolute;
		text-align: left;
		margin-left: 22%;
		margin-top: 12%;
	}
	.cdate2{
		position: absolute;
		text-align: left;
		margin-left: 34%;
		margin-top: 15%;
	}
	.date2{
		position: absolute;
		text-align: left;
		margin-left: 25%;
		margin-top: 18%;
	}
	.note1{
		position: absolute;
		text-align: left;
		margin-top: 40%;
		font-weight: bold;
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

<body>
	<div>
		<img src = "{{$dashboard->valid_id}}" class ="image" >
		<h3 class = "head1">{{$dashboard->CompanyName}}</h3>
		<h4 class = "head2">{{$dashboard->ComapanyAddress}}</h4>
		<h4 class = "head3">{{$dashboard->CompanyEmail}} - {{$dashboard->CellphoneNo}}</h4>
		<h3 class = "head4">Official Receipt</h3>
	</div>

	<div>
		<p class = "name">Name:</p>
		<p class = "name1">{{$checkoutRequest->LastName}}, {{$checkoutRequest->FirstName}} {{$checkoutRequest->MiddleName}}</p>
		@if ($checkoutRequest->CheckoutType == "Deliver")
		<p class = "address">Delivery Address:</p>
		<p class = "add">{{$checkoutRequest->Barangay_Street_Address}}, {{$checkoutRequest->City->CityName}}, {{$checkoutRequest->City->Province->ProvinceName}}</p>
		@elseif ($checkoutRequest->CheckoutType == "Pick up")
		<p class = "address">Pick up Warehouse:</p>
		<p class = "add">{{$checkoutRequest->Account->Membership->first()->Barangay_Street_Address}}, {{$checkoutRequest->Account->Membership->first()->City->CityName}}, {{$checkoutRequest->Account->Membership->first()->City->Province->ProvinceName}}</p>
		@endif
		<p class = "cell">Cellphone #:</p>
		<p class = "phone">{{$checkoutRequest->Account->Membership->first()->CellphoneNo}}</p>
		<p class = "check">Checkout Type:</p>
		<p class = "checkout">{{$checkoutRequest->CheckoutType}}</p>
		<p class = "id">Checkout Request ID:</p>
		<p class = "id2">{{$checkoutRequest->CheckoutRequestID}}</p>
		<p class = "cdate">Checkout Request Date and Time:</p>
		<p class = "cdate2">{{Carbon\Carbon::parse($checkoutRequest->RequestDate)->format('F-j-Y g:i A')}}</p>
		<p class = "date">Payment Date and Time:</p>
		<p class = "date2">{{Carbon\Carbon::parse($checkoutRequest->PaymentDate)->format('F-j-Y g:i A')}}</p>
	</div>

	<div>
			<table class = "table">
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
					<td class = "rows" colspan = "2" height = "1%">Discount(%):</td>
					<td class = "row">{{$customerDiscount}}%</td>
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
					<td class = "rows" colspan = "2" height = "1%">Service Fee(%):</td>
					<td class = "row">{{$customerServiceFee}}%</td>
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
					<td class = "row" style = "font-weight: bold">{{$checkoutRequest->ItemPrice + $checkoutRequest->ShippingFee + $checkoutRequest->EventFee}}</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div>
		
	</div>
		<br><p>THIS WILL SERVE AS YOUR OFICIAL RECEIPT. THANK YOU!</p>	
</body>
