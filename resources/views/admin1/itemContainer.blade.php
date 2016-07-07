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
                <div class="fields">
                  <div class="ten wide required field">
                      <div class="ui sub header">Item</div>
                      <div class="ui fluid search normal selection dropdown">
                        <input type="hidden" name="" REQUIRED>
                          <i class="dropdown icon"></i>
                        <div class="default text">Select item</div>
                          <div class="menu">
                            <div class="item" value=""></div>
                          </div>
                      </div>
                  </div>

                   <div class="five wide field">
                   <div class="ui sub header">Upload photo</div>
                    <label for="file" class="ui icon button">
                        <i class="file icon"></i>
                        Attach photo</label>
                    <input type="file" id="file" name="add_photo" style="display:none" multiple>
                  </div> 
                </div>

                <div class="equal width required fields">
                  <div class="field">
                    <div class="ui sub header">Warehouse</div>
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="" REQUIRED>
                        <i class="dropdown icon"></i>
                      <!-- <div class="default text">Select Warehouse</div>
                        <div class="menu">
                          <div class="item" value="0">Santiago</div>
                        </div> -->
                        <select name="warehouse">
                            <option value="" selected>Warehouse</option>
                            <option value=""></option>
                        </select>
                    </div>
                  </div>
                </div>

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">size</div>
                    <input type="text" name="add_size" placeholder="dimensions" required>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Color</div>
                    <select name="add_color">
                        <option value="" selected>Choose Color</option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
                        <option value="Green">Green</option>
                      </select>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Quantity</div>
                    <input type="number" id="add_quantity" name="add_quantity" min="1" placeholder="0" required>
                  </div>
                </div>

                <div class="inline fields">
                  <div class="three wide field">
                    <div class="ui checkbox">
                      <input type="checkbox" id="test5" name="defect" />
                      <label>Defect</label>
                    </div>
                  </div>

                  <div class="five wide field" style="display: none" id="defectDesc">
                    <input id="def" type="text" name="defectDesc" placeholder="Description" />
                  </div>
                </div>
            </div>
            <div class="actions">
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

          <a href="/itemInbound">Next<i class="right arrow icon"></i></a>
    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


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

  //dropdowns
  $('.ui.normal.dropdown')
    .dropdown();

    //defect description
    $(document).ready(function () {
      $('#test5').click(function () {
          var $this = $(this);
          if ($this.is(':checked')) {
              document.getElementById('defectDesc').style.display = 'block';
          } else {
              document.getElementById('defectDesc').style.display = 'none';
          }
     });
    });

      $(document).ready(function () {
        $('#test6').click(function () {
            var $this = $(this);
            if ($this.is(':checked')) {
                document.getElementById('defectDesc1').style.display = 'block';
            } else {
                document.getElementById('defectDesc1').style.display = 'none';
          }
        });
      });

  //history
  $(document).ready(function(){
       $('#tableRow').click(function(){
          $('#history').modal('show');    
       });
  });

  //exit
  function modalClose() {
    $('.ui.modal').modal('hide'); 
    }


////////////////////////////////////////////////////////////////////////// 

  $(document).ready(function(){
    $("#tableOutput").DataTable();
  });
</script>
@endsection