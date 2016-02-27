<!DOCTYPE html>
  <html>
    <head>
    <title>@yield('title')</title>
      <!--CSS-->
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/materialize.css')!!}" media="screen,projection" />
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/maintenance.css')!!}" media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/datatable.css')!!}" media="screen,projection"/>
      <!--JAVASCRIPT -->
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/datatable.js"></script>

      @yield('jqueryscript')
    </head>

<body style="background-color: #212121">

<div class="row">
 <!--*******************SIDE NAVIGATOR PANEL********************************************* -->


      <ul id="slide-out" class="side-nav fixed grey darken-3">
                <!-- admin info-->
              <div class="grey darken-3">
              <center> <img class="circle responsive-img z-depth-3" src="icons/1x1.jpg"></center>
              <center class="white-text"> Hello Nigguh!!!!</center>
              </div>

        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="white-text collapsible-header"><i class="material-icons">build</i>Maintenance<i class="tiny material-icons right">arrow_drop_down</i></a>
              <div class="collapsible-body">
                  <div class="divider"></div>
                <ul>
                  <li><a class="white-text" href="/supplier">Supplier</a></li>
                  <li><a class="white-text" href="/category" >Category</a></li>
                  <li><a class="white-text" href="/subcategory" >Subcategory</a></li>
                  <li><a class="white-text" href="/keyword">Keyword</a></li>
                  <!-- <li><a class="white-text" href="/item">Item</a></li>-->
                  <li><a class="white-text" href="/accountType">Account Type</a></li>
                  <li><a class="white-text" href="/paymentMethod">Payment Method</a></li>
                  <li><a class="white-text" href="/deliveryCompany">Company Delivery</a></li>
                  <li><a class="white-text" href="/deliveryParty">3rd Party Delivery</a></li>
                  <div class="divider"></div>
                </ul>
              </div>
            </li>
          </ul>
        </li>       
        <li><a class="white-text collapsible-header" href="/registerItem"><i class="material-icons">input</i>Register Items</a></li>
        <li><a class="white-text collapsible-header" href="/bidEvent"><i class="material-icons">gavel</i>Bidding Event</a></li>
        <li><a class="white-text collapsible-header" href="#!"><i class="material-icons">receipt</i>Reports</a></li>
        <li><a class="right white-text collapsible-header" href="/home"><i class="material-icons">exit_to_app</i>Log out</a></li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse "><i class="large mdi-navigation-menu"></i></a>
    

        <script>
        $('.button-collapse').sideNav({
            menuWidth: 280, // Default is 240
            edge: 'left', // Choose the horizontal origin
            closeOnClick: false // Closes side-nav on <a> clicks, useful for Angular/Meteor
        });

        </script>

 <!--*******************SIDE NAVIGATOR PANEL********************************************* -->
    <div class="col s10 push-s2 grey darken-4">
    @yield('title1')
    <?php
    if (Session::get('message') != null){
        if(Session::get('message') == '1')
          echo "<script> 
                  var toastContent = $('<span>RECORD ADDED!</span>');
                  Materialize.toast(toastContent, 5000, 'add');
                </script>";
        elseif(Session::get('message') == '2')
          echo "<script> 
                  var toastContent = $('<span>RECORD EDITED!</span>');
                  Materialize.toast(toastContent, 5000, 'edit');
                </script>";
        elseif(Session::get('message') == '3')
          echo "<script> 
                  var toastContent = $('<span>RECORD DELETED!</span>');
                  Materialize.toast(toastContent, 5000, 'delete');
                </script>";
        elseif(Session::get('message') == '-1')
          echo "<script> 
                  var toastContent = $('<span>ERROR!</span>');
                  Materialize.toast(toastContent, 5000, 'delete');
                </script>";
        Session::forget('message');
      }
    ?>
    <div id="alertMsg">WORKING</div>
    <div class="col s10 push-s1 white hoverable">
        @yield('supplier')
        @yield('accounts')
        @yield('category')
        @yield('subcategory')
        @yield('items')
        @yield('regItems')
        @yield('bidEvent')
        @yield('accountType')
        @yield('deliveryParty')
        @yield('deliveryCompany')
        @yield('keyword')
        @yield('modePayment')
    </div>
    </div>
    </div>
</body>
</html>
