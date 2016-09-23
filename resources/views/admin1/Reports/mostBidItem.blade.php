@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Reports.sideNav')

  <div class="twelve wide stretched column">
    @include('admin1.Reports.buttonMostBid')

        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
  </div>

  <div class="ui basic modal" id="alert">
        <h1 class='ui red centered header'>
          There is nothing to display yet
        <div class="ui divider"></div>
           Invalid Inputs!
        </h1>
    </div>
</div>


<script>
    <?php
        if(is_null($item)){
            echo "$('#alert').modal('show');";
        }
    ?>
$(function() {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Most Bid Items'
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
                        echo "name: '".$item[$i][0]."',data:[".$item[$i][1]."],";
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