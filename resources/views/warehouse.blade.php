@extends('adminParent')


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
            null,
            null,
            null
          ] 
        });
        //$('#tdstatus0').prop('checked', true);
        //alert($('#tdstatus0').val());

        $(":checkbox").click(function(){
          $.get('/status_Supplier?supplierID=' + $(this).val(), function(data){
              //NOTIFICATION HERE MUMING :*
              var toastContent = $('<span>Status Changed!</span>');
                  Materialize.toast(toastContent, 1500, 'edit');
            });
        });
    });

    $(function(){   
        $('#tableOutput').on('click', '.edit', function(){
           $('#modal1').openModal();
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
        $('#modal1').on('change', '#provE', function(){

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
<h2 class="left col s6 push-s1 white-text" style="font-size: 28px">Manage Warehouses</h2>
@endsection





@section('content')
<div class="row"></div>
<a class="modal-trigger waves-effect waves-light right green darken-3 btn z-depth-3" href="#addBtn"><i class="material-icons left">add</i>Add Warehouse</a>


<table class="centered">
        <thead>
          <tr>
              <th>Manage</th>
              <th>Warehouse Number</th>
              <th>Address</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td></td>
          </tr>
        </tbody>
      </table>

<!--***************************ADD BUTTON***************************-->
      <div id="addBtn" class="modal modal-fixed-footer" style="width:800px; height:700px;">
        <div class="modal-content" >
          <h4><i class="medium material-icons left">business</i>Courier Company</h4>

       <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->

        
            
        <form class="col s12" action="/confirmWarehouse" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-field col s4">
				    <select name="add_province" id="prov">
				      <option value="" disabled selected>Choose your Province</option>
              @foreach($provinces as $key => $province)
                <option value="{{$province->ProvinceID}}">{{$province->ProvinceName}}</option>
              @endforeach
				    </select>
				    <label>Choose Province</label>
				</div>

				<div class="input-field col s4">
				    <select name="add_city" id="city" REQUIRED>
              <option value="" disabled selected>City</option>
				    </select>
				    <label>Choose City</label>
				</div>

				<div class="row">
                    <div class="input-field col s8">
                      <input id="" type="text" class="validate" name="add_name" length="30" maxlength="30" REQUIRED>
                      <label for="">Warehouse Address</label>
                    </div>
                </div>

            <div class="modal-footer">
                  <button class="btn waves-effect waves-light green darken-2 white-text" type="submit" name="add">
                  <i class="material-icons left">add</i>Add Warehouse</button>
            </div>
        </form>  
            </div> <!--MODAL BODY-->
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

