@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Reports.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
    @include('admin1.Reports.buttonCustomer')
    <!--<form method="post" action="/customer">
        <button type="submit" name="list">All Approved Customer</button>
        <button type="submit" name="area">Per Area</button>
        <button type="submit" name="region">Per Region</button>
    </form><br>
        <script src="js/js/highstock.js"></script>
        <script src="js/js/modules/exporting.js"></script>
    -->
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
  </div>

  <div class="ui basic modal" id="alert">
        <h1 class='ui red centered header'>
          There is nothing to display yet
        </h1>
    </div>
</div>


<script>
    <?php
        if(is_null($customer)){
            echo "$('#alert').modal('show');";
        }
    ?>
$(function() {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Approved Accounts of 2016 per Region'
        },
        xAxis: {
            categories:[
                <?php
                    if(isset($customer)){
                        $ctr = count($customer);
                        for ($i=0; $i<$ctr; $i++) { 
                            echo "'".$customer[$i][0]."',";
                        }
                    }
                ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Accounts'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0"></td>' +
                '<td style="padding:0"><b>Php {point.y:.2f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            <?php
                if(!is_null($customer)){
                    $ctr = count($customer);
                    for ($i=0; $i<$ctr; $i++) {
                        echo "{name: '".$customer[$i][0]."',data:[".$customer[$i][1]."]}";
                        if($i+1!=$ctr){
                            echo ",";
                        }
                    }
                } else{
                    echo "name: 'Nothing to show'";
                }
            ?>
        ]
    });
});

</script>
@endsection