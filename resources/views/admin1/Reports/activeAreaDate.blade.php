@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Reports.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
    @include('admin1.Reports.buttonActiveArea')
        <div id="container" style="height: 600px;margin-top:20px;width: 600px"></div>
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
        if(is_null($data)){
            echo "$('#alert').modal('show');";
        }
    ?>
Highcharts.drawTable = function() {
    
    // user options
    var tableTop = 310,
        colWidth = 100,
        tableLeft = 20,
        rowHeight = 20,
        cellPadding = 2.5,
        valueDecimals = 0,
        valueSuffix = ' Bid/s';
        
    // internal variables
    var chart = this,
        series = chart.series,
        renderer = chart.renderer,
        cellLeft = tableLeft;

    // draw category labels
    $.each(chart.xAxis[0].categories, function(i, name) {
        renderer.text(
            name, 
            cellLeft + cellPadding, 
            tableTop + (i + 2) * rowHeight - cellPadding
        )
        .css({
            fontWeight: 'bold'
        })       
        .add();
    });

    $.each(series, function(i, serie) {
        cellLeft += colWidth;
        
        // Apply the cell text
        renderer.text(
                serie.name,
                cellLeft - cellPadding + colWidth, 
                tableTop + rowHeight - cellPadding
            )
            .attr({
                align: 'right'
            })
            .css({
                fontWeight: 'bold'
            })
            .add();
        
        $.each(serie.data, function(row, point) {
            
            // Apply the cell text
            renderer.text(
                    Highcharts.numberFormat(point.y, valueDecimals) + valueSuffix, 
                    cellLeft + colWidth - cellPadding, 
                    tableTop + (row + 2) * rowHeight - cellPadding
                )
                .attr({
                    align: 'right'
                })
                .add();
            
            // horizontal lines
            if (row == 0) {
                Highcharts.tableLine( // top
                    renderer,
                    tableLeft, 
                    tableTop + cellPadding,
                    cellLeft + colWidth, 
                    tableTop + cellPadding
                );
                Highcharts.tableLine( // bottom
                    renderer,
                    tableLeft, 
                    tableTop + (serie.data.length + 1) * rowHeight + cellPadding,
                    cellLeft + colWidth, 
                    tableTop + (serie.data.length + 1) * rowHeight + cellPadding
                );
            }
            // horizontal line
            Highcharts.tableLine(
                renderer,
                tableLeft, 
                tableTop + row * rowHeight + rowHeight + cellPadding,
                cellLeft + colWidth, 
                tableTop + row * rowHeight + rowHeight + cellPadding
            );
                
        });
        
        // vertical lines        
        if (i == 0) { // left table border  
            Highcharts.tableLine(
                renderer,
                tableLeft, 
                tableTop + cellPadding,
                tableLeft, 
                tableTop + (serie.data.length + 1) * rowHeight + cellPadding
            );
        }
        
        Highcharts.tableLine(
            renderer,
            cellLeft, 
            tableTop + cellPadding,
            cellLeft, 
            tableTop + (serie.data.length + 1) * rowHeight + cellPadding
        );
            
        if (i == series.length - 1) { // right table border    
 
            Highcharts.tableLine(
                renderer,
                cellLeft + colWidth, 
                tableTop + cellPadding,
                cellLeft + colWidth, 
                tableTop + (serie.data.length + 1) * rowHeight + cellPadding
            );
        }
        
    });
    
        
};

/**
 * Draw a single line in the table
 */
Highcharts.tableLine = function (renderer, x1, y1, x2, y2) {
    renderer.path(['M', x1, y1, 'L', x2, y2])
        .attr({
            'stroke': 'silver',
            'stroke-width': 1
        })
        .add();
}

window.chart = new Highcharts.Chart({

    chart: {
        type: 'column',
        renderTo: 'container',
        events: {
            load: Highcharts.drawTable
        },
        borderWidth: 2
    },
    
    title: {
        text: 'Active Areas in a Specific Date'
    },
    
    xAxis: {
        categories: [
            <?php
                    if(isset($data)){
                        $ctr = count($data);
                        for ($i=0; $i<$ctr; $i++) { 
                            echo "'".$data[$i][0]."',";
                        }
                    }
                ?>
        ]
    },
    
    yAxis: {
        title: {
            text: 'Bids'
        }
    },

    legend: {
        y: -300
    },

    series: [
        <?php
                if(!is_null($data)){
                    $ctr = count($data);
                    for ($i=0; $i<$ctr; $i++) {
                        echo "{name: ' ',data:[".$data[$i][1]."]}";
                        if($i+1!=$ctr){
                            echo ",";
                        }
                    }
                } else{
                    echo "{name: 'Nothing to show'}";
                }
            ?>
    ]
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

    //endDate
      var date = new Date();

      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();

      if (month < 10) month = "0" + month;
      if (day < 10) day = "0" + day;

      var today = year + "-" + month + "-" + day;
      document.getElementById("end").value = today;
      document.getElementById("end").min = document.getElementById("start").value;

      function minEnd(){
        document.getElementById("end").value = document.getElementById("start").value;
        document.getElementById("end").min = document.getElementById("start").value;
      }
</script>
@endsection