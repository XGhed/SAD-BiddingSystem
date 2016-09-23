@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Reports.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
    @include('admin1.Reports.buttonSales')
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
        series: [
            /*name: 'asdasd',
            data: [1,2,3],
            name: 'asdadasdasd',
            data: [3,2,1]*/
            <?php
                //echo "alert(JSON.stringify(".$item."))";
                if(!is_null($item)){
                    $ctr = count($item);
                    for ($i=0; $i<$ctr; $i++) {
                        $ctr2 = count($item[$i]);
                        $k = 1;
                        echo "{name: '".$item[$i][0]."',data:[";
                        for ($j=1; $j<=12; $j++) { 
                            if($item[$i][$k]==$j){
                                echo $item[$i][$k+1].",";
                                $k+=2;
                            } else{
                                echo "0";
                            }
                            if ($k==$ctr2){
                                $l = 12 - $j;
                                for ($m=0; $m < $l; $m++) { 
                                    echo "0,";
                                }
                                break;
                            }
                            if($j+1!=12){
                                echo ",";
                            }
                        }
                        echo "]}";
                        if($i+1!=$ctr){
                            echo ",";
                        }
                        //echo $ctr;
                        //echo $ctr2;
                    }
                } else{
                    echo "name: 'Nothing to show'";
                }
            ?>
        ]
    });
});

      //startDate
      var date = new Date();

      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();

      if (month < 10) month = "0" + month;
      if (day < 10) day = "0" + day;

      var today = year + "-" + month + "-" + day;
      document.getElementById("start").value = today;
      document.getElementById("start").min = today;

    //endDate
      var date = new Date();

      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();

      if (month < 10) month = "0" + month;
      if (day < 10) day = "0" + day;

      var today = year + "-" + month + "-" + day;
      document.getElementById("end").value = today;
      document.getElementById("end").min = today;

</script>
@endsection