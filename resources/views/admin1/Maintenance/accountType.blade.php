@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Maintenance.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <a class="ui basic blue button" id="addBtn">
            <i class="add user icon"></i>
            Add Account Type
          </a>

        @include('admin1.Maintenance.alerts')

          <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Add Account Type
            </div>
            <div class="content">
              <form class="ui form" action="/confirmAccountType" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="ten wide required field">
                  <label>Account Type</label>
                  <input type="text" name="add_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                </div>
                
                <div class="ten wide required field">
                  <div class="field">
                    <label>Service Fee</label>
                    <input type="number" name="add_tax" placeholder="percentage">
                  </div>
                </div>

                <div class="required field">
                  <div class="field">
                    <labe>Description</labe>
                    <input type="text" name="add_desc" placeholder="description">
                  </div>
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit" name="add">Add Account Type</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!--edit modal -->
        <div class="ui small modal" id="editModal">
          <i class="close icon"></i>
            <div class="header">
              Edit Account Type
            </div>
            <div class="content">
              <form class="ui form" action="/confirmAccountType" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="edit_ID" id="edit_ID">
                <div class="ten wide required field">
                  <label>Account Type</label>
                  <input type="text" id="edit_name"  name="edit_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                </div>
                
                <div class="ten wide required field">
                  <div class="field">
                    <label>Service Fee</label>
                    <input type="number" id="edit_tax"  name="edit_tax" placeholder="percentage">
                  </div>
                </div>

                <div class="required field">
                  <div class="field">
                    <labe>Description</labe>
                    <input type="text"id="edit_desc" name="edit_desc" placeholder="description">
                  </div>
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit" name="edit">Confirm</button>
              </form>
            </div>
        </div>
          <!-- END edit modal -->

          <!-- table -->
        <table class="ui compact celled definition table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Account Type</th>
              <th>Description</th>
              <th>Service Fee</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
           <div id="formOutput" value="asd">
            @foreach($results as $key => $result)
              <tr>
                <td class="collapsing">
                  <div class="edit ui vertical animated button" tabindex="" id="{{$key}}" value="{{$key}}" name="edit">
                    <div class="hidden content">Edit</div>
                    <div class="visible content">
                      <i class="large edit icon"></i>
                    </div>
                  </div>
                  <form action="confirmAccountType" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <input type="hidden" name="del_ID" id="tdID{{$key}}" value="{{$result->AccountTypeID}}">
                    <button id="delete" name="delete" type="submit" class="ui large vertical animated button">
                      <div class="hidden content">Delete</div>
                      <div class="visible content">
                        <i class="trash icon"></i>
                      </div>
                    </button>
                  </form>
                </td>
                <td id="tdname{{$key}}">{{$result->AccountTypeName}}</td>
                <td id="tddesc{{$key}}">{{$result->Description}}</td>
                <td>{{$result->ServiceFee}}</td>
                <input type="hidden" id="tdtax{{$key}}" value="{{$result->ServiceFee}}" />
                <td class="collapsing">
                  <div class="ui fitted slider checkbox">
                    @if ($result->Status == 1)
                        <input type="checkbox" id="tdstatus{{$key}}" value="{{$result->AccountTypeID}}" checked>
                    @elseif ($result->Status == 0)
                        <input type="checkbox" id="tdstatus{{$key}}" value="{{$result->AccountTypeID}}" >
                    @endif <label></label>
                  </div>
                </td>
              </tr>
            @endforeach
            </div>
          </tbody>
        </table>
    </div>
  </div>
</div>


<script>

  //add modal
  $(document).ready(function(){
       $('#addBtn').click(function(){
          $('#addModal').modal('show');    
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

$(function(){   

    $("#tableOutput").DataTable({
      "lengthChange": false,
      "pageLength": 3,
      "columns": [
        { "searchable": false },
        null,
        null,
        null,
        null
      ] 
    });

    $(":checkbox").click(function(){
          $.get('/status_AccountType?accounttypeID=' + $(this).val(), function(data){
              //NOTIFICATION HERE MUMING :*
              var toastContent = $('<span>Status Changed!</span>');
                  Materialize.toast(toastContent, 1500, 'edit');
            });
        });
});

//edit modal
$(function(){   
    $('#tableOutput').on('click', '.edit', function(){
      $('#editModal').modal('show');
      var selected = this.id;
      var keyID = $("#tdID"+selected).val();
      var keyName = $("#tdname"+selected).text();
      var keyDesc = $("#tddesc"+selected).text();
      var keyTax = $("#tdtax"+selected).val();
      $("#edit_ID").val(keyID);
      $("#edit_name").val(keyName);
      $("#edit_desc").val(keyDesc);
      $("#edit_tax").val(keyTax);
    });
});
</script>
@endsection