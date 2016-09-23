<html>
<body>
<head>
	<style>
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
		}

		.head2{
			margin-top: 2%;
			margin-left: 25%;
		}
		.head3{
			margin-top: 0%;
			margin-left: 35%;
		}
		.title{
			margin-top: 0;
			margin-left: 40%
		}
		.table{
			position: absolute;
			margin-top: 3%;
			border: 1px solid black;
			width: 100%;
		}
		.row{
			vertical-align: middle;
			text-align: center;
			border: 1px solid black;
		}
		.items{
			position: absolute;
			display: inline;
			margin-left: 30%;
			margin-top: -100px;

		}
	</style>
</head>
<body>
	<div>
		<img src = "{{$dashboard->valid_id}}" class ="image" >
		<h3 class = "head1">{{$dashboard->CompanyName}}</h3>
		<h4 class = "head2">{{$dashboard->ComapanyAddress}}</h4>
		<h4 class = "head3">{{$dashboard->CompanyEmail}} - {{$dashboard->CellphoneNo}}</h4>
		<h2 class = "title">Supplier Status</h2>
	</div>

	<div>
		<span style = "font-weight:bold">Supplier's Status</span><br>
		<span>0 = Not Active Supplier </span><br>
		<span>1 = Active Supplier</span><br><br>
	</div>
	<div>
		<span style = "font-weight:bold">Item's Status</span><br>
		<span>0 = Not Yet Delivered</span><br>
		<span>1 = Delivered</span><br>
		<span>2 = Available on inventory</span><br>
		<span>3 = Pulled out</span>
	</div>

	<div>
	<table class = "table">
		<thead>
			<tr>
				<th class = "row">Supplier Name</th>
				<th class = "row">Supplier Status</th>
				<th class = "row">Items Stocked</th>
				<th class = "row">Items Missing</th>
				<th class = "row">Items Missing</th>
			</tr>
		</thead>
		<tbody>
		@foreach($suppliers as $key)
			<tr>
				<td class = "row">{!! $key->Container->Supplier->SupplierName!!}</td>
				<td class = "row">{!! $key->Container->Supplier->Status!!}</td>
				<td class = "row">{!! $key->ItemModel->ItemName !!}</td>
				<td class = "row">{!! $key->status!!}</td>
				<td class = "row"></td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
</body>
</html>