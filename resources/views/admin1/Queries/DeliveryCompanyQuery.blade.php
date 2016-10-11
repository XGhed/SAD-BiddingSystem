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
    .title{
        margin-top: 0;
        margin-left: 35%
    }
    span {
        font-weight: normal;
    }
    .table th {
        background-color: teal;
        color: white;
        font-size: 13px;
    }
    .table {
        margin-right: 10px;
        margin-left: 10px;
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-top: 10px;
    }
    .stable td, th {
        border: 1px solid black;
        text-align: left;
        padding: 8px;
    }
    .table td {
        border-collapse: collapse;
        border: 1px solid black;
        font-weight: bold;
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
</style>
<body>
	<div>
		<img src = "{{$dashboard->valid_id}}" class ="image" >
		<h3 class = "head1">{{$dashboard->CompanyName}}</h3>
		<h4 class = "head2">{{$dashboard->ComapanyAddress}}</h4>
		<h4 class = "head3">{{$dashboard->CompanyEmail}} - {{$dashboard->CellphoneNo}}</h4>
		<h2 class = "title">Delivery (Company)</h2>
	</div>
 
	<div>
	<table class = "table">
		<thead>
			<tr>
				<th>Places</th>
				<th>Delivery Fee</th>
			</tr>
		</thead>
		<tbody>
		@foreach($places as $key)
			<tr>
				<td>{!! $key->Province->ProvinceName!!}</td>
				<td>{!! $key->ShipmentFee!!}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
</body>