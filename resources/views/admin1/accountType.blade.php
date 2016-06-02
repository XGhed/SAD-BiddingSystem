@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Maintenance</div>
        <a class="item" href="/supplier">
          Supplier
        </a>
        <a class="item" href="/category1">
          Category
        </a>
        <a class="item" href="/item1">
          Item
        </a>
        <a class="active item" href="/accountType1">
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
            Add Account Type
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
              <button class="ui button" type="submit">Add Account Type</button>
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
              <button class="ui button" type="submit">Confirm</button>
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
            <tr>
              <td class="collapsing">
                <div class="ui vertical animated button" tabindex="1" id="editBtn">
                  <div class="hidden content">Edit</div>
                  <div class="visible content">
                    <i class="large edit icon"></i>
                  </div>
                </div>
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">Delete</div>
                  <div class="visible content">
                    <i class="large trash icon"></i>
                  </div>
                </div> 
              </td>
              <td> accounttype </td>
              <td> description </td>
              <td> 5 % </td>
              <td class="collapsing">
                <div class="ui fitted slider checkbox">
                  <input type="checkbox"> <label></label>
                </div>
              </td>
            </tr>
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

  //edit modal
  $(document).ready(function(){
       $('#editBtn').click(function(){
          $('#editModal').modal('show');    
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