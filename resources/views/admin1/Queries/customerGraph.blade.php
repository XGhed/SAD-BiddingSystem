@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Queries.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
    <!---<form method="post" action="/salesGraph" class="ui form">
        <div class="fields">
            <div class="three wide field">
                <div class="ui sub header"> FROM: </div>
                <input type="date" name="start" required>
            </div>
            <div class="three wide field">
                <div class="ui sub header"> TO: </div>
                <input type="date" name="end" required>
            </div>
            <div class="siex wide field">
                <div class="ui sub header">;</div>
                 <button class="ui green button" type="submit" name="date">Go!</button>
            </div>
        </div>
       
        <button class="ui green button" type="submit" name="region">Per Region</button>
    </form>-->
    <br>
        <script src="js/js/highstock.js"></script>
        <script src="js/js/modules/exporting.js"></script>
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
  </div>
</div>


<script>
    <?php
        if(is_null($customer)){
            echo "alert('Nothing to display!');";
        }
    ?>
$(function() {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Approved Accounts of 2016'
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
                '<td style="padding:0"><b>Php {point.y:.0f}</b></td></tr>',
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
                //echo "alert(JSON.stringify(".$customer."))";
                if(!is_null($customer)){
                    $ctr = count($customer);
                    for ($i=0; $i<$ctr; $i++) {
                        echo "name: '', data:[";
                        for($j=1; $j<=12; $j++){
                            if($customer[$i][0]==$j){
                                echo $customer[$i][1].",";
                            } else{
                                echo "0,";
                            }
                        }
                    }
                    echo "]";
                } else{
                    echo "name: 'Nothing to show'";
                }
            ?>
        }]
    });
});

</script>
@endsection