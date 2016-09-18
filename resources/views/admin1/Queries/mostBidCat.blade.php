@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Queries.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
    <form method="post" action="/mostBid" class="ui form">
        <button type="submit" name="item" class="ui green button">Per Item</button>
        <button type="submit" name="category" class="ui blue button">Per Category</button>
    </form><br>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
  </div>
</div>


<script>
    <?php
        if(is_null($item)){
            echo "alert('Nothing to display!');";
        }
    ?>
$(function() {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Most Bid Categories'
        },
        xAxis: {
            categories: [
                <?php
                    if(!is_null($item)){
                        $ctr = count($item);
                        for ($i=0; $i<$ctr; $i++) { 
                            echo "'".$item[$i][0]."',";
                        }
                    }
                ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of Bids'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0"></td>' +
                '<td style="padding:0"><b>Count: {point.y:.0f}</b></td></tr>',
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
        series: [{
            /*name: 'asdasd',
            data: [1,2,3],
            name: 'asdadasdasd',
            data: [3,2,1]*/
            <?php
                //echo "alert(JSON.stringify(".$item."))";
                if(!is_null($item)){
                    $ctr = count($item);
                    for ($i=0; $i<$ctr; $i++) {
                        echo "name: '".$item[$i][0]."',data:[".$item[$i][1]."]";
                    }
                } else{
                    echo "name: 'Nothing to show'";
                }
            ?>
        }]
    });
});

</script>
@endsection