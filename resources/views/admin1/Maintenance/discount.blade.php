@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Maintenance.sideNav')

  <div class="twelve wide column">
    <div class="ui top attached tabular menu">
      <a class="active item" data-tab="first">Discount</a>
      <!-- <a class="item" data-tab="second">Rewards</a> -->
    </div>

    <!-- category -->
    <div class="ui bottom attached active tab segment" data-tab="first">
       <a class="ui basic blue button" id="addBtn">
            <i class="add square icon"></i>
            Add Discounts
          </a>

       @include('admin1.Maintenance.alerts')
          <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="ui centered header">
              Add Discounts
            </div>
            <div class="content">
              <form class="ui form" action="/confirmDiscount" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="seven wide field">
                  <div class="ui sub header">Account Type</div>
                    <select name="add_Type" class="ui search dropdown">
                      <option value="" disabled selected>Choose Account Type</option>
                      @foreach($accountTypes as $key => $accountType)
                      <option value="{{$accountType->AccountTypeID}}">{{$accountType->AccountTypeName}}</option>
                      @endforeach
                    </select>
                </div>

                <div class="equal width required fields">
                  <div class="field">
                    <label>Discount</label>
                    <input type="number" name="add_discount" step="0.01">
                  </div>
                  <div class="field">
                    <label>Required Points</label>
                    <input type="number" name="add_points">
                  </div>
                </div>
            </div>
            <div class="actions">
              <button class="ui blue button" type="submit" name="add"><i class="checkmark icon"></i> Add Discount</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!--edit modal -->
        <div class="ui small modal" id="editModal">
          <i class="close icon"></i>
            <div class="ui centered header">
              Edit Discount
            </div>
            <div class="content">
              <form class="ui form" action="/confirmDiscount" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="editID" name="editID">
                <div class="field">
                  <div class="ui sub header">Account Type</div>
                    <select id="edit_name" name="edit_Type">
                      <option value="" disabled selected>Choose Account Type</option>
                      @foreach($accountTypes as $key => $accountType)
                      <option value="{{$accountType->AccountTypeID}}">{{$accountType->AccountTypeName}}</option>
                      @endforeach
                    </select>
                </div>

                <div class="equal width required fields">
                  <div class="field">
                    <label>Discount</label>
                    <input type="number" id="edit_discount" name="edit_discount" step="0.01">
                  </div>
                  <div class="field">
                    <label>Required Points</label>
                    <input type="number" id="edit_points" name="edit_points">
                  </div>
                </div>
            </div>
            <div class="actions">
              <button class="ui blue button" type="submit" name="edit"><i class="checkmark icon"></i>Confirm</button>
              </form>
            </div>
        </div>
          <!-- END edit modal -->

          <!-- table -->
        <table class="ui compact inverted celled definition table" id="tableOutput">
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
                      <div class="edit ui green basic vertical animated button" tabindex="" id="{{$key}}" >
                        <div class="hidden content">Edit</div>
                        <div class="visible content">
                          <i class="large edit icon"></i>
                        </div>
                      </div>
                      <button id="delete" name="delete" type="submit" class="ui basic red large vertical animated button">
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

        $('#editModal').modal('show');
    });
    
    //add modal

         $('#addBtn').click(function(){
            $('#addModal').modal('show');    
         });


    //accounttype
    $('.ui.dropdown')
    .dropdown();

});   

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