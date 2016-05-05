<!DOCTYPE html>
  <html>
    <head>
    <title>Shipment Edit</title>
      <!--CSS-->
      <link rel="icon" href="icons/icon.png">
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/materialize.css')!!}" media="screen,projection" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--JAVASCRIPT -->
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      
      <script type="text/javascript">
        $(function(){   
          $('#addForm').on('click', '.selectAll', function(){
            var selected = this.name;
            $('#addForm .' + selected).prop('checked', true);
          });

          $('#addForm').on('click', '.deselectAll', function(){
            var selected = this.name;
            $('#addForm .' + selected).prop('checked', false);
          });

          $('#editForm').on('click', '.selectAll', function(){
            var selected = this.name;
            $('#editForm .' + selected).prop('checked', true);
          });

          $('#editForm').on('click', '.deselectAll', function(){
            var selected = this.name;
            $('#editForm .' + selected).prop('checked', false);
          });
        });
        function hideScroll(x) {
             x.style.overflow = "hidden";
          }

          function showScroll(x) {
              x.style.overflow = "auto";
          }
      </script>
    </head>

<body style="background-image: url('icons/background10.jpg'); background-repeat: no-repeat;
    background-attachment: fixed;">

  <nav>
    <a href="#!" class="brand-logo center white-text"><i class="material-icons left">gavel</i>Bidding Management System</a>
  </nav>

  <div style="margin: 0 50px 0 50px" class="white">

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

      <div style="margin: 0 50px 0 50px;">
      <div class="row">
        <div class="col s12">Regions:
          <ul class="tabs" onmouseover="showScroll(this)" onmouseout="hideScroll(this)" style="overflow-x:hidden">
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

        <div id="region2" class="col s12">
          <div class="row"></div>
          <div class="row">
            <div class="col s3">
              <input name="2" class="selectAll btn" type="button" id="selectAll" value="Select All" />
            </div>
            <div class="col s6">
              <input name="2" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
            </div>
          </div>
          
          <div class="row">
            @foreach($provinces as $key => $province)
            @if($province->region->RegionID == '2')
              <div class="col s3">
                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
              </div>
            @endif
            @endforeach
          </div>
        </div><!-- Region2 -->

        <div id="region3" class="col s12">
          <div class="row"></div>
          <div class="row">
            <div class="col s3">
              <input name="3" class="selectAll btn" type="button" id="selectAll" value="Select All" />
            </div>
            <div class="col s6">
              <input name="3" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
            </div>
          </div>
          
          <div class="row">
            @foreach($provinces as $key => $province)
            @if($province->region->RegionID == '3')
              <div class="col s3">
                <input type="checkbox" name="add_prov[]" class="3" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
              </div>
            @endif
            @endforeach
          </div>
        </div><!-- Region3 -->

        <div id="region4A" class="col s12">
          <div class="row"></div>
          <div class="row">
            <div class="col s3">
              <input name="4A" class="selectAll btn" type="button" id="selectAll" value="Select All" />
            </div>
            <div class="col s6">
              <input name="4A" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
            </div>
          </div>
          
          <div class="row">
            @foreach($provinces as $key => $province)
            @if($province->region->RegionID == '4')
              <div class="col s3">
                <input type="checkbox" name="add_prov[]" class="4A" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
              </div>
            @endif
            @endforeach
          </div>
        </div><!-- Region1 -->

        <div id="region4B" class="col s12">
          <div class="row"></div>
          <div class="row">
            <div class="col s3">
              <input name="4B" class="selectAll btn" type="button" id="selectAll" value="Select All" />
            </div>
            <div class="col s6">
              <input name="4B" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
            </div>
          </div>
          
          <div class="row">
            @foreach($provinces as $key => $province)
            @if($province->region->RegionID == '17')
              <div class="col s3">
                <input type="checkbox" name="add_prov[]" class="4B" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
              </div>
            @endif
            @endforeach
          </div>
        </div><!-- Region4B -->

        <div id="region5" class="col s12">
          <div class="row"></div>
          <div class="row">
            <div class="col s3">
              <input name="5" class="selectAll btn" type="button" id="selectAll" value="Select All" />
            </div>
            <div class="col s6">
              <input name="5" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
            </div>
          </div>
          
          <div class="row">
            @foreach($provinces as $key => $province)
            @if($province->region->RegionID == '5')
              <div class="col s3">
                <input type="checkbox" name="add_prov[]" class="5" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
              </div>
            @endif
            @endforeach
          </div>
        </div><!-- Region5 -->

        <div id="region6" class="col s12"> 
          <div class="row"></div>
          <div class="row">
            <div class="col s3">
              <input name="6" class="selectAll btn" type="button" id="selectAll" value="Select All" />
            </div>
            <div class="col s6">
              <input name="6" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
            </div>
          </div>
          
          <div class="row">
            @foreach($provinces as $key => $province)
            @if($province->region->RegionID == '6')
              <div class="col s3">
                <input type="checkbox" name="add_prov[]" class="6" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
              </div>
            @endif
            @endforeach
          </div>
        </div><!-- Region6 -->

        <div id="region7" class="col s12"><!--this-->
          <div class="row"></div>
          <div class="row">
            <div class="col s3">
              <input name="7" class="selectAll btn" type="button" id="selectAll" value="Select All" />
            </div>
            <div class="col s6">
              <input name="7" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
            </div>
          </div>
          
          <div class="row">
            @foreach($provinces as $key => $province)
            @if($province->region->RegionID == '7')
              <div class="col s3">
                <input type="checkbox" name="add_prov[]" class="7" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
              </div>
            @endif
            @endforeach
          </div>
        </div><!-- Region7 -->

        <div id="region8" class="col s12"><!--this-->
          <div class="row"></div>
          <div class="row">
            <div class="col s3">
              <input name="8" class="selectAll btn" type="button" id="selectAll" value="Select All" />
            </div>
            <div class="col s6">
              <input name="8" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
            </div>
          </div>
          
          <div class="row">
            @foreach($provinces as $key => $province)
            @if($province->region->RegionID == '8')
              <div class="col s3">
                <input type="checkbox" name="add_prov[]" class="8" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
              </div>
            @endif
            @endforeach
          </div>
        </div><!-- Region8 -->

        <div id="region9" class="col s12"><!--this-->
          <div class="row"></div>
          <div class="row">
            <div class="col s3">
              <input name="9" class="selectAll btn" type="button" id="selectAll" value="Select All" />
            </div>
            <div class="col s6">
              <input name="9" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
            </div>
          </div>
          
          <div class="row">
            @foreach($provinces as $key => $province)
            @if($province->region->RegionID == '9')
              <div class="col s3">
                <input type="checkbox" name="add_prov[]" class="9" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
              </div>
            @endif
            @endforeach
          </div>
        </div><!-- Region9 -->

        <div id="region10" class="col s12">
          <div class="row"></div>
            <div class="row">
              <div class="col s3">
                <input name="10" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
              </div>

              <div class="col s6">
                <input name="10" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
              </div>
            </div>

          <div class="row">
            @foreach($provinces as $key => $province)
              @if($province->region->RegionID == '10')
                <div class="col s3">
                  <input type="checkbox" name="add_prov[]" class="10" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                  <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                </div>
              @endif
            @endforeach
          </div>
        </div> <!-- Region 10 -->

        <div id="region11" class="col s12">
          <div class="row"></div>
            <div class="row">
              <div class="col s3">
                <input name="11" class="selectAll btn" type="button" id="selectAll" value="Select All"/>           
              </div>
              <div class="col s6">
                <input name="11" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
              </div>
            </div>

          <div class="row">
            @foreach($provinces as $key => $province)
              @if($province->region->RegionID == '11')
                <div class="col s3">
                  <input type="checkbox" name="add_prov[]" class="11" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                  <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                </div>
              @endif
            @endforeach
           </div>
        </div> <!-- Region 11 -->

        <div id="region12" class="col s12">
          <div class="row"></div>
            <div class="row">
              <div class="col s3">
                <input name="12" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
              </div>

              <div class="col s6">
                <input name="12" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
              </div>
            </div>

          <div class="row">
            @foreach($provinces as $key => $province)
              @if($province->region->RegionID == '12')
                <div class="col s3">
                  <input type="checkbox" name="add_prov[]" class="12" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                  <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                </div>
              @endif
            @endforeach
          </div>
        </div> <!-- Region 12 -->

        <div id="regionNCR" class="col s12">
          <div class="row"></div>
            <div class="row">
              <div class="col s3">
                <input name="NCR" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
              </div>

              <div class="col s6">
                <input name="NCR" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
              </div>
            </div>

          <div class="row">
            @foreach($provinces as $key => $province)
              @if($province->region->RegionID == '13')
                <div class="col s3">
                  <input type="checkbox" name="add_prov[]" class="NCR" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                  <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                </div>
              @endif
            @endforeach
          </div>
        </div> <!-- Region NCR -->

        <div id="regionCAR" class="col s12">
          <div class="row"></div>
            <div class="row">
              <div class="col s3">
                <input name="CAR" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
              </div>

              <div class="col s6">
                <input name="CAR" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
              </div>
            </div>

          <div class="row">
            @foreach($provinces as $key => $province)
              @if($province->region->RegionID == '14')
                <div class="col s3">
                  <input type="checkbox" name="add_prov[]" class="CAR" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                  <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                </div>
              @endif
            @endforeach
          </div>
        </div> <!-- Region CAR -->

        <div id="regionARMM" class="col s12">
          <div class="row"></div>
            <div class="row">
              <div class="col s3">
                <input name="ARMM" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
              </div>

              <div class="col s6">
                <input name="ARMM" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
              </div>
            </div>

          <div class="row">
            @foreach($provinces as $key => $province)
              @if($province->region->RegionID == '15')
                <div class="col s3">
                  <input type="checkbox" name="add_prov[]" class="ARMM" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                  <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                </div>
              @endif
            @endforeach
          </div>
        </div> <!-- Region ARMM -->

        <div id="region13" class="col s12">
          <div class="row"></div>
            <div class="row">
              <div class="col s3">
                <input name="13" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
              </div>

              <div class="col s6">
                <input name="13" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
              </div>
            </div>

          <div class="row">
            @foreach($provinces as $key => $province)
              @if($province->region->RegionID == '16')
                <div class="col s3">
                  <input type="checkbox" name="add_prov[]" class="13" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                  <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                </div>
              @endif
            @endforeach
          </div>
        </div> <!-- Region 13 -->

        <div id="region18" class="col s12">
          <div class="row"></div>
            <div class="row">
              <div class="col s3">
                <input name="18" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
              </div>

              <div class="col s6">
                <input name="18" class="deselectAll btn" type="button" id="deselectAll" value="Deselect All"/>
              </div>
            </div>

          <div class="row">
            @foreach($provinces as $key => $province)
              @if($province->region->RegionID == '18')
                <div class="col s3">
                  <input type="checkbox" name="add_prov[]" class="18" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                  <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                </div>
              @endif
            @endforeach
          </div>
        </div> <!-- Region 18 -->
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
