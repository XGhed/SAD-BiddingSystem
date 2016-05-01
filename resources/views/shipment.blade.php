@extends('adminParent')


@section('title')
Maintenance
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 28px">Manage Shipment</h1>
@endsection

@section('jqueryscript')
<script type="text/javascript">
  $(function(){   

    $("#tableOutput").DataTable({
      "lengthChange": false,
      "pageLength": 5,
      "columns": [
        { "searchable": false },
        null,
        null,
        null
      ] 
    });

  $('#addForm').on('click', '.selectAll', function(){
    var selected = this.name;
    $('#addForm .' + selected).prop('checked', true);
  });

  $('#addForm').on('click', '.deselectAll', function(){
    var selected = this.name;
    $('#addForm .' + selected).prop('checked', false);
  });
});
</script>
@endsection


@section('content')
<div class="row"></div>
      <div class="right">
        <a class="modal-trigger waves-effect waves-light blue darken-3 btn z-depth-5" href="#addBtn"><i class="material-icons left">add</i>Add Delivery Company</a>
      </div>
        <!-- DATA TABLE -->
      <table class="highlight responsive-table centered" id="tableOutput">
        <thead>
          <tr>
              <th style="cursor: default;">Manage</th>
              <th>Name</th>
              <th>Place</th>
              <th>Status</th>
          </tr>
        </thead>

        <tbody>
          @foreach($results as $key => $result)
            <tr>
              <td>
                    <div class="row col push-s2" >
                      <div class="col">
                          
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                      
                      <div class="col">
                        <input type="hidden" id="tdID{{$key}}" name="del_ID" value="{{$result->PartyID}}">
                        <button id="{{$key}}" value="{{$key}}" name="edit" class="edit btn-flat btn-large waves-effect waves-light transparent tooltipped modal-trigger" data-position="top" data-target="modal1" data-delay="50" data-tooltip="Edit" ><i class="material-icons" >edit</i></button>
                        <button id="delete" name="delete" class="btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons" onclick="">delete</i></button>
                      </div>
                    </div>
              </td>
              <td id="tdname{{$key}}">{{$result->PartyName}}</td>
              <td>
                @foreach($result->province_ThirdParty as $key => $provThird)
                  {{$provThird->province->ProvinceName}}
                @endforeach
              </td>
              <td>
                <div class="switch">
                  <label>
                    @if ($result->Status == 1)
                          <input class="cat" type="checkbox" id="tdstatus{{$key}}" value="{{$result->PartyID}}" checked>
                      @elseif ($result->Status == 0)
                          <input class="cat" type="checkbox" id="tdstatus{{$key}}" value="{{$result->PartyID}}" >
                      @endif
                    <span class="lever"></span>
                  </label>
                </div>
            </td>
            </tr>
            </div>
          @endforeach
            
        </tbody>
      </table>



 
