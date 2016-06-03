@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Transaction</div>
        <a class=" active item" href="/inventory1">
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
            Add item
          </a>

          <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Add Item
            </div>
            <div class="content">
              <form class="ui form" action="/" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="fields">
                  <div class="ten wide required field">
                      <div class="ui sub header">Item</div>
                      <div class="ui fluid search normal selection dropdown">
                        <input type="hidden" name="" REQUIRED>
                          <i class="dropdown icon"></i>
                        <div class="default text">Select item</div>
                          <div class="menu">
                            <div class="item" value="0">Santiago</div>
                            <div class="item" value="1">Roxas</div>
                            <div class="item" value="2">Duterte</div>
                          </div>
                      </div>
                  </div>

                   <div class="five wide field">
                   <div class="ui sub header">Upload photo</div>
                    <label for="file" class="ui icon button">
                        <i class="file icon"></i>
                        Attach photo</label>
                    <input type="file" id="file" style="display:none" multiple>
                  </div> 
                </div>

                <div class="equal width required fields">
                  <div class="field">
                    <div class="ui sub header">Warehouse</div>
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="" REQUIRED>
                        <i class="dropdown icon"></i>
                      <div class="default text">Select Warehouse</div>
                        <div class="menu">
                          <div class="item" value="0">Santiago</div>
                          <div class="item" value="1">Roxas</div>
                          <div class="item" value="2">Duterte</div>
                        </div>
                    </div>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Supplier</div>
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="" REQUIRED>
                        <i class="dropdown icon"></i>
                      <div class="default text">Select Supplier</div>
                        <div class="menu">
                          <div class="item" value="0">Santiago</div>
                          <div class="item" value="1">Roxas</div>
                          <div class="item" value="2">Duterte</div>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">size</div>
                    <input type="text" name="size" placeholder="dimensions" required>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Color</div>
                    <input type="text" name="color" required>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Quantity</div>
                    <input type="number" name="quantity" min="1" required>
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

          <!--edit modal -->
        <div class="ui small modal" id="editModal">
           <i class="close icon"></i>
            <div class="header">
            Edit Item
            </div>
            <div class="content">
              <form class="ui form" action="/" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="fields">
                  <div class="seven wide required field">
                      <div class="ui sub header">Item</div>
                      <div class="ui fluid search normal selection dropdown">
                        <input type="hidden" name="" REQUIRED>
                          <i class="dropdown icon"></i>
                        <div class="default text">Select item</div>
                          <div class="menu">
                            <div class="item" value="0">Santiago</div>
                            <div class="item" value="1">Roxas</div>
                            <div class="item" value="2">Duterte</div>
                          </div>
                      </div>
                  </div>

                  <div class="eight wide field">
                    <div class="inline fields">
                      <div class="field">
                        <div class="ui checkbox">
                          <input type="checkbox" checked>
                          <label>Use current photo</label>
                        </div>
                      </div>

                      <div class="field">
                        <div class="ui sub header">Upload photo</div>
                          <label for="file" class="ui icon button">
                              <i class="file icon"></i>
                              Attach photo</label>
                          <input type="file" id="file" style="display:none" multiple>
                        </div>
                      </div>
                  </div>
                </div>

                <div class="equal width required fields">
                  <div class="field">
                    <div class="ui sub header">Warehouse</div>
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="" REQUIRED>
                        <i class="dropdown icon"></i>
                      <div class="default text">Select Warehouse</div>
                        <div class="menu">
                          <div class="item" value="0">Santiago</div>
                          <div class="item" value="1">Roxas</div>
                          <div class="item" value="2">Duterte</div>
                        </div>
                    </div>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Supplier</div>
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="" REQUIRED>
                        <i class="dropdown icon"></i>
                      <div class="default text">Select Supplier</div>
                        <div class="menu">
                          <div class="item" value="0">Santiago</div>
                          <div class="item" value="1">Roxas</div>
                          <div class="item" value="2">Duterte</div>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">size</div>
                    <input type="text" name="size" placeholder="dimensions" required>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Color</div>
                    <input type="text" name="color" required>
                  </div>
                </div>

                <div class="inline fields">
                  <div class="three wide field">
                    <div class="ui checkbox">
                      <input type="checkbox" id="test6" name="defect1" />
                      <label>Defect</label>
                    </div>
                  </div>

                  <div class="five wide field" style="display: none" id="defectDesc1">
                    <input id="def" type="text" name="defectDesc" placeholder="Description" />
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
              <th>Name</th>
              <th>Category</th>
              <th>Photo</th>
              <th>Size</th>
              <th>Color</th>
              <th>Warehouse</th>
              <th>Supplier</th>
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
              <td> knife </td>
              <td> kitchen </td>
              <td> /img </td>
              <td> small </td>
              <td> silver </td>
              <td> warehouse 001 </td>
              <td> supplier 001 </td>
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
</script>
@endsection