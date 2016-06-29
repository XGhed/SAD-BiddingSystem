@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Maintenance</div>
        <a class="item" href="/supplier">
          Supplier
        </a>
        <a class="item" href="/category">
          Category
        </a>
        <a class="item" href="/item">
          Item
        </a>
        <a class="item" href="/accountType">
          Account Type
        </a>
        <a class="active item" href="/discount">
          Discount
        </a>
        <a class="item" href="/shipment">
          Shipment
        </a>
        <a class="item" href="/warehouse">
          Warehouse
        </a>
    </div>
  </div>

  <div class="twelve wide column">
    <div class="ui top attached tabular menu">
      <a class="active item" data-tab="first">Discount</a>
      <a class="item" data-tab="second">Rewards</a>
    </div>

    <!-- category -->
    <div class="ui bottom attached active tab segment" data-tab="first">
       <a class="ui basic blue button" id="addBtn">
            <i class="add user icon"></i>
            Add Discounts
          </a>

          <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Add Discounts
            </div>
            <div class="content">
              <form class="ui form" action="/confirmCategory" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="field">
                    <div class="ui sub header">Account Type</div>
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="province" REQUIRED>
                        <i class="dropdown icon"></i>
                      <div class="default text">Select account type</div>
                        <div class="menu">
                          <div class="item" value="0">Santiago</div>
                          <div class="item" value="">Roxas</div>
                          <div class="item" value="2">Duterte</div>
                        </div>
                    </div>
                  </div>

                <div class="equal width required fields">
                  <div class="field">
                    <label>Discount</label>
                    <input type="number" name="">
                  </div>
                  <div class="field">
                    <label>Required Points</label>
                    <input type="number" name="">
                  </div>
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit">Add Discount</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!--edit modal -->
        <div class="ui small modal" id="editModal">
          <i class="close icon"></i>
            <div class="header">
              Edit Discounts
            </div>
            <div class="content">
              <form class="ui form" action="/confirmCategory" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="field">
                    <div class="ui sub header">Account Type</div>
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="province" REQUIRED>
                        <i class="dropdown icon"></i>
                      <div class="default text">Select account type</div>
                        <div class="menu">
                          <div class="item" value="0">Santiago</div>
                          <div class="item" value="">Roxas</div>
                          <div class="item" value="2">Duterte</div>
                        </div>
                    </div>
                  </div>

                <div class="equal width required fields">
                  <div class="field">
                    <label>Discount</label>
                    <input type="number" name="">
                  </div>
                  <div class="field">
                    <label>Required Points</label>
                    <input type="number" name="">
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
              <th>Discount</th>
              <th>Required Points</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="collapsing">
                <div class="ui vertical animated button" tabindex="" id="editBtn">
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
              <td> member </td>
              <td> 5 % </td>
              <td> 100</td>
            </tr>
          </tbody>
        </table>
    </div><!-- tab1 -->

    <!-- rewards -->
    <div class="ui bottom attached tab segment" data-tab="second">
       <a class="ui basic blue button" id="addBtn">
            <i class="add user icon"></i>
            Add Rewards
          </a>

          <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Update Rewards
            </div>
            <div class="content">
              <form class="ui form" action="/confirmCategory" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="equal width required fields">
                  <div class="field">
                    <label>Rewards Percentage</label>
                    <input type="text" name="add_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                  </div>

                  <div class="field">
                    <label>Reward Date</label>
                    <input type="date" name="add_desc">
                  </div>
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit">Confirm</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!-- table -->
        <table class="ui celled table" id="tableOutput">
          <thead>
            <tr>
              <th>Reward Percentage</th>
              <th>Starting Date</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> 50 %</td>
              <td> June 17 1997</td>
            </tr>
          </tbody>
        </table>
    </div><!-- tab2 -->
  </div><!-- column -->
</div><!-- ui grid -->


<script>
  //cat
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
  //subcat
    //add modal
    $(document).ready(function(){
         $('#addBtn1').click(function(){
            $('#addModal1').modal('show');    
         });
    });

    //edit modal
    $(document).ready(function(){
         $('#editBtn1').click(function(){
            $('#editModal1').modal('show');    
         });
    });

    //accounttype
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

  //tab
  $('.tabular.menu .item').tab();

</script>
@endsection