@extends('admin.adminParent')

@section('title')
Maintenance
@endsection

@section('jqueryscript')
<script type="text/javascript">
    $(function (){   

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
        //$('#tdstatus0').prop('checked', true);
        //alert($('#tdstatus0').val());

        $(":checkbox").click(function(){
          $.get('/status_Warehouse?WarehouseNo=' + $(this).val(), function(data){
              //NOTIFICATION HERE MUMING :*
              var toastContent = $('<span>Status Changed!</span>');
                  Materialize.toast(toastContent, 1500, 'edit');
            });
        });
    });

    $(function(){   
        $('#tableOutput').on('click', '.edit', function(){
            var selected = this.id;
            var keyID = $("#tdID"+selected).val();
            var keyProvince = $("#tdprovince"+selected).val();
            var keyCity = $("#tdcity"+selected).val();
            var keyBarangayStreet = $("#tdbarangaystreet"+selected).val();
            $("#edit_ID").val(keyID);
            $("#provE").val(keyProvince);
            $("#provE").material_select();
            $("#edit_barangaystreet").val(keyBarangayStreet);

            $.get('/cityOptions?provID=' + $("#provE").val(), function(data){
            var $selectDropdown = 
              $("#cityE")
                .empty()
                .html(' ');
            $.each(data, function(index, subcatObj){
                $selectDropdown.append(
                  $("<option></option>")
                    .attr("value",subcatObj.CityID)
                    .text(subcatObj.CityName)
                );
            });
            $("#cityE").val(keyCity);
            $("#cityE").material_select();
            });
        });
    });   

    $(function(){   
        $('#editMdl').on('change', '#provE', function(){

          $.get('/cityOptions?provID=' + $("#provE").val(), function(data){
            var $selectDropdown = 
              $("#cityE")
                .empty()
                .html(' ');
            $.each(data, function(index, subcatObj){
                $selectDropdown.append(
                  $("<option></option>")
                    .attr("value",subcatObj.CityID)
                    .text(subcatObj.CityName)
                );
            });
            $("#cityE").material_select();
          });
        });
    });    

    $(function(){   
        $('#addBtn').on('change', '#prov', function(){

          $.get('/cityOptions?provID=' + $("#prov").val(), function(data){
            var $selectDropdown = 
              $("#city")
                .empty()
                .html(' ');
            $.each(data, function(index, subcatObj){
                $selectDropdown.append(
                  $("<option></option>")
                    .attr("value",subcatObj.CityID)
                    .text(subcatObj.CityName)
                );
            });
            $("#city").material_select();
          });
        });
    });    

    
</script>
@endsection




@section('title1')
<h2>
<a class="left col s6 push-s1 white-text" style="font-size: 28px" href="/supplier">Maintenance /</a>
<a class="col pull-s3 white-text" style="font-size: 28px" href="/warehouse">Warehouse</a>
</h2>
@endsection





@section('content')
<div class="row"></div>
<a class="modal-trigger waves-effect waves-light right blue darken-3 btn z-depth-3" href="#addBtn"><i class="material-icons left">add</i>Add Warehouse</a>


