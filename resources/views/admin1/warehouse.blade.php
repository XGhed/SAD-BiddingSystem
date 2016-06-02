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
        <a class="item" href="/accountType1">
          Account Type
        </a>
        <a class="item" href="/discount1">
          Discount
        </a>
        <a class="item" href="/shipment1">
          Shipment
        </a>
        <a class="active item" href="/warehouse1">
          Warehouse
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <a class="ui basic blue button" id="addBtn">
            <i class="add user icon"></i>
            Add warehouse
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
              Add warehouse
            </div>
            <div class="content">
              <form class="ui form" action="/confirmSupplier" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">Province</div>
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="province" REQUIRED>
                        <i class="dropdown icon"></i>
                      <div class="default text">Select Province</div>
                        <div class="menu">
                          <div class="item" value="0">Santiago</div>
                          <div class="item" value="1">Roxas</div>
                          <div class="item" value="2">Duterte</div>
                        </div>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui sub header">City</div>
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="city" REQUIRED>
                        <i class="dropdown icon"></i>
                      <div class="default text">Select City</div>
                        <div class="menu">
                          <div class="item" value="0">Santiago</div>
                          <div class="item" value="1">Roxas</div>
                          <div class="item" value="2">Duterte</div>
                        </div>
                    </div>
                  </div>
                </div>
                  
                <div class="seven wide required field">
                  <label>Warehouse Address</label>
                  <input type="text" name="add_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit">Add</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!--edit modal -->
        <div class="ui small modal" id="editModal">
          <i class="close icon"></i>
            <div class="header">
              Edit Warehouse
            </div>
            <div class="content">
              <form class="ui form" action="/confirmSupplier" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">Province</div>
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="province" REQUIRED>
                        <i class="dropdown icon"></i>
                      <div class="default text">Select Province</div>
                        <div class="menu">
                          <div class="item" value="0">Santiago</div>
                          <div class="item" value="1">Roxas</div>
                          <div class="item" value="2">Duterte</div>
                        </div>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui sub header">City</div>
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="city" REQUIRED>
                        <i class="dropdown icon"></i>
                      <div class="default text">Select City</div>
                        <div class="menu">
                          <div class="item" value="0">Santiago</div>
                          <div class="item" value="1">Roxas</div>
                          <div class="item" value="2">Duterte</div>
                        </div>
                    </div>
                  </div>
                </div>
                  
                <div class="seven wide required field">
                  <label>Warehouse Address</label>
                  <input type="text" name="add_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit">Add</button>
              </form>
            </div>
        </div>
          <!-- END edit modal -->

          <!-- table -->
        <table class="ui compact celled definition table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Warehouse Number</th>
              <th>Address</th>
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
              <td> 0123 </td>
              <td>September 14, 2013</td>
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