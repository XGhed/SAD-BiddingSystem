@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Maintenance.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <a class="ui basic blue button" id="addBtn">
            <i class="add square icon"></i>
            Add warehouse
          </a>

          <!-- status -->
        @include('admin1.Maintenance.alerts')

          <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="ui centered header">
              Add warehouse
            </div>
            <div class="content">
              <form class="ui form" action="/confirmWarehouse" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">Province</div>
                    <select name="add_province" id="prov" class="ui search selection dropdown" style="height:45px">
                      <option value="" disabled selected>Choose your Province</option>
                        @foreach($provinces as $key => $province)
                          <option value="{{$province->ProvinceID}}">{{$province->ProvinceName}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="field">
                    <div class="ui sub header">City</div>
                    <select name="add_city" id="city" class="ui search selection dropdown" style="height:45px" REQUIRED>
                      <option value="" disabled selected>City</option>
                    </select>
                  </div>
                </div>
                  
                <div class="nine wide required field">
                  <label>Warehouse Address</label>
                  <input type="text" name="add_barangay_street" REQUIRED>
                </div>
            </div>
            <div class="actions">
              <button class="ui blue button" type="submit" name="add"><i class="checkmark icon"></i> Add Warehouse</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!--edit modal -->
        <div class="ui small modal" id="editModal">
          <i class="close icon"></i>
            <div class="ui centered header">
              Edit Warehouse
            </div>
            <div class="content">
              <form class="ui form" action="/confirmWarehouse" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="edit_ID" name="edit_ID">

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">Province</div>
                    <select name="add_province" id="provE" class="ui search selection dropdown" style="height:45px">
                      <option value="" disabled selected>Choose your Province</option>
                        @foreach($provinces as $key => $province)
                          <option value="{{$province->ProvinceID}}">{{$province->ProvinceName}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="field">
                    <div class="ui sub header">City</div>
                    <select name="edit_city" id="cityE" class="ui search selection dropdown" style="height:45px" REQUIRED>
                      <option value="" disabled selected>City</option>
                    </select>
                  </div>
                </div>
                  
                <div class="nine wide required field">
                  <label>Warehouse Address</label>
                  <input type="text" id="edit_barangaystreet" name="edit_barangaystreet" length="30" maxlength="30" REQUIRED>
                </div>
            </div>
            <div class="actions">
              <button class="ui blue button" type="submit" name="edit"><i class="checkmark icon"></i> Confirm</button>
              </form>
            </div>
        </div>
          <!-- END edit modal -->

          <!-- table -->
        <table class="ui compact inverted celled definition table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Warehouse Number</th>
              <th>Address</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($results as $key => $result)
            <tr>
              <td class="collapsing">
                      <form action="/confirmWarehouse" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="edit_ID" id="tdID{{$key}}" value="{{$result->WarehouseNo}}">
                        <div class="edit green basic ui vertical animated button" tabindex="1" id="{{$key}}" value="{{$key}}">
                          <div class="hidden content">Edit</div>
                          <div class="visible content">
                            <i class="large edit icon"></i>
                          </div>
                        </div>
                    <input type="hidden" id="" name="del_ID" value="">
                    <button id="delete" name="delete" class="ui red basic large vertical animated button">
                      <div class="hidden content">Delete</div>
                      <div class="visible content">
                        <i class="trash icon"></i>
                      </div>
                    </button>
                      </form>
              </td>
              <td>{{$result->WarehouseNo}}</td>
              <td>{{$result->Barangay_Street_Address}},&nbsp; {{$result->city->CityName}},&nbsp; {{$result->city->province->ProvinceName}}</td>
              <input type="hidden" id="tdprovince{{$key}}" value="{{$result->city->province->ProvinceID}}" />
              <input type="hidden" id="tdcity{{$key}}" value="{{$result->city->CityID}}" />
              <input type="hidden" id="tdbarangaystreet{{$key}}" value="{{$result->Barangay_Street_Address}}" />
              <td class="collapsing">
                <div class="ui fitted slider checkbox">
                  @if ($result->Status == 1)
                      <input type="checkbox" id="tdstatus{{$key}}" value="{{$result->WarehouseNo}}" checked>
                  @elseif ($result->Status == 0)
                      <input type="checkbox" id="tdstatus{{$key}}" value="{{$result->WarehouseNo}}" >
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
          alert('success');
        });
    });

    $('#prov').change(function(){
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
    });

    $('#provE').change(function(){
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
      });
    });
  });

  //add modal
  $(document).ready(function(){
       $('#addBtn').click(function(){
          $('#addModal').modal('show');    
       });
  });

  //edit modal
  $(document).ready(function(){
    $('#tableOutput').on('click', '.edit', function(){
      $('#editModal').modal('show');    
      var selected = this.id;
      var keyID = $("#tdID"+selected).val();
      var keyProvince = $("#tdprovince"+selected).val();
      var keyCity = $("#tdcity"+selected).val();
      var keyBarangayStreet = $("#tdbarangaystreet"+selected).val();
      $("#edit_ID").val(keyID);
      $("#provE").val(keyProvince);
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
      });
    });
  });

  //message
  $('.cookie.nag')
  .nag({
    key      : 'accepts-cookies',
    value    : true
  })
;
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