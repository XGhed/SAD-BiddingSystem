
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
			margin-top: 3.5%;
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
			margin-top: 2%;
			font-weight: bold;
		}
		.cell{
			position: absolute;
			text-align: left;
			margin-top: 4%;
			font-weight: bold;
		}
	/*	.id{
			position: absolute;
			text-align: left;
			margin-top: 8%;
			font-weight: bold;
		}*/
		.date{
			position: absolute;
			text-align: left;
			margin-top: 6%;
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
			margin-top: 2%;	
		}
		.phone{
			position: absolute;
			text-align: left;
			margin-left: 13%;
			margin-top: 4%;	
		}
		/*.id2{
			position: absolute;
			text-align: left;
			margin-left: 23%;
			margin-top: 8%;
		}*/
		.date2{
			position: absolute;
			text-align: left;
			margin-left: 35%;
			margin-top: 6%;
		}
		.note1{
			position: absolute;
			text-align: left;
			margin-top: 10%;
			font-weight: bold;
		}
		table{
			position: absolute;
			margin-top: 15%;
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
		<img src = "" class ="image" >
		<h3 class = "head1">COMPANY NAME</h3>
		<h4 class = "head2">COMPANY ADDRESS</h4>
		<h4 class = "head3">COMPANY EMAIL AND CONTACT NO</h4>
		<h3 class = "head4">Oficial Receipt</h3>
	</div>

	<div>
		<p class = "name">Name:</p>
		<p class = "name1">CUSTOMER NAME</p>
		<p class = "address">Delivery Address:</p>
		<p class = "add">CUSTOMER ADDRESS</p>
		<p class = "cell">Cellphone #:</p>
		<p class = "phone">CUSTOMER CONTACT NO</p>
		<p class = "date">Payment Date and Time:</p>
		<p class = "date2">PAYMENT DATE AND TIME</p>
		<p class = "note1">THIS WILL SERVE AS YOUR OFICIAL RECEIPT.</p>	
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
					<tr>
						<td colspan = "2" class = "row">LIST OF ITEMS</td>
						<td class = "row">PRICE OF ITEMS</td>
					</tr>
				<tr>
					<td colspan = "2"></td>
					<td></td>
				</tr>
				<tr>
					<td class = "rows" colspan = "2" height = "1%">Discount:</td>
					<td class = "row">DISCOUNT </td>
				</tr>
				<tr>
					<td colspan = "2"></td>
					<td></td>
				</tr>
				<tr>
					<td class = "rows" colspan = "2" height = "1%">Discounted Price:</td>
					<td class = "row">DISCOUNTED PRICE</td>
				</tr>
				<tr>
					<td colspan = "2"></td>
					<td></td>
				</tr>
				<tr>
					<td class = "rows" colspan = "2" height = "1%">Service Fee:</td>
					<td class = "row">SERVICE FEE</td>
				</tr>
				<tr>
					<td class = "rows" colspan = "2" height = "1%">Sub Total:</td>
					<td class = "row">SUBTOTAL</td>
				</tr>
				<tr>
					<td colspan = "2"></td>
					<td></td>
				</tr>
				<tr>
					<td class = "rows" colspan = "2" height = "1%">Delivery Fee:</td>
					<td class = "row">DELIVERY FEE</td>
				</tr>
				<tr>
					<td class = "rows" colspan = "2" height = "1%">Event Fees:</td>
					<td class = "row">EVENT FEE</td>
				</tr>
				<tr>
					<td colspan = "2"></td>
					<td></td>
				</tr>
				<tr>
					<td style = "font-weight: bold" class = "rows" colspan = "2" height = "1%">Total:</td>
					<th class = "row">TOTAL</th>
				</tr>
			</tbody>
		</table>
	</div>

	<div>
		
	</div>
</body>
</html>
