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
              <form class="ui form" action="/confirmDiscount" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="field">
                  <div class="ui sub header">Account Type</div>
                    <select name="add_Type">
                      @foreach($accountTypes as $key => $accountType)
                      <option value="" disabled selected>Choose Account Type</option>
                      <option value="{{$accountType->AccountTypeID}}">{{$accountType->AccountTypeName}}</option>
                      @endforeach
                    </select>
                </div>

                <div class="equal width required fields">
                  <div class="field">
                    <label>Discount</label>
                    <input type="number" name="add_discount">
                  </div>
                  <div class="field">
                    <label>Required Points</label>
                    <input type="number" name="add_points">
                  </div>
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit" name="add">Add Discount</button>
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
              <form class="ui form" action="/confirmDiscount" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="editID" name="editID">
                <div class="field">
                  <div class="ui sub header">Account Type</div>
                    <select id="edit_name" name="edit_Type">
                      @foreach($accountTypes as $key => $accountType)
                      <option value="" disabled selected>Choose Account Type</option>
                      <option value="{{$accountType->AccountTypeID}}">{{$accountType->AccountTypeName}}</option>
                      @endforeach
                    </select>
                </div>

                <div class="equal width required fields">
                  <div class="field">
                    <label>Discount</label>
                    <input type="number" id="edit_discount" name="edit_discount">
                  </div>
                  <div class="field">
                    <label>Required Points</label>
                    <input type="number" id="edit_points" name="edit_points">
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
              <th>Discount</th>
              <th>Required Points</th>
            </tr>
          </thead>
          <tbody>
            @foreach($results as $key => $result)
              <tr>
                <td class="collapsing">
                  <form action="/confirmDiscount" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="center">
                      <input type="hidden" class="items" id="" name="deleteID" value="{{$result->DiscountID}}">
                      <div class="edit ui vertical animated button" tabindex="" id="{{$key}}" >
                        <div class="hidden content">Edit</div>
                        <div class="visible content">
                          <i class="large edit icon"></i>
                        </div>
                      </div>
                      <button id="delete" name="delete" type="submit" class="ui large vertical animated button">
                        <div class="hidden content">Delete</div>
                        <div class="visible content">
                          <i class="trash icon"></i>
                        </div>
                      </button>
                    </div>
                  </form>
                </td>
                <td>{{$result->accountType->AccountTypeName}}</td>
                <td>{{$result->Discount}}%</td>
                <td id="tdpoints{{$key}}">{{$result->RequiredPoints}}</td>
                  <input type="hidden" id="tddisc{{$key}}" value="{{$result->Discount}}">
                  <input type="hidden" id="tdID{{$key}}" value="{{$result->DiscountID}}">
                  <input type="hidden" id="tdtype{{$key}}" value="{{$result->AccountTypeID}}">
              </tr>
            @endforeach
          </tbody>
        </table>
    </div><!-- tab1 -->

    <!-- rewards -->
    <div class="ui bottom attached tab segment" data-tab="second">
       <a class="ui basic blue button" id="addBtn1">
            <i class="add user icon"></i>
            Add Rewards
          </a>

          <!-- add modal -->
        <div class="ui small modal" id="addModal1">
          <i class="close icon"></i>
            <div class="header">
              Update Rewards
            </div>
            <div class="content">
              <form class="ui form" action="/updateReward" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="equal width required fields">
                  <div class="field">
                    <label>Rewards Percentage</label>
                    <input type="text" name="add_reward" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                  </div>

                  <div class="field">
                    <label>Reward Date</label>
                    <input type="date" name="add_date">
                  </div>
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit" name="add">Confirm</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!-- table -->
        <table class="ui celled table" id="tableOutput1">
          <thead>
            <tr>
              <th>Reward Percentage</th>
              <th>Starting Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($rewards as $key => $reward)
              <tr>
                <td>{{$reward->RewardPercentage}}%</td>
                <td>{{$reward->RewardDate}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div><!-- tab2 -->
  </div><!-- column -->
</div><!-- ui grid -->


<script>
  //cat
  $(function(){   
    $('#tableOutput').DataTable({
        "lengthChange": false,
        "pageLength": 5,
        "columns": [
          { "searchable": false },
          null,
          null,
          null
        ] 
    });
    $('#tableOutput1').DataTable({
        "lengthChange": false,
        "pageLength": 5
    });
  });

    $(function(){   
        $('#tableOutput').on('click', '.edit', function(){
            var selected = this.id;
            var keyID = $("#tdID"+selected).val();
            var keyType = $("#tdtype"+selected).val();
            var keyPoints = $("#tdpoints"+selected).text();
            var keyDiscount = $("#tddisc"+selected).val();

            $("#editID").val(keyID);
            $("#edit_discount").val(keyDiscount);
            $("#edit_points").val(keyPoints);
            $("#edit_name").val(keyType);
            $("#edit_name").material_select();
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