@extends('admin1.mainteParent')

@section('content')
  <div class="ui grid">
    <div class="four wide column">
      <div class="ui vertical fluid tabular menu">
        <div class="ui centered header">Transaction</div>
          <a class="item" href="/inventory1">
            Inventory
          </a>
          <a class="active item" href="/biddingEvent1">
            Bidding Event
          </a>
      </div>
    </div>

    <div class="twelve wide stretched column">
      <div class="ui segment">
         <a class="ui basic blue button" id="addBtn">
              <i class="calendar icon"></i>
              Add Event
            </a>

            <!-- add modal -->
          <div class="ui small modal" id="addModal">
            <i class="close icon"></i>
              <div class="header">
                Add Event
              </div>
              <div class="content">
                <form class="ui form" action="/" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <ul class="ui list">
                    <div class="required inline fields">
                      <div class="ten wide field">
                        <label>Event Name</label>
                        <input type="text" name="event_add" required>
                      </div>
                    </div>

                  <div class="required inline fields">
                    <div class="field">
                      <label>Start:</label>
                      <input type="date" id="startDate">
                      <input type="time" name="" required>
                    </div>
                  </div>
                  
                  <div class="required inline fields">  
                    <div class="field">
                      <label>End:</label>
                      <input type="date" id="endDate">
                      <input type="time" name="" required>
                    </div>
                  </div>

                    <div class="inline fields">
                      <label>Description</label>
                      <textarea rows="2" placeholder="Something about the event"></textarea>
                    </div>
                    </div>
              </ul>
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

          <!-- events -->
            <div class="ui card">
              <div class="content">
                <div class="header">Project Timeline
                  <div class="ui top right attached label"><a id="editBtn" data-content="Edit event"><i class="edit icon"></i></a></div>
                </div>
              </div>
              <div class="content">
                <h4 class="ui sub header">Activity</h4>
                <div class="ui small feed">
                  <div class="event">
                    <div class="content">
                      <div class="summary">
                         <a>Elliot Fu</a> added <a>Jenny Hess</a> to the project
                      </div>
                    </div>
                  </div>
                  <div class="event">
                    <div class="content">
                      <div class="summary">
                         <a>Stevie Feliciano</a> was added as an <a>Administrator</a>
                      </div>
                    </div>
                  </div>
                  <div class="event">
                    <div class="content">
                      <div class="summary">
                         <a>Helen Troy</a> added two pictures
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="extra content">
                <button class="ui button">Join Project</button>
              </div>
            </div>
      </div><!-- segment -->
    </div><!-- column -->
  </div><!-- ui grid -->


  <script>
    //popup
    $('#editBtn').popup();


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

    //startDate
      var date = new Date();

      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();

      if (month < 10) month = "0" + month;
      if (day < 10) day = "0" + day;

      var today = year + "-" + month + "-" + day;
      document.getElementById("startDate").value = today;
      document.getElementById("startDate").min = today;

    //endDate
      var date = new Date();

      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();

      if (month < 10) month = "0" + month;
      if (day < 10) day = "0" + day;

      var today = year + "-" + month + "-" + day;
      document.getElementById("endDate").value = today;
      document.getElementById("endDate").min = today;

  </script>
@endsection