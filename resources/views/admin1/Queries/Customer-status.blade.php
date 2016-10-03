<html>
<body>
<head>
	<style>
		@page{
			size: 800px 1500px; 
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
		.title{
			margin-top: 0;
			margin-left: 40%
		}
		table{
			position: absolute;
			margin-top: 0%;
			border: 1px solid black;
			width: 100%;	
		}
		th, td{
			vertical-align: middle;
			text-align: center;
			border: 1px solid black;
		}
	</style>

</head>
<body>
	<div>
		<img src = "{{$dashboard->valid_id}}" class ="image" >
		<h2 class = "head1">{{$dashboard->CompanyName}}</h2>
		<h4 class = "head2">{{$dashboard->ComapanyAddress}}</h4>
		<h4 class = "head3">{{$dashboard->CompanyEmail}} - {{$dashboard->CellphoneNo}}</h4>
		<h2 class = "title">Customer Status</h2>
	</div>
	<!-- <div>
		<span style = "font-weight:bold;">Customer's Status</span><br>
		<span>0 = Not yet Approved Customer </span><br>
		<span>1 = Approved Customer</span>
	</div> -->

	<div>
	<table>
		<thead>
			<tr>
				<th>Customer Name</th>
				<th>Customer Status</th>
				<th>Date Approved</th>
				<th>Points</th>
			</tr>
		</thead>
		<tbody>
		@foreach($members as $key)
			<tr>
				<td>{!! $key->LastName !!}, {!! $key->FirstName !!} {!! $key->MiddleName !!}</td>
				@if($key->Account->status == 1)
				<td>Active</td>
				@elseif ($key->Account->status == 0)
				<td>Not Active</td>
				@endif
				<td>{!! $key->Account->DateApproved!!}</td>
				<td>{!! $key->Account->Points!!}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
</body>
</html>