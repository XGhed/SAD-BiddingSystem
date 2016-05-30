@extends('admin.mainteParent')

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Maintenance</div>
        <a class=" active item" href="/supplier">
          Supplier
        </a>
        <a class="item">
          Category
        </a>
        <a class="item">
          Item
        </a>
        <a class="item">
          Account Type
        </a>
        <a class="item">
          Discount
        </a>
        <a class="item">
          Shipment
        </a>
        <a class="item">
          Warehouse
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <a class="ui basic button" id="addBtn">
            <i class="add user icon"></i>
            Add supplier
          </a>

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
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="province" REQUIRED>
                        <i class="dropdown icon"></i>
                      <div class="default text">Select Province</div>
                        <div class="menu">
                          <div class="item" value="0">Defensor</div>
                          <div class="item" value="1">Bebe</div>
                          <div class="item" value="2">"Digong"</div>
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
                  <div class="field">
                    <div class="ui sub header">Address</div>
                    <input type="text" name="address" placeholder="#4 Wednesday St. Pacita 1 Brgy. San Vicente" required>
                  </div>
                </div>
                
                <div class="equal width required fields">
                  <div class="field">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="XXXXXX@yahoo.com" required>
                  </div>
                  <div class="field">
                    <label>Cellphone Number</label>
                    <input type="text" name="phoneNumber" pattern="([0-9 '.]){2,}" placeholder="+639 XX XXX XXXX">
                  </div>
                </div>
            </div>
            <div class="actions">
              <div class="ui button">Cancel</div>
              <button class="ui button" type="submit">Submit</button>
              </form>
            </div>
        </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
       $('#addBtn').click(function(){
          $('#addModal').modal('show');    
       });
  });
  //address
  $('.ui.normal.dropdown')
    .dropdown();
</script>
@endsection