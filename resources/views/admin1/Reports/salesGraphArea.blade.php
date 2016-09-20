@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Reports.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
    @include('admin1.Reports.buttonSales')
    <!--<form method="post" action="/salesGraph">
    
         <label>From: </label>
        <input type="date" name="start" id="start" required>
        <label>To: </label>
        <input type="date" name="end" id="end" required>
        <button type="submit" name="date">Go!</button>
        <button type="submit" name="area">Per Area</button>
        <button type="submit" name="region">Per Region</button>
    </form>-->
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
            text: 'Sales of 2016 per Area'
        },
        xAxis: {
            categories:[
                <?php
                    if(isset($item)){
                        $ctr = count($item);
                        for ($i=0; $i<$ctr; $i++) { 
                            $ctr2 = count($item[$i]);
                            for ($j=1; $j<$ctr2; $j++) { 
                                echo "'".$item[$i][$j]."',";
                                $j+=2;
                            }
                        }
                    }
                ?>
                //'asd','asdasdads'
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
        series: [{
            <?php
                if(!is_null($item)){
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
                } else{
                    echo "name: 'Nothing to show'";
                }
            ?>
        }]
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