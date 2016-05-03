<!DOCTYPE html>
  <html>
    <head>
    <title>@yield('title')</title>
      <!--CSS-->
      <link rel="icon" href="icons/icon.png">
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/materialize.css')!!}" media="screen,projection" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--JAVASCRIPT -->
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      @yield('jqueryscript')
    </head>

<body style="background-image: url('icons/background10.jpg'); background-repeat: no-repeat;
    background-attachment: fixed;">

  <nav>
    <a href="#!" class="brand-logo center white-text"><i class="material-icons left">gavel</i>Bidding Management System</a>
  </nav>

  <div class="container white">

  <div class="row"></div>
  <a href="/shipment" style="position:relative; left:25px;">back</a>
    <div class="row"></div>
    <!--ADD-->
    <h4><i class="medium material-icons left">business</i>Courier Company</h4>
    <div class="divider"></div><!-- LINYA LANG-->     
    <form class="col s12" id="addForm" action="/confirmShipment" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="row">
          <div class="input-field col s8">
            <input id="company_name" type="text" class="validate" name="add_name" length="30" maxlength="30" REQUIRED>
            <label for="company_name">Company Name</label>
          </div>
      </div>

      <div class="container">
      <div class="row">
        <div class="col s12">Regions:
          <ul class="tabs">
            <li class="tab "><a href="#region1" class="black-text"> 1</a></li>
            <li class="tab "><a href="#region2" class="black-text"> 2</a></li>
            <li class="tab "><a href="#region3" class="black-text"> 3</a></li>
            <li class="tab "><a href="#region4A" class="black-text"> 4A</a></li>
            <li class="tab "><a href="#region4B" class="black-text"> 4B</a></li>
            <li class="tab "><a href="#region5" class="black-text"> 5</a></li>
            <li class="tab "><a href="#region6" class="black-text"> 6</a></li>
            <li class="tab "><a href="#region7" class="black-text"> 7</a></li>
            <li class="tab "><a href="#region8" class="black-text"> 8</a></li>
            <li class="tab "><a href="#region9" class="black-text"> 9</a></li>
            <li class="tab "><a href="#region10" class="black-text"> 10</a></li>
            <li class="tab "><a href="#region11" class="black-text"> 11</a></li>
            <li class="tab "><a href="#region12" class="black-text"> 12</a></li>
            <li class="tab "><a href="#regionNCR" class="black-text"> NCR</a></li>
            <li class="tab "><a href="#regionCAR" class="black-text"> CAR</a></li>
            <li class="tab "><a href="#regionARMM" class="black-text"> ARMM</a></li>
            <li class="tab "><a href="#region13" class="black-text"> 13</a></li>
            <li class="tab "><a href="#region18" class="black-text"> 18</a></li>
            <div class="row"></div>
          </ul>
        </div>

        <div id="region1" class="col s12"><!--this-->
          <div class="row"></div>
          <div class="row">
            <div class="col s3">
              <input name="1" class="selectAll btn" type="button" id="selectAll" value="Select All" />
            </div>
            <div class="col s6">
              <input name="1" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
            </div>
          </div>
          
          <div class="row">
            @foreach($provinces as $key => $province)
            @if($province->region->RegionID == '1')
              <div class="col s3">
                <input type="checkbox" name="add_prov[]" class="1" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
              </div>
            @endif
            @endforeach
          </div>
        </div><!-- Region1 -->



      </div><!--tabs-->


      <div class="center">
        <button class="btn waves-effect waves-light blue darken-2 white-text" type="submit" name="add">
        <i class="material-icons left">add</i>Add Courier</button>
        <div class="row"></div><div class="row"></div>
      </div>

    </form>  

    </div>
  </div><!-- container -->
</body>
</html>
