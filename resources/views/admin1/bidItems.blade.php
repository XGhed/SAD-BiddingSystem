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
        <a href="/biddingEvent1"><i class="left arrow icon"></i>back to previous page</a>
         <h2 class="ui header centered">Event Name</h2>
         <div class="event">
          <div class="content">
            <div class="summary">
              <span>Start Time: </span>
            </div>
            <div class="summary">
              <span>End Time:</span>
            </div>
            <div class="summary">
              <span>Description:</span>
            </div>
          </div>
          <div class="ui divider"></div>
          <h4 class="ui header centered">List of Items</h4>
          <a class="ui basic blue button" id="addBtn">
              <i class="Add to cart icon"></i>
              Add Items
            </a>

            <!-- add modal -->
          <div class="ui small modal" id="addModal">
            <i class="close icon"></i>
              <div class="header">
                Add Items
              </div>
              <div class="content">
                <form class="ui form" action="/" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h3 class="ui header centered">Items Available</h3>
                  <div class="ui segment">
                    <div class="ten wide field">

                    <div>
                      <input type="text" placeholder="Search here...">
                    </div>
                      <div class="ui celled relaxed list">
                        <div class="item">
                          <div class="ui master checkbox">
                            <input type="checkbox" name="fruits">
                            <label>Fruits</label>
                          </div>
                          <div class="list">
                            <div class="item">
                              <div class="ui child checkbox">
                                <input type="checkbox" name="apple">
                                <label>Apple</label>
                              </div>
                            </div>
                            <div class="item">
                              <div class="ui child checkbox">
                                <input type="checkbox" name="orange">
                                <label>Orange</label>
                              </div>
                            </div>
                            <div class="item">
                              <div class="ui child checkbox">
                                <input type="checkbox" name="pear">
                                <label>Pear</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="item">
                          <div class="ui master checkbox">
                            <input type="checkbox" name="vegetables">
                            <label>Vegetables</label>
                          </div>
                          <div class="list">
                            <div class="item">
                              <div class="ui child checkbox">
                                <input type="checkbox" name="lettuce">
                                <label>Lettuce</label>
                              </div>
                            </div>
                            <div class="item">
                              <div class="ui child checkbox">
                                <input type="checkbox" name="carrot">
                                <label>Carrot</label>
                              </div>
                            </div>
                            <div class="item">
                              <div class="ui child checkbox">
                                <input type="checkbox" name="spinach">
                                <label>Spinach</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>













                    </div>
                  </div>
              </div>
              <div class="actions">
                <button class="ui button" type="submit">Confirm</button>
                </form>
              </div>
          </div>
            <!-- END add modal -->
        </div>
         <table class="ui celled table">
          <thead>
            <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Manage</th>
          </tr></thead>
          <tbody>
            <tr>
              <td>Kangkong</td>
              <td>10 pcs</td>
              <td>5.00</td>
              <td><div class="ui basic red button">Remove</div></td>
            </tr>
          </tbody>
        </table>
      </div><!-- segment -->
    </div><!-- column -->
  </div><!-- ui grid -->

<script>
//add modal
    $(document).ready(function(){
         $('#addBtn').click(function(){
            $('#addModal').modal('show');    
         });
    });


      $(function () {
        $('input[name="pp_checkall"]').change(function () {
            $('input[name=pp_check]').attr('checked', this.checked);
        });
        
        $('input[name="pp_check"]').change(function () {
            $('input[name="pp_checkall"]').prop('checked', $('input[name=pp_check]:not(:checked)').length === 0 ? true : false );
        });
      });






$('.list .master.checkbox')
  .checkbox({
    // check all children
    onChecked: function() {
      var
        $childCheckbox  = $(this).closest('.checkbox').siblings('.list').find('.checkbox')
      ;
      $childCheckbox.checkbox('check');
    },
    // uncheck all children
    onUnchecked: function() {
      var
        $childCheckbox  = $(this).closest('.checkbox').siblings('.list').find('.checkbox')
      ;
      $childCheckbox.checkbox('uncheck');
    }
  })
;

$('.list .child.checkbox')
  .checkbox({
    // Fire on load to set parent value
    fireOnInit : true,
    // Change parent state on each child checkbox change
    onChange   : function() {
      var
        $listGroup      = $(this).closest('.list'),
        $parentCheckbox = $listGroup.closest('.item').children('.checkbox'),
        $checkbox       = $listGroup.find('.checkbox'),
        allChecked      = true,
        allUnchecked    = true
      ;
      // check to see if all other siblings are checked or unchecked
      $checkbox.each(function() {
        if( $(this).checkbox('is checked') ) {
          allUnchecked = false;
        }
        else {
          allChecked = false;
        }
      });
      // set parent checkbox state, but dont trigger its onChange callback
      if(allChecked) {
        $parentCheckbox.checkbox('set checked');
      }
      else if(allUnchecked) {
        $parentCheckbox.checkbox('set unchecked');
      }
      else {
        $parentCheckbox.checkbox('set indeterminate');
      }
    }
  })
;





$(function(){

  // add multiple select / deselect functionality
  $("#selectall").click(function () {
      $('.case').attr('checked', this.checked);
  });

  // if all checkbox are selected, check the selectall checkbox
  // and viceversa
  $(".case").click(function(){

    if($(".case").length == $(".case:checked").length) {
      $("#selectall").attr("checked", "checked");
    } else {
      $("#selectall").removeAttr("checked");
    }

  });
});




</script>
@endsection