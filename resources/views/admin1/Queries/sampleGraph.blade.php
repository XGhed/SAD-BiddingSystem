@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Queries.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
  </div>
</div>


<script>
$(function() {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Sales of 2016 per Category'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Sales'
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
        series: [{
            name:
            <?php
                $ctr = count($item);
                for ($i=0; $i<$ctr; $i++) {
                    $ctr2 = count($item[$i]);
                    $k = 1;
                    echo "'".$item[$i][0]."',data:[";
                    for ($j=1; $j<=12; $j++) { 
                        if($item[$i][$k]==$j){
                            echo $item[$i][$k+1].",";
                            $k+=2;
                        } else{
                            echo "0, ";
                        }
                        if ($k==$ctr2){
                            $l = 12 - $j;
                            for ($m=0; $m < $l; $m++) { 
                                echo "0,";
                            }
                            break;
                        }
                    }
                    echo "]";
                    //echo $ctr;
                    //echo $ctr2;
                }
            ?>
        }]
    });
});

</script>
@endsection