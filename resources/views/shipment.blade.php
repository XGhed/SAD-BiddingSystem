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
});

</script>
@endsection


@section('content')
<div class="row"></div>
      <div class="right">
        <a class="waves-effect waves-light blue darken-3 btn z-depth-5" href="/add"><i class="material-icons left">add</i>Add Delivery Company</a>
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
                        <form id="addForm" action="/edit" method="POST">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" id="tdID{{$key}}" name="del_ID" value="{{$result->PartyID}}">
                          <button id="{{$key}}" value="{{$key}}" name="edit" class="edit btn-flat btn-large transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" href='/edit'><i class="material-icons" >edit</i></button>
                        </form>
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
<!-- EDIT-->
    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4><i class="medium material-icons left">edit</i>Edit</h4>
     <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->
         
          <form class="col s12" id="editForm" action="" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="input-field col s8">
                      <input id="company_name" value=" " type="text" class="validate" name="add_name" length="30" maxlength="30">
                      <label for="company_name" class="active">Company Name</label>
                    </div>
                </div>
                

                 <div class="row">
                  <div class="col s12">
                    <ul class="tabs">
                        <li class="tab "><a href="#editRegion1" class="black-text"> 1</a></li>
                        <li class="tab "><a href="#editRegion2" class="black-text"> 2</a></li>
                        <li class="tab "><a href="#editRegion3" class="black-text"> 3</a></li>
                        <li class="tab "><a href="#editRegion4A" class="black-text"> 4A</a></li>
                        <li class="tab "><a href="#editRegion4B" class="black-text"> 4B</a></li>
                        <li class="tab "><a href="#editRegion5" class="black-text"> 5</a></li>
                        <li class="tab "><a href="#editRegion6" class="black-text"> 6</a></li>
                        <li class="tab "><a href="#editRegion7" class="black-text"> 7</a></li>
                        <li class="tab "><a href="#editRegion8" class="black-text"> 8</a></li>
                        <li class="tab "><a href="#editRegion9" class="black-text"> 9</a></li>
                        <li class="tab "><a href="#editRegion10" class="black-text"> 10</a></li>
                        <li class="tab "><a href="#editRegion11" class="black-text"> 11</a></li>
                        <li class="tab "><a href="#editRegion12" class="black-text"> 12</a></li>
                        <li class="tab "><a href="#editRegionNCR" class="black-text"> NCR</a></li>
                        <li class="tab "><a href="#editRegionCAR" class="black-text"> CAR</a></li>
                        <li class="tab "><a href="#editRegionARMM" class="black-text"> ARMM</a></li>
                        <li class="tab "><a href="#editRegion13" class="black-text"> 13</a></li>
                        <li class="tab "><a href="#editRegion18" class="black-text"> 18</a></li>
                    </ul>
                  </div>



                  <div id="editRegion1" class="col s12">
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

                  <div id="editRegion2" class="col s12">
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
                  </div><!-- Region2 -->

                  <div id="editRegion3" class="col s12">
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
                            @if($province->region->RegionID == '3')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 3 -->

                  <div id="editRegion4A" class="col s12">
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
                            @if($province->region->RegionID == '4')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 4A -->

                  <div id="editRegion4B" class="col s12">
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
                            @if($province->region->RegionID == '17')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 4B -->

                  <div id="editRegion5" class="col s12">
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
                            @if($province->region->RegionID == '5')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 5 -->

                  <div id="editRegion6" class="col s12">
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
                            @if($province->region->RegionID == '6')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 6 -->

                  <div id="editRegion7" class="col s12">
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
                            @if($province->region->RegionID == '7')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 7 -->

                  <div id="editRegion8" class="col s12">
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
                            @if($province->region->RegionID == '8')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 8 -->

                  <div id="editRegion9" class="col s12">
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
                            @if($province->region->RegionID == '9')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 9 -->

                  <div id="editRegion10" class="col s12">
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
                            @if($province->region->RegionID == '10')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 10 -->

                  <div id="editRegion11" class="col s12">
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
                            @if($province->region->RegionID == '11')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 11 -->

                  <div id="editRegion12" class="col s12">
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
                            @if($province->region->RegionID == '12')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 12 -->

                  <div id="editRegionNCR" class="col s12">
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
                            @if($province->region->RegionID == '13')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 13 -->

                  <div id="editRegionCAR" class="col s12">
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
                            @if($province->region->RegionID == '14')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 14 -->

                  <div id="editRegionARMM" class="col s12">
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
                            @if($province->region->RegionID == '15')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 15 -->

                  <div id="editRegion13" class="col s12">
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
                            @if($province->region->RegionID == '16')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 13 -->

                  <div id="editRegion18" class="col s12">
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
                            @if($province->region->RegionID == '18')
                              <div class="col s3">
                                <input type="checkbox" name="add_prov[]" class="2" id="{{$province->ProvinceID}}" value="{{$province->ProvinceID}}" />
                                <label for="{{$province->ProvinceID}}" class="black-text">{{$province->ProvinceName}}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                  </div><!-- Region 18 -->

                </div><!-- row -->

          </div> <!-- MODAL CONTENT -->
          <div class="modal-footer">
                <button class="btn-flat blue waves-effect waves-light white-text col s2" type="submit" name="edit">
                <i class="material-icons left">edit</i>Change</button>
          </div>
      </form>
    </div>
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