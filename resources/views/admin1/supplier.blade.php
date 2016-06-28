@extends('admin1.mainteParent')

@section('jqueryscript')
  <script type="text/javascript">/*
      $(function (){

          
          $(":checkbox").click(function(){
            $.get('/status_Supplier?supplierID=' + $(this).val(), function(data){
                //NOTIFICATION HERE MUMING :*
                var toastContent = $('<span>Status Changed!</span>');
                    Materialize.toast(toastContent, 1500, 'edit');
              });
          });
      });
{
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
          }
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
*/

      /*
  </script>
@endsection

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Maintenance</div>
        <a class=" active item" href="/supplier1">
          Supplier
        </a>
        <a class="item" href="/category1">
          Category
        </a>
        <a class="item" href="/item1">
          Item
        </a>
        <a class="item" href="/accountType1">
          Account Type
        </a>
        <a class="item" href="/discount1">
          Discount
        </a>
        <a class="item" href="/shipment1">
          Shipment
        </a>
        <a class="item" href="/warehouse1">
          Warehouse
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <a class="ui basic blue button" id="addBtn">
            <i class="add user icon"></i>
            Add supplier
          </a>

          <!-- status -->
        <div class="ui success message">
          <i class="close icon"></i>
          <div class="header">
            Status Changed
          </div>
        </div>

          <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Add Supplier
            </div>
            <div class="content">
              <form class="ui form" action="/confirmSupplier" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="seven wide required field">
                  <label>Supplier Name</label>
                  <input type="text" name="add_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                </div>

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">Province</div>
                      <select name="add_province" id="prov" class="ui search selection dropdown" onchange="provChange()" REQUIRED>
                        <option value="" disabled selected>Province</option>
                        @foreach($provinces as $key => $province)
                          <option value="{{$province->ProvinceID}}">{{$province->ProvinceName}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="field">
                    <div class="ui sub header">City</div>
                      <select name="add_city" id="city" class="ui search selection dropdown" REQUIRED>
                        <option value="" disabled selected>City</option>
                          
                      </select>
                  </div>
                  <div class="field">
                    <div class="ui sub header">Address</div>
                    <input type="text" id="add_barangay" name="add_barangay_street" placeholder="#4 Wednesday St. Pacita 1 Brgy. San Vicente" required>
                  </div>
                </div>
                
                <div class="equal width required fields">
                  <div class="field">
                    <label>Email Address</label>
                    <input type="email" id="eAddress" name="add_email" placeholder="XXXXXX@yahoo.com" required>
                  </div>
                  <div class="field">
                    <label>Cellphone Number</label>
                    <input type="text" id="contact_num" name="add_contactNo" pattern="([0-9 '.]){2,}" placeholder="+639 XX XXX XXXX">
                  </div>
                </div>
            </div>
            <div class="actions">
              <button class="ui button" name="add" type="submit">Confirm</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!--edit modal -->
        <div class="ui small modal" id="editModal">
          <i class="close icon"></i>
          <div class="header">
          Edit Supplier
          </div>
          <div class="content">
            <form class="ui form" action="/confirmSupplier" method="POST">
              <input type="hidden" id="edit_ID" name="edit_ID">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="seven wide required field">
                <label>Supplier Name</label>
                <input type="text" name="edit_name" id="edit_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
              </div>

              <div class="equal width fields">
                <div class="field">
                  <div class="ui sub header">Province</div>
                  <select name="edit_province" class="ui search selection dropdown" id="provE" required>
                    <option value="" disabled selected>Province</option>
                    @foreach($provinces as $key => $province)
                      <option value="{{$province->ProvinceID}}">{{$province->ProvinceName}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="field">
                  <div class="ui sub header">City</div>
                  <select name="edit_city" class="ui search selection dropdown" id="cityE" required>
                    <option value="" disabled selected>City</option>
                    
                  </select>
                </div>
                  <div class="field">
                    <div class="ui sub header">Address</div>
                    <input type="text" name="edit_barangaystreet" id="edit_barangaystreet" placeholder="#4 Wednesday St. Pacita 1 Brgy. San Vicente" required>
                  </div>
                </div>
                
                <div class="equal width required fields">
                  <div class="field">
                    <label>Email Address</label>
                    <input type="email" name="edit_email" id="edit_email" placeholder="XXXXXX@yahoo.com" required>
                  </div>
                  <div class="field">
                    <label>Cellphone Number</label>
                    <input type="text" name="edit_contactNo" id="edit_contactNo" pattern="([0-9 '.]){2,}" placeholder="+639 XX XXX XXXX">
                  </div>
                </div>
          </div>
            <div class="actions">
              <div class="ui button">Cancel</div>
              <button class="ui button" type="submit" name="edit">Submit</button>
            </form>
            </div>
        </div>
          <!-- END edit modal -->

          <!-- table -->
        <table class="ui compact celled definition table" cellspacing="0" width="100%" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Name</th>
              <th>Address</th>
              <th>Contact Number</th>
              <th>Email Address</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($results as $key => $result)
              <tr class="collapsing">
                <td>
                  <div class="edit ui vertical animated button" tabindex="1" id="{{$key}}" value="{{$key}}" name="edit">
                    <div class="hidden content">Edit</div>
                    <div class="visible content">
                      <i class="large edit icon"></i>
                    </div>
                  </div>
                  <form action="confirmSupplier" method="POST"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="edit_ID" id="tdID{{$key}}" value="{{$result->SupplierID}}">
                    <button id="delete" name="delete" type="submit" >Delete</button>
                  </form>
                </td>
                <td id="tdname{{$key}}" style="font-size: 14px">{{$result->SupplierName}}</td>
                <td style="font-size: 14px">{{$result->Barangay_Street_Address}},&nbsp; {{$result->city->CityName}},&nbsp; {{$result->city->province->ProvinceName}} </td>
                <td id="tdcontactno{{$key}}" style="font-size: 14px">{{$result->SupplierContactNo}}</td>
                <td id="tdemail{{$key}}" style="font-size: 14px">{{$result->SupplierEmail}}</td>
                <input type="hidden" id="tdprovince{{$key}}" value="{{$result->city->province->ProvinceID}}" >
                <input type="hidden" id="tdcity{{$key}}" value="{{$result->city->CityID}}" >
                <input type="hidden" id="tdbarangaystreet{{$key}}" value="{{$result->Barangay_Street_Address}}" >
                <td class="collapsing">
                  <div class="ui fitted slider checkbox">
                    @if ($result->Status == 1)
                        <input type="checkbox" id="tdstatus{{$key}}" value="{{$result->SupplierID}}" checked>
                    @elseif ($result->Status == 0)
                        <input type="checkbox" id="tdstatus{{$key}}" value="{{$result->SupplierID}}" >
                    @endif <label></label>
                  </div>
                </td>
            </tr>
          @endforeach
          </tbody>
        </table>
    </div>
  </div>
</div>


<script>

  $(document).ready(function(){
    $('#prov').dropdown();

    $('#tableOutput').DataTable({
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

    $(":checkbox").click(function(){
      $.get('/status_Supplier?supplierID=' + $(this).val(), function(data){
          //NOTIFICATION HERE MUMING :*
          alert('success');
        });
    });
  });

  function provChange(){
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
    });
  } 

  //add modal
  $(document).ready(function(){
       $('#addBtn').click(function(){
          $('#addModal').modal('show');    
       });
  });

  //edit modal
  $(document).ready(function(){
       $('.edit').click(function(){
          $('#editModal').modal('show');
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
          });
       });
  });

  //address
  $('.ui.normal.dropdown')
    .dropdown();

  //message
  $('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  })
;
</script>
@endsection