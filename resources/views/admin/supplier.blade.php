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
              var keyName = $("#tdname"+selected).text();
              var keyProvince = $("#tdprovince"+selected).val();
              var keyCity = $("#tdcity"+selected).val();
              var keyBarangayStreet = $("#tdbarangaystreet"+selected).val();
              var keyContactNo = $("#tdcontactno"+selected).text();
              var keyEmail = $("#tdemail"+selected).text();
              $("#edit_ID").val(keyID);
              $("#edit_name").val(keyName);
              $("#provE").val(keyProvince);
              $("#provE").material_select();
              $("#edit_contactNo").val(keyContactNo);
              $("#edit_barangaystreet").val(keyBarangayStreet);
              $("#edit_email").val(keyEmail);

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
<h2>
<a class="left col s6 push-s1 white-text" style="font-size: 28px" href="/supplier">Maintenance /</a>
<a class="col pull-s3 white-text" style="font-size: 28px" href="/supplier">Suppliers</a>
</h2>
@endsection


@section('content')
<div class="row"></div>
      <div class="right">
        <a class="modal-trigger waves-effect waves-light blue darken-2 btn z-depth-5" href="#addBtn"><i class="material-icons left">add</i>Add Supplier</a>
      </div>
        <!-- DATA TABLE -->
      <table class="highlight responsive-table centered" id="tableOutput">
        <thead>
          <tr>
              <th style="cursor: default;">Manage</th>
              <th>Name</th>
              <th>Address</th>
              <th>Contact number</th>
              <th>Email Address</th>
              <th>Status</th>
          </tr>
        </thead>

        <tbody>
        <div id="formOutput" value="asd">
          @foreach($results as $key => $result)
            <tr>
              <td>
                    <div class="row col s12" >
                      <div class="col s4">
                         <button id="{{$key}}" value="{{$key}}" name="edit" class="edit btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons" >edit</i></button>
                          <form action="confirmSupplier" method="POST"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <input type="hidden" name="edit_ID" id="tdID{{$key}}" value="{{$result->SupplierID}}">
                        </div>
                      
                      <div class="col s5">
                        <input type="hidden" id="" name="del_ID" value="">
                        <button id="delete" name="delete" class="btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons" onclick="">delete_forever</i></button>
                      </div>
                      </form>
                    </div>
              </td>
              <td id="tdname{{$key}}" style="font-size: 14px">{{$result->SupplierName}}</td>
              <td style="font-size: 14px">{{$result->Barangay_Street_Address}},&nbsp; {{$result->city->CityName}},&nbsp; {{$result->city->province->ProvinceName}} </td>
              <td id="tdcontactno{{$key}}" style="font-size: 14px">{{$result->SupplierContactNo}}</td>
              <td id="tdemail{{$key}}" style="font-size: 14px">{{$result->SupplierEmail}}</td>
              <input type="hidden" id="tdprovince{{$key}}" value="{{$result->city->province->ProvinceID}}" >
              <input type="hidden" id="tdcity{{$key}}" value="{{$result->city->CityID}}" >
              <input type="hidden" id="tdbarangaystreet{{$key}}" value="{{$result->Barangay_Street_Address}}" >
              <td>
                  <div class="switch">
                    <label>
                      Active
                        @if ($result->Status == 1)
                            <input type="checkbox" id="tdstatus{{$key}}" value="{{$result->SupplierID}}" checked>
                        @elseif ($result->Status == 0)
                            <input type="checkbox" id="tdstatus{{$key}}" value="{{$result->SupplierID}}" >
                        @endif
                      <span class="lever"></span>
                      Inactive
                    </label>
                  </div>
              </td>
            </tr>
          @endforeach
            </div>
        </tbody>
      </table>



 
