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
                          <form action="confirmShipment" method="POST"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                      
                      <div class="col">
                        <input type="hidden" id="tdID{{$key}}" name="del_ID" value="{{$result->PartyID}}">
                        <button id="{{$key}}" value="{{$key}}" name="edit" class="edit btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons" >edit</i></button>
                        <button id="delete" name="delete" class="btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons" onclick="">delete</i></button>
                      </div>
                      </form>
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



 
<!--***************************ADD BUTTON***************************-->
      <div id="addBtn" class="modal modal-fixed-footer" style="width:800px; height:700px;">
        <div class="modal-content" >
          <h4><i class="medium material-icons left">business</i>Courier Company</h4>

       <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->

        
            
        <form class="col s12" action="/confirmShipment" method="POST"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="input-field col s8">
                      <input id="company_name" type="text" class="validate" name="add_name" length="30" maxlength="30" REQUIRED>
                      <label for="company_name">Company Name</label>
                    </div>
                </div>

                
                  <div class="row">
                    <div class="col s12">Regions:
                      <ul class="tabs">
                        <li class="tab "><a href="#test1" class="black-text"> 1</a></li>
                        <li class="tab "><a href="#test2" class="black-text"> 2</a></li>
                        <li class="tab "><a href="#test3" class="black-text"> 3</a></li>
                        <li class="tab "><a href="#test4A" class="black-text"> 4A</a></li>
                        <li class="tab "><a href="#test4B" class="black-text"> 4B</a></li>
                        <li class="tab "><a href="#test5" class="black-text"> 5</a></li>
                        <li class="tab "><a href="#test6" class="black-text"> 6</a></li>
                        <li class="tab "><a href="#test7" class="black-text"> 7</a></li>
                        <li class="tab "><a href="#test8" class="black-text"> 8</a></li>
                        <li class="tab "><a href="#test9" class="black-text"> 9</a></li>
                        <li class="tab "><a href="#test10" class="black-text"> 10</a></li>
                        <li class="tab "><a href="#test11" class="black-text"> 11</a></li>
                        <li class="tab "><a href="#test12" class="black-text"> 12</a></li>
                        <li class="tab "><a href="#test13" class="black-text"> 13</a></li>
                        <li class="tab "><a href="#test14" class="black-text"> 14</a></li>
                        <li class="tab "><a href="#test15" class="black-text"> 15</a></li>
                        <li class="tab "><a href="#test18" class="black-text"> 18</a></li>
                        <li class="tab "><a href="#NCR" class="black-text"> NCR</a></li>
                        <div class="row"></div>
                      </ul>
                    </div>

                    <div id="test1" class="col s12">
                      <div class="row"></div>
                      <form action="#">
                          <div class="row">
                            <div class="col s3">
                              <input name="group1" type="radio" id="selectAll" />
                              <label for="selectAll" class="black-text">Select All</label>
                            </div>

                            <div class="col s6">
                              <input name="group1" type="radio" id="deselectAll" />
                              <label for="deselectAll" class="black-text">Deselect All</label>
                            </div>
                          </div>

                        <div class="row">
                          <div class="col s3">
                            <input type="checkbox" id="test5" />
                            <label for="test5" class="black-text">Ilocos Norte</label>
                          </div>

                          <div class="col s3">
                            <input type="checkbox" id="test6" />
                            <label for="test6" class="black-text">Ilocos Sur</label>
                          </div>

                          <div class="col s3">
                            <input type="checkbox" id="test7" />
                            <label for="test7" class="black-text">La Union</label>
                          </div>

                          <div class="col s3">
                            <input type="checkbox" id="test8" />
                            <label for="test8" class="black-text">Pangasinan</label>
                          </div>
                        </div>
                      </form>  
                    </div><!-- Region1 -->

                    <div id="test2" class="col s12">
                      <div class="row"></div>
                      <form action="#">
                          <div class="row">
                            <div class="col s3">
                              <input name="group1" type="radio" id="selectAll1" />
                              <label for="selectAll1" class="black-text">Select All</label>
                            </div>

                            <div class="col s6">
                              <input name="group1" type="radio" id="deselectAll1" />
                              <label for="deselectAll1" class="black-text">Deselect All</label>
                            </div>
                          </div>

                        <div class="row">
                          <div class="col s3">
                            <input type="checkbox" id="test9" />
                            <label for="test9" class="black-text">Batanes</label>
                          </div>

                          <div class="col s3">
                            <input type="checkbox" id="test10" />
                            <label for="test10" class="black-text">Cagayan</label>
                          </div>

                          <div class="col s3">
                            <input type="checkbox" id="test11" />
                            <label for="test11" class="black-text">Isabela</label>
                          </div>

                          <div class="col s3">
                            <input type="checkbox" id="test12" />
                            <label for="test12" class="black-text">Nueva Vizcaya</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s3">
                            <input type="checkbox" id="test13" />
                            <label for="test13" class="black-text">Quirino</label>
                          </div>
                        </div>
                      </form>
                    </div> <!-- Region 2 -->

                    <div id="test3" class="col s12">
                      <div class="row"></div>
                      <form action="#">
                          <div class="row">
                            <div class="col s3">
                              <input name="group1" type="radio" id="selectAll2" />
                              <label for="selectAll2" class="black-text">Select All</label>
                            </div>

                            <div class="col s6">
                              <input name="group1" type="radio" id="deselectAll2" />
                              <label for="deselectAll2" class="black-text">Deselect All</label>
                            </div>
                          </div>

                        <div class="row">
                          <div class="col s3">
                            <input type="checkbox" id="test14" />
                            <label for="test9" class="black-text">Batanes</label>
                          </div>

                          <div class="col s3">
                            <input type="checkbox" id="test15" />
                            <label for="test10" class="black-text">Cagayan</label>
                          </div>

                          <div class="col s3">
                            <input type="checkbox" id="test16" />
                            <label for="test11" class="black-text">Isabela</label>
                          </div>

                          <div class="col s3">
                            <input type="checkbox" id="test17" />
                            <label for="test12" class="black-text">Nueva Vizcaya</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s3">
                            <input type="checkbox" id="test18" />
                            <label for="test13" class="black-text">Quirino</label>
                          </div>
                        </div>
                      </form>
                    </div> <!-- Region 2 -->

                  </div>
  
             
        </div> <!-- MODAL CONTENT -->

            <div class="modal-footer">
                  <button class="btn waves-effect waves-light blue darken-2 white-text" type="submit" name="add">
                  <i class="material-icons left">add</i>Add Courier</button>
            </div>
        </form>  
            </div> <!--MODAL BODY-->
      </div>


<!-- ***************************************************EDIT**************************************-->


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