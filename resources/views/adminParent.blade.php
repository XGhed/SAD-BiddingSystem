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

      <meta name="csrf-token" content="{{ csrf_token() }}">

      @yield('jqueryscript')
    </head>

<body style="background-image: url('icons/background4.jpg');">


<div class="navbar-fixed">
<nav>
    <div class="nav-wrapper" style="background-image: url('icons/background4.jpg');">
      <a href="#!" class="brand-logo center black-text"><i class="material-icons left">gavel</i>Bidding Management System</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="http://localhost:8000/" class="black-text">Hello Admin</a></li>
      </ul>
       <ul id="slide-out" id="mobile-demo" class="side-nav fixed transparent" onmouseover="showScroll(this)" onmouseout="hideScroll(this)">
                <!-- admin info -->
                <div class="row"></div>
                <div class="row"></div>
              <div class="row">
                <div class="col s10 transparent push-s1">
                  <center><img class="circle responsive-img z-depth-3" alt="AdminPic" src="icons/Admin_pic.jpg"></center>
                </div>
              </div>

        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="black-text collapsible-header"><i class="material-icons left ">build</i>Maintenance<i class="material-icons right">arrow_drop_down</i></a>
              <div class="collapsible-body" style="background-image: url('icons/background4.jpg');">
                  <div class="divider"></div>
                <ul>
                  <li><a class="black-text" href="/supplier">Supplier</a></li>
                  <li><a class="black-text" href="/category" >Category</a></li>
                  <li><a class="black-text" href="/keyword">Keyword</a></li>
                  <li><a class="black-text" href="/item">Item</a></li>
                  <li><a class="black-text" href="/accountType">Account Type</a></li>
                  <li><a class="black-text" href="/paymentMethod">Payment Method</a></li>
                  <li><a class="black-text" href="/deliveryParty">3rd Party Delivery</a></li>
                  <div class="divider"></div>
                </ul>
              </div>
            </li>
          </ul>
        </li>       
        <li><a class="black-text" href="/registerItem"><i class="material-icons left">input</i>Register Items</a></li>
        <li><a class="black-text" href="/bidEvent"><i class="material-icons left">today</i>Bidding Event</a></li>
        <li><a class="black-text" href="#!"><i class="material-icons left">receipt</i>Reports</a></li>
        <li><a class="right black-text" href="/home"><i class="material-icons left">exit_to_app</i>Log out</a></li>
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
 <!--*******************SIDE NAVIGATOR PANEL********************************************* -->
      

 <!--*******************SIDE NAVIGATOR PANEL********************************************* -->
    <div class="col s10 push-s2 transparent">
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
