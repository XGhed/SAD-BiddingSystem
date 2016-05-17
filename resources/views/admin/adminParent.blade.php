<!DOCTYPE html>
  <html>
    <head>
    <title>@yield('title')</title>
      <!--CSS-->
      <link rel="icon" href="icons/icon.png">
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/materialize.css')!!}" media="screen,projection" />
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/maintenance.css')!!}" media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/datatable.css')!!}" media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('fc/fullcalendar.css')!!}" media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('fc/fullcalendar.print.css')!!}" media="print"/>
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('fc/css/jquery-ui.css')!!}" media="screen,projection"/>
      <!--JAVASCRIPT -->
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/datatable.js"></script>
      <script src='fc/lib/moment.min.js'></script>
      <script src='fc/fullcalendar.js'></script>

      <meta name="csrf-token" content="{{ csrf_token() }}">
      @yield('jqueryscript')
    </head>

<body style="background-image: url('icons/bg2.png');  background-repeat: no-repeat;
    background-attachment: fixed;">


<div class="navbar">
<nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo center white-text"><i class="material-icons left">gavel</i>Bidding Management System</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="http://localhost:8000/" class="white-text">Log out</a></li>
      </ul>
       <ul id="slide-out" id="mobile-demo" class="side-nav fixed" style="background-image: url('icons/background9.png);" onmouseover="showScroll(this)" onmouseout="hideScroll(this)">
                <!-- admin info -->
              <div class="row">
                <div class="col s12 transparent">
                  <center><img class="circle responsive-img" alt="AdminPic" src="icons/BMS2.png"></center>
                </div>
              </div>

        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="white-text collapsible-header" ><i class="material-icons left ">build</i>Maintenance<i class="material-icons right">arrow_drop_down</i></a>
              <div class="collapsible-body">
                  <div class="divider"></div>
                <ul>
                  <li><a class="white-text" href="/supplier">Supplier</a></li>
                  <li><a class="white-text" href="/category" >Category</a></li>
              <!--<li><a class="white-text" href="/keyword">Keyword</a></li>-->
                  <li><a class="white-text" href="/item">Item</a></li>
                  <li><a class="white-text" href="/accountType">Account Type</a></li>
              <!--<li><a class="white-text" href="/paymentMethod">Payment Method</a></li>-->
                  <li><a class="white-text" href="/shipment">Shipment</a></li>
                  <li><a class="white-text" href="/warehouse">Warehouse</a></li>
                  <li><a class="white-text" href="/places">Place</a></li>
                  <div class="divider"></div>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <!-- <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="white-text collapsible-header" ><i class="material-icons left">compare_arrows</i>Transactions<i class="material-icons right">arrow_drop_down</i></a>
              <div class="collapsible-body">
                  <div class="divider"></div>
                <ul>
                <li><a class="white-text" href="/registerContainer" ><i class="material-icons left">view_module</i>Record Container</a></li>
                 <li><a class="white-text" href="/inventory" ><i class="material-icons left">input</i>Inventory</a></li>
                  <div class="divider"></div>
                </ul>
              </div>
            </li>
          </ul>
        </li> -->
        <li><a class="white-text" href="/inventory" ><i class="material-icons left">input</i>Inventory</a></li>
        <li><a class="white-text" href="/bidEvent" ><i class="material-icons left">today</i>Bidding Event</a></li>
        <li><a class="white-text" href="#!" ><i class="material-icons left">receipt</i>Reports</a></li>
        <li><a class="right white-text" href="/home"><i class="material-icons left">exit_to_app</i>Log out</a></li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu right"></i></a>
    

        <script>
        $('.button-collapse').sideNav({
            menuWidth: 270, // Default is 240
            edge: 'left', // Choose the horizontal origin
            closeOnClick: false // Closes side-nav on <a> clicks, useful for Angular/Meteor
        });


        function hideScroll(x) {
             x.style.overflow = "hidden";
          }

          function showScroll(x) {
              x.style.overflow = "auto";
          }
        </script>

    </div>
  </nav>
  </div>

<div class="row">
    <div class="col s10 push-s2">
    @yield('title1')
    <?php
    if (Session::get('message') != null){
        if(Session::get('message') == '1')
          echo "<script> 
                  var toastContent = $('<span>RECORD ADDED!</span>');
                  Materialize.toast(toastContent, 1500, 'add');
                </script>";
        elseif(Session::get('message') == '2')
          echo "<script> 
                  var toastContent = $('<span>RECORD UPDATED!</span>');
                  Materialize.toast(toastContent, 1500, 'edit');
                </script>";
        elseif(Session::get('message') == '3')
          echo "<script> 
                  var toastContent = $('<span>RECORD DELETED!</span>');
                  Materialize.toast(toastContent, 1500, 'delete');
                </script>";
        elseif(Session::get('message') == '-1')
          echo "<script> 
                  var toastContent = $('<span>ERROR!</span>');
                  Materialize.toast(toastContent, 1500, 'delete');
                </script>";
        Session::forget('message');
      }
    ?>
    <div class="col s10 push-s1 white hoverable">
        @yield('content')
    </div>

    </div>
    </div>

</body>
</html>
