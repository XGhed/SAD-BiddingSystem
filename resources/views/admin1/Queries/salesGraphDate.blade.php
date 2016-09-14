@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Queries.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
    <form method="post" action="/salesGraph">
        <label>From: </label>
        <input type="date" name="start">
        <label>To: </label>
        <input type="date" name="end">
        <button type="submit" name="date">Go!</button>
        <button type="submit" name="region">Per Region</button>
    </form><br>
        <script type="text/javascript" src="{!!URL::asset('js/highcharts.js')!!}"></script>
        <!--<script type="text/javascript" src="{!!URL::asset('js/exporting.js')!!}"></script>-->
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
            text: 'Sales of Specific Date'
        },
        xAxis: {
            categories:[
                <?php
                    $ctr = count($item);
                    for ($i=0; $i<$ctr; $i++) { 
                        $ctr2 = count($item[$i]);
                        for ($j=1; $j<$ctr2; $j++) { 
                            echo "'".$item[$i][$j]."',";
                            $j++;
                        }
                    }
                ?>
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
            <?php
                $ctr = count($item);
                for ($i=0; $i<$ctr; $i++) {
                    $ctr2 = count($item[$i]);
                    $k = 1;
                    echo "name: '".$item[$i][0]."',data:[";
                    for ($j=2; $j<$ctr2; $j++) { 
                        echo $item[$i][$j];
                        $j++;
                        if($j+1!=$ctr2){
                            echo ",";
                        }
                    }
                    echo "]";
                    if($i+1!=$ctr){
                        echo ",";
                    }
                    //echo $ctr;
                    //echo $ctr2;
                }
            ?>
        }]
    });
});

</script>
@endsection