<!--ADD BUTTON-->
      <div id="addBtn" class="modal modal-fixed-footer" style="width:800px; height:700px;">
        <div class="modal-content" style="overflow: hidden" >
          <h4><i class="medium material-icons left">business</i>Courier Company</h4>

       <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->

        
            
        <form class="col s12" id="addForm" action="/confirmShipment" method="POST"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="input-field col s8">
                      <input id="company_name" type="text" class="validate" name="add_name" length="30" maxlength="30" REQUIRED>
                      <label for="company_name">Company Name</label>
                    </div>
                </div>

                
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

                    <div id="region2" class="col s12">
                      <div class="row"></div>
                        <div class="row">
                          <div class="col s3">
                            <input name="2" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
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
                    </div> <!-- Region 2 -->

                    <div id="region3" class="col s12">
                      <div class="row"></div>
                        <div class="row">
                          <div class="col s3">
                            <input name="3" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
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
                    </div> <!-- Region 3 -->

                    <div id="region4A" class="col s12">
                      <div class="row"></div>
                        <div class="row">
                          <div class="col s3">
                            <input name="4A" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
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
                    </div> <!-- Region 4A -->

                    <div id="region4B" class="col s12">
                      <div class="row"></div>
                        <div class="row">
                          <div class="col s3">
                            <input name="4B" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
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
                    </div> <!-- Region 4B -->

                    <div id="region5" class="col s12">
                      <div class="row"></div>
                        <div class="row">
                          <div class="col s3">
                            <input name="5" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
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
                    </div> <!-- Region 5 -->

                    <div id="region6" class="col s12">
                      <div class="row"></div>
                        <div class="row">
                          <div class="col s3">
                            <input name="6" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
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
                    </div> <!-- Region 6 -->

                    <div id="region7" class="col s12">
                      <div class="row"></div>
                        <div class="row">
                          <div class="col s3">
                            <input name="7" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
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
                    </div> <!-- Region 7 -->

                    <div id="region8" class="col s12">
                      <div class="row"></div>
                        <div class="row">
                          <div class="col s3">
                            <input name="8" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
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
                    </div> <!-- Region 8 -->

                    <div id="region9" class="col s12">
                      <div class="row"></div>
                        <div class="row">
                          <div class="col s3">
                            <input name="9" class="selectAll btn" type="button" id="selectAll" value="Select All"/>
                            
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
                    </div> <!-- Region 9 -->

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

                  </div><!--row-->

        </div> <!-- MODAL CONTENT -->

            <div class="modal-footer">
                  <button class="btn waves-effect waves-light blue darken-2 white-text" type="submit" name="add">
                  <i class="material-icons left">add</i>Add Courier</button>
            </div>
        </form>  
            </div> <!--MODAL BODY-->
      </div>


<!-- EDIT-->


    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4><i class="medium material-icons left">edit</i>Edit</h4>
     <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->
         
          <form class="col s12" action="" method="POST">
          <input type="hidden" name="" value="">
                <div class="row">
                    <div class="input-field col s8">
                      <input id="company_name" value=" " type="text" class="validate" name="add_name" length="30" maxlength="30" REQUIRED>
                      <label for="company_name" class="active">Company Name</label>
                    </div>
                </div>
                
                <div class="row">
                  <div class="col s3">
                    <table style="position:relative; top: -20px;" class="centered">
                      <thead>
                        <tr>
                            <th>Region</th>
                        </tr>
                      </thead>
                      <tbody style="overflow: auto;">
                        @foreach($provinces as $key => $province)
                          <tr>
                            <td>
                              <div class="left">
                                <input type="checkbox" class="filled-in" id="edit_prov{{$key}}" name="edit_prov[]" value="{{$province->ProvinceID}}" />
                                <label for="add_prov{{$key}}">{{$province->ProvinceName}}</label>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="col s6 push-s2">
                    <table style="width: 150px; position:relative; top: -20px;" class="centered">
                      <thead>
                        <tr>
                            <th>Province</th>
                        </tr>
                      </thead>
                      <tbody style="overflow: auto;">
                        <tr>
                          <td>
                            <div class="center">
                              <input type="checkbox" class="filled-in" id="proBox" checked="checked"/>
                              <label for="proBox">ProvinceName</label>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div> 
          </div> <!--*************************** MODAL CONTENT ***************************-->

          <div class="modal-footer">
                <button class="btn-flat blue waves-effect waves-light white-text col s2" type="submit" name="edit">
                <i class="material-icons left">edit</i>Change</button>
          </div>
      </form>
            <script>
                //MODAL
                $(document).ready(function(){
                $('.modal-trigger').leanModal();
              });  
                //SELECT FORM
                $(document).ready(function() {
                  $('select').material_select();
                });

                //TABS
                $(document).ready(function(){
                  $('ul.tabs').tabs();
                });
            </script>
          </div> <!--MODAL BODY-->
      </div>
@endsection