<table id="tableOutput" class="centered">
        <thead>
          <tr>
              <th>Manage</th>
              <th>Warehouse Number</th>
              <th>Address</th>
              <th>Active</th>
          </tr>
        </thead>

        <tbody>
          @foreach($results as $key => $result)
            <tr>
              <td>
                    <div class="row col s12" >
                      <div class="col s4">
                         <button id="{{$key}}" value="{{$key}}" name="edit" class="edit modal-trigger btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-target="editMdl" data-tooltip="Edit" ><i class="material-icons" >edit</i></button>
                          <form action="/confirmWarehouse" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="edit_ID" id="tdID{{$key}}" value="{{$result->WarehouseNo}}">
                      </div>
                      
                      <div class="col s5">
                        <input type="hidden" id="" name="del_ID" value="">
                        <button id="delete" name="delete" class="btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons" onclick="">delete_forever</i></button>
                      </div>
                          </form>
                    </div>
              </td>

              <td>
                {{$result->WarehouseNo}}
              </td>

              <td style="font-size: 14px">
              {{$result->Barangay_Street_Address}},&nbsp; {{$result->city->CityName}},&nbsp; {{$result->city->province->ProvinceName}}
              </td>

              <input type="hidden" id="tdprovince{{$key}}" value="{{$result->city->province->ProvinceID}}" />
              <input type="hidden" id="tdcity{{$key}}" value="{{$result->city->CityID}}" />
              <input type="hidden" id="tdbarangaystreet{{$key}}" value="{{$result->Barangay_Street_Address}}" />

              <td>
                  <div class="switch">
                    <label>
                        @if ($result->Status == 1)
                            <input type="checkbox" id="tdstatus{{$key}}" value="{{$result->WarehouseNo}}" checked>
                        @elseif ($result->Status == 0)
                            <input type="checkbox" id="tdstatus{{$key}}" value="{{$result->WarehouseNo}}" >
                        @endif
                      <span class="lever"></span>
                    </label>
                  </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

<!--ADD MODAL-->
      <div id="addBtn" class="modal modal-fixed-footer" style="width:800px; height:700px;">
        <div class="modal-content" >
          <h4><i class="medium material-icons left">business</i>Courier Company</h4>
          <div class="divider"></div><!-- LINYA LANG-->
          <form class="col s12" action="/confirmWarehouse" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="input-field col s6">
				      <select name="add_province" id="prov">
				        <option value="" disabled selected>Choose your Province</option>
                  @foreach($provinces as $key => $province)
                <option value="{{$province->ProvinceID}}">{{$province->ProvinceName}}</option>
                  @endforeach
				      </select>
				      <label>Choose Province</label>
				    </div>

    				<div class="input-field col s6">
    				    <select name="add_city" id="city" REQUIRED>
                  <option value="" disabled selected>City</option>
    				    </select>
    				    <label>Choose City</label>
    				</div>

				    <div class="row">
              <div class="input-field col s6">
                <input id="" type="text" class="validate" name="add_barangay_street" REQUIRED>
                <label for="">Warehouse Address</label>
              </div>
            </div>  
        </div> <!--MODAL BODY-->
            <div class="modal-footer">
                  <button class="btn waves-effect waves-light green darken-2 white-text" type="submit" name="add">
                  <i class="material-icons left">add</i>Add Warehouse</button>
            </div>
            </form>
      </div>

<!--EDIT MODAL-->
      <div id="editMdl" class="modal modal-fixed-footer" style="width:800px; height:700px;">
        <div class="modal-content" sty>
          <h4><i class="medium material-icons left">business</i>Courier Company</h4>
          <div class="divider"></div><!-- LINYA LANG-->
          <form class="col s12" action="/confirmWarehouse" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="edit_ID" name="edit_ID">

            <div class="input-field col s6">
              <select name="add_province" id="provE">
                <option value="" disabled selected>Choose your Province</option>
                  @foreach($provinces as $key => $province)
                <option value="{{$province->ProvinceID}}">{{$province->ProvinceName}}</option>
                  @endforeach
              </select>
              <label>Choose Province</label>
            </div>

            <div class="input-field col s6">
                <select name="edit_city" id="cityE" REQUIRED>
                  <option value="" disabled selected>City</option>
                </select>
                <label>Choose City</label>
            </div>

            <div class="row">
              <div class="input-field col s8">
                <input id="edit_barangaystreet" type="text" class="validate active" value=" " name="edit_barangaystreet" REQUIRED>
                <label for="">Warehouse Address</label>
              </div>
            </div>  
        </div> <!--MODAL BODY-->
            <div class="modal-footer">
                  <button class="btn waves-effect waves-light green darken-2 white-text" type="submit" name="edit">
                  <i class="material-icons left">done</i>Change</button>
            </div>
            </form>
      </div>


<script>
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });

$(document).ready(function() {
    $('select').material_select();
  });
</script>



@endsection

