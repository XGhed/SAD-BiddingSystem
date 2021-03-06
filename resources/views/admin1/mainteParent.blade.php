<!DOCTYPE html>
<html>
  <head>
    <title>BiddingManagementSystem</title>
      <!--CSS-->
      <link rel="icon" href="icons/icon.png">
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/Semantic-UI-CSS-master/semantic.css')!!}"/>
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/dataTables.semanticui.min.css')!!}"/>

      <!--JAVASCRIPT -->
      <script type="text/javascript" src="{!!URL::asset('js/jquery-2.1.1.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/semantic.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/jquery-1.12.3.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/jquery.dataTables.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/dataTables.semanticui.min.js')!!}"></script>
      <script type="text/javascript" src="js/angular.min.js"></script>
      <script type="text/javascript" src="{!!URL::asset('js/angular-datatables.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/moment.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/humanize-duration.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/angular-timer.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/angular-datatables.columnfilter.min.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/angular-datatables.columnfilter.js')!!}"></script>
      <script type="text/javascript" src="{!!URL::asset('js/semantic.min.js')!!}"></script>
      <script src="js/highcharts/js/highstock.js"></script>
      <script src="js/highcharts/js/modules/exporting.js"></script>

      <!--calendar -->
      <link href="{!!URL::asset('css/fullcalendar.css')!!}" rel='stylesheet' />
      <script src="{!!URL::asset('js/moment.min.js')!!}"></script>
      <script src="{!!URL::asset('js/fullcalendar.min.js')!!}"></script>

      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/angular-datatables.css')!!}"/>

      <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>

  <body style="background-image: url('icons/background9.png');  background-repeat: no-repeat;
    background-attachment: fixed;">

    
      <div class="ui fixed secondary inverted pointing menu">
        <div class="ui container">
          <a href="#" class="header item">
            <img class="ui mini image" src="icons/icon.png">
          </a>
          <a href="/dashboard" class="item"><i class="large home icon"></i>Dashboard</a>
          <a href="/supplier" class="item"><i class="large settings icon"></i>Maintenance</a>
          <a href="/orderedItem" class="item"><i class="large exchange icon"></i>Transaction</a>
          <a href="/qcustomerStatus" class="item"><i class="large checked calendar icon"></i>Queries</a>
          <a href="/announcements" class="item"><i class="large options icon"></i>Utilities</a>
          <a href="/salesGraph" class="item"><i class="large list icon"></i>Reports</a>
        </div>
      </div>

    <div class="ui segment container" style="top:70px;">
      @yield('content')
    </div>




  </body>
</html>