<!--***************************ADD BUTTON***************************-->
      <div id="addBtn" class="modal modal-fixed-footer">
        <div class="modal-content" >
          <h4><i class="medium material-icons left">face</i>Add Supplier</h4>

       <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->

        
            
        <form class="col s12" action="/confirmSupplier" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="input-field col s8">
                      <input id="supplier_name" type="text" class="validate" name="add_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                      <label for="supplier_name" data-error="Invalid">Supplier's Name</label>
                    </div>
                </div>

                <div class="row col s12">
                    <div class="input-field col s3">
                      <select name="add_province" id="prov" REQUIRED>
                        <option value="" disabled selected>Province</option>
                        @foreach($provinces as $key => $province)
                          <option value="{{$province->ProvinceID}}">{{$province->ProvinceName}}</option>
                        @endforeach
                      </select>
                      <label>Province</label>
                    </div>

                    <div class="input-field col s3">
                      <select name="add_city" id="city" REQUIRED>
                        <option value="" disabled selected>City</option>
                        
                      </select>
                      <label>City/Municipality</label>
                    </div>

                      <div class="input-field col s6">
                        <input id="add_barangay" type="text" class="validate" name="add_barangay_street" length="50" maxlength="50" pattern="([A-z ,-#.]){2,}" REQUIRED>
                        <label for="add_barangay" data-error="Invalid">Brgy and Street Address</label>
                      </div>
                </div>

                <div class="row">
                    <div class="input-field col s4">
                      <input id="contact_num" type="text" class="validate" name="add_contactNo" length="15" maxlength="15" pattern="(^09)+(+[0-9]){11,15}" REQUIRED>
                      <label for="contact_num" data-error="Invalid">Contact Number</label>
                    </div>

                    <div class="input-field col s8">
                      <input id="eAddress" type="email" class="validate" name="add_email" length="30" maxlength="30" REQUIRED>
                      <label for="eAddress" data-error="Invalid">Email Address</label>
            
                </div>
              </div><!--*************************** ROW ***************************-->
            </div> <!--*************************** MODAL CONTENT ***************************-->

            <div class="modal-footer">
                  <button class="btn waves-effect waves-light blue darken-2 darken-2 white-text" type="submit" name="add">
                  <i class="material-icons left">add</i>Add Supplier</button>
            </div>
        </form>  
            </div> <!--MODAL BODY-->



<!-- ***************************************************EDIT**************************************-->

    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4><i class="medium material-icons left">edit</i>Edit</h4>
     <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->
         
          <form class="col s12" action="/confirmSupplier" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="edit_ID" name="edit_ID">
              <div class="row">
                  <div class="input-field col s8">
                    <input value=" " id="edit_name" type="text" class="validate" name="edit_name" length="30" maxlength="30" pattern="([A-z '.-]){2,}" REQUIRED>
                    <label class="active" for="edit_name" >Supplier's Name</label>
                  </div>
              </div>

              <div class="row">
                  <div class="input-field col s3">
                      <select name="edit_province" id="provE" required>
                        <option value="" disabled selected>Province</option>
                        @foreach($provinces as $key => $province)
                          <option value="{{$province->ProvinceID}}">{{$province->ProvinceName}}</option>
                        @endforeach
                      </select>
                      <label>Province</label>
                    </div>

                  <div class="input-field col s3">
                      <select name="edit_city" id="cityE" required>
                        <option value="" disabled selected>City</option>
                        
                      </select>
                      <label>City/Municipality</label>
                    </div>

                  <div class="input-field col s6">
                    <input  value=" " id="edit_barangaystreet" type="text" class="validate" name="edit_barangaystreet" length="50" maxlength="50" pattern="([A-z ,-#.]){2,}" REQUIRED>
                    <label class="active" for="edit_barangaystreet">Brgy and Street Address</label>
                  </div>
              </div>

              <div class="row">
                  <div class="input-field col s4">
                    <input value =" " type="text" class="validate" id="edit_contactNo" name="edit_contactNo" length="15" maxlength="15" pattern="(^09)+(+[0-9]){11,15}" REQUIRED>
                    <label class="active" for="edit_contactNo">Contact Number</label>
                  </div>

                  <div class="input-field col s8">
                    <input value ="0" type="email" class="validate" id="edit_email" name="edit_email" length="30" maxlength="30" REQUIRED>
                    <label class="active" for="edit_email">Email Address</label>
                </div>
              
            </div><!--*************************** ROW ***************************-->
          </div> <!--*************************** MODAL CONTENT ***************************-->

          <div class="modal-footer">
                <button class="btn-flat blue darken-2 waves-effect waves-light white-text col s2" type="submit" name="edit">
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

            </script>
          </div> <!--MODAL BODY-->
      </div>


      
@endsection