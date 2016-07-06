@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Transaction</div>
        <a class="active item" href="/orderedItem">
          Ordered Items
        </a>
        <a class=" item" href="/inventory">
          Inventory
        </a>
        <a class="item" href="/biddingEvent1">
          Bidding Event
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <a class="ui basic blue button" id="addBtn">
          <i class="add user icon"></i>
          Add Item
        </a>

        <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Add Item
            </div>
            <div class="content">
              <form class="ui form" action="/" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="equal width fields">
                <div class="field">
                  <div class="ui sub header">Supplier</div>
                  <div class="ui selection dropdown" id="supplierSelect">
                      <input type="hidden" name="gender">
                      <i class="dropdown icon"></i>
                      <div class="default text">Supplier</div>
                      <div class="menu">
                          <div class="item" data-value="1">nigguh</div>
                      </div>
                  </div>
                </div>

                <div class="field">
                  <div class="ui sub header">Container</div>
                  <input type="text" placeholder="Container..." />
                </div>
              </div>

              <div class="equal width fields">
                <div class="field">
                  <div class="ui sub header">Date</div>
                  <input type="date" />
                </div>
                <div class="field">
                  <div class="ui sub header">Time</div>
                  <input type="time" />
                </div>
              </div>

                <div class="field">
                  <div class="ui sub header">Item Name</div>
                  <input type="text" placeholder="Item name..." />
                  <div id="dynamicInput"></div>
                  <a value="Add" onclick="addInput('dynamicInput');">+ Add more item</a>
                </div>

            </div><!--content -->
            <div class="actions">
              <button class="ui button" onclick="modalClose()">Cancel</button>
              <button class="ui button" type="submit">Confirm</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <table class="ui celled striped table">
            <thead>
              <tr>
              <th>Item Name</th>
              <th>Container</th>
              <th>Date And Time</th>
              <th>Supplier</th>
            </tr></thead>
            <tbody>
              <tr>
                <td>Item name</td>
                <td>Container shit</td>
                <td>10 hours ago</td>
                <td>supplier</td>
              </tr>
            </tbody>
          </table>

          <a href="/orderedItem/itemInbound">Next<i class="right arrow icon"></i></a>
    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
  //add modal
  $(document).ready(function(){
       $('#addBtn').click(function(){
          $('#addModal').modal('show');    
       });
  })

  //exit modal
  function modalClose() {
    $('.ui.modal').modal('hide'); 
  }

  //supplier dropdown
  $('#supplierSelect')
  .dropdown();

  //textbox
  function addInput(divName) {
      var newDiv = document.createElement('div');
      var inputHTML = "";
      inputHTML="<p></p><input type='text' placeholder='Item name...' />";
      newDiv.innerHTML = inputHTML;
      document.getElementById(divName).appendChild(newDiv);
  }
</script>
@